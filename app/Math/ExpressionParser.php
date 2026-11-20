<?php

namespace App\Math;

use InvalidArgumentException;

/**
 * Sicherer Parser für Zahlenausdrücke (kein eval!).
 *
 * Unterstützt: Dezimalkomma/-punkt, + - * / : ^, Klammern, implizite Multiplikation (2π, 3√2, 2(1+3)),
 * sqrt()/√, π/pi, ², ³ sowie typografische Varianten (−, ·, ×, ÷).
 */
final class ExpressionParser
{
    /** @var list<array{type: string, value: string}> */
    private array $tokens = [];

    private int $pos = 0;

    public function parse(string $input): MathValue
    {
        $this->tokens = $this->tokenize($input);
        $this->pos = 0;

        if ($this->tokens === []) {
            throw new InvalidArgumentException('Leere Eingabe.');
        }

        $value = $this->expression();

        if ($this->peek() !== null) {
            throw new InvalidArgumentException('Unerwartetes Zeichen: '.$this->peek()['value']);
        }

        return $value;
    }

    public function tryParse(string $input): ?MathValue
    {
        try {
            return $this->parse($input);
        } catch (InvalidArgumentException) {
            return null;
        }
    }

    /**
     * @return list<array{type: string, value: string}>
     */
    private function tokenize(string $input): array
    {
        $input = str_replace(
            ['−', '–', '·', '⋅', '×', '÷', ':', 'π', '²', '³', ','],
            ['-', '-', '*', '*', '*', '/', '/', 'pi', '^2', '^3', '.'],
            mb_strtolower(trim($input)),
        );

        if (mb_strlen($input) > 200) {
            throw new InvalidArgumentException('Eingabe zu lang.');
        }

        $tokens = [];
        $lastWasNumber = false;
        $i = 0;
        $length = strlen($input);

        while ($i < $length) {
            $char = $input[$i];

            if (ctype_space($char)) {
                $i++;

                continue;
            }

            if (ctype_digit($char) || $char === '.') {
                preg_match('/\G\d*\.?\d*/', $input, $m, 0, $i);
                if ($m[0] === '.') {
                    throw new InvalidArgumentException('Ungültige Zahl.');
                }
                if ($lastWasNumber) {
                    // "1 1/2" o. ä. nicht stillschweigend zu "11/2" zusammenziehen
                    throw new InvalidArgumentException('Zwei Zahlen ohne Rechenzeichen.');
                }
                $tokens[] = ['type' => 'num', 'value' => $m[0]];
                $i += strlen($m[0]);
                $lastWasNumber = true;

                continue;
            }

            $lastWasNumber = false;

            if (str_starts_with(substr($input, $i), '√')) {
                $tokens[] = ['type' => 'func', 'value' => 'sqrt'];
                $i += strlen('√');

                continue;
            }

            if (ctype_alpha($char)) {
                preg_match('/\G[a-z]+/', $input, $m, 0, $i);
                $tokens[] = match ($m[0]) {
                    'pi' => ['type' => 'const', 'value' => 'pi'],
                    'e' => ['type' => 'const', 'value' => 'e'],
                    'sqrt', 'wurzel' => ['type' => 'func', 'value' => 'sqrt'],
                    default => throw new InvalidArgumentException('Unbekannter Ausdruck: '.$m[0]),
                };
                $i += strlen($m[0]);

                continue;
            }

            if (str_contains('+-*/^()', $char)) {
                $tokens[] = ['type' => 'op', 'value' => $char];
                $i++;

                continue;
            }

            throw new InvalidArgumentException('Unerlaubtes Zeichen: '.$char);
        }

        return $tokens;
    }

    // expression := term (('+' | '-') term)*
    private function expression(): MathValue
    {
        $value = $this->term();

        while ($this->isOp('+') || $this->isOp('-')) {
            $op = $this->next()['value'];
            $right = $this->term();
            $value = $op === '+' ? $value->add($right) : $value->sub($right);
        }

        return $value;
    }

    // term := unary (('*' | '/' | implizit) unary)*
    private function term(): MathValue
    {
        $value = $this->unary();

        while (true) {
            if ($this->isOp('*') || $this->isOp('/')) {
                $op = $this->next()['value'];
                $right = $this->unary();
                $value = $op === '*' ? $value->mul($right) : $value->div($right);
            } elseif ($this->startsPrimary()) {
                $value = $value->mul($this->power());
            } else {
                return $value;
            }
        }
    }

    // unary := ('+' | '-') unary | power
    private function unary(): MathValue
    {
        if ($this->isOp('-')) {
            $this->next();

            return $this->unary()->negate();
        }

        if ($this->isOp('+')) {
            $this->next();

            return $this->unary();
        }

        return $this->power();
    }

    // power := primary ('^' unary)?   (rechtsassoziativ, -2^2 = -4)
    private function power(): MathValue
    {
        $base = $this->primary();

        if ($this->isOp('^')) {
            $this->next();

            return $base->pow($this->unary());
        }

        return $base;
    }

    private function primary(): MathValue
    {
        $token = $this->next() ?? throw new InvalidArgumentException('Unvollständiger Ausdruck.');

        return match ($token['type']) {
            'num' => MathValue::exact(Rational::fromDecimalString($token['value']) ?? throw new InvalidArgumentException('Zahl zu groß.')),
            'const' => MathValue::approx($token['value'] === 'pi' ? M_PI : M_E),
            'func' => $this->power()->sqrt(),
            'op' => $token['value'] === '(' ? $this->group() : throw new InvalidArgumentException('Unerwartetes Zeichen: '.$token['value']),
        };
    }

    private function group(): MathValue
    {
        $value = $this->expression();

        if (! $this->isOp(')')) {
            throw new InvalidArgumentException('Schließende Klammer fehlt.');
        }

        $this->next();

        return $value;
    }

    private function startsPrimary(): bool
    {
        $token = $this->peek();

        return $token !== null && ($token['type'] !== 'op' || $token['value'] === '(');
    }

    private function isOp(string $op): bool
    {
        $token = $this->peek();

        return $token !== null && $token['type'] === 'op' && $token['value'] === $op;
    }

    /** @return array{type: string, value: string}|null */
    private function peek(): ?array
    {
        return $this->tokens[$this->pos] ?? null;
    }

    /** @return array{type: string, value: string}|null */
    private function next(): ?array
    {
        return $this->tokens[$this->pos++] ?? null;
    }
}
