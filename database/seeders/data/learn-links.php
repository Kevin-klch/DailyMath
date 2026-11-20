<?php

/*
| Welche Lernartikel (resources/learn) zu welcher Aufgabe passen.
| Schlüssel = Aufgaben-Slug, Wert = Artikel-Slugs, das erste ist das Hauptthema.
*/

return [
    // Startbestand
    'two-fractions' => ['adding-fractions', 'gcd-and-lcm'],
    'order-of-operations' => ['order-of-operations'],
    'the-hypotenuse' => ['pythagorean-theorem'],
    'balanced-equation' => ['linear-equations'],
    'two-roots' => ['quadratic-equations'],
    'small-linear-system' => ['systems-of-equations'],
    'slope-at-a-point' => ['derivatives', 'differentiation-rules'],
    'area-under-the-parabola' => ['area-under-curves', 'integrals'],
    'determinant-2x2' => ['determinants'],
    'binary-logarithm' => ['logarithms'],
    'lucky-dice' => ['probability-basics'],
    'area-of-a-circle' => ['circles'],
    'which-binomial-formula' => ['binomial-formulas'],
    'laws-of-exponents' => ['laws-of-exponents'],
    'infinitely-many-halves' => ['sequences-and-series'],
    'line-through-two-points' => ['linear-functions'],
    'integration-by-parts' => ['integrals', 'differentiation-rules'],
    'largest-rectangle' => ['optimization', 'derivatives'],
    'determinant-3x3' => ['determinants'],
    'three-heads' => ['binomial-distribution', 'combinatorics'],
    'a-famous-limit' => ['limits'],

    // Leicht
    'a-small-share' => ['percentages'],
    'what-remains' => ['adding-fractions'],
    'around-the-garden-bed' => ['quadrilaterals'],
    'a-hidden-number' => ['linear-equations'],
    'a-strong-exponent' => ['powers-and-roots'],
    'the-missing-angle' => ['triangles', 'angles'],
    'right-in-the-middle' => ['adding-fractions', 'statistics-basics'],
    'a-tower-of-numbers' => ['order-of-operations', 'powers-and-roots'],
    'only-one-of-them' => ['prime-numbers', 'divisibility-rules'],
    'a-sail' => ['triangles'],
    'a-number-machine' => ['functions-basics', 'linear-functions'],
    'six-numbers' => ['statistics-basics'],
    'neighbouring-squares' => ['powers-and-roots', 'binomial-formulas'],

    // Mittel
    'two-fractions-meet' => ['multiplying-fractions'],
    'both-sides-grow' => ['linear-equations', 'expanding-and-factoring'],
    'once-around-the-wheel' => ['circles'],
    'the-lowest-point' => ['quadratic-functions'],
    'two-red-ones' => ['tree-diagrams'],
    'up-and-down-again' => ['percentage-change'],
    'plus-or-minus' => ['quadratic-equations'],
    'corner-to-corner' => ['pythagorean-theorem', 'powers-and-roots'],
    'tiny-numbers' => ['logarithms', 'scientific-notation'],
    'how-steep' => ['derivatives', 'differentiation-rules'],
    'the-biggest-slice' => ['fractions-basics', 'decimals'],
    'a-long-addition' => ['sequences-and-series'],

    // Schwer
    'one-arch' => ['area-under-curves', 'integrals', 'trigonometric-functions'],
    'ten-corners' => ['combinatorics'],
    'three-unknowns' => ['gaussian-elimination', 'systems-of-equations'],
    'close-to-zero' => ['limits'],
    'waiting-for-a-six' => ['probability-basics', 'binomial-distribution'],
    'what-is-left-in-the-corners' => ['circles', 'quadrilaterals'],
    'rise-and-fall' => ['curve-sketching', 'differentiation-rules'],
    'under-the-root' => ['quadratic-equations', 'powers-and-roots'],
    'eight-times-over' => ['complex-numbers'],
    'between-two-curves' => ['area-under-curves'],
    'the-very-last-digit' => ['modular-arithmetic'],
    'ninety-nine-fractions' => ['sequences-and-series', 'adding-fractions'],
    'a-triangle-without-a-right-angle' => ['triangles', 'pythagorean-theorem'],
    'powers-side-by-side' => ['exponential-equations', 'laws-of-exponents'],
];
