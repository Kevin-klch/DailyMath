<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Vergibt jedem Besucher eine anonyme, dauerhafte ID, damit DailyMath ohne Konto
 * nutzbar ist und Ergebnisse, Streak und Statistik trotzdem gespeichert werden.
 */
class EnsureVisitorId
{
    public function handle(Request $request, Closure $next): Response
    {
        $name = config('dailymath.visitor_cookie');
        $visitorId = $request->cookie($name);

        if (! is_string($visitorId) || ! Str::isUuid($visitorId)) {
            $visitorId = (string) Str::uuid();
        }

        $request->attributes->set('visitor_id', $visitorId);

        // Laufzeit bei jedem Besuch erneuern (5 Jahre).
        Cookie::queue($name, $visitorId, 60 * 24 * 365 * 5);

        return $next($request);
    }
}
