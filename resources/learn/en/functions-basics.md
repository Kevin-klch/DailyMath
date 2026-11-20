---
title: What Is a Function?
category: functions
order: 10
level: 2
summary: A function assigns exactly one output to every input – learn the notation, domain and range, value tables, graphs and the vertical line test.
related: linear-functions, quadratic-functions, transformations-of-functions, sets-and-logic
---

A **function** is a rule that takes an input and produces exactly one output. Functions describe how one quantity depends on another: the price of a taxi ride depends on the distance, the area of a square depends on its side length. Almost everything in higher mathematics – from graphs to derivatives – is built on this idea.

## The definition

A function $f$ assigns to **every** element $x$ of a set $D$ (the **domain**) **exactly one** value $f(x)$. The input $x$ is called the **independent variable** or argument, the output $y = f(x)$ the **dependent variable** or function value.

> **Key idea:** A function gives each allowed input exactly one output. Different inputs may share the same output, but one input may never have two outputs.

Two things are important here:

- **Every** input in the domain must get an output – nothing may be left out.
- **Exactly one** output – the rule must not be ambiguous.

### Example 1: function or not?

- Assigning to each person their date of birth is a function: everyone has exactly one birthday (several people can share one, which is fine).
- Assigning to each date the people born on it is **not** a function: one date belongs to many people.
- The rule "$x \mapsto$ a number whose square is $x$" is not a function on the positive numbers, since $4$ would be assigned both $2$ and $-2$.

## Notation

There are several common ways to write a function:

$$f(x) = 2x + 1 \qquad \text{or} \qquad f: x \mapsto 2x + 1 \qquad \text{or} \qquad y = 2x + 1$$

Read $f(x)$ as "f of x". To **evaluate** a function, replace every $x$ in the rule by the given number:

$$f(3) = 2 \cdot 3 + 1 = 7, \qquad f(-2) = 2 \cdot (-2) + 1 = -3$$

You can also plug in expressions: $f(a + 1) = 2(a + 1) + 1 = 2a + 3$.

## Domain and range

The **domain** $D$ is the set of all allowed inputs. If nothing else is stated, we take the largest set of real numbers for which the rule makes sense. Two typical restrictions:

- You cannot divide by zero: for $f(x) = \frac{1}{x - 2}$ we must exclude $x = 2$, so $D = \mathbb{R} \setminus \{2\}$.
- You cannot take the square root of a negative number (in the reals): for $g(x) = \sqrt{x + 3}$ we need $x + 3 \ge 0$, so $D = \{x \in \mathbb{R} \mid x \ge -3\}$.

The **range** is the set of all values the function actually takes. For $h(x) = x^2$ the domain is all of $\mathbb{R}$, but the range is only $y \ge 0$, because a square is never negative.

## Value tables and graphs

A **value table** lists some inputs together with their outputs. For $f(x) = x^2 - 1$:

| $x$ | $-2$ | $-1$ | $0$ | $1$ | $2$ |
|---|---|---|---|---|---|
| $f(x)$ | $3$ | $0$ | $-1$ | $0$ | $3$ |

Each column gives a point $(x, f(x))$ – here $(-2, 3)$, $(-1, 0)$, $(0, -1)$, $(1, 0)$ and $(2, 3)$. Plotting these points in a coordinate system and connecting them smoothly gives the **graph** of the function: a U-shaped curve with its lowest point at $(0, -1)$, crossing the $x$-axis at $-1$ and $1$.

A point $P(a, b)$ lies on the graph exactly when $f(a) = b$. For example, $(3, 8)$ lies on the graph above because $3^2 - 1 = 8$.

### The vertical line test

A curve in the plane is the graph of a function if and only if every vertical line meets it **at most once**. A circle fails the test: the vertical line through its centre hits it twice, so one $x$ would have two $y$-values.

## Zeros and the y-intercept

Two special points are often asked for:

- The **y-intercept** is where the graph crosses the $y$-axis. Set $x = 0$: the point is $(0, f(0))$.
- The **zeros** (roots, x-intercepts) are the inputs with $f(x) = 0$. Solve the equation $f(x) = 0$.

> **Key idea:** y-intercept: compute $f(0)$. Zeros: solve $f(x) = 0$.

### Example 2

For $f(x) = 3x - 6$: the y-intercept is $f(0) = -6$, i.e. the point $(0, -6)$. Zero: $3x - 6 = 0 \Rightarrow x = 2$, i.e. the point $(2, 0)$.

### Example 3

Find the domain of $f(x) = \frac{x}{x^2 - 9}$.

The denominator must not be zero: $x^2 - 9 = 0 \Rightarrow x = 3$ or $x = -3$. So $D = \mathbb{R} \setminus \{-3, 3\}$.

## Common mistakes

- Thinking that two inputs with the same output break the definition – only one input with two outputs does.
- Forgetting parentheses when plugging in negative numbers: for $f(x) = x^2$, $f(-3) = (-3)^2 = 9$, not $-9$.
- Ignoring the domain – division by zero and roots of negative numbers must be excluded.
- Confusing $f$ (the function, the whole rule) with $f(x)$ (a single value).
- Mixing up domain (inputs, $x$-axis) and range (outputs, $y$-axis).

## Practice

1. Given $f(x) = x^2 - 4x$, calculate $f(0)$, $f(3)$ and $f(-1)$.

<details>
<summary>Solution</summary>

$f(0) = 0 - 0 = 0$, $f(3) = 9 - 12 = -3$, $f(-1) = 1 + 4 = 5$.

</details>

2. Determine the largest possible domain of $g(x) = \sqrt{8 - 2x}$.

<details>
<summary>Solution</summary>

The radicand must not be negative: $8 - 2x \ge 0 \Rightarrow 8 \ge 2x \Rightarrow x \le 4$. So $D = \{x \in \mathbb{R} \mid x \le 4\}$.

</details>

3. Does the point $(2, 5)$ lie on the graph of $f(x) = 3x - 1$? What about $(-1, -4)$?

<details>
<summary>Solution</summary>

$f(2) = 6 - 1 = 5$, so $(2, 5)$ lies on the graph. $f(-1) = -3 - 1 = -4$, so $(-1, -4)$ lies on the graph as well.

</details>

4. Find the y-intercept and the zeros of $f(x) = x^2 - 9$.

<details>
<summary>Solution</summary>

y-intercept: $f(0) = -9$, i.e. $(0, -9)$. Zeros: $x^2 - 9 = 0 \Rightarrow x^2 = 9 \Rightarrow x = 3$ or $x = -3$.

</details>

5. Which of these assignments is a function: (a) each student gets their height, (b) each positive number gets its two square roots?

<details>
<summary>Solution</summary>

(a) is a function – every student has exactly one height. (b) is not, because each positive number would get two values ($\sqrt{x}$ and $-\sqrt{x}$).

</details>
