<?php

namespace App\Services;

use App\Enums\AttemptStatus;
use App\Enums\CheckStatus;
use App\Models\ChallengeAttempt;
use App\Models\DailyChallenge;
use App\Questions\AnswerTypes\CheckResult;

/**
 * Spielablauf einer Daily-Challenge: Hinweise aufdecken, Antworten prüfen, aufgeben.
 */
class ChallengePlayService
{
    public function attemptFor(DailyChallenge $challenge, string $visitorId): ChallengeAttempt
    {
        return ChallengeAttempt::createOrFirst(
            ['daily_challenge_id' => $challenge->id, 'visitor_id' => $visitorId],
            ['status' => AttemptStatus::InProgress, 'started_at' => now()],
        );
    }

    /**
     * Deckt den nächsten Hinweis auf. Nach Abschluss sind ohnehin alle Hinweise sichtbar.
     */
    public function revealHint(ChallengeAttempt $attempt): ChallengeAttempt
    {
        $total = $attempt->dailyChallenge->question->hints()->count();

        if (! $attempt->isFinished() && $attempt->hints_used < $total) {
            $attempt->increment('hints_used');
        }

        return $attempt;
    }

    /**
     * @param  string|array<string, string>  $input
     */
    public function submit(ChallengeAttempt $attempt, string|array $input): CheckResult
    {
        if ($attempt->isFinished()) {
            return new CheckResult(
                $attempt->status === AttemptStatus::Solved ? CheckStatus::Correct : CheckStatus::Incorrect,
                'Die heutige Aufgabe ist bereits abgeschlossen.',
            );
        }

        $result = $attempt->dailyChallenge->question->check($input);

        // Nicht interpretierbare Eingaben zählen nicht als Versuch.
        if ($result->status === CheckStatus::Invalid) {
            return $result;
        }

        $answers = $attempt->answers ?? [];
        $answers[] = ['input' => $input, 'status' => $result->status->value, 'at' => now()->toIso8601String()];

        $attempt->fill([
            'attempts' => $attempt->attempts + 1,
            'answers' => $answers,
        ]);

        if ($result->status === CheckStatus::Correct) {
            $attempt->fill(['status' => AttemptStatus::Solved, 'finished_at' => now()]);
        }

        $attempt->save();

        return $result;
    }

    public function giveUp(ChallengeAttempt $attempt): ChallengeAttempt
    {
        if (! $attempt->isFinished()) {
            $attempt->update(['status' => AttemptStatus::GivenUp, 'finished_at' => now()]);
        }

        return $attempt;
    }
}
