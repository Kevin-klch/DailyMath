---
title: Curve Sketching
category: calculus
order: 60
level: 3
summary: A step-by-step plan to analyze a function – intercepts, symmetry, end behavior, extrema and inflection points – and turn it into an accurate sketch.
related: derivatives, differentiation-rules, polynomial-functions, optimization
---

**Curve sketching** means investigating a function systematically until you know exactly what its graph looks like: where it crosses the axes, where it rises and falls, where it has peaks and valleys, and how it bends. It brings together everything from algebra and differential calculus, and it is one of the classic exam tasks.

## The checklist

A complete analysis usually follows these steps:

1. **Domain** – which $x$-values are allowed?
2. **Symmetry** – is the graph symmetric about the $y$-axis or the origin?
3. **Intercepts** – $y$-intercept $f(0)$ and zeros ($f(x) = 0$).
4. **End behavior** – what happens for $x \to \pm\infty$?
5. **Extrema** – maxima and minima using $f'$ and $f''$.
6. **Inflection points** – where the curvature changes, using $f''$ and $f'''$.
7. **Sketch** – combine everything into a graph.

## Symmetry

- $f(-x) = f(x)$ for all $x$: the graph is **symmetric about the $y$-axis** (even function). For polynomials: only even powers of $x$, such as $x^4 - 2x^2 + 1$.
- $f(-x) = -f(x)$ for all $x$: the graph is **symmetric about the origin** (odd function). For polynomials: only odd powers, such as $x^3 - 3x$.

## Extrema

At a maximum or minimum, the tangent is horizontal, so $f'(x) = 0$ is the **necessary condition**. It is not sufficient – the graph might just flatten out briefly. The second derivative decides:

> **Key idea:** If $f'(x_0) = 0$ and $f''(x_0) < 0$, there is a **local maximum** at $x_0$ (the curve bends downward). If $f'(x_0) = 0$ and $f''(x_0) > 0$, there is a **local minimum** (the curve bends upward).

If $f''(x_0) = 0$, this test gives no answer. Then check the sign of $f'$ to the left and right of $x_0$: a change from $+$ to $-$ means a maximum, from $-$ to $+$ a minimum, and no sign change means a **saddle point** (a horizontal inflection point), as for $f(x) = x^3$ at $x = 0$.

## Monotonicity and curvature

- Where $f'(x) > 0$, $f$ is increasing; where $f'(x) < 0$, it is decreasing.
- Where $f''(x) > 0$, the graph is **concave up** (shaped like a cup); where $f''(x) < 0$, it is **concave down** (shaped like a cap).

## Inflection points

An **inflection point** is where the curvature changes from concave up to concave down or vice versa.

> **Key idea:** If $f''(x_0) = 0$ and $f'''(x_0) \ne 0$, then $f$ has an inflection point at $x_0$.

## Full example

Analyze $f(x) = x^3 - 3x$.

**Derivatives:** $f'(x) = 3x^2 - 3$, $f''(x) = 6x$, $f'''(x) = 6$.

**Domain:** all real numbers (polynomial).

**Symmetry:** only odd powers, so $f(-x) = -f(x)$: symmetric about the origin.

**Intercepts:** $f(0) = 0$. Zeros: $x^3 - 3x = x(x^2 - 3) = 0$ gives $x = 0$ and $x = \pm\sqrt{3} \approx \pm 1.73$.

**End behavior:** the leading term $x^3$ dominates: $f(x) \to \infty$ for $x \to \infty$ and $f(x) \to -\infty$ for $x \to -\infty$.

**Extrema:** $3x^2 - 3 = 0$ gives $x = 1$ and $x = -1$.

- $f''(1) = 6 > 0$: minimum. $f(1) = 1 - 3 = -2$, so the minimum is at $(1, -2)$.
- $f''(-1) = -6 < 0$: maximum. $f(-1) = -1 + 3 = 2$, so the maximum is at $(-1, 2)$.

**Monotonicity:** increasing for $x < -1$, decreasing for $-1 < x < 1$, increasing for $x > 1$.

**Inflection point:** $6x = 0$ gives $x = 0$, and $f'''(0) = 6 \ne 0$. The inflection point is $(0, 0)$, where the curve changes from concave down to concave up.

**Sketch:** coming up from the bottom left, the graph rises to the peak $(-1, 2)$, falls through the origin to the valley $(1, -2)$ and rises again to the top right. It crosses the $x$-axis at $-\sqrt{3}$, $0$ and $\sqrt{3}$.

## Rational functions

For fractions such as $f(x) = \frac{1}{x - 2}$, two more points belong in the checklist: **poles** (vertical asymptotes, where the denominator is zero) and **horizontal or oblique asymptotes** (from the end behavior). The limits article explains how to find them.

## Common mistakes

- Taking $f'(x_0) = 0$ as proof of an extremum without checking $f''$ or the sign change.
- Giving only the $x$-value of a point – a point needs both coordinates, so plug $x_0$ into $f$ (not into $f'$).
- Plugging the critical $x$-value into $f'$ instead of $f''$ for the sufficient condition.
- Concluding "no inflection point" just because $f'''(x_0) = 0$ – then check the sign change of $f''$.

## Practice

1. Find the extremum of $f(x) = x^2 - 4x + 1$.

<details>
<summary>Solution</summary>

$f'(x) = 2x - 4 = 0$ gives $x = 2$. $f''(x) = 2 > 0$, so it is a minimum. $f(2) = 4 - 8 + 1 = -3$. Minimum at $(2, -3)$.

</details>

2. Find all extrema and the inflection point of $f(x) = x^3 - 6x^2 + 9x$.

<details>
<summary>Solution</summary>

$f'(x) = 3x^2 - 12x + 9 = 3(x - 1)(x - 3)$, zeros $x = 1$ and $x = 3$. $f''(x) = 6x - 12$.

$f''(1) = -6 < 0$: maximum at $(1, 4)$, since $f(1) = 1 - 6 + 9 = 4$. $f''(3) = 6 > 0$: minimum at $(3, 0)$, since $f(3) = 27 - 54 + 27 = 0$.

$f''(x) = 0$ gives $x = 2$, and $f'''(x) = 6 \ne 0$. Inflection point at $(2, 2)$, since $f(2) = 8 - 24 + 18 = 2$.

</details>

3. Show that $f(x) = x^4 - 2x^2$ is symmetric and find its extrema.

<details>
<summary>Solution</summary>

Only even powers, so it is symmetric about the $y$-axis. $f'(x) = 4x^3 - 4x = 4x(x^2 - 1)$, zeros $x = 0$, $x = 1$, $x = -1$. $f''(x) = 12x^2 - 4$.

$f''(0) = -4 < 0$: maximum at $(0, 0)$. $f''(\pm 1) = 8 > 0$: minima at $(1, -1)$ and $(-1, -1)$.

</details>

4. Describe the end behavior of $f(x) = -2x^3 + x$.

<details>
<summary>Solution</summary>

The leading term $-2x^3$ decides. For $x \to \infty$: $f(x) \to -\infty$. For $x \to -\infty$: $f(x) \to \infty$. The graph comes from the top left and goes to the bottom right.

</details>
