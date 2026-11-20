---
title: Absolute Value
category: algebra
order: 110
level: 2
summary: What the absolute value of a number means, how it measures distance, and how to solve equations and inequalities that contain absolute values.
related: negative-numbers, inequalities, linear-equations
---

The **absolute value** of a number tells you how far it is from zero on the number line – regardless of direction. Both $5$ and $-5$ are five units away from zero, so both have absolute value $5$. Absolute values appear whenever only the size of something matters, not its sign: distances, errors and tolerances, deviations from a target value.

## Definition

The absolute value of $x$ is written $|x|$. As a formula:

$$|x| = \begin{cases} x & \text{if } x \geq 0 \\ -x & \text{if } x < 0 \end{cases}$$

The second line often confuses people: for a negative $x$, the expression $-x$ is **positive**. For example, $|-3| = -(-3) = 3$.

### Example 1

- $|7| = 7$
- $|-7| = 7$
- $|0| = 0$
- $|3 - 10| = |-7| = 7$
- $-|-4| = -4$ (the minus outside stays)

> **Key idea:** The absolute value is never negative. It removes the sign of a number: $|x| \geq 0$ for every $x$, and $|x| = 0$ only for $x = 0$.

## Absolute value as distance

$|x|$ is the distance between $x$ and $0$. More generally, $|a - b|$ is the **distance between $a$ and $b$** on the number line. The distance between $-2$ and $5$ is $|5 - (-2)| = 7$ – and also $|-2 - 5| = 7$; the order does not matter.

This picture makes many problems easy. The equation $|x - 3| = 5$ asks: "Which numbers are 5 units away from 3?" Answer: $8$ and $-2$.

## Useful properties

For all real numbers $a$ and $b$:

- $|a \cdot b| = |a| \cdot |b|$ and $\left|\frac{a}{b}\right| = \frac{|a|}{|b|}$ (for $b \neq 0$)
- $|-a| = |a|$
- $\sqrt{a^2} = |a|$, e.g. $\sqrt{(-3)^2} = 3$
- $|a + b| \leq |a| + |b|$ (triangle inequality)

Careful: for sums, the absolute values usually cannot be split. $|-3 + 5| = 2$, but $|-3| + |5| = 8$.

## Solving absolute value equations

For $c > 0$, the equation $|A| = c$ means that $A$ is either $c$ or $-c$. So you split into two linear equations.

### Example 2

$$|2x + 1| = 7$$

Case 1: $2x + 1 = 7$, so $x = 3$. Case 2: $2x + 1 = -7$, so $x = -4$. Both are solutions.

### Example 3: isolate first

$$3|x - 1| + 2 = 14$$

Subtract $2$ and divide by $3$: $|x - 1| = 4$. Then $x - 1 = 4$ or $x - 1 = -4$, so $x = 5$ or $x = -3$.

If the right side is negative, there is no solution: $|x + 2| = -3$ is impossible. If it is zero, there is exactly one: $|x - 6| = 0$ gives $x = 6$.

## A variable on both sides: case analysis

When the right side also contains $x$, use the definition and check each result against its case.

### Example 4

$$|x - 4| = 2x - 1$$

**Case $x \geq 4$:** then $|x - 4| = x - 4$, so $x - 4 = 2x - 1$ and $x = -3$. But $-3$ is not $\geq 4$ – rejected.

**Case $x < 4$:** then $|x - 4| = -(x - 4) = -x + 4$, so $-x + 4 = 2x - 1$, giving $3x = 5$ and $x = \frac{5}{3}$. This fits the case.

Check: $\left|\frac{5}{3} - 4\right| = \frac{7}{3}$ and $2 \cdot \frac{5}{3} - 1 = \frac{7}{3}$. The only solution is $x = \frac{5}{3}$.

## Absolute value inequalities

Thinking in distances again: $|x| < 3$ means "less than 3 away from zero", so $-3 < x < 3$. And $|x| > 3$ means "more than 3 away", so $x < -3$ or $x > 3$.

> **Key idea:** For $c > 0$: $|A| < c$ means $-c < A < c$ (one connected interval). $|A| > c$ means $A < -c$ or $A > c$ (two separate parts).

### Example 5

$$|x - 2| < 3 \quad\Rightarrow\quad -3 < x - 2 < 3 \quad\Rightarrow\quad -1 < x < 5$$

### Example 6

$$|x + 1| \geq 4 \quad\Rightarrow\quad x + 1 \leq -4 \ \text{or}\ x + 1 \geq 4 \quad\Rightarrow\quad x \leq -5 \ \text{or}\ x \geq 3$$

## Common mistakes

- Thinking $|-x|$ is always $x$: if $x$ is negative, $|-x| = -x$.
- Splitting sums: $|a + b|$ is not $|a| + |b|$ in general.
- Finding only one solution of $|A| = c$ and forgetting the case $A = -c$.
- Not isolating the absolute value before splitting into cases.
- In case analysis, keeping results that do not satisfy the case condition.
- Writing $|x| > 3$ as $-3 > x > 3$ – that is impossible; it must be "or".

## Practice

1. Calculate $|-7| + |3 - 5|$.

<details>
<summary>Solution</summary>

$|-7| = 7$ and $|3 - 5| = |-2| = 2$, so the sum is $9$.

</details>

2. Solve $|x + 4| = 6$.

<details>
<summary>Solution</summary>

$x + 4 = 6$ gives $x = 2$; $x + 4 = -6$ gives $x = -10$.

</details>

3. Solve $2|x - 3| - 1 = 9$.

<details>
<summary>Solution</summary>

$2|x - 3| = 10$, so $|x - 3| = 5$. Then $x = 8$ or $x = -2$.

</details>

4. Solve $|2x - 1| \leq 5$.

<details>
<summary>Solution</summary>

$-5 \leq 2x - 1 \leq 5$. Add $1$: $-4 \leq 2x \leq 6$. Divide by $2$: $-2 \leq x \leq 3$.

</details>

5. Solve $|x - 1| > 3$.

<details>
<summary>Solution</summary>

$x - 1 < -3$ or $x - 1 > 3$, so $x < -2$ or $x > 4$.

</details>
