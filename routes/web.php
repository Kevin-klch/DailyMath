<?php

use App\Enums\Difficulty;
use App\Http\Controllers\Admin;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\DevResetController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\LocaleController;
use App\Http\Middleware\EnsureAdmin;
use App\Http\Middleware\EnsureVisitorId;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

$levels = implode('|', Difficulty::slugs()); // leicht|mittel|schwer

Route::post('locale', [LocaleController::class, 'update'])->name('locale.update');

// Aufgabenverwaltung (Passwort aus DAILYMATH_ADMIN_PASSWORD)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [Admin\AuthController::class, 'show'])->name('login');
    Route::post('login', [Admin\AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.attempt');

    Route::middleware(EnsureAdmin::class)->group(function () {
        Route::post('logout', [Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/', Admin\DashboardController::class)->name('dashboard');

        Route::resource('questions', Admin\QuestionController::class)->except('show');
        Route::patch('questions/{question}/toggle', [Admin\QuestionController::class, 'toggle'])->name('questions.toggle');

        Route::post('schedule/plan', [Admin\ScheduleController::class, 'plan'])->name('schedule.plan');
        Route::patch('schedule/{dailyChallenge}', [Admin\ScheduleController::class, 'update'])->name('schedule.update');
        Route::delete('schedule/{dailyChallenge}', [Admin\ScheduleController::class, 'destroy'])->name('schedule.destroy');

        Route::post('tools/preview', [Admin\ToolsController::class, 'preview'])->name('tools.preview');
        Route::post('tools/check', [Admin\ToolsController::class, 'check'])->name('tools.check');
    });
});

// Lernbereich: Erklärungen zu Mathe-Themen
Route::middleware(SetLocale::class)->prefix('learn')->name('learn.')->group(function () {
    Route::get('/', [LearnController::class, 'index'])->name('index');
    Route::get('{slug}', [LearnController::class, 'show'])->where('slug', '[a-z0-9-]+')->name('show');
});

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
