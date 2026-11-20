---
title: Polynomial Functions
category: functions
order: 40
level: 3
summary: Functions built from powers of x – degree, leading coefficient, end behaviour, symmetry, zeros and multiplicities, substitution and polynomial division.
related: quadratic-functions, expanding-and-factoring, curve-sketching, limits
---

A **polynomial function** is a sum of powers of $x$ with constant coefficients. Linear and quadratic functions are the simplest examples, but polynomials of higher degree can model far more complex shapes – curves with several hills and valleys. Because they are easy to evaluate and differentiate, they are the standard example in curve sketching.

## Definition and vocabulary

A polynomial function of degree $n$ has the form

$$f(x) = a_n x^n + a_{n-1} x^{n-1} + \dots + a_1 x + a_0 \qquad (a_n \neq 0)$$

- The numbers $a_0, a_1, \dots, a_n$ are the **coefficients**.
- $n$, the highest power that occurs, is the **degree**.
- $a_n$ is the **leading coefficient**, $a_n x^n$ the leading term.
- $a_0 = f(0)$ is the **y-intercept**.

For example, $f(x) = -2x^3 + x^2 + 5$ has degree $3$, leading coefficient $-2$ and y-intercept $5$. Expressions like $\frac{1}{x}$ or $\sqrt{x}$ are **not** allowed – only non-negative whole powers.

## End behaviour

For very large $|x|$ the leading term dominates all others. So the behaviour "at the ends" depends only on the degree and the sign of $a_n$:

| | $a_n > 0$ | $a_n < 0$ |
|---|---|---|
| $n$ even | up on both sides | down on both sides |
| $n$ odd | down on the left, up on the right | up on the left, down on the right |

> **Key idea:** The end behaviour of a polynomial is determined by its leading term $a_n x^n$ alone: even degree – both ends point the same way; odd degree – opposite ways.

In limit notation, for $f(x) = -2x^3 + x^2 + 5$: as $x \to \infty$, $f(x) \to -\infty$, and as $x \to -\infty$, $f(x) \to \infty$.

## Symmetry

- If $f$ contains **only even** powers of $x$ (a constant counts as $x^0$), then $f(-x) = f(x)$: the graph is **symmetric about the $y$-axis**. Example: $x^4 - 3x^2 + 1$.
- If $f$ contains **only odd** powers, then $f(-x) = -f(x)$: the graph is **point-symmetric about the origin**. Example: $x^3 + x$.
- Mixed powers, as in $x^3 + 1$, usually mean no such simple symmetry.

## Zeros

> **Key idea:** A polynomial of degree $n$ has at most $n$ zeros. If $x_1$ is a zero, then $(x - x_1)$ can be factored out: $f(x) = (x - x_1) \cdot g(x)$ with $g$ of degree $n - 1$.

There are three standard techniques for finding zeros.

### Example 1: factoring out x

$$f(x) = x^3 - 4x = x(x^2 - 4) = x(x - 2)(x + 2)$$

By the zero product property, the zeros are $-2$, $0$ and $2$. A value table helps to sketch the graph:

| $x$ | $-3$ | $-2$ | $-1$ | $0$ | $1$ | $2$ | $3$ |
|---|---|---|---|---|---|---|---|
| $f(x)$ | $-15$ | $0$ | $3$ | $0$ | $-3$ | $0$ | $15$ |

The graph comes up from below on the left, crosses the $x$-axis at $-2$, rises to a hill between $-2$ and $0$, falls through the origin into a valley between $0$ and $2$, and then rises steeply to the right. Only odd powers occur, so it is point-symmetric about the origin.

### Example 2: substitution

$f(x) = x^4 - 5x^2 + 4$ contains only $x^4$ and $x^2$. Substitute $z = x^2$:

$$z^2 - 5z + 4 = 0 \;\Rightarrow\; (z - 1)(z - 4) = 0 \;\Rightarrow\; z = 1 \text{ or } z = 4$$

