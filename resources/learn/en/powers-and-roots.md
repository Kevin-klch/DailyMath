---
title: Powers and Square Roots
category: arithmetic
order: 80
level: 1
summary: What powers and square roots are, how to calculate them, and the most important rules and pitfalls for working with them.
related: laws-of-exponents, scientific-notation, prime-numbers, pythagorean-theorem
---

A **power** is a short way of writing repeated multiplication: instead of $2 \cdot 2 \cdot 2 \cdot 2 \cdot 2$ you write $2^5$. The **square root** is the reverse of squaring: it asks which number, multiplied by itself, gives a certain value. Powers and roots appear everywhere – in areas and volumes, in the Pythagorean theorem, in growth processes and in scientific notation.

## Powers

In the power $a^n$, the number $a$ is the **base** and $n$ is the **exponent**. The exponent says how many times the base appears as a factor:

$$a^n = \underbrace{a \cdot a \cdot \ldots \cdot a}_{n \text{ factors}}$$

Examples:

- $3^4 = 3 \cdot 3 \cdot 3 \cdot 3 = 81$
- $10^3 = 10 \cdot 10 \cdot 10 = 1000$
- $\left(\frac{1}{2}\right)^3 = \frac{1}{2} \cdot \frac{1}{2} \cdot \frac{1}{2} = \frac{1}{8}$

$a^2$ is read "$a$ squared" (it is the area of a square with side $a$), and $a^3$ is "$a$ cubed" (the volume of a cube with edge $a$).

> **Key idea:** $a^n$ means $a$ multiplied by itself $n$ times. It is **not** $a \cdot n$: $2^3 = 8$, but $2 \cdot 3 = 6$.

### Special exponents

- $a^1 = a$
- $a^0 = 1$ for every $a \neq 0$

Why is $a^0 = 1$? Look at the pattern $2^3 = 8$, $2^2 = 4$, $2^1 = 2$: each step down divides by 2. One more step gives $2^0 = 2 : 2 = 1$.

### Powers of negative numbers and parentheses

$$(-3)^2 = (-3) \cdot (-3) = 9 \qquad -3^2 = -(3 \cdot 3) = -9$$

Without parentheses, the exponent only belongs to the $3$. A negative base with an even exponent gives a positive result, with an odd exponent a negative one: $(-2)^5 = -32$.

### Square numbers worth knowing

| $n$ | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10 | 11 | 12 | 13 | 14 | 15 |
|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|
| $n^2$ | 1 | 4 | 9 | 16 | 25 | 36 | 49 | 64 | 81 | 100 | 121 | 144 | 169 | 196 | 225 |

Knowing these by heart makes roots and the Pythagorean theorem much faster.

## Square roots

The **square root** of a number $a \ge 0$ is the non-negative number that gives $a$ when squared:

$$\sqrt{a} = b \quad \text{means} \quad b^2 = a \text{ and } b \ge 0$$

The number under the root sign is called the **radicand**.

- $\sqrt{49} = 7$, because $7^2 = 49$
- $\sqrt{0.09} = 0.3$, because $0.3^2 = 0.09$
- $\sqrt{\frac{4}{25}} = \frac{2}{5}$, because $\left(\frac{2}{5}\right)^2 = \frac{4}{25}$

Although $(-7)^2 = 49$ too, the symbol $\sqrt{49}$ always means the **positive** value $7$. The equation $x^2 = 49$, however, has two solutions: $x = 7$ and $x = -7$.

> **Key idea:** $\sqrt{a}$ is always $\ge 0$ and is only defined for $a \ge 0$ (in the real numbers). Squaring and taking the square root undo each other: $\left(\sqrt{a}\right)^2 = a$ and $\sqrt{a^2} = |a|$.

### Roots of negative numbers

There is no real number whose square is negative, so $\sqrt{-4}$ is **not defined** in the real numbers.

### Roots that are not whole numbers

