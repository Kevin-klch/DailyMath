<?php

namespace App\Enums;

/**
 * Die Stufen der gestuften Hinweise (siehe Projektkonzept, Abschnitt 4).
 * Die Bezeichnungen werden pro Hinweis gespeichert (Englisch + deutsche Übersetzung).
 */
enum HintStage: string
{
    case Nudge = 'nudge';
    case Approach = 'approach';
    case Help = 'help';
    case Almost = 'almost';

    public function label(string $locale = 'en'): string
    {
        return match ($this) {
            self::Nudge => $locale === 'de' ? 'Denkanstoß' : 'Nudge',
            self::Approach => $locale === 'de' ? 'Lösungsansatz' : 'Approach',
            self::Help => $locale === 'de' ? 'Konkrete Hilfestellung' : 'Concrete help',
            self::Almost => $locale === 'de' ? 'Fast vollständige Lösung' : 'Almost the full solution',
        };
    }

    /**
     * Stufe anhand einer gespeicherten (englischen oder deutschen) Bezeichnung wiederfinden.
     */
    public static function fromLabel(?string $label): ?self
    {
        foreach (self::cases() as $stage) {
            if (in_array($label, [$stage->label('en'), $stage->label('de')], true)) {
                return $stage;
            }
        }

        return null;
    }
}
