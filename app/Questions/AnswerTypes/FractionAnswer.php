<?php

namespace App\Questions\AnswerTypes;

class FractionAnswer extends AnswerChecker
{
    public function check(string|array $input, array $expected, array $meta = []): CheckResult
    {
        if (! is_string($input) || trim($input) === '') {
            return CheckResult::invalid('Bitte gib einen Bruch oder eine Zahl ein.');
        }

        $value = $this->parseNumber($input);

        if ($value === null) {
            return $this->invalidNumber();
        }

        $target = $this->expectedValue($expected['value']);

        if ($value->isExact() && $value->equals($target)) {
            return CheckResult::correct();
        }

        // Gerundete Dezimalzahl (z. B. 0,583 statt 7/12): fast richtig, aber nicht exakt.
        if ($value->equals($target, 0.001)) {
            return CheckResult::incorrect('Fast! Gib das Ergebnis bitte exakt als Bruch an.');
        }

        return CheckResult::incorrect();
    }
}
