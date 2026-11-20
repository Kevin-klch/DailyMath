<?php

namespace App\Http\Controllers;

use App\Models\ChallengeAttempt;
use App\Models\DailyChallenge;
use App\Services\DailyChallengeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Übergangsweise Entwicklerhilfe: setzt die heutigen Aufgaben für den aktuellen Besucher zurück.
 * Nur aktiv, wenn `dailymath.dev_tools` eingeschaltet ist (standardmäßig nur bei APP_ENV=local).
 */
class DevResetController extends Controller
{
    public function __invoke(Request $request, DailyChallengeService $daily): RedirectResponse
    {
        abort_unless(config('dailymath.dev_tools'), 404);

        ChallengeAttempt::query()
            ->where('visitor_id', $request->attributes->get('visitor_id'))
            ->whereIn('daily_challenge_id', array_map(fn (DailyChallenge $c) => $c->id, $daily->currentDay()))
            ->delete();

        return redirect()->back(fallback: route('challenge.show'));
    }
}
