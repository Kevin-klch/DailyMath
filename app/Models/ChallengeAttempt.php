<?php

namespace App\Models;

use App\Enums\AttemptStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Bearbeitung einer Daily-Challenge durch einen (anonymen) Besucher.
 */
#[Fillable(['daily_challenge_id', 'visitor_id', 'user_id', 'status', 'attempts', 'hints_used', 'answers', 'started_at', 'finished_at'])]
class ChallengeAttempt extends Model
{
    protected $attributes = [
        'status' => 'in_progress',
        'attempts' => 0,
        'hints_used' => 0,
    ];

    protected function casts(): array
    {
        return [
            'status' => AttemptStatus::class,
            'answers' => 'array',
            'started_at' => 'immutable_datetime',
            'finished_at' => 'immutable_datetime',
        ];
    }

    /** @return BelongsTo<DailyChallenge, $this> */
    public function dailyChallenge(): BelongsTo
    {
        return $this->belongsTo(DailyChallenge::class);
    }

    public function isFinished(): bool
    {
        return $this->status->isFinished();
    }

    public function durationInSeconds(): ?int
    {
        return $this->finished_at ? (int) $this->started_at->diffInSeconds($this->finished_at) : null;
    }
}
