---
title: The Unit Circle and Radians
category: geometry
order: 90
level: 3
summary: How the unit circle defines sine and cosine for every angle, how to work with radians, and the symmetries that give you values in all four quadrants.
related: trigonometry, trigonometric-functions, circles, angles
---

In a right triangle, sine and cosine only make sense for angles between $0^\circ$ and $90^\circ$. The **unit circle** extends them to *every* angle – including obtuse, reflex and negative angles. At the same time it motivates a new way of measuring angles, **radians**, which is the standard in calculus and physics.

## The unit circle

The unit circle is the circle with radius $1$ centred at the origin of a coordinate system. Start at the point $(1, 0)$ on the positive $x$-axis and rotate counter-clockwise by an angle $\alpha$. You land on a point $P$ on the circle.

Drop a perpendicular from $P$ to the $x$-axis. For an acute angle you get a right triangle with hypotenuse $1$ (the radius), horizontal leg equal to the $x$-coordinate of $P$ and vertical leg equal to its $y$-coordinate. Since the hypotenuse is $1$, the triangle definitions give $\cos \alpha = x$ and $\sin \alpha = y$.

> **Key idea:** The point on the unit circle at angle $\alpha$ is $P(\cos \alpha, \sin \alpha)$. This is the *definition* of sine and cosine for every angle.

Because $P$ lies on a circle of radius $1$, the Pythagorean theorem immediately gives

$$\sin^2 \alpha + \cos^2 \alpha = 1$$

for every angle. The tangent is defined as $\tan \alpha = \frac{\sin \alpha}{\cos \alpha}$ (whenever $\cos \alpha \neq 0$); it is the slope of the radius $OP$.

## Signs in the four quadrants

The axes split the plane into four quadrants. The signs of the coordinates tell you the signs of sine and cosine:

| Quadrant | Angles | $\sin \alpha$ | $\cos \alpha$ | $\tan \alpha$ |
|---|---|---|---|---|
| I | $0^\circ$ to $90^\circ$ | $+$ | $+$ | $+$ |
| II | $90^\circ$ to $180^\circ$ | $+$ | $-$ | $-$ |
| III | $180^\circ$ to $270^\circ$ | $-$ | $-$ | $+$ |
| IV | $270^\circ$ to $360^\circ$ | $-$ | $+$ | $-$ |

At the axes: $\sin 0^\circ = 0$, $\cos 0^\circ = 1$; $\sin 90^\circ = 1$, $\cos 90^\circ = 0$; $\sin 180^\circ = 0$, $\cos 180^\circ = -1$; $\sin 270^\circ = -1$, $\cos 270^\circ = 0$.

## Symmetries

Every point in quadrants II, III and IV is a mirror image of a point in quadrant I. That is why you only need to know the values for acute angles:

$$\sin(180^\circ - \alpha) = \sin \alpha \qquad \cos(180^\circ - \alpha) = -\cos \alpha$$

$$\sin(180^\circ + \alpha) = -\sin \alpha \qquad \cos(180^\circ + \alpha) = -\cos \alpha$$

$$\sin(-\alpha) = -\sin \alpha \qquad \cos(-\alpha) = \cos \alpha$$

Negative angles mean rotating clockwise. And after a full turn you are back where you started: $\sin(\alpha + 360^\circ) = \sin \alpha$, $\cos(\alpha + 360^\circ) = \cos \alpha$.

## Radians

Instead of dividing a full turn into $360$ parts, you can measure an angle by the **length of the arc** it cuts out of the unit circle. This measure is called the **radian** (rad). The whole circumference of the unit circle is $2\pi$, so

$$360^\circ = 2\pi \qquad\qquad 180^\circ = \pi$$

> **Key idea:** To convert, use $x = \frac{\pi}{180^\circ} \cdot \alpha$ (degrees to radians) and $\alpha = \frac{180^\circ}{\pi} \cdot x$ (radians to degrees).

