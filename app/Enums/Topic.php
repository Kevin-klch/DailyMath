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
            self::Arithmetic => __('Arithmetic'),
            self::Fractions => __('Fractions'),
            self::Geometry => __('Geometry'),
            self::Algebra => __('Algebra'),
            self::Analysis => __('Functions & Calculus'),
            self::Advanced => __('Advanced Mathematics'),
        };
    }
}
