<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DailyChallenge;
use App\Models\Question;
use App\Services\DailyChallengeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Planung der kommenden Tage. Heute und vergangene Tage bleiben unverändert,
 * damit niemandem die Aufgabe „unter den Füßen“ ausgetauscht wird.
 */
class ScheduleController extends Controller
{
    public function plan(DailyChallengeService $daily): RedirectResponse
    {
        $daily->plan(DashboardController::SCHEDULE_DAYS);

        return back()->with('status', 'Die nächsten '.DashboardController::SCHEDULE_DAYS.' Tage sind eingeplant.');
    }

    public function update(Request $request, DailyChallenge $dailyChallenge, DailyChallengeService $daily): RedirectResponse
    {
        if ($dailyChallenge->challenge_date->toDateString() <= $daily->today()->toDateString()) {
            return back()->with('error', 'Heute und vergangene Tage können nicht mehr geändert werden.');
        }

        $validated = $request->validate(['question_id' => ['required', 'integer']]);

        $question = Question::query()
            ->whereKey($validated['question_id'])
            ->where('difficulty', $dailyChallenge->difficulty)
            ->where('is_active', true)
            ->first();

        if (! $question) {
            return back()->with('error', 'Bitte eine aktive Aufgabe desselben Niveaus wählen.');
        }

        $dailyChallenge->update(['question_id' => $question->id]);

        return back()->with('status', "{$dailyChallenge->challenge_date->format('d.m.')} · {$dailyChallenge->difficulty->label()}: „{$question->title}“ eingeplant.");
    }

    /**
     * Einen geplanten zukünftigen Tag wieder freigeben – er wird dann automatisch neu belegt
     * (z. B. nachdem neue Aufgaben angelegt wurden).
     */
    public function destroy(DailyChallenge $dailyChallenge, DailyChallengeService $daily): RedirectResponse
    {
        if ($dailyChallenge->challenge_date->toDateString() <= $daily->today()->toDateString()) {
            return back()->with('error', 'Heute und vergangene Tage können nicht mehr geändert werden.');
        }

        $dailyChallenge->delete();

        return back()->with('status', 'Eintrag entfernt – der Tag wird beim nächsten Planen neu belegt.');
    }
}
