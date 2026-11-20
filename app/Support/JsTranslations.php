<?php

namespace App\Support;

/**
 * Übersetzungen, die im Frontend-JavaScript gebraucht werden. Die englischen Texte sind
 * gleichzeitig die Schlüssel (siehe lang/de.json) und werden per t() in resources/js/i18n.js genutzt.
 */
class JsTranslations
{
    public const KEYS = [
        // Startbildschirm
        'Play',
        'Continue',
        'Results',

        // Niveaus
        'Solved',
        'Gave up',
        'Started',
        'Open',

        // Ergebnis
        'First try, no hints at all!',
        'Solved on the first try.',
        'Solved after :count tries.',

        // Statistik
        'Played',
        'Success rate',
        'Current streak',
        'Best streak',
        'Avg. solve time',

        // Taschenrechner
        'Answer :letter',
        'Fraction bar',
        'Delete character',
        'Minus',
        'Clear input',
        'Square root',
        'Pi',
        'Decimal point',
        'Space (mixed number like 1 1/2)',
        'Separator for multiple solutions',
        'Check answer',

        // Rückmeldungen
        'Wrong, sorry. Try again – or take a hint.',
        'Too many requests – please wait a moment.',
        'Something went wrong. Please try again.',
        'No connection to the server.',

        // Notizblock
        'Fine',
        'Medium',
        'Thick',
        'notes',
    ];

    /**
     * @return array{locale: string, messages: array<string, string>}
     */
    public static function payload(): array
    {
        $messages = [];
        foreach (self::KEYS as $key) {
            $messages[$key] = __($key);
        }

        return ['locale' => app()->getLocale(), 'messages' => $messages];
    }
}
