<?php

namespace App\Models;

use App\Enums\Difficulty;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['challenge_date', 'difficulty', 'number', 'question_id'])]
class DailyChallenge extends Model
{
    protected function casts(): array
    {
        return [
            'challenge_date' => 'immutable_date',
            'difficulty' => Difficulty::class,
        ];
    }

    /** @return BelongsTo<Question, $this> */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /** @return HasMany<ChallengeAttempt, $this> */
    public function attempts(): HasMany
    {
        return $this->hasMany(ChallengeAttempt::class);
    }
}
