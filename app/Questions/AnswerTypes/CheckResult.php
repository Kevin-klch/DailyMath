<?php

namespace App\Questions\AnswerTypes;

use App\Enums\CheckStatus;

final readonly class CheckResult
{
    public function __construct(
        public CheckStatus $status,
        public ?string $message = null,
    ) {}

    public static function correct(): self
    {
        return new self(CheckStatus::Correct);
    }

    public static function incorrect(?string $message = null): self
    {
        return new self(CheckStatus::Incorrect, $message);
    }

    public static function invalid(string $message): self
    {
        return new self(CheckStatus::Invalid, $message);
    }
}
