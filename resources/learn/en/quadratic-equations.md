---
title: Quadratic Equations
category: algebra
order: 70
level: 2
summary: How to solve equations like x² − 5x + 6 = 0 by factoring, completing the square or the quadratic formula – and how the discriminant tells you the number of solutions.
related: quadratic-functions, binomial-formulas, expanding-and-factoring, linear-equations
---

A **quadratic equation** contains the variable squared, but no higher power. They show up whenever areas, projectile motion or the zeros of a parabola are involved. Unlike linear equations, a quadratic equation can have two, one or no real solutions – and there are several methods to find them. Knowing which method fits which equation saves a lot of work.

## The general form

Every quadratic equation can be rearranged into the **standard form**

$$ax^2 + bx + c = 0 \qquad (a \neq 0)$$

For example, $2x^2 = 3x + 2$ becomes $2x^2 - 3x - 2 = 0$ with $a = 2$, $b = -3$, $c = -2$. Always bring the equation into this form first – most methods need a zero on one side.

## Special case: no linear term ($b = 0$)

Isolate $x^2$ and take the square root. Don't forget the negative root!

### Example 1

$$x^2 - 9 = 0 \quad\Rightarrow\quad x^2 = 9 \quad\Rightarrow\quad x = 3 \ \text{or}\ x = -3$$

An equation like $x^2 = -4$ has no real solution, because no real number squared is negative.

## Special case: no constant ($c = 0$)

Factor out $x$ and use the **zero product property**: a product is zero exactly when one of its factors is zero.

### Example 2

$$x^2 - 5x = 0 \quad\Rightarrow\quad x(x - 5) = 0 \quad\Rightarrow\quad x = 0 \ \text{or}\ x = 5$$

Never divide by $x$ here – you would lose the solution $x = 0$.

## Method 1: factoring

If $x^2 + bx + c$ can be written as $(x - r)(x - s)$, the solutions are $r$ and $s$. You need two numbers whose product is $c$ and whose sum is $-b$.

### Example 3

$$x^2 - 5x + 6 = 0$$

Two numbers with product $6$ and sum $5$: $2$ and $3$. So $(x - 2)(x - 3) = 0$, giving $x = 2$ or $x = 3$.

Factoring is fast when it works, but many equations don't have such nice numbers.

## Method 2: completing the square

The idea is to rewrite the left side as a perfect square, using $(x + d)^2 = x^2 + 2dx + d^2$.

### Example 4

$$x^2 + 6x - 7 = 0$$

1. Move the constant: $x^2 + 6x = 7$.
2. Take half of the coefficient of $x$ ($3$), square it ($9$) and add it on both sides: $x^2 + 6x + 9 = 16$.
3. Write as a square: $(x + 3)^2 = 16$.
4. Take the square root: $x + 3 = 4$ or $x + 3 = -4$.

So $x = 1$ or $x = -7$. If $a \neq 1$, divide the whole equation by $a$ first.

## Method 3: the quadratic formula

Completing the square for the general equation $ax^2 + bx + c = 0$ gives a formula that always works:

$$x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$$

> **Key idea:** The quadratic formula solves every quadratic equation in standard form $ax^2 + bx + c = 0$. The $\pm$ produces the two solutions.

### Example 5

$$2x^2 - 3x - 2 = 0 \qquad (a = 2,\ b = -3,\ c = -2)$$

$$x = \frac{3 \pm \sqrt{9 + 16}}{4} = \frac{3 \pm 5}{4}$$

So $x = \frac{8}{4} = 2$ or $x = \frac{-2}{4} = -\frac{1}{2}$.

Careful with signs: $-b = -(-3) = 3$, and $-4ac = -4 \cdot 2 \cdot (-2) = +16$.

In Germany the same formula is often taught for the normalized form $x^2 + px + q = 0$ (after dividing by $a$) as the **p-q formula**: $x = -\frac{p}{2} \pm \sqrt{\left(\frac{p}{2}\right)^2 - q}$. It gives the same results.

## The discriminant

The expression under the root, $D = b^2 - 4ac$, is called the **discriminant**. It decides how many real solutions there are – without solving the equation:

- $D > 0$: two different solutions.
- $D = 0$: exactly one solution, $x = -\frac{b}{2a}$.
- $D < 0$: no real solution (you cannot take the square root of a negative number).

> **Key idea:** Compute $D = b^2 - 4ac$ first. Positive means two solutions, zero means one, negative means none.

### Example 6

For $x^2 - 4x + 4 = 0$: $D = 16 - 16 = 0$, so there is one solution, $x = 2$. Indeed, $x^2 - 4x + 4 = (x - 2)^2$.

For $x^2 + 2x + 5 = 0$: $D = 4 - 20 = -16 < 0$, so there is no real solution.

Graphically, the solutions are the $x$-intercepts of the parabola $y = ax^2 + bx + c$: it can cross the $x$-axis twice, touch it once, or miss it entirely.

## Which method when?

- $b = 0$: isolate $x^2$ and take the root.
- $c = 0$: factor out $x$.
- Nice integer numbers: try factoring.
- Otherwise: quadratic formula (it always works).

## Common mistakes

- Forgetting the negative root: $x^2 = 9$ has **two** solutions.
- Applying the formula before bringing everything to one side.
- Sign errors with $-b$ and $-4ac$ when $b$ or $c$ is negative.
- Dividing by $x$ and losing the solution $x = 0$.
- Writing $\frac{-b \pm \sqrt{D}}{2}$ instead of dividing by $2a$.
- Using the zero product property when the right side is not zero: $(x - 1)(x - 2) = 6$ does **not** mean $x - 1 = 6$.

## Practice

1. Solve $3x^2 = 48$.

<details>
<summary>Solution</summary>

$x^2 = 16$, so $x = 4$ or $x = -4$.

</details>

2. Solve $x^2 + 7x = 0$.

<details>
<summary>Solution</summary>

$x(x + 7) = 0$, so $x = 0$ or $x = -7$.

</details>

3. Solve $x^2 - x - 12 = 0$ by factoring.

<details>
<summary>Solution</summary>

Numbers with product $-12$ and sum $1$: $4$ and $-3$. So $(x - 4)(x + 3) = 0$, giving $x = 4$ or $x = -3$.

</details>

4. Solve $2x^2 + 5x - 3 = 0$ with the quadratic formula.

<details>
<summary>Solution</summary>

$a = 2$, $b = 5$, $c = -3$. $D = 25 + 24 = 49$. $x = \frac{-5 \pm 7}{4}$, so $x = \frac{1}{2}$ or $x = -3$.

</details>

5. For which value of $c$ does $x^2 + 6x + c = 0$ have exactly one solution?

<details>
<summary>Solution</summary>

One solution means $D = 0$: $36 - 4c = 0$, so $c = 9$. Then the equation is $(x + 3)^2 = 0$ with the solution $x = -3$.

</details>
