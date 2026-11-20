---
title: Transforming Graphs
category: functions
order: 70
level: 2
summary: How shifting, stretching and reflecting change a graph – and why f(x − c) moves the graph to the right while a · f(x) stretches it vertically.
related: functions-basics, quadratic-functions, exponential-functions, trigonometric-functions
---

Many functions are just a familiar basic function that has been moved, stretched or flipped. If you know how $y = x^2$, $y = \sqrt{x}$ or $y = \sin x$ look, you can sketch $y = -2(x - 3)^2 + 1$ or $y = 3\sin(2x) + 1$ in seconds – without a value table. This article collects the rules for these **transformations** and explains why they work.

## Shifting up and down

Adding a constant to the function value moves every point vertically:

$$g(x) = f(x) + d$$

- $d > 0$: the graph moves $d$ units **up**.
- $d < 0$: the graph moves $|d|$ units **down**.

Every $y$-value changes by $d$, the $x$-values stay the same. For example, $x^2 + 3$ is the basic parabola moved up by $3$; its vertex is $(0, 3)$.

## Shifting left and right

Replacing $x$ by $x - c$ moves the graph horizontally:

$$g(x) = f(x - c)$$

- $c > 0$: the graph moves $c$ units to the **right**.
- $c < 0$: the graph moves $|c|$ units to the **left**.

This feels backwards at first, so think about it: $g(x) = (x - 2)^2$ takes the value $0$ when $x - 2 = 0$, i.e. at $x = 2$. Everything that $f$ does at $x = 0$, $g$ does only at $x = 2$ – two units later, so further **right**.

> **Key idea:** Changes **outside** the function ($f(x) + d$, $a \cdot f(x)$) act on the $y$-values and do what you expect. Changes **inside** ($f(x - c)$, $f(bx)$) act on the $x$-values and do the opposite: $-c$ moves right, a factor $b$ compresses.

## Stretching and compressing

### Vertically

$$g(x) = a \cdot f(x)$$

Every $y$-value is multiplied by $a$. For $|a| > 1$ the graph is stretched away from the $x$-axis, for $0 < |a| < 1$ it is compressed towards it. Points on the $x$-axis (the zeros) stay where they are.

### Horizontally

$$g(x) = f(bx) \qquad (b > 0)$$

The graph is compressed towards the $y$-axis by the factor $\frac{1}{b}$. For example, $\sin(2x)$ completes a full wave on $[0, \pi]$ instead of $[0, 2\pi]$ – the period is halved. A factor $0 < b < 1$ stretches the graph horizontally instead.

## Reflections

- $g(x) = -f(x)$ reflects the graph in the **$x$-axis** (all $y$-values change sign).
- $g(x) = f(-x)$ reflects the graph in the **$y$-axis** (left and right are swapped).

For example, $-x^2$ is the basic parabola opening downwards, and $2^{-x}$ is the mirror image of $2^x$ – a falling curve.

## Combining transformations

All rules together give the general form

$$g(x) = a \cdot f\big(b(x - c)\big) + d$$

> **Key idea:** A point $(u, v)$ on the graph of $f$ moves to the point $\left(\frac{u}{b} + c,\; a \cdot v + d\right)$ on the graph of $g$.

In practice, work from the inside out: first the horizontal changes ($b$, then $c$), then the vertical ones ($a$, then $d$). It is safest to factor the inside first: $f(2x - 6)$ is $f\big(2(x - 3)\big)$ – compressed by $\frac{1}{2}$, then shifted **3** (not 6) to the right.

### Example 1: a parabola

$g(x) = (x - 2)^2 + 3$ arises from $y = x^2$ by a shift of $2$ to the right and $3$ up. The vertex moves from $(0, 0)$ to $(2, 3)$.

### Example 2: a square root function

Sketch $g(x) = -2\sqrt{x + 1}$, starting from $f(x) = \sqrt{x}$ with the points $(0, 0)$, $(1, 1)$, $(4, 2)$.

1. $\sqrt{x + 1}$: shift $1$ to the left. Points: $(-1, 0)$, $(0, 1)$, $(3, 2)$.
2. Multiply by $-2$: stretch by $2$ and reflect in the $x$-axis. Points: $(-1, 0)$, $(0, -2)$, $(3, -4)$.

The graph starts at $(-1, 0)$ and curves downwards to the right. The domain is $x \ge -1$.

### Example 3: an exponential function

$g(x) = 2^{x - 1} - 4$ is $2^x$ shifted $1$ to the right and $4$ down. The asymptote moves with it: it is now $y = -4$. The y-intercept is $g(0) = 2^{-1} - 4 = \frac{1}{2} - 4 = -\frac{7}{2}$.

## Common mistakes

- Shifting in the wrong direction: $f(x + 3)$ moves the graph $3$ to the **left**.
- Forgetting to factor: $f(2x - 6)$ is shifted by $3$, not by $6$.
- Confusing $f(2x)$ (horizontal compression) with $2f(x)$ (vertical stretch).
- Mixing up the two reflections: a minus sign outside reflects in the $x$-axis, inside in the $y$-axis.
- Forgetting to move asymptotes and special points along with the graph.

## Practice

1. Describe how $g(x) = (x + 3)^2 - 1$ arises from $y = x^2$ and state its vertex.

<details>
<summary>Solution</summary>

Shift $3$ to the left and $1$ down. Vertex: $(-3, -1)$.

</details>

2. The basic parabola is shifted $4$ to the right, reflected in the $x$-axis and then shifted $2$ up. Give the equation.

<details>
<summary>Solution</summary>

Shift: $(x - 4)^2$. Reflection: $-(x - 4)^2$. Shift up: $g(x) = -(x - 4)^2 + 2$. It opens downwards with vertex $(4, 2)$.

</details>

3. The point $(2, 5)$ lies on the graph of $f$. Which point lies on the graph of (a) $f(x - 1) + 3$, (b) $-f(x)$, (c) $f(-x)$, (d) $f(2x)$?

<details>
<summary>Solution</summary>

(a) $(3, 8)$, (b) $(2, -5)$, (c) $(-2, 5)$, (d) $(1, 5)$, because $f(2 \cdot 1) = f(2) = 5$.

</details>

4. State the asymptote and the y-intercept of $g(x) = 2^{x + 2} - 1$.

<details>
<summary>Solution</summary>

$2^x$ is shifted $2$ left and $1$ down, so the asymptote is $y = -1$. y-intercept: $g(0) = 2^2 - 1 = 3$.

</details>

5. A function $f$ has the zeros $-1$ and $3$. Find the zeros of $g(x) = f(x - 2)$, $h(x) = 3f(x)$ and $k(x) = f(2x)$.

<details>
<summary>Solution</summary>

$g$: shifted $2$ right, zeros $1$ and $5$. $h$: a vertical stretch does not move zeros, so $-1$ and $3$. $k$: compressed by $\frac{1}{2}$, zeros $-\frac{1}{2}$ and $\frac{3}{2}$.

</details>
