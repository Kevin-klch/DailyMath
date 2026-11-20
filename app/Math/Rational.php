<?php

namespace App\Math;

use InvalidArgumentException;

/**
 * Exakte rationale Zahl (gekürzter Bruch), damit z. B. 0,5 und 1/2 exakt gleich sind.
 */
final readonly class Rational
{
    public int $numerator;

    public int $denominator;

    public function __construct(int $numerator, int $denominator = 1)
    {
        if ($denominator === 0) {
            throw new InvalidArgumentException('Division durch null.');
        }

        if ($denominator < 0) {
            $numerator = -$numerator;
            $denominator = -$denominator;
        }

        $gcd = self::gcd(abs($numerator), $denominator);

        $this->numerator = intdiv($numerator, $gcd);
        $this->denominator = intdiv($denominator, $gcd);
    }

    /**
     * Wandelt eine Dezimalzahl in Textform ("0.125") exakt in einen Bruch um.
     */
    public static function fromDecimalString(string $value): ?self
    {
        if (! preg_match('/^(\d*)(?:\.(\d+))?$/', $value, $m) || ($m[1] === '' && ! isset($m[2]))) {
            return null;
        }

        $fraction = $m[2] ?? '';

        if (strlen($m[1].$fraction) > 15) {
            return null; // zu groß für exakte Integer-Arithmetik
        }

        return new self((int) ($m[1].$fraction), 10 ** strlen($fraction));
    }

    public function add(self $other): ?self
    {
        return self::safe(fn () => new self(
            self::checked($this->numerator * $other->denominator + $other->numerator * $this->denominator),
            self::checked($this->denominator * $other->denominator),
        ));
    }

    public function sub(self $other): ?self
    {
        return $this->add($other->negate());
    }

    public function mul(self $other): ?self
    {
        return self::safe(fn () => new self(
            self::checked($this->numerator * $other->numerator),
            self::checked($this->denominator * $other->denominator),
        ));
    }

    public function div(self $other): ?self
    {
        if ($other->numerator === 0) {
            throw new InvalidArgumentException('Division durch null.');
        }

        return $this->mul(new self($other->denominator, $other->numerator));
    }

    public function pow(int $exponent): ?self
    {
        if ($exponent < 0) {
            return (new self(1))->div($this)?->pow(-$exponent);
        }

        $result = new self(1);
        for ($i = 0; $i < $exponent; $i++) {
            $result = $result->mul($this);
            if ($result === null) {
                return null;
            }
        }

        return $result;
    }

    public function negate(): self
    {
        return new self(-$this->numerator, $this->denominator);
    }

    public function isInteger(): bool
    {
        return $this->denominator === 1;
    }

    public function toFloat(): float
    {
        return $this->numerator / $this->denominator;
    }

    public function equals(self $other): bool
    {
        return $this->numerator === $other->numerator && $this->denominator === $other->denominator;
    }

    public function __toString(): string
    {
        return $this->isInteger() ? (string) $this->numerator : $this->numerator.'/'.$this->denominator;
    }

    private static function gcd(int $a, int $b): int
    {
        while ($b !== 0) {
            [$a, $b] = [$b, $a % $b];
        }

        return $a === 0 ? 1 : $a;
    }

    /**
     * PHP wandelt Integer-Überläufe stillschweigend in float um – das fangen wir ab.
     */
    private static function checked(int|float $value): int
    {
        if (! is_int($value)) {
            throw new \OverflowException;
        }

        return $value;
    }

    private static function safe(callable $fn): ?self
    {
        try {
            return $fn();
        } catch (\OverflowException) {
            return null;
        }
    }
}
