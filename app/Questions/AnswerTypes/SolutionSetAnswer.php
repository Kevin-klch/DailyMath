<?php

namespace App\Questions\AnswerTypes;

/**
 * Lösungsmenge ohne feste Reihenfolge, z. B. die Nullstellen {2; 3}.
 * Trennzeichen: Semikolon, senkrechter Strich, "und" oder Komma mit Leerzeichen.
 */
class SolutionSetAnswer extends AnswerChecker
{
    public function check(string|array $input, array $expected, array $meta = []): CheckResult
    {
        $parts = is_array($input) ? array_values($input) : $this->split($input);
        $parts = array_values(array_filter(array_map('trim', $parts), fn ($p) => $p !== ''));

        if ($parts === []) {
            return CheckResult::invalid(__('Please enter the solutions separated by a semicolon, e.g. 2; 3.'));
        }

        $values = [];
        foreach ($parts as $part) {
            $value = $this->parseNumber($part);
            if ($value === null) {
                return CheckResult::invalid('„'.$part.'“ konnte nicht als Zahl gelesen werden.');
            }
            $values[] = $value;
        }

        $targets = array_map(fn ($t) => $this->expectedValue($t), $expected['values']);
        $tolerance = (float) ($expected['tolerance'] ?? 0.0);

        if (count($values) !== count($targets)) {
            return CheckResult::incorrect(__('Exactly :count solutions are required.', ['count' => count($targets)]));
        }

        // Jede Lösung muss genau einem erwarteten Wert zugeordnet werden können.
        foreach ($values as $value) {
            $index = null;
            foreach ($targets as $key => $target) {
                if ($value->equals($target, $tolerance)) {
                    $index = $key;
                    break;
                }
            }

            if ($index === null) {
                return CheckResult::incorrect();
            }
            unset($targets[$index]);
        }

        return CheckResult::correct();
    }

    /**
     * @return list<string>
     */
    private function split(string $input): array
    {
        $input = trim($input, " \t{}");

        return preg_split('/\s*(?:;|\||\bund\b|,\s+)\s*/u', $input) ?: [];
    }
}
