<?php

namespace App\Enums;

use App\Questions\AnswerTypes\AnswerChecker;
use App\Questions\AnswerTypes\FractionAnswer;
use App\Questions\AnswerTypes\MultipleChoiceAnswer;
use App\Questions\AnswerTypes\MultiValueAnswer;
use App\Questions\AnswerTypes\NumericAnswer;
use App\Questions\AnswerTypes\SolutionSetAnswer;

/**
 * Antworttypen einer Aufgabe. Jeder Typ besitzt eigene Regeln für Eingabe und Validierung.
 */
enum AnswerType: string
{
    /** Ein Zahlenwert; Dezimalzahlen, Brüche und Ausdrücke wie 25π werden mathematisch verglichen. */
    case Numeric = 'numeric';

    /** Exaktes rationales Ergebnis – gleichwertige Brüche und abbrechende Dezimalzahlen zählen. */
    case Fraction = 'fraction';

    /** Mehrere benannte Werte, z. B. x und y eines Gleichungssystems. */
    case MultiValue = 'multi_value';

    /** Lösungsmenge ohne feste Reihenfolge, z. B. beide Nullstellen. */
    case SolutionSet = 'solution_set';

    /** Auswahl einer Option. */
    case MultipleChoice = 'multiple_choice';

    public function checker(): AnswerChecker
    {
        return app(match ($this) {
            self::Numeric => NumericAnswer::class,
            self::Fraction => FractionAnswer::class,
            self::MultiValue => MultiValueAnswer::class,
            self::SolutionSet => SolutionSetAnswer::class,
            self::MultipleChoice => MultipleChoiceAnswer::class,
        });
    }
}
