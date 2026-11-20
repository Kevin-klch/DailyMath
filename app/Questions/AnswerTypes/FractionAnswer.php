<?php

namespace App\Questions\AnswerTypes;

class FractionAnswer extends AnswerChecker
{
    public function check(string|array $input, array $expected, array $meta = []): CheckResult
    {
        if (! is_string($input) || trim($input) === '') {
            return CheckResult::invalid(__('Please enter a fraction or a number.'));
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
            return CheckResult::incorrect(__('Almost! Please give the exact result as a fraction.'));
        }

        return CheckResult::incorrect();
    }
}
