---
title: Linear Functions
category: functions
order: 20
level: 2
summary: Straight-line graphs described by y = mx + b – slope, y-intercept, finding the equation through two points, parallel and perpendicular lines.
related: functions-basics, linear-equations, systems-of-equations, transformations-of-functions
---

A **linear function** is a function whose graph is a straight line. It describes situations where something grows or shrinks at a constant rate – a phone plan with a monthly fee plus a price per minute, a candle that burns down by the same amount every hour. Linear functions are the simplest functions there are, and they are the building block for many more advanced ideas, such as tangent lines in calculus.

## The equation y = mx + b

Every linear function can be written as

$$f(x) = mx + b$$

with two numbers:

- $m$ is the **slope** (gradient). It tells you how much $y$ changes when $x$ increases by $1$.
- $b$ is the **y-intercept**. Since $f(0) = b$, the line crosses the $y$-axis at the point $(0, b)$.

> **Key idea:** In $f(x) = mx + b$, the slope $m$ is the change in $y$ per unit step in $x$, and $b$ is where the line crosses the $y$-axis.

## What the slope tells you

- $m > 0$: the line **rises** from left to right.
- $m < 0$: the line **falls** from left to right.
- $m = 0$: the line is **horizontal**, $f(x) = b$ is a constant function.
- The larger $|m|$, the steeper the line.

A special case: $b = 0$ gives $f(x) = mx$, a line through the origin. This describes **direct proportionality** – double $x$, and $y$ doubles too.

Vertical lines such as $x = 3$ are not functions at all, since one $x$-value would have infinitely many $y$-values.

## Slope from two points

If a line passes through $P_1(x_1, y_1)$ and $P_2(x_2, y_2)$, its slope is "rise over run":

$$m = \frac{y_2 - y_1}{x_2 - x_1}$$

You can picture this as a **slope triangle**: go $x_2 - x_1$ units to the right, then $y_2 - y_1$ units up (or down) to get from one point to the other. The ratio is the same no matter which two points of the line you choose – that is exactly what makes the graph straight.

### Example 1: the line through two points

Find the equation of the line through $A(1, 3)$ and $B(4, 9)$.

1. Slope: $m = \frac{9 - 3}{4 - 1} = \frac{6}{3} = 2$.
2. Plug one point into $y = 2x + b$: $3 = 2 \cdot 1 + b$, so $b = 1$.
3. Result: $f(x) = 2x + 1$.

Check with $B$: $2 \cdot 4 + 1 = 9$. Correct.

Alternatively you can use the **point-slope form** $y - y_1 = m(x - x_1)$ directly: $y - 3 = 2(x - 1)$, which simplifies to $y = 2x + 1$.

## Drawing a line

To draw $f(x) = -\frac{2}{3}x + 4$:

1. Mark the y-intercept $(0, 4)$.
2. Use the slope as a step: $m = \frac{-2}{3}$ means "3 to the right, 2 down". From $(0, 4)$ you reach $(3, 2)$, then $(6, 0)$.
3. Draw a straight line through the points.

The value table confirms it:

| $x$ | $0$ | $3$ | $6$ |
|---|---|---|---|
| $f(x)$ | $4$ | $2$ | $0$ |

## Zero of a linear function

The zero is where the line crosses the $x$-axis. Solve $mx + b = 0$:

$$x_0 = -\frac{b}{m} \quad (m \neq 0)$$

For $f(x) = -\frac{2}{3}x + 4$ this gives $x_0 = -\frac{4}{-2/3} = 6$, matching the table.

## Parallel and perpendicular lines

> **Key idea:** Two lines are **parallel** if they have the same slope: $m_1 = m_2$. They are **perpendicular** if $m_1 \cdot m_2 = -1$, i.e. $m_2 = -\frac{1}{m_1}$.

So the lines $y = 3x + 1$ and $y = 3x - 5$ are parallel, while $y = 2x$ and $y = -\frac{1}{2}x + 7$ are perpendicular, because $2 \cdot \left(-\frac{1}{2}\right) = -1$.

## Where two lines intersect

At an intersection point, both functions have the same value. Set the terms equal and solve.

### Example 2

$f(x) = 2x + 1$ and $g(x) = -x + 7$:

$$2x + 1 = -x + 7 \;\Rightarrow\; 3x = 6 \;\Rightarrow\; x = 2$$

Then $y = f(2) = 5$. The lines meet at $(2, 5)$. Parallel lines with different intercepts never meet – the equation then has no solution.

### Example 3: a word problem

A taxi charges a base fare of 4 € plus 2 € per kilometre. The cost is $f(x) = 2x + 4$ (in €, $x$ in km). A 10 km ride costs $f(10) = 24$, i.e. 24 €. With 30 € you can ride $2x + 4 = 30 \Rightarrow x = 13$ kilometres.

## Common mistakes

- Swapping the order in the slope formula: the $y$-difference goes on top, the $x$-difference on the bottom, and both must start from the same point.
- Reading $b$ as the zero – $b$ is the $y$-intercept, the zero is $-\frac{b}{m}$.
- Thinking perpendicular means "negative slope": the slopes must be **negative reciprocals**, e.g. $4$ and $-\frac{1}{4}$.
- Treating a vertical line $x = c$ as a linear function.
- Sign errors with slopes like $-\frac{2}{3}$: this means 3 right, 2 **down**.

## Practice

1. State the slope and the y-intercept of $f(x) = -3x + 4$ and calculate its zero.

<details>
<summary>Solution</summary>

$m = -3$, $b = 4$. Zero: $-3x + 4 = 0 \Rightarrow x = \frac{4}{3}$.

</details>

2. Find the equation of the line through $(2, 1)$ and $(6, 9)$.

<details>
<summary>Solution</summary>

$m = \frac{9 - 1}{6 - 2} = \frac{8}{4} = 2$. From $1 = 2 \cdot 2 + b$ we get $b = -3$. So $f(x) = 2x - 3$.

</details>

3. Find the line that is parallel to $y = 0.5x + 2$ and passes through $(4, 1)$.

<details>
<summary>Solution</summary>

Same slope $m = 0.5$. From $1 = 0.5 \cdot 4 + b = 2 + b$ we get $b = -1$. So $y = 0.5x - 1$.

</details>

4. Find the line that is perpendicular to $y = 2x - 1$ and passes through $(2, 3)$.

<details>
<summary>Solution</summary>

$m = -\frac{1}{2}$. From $3 = -\frac{1}{2} \cdot 2 + b = -1 + b$ we get $b = 4$. So $y = -\frac{1}{2}x + 4$.

</details>

5. Where do $f(x) = 3x - 2$ and $g(x) = -2x + 8$ intersect?

<details>
<summary>Solution</summary>

$3x - 2 = -2x + 8 \Rightarrow 5x = 10 \Rightarrow x = 2$. Then $f(2) = 4$. Intersection point: $(2, 4)$.

</details>
