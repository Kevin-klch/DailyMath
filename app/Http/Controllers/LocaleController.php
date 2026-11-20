<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rule;

class LocaleController extends Controller
{
    /**
     * Speichert die gewählte Sprache im Browser (Cookie, 5 Jahre) und lädt die Seite neu.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'locale' => ['required', 'string', Rule::in(array_keys(config('dailymath.locales')))],
        ]);

        Cookie::queue(config('dailymath.locale_cookie'), $validated['locale'], 60 * 24 * 365 * 5);

        return redirect()->back(fallback: route('challenge.show'));
    }
}
