---
title: Complex Numbers
category: advanced
order: 20
level: 3
summary: Numbers of the form a + bi with i² = −1 – arithmetic, the complex conjugate, division, the complex plane, modulus and argument, polar form and solving any quadratic equation.
related: number-sets, quadratic-equations, vectors, trigonometric-functions
---

The equation $x^2 = -1$ has no real solution, because the square of a real number is never negative. **Complex numbers** extend the real numbers by a new number $i$ with exactly this property. The result is a number system in which every quadratic equation – in fact every polynomial equation – has solutions. Complex numbers are indispensable in physics and engineering, for example in describing oscillations and alternating current.

## The imaginary unit

> **Key idea:** The imaginary unit $i$ is defined by $i^2 = -1$. A complex number has the form $z = a + bi$ with real numbers $a$ and $b$.

- $a = \operatorname{Re}(z)$ is the **real part**,
- $b = \operatorname{Im}(z)$ is the **imaginary part** (the real number $b$, not $bi$).

If $b = 0$, $z$ is an ordinary real number – so $\mathbb{R} \subseteq \mathbb{C}$. Numbers with $a = 0$, like $3i$, are called purely imaginary. Two complex numbers are equal exactly when both their real parts and their imaginary parts are equal.

With $i$ we can now take square roots of negative numbers: $\sqrt{-9} = 3i$, since $(3i)^2 = 9i^2 = -9$.

### Powers of i

$$i^1 = i, \quad i^2 = -1, \quad i^3 = -i, \quad i^4 = 1$$

After that the pattern repeats with period 4. For example $i^{10} = i^8 \cdot i^2 = 1 \cdot (-1) = -1$.

## Arithmetic

You calculate with $a + bi$ just as with an expression containing a variable – and replace $i^2$ by $-1$ whenever it appears.

- **Addition:** $(a + bi) + (c + di) = (a + c) + (b + d)i$
- **Multiplication:** $(a + bi)(c + di) = (ac - bd) + (ad + bc)i$

### Example 1

Let $z = 3 + 2i$ and $w = 1 - 5i$.

$$z + w = 4 - 3i$$

$$z \cdot w = 3 - 15i + 2i - 10i^2 = 3 - 13i + 10 = 13 - 13i$$

## The complex conjugate and division

The **complex conjugate** of $z = a + bi$ is $\overline{z} = a - bi$. Multiplying a number by its conjugate always gives a non-negative real number:

$$z \cdot \overline{z} = (a + bi)(a - bi) = a^2 - b^2 i^2 = a^2 + b^2$$

This is the trick for division: expand the fraction with the conjugate of the denominator.

### Example 2

$$\frac{5 + 5i}{1 + 2i} = \frac{(5 + 5i)(1 - 2i)}{(1 + 2i)(1 - 2i)} = \frac{5 - 10i + 5i - 10i^2}{1 + 4} = \frac{15 - 5i}{5} = 3 - i$$

Check: $(3 - i)(1 + 2i) = 3 + 6i - i - 2i^2 = 5 + 5i$. Correct.

## Quadratic equations

With complex numbers, the quadratic formula always works – even if the discriminant is negative.

### Example 3

Solve $x^2 - 4x + 13 = 0$.

$$x = 2 \pm \sqrt{4 - 13} = 2 \pm \sqrt{-9} = 2 \pm 3i$$

The two solutions $2 + 3i$ and $2 - 3i$ are conjugates of each other. This always happens when a quadratic equation with real coefficients has no real solutions.

## The complex plane

A complex number $a + bi$ can be drawn as the point $(a, b)$ – or as an arrow from the origin to it – in the **complex plane**: the horizontal axis is the real axis, the vertical axis the imaginary axis. Addition then corresponds to adding arrows like vectors, and conjugation is a reflection in the real axis.

The length of the arrow is the **modulus** (absolute value):

$$|z| = \sqrt{a^2 + b^2}$$

The angle $\varphi$ between the positive real axis and the arrow is the **argument**. It satisfies $\tan \varphi = \frac{b}{a}$, but you must check which quadrant the point lies in.

## Polar form

Using modulus $r = |z|$ and argument $\varphi$, every complex number can be written as

$$z = r(\cos \varphi + i \sin \varphi)$$

This form makes multiplication beautifully simple:

> **Key idea:** When multiplying complex numbers, the moduli are **multiplied** and the arguments are **added**.

Multiplying by $i$ (modulus $1$, argument $90^\circ$) therefore simply rotates a number by $90^\circ$ counter-clockwise. With Euler's formula $e^{i\varphi} = \cos \varphi + i \sin \varphi$, the polar form becomes $z = r e^{i\varphi}$.

### Example 4

$z = 1 + i$ has modulus $|z| = \sqrt{1 + 1} = \sqrt{2}$ and lies in the first quadrant with $\tan \varphi = 1$, so $\varphi = 45^\circ = \frac{\pi}{4}$. Then $z^2$ has modulus $\sqrt{2}^2 = 2$ and argument $90^\circ$, so $z^2 = 2i$. Check: $(1 + i)^2 = 1 + 2i + i^2 = 2i$.

## Common mistakes

- Forgetting to replace $i^2$ by $-1$.
- Calling $bi$ the imaginary part – the imaginary part of $3 + 4i$ is $4$.
- Using rules like $\sqrt{a} \cdot \sqrt{b} = \sqrt{ab}$ with negative numbers: $\sqrt{-1} \cdot \sqrt{-1} = i \cdot i = -1$, not $\sqrt{1} = 1$.
- Computing the modulus as $a + b$ or including $i$: $|3 - 4i| = \sqrt{9 + 16} = 5$.
- Taking the argument from $\tan \varphi = \frac{b}{a}$ without checking the quadrant.

## Practice

1. Let $z = 2 - 3i$ and $w = 4 + i$. Calculate $z + w$ and $z \cdot w$.

<details>
<summary>Solution</summary>

$z + w = 6 - 2i$. $z \cdot w = 8 + 2i - 12i - 3i^2 = 8 - 10i + 3 = 11 - 10i$.

</details>

2. Calculate $\frac{4 + 2i}{1 - i}$.

<details>
<summary>Solution</summary>

Expand with $1 + i$: $\frac{(4 + 2i)(1 + i)}{(1 - i)(1 + i)} = \frac{4 + 4i + 2i + 2i^2}{2} = \frac{2 + 6i}{2} = 1 + 3i$.

</details>

3. Solve $x^2 + 2x + 5 = 0$.

<details>
<summary>Solution</summary>

$x = -1 \pm \sqrt{1 - 5} = -1 \pm \sqrt{-4} = -1 \pm 2i$.

</details>

4. For $z = 3 - 4i$, find $|z|$, $\overline{z}$ and $z \cdot \overline{z}$.

<details>
<summary>Solution</summary>

$|z| = \sqrt{9 + 16} = 5$, $\overline{z} = 3 + 4i$, $z \cdot \overline{z} = 9 + 16 = 25 = |z|^2$.

</details>

5. Simplify $i^{23}$.

<details>
<summary>Solution</summary>

$23 = 4 \cdot 5 + 3$, so $i^{23} = (i^4)^5 \cdot i^3 = 1 \cdot (-i) = -i$.

</details>
