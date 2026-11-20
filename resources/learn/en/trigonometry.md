---
title: Trigonometry in Right Triangles
category: geometry
order: 80
level: 2
summary: Sine, cosine and tangent as ratios of sides – SOH-CAH-TOA, exact values, inverse functions and how to find missing sides and angles.
related: pythagorean-theorem, similarity, unit-circle, sine-and-cosine-rules
---

The Pythagorean theorem connects the three sides of a right triangle, but it says nothing about the angles. **Trigonometry** fills that gap: with sine, cosine and tangent you can calculate an angle from two sides, or a side from an angle and another side. Surveyors, engineers and game developers use it every day.

## Naming the sides

Take a right triangle and pick one of the two acute angles, call it $\alpha$. Relative to this angle, the three sides get names:

- the **hypotenuse** is the longest side, opposite the right angle,
- the **opposite side** lies across from $\alpha$,
- the **adjacent side** is the leg that touches $\alpha$ (the other side touching $\alpha$ is the hypotenuse).

Which leg is "opposite" and which is "adjacent" depends on the angle you are looking at. For the other acute angle, the roles swap.

## Sine, cosine and tangent

All right triangles with the same angle $\alpha$ are similar, so the ratio of any two sides depends only on $\alpha$, not on the size of the triangle. These ratios get names:

> **Key idea:** $\sin \alpha = \frac{\text{opposite}}{\text{hypotenuse}}$, $\quad \cos \alpha = \frac{\text{adjacent}}{\text{hypotenuse}}$, $\quad \tan \alpha = \frac{\text{opposite}}{\text{adjacent}}$. Memory aid: **SOH-CAH-TOA**.

Because the hypotenuse is the longest side, $\sin \alpha$ and $\cos \alpha$ are always between $0$ and $1$ for acute angles. The tangent can be any positive number.

## Exact values

Some angles appear so often that their values are worth knowing by heart. They come from a half square (for $45^\circ$) and a half equilateral triangle (for $30^\circ$ and $60^\circ$).

| $\alpha$ | $30^\circ$ | $45^\circ$ | $60^\circ$ |
|---|---|---|---|
| $\sin \alpha$ | $\frac{1}{2}$ | $\frac{\sqrt{2}}{2}$ | $\frac{\sqrt{3}}{2}$ |
| $\cos \alpha$ | $\frac{\sqrt{3}}{2}$ | $\frac{\sqrt{2}}{2}$ | $\frac{1}{2}$ |
| $\tan \alpha$ | $\frac{\sqrt{3}}{3}$ | $1$ | $\sqrt{3}$ |

For all other angles use a calculator – and make sure it is set to **degrees** (DEG), not radians.

## Useful relationships

From the definitions and the Pythagorean theorem:

$$\tan \alpha = \frac{\sin \alpha}{\cos \alpha} \qquad\qquad \sin^2 \alpha + \cos^2 \alpha = 1$$

The two acute angles of a right triangle add up to $90^\circ$, and the opposite side of one is the adjacent side of the other. Hence

$$\sin \alpha = \cos(90^\circ - \alpha) \qquad\qquad \cos \alpha = \sin(90^\circ - \alpha)$$

## Finding sides

Choose the ratio that contains the known side and the unknown side, then solve.

### Example 1

Hypotenuse $10\text{ cm}$, $\alpha = 30^\circ$. Find both legs.

$$\text{opposite} = 10 \cdot \sin 30^\circ = 10 \cdot 0.5 = 5\text{ cm}$$

$$\text{adjacent} = 10 \cdot \cos 30^\circ \approx 10 \cdot 0.866 = 8.66\text{ cm}$$

### Example 2: angle of elevation

From a point $20\text{ m}$ away from the foot of a tower, you see the top at an angle of $40^\circ$ above the horizontal. The distance is the adjacent side, the height is the opposite side:

$$h = 20 \cdot \tan 40^\circ \approx 20 \cdot 0.8391 \approx 16.78\text{ m}$$

## Finding angles

To get an angle from a ratio, use the **inverse functions** $\sin^{-1}$, $\cos^{-1}$, $\tan^{-1}$ (also written arcsin, arccos, arctan). On most calculators they are the second function of the sin, cos, tan keys.

> **Key idea:** If $\tan \alpha = 0.75$, then $\alpha = \tan^{-1}(0.75)$. The inverse function answers the question "which angle has this ratio?".

### Example 3

The legs of a right triangle are $3$ (opposite $\alpha$) and $4$ (adjacent to $\alpha$):

$$\tan \alpha = \frac{3}{4} = 0.75 \quad\Rightarrow\quad \alpha = \tan^{-1}(0.75) \approx 36.87^\circ$$

The other acute angle is $90^\circ - 36.87^\circ = 53.13^\circ$.

## Common mistakes

- Using the wrong side as "opposite" or "adjacent" – always label the sides relative to the angle in question.
- Using sine, cosine and tangent in triangles without a right angle. For general triangles you need the law of sines or cosines.
- Calculator set to radians: $\sin 30$ then gives about $-0.988$ instead of $0.5$.
- Writing $\sin^{-1}(x) = \frac{1}{\sin x}$. The inverse function is *not* the reciprocal.
- Dividing when you should multiply: if the unknown side is in the numerator, multiply; if it is in the denominator, divide.

## Practice

1. A right triangle has hypotenuse $12$ and $\alpha = 60^\circ$. Find the opposite and adjacent sides exactly.

<details>
<summary>Solution</summary>

Opposite: $12 \cdot \sin 60^\circ = 12 \cdot \frac{\sqrt{3}}{2} = 6\sqrt{3} \approx 10.39$. Adjacent: $12 \cdot \cos 60^\circ = 12 \cdot \frac{1}{2} = 6$.

</details>

2. A $6\text{ m}$ ladder makes an angle of $70^\circ$ with the ground. How high up the wall does it reach?

<details>
<summary>Solution</summary>

The ladder is the hypotenuse, the height is opposite the angle: $h = 6 \cdot \sin 70^\circ \approx 6 \cdot 0.9397 \approx 5.64\text{ m}$.

</details>

3. In a right triangle the side opposite $\alpha$ is $5$ and the hypotenuse is $13$. Find $\alpha$.

<details>
<summary>Solution</summary>

$\sin \alpha = \frac{5}{13} \approx 0.3846$, so $\alpha = \sin^{-1}(0.3846) \approx 22.62^\circ$.

</details>

4. For an acute angle, $\sin \alpha = 0.6$. Find $\cos \alpha$ and $\tan \alpha$ without a calculator.

<details>
<summary>Solution</summary>

$\cos^2 \alpha = 1 - 0.36 = 0.64$, so $\cos \alpha = 0.8$. Then $\tan \alpha = \frac{0.6}{0.8} = 0.75$.

</details>

5. A ramp rises $1\text{ m}$ over a horizontal distance of $12\text{ m}$. What angle does it make with the ground?

<details>
<summary>Solution</summary>

$\tan \alpha = \frac{1}{12} \approx 0.0833$, so $\alpha \approx 4.76^\circ$.

</details>
