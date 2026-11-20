<?php

use App\Services\DailyChallengeService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('dailymath:plan {--days= : Anzahl Tage ab heute}', function (DailyChallengeService $daily) {
    $days = (int) ($this->option('days') ?: config('dailymath.plan_days'));
    $planned = $daily->plan($days);

    if ($planned === []) {
        $this->warn('Keine aktiven Aufgaben vorhanden – bitte zuerst Aufgaben anlegen (php artisan db:seed).');

        return 1;
    }

    $this->table(
        ['Datum', '#', 'Niveau', 'Aufgabe', 'Thema'],
        collect($planned)->map(fn ($c) => [
            $c->challenge_date->toDateString(),
            $c->number,
            $c->difficulty->label(),
            $c->question->title,
            $c->question->topic->label(),
        ]),
    );

    return 0;
})->purpose('Plant die Daily-Challenges der nächsten Tage im Voraus');

// Sicherstellen, dass die kommenden Tage immer geplant sind.
Schedule::command('dailymath:plan')->dailyAt('23:30')->timezone(config('dailymath.timezone'));