| Degrees | $0^\circ$ | $30^\circ$ | $45^\circ$ | $60^\circ$ | $90^\circ$ | $180^\circ$ | $270^\circ$ | $360^\circ$ |
|---|---|---|---|---|---|---|---|---|
| Radians | $0$ | $\frac{\pi}{6}$ | $\frac{\pi}{4}$ | $\frac{\pi}{3}$ | $\frac{\pi}{2}$ | $\pi$ | $\frac{3\pi}{2}$ | $2\pi$ |

One radian is about $57.3^\circ$. On a circle with radius $r$, the arc length for an angle $x$ in radians is simply $b = r \cdot x$ – much simpler than with degrees.

Radians make formulas in calculus clean, which is why trigonometric functions are almost always written with radians.

## Worked examples

### Example 1: converting

$135^\circ = \frac{\pi}{180^\circ} \cdot 135^\circ = \frac{3\pi}{4}$, and $\frac{5\pi}{6} = \frac{180^\circ}{\pi} \cdot \frac{5\pi}{6} = 150^\circ$.

### Example 2: values beyond 90°

$\sin 150^\circ = \sin(180^\circ - 30^\circ) = \sin 30^\circ = \frac{1}{2}$.

$\cos 240^\circ = \cos(180^\circ + 60^\circ) = -\cos 60^\circ = -\frac{1}{2}$.

### Example 3: solving an equation

Find all angles $\alpha$ with $0^\circ \le \alpha < 360^\circ$ and $\sin \alpha = \frac{1}{2}$.

The calculator gives $\alpha_1 = 30^\circ$. Sine is also positive in quadrant II, and $\sin(180^\circ - 30^\circ) = \sin 30^\circ$, so the second solution is $\alpha_2 = 150^\circ$.

## Common mistakes

- Calculator in the wrong mode (degrees vs. radians).
- Taking only the calculator's answer when solving $\sin \alpha = c$ – there is usually a second solution in $[0^\circ, 360^\circ)$.
- Forgetting the signs in quadrants II to IV.
- Converting with $\frac{180}{\pi}$ in the wrong direction. Check: $\pi$ must become $180^\circ$.
- Thinking $\pi$ "is" $180$ as a number – $\pi \approx 3.14$; only as an *angle* does $\pi$ rad correspond to $180^\circ$.

## Practice

1. Convert $210^\circ$ to radians and $\frac{3\pi}{2}$ to degrees.

<details>
<summary>Solution</summary>

$210^\circ \cdot \frac{\pi}{180^\circ} = \frac{7\pi}{6}$ and $\frac{3\pi}{2} \cdot \frac{180^\circ}{\pi} = 270^\circ$.

</details>

2. Find $\cos 300^\circ$ and $\sin 225^\circ$ exactly.

<details>
<summary>Solution</summary>

$\cos 300^\circ = \cos(360^\circ - 60^\circ) = \cos 60^\circ = \frac{1}{2}$. $\sin 225^\circ = \sin(180^\circ + 45^\circ) = -\sin 45^\circ = -\frac{\sqrt{2}}{2}$.

</details>

3. Solve $\cos x = -\frac{1}{2}$ for $0 \le x < 2\pi$.

<details>
<summary>Solution</summary>

$\cos \frac{\pi}{3} = \frac{1}{2}$. Cosine is negative in quadrants II and III: $x_1 = \pi - \frac{\pi}{3} = \frac{2\pi}{3}$ and $x_2 = \pi + \frac{\pi}{3} = \frac{4\pi}{3}$.

</details>

4. How long is the arc on a circle with radius $4\text{ cm}$ for the angle $x = \frac{\pi}{3}$?

<details>
<summary>Solution</summary>

$b = r \cdot x = 4 \cdot \frac{\pi}{3} = \frac{4\pi}{3} \approx 4.19\text{ cm}$.

</details>

5. In which quadrant does an angle lie if $\sin \alpha < 0$ and $\tan \alpha > 0$?

<details>
<summary>Solution</summary>

$\sin \alpha < 0$ means quadrant III or IV. $\tan \alpha > 0$ requires sine and cosine to have the same sign, so $\cos \alpha < 0$ as well: quadrant III.

</details>
