<?php

namespace App\Models\Concerns;

/**
 * Inhalte liegen in der Grundsprache (Englisch) in den normalen Spalten,
 * Übersetzungen in der JSON-Spalte `translations`: {"de": {"title": "…"}}.
 */
trait HasTranslations
{
    public function initializeHasTranslations(): void
    {
        $this->mergeCasts(['translations' => 'array']);
    }

    /**
     * Übersetzter Wert eines Attributs in der aktuellen Sprache – mit Rückfall auf die Grundsprache.
     */
    public function translated(string $attribute, ?string $locale = null): mixed
    {
        $locale ??= app()->getLocale();

        return $this->translations[$locale][$attribute] ?? $this->getAttribute($attribute);
    }
}
