<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Setzt die Sprache anhand des Sprach-Cookies. Ohne Auswahl ist die Seite englisch.
 */
class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->cookie(config('dailymath.locale_cookie'));

        if (! is_string($locale) || ! array_key_exists($locale, config('dailymath.locales'))) {
            $locale = config('app.locale');
        }

        app()->setLocale($locale);
        Carbon::setLocale($locale);
        CarbonImmutable::setLocale($locale);

        return $next($request);
    }
}
