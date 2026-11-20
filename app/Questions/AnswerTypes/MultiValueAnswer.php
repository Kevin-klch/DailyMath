<?php

namespace App\Questions\AnswerTypes;

/**
 * Mehrere benannte Werte, z. B. ['x' => '3', 'y' => '1'].
 * Eingabe als Array (ein Feld je Variable) oder als Text "x = 3; y = 1".
 */
class MultiValueAnswer extends AnswerChecker
{
    public function check(string|array $input, array $expected, array $meta = []): CheckResult
    {
        $values = is_array($input) ? $input : $this->parseAssignments($input);
        $tolerance = (float) ($expected['tolerance'] ?? 0.0);
        $allCorrect = true;

        foreach ($expected['values'] as $variable => $target) {
            $raw = trim((string) ($values[$variable] ?? ''));

            if ($raw === '') {
                return CheckResult::invalid("Bitte gib einen Wert für {$variable} an.");
            }

            $value = $this->parseNumber($raw);

            if ($value === null) {
                return CheckResult::invalid("Der Wert für {$variable} konnte nicht gelesen werden.");
            }

            $allCorrect = $allCorrect && $value->equals($this->expectedValue($target), $tolerance);
        }

        return $allCorrect ? CheckResult::correct() : CheckResult::incorrect();
    }

    /**
     * @return array<string, string>
     */
    private function parseAssignments(string $input): array
    {
        preg_match_all('/([a-zA-Z])\s*=\s*(.+?)(?=(?:[;|]|,\s|\s+und\s+)\s*[a-zA-Z]\s*=|$)/u', $input, $matches, PREG_SET_ORDER);

        $values = [];
        foreach ($matches as $m) {
            $values[strtolower($m[1])] = trim($m[2], " \t;|,");
        }

        return $values;
    }
}