Substituting back: $x^2 = 1$ gives $x = \pm 1$, and $x^2 = 4$ gives $x = \pm 2$. Four zeros: $-2, -1, 1, 2$. (If a $z$-value were negative, it would give no real $x$.)

### Example 3: guessing a zero and polynomial division

$f(x) = x^3 - 6x^2 + 11x - 6$. If there is an integer zero, it must divide the constant term $-6$. Try $x = 1$: $1 - 6 + 11 - 6 = 0$. So $(x - 1)$ is a factor. Divide:

1. $x^3 : x = x^2$. Multiply back: $x^2(x - 1) = x^3 - x^2$. Subtract: remainder $-5x^2 + 11x - 6$.
2. $-5x^2 : x = -5x$. Multiply back: $-5x(x - 1) = -5x^2 + 5x$. Subtract: remainder $6x - 6$.
3. $6x : x = 6$. Multiply back: $6(x - 1) = 6x - 6$. Subtract: remainder $0$.

So $f(x) = (x - 1)(x^2 - 5x + 6) = (x - 1)(x - 2)(x - 3)$, with zeros $1$, $2$ and $3$.

## Multiplicity of a zero

If a factor appears several times, the zero is called **multiple**. In

$$f(x) = (x - 1)^2 (x + 2)$$

$x = 1$ is a **double** zero and $x = -2$ a **simple** zero. The multiplicity tells you what the graph does there:

- **odd** multiplicity (simple, triple, …): the graph **crosses** the $x$-axis – the sign of $f$ changes;
- **even** multiplicity (double, …): the graph only **touches** the axis and turns back – no sign change.

So the graph of $(x - 1)^2(x + 2)$ crosses the axis at $-2$ and just touches it at $1$, where it has a valley.

## Common mistakes

- Dividing by $x$ instead of factoring it out – this loses the zero $x = 0$.
- Forgetting the negative root after substitution: $x^2 = 4$ gives $x = 2$ **and** $x = -2$.
- Taking the square root of a negative $z$-value – such a value yields no real zero.
- Judging the end behaviour from the wrong term: only the highest power counts, not the first one written.
- Expecting a sign change at every zero – at double zeros the graph only touches.

## Practice

1. State the degree, the leading coefficient and the end behaviour of $f(x) = -2x^3 + x^2 + 5$.

<details>
<summary>Solution</summary>

Degree $3$, leading coefficient $-2$. Odd degree with negative leading coefficient: as $x \to -\infty$, $f(x) \to \infty$ (up on the left); as $x \to \infty$, $f(x) \to -\infty$ (down on the right).

</details>

2. Find all zeros of $f(x) = x^3 - x^2 - 6x$.

<details>
<summary>Solution</summary>

$f(x) = x(x^2 - x - 6) = x(x - 3)(x + 2)$. Zeros: $-2$, $0$ and $3$.

</details>

3. Find all zeros of $f(x) = x^4 - 10x^2 + 9$.

<details>
<summary>Solution</summary>

With $z = x^2$: $z^2 - 10z + 9 = (z - 1)(z - 9) = 0$, so $z = 1$ or $z = 9$. Back-substitution: $x = \pm 1$ and $x = \pm 3$.

</details>

4. $x = -1$ is a zero of $f(x) = x^3 + 2x^2 - 5x - 6$. Find the other zeros.

<details>
<summary>Solution</summary>

Check: $-1 + 2 + 5 - 6 = 0$. Dividing by $(x + 1)$ gives $x^2 + x - 6$, since $(x + 1)(x^2 + x - 6) = x^3 + 2x^2 - 5x - 6$. Then $x^2 + x - 6 = (x + 3)(x - 2)$, so the other zeros are $-3$ and $2$.

</details>

5. Decide on the symmetry of $f(x) = x^4 - 3x^2 + 1$, $g(x) = x^3 + x$ and $h(x) = x^3 + 1$.

<details>
<summary>Solution</summary>

$f$ has only even powers: symmetric about the $y$-axis. $g$ has only odd powers: point-symmetric about the origin. $h$ mixes an odd power with a constant ($x^0$): neither of these symmetries.

</details>
