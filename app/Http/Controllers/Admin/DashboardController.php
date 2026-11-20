<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Difficulty;
use App\Http\Controllers\Controller;
use App\Models\DailyChallenge;
use App\Models\Question;
use App\Services\DailyChallengeService;
use Illuminate\View\View;

/**
 * Überblick: Wie lange reicht der Aufgabenvorrat noch, und was ist für die nächsten Tage geplant?
 */
class DashboardController extends Controller
{
    public const SCHEDULE_DAYS = 14;

    public function __invoke(DailyChallengeService $daily): View
    {
        $today = $daily->today();
        $until = $today->addDays(self::SCHEDULE_DAYS - 1);

        $pool = collect(Difficulty::cases())->map(function (Difficulty $difficulty) use ($today) {
            $active = Question::where('difficulty', $difficulty)->where('is_active', true);
            $plannedAhead = DailyChallenge::where('difficulty', $difficulty)->whereDate('challenge_date', '>', $today->toDateString())->count();
            $unused = (clone $active)->doesntHave('dailyChallenges')->count();

            return [
                'difficulty' => $difficulty,
                'active' => (clone $active)->count(),
                'unused' => $unused,
                'planned_ahead' => $plannedAhead,
                // So viele Tage ab morgen kommen ohne Wiederholung aus: bereits geplante + nie gestellte Aufgaben
                'fresh_days' => $plannedAhead + $unused,
            ];
        });

        $planned = DailyChallenge::query()
            ->with('question')
            ->whereDate('challenge_date', '>=', $today->toDateString())
            ->whereDate('challenge_date', '<=', $until->toDateString())
            ->get()
            ->groupBy(fn (DailyChallenge $c) => $c->challenge_date->toDateString());

        $days = collect(range(0, self::SCHEDULE_DAYS - 1))->map(fn (int $i) => [
            'date' => $date = $today->addDays($i),
            'is_today' => $i === 0,
            'challenges' => ($planned[$date->toDateString()] ?? collect())->keyBy(fn (DailyChallenge $c) => $c->difficulty->value),
        ]);

        $choices = Question::query()
            ->where('is_active', true)
            ->withMax(['dailyChallenges as last_used' => fn ($q) => $q->whereDate('challenge_date', '<=', $today->toDateString())], 'challenge_date')
            ->orderBy('title')
            ->get()
            ->groupBy(fn (Question $q) => $q->difficulty->value);

        return view('admin.dashboard', [
            'pool' => $pool,
            'days' => $days,
            'choices' => $choices,
        ]);
    }
}
