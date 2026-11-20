<?php

namespace Tests\Unit;

use App\Math\ExpressionParser;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ExpressionParserTest extends TestCase
{
    private ExpressionParser $parser;

    protected function setUp(): void
    {
        $this->parser = new ExpressionParser;
    }

    #[Test]
    #[DataProvider('exactExpressions')]
    public function it_evaluates_expressions_exactly(string $input, string $expected): void
    {
        $value = $this->parser->parse($input);

        $this->assertTrue($value->isExact(), "{$input} sollte exakt sein");
        $this->assertSame($expected, (string) $value);
    }

    public static function exactExpressions(): array
    {
        return [
            'Dezimalkomma' => ['0,5', '1/2'],
            'Dezimalpunkt' => ['0.125', '1/8'],
            'Bruch wird gekürzt' => ['14/24', '7/12'],
            'Punkt vor Strich' => ['18 - 4*3 + 12:4', '9'],
            'Klammern' => ['(1/3 + 1/4) * 12', '7'],
            'Potenz rechtsassoziativ' => ['2^3^2', '512'],
            'Vorzeichen vor Potenz' => ['-2^2', '-4'],
            'negativer Exponent' => ['2^-2', '1/4'],
            'perfekte Wurzel' => ['√(9/4)', '3/2'],
            'Hochzahl-Zeichen' => ['3²', '9'],
            'typografische Zeichen' => ['6 · 2 − 1 ÷ 2', '23/2'],
            'implizite Multiplikation' => ['2(3+1)', '8'],
        ];
    }

    #[Test]
    public function it_falls_back_to_floats_for_irrational_values(): void
    {
        $value = $this->parser->parse('25π');

        $this->assertFalse($value->isExact());
        $this->assertEqualsWithDelta(78.5398, $value->approx, 0.0001);
        $this->assertEqualsWithDelta(sqrt(2) * 3, $this->parser->parse('3√2')->approx, 1e-12);
    }

    #[Test]
    #[DataProvider('invalidExpressions')]
    public function it_rejects_invalid_input(string $input): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->parser->parse($input);
    }

    public static function invalidExpressions(): array
    {
        return [
            'leer' => [''],
            'Buchstaben' => ['abc'],
            'Division durch null' => ['1/0'],
            'offene Klammer' => ['(1+2'],
            'zwei Zahlen ohne Operator' => ['1 2'],
            'Wurzel aus negativer Zahl' => ['√(-4)'],
            'Code-Injection' => ['system("ls")'],
        ];
    }
}
