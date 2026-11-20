<?php

namespace App\Enums;

enum AttemptStatus: string
{
    case InProgress = 'in_progress';
    case Solved = 'solved';
    case GivenUp = 'given_up';

    public function isFinished(): bool
    {
        return $this !== self::InProgress;
    }
}
