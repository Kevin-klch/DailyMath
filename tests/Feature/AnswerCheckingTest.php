<?php

namespace Tests\Feature;

use App\Enums\AnswerType;
use App\Enums\CheckStatus;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AnswerCheckingTest extends TestCase
{
    #[Test]
    #[DataProvider('cases')]
    public function it_checks_answers_mathematically(AnswerType $type, array $expected, string|array $input, CheckStatus $status, array $meta = []): void
    {
        $this->assertSame($status, $type->checker()->check($input, $expected, $meta)->status);
    }

    public static function cases(): array
    {
        $half = ['value' => '1/2'];
        $circle = ['value' => '25pi', 'tolerance' => 0.01];
        $system = ['values' => ['x' => '3', 'y' => '1']];
        $roots = ['values' => ['2', '3']];
        $options = ['options' => ['a' => 'A', 'b' => 'B']];

        return [
            // Numerisch: verschiedene, gleichwertige Schreibweisen
            '0,5 == 1/2' => [AnswerType::Numeric, $half, '0,5', CheckStatus::Correct],
            '2/4 == 1/2' => [AnswerType::Numeric, $half, '2/4', CheckStatus::Correct],
            'x = 0.5' => [AnswerType::Numeric, $half, 'x = 0.5', CheckStatus::Correct],
            'falscher Wert' => [AnswerType::Numeric, $half, '0,6', CheckStatus::Incorrect],
            'Text ist ungültig' => [AnswerType::Numeric, $half, 'halb', CheckStatus::Invalid],
            'leer ist ungültig' => [AnswerType::Numeric, $half, '  ', CheckStatus::Invalid],
            'Rechenausdruck ist ungültig' => [AnswerType::Numeric, $half, '1/4 + 1/4', CheckStatus::Invalid],
            'gemischte Zahl' => [AnswerType::Numeric, ['value' => '3/2'], '1 1/2', CheckStatus::Correct],
            'negative gemischte Zahl' => [AnswerType::Numeric, ['value' => '-3/2'], '-1 1/2', CheckStatus::Correct],
            'exakt mit π' => [AnswerType::Numeric, $circle, '25π', CheckStatus::Correct],
            'gerundet mit Toleranz' => [AnswerType::Numeric, $circle, '78,54', CheckStatus::Correct],
            'zu ungenau' => [AnswerType::Numeric, $circle, '78,5', CheckStatus::Incorrect],
            'Wurzel' => [AnswerType::Numeric, ['value' => 'sqrt(8)'], '2√2', CheckStatus::Correct],

            // Bruch: exakt, gerundete Dezimalzahl reicht nicht
            'Bruch exakt' => [AnswerType::Fraction, ['value' => '7/12'], '14/24', CheckStatus::Correct],
            'Bruch gerundet' => [AnswerType::Fraction, ['value' => '7/12'], '0,5833', CheckStatus::Incorrect],
            'Bruch als abbrechende Dezimalzahl' => [AnswerType::Fraction, ['value' => '1/4'], '0,25', CheckStatus::Correct],

            // Mehrere Werte
            'Felder' => [AnswerType::MultiValue, $system, ['x' => '3', 'y' => '1'], CheckStatus::Correct],
            'Text' => [AnswerType::MultiValue, $system, 'x = 3; y = 1', CheckStatus::Correct],
            'Text mit Komma' => [AnswerType::MultiValue, $system, 'y=1, x=3', CheckStatus::Correct],
            'vertauscht falsch' => [AnswerType::MultiValue, $system, ['x' => '1', 'y' => '3'], CheckStatus::Incorrect],
            'fehlender Wert' => [AnswerType::MultiValue, $system, ['x' => '3'], CheckStatus::Invalid],

            // Lösungsmenge, Reihenfolge egal
            'Menge geordnet' => [AnswerType::SolutionSet, $roots, '2; 3', CheckStatus::Correct],
            'Menge vertauscht' => [AnswerType::SolutionSet, $roots, '3 und 2', CheckStatus::Correct],
            'Menge doppelt' => [AnswerType::SolutionSet, $roots, '2; 2', CheckStatus::Incorrect],
            'Menge unvollständig' => [AnswerType::SolutionSet, $roots, '2', CheckStatus::Incorrect],

            // Multiple Choice
            'richtige Option' => [AnswerType::MultipleChoice, ['choice' => 'b'], 'b', CheckStatus::Correct, $options],
            'falsche Option' => [AnswerType::MultipleChoice, ['choice' => 'b'], 'a', CheckStatus::Incorrect, $options],
            'unbekannte Option' => [AnswerType::MultipleChoice, ['choice' => 'b'], 'z', CheckStatus::Invalid, $options],
        ];
    }
}
