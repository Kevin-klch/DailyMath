<?php

use App\Enums\Difficulty;
use App\Http\Controllers\ChallengeController;
use App\Http\Middleware\EnsureVisitorId;
use Illuminate\Support\Facades\Route;

$levels = implode('|', Difficulty::slugs()); // leicht|mittel|schwer

Route::middleware(EnsureVisitorId::class)->group(function () use ($levels) {
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
            Route::post('give-up', [ChallengeController::class, 'giveUp'])->name('give-up');
        });
});
