---
title: Quadratic Functions
category: functions
order: 30
level: 2
summary: Parabolas described by y = ax² + bx + c – the role of a, vertex form, completing the square, the vertex, zeros and the factored form.
related: quadratic-equations, transformations-of-functions, binomial-formulas, polynomial-functions
---

A **quadratic function** contains $x^2$ as its highest power. Its graph is a **parabola** – the curve a thrown ball follows, the shape of a satellite dish or of a suspension bridge cable in good approximation. Understanding parabolas means being able to find their highest or lowest point, their zeros and their shape directly from the equation.

## The basic parabola

The simplest quadratic function is $f(x) = x^2$. Its value table:

| $x$ | $-3$ | $-2$ | $-1$ | $0$ | $1$ | $2$ | $3$ |
|---|---|---|---|---|---|---|---|
| $x^2$ | $9$ | $4$ | $1$ | $0$ | $1$ | $4$ | $9$ |

The graph is a U-shaped curve, open upwards, with its lowest point – the **vertex** – at the origin $(0, 0)$. It is symmetric about the $y$-axis, because $(-x)^2 = x^2$. Starting from the vertex, you go 1 right and 1 up, then 1 more right and 3 more up, then 1 more right and 5 more up – the increases are the odd numbers $1, 3, 5, \dots$

## The three forms of a quadratic function

The same parabola can be written in three useful ways:

| Form | Equation | What you can read off |
|---|---|---|
| Standard form | $f(x) = ax^2 + bx + c$ | y-intercept $c$ |
| Vertex form | $f(x) = a(x - h)^2 + k$ | vertex $(h, k)$ |
| Factored form | $f(x) = a(x - x_1)(x - x_2)$ | zeros $x_1$, $x_2$ |

In all three forms, $a \neq 0$ is the same number and describes the shape.

## The role of a

- $a > 0$: the parabola opens **upwards**, the vertex is a minimum.
- $a < 0$: it opens **downwards**, the vertex is a maximum.
- $|a| > 1$: it is **narrower** (stretched) than $y = x^2$.
- $|a| < 1$: it is **wider** (compressed).

For example, $y = -\frac{1}{2}x^2$ is a wide parabola opening downwards: at $x = 2$ it has the value $-2$ instead of $4$.

## Vertex form and the vertex

> **Key idea:** In the vertex form $f(x) = a(x - h)^2 + k$ the vertex is $V(h, k)$. Watch the sign: $(x - 3)^2$ means $h = 3$, while $(x + 3)^2$ means $h = -3$.

The vertical line $x = h$ is the **axis of symmetry**. The vertex form shows how the parabola arises from $y = x^2$: stretch by $a$, shift $h$ to the right and $k$ up.

### Completing the square

To turn the standard form into vertex form, complete the square using the binomial formula $(x + p)^2 = x^2 + 2px + p^2$.

### Example 1

$f(x) = x^2 - 6x + 5$.

1. Half of the coefficient of $x$ is $-3$, its square is $9$. Add and subtract it: $f(x) = x^2 - 6x + 9 - 9 + 5$.
2. Group the square: $f(x) = (x - 3)^2 - 4$.
3. Vertex: $V(3, -4)$. Since $a = 1 > 0$, this is the minimum.

Zeros: $(x - 3)^2 = 4 \Rightarrow x - 3 = \pm 2 \Rightarrow x = 1$ or $x = 5$. So the factored form is $f(x) = (x - 1)(x - 5)$, and the y-intercept is $f(0) = 5$.

### Example 2: with a leading factor

$f(x) = 2x^2 + 8x + 3$.

$$f(x) = 2(x^2 + 4x) + 3 = 2\big((x + 2)^2 - 4\big) + 3 = 2(x + 2)^2 - 5$$

The vertex is $V(-2, -5)$.

### The vertex formula

Completing the square in general gives a shortcut:

> **Key idea:** The vertex of $f(x) = ax^2 + bx + c$ lies at $x_V = -\frac{b}{2a}$; its $y$-coordinate is $f(x_V)$.

Check with Example 2: $x_V = -\frac{8}{2 \cdot 2} = -2$ and $f(-2) = 8 - 16 + 3 = -5$.

## Zeros

The zeros are the solutions of $ax^2 + bx + c = 0$ (see quadratic equations). A parabola can have **two, one or no** zeros. The vertex form lets you see this immediately: if the parabola opens upwards and its vertex lies **above** the $x$-axis ($k > 0$), it never reaches the axis. Algebraically, the discriminant $b^2 - 4ac$ decides: positive – two zeros, zero – one, negative – none.

Because of symmetry, the vertex always lies exactly halfway between two zeros: $x_V = \frac{x_1 + x_2}{2}$.

### Example 3: finding the equation

A parabola has its vertex at $(1, 2)$ and passes through $(3, 10)$. Start with $f(x) = a(x - 1)^2 + 2$ and plug in the point:

$$10 = a(3 - 1)^2 + 2 = 4a + 2 \;\Rightarrow\; a = 2$$

So $f(x) = 2(x - 1)^2 + 2$.

## Common mistakes

- Getting the sign of the vertex wrong: $(x + 4)^2 - 1$ has its vertex at $(-4, -1)$, not $(4, -1)$.
- Forgetting to factor out $a$ before completing the square.
- Forgetting to subtract the added square again, which changes the function.
- Thinking every parabola has zeros – it may lie entirely above or below the $x$-axis.
- Confusing "narrower" and "wider": a larger $|a|$ makes the parabola narrower.

## Practice

1. State the vertex of $f(x) = (x + 1)^2 - 3$ and whether the parabola opens upwards or downwards. Calculate its zeros.

<details>
<summary>Solution</summary>

Vertex $V(-1, -3)$, opens upwards because $a = 1 > 0$. Zeros: $(x + 1)^2 = 3 \Rightarrow x = -1 + \sqrt{3}$ or $x = -1 - \sqrt{3}$.

</details>

2. Write $f(x) = x^2 + 4x + 1$ in vertex form.

<details>
<summary>Solution</summary>

$f(x) = x^2 + 4x + 4 - 4 + 1 = (x + 2)^2 - 3$. Vertex $V(-2, -3)$.

</details>

3. Find the vertex and the zeros of $f(x) = -x^2 + 6x - 5$.

<details>
<summary>Solution</summary>

$x_V = -\frac{6}{2 \cdot (-1)} = 3$, $f(3) = -9 + 18 - 5 = 4$. Vertex $V(3, 4)$, a maximum. Zeros: $-x^2 + 6x - 5 = -(x - 1)(x - 5) = 0 \Rightarrow x = 1$ or $x = 5$. (Check: $3$ lies halfway between $1$ and $5$.)

</details>

4. A parabola has zeros $-2$ and $4$ and passes through $(0, -8)$. Find its equation in standard form.

<details>
<summary>Solution</summary>

$f(x) = a(x + 2)(x - 4)$. From $f(0) = a \cdot 2 \cdot (-4) = -8a = -8$ we get $a = 1$. So $f(x) = (x + 2)(x - 4) = x^2 - 2x - 8$.

</details>

5. How many zeros does $f(x) = x^2 - 2x + 3$ have?

<details>
<summary>Solution</summary>

Vertex form: $f(x) = (x - 1)^2 + 2$. The parabola opens upwards and its vertex $(1, 2)$ lies above the $x$-axis, so it has **no** zeros. (Discriminant: $4 - 12 = -8 < 0$.)

</details>
