<?php

namespace App\Questions\AnswerTypes;

use App\Math\ExpressionParser;
use App\Math\MathValue;
use App\Math\Rational;

abstract class AnswerChecker
{
    /**
     * Ein "einfacher" Zahlbaustein: 3 | 2,5 | π | 25π | √2 | 3√2 | sqrt(2)
     */
    private const ATOM = '(?=[0-9πp√s])(?:\d+(?:[.,]\d+)?)?(?:π|pi|√\d+(?:[.,]\d+)?|sqrt\(\d+(?:[.,]\d+)?\))?';

    public function __construct(protected ExpressionParser $parser) {}

    /**
     * @param  string|array<string, string>  $input  Eingabe des Nutzers
     * @param  array<string, mixed>  $expected  Hinterlegte Lösung
     * @param  array<string, mixed>  $meta  Zusatzinfos (Optionen, Variablen …)
     */
    abstract public function check(string|array $input, array $expected, array $meta = []): CheckResult;

    /**
     * Parst eine Ergebnis-Eingabe. Erlaubt sind nur vereinfachte Ergebnisse wie
     * 12, -2,5, 7/12, 1 1/2, 25π, 3√2 oder 5π/4 – keine Rechenausdrücke, sonst könnte
     * man einfach die Aufgabenstellung abtippen. Ein vorangestelltes "x =" wird ignoriert.
     */
    protected function parseNumber(string $input): ?MathValue
    {
        $input = trim(preg_replace('/^\s*[a-zA-Z]\s*=\s*/', '', $input));

        if (preg_match('/^([+\-−]?)\s*(\d+)\s+(\d+)\s*\/\s*(\d+)$/u', $input, $m) && (int) $m[4] !== 0) {
            $value = MathValue::exact((new Rational((int) $m[2]))->add(new Rational((int) $m[3], (int) $m[4])));

            return in_array($m[1], ['-', '−'], true) ? $value->negate() : $value;
        }

        $compact = preg_replace('/\s+/u', '', mb_strtolower($input));

        if (! preg_match('/^[+\-−]?'.self::ATOM.'(?:[\/:]'.self::ATOM.')?$/u', $compact)) {
            return null;
        }

        return $this->parser->tryParse($compact);
    }

    protected function expectedValue(string $value): MathValue
    {
        return $this->parser->parse($value);
    }

    protected function invalidNumber(): CheckResult
    {
        return CheckResult::invalid('Bitte gib ein vereinfachtes Ergebnis ein, z. B. 3, -2,5, 7/12, 25π oder 3√2 – keine Rechnung.');
    }
}
