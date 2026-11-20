<?php

namespace App\Services;

use App\Enums\Difficulty;
use App\Models\DailyChallenge;
use App\Models\Question;
use Carbon\CarbonImmutable;
use Illuminate\Database\UniqueConstraintViolationException;

/**
 * Verwaltet die Zuordnung "Kalendertag + Niveau → Aufgabe".
 *
 * Jeder Tag hat genau drei Aufgaben (leicht, mittel, schwer). Einmal zugeordnet,
 * ändern sie sich nicht mehr (auch nicht durch Neuladen). Fehlt eine geplante Aufgabe,
 * wird deterministisch eine bisher ungenutzte Aufgabe des Niveaus gewählt und gespeichert.
 */
class DailyChallengeService
{
    public function today(): CarbonImmutable
    {
        return CarbonImmutable::now(config('dailymath.timezone'))->startOfDay();
    }

    public function current(Difficulty $difficulty): ?DailyChallenge
    {
        return $this->forDate($this->today(), $difficulty);
    }

    /**
     * Alle Aufgaben des heutigen Tages, sortiert von leicht nach schwer.
     *
     * @return array<int, DailyChallenge> Schlüssel = Difficulty-Wert; Niveaus ohne Aufgaben fehlen
     */
    public function currentDay(): array
    {
        return $this->forDay($this->today());
    }

    /**
     * @return array<int, DailyChallenge>
     */
    public function forDay(CarbonImmutable $date): array
    {
        $challenges = [];

        foreach (Difficulty::cases() as $difficulty) {
            if ($challenge = $this->forDate($date, $difficulty)) {
                $challenges[$difficulty->value] = $challenge;
            }
        }

        return $challenges;
    }

    public function forDate(CarbonImmutable $date, Difficulty $difficulty): ?DailyChallenge
    {
        $existing = $this->find($date, $difficulty);

        if ($existing) {
            return $existing;
        }

        $question = $this->pickQuestion($date, $difficulty);

        if (! $question) {
            return null;
        }

        try {
            return DailyChallenge::create([
                'challenge_date' => $date->toDateString(),
                'difficulty' => $difficulty,
                'number' => $this->numberFor($date),
                'question_id' => $question->id,
            ]);
        } catch (UniqueConstraintViolationException) {
            // Parallele Anfrage hat die Aufgabe zeitgleich angelegt.
            return $this->find($date, $difficulty);
        }
    }

    /**
     * Plant die Aufgaben der nächsten Tage im Voraus (alle Niveaus).
     *
     * @return list<DailyChallenge>
     */
    public function plan(int $days): array
    {
        $planned = [];
        $today = $this->today();

        for ($i = 0; $i < $days; $i++) {
            array_push($planned, ...array_values($this->forDay($today->addDays($i))));
        }

        return $planned;
    }

    private function find(CarbonImmutable $date, Difficulty $difficulty): ?DailyChallenge
    {
        return DailyChallenge::query()
            ->whereDate('challenge_date', $date->toDateString())
            ->where('difficulty', $difficulty)
            ->first();
    }

    /**
     * Fortlaufende Tagesnummer ab dem ersten Tag der Plattform (#1 = erster Tag).
     */
    private function numberFor(CarbonImmutable $date): int
    {
        $first = DailyChallenge::query()->min('challenge_date');

        // Reine Kalendertage vergleichen, unabhängig von Zeitzonen-Offsets.
        $target = CarbonImmutable::parse($date->toDateString(), 'UTC');
        $start = $first ? CarbonImmutable::parse(substr($first, 0, 10), 'UTC') : $target;

        return max(1, (int) round($start->diffInDays($target)) + 1);
    }

    /**
     * Wählt bevorzugt eine noch nie verwendete Aufgabe des Niveaus, sonst die am längsten nicht gestellte.
     * Die Reihenfolge ist pseudozufällig, aber für Datum und Niveau reproduzierbar.
     */
    private function pickQuestion(CarbonImmutable $date, Difficulty $difficulty): ?Question
    {
        $questions = Question::query()
            ->where('is_active', true)
            ->where('difficulty', $difficulty)
            ->withMax('dailyChallenges as last_used', 'challenge_date')
            ->get();

        if ($questions->isEmpty()) {
            return null;
        }

        $seed = $date->toDateString();

        return $questions
            ->sortBy([
                fn ($a, $b) => ($a->last_used ?? '') <=> ($b->last_used ?? ''),
                fn ($a, $b) => crc32($seed.'#'.$a->id) <=> crc32($seed.'#'.$b->id),
            ])
            ->first();
    }
}