If the radicand is not a perfect square, the root is irrational, e.g. $\sqrt{2} \approx 1.414$. You can still estimate it: since $36 < 40 < 49$, we know $6 < \sqrt{40} < 7$.

## Rules for square roots

For $a, b \ge 0$:

$$\sqrt{a \cdot b} = \sqrt{a} \cdot \sqrt{b} \qquad \sqrt{\frac{a}{b}} = \frac{\sqrt{a}}{\sqrt{b}} \quad (b > 0)$$

These rules let you **simplify** roots by pulling out square factors:

$$\sqrt{72} = \sqrt{36 \cdot 2} = \sqrt{36} \cdot \sqrt{2} = 6\sqrt{2}$$

There is **no** such rule for addition: $\sqrt{9 + 16} = \sqrt{25} = 5$, but $\sqrt{9} + \sqrt{16} = 3 + 4 = 7$.

## Other roots

The **cube root** $\sqrt[3]{a}$ is the number whose cube is $a$: $\sqrt[3]{125} = 5$, because $5^3 = 125$. Unlike square roots, cube roots of negative numbers exist: $\sqrt[3]{-8} = -2$. In general, $\sqrt[n]{a}$ is the $n$-th root. Rules for calculating with general exponents are covered in the laws of exponents.

## Worked examples

### Example 1

$$2^3 + 3^2 \cdot \sqrt{16}$$

Powers and roots first: $2^3 = 8$, $3^2 = 9$, $\sqrt{16} = 4$. Then $8 + 9 \cdot 4 = 8 + 36 = 44$.

### Example 2

Simplify $\sqrt{50} + \sqrt{18}$.

$\sqrt{50} = \sqrt{25 \cdot 2} = 5\sqrt{2}$ and $\sqrt{18} = \sqrt{9 \cdot 2} = 3\sqrt{2}$. Both have the same root, so they can be combined: $5\sqrt{2} + 3\sqrt{2} = 8\sqrt{2}$.

### Example 3

A square field has an area of $169 \text{ m}^2$. How long is one side? The side is $\sqrt{169} = 13$ m.

## Common mistakes

- Calculating $a^n$ as $a \cdot n$, e.g. $5^2 = 10$ instead of $25$.
- Confusing $-3^2 = -9$ and $(-3)^2 = 9$.
- Splitting a root over a sum: $\sqrt{a + b} \neq \sqrt{a} + \sqrt{b}$.
- Writing $\sqrt{25} = \pm 5$. The root symbol means only the positive value.
- Thinking $a^0 = 0$. In fact $a^0 = 1$.

## Practice

1. Calculate $4^3$, $(-2)^4$, $-2^4$ and $7^0$.

<details>
<summary>Solution</summary>

$4^3 = 64$, $(-2)^4 = 16$, $-2^4 = -16$ and $7^0 = 1$.

</details>

2. Calculate $\sqrt{144}$, $\sqrt{0.25}$ and $\sqrt{\frac{9}{64}}$.

<details>
<summary>Solution</summary>

$\sqrt{144} = 12$, $\sqrt{0.25} = 0.5$ and $\sqrt{\frac{9}{64}} = \frac{3}{8}$.

</details>

3. Between which two whole numbers does $\sqrt{90}$ lie?

<details>
<summary>Solution</summary>

$81 < 90 < 100$, so $9 < \sqrt{90} < 10$.

</details>

4. Simplify $\sqrt{48}$ and $\sqrt{200}$.

<details>
<summary>Solution</summary>

$\sqrt{48} = \sqrt{16 \cdot 3} = 4\sqrt{3}$ and $\sqrt{200} = \sqrt{100 \cdot 2} = 10\sqrt{2}$.

</details>

5. Calculate $\sqrt{36 + 64}$ and $\sqrt{36} + \sqrt{64}$. What do you notice?

<details>
<summary>Solution</summary>

$\sqrt{36 + 64} = \sqrt{100} = 10$, but $\sqrt{36} + \sqrt{64} = 6 + 8 = 14$. The root of a sum is not the sum of the roots.

</details>
