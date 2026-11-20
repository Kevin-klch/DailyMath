---
title: Continuity
category: calculus
order: 30
level: 3
summary: When can you draw a graph without lifting your pen? The precise definition of continuity, types of discontinuities and the intermediate value theorem.
related: limits, derivatives, functions-basics
---

Intuitively, a function is **continuous** if you can draw its graph in one stroke, without lifting your pen. Continuity is more than a nice property: many important theorems – such as the guarantee that a function crossing from negative to positive values must have a zero – only work for continuous functions. This article turns the pen picture into a precise definition using limits.

## The definition

A function $f$ is **continuous at the point** $x = a$ if three conditions hold:

1. $f(a)$ is defined,
2. the limit $\lim_{x \to a} f(x)$ exists (left and right limits agree),
3. the limit equals the function value.

> **Key idea:** $f$ is continuous at $a$ if $\lim_{x \to a} f(x) = f(a)$. In words: when $x$ comes close to $a$, then $f(x)$ comes close to $f(a)$ – there are no jumps.

A function is called continuous (on an interval) if it is continuous at every point of that interval.

## Which functions are continuous?

Good news: almost all functions you meet in school are continuous on their domain:

- polynomials such as $x^3 - 2x + 1$,
- exponential functions such as $e^x$, and logarithms on $x > 0$,
- $\sin x$ and $\cos x$,
- rational functions such as $\frac{1}{x}$ at every point where the denominator is not zero.

Sums, differences, products, quotients (where the denominator is not zero) and compositions of continuous functions are continuous again. So you usually only need to check continuity at special points – where a piecewise function changes its formula, or where a denominator becomes zero.

## Types of discontinuities

### Jump

The left and right limits exist but are different. Example:

$$f(x) = \begin{cases} 1 & \text{for } x < 0 \\ 2 & \text{for } x \ge 0 \end{cases}$$

At $x = 0$ the graph jumps from height $1$ to height $2$.

### Removable discontinuity (hole)

The limit exists, but $f(a)$ is undefined or has the "wrong" value. Example: $f(x) = \frac{x^2 - 1}{x - 1}$ is undefined at $x = 1$. For $x \ne 1$ it equals $x + 1$, so $\lim_{x \to 1} f(x) = 2$. The graph is a straight line with a single missing point. If you define $f(1) = 2$, the gap is closed and the function becomes continuous.

### Pole

The function values grow beyond every bound, as for $\frac{1}{x}$ near $x = 0$. Strictly speaking, $\frac{1}{x}$ is continuous on its domain – the point $0$ simply does not belong to it. But the graph cannot be drawn in one stroke across $x = 0$.

## Checking piecewise functions

### Example 1

Is $f(x) = \begin{cases} x^2 & \text{for } x \le 1 \\ 2x - 1 & \text{for } x > 1 \end{cases}$ continuous at $x = 1$?

- Function value: $f(1) = 1^2 = 1$.
- Left limit: $\lim_{x \to 1^-} x^2 = 1$.
- Right limit: $\lim_{x \to 1^+} (2x - 1) = 1$.

All three agree, so $f$ is continuous at $x = 1$.

### Example 2: finding a parameter

For which $a$ is $f(x) = \begin{cases} x + a & \text{for } x < 2 \\ x^2 & \text{for } x \ge 2 \end{cases}$ continuous?

Both pieces are continuous on their own, so only $x = 2$ matters. The left limit is $2 + a$, the right limit and function value are $2^2 = 4$. Continuity requires $2 + a = 4$, so $a = 2$.

## The intermediate value theorem

> **Key idea:** If $f$ is continuous on $[a, b]$, then $f$ takes every value between $f(a)$ and $f(b)$. In particular: if $f(a)$ and $f(b)$ have opposite signs, $f$ has at least one zero between $a$ and $b$.

### Example 3

Does $f(x) = x^3 + x - 1$ have a zero between $0$ and $1$?

$f(0) = -1 < 0$ and $f(1) = 1 > 0$. Since $f$ is a polynomial and therefore continuous, there must be a zero in between – even though we cannot easily compute it exactly. Numerical methods such as bisection are based on exactly this idea.

A related result, the **extreme value theorem**, states that a continuous function on a closed interval $[a, b]$ always has a largest and a smallest value.

## Continuity and differentiability

Every differentiable function is continuous, but not the other way round. The absolute value function $f(x) = |x|$ is continuous at $0$, but its graph has a sharp corner there, so it has no derivative at $0$.

## Common mistakes

- Checking only the function value or only one side – all three conditions must be verified.
- Calling $\frac{1}{x}$ "discontinuous at $0$" without noticing that $0$ is not in the domain at all.
- Forgetting that at the boundary of a piecewise function you must use the correct formula for each side.
- Using the intermediate value theorem for functions that are not continuous on the whole interval.

## Practice

1. Is $f(x) = \begin{cases} 3x - 1 & \text{for } x < 2 \\ x^2 + 1 & \text{for } x \ge 2 \end{cases}$ continuous at $x = 2$?

<details>
<summary>Solution</summary>

Left limit: $3 \cdot 2 - 1 = 5$. Right limit and function value: $2^2 + 1 = 5$. All agree, so $f$ is continuous at $x = 2$.

</details>

2. Find $k$ so that $f(x) = \begin{cases} kx & \text{for } x \le 3 \\ x^2 - 3 & \text{for } x > 3 \end{cases}$ is continuous.

<details>
<summary>Solution</summary>

At $x = 3$: left side $3k$, right side $9 - 3 = 6$. From $3k = 6$ we get $k = 2$.

</details>

3. $g(x) = \frac{x^2 - 4}{x + 2}$ is undefined at $x = -2$. Which value must $g(-2)$ get to make $g$ continuous?

<details>
<summary>Solution</summary>

For $x \ne -2$: $\frac{(x-2)(x+2)}{x+2} = x - 2$. The limit at $-2$ is $-2 - 2 = -4$, so define $g(-2) = -4$. It is a removable discontinuity.

</details>

4. Show that $f(x) = x^3 - 3x + 1$ has a zero between $0$ and $1$.

<details>
<summary>Solution</summary>

$f(0) = 1 > 0$ and $f(1) = 1 - 3 + 1 = -1 < 0$. $f$ is a polynomial and therefore continuous, so by the intermediate value theorem it has a zero in the interval $(0, 1)$.

</details>
