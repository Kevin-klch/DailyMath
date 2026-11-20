<?php

namespace App\Http\Controllers;

use App\Enums\Difficulty;
use App\Http\Presenters\ChallengeStatePresenter;
use App\Models\ChallengeAttempt;
use App\Models\DailyChallenge;
use App\Services\ChallengePlayService;
use App\Services\DailyChallengeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChallengeController extends Controller
{
    public function __construct(
        private DailyChallengeService $daily,
        private ChallengePlayService $play,
        private ChallengeStatePresenter $presenter,
    ) {}

    public function show(Request $request, ?string $level = null): View
    {
        $day = $this->daily->currentDay();

        if ($day === []) {
            return view('challenge.empty');
        }

        $challenge = $level !== null
            ? ($day[Difficulty::fromSlug($level)?->value] ?? abort(404, __('There is no challenge for this level today.')))
            : $this->firstOpenChallenge($day, $this->visitorId($request));

        $attempt = $this->play->attemptFor($challenge, $this->visitorId($request));

        return view('challenge.show', [
            'state' => $this->presenter->present($challenge, $attempt),
            'intro' => $level === null, // Startseite: erst der Startbildschirm mit Play-Button
        ]);
    }

    /**
     * Zustand eines Niveaus als JSON – für den Wechsel zwischen den Niveaus ohne Neuladen der Seite.
     */
    public function state(Request $request, string $level): JsonResponse
    {
        $attempt = $this->currentAttempt($request, $level);

        return response()->json($this->presenter->present($attempt->dailyChallenge, $attempt));
    }

    public function hint(Request $request, string $level): JsonResponse
    {
        $attempt = $this->play->revealHint($this->currentAttempt($request, $level));

        return response()->json($this->presenter->present($attempt->dailyChallenge, $attempt));
    }

    public function answer(Request $request, string $level): JsonResponse
    {
        $validated = $request->validate([
            'answer' => ['required'],
            'answer.*' => ['nullable', 'string', 'max:200'],
        ]);

        $input = $validated['answer'];

        if ((! is_string($input) && ! is_array($input)) || (is_string($input) && mb_strlen($input) > 200)) {
            abort(422, __('Invalid answer.'));
        }

        $attempt = $this->currentAttempt($request, $level);
        $check = $this->play->submit($attempt, $input);

        return response()->json($this->presenter->present($attempt->dailyChallenge, $attempt->refresh(), $check));
    }

    /**
     * Ohne gewähltes Niveau startet man mit dem leichtesten, das noch nicht abgeschlossen ist.
     *
     * @param  array<int, DailyChallenge>  $day
     */
    private function firstOpenChallenge(array $day, string $visitorId): DailyChallenge
    {
        $finished = ChallengeAttempt::query()
            ->where('visitor_id', $visitorId)
            ->whereIn('daily_challenge_id', array_map(fn ($c) => $c->id, $day))
            ->whereNot('status', 'in_progress')
            ->pluck('daily_challenge_id')
            ->all();

        foreach ($day as $challenge) {
            if (! in_array($challenge->id, $finished, true)) {
                return $challenge;
            }
        }

        return reset($day);
    }

    /**
     * Aktionen sind immer nur für die Aufgaben des aktuellen Tages möglich.
     */
    private function currentAttempt(Request $request, string $level): ChallengeAttempt
    {
        $difficulty = Difficulty::fromSlug($level) ?? abort(404);
        $challenge = $this->daily->current($difficulty) ?? abort(404, __('There is no challenge for this level today.'));

        return $this->play->attemptFor($challenge, $this->visitorId($request))
            ->load('dailyChallenge.question.hints');
    }

    private function visitorId(Request $request): string
    {
        return $request->attributes->get('visitor_id');
    }
}
