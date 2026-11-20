---
title: The Derivative
category: calculus
order: 40
level: 3
summary: How steep is a curve at a single point? From the slope of a secant to the slope of the tangent – the idea behind the derivative.
related: limits, differentiation-rules, linear-functions, curve-sketching
---

For a straight line, the slope is the same everywhere. A curve, however, is steep in some places and flat in others. The **derivative** measures the slope of a curve at one single point – and with it the instantaneous rate of change of a quantity, such as the speed of a car at exactly one moment. It is the central idea of differential calculus.

## Average rate of change

Suppose a function $f$ is given and we look at two points on its graph, at $x_0$ and at $x_0 + h$. The straight line through these points is called a **secant**. Its slope is the **difference quotient**:

$$\frac{f(x_0 + h) - f(x_0)}{h}$$

This is the **average rate of change** of $f$ between the two points – "change in $y$ divided by change in $x$".

### Example 1

For $f(x) = x^2$ between $x = 1$ and $x = 3$: $\frac{f(3) - f(1)}{3 - 1} = \frac{9 - 1}{2} = 4$. On average the function rises by $4$ units per unit of $x$.

## From secant to tangent

Now let the second point slide towards the first, that is, let $h$ become smaller and smaller. The secant turns into the **tangent** – the line that just touches the graph at $x_0$. Its slope is the limit of the difference quotients.

> **Key idea:** The derivative of $f$ at $x_0$ is $f'(x_0) = \lim\limits_{h \to 0} \dfrac{f(x_0 + h) - f(x_0)}{h}$. It equals the slope of the tangent at the point $(x_0, f(x_0))$ – the instantaneous rate of change.

If this limit exists, $f$ is called **differentiable** at $x_0$.

### Example 2: the h-method

Find the derivative of $f(x) = x^2$ at $x_0 = 3$.

$$\frac{f(3 + h) - f(3)}{h} = \frac{9 + 6h + h^2 - 9}{h} = \frac{6h + h^2}{h} = 6 + h$$

As $h \to 0$, this tends to $6$. So $f'(3) = 6$: at $x = 3$ the parabola is as steep as a line with slope $6$.

## The derivative function

Instead of a specific point, you can do the same calculation for a general $x$:

$$\frac{(x + h)^2 - x^2}{h} = \frac{2xh + h^2}{h} = 2x + h \;\to\; 2x$$

So $f(x) = x^2$ has the **derivative function** $f'(x) = 2x$. It gives the slope at every point at once: $f'(3) = 6$, $f'(0) = 0$ (the vertex is flat), $f'(-1) = -2$ (falling). In practice you don't use the h-method every time – the differentiation rules give derivatives directly.

Common notations are $f'(x)$ and $\frac{dy}{dx}$. The second one reminds you of the origin: a quotient of tiny changes in $y$ and $x$.

## The tangent line

Since the tangent passes through $(x_0, f(x_0))$ and has slope $f'(x_0)$, its equation is:

> **Key idea:** Tangent at $x_0$: $\; y = f'(x_0) \cdot (x - x_0) + f(x_0)$

### Example 3

Tangent to $f(x) = x^2$ at $x_0 = 3$: $f(3) = 9$ and $f'(3) = 6$, so

$$y = 6(x - 3) + 9 = 6x - 9$$

## What the derivative tells you

- $f'(x_0) > 0$: the graph is rising at $x_0$.
- $f'(x_0) < 0$: the graph is falling at $x_0$.
- $f'(x_0) = 0$: horizontal tangent – a candidate for a maximum or minimum.

In physics, if $s(t)$ is the distance traveled after time $t$, then $s'(t)$ is the velocity. For $s(t) = 5t^2$ (in meters, $t$ in seconds) the h-method gives

$$\frac{5(2 + h)^2 - 20}{h} = \frac{20h + 5h^2}{h} = 20 + 5h \;\to\; 20,$$

so the velocity at $t = 2$ is $20$ meters per second.

## Where there is no derivative

A function is not differentiable at a point where its graph has a sharp corner, a jump or a vertical tangent. Example: $f(x) = |x|$ at $x = 0$. From the right the slope is $1$, from the left it is $-1$ – the one-sided limits of the difference quotient differ, so $f'(0)$ does not exist.

## Common mistakes

- Confusing the average rate of change (secant) with the instantaneous rate of change (tangent).
- Setting $h = 0$ *before* cancelling – that gives the meaningless $\frac{0}{0}$.
- Mixing up $f(x_0)$ (the height of the graph) and $f'(x_0)$ (its slope).
- Forgetting the $+ f(x_0)$ in the tangent equation.

## Practice

1. Find the average rate of change of $f(x) = x^2$ on the interval $[1, 4]$.

<details>
<summary>Solution</summary>

$\frac{f(4) - f(1)}{4 - 1} = \frac{16 - 1}{3} = 5$.

</details>

2. Use the h-method to find $f'(1)$ for $f(x) = 3x^2$.

<details>
<summary>Solution</summary>

$\frac{3(1 + h)^2 - 3}{h} = \frac{3 + 6h + 3h^2 - 3}{h} = 6 + 3h \to 6$. So $f'(1) = 6$.

</details>

3. Find the equation of the tangent to $f(x) = x^2$ at $x_0 = -1$.

<details>
<summary>Solution</summary>

$f(-1) = 1$ and $f'(-1) = 2 \cdot (-1) = -2$. Tangent: $y = -2(x + 1) + 1 = -2x - 1$.

</details>

4. Use the h-method to show that $f(x) = x^3$ has the derivative $f'(x) = 3x^2$.

<details>
<summary>Solution</summary>

$(x + h)^3 = x^3 + 3x^2 h + 3x h^2 + h^3$. So $\frac{(x+h)^3 - x^3}{h} = 3x^2 + 3xh + h^2$, which tends to $3x^2$ as $h \to 0$.

</details>
