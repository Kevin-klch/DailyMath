<?php

namespace App\Support;

/**
 * Wandelt Aufgabentexte in sicheres HTML um.
 *
 * Der Text wird vollständig escaped; LaTeX in $…$ / $$…$$ bleibt erhalten und
 * wird im Browser von KaTeX gerendert. Leerzeilen trennen Absätze, **fett** wird hervorgehoben.
 */
final class MathText
{
    public static function toHtml(?string $text): string
    {
        if ($text === null || trim($text) === '') {
            return '';
        }

        $paragraphs = preg_split('/\R{2,}/', trim($text));

        return collect($paragraphs)
            ->map(function (string $paragraph) {
                $html = e(trim($paragraph));
                $html = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $html);

                return '<p>'.nl2br($html, false).'</p>';
            })
            ->implode("\n");
    }
}
