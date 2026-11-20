<?php

namespace App\Questions\AnswerTypes;

class MultipleChoiceAnswer extends AnswerChecker
{
    public function check(string|array $input, array $expected, array $meta = []): CheckResult
    {
        if (! is_string($input) || ! array_key_exists($input, $meta['options'] ?? [])) {
            return CheckResult::invalid(__('Please choose one of the options.'));
        }

        return $input === $expected['choice'] ? CheckResult::correct() : CheckResult::incorrect();
    }
}
