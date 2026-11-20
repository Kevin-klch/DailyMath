<?php

namespace App\Http\Presenters;

use App\Enums\AttemptStatus;
use App\Enums\CheckStatus;
use App\Learn\LearnRepository;
use App\Models\ChallengeAttempt;
use App\Models\DailyChallenge;
use App\Models\Question;
use App\Models\QuestionHint;
use App\Questions\AnswerTypes\CheckResult;
use App\Services\DailyChallengeService;
use App\Services\StatisticsService;
use App\Support\MathText;
use Illuminate\Support\Collection;

/**
 * Baut den Zustand, den das Frontend zur Darstellung der Daily-Challenge braucht.
 *
 * Wichtig: Lösung, Musterlösung und noch nicht aufgedeckte Hinweise werden erst
 * ausgeliefert, wenn sie für den Nutzer sichtbar sein dürfen.
 */
class ChallengeStatePresenter
{
    public function __construct(
        private StatisticsService $statistics,
        private DailyChallengeService $daily,
        private LearnRepository $learn,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function present(DailyChallenge $challenge, ChallengeAttempt $attempt, ?CheckResult $check = null): array
    {
        $question = $challenge->question;
        $hints = $question->hints;
        $finished = $attempt->isFinished();
        $visibleHints = $finished ? $hints : $hints->take($attempt->hints_used);
        $stats = $this->statistics->forVisitor($attempt->visitor_id);
        $meta = $question->localizedAnswerMeta();
        $day = $this->dayWithAttempts($challenge, $attempt->visitor_id);

        return [
            'challenge' => [
                'number' => $challenge->number,
                'date' => $challenge->challenge_date->locale(app()->getLocale())->isoFormat('dddd, LL'),
                'title' => $question->translated('title'),
                'prompt' => MathText::toHtml($question->translated('prompt')),
                'topic' => $question->topic->label(),
                'topic_key' => $question->topic->value,
                'level' => $challenge->difficulty->slug(),
                'difficulty' => ['level' => $challenge->difficulty->value, 'label' => $challenge->difficulty->label()],
                'answer_type' => $question->answer_type->value,
                'variables' => $meta['variables'] ?? [],
                'options' => collect($meta['options'] ?? [])
                    ->map(fn (string $label, string $key) => ['key' => $key, 'label' => MathText::toHtml($label)])
                    ->values(),
                'placeholder' => $meta['placeholder'] ?? null,
                'unit' => $meta['unit'] ?? null,
                'learn' => $this->learnLinks($question),
            ],
            'attempt' => [
                'status' => $attempt->status->value,
                'attempts' => $attempt->attempts,
                'hints_used' => $attempt->hints_used,
                'hints_total' => $hints->count(),
            ],
            'hints' => $visibleHints->map(fn (QuestionHint $hint) => [
                'position' => $hint->position,
                'label' => $hint->translated('label'),
                'content' => MathText::toHtml($hint->translated('content')),
            ])->values(),
            'check' => $check ? ['status' => $check->status->value, 'message' => $check->message] : null,
            'result' => $finished ? [
                'solved' => $attempt->status === AttemptStatus::Solved,
                'duration' => $attempt->durationInSeconds(),
                'solution' => MathText::toHtml($question->translated('solution')),
                'background' => MathText::toHtml($question->translated('background')),
                'share_text' => $this->shareText($day, $stats['current_streak']),
            ] : null,
            // Übersicht der drei Niveaus des Tages für die Reiter
            'levels' => $day->map(fn (DailyChallenge $c) => [
                'slug' => $c->difficulty->slug(),
                'label' => $c->difficulty->label(),
                'level' => $c->difficulty->value,
                'url' => route('challenge.show', $c->difficulty->slug()),
                'status' => $this->levelStatus($c->visitorAttempt),
                'current' => $c->is($challenge),
            ])->values(),
            'stats' => $stats,
            // Sekunden bis zur nächsten Aufgabe (00:00 Uhr in der Plattform-Zeitzone)
            'next_challenge_in' => (int) now(config('dailymath.timezone'))
                ->diffInSeconds(now(config('dailymath.timezone'))->addDay()->startOfDay()),
        ];
    }

    /**
     * Nur Öffnen zählt noch nicht als "begonnen" – erst eine Antwort oder ein Hinweis.
     */
    private function levelStatus(?ChallengeAttempt $attempt): ?string
    {
        if (! $attempt || (! $attempt->isFinished() && $attempt->attempts === 0 && $attempt->hints_used === 0)) {
            return null;
        }

        return $attempt->status->value;
    }

    /**
     * Alle Aufgaben desselben Tages inkl. der Bearbeitung durch diesen Besucher.
     *
     * @return Collection<int, DailyChallenge>
     */
    private function dayWithAttempts(DailyChallenge $challenge, string $visitorId): Collection
    {
        // Stellt sicher, dass alle Niveaus des Tages angelegt sind.
        $ids = array_map(fn (DailyChallenge $c) => $c->id, $this->daily->forDay($challenge->challenge_date));

        $day = DailyChallenge::query()
            ->whereKey($ids)
            ->orderBy('difficulty')
            ->with(['question.hints', 'attempts' => fn ($q) => $q->where('visitor_id', $visitorId)])
            ->get();

        return $day->each(fn (DailyChallenge $c) => $c->setRelation('visitorAttempt', $c->attempts->first()));
    }

    /**
     * Passende Lernartikel zur Aufgabe (Titel in der aktuellen Sprache); unbekannte Slugs werden übersprungen.
     *
     * @return list<array{slug: string, title: string, url: string}>
     */
    private function learnLinks(Question $question): array
    {
        return collect($question->learn_topics ?? [])
            ->map(fn (string $slug) => $this->learn->meta($slug))
            ->filter()
            ->map(fn (array $article) => [
                'slug' => $article['slug'],
                'title' => $article['title'],
                'url' => route('learn.show', $article['slug']),
            ])
            ->values()
            ->all();
    }

    /**
     * Kompakte Ergebnisdarstellung des ganzen Tages zum Teilen – verrät keine Lösung.
     *
     * @param  Collection<int, DailyChallenge>  $day
     */
    private function shareText(Collection $day, int $streak): string
    {
        $lines = ["DailyMath #{$day->first()->number}"];

        foreach ($day as $challenge) {
            /** @var ChallengeAttempt|null $attempt */
            $attempt = $challenge->visitorAttempt;
            $prefix = $challenge->difficulty->shareIcon().' '.str_pad($challenge->difficulty->label(), 7);

            if (! $attempt?->isFinished()) {
                $lines[] = $prefix.'⬜ '.__('open');

                continue;
            }

            $wrong = collect($attempt->answers ?? [])->where('status', CheckStatus::Incorrect->value)->count();
            $tries = str_repeat('🟥', min($wrong, 6)).($attempt->status === AttemptStatus::Solved ? '🟧' : '🏳️');
            $hints = $attempt->hints_used > 0 ? "  💡{$attempt->hints_used}" : '';

            $lines[] = $prefix.$tries.$hints;
        }

        if ($streak > 0) {
            $lines[] = '🔥 '.trans_choice(':count day streak|:count day streak', $streak);
        }

        $lines[] = url('/');

        return implode("\n", $lines);
    }
}
