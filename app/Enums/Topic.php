<?php

namespace App\Enums;

enum Topic: string
{
    case Arithmetic = 'arithmetic';
    case Fractions = 'fractions';
    case Geometry = 'geometry';
    case Algebra = 'algebra';
    case Analysis = 'analysis';
    case Advanced = 'advanced';

    public function label(): string
    {
        return match ($this) {
            self::Arithmetic => 'Grundrechenarten',
            self::Fractions => 'Bruchrechnung',
            self::Geometry => 'Geometrie',
            self::Algebra => 'Algebra',
            self::Analysis => 'Funktionen & Analysis',
            self::Advanced => 'Weiterführende Mathematik',
        };
    }
}
