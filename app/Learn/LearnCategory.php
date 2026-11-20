<?php

namespace App\Learn;

/**
 * Kategorien des Lernbereichs – in der Reihenfolge, in der sie auf der Übersicht erscheinen.
 * Die Artikel liegen als Markdown in resources/learn/{locale}/{slug}.md.
 */
enum LearnCategory: string
{
    case Arithmetic = 'arithmetic';
    case Fractions = 'fractions';
    case Algebra = 'algebra';
    case Geometry = 'geometry';
    case Functions = 'functions';
    case Calculus = 'calculus';
    case Stochastics = 'stochastics';
    case LinearAlgebra = 'linear-algebra';
    case Advanced = 'advanced';

    public function label(): string
    {
        return match ($this) {
            self::Arithmetic => __('Numbers & Arithmetic'),
            self::Fractions => __('Fractions, Decimals & Percent'),
            self::Algebra => __('Algebra & Equations'),
            self::Geometry => __('Geometry & Trigonometry'),
            self::Functions => __('Functions'),
            self::Calculus => __('Calculus'),
            self::Stochastics => __('Probability & Statistics'),
            self::LinearAlgebra => __('Vectors & Matrices'),
            self::Advanced => __('Beyond the Basics'),
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::Arithmetic => __('The foundation: number sets, order of operations, primes, powers and roots.'),
            self::Fractions => __('Working with parts of a whole – from reducing fractions to percentages and the rule of three.'),
            self::Algebra => __('Calculating with letters: terms, equations, inequalities, exponents and logarithms.'),
            self::Geometry => __('Shapes, angles, areas and volumes – and how sine and cosine connect angles and lengths.'),
            self::Functions => __('How quantities depend on each other: lines, parabolas, exponential growth and waves.'),
            self::Calculus => __('Limits, derivatives and integrals – the mathematics of change.'),
            self::Stochastics => __('Chance and data: averages, spread, probability, combinatorics and distributions.'),
            self::LinearAlgebra => __('Arrows in space and tables of numbers: vectors, matrices and systems of equations.'),
            self::Advanced => __('A glimpse further: logic, complex numbers, proofs and modular arithmetic.'),
        };
    }

    /**
     * Kleines Symbol für die Kategorie (rein dekorativ).
     */
    public function symbol(): string
    {
        return match ($this) {
            self::Arithmetic => '+−',
            self::Fractions => '½',
            self::Algebra => 'x',
            self::Geometry => '△',
            self::Functions => 'f(x)',
            self::Calculus => '∫',
            self::Stochastics => 'P',
            self::LinearAlgebra => '[ ]',
            self::Advanced => '∞',
        };
    }
}
