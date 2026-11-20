<?php

namespace App\Questions\AnswerTypes;

class NumericAnswer extends AnswerChecker
{
    public function check(string|array $input, array $expected, array $meta = []): CheckResult
    {
        if (! is_string($input) || trim($input) === '') {
            return CheckResult::invalid(__('Please enter a number.'));
        }

        $value = $this->parseNumber($input);

        if ($value === null) {
            return $this->invalidNumber();
        }

        return $value->equals($this->expectedValue($expected['value']), (float) ($expected['tolerance'] ?? 0.0))
            ? CheckResult::correct()
            : CheckResult::incorrect();
    }
}
