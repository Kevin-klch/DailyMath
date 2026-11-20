<?php

namespace App\Enums;

enum CheckStatus: string
{
    case Correct = 'correct';
    case Incorrect = 'incorrect';
    case Invalid = 'invalid';
}
