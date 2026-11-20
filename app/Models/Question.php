<?php

namespace App\Models;

use App\Enums\AnswerType;
use App\Enums\Difficulty;
use App\Enums\Topic;
use App\Models\Concerns\HasTranslations;
use App\Questions\AnswerTypes\CheckResult;
use Database\Factories\QuestionFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['slug', 'title', 'prompt', 'topic', 'difficulty', 'answer_type', 'answer', 'answer_meta', 'solution', 'background', 'translations', 'is_active'])]
class Question extends Model
{
    /** @use HasFactory<QuestionFactory> */
    use HasFactory, HasTranslations;

    protected function casts(): array
    {
        return [
            'topic' => Topic::class,
            'difficulty' => Difficulty::class,
            'answer_type' => AnswerType::class,
            'answer' => 'array',
            'answer_meta' => 'array',
            'is_active' => 'boolean',
        ];
    }

    /** @return HasMany<QuestionHint, $this> */
    public function hints(): HasMany
    {
        return $this->hasMany(QuestionHint::class)->orderBy('position');
    }

    /** @return HasMany<DailyChallenge, $this> */
    public function dailyChallenges(): HasMany
    {
        return $this->hasMany(DailyChallenge::class);
    }

    /**
     * Antwort-Metadaten (Platzhalter, Einheit, …) inkl. übersetzter Teile in der aktuellen Sprache.
     *
     * @return array<string, mixed>
     */
    public function localizedAnswerMeta(): array
    {
        return array_merge($this->answer_meta ?? [], $this->translations[app()->getLocale()]['answer_meta'] ?? []);
    }

    /**
     * @param  string|array<string, string>  $input
     */
    public function check(string|array $input): CheckResult
    {
        return $this->answer_type->checker()->check($input, $this->answer, $this->answer_meta ?? []);
    }
}
