<?php

namespace App\Services;

use App\Enums\AttemptStatus;
use App\Models\ChallengeAttempt;
use Carbon\CarbonImmutable;

class StatisticsService
{
    public function __construct(private DailyChallengeService $daily) {}

    /**
     * @return array{played: int, solved: int, success_rate: int, current_streak: int, best_streak: int, average_seconds: ?int}
     */
    public function forVisitor(string $visitorId): array
    {
        $attempts = ChallengeAttempt::query()
            ->with('dailyChallenge:id,challenge_date')
            ->where('visitor_id', $visitorId)
            ->whereNot('status', AttemptStatus::InProgress)
            ->get();

        $solved = $attempts->where('status', AttemptStatus::Solved);
        $solvedDates = $solved
            ->map(fn (ChallengeAttempt $a) => $a->dailyChallenge->challenge_date->toDateString())
            ->unique()
            ->sort()
            ->values()
            ->all();

        $durations = $solved->map->durationInSeconds()->filter(fn ($s) => $s !== null);

        return [
            'played' => $attempts->count(),
            'solved' => $solved->count(),
            'success_rate' => $attempts->isEmpty() ? 0 : (int) round($solved->count() / $attempts->count() * 100),
            'current_streak' => $this->currentStreak($solvedDates, $this->daily->today()),
            'best_streak' => $this->bestStreak($solvedDates),
            'average_seconds' => $durations->isEmpty() ? null : (int) round($durations->avg()),
        ];
    }

    /**
     * Aufeinanderfolgende gelöste Tage bis heute. Ist heute noch offen, zählt die Serie bis gestern.
     *
     * @param  list<string>  $solvedDates
     */
    public function currentStreak(array $solvedDates, CarbonImmutable $today): int
    {
        $lookup = array_flip($solvedDates);
        $day = isset($lookup[$today->toDateString()]) ? $today : $today->subDay();
        $streak = 0;

        while (isset($lookup[$day->toDateString()])) {
            $streak++;
            $day = $day->subDay();
        }

        return $streak;
    }

    /**
     * @param  list<string>  $solvedDates  aufsteigend sortiert
     */
    public function bestStreak(array $solvedDates): int
    {
        $best = 0;
        $run = 0;
        $previous = null;

        foreach ($solvedDates as $date) {
            $current = CarbonImmutable::parse($date);
            $run = $previous && (int) $previous->diffInDays($current) === 1 ? $run + 1 : 1;
            $best = max($best, $run);
            $previous = $current;
        }

        return $best;
    }
}
