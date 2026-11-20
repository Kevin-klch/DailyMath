<?php

use App\Enums\Difficulty;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\DevResetController;
use App\Http\Controllers\LocaleController;
use App\Http\Middleware\EnsureVisitorId;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

$levels = implode('|', Difficulty::slugs()); // leicht|mittel|schwer

Route::post('locale', [LocaleController::class, 'update'])->name('locale.update');

Route::middleware([EnsureVisitorId::class, SetLocale::class])->group(function () use ($levels) {
    // Übergangsweise: heutige Aufgaben zurücksetzen (nur mit dailymath.dev_tools)
    Route::post('dev/reset', DevResetController::class)->name('dev.reset');

    Route::get('/{level?}', [ChallengeController::class, 'show'])
        ->where('level', $levels)
        ->name('challenge.show');

    Route::prefix('challenge/{level}')
        ->where(['level' => $levels])
        ->name('challenge.')
        ->middleware('throttle:60,1')
        ->group(function () {
            Route::get('/', [ChallengeController::class, 'state'])->name('state');
            Route::post('hint', [ChallengeController::class, 'hint'])->name('hint');
            Route::post('answer', [ChallengeController::class, 'answer'])->name('answer');
        });
});
