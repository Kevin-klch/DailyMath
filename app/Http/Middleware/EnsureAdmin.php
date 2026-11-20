<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Schützt die Aufgabenverwaltung. Es gibt (noch) keine Benutzerkonten – der Zugang erfolgt
 * über ein Passwort aus der .env (DAILYMATH_ADMIN_PASSWORD). Ist keins gesetzt, ist der Bereich aus.
 */
class EnsureAdmin
{
    public const SESSION_KEY = 'dailymath_admin';

    public function handle(Request $request, Closure $next): Response
    {
        abort_if(blank(config('dailymath.admin_password')), 404);

        if (! $request->session()->get(self::SESSION_KEY)) {
            return redirect()->guest(route('admin.login'));
        }

        app()->setLocale('de'); // Die Verwaltung ist (vorerst) deutschsprachig

        return $next($request);
    }
}
