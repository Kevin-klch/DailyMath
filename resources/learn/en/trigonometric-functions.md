---
title: Trigonometric Functions
category: functions
order: 60
level: 3
summary: Sine, cosine and tangent as periodic functions – their graphs, period, amplitude, zeros, symmetry, the general sine function and solving sin x = c.
related: unit-circle, trigonometry, transformations-of-functions, derivatives
---

In geometry, sine and cosine are ratios of sides in a right triangle. Extended via the unit circle, they become functions defined for **every** real number – and their graphs are waves that repeat forever. That makes them the natural tool for anything periodic: sound, alternating current, tides, the length of daylight over a year or the motion of a pendulum.

## From the unit circle to the graph

Picture a point travelling counter-clockwise around the unit circle (radius $1$). After it has covered an arc of length $x$ – the angle in **radians** – its coordinates are $(\cos x, \sin x)$. So $\sin x$ is the height of the point, $\cos x$ its horizontal position. One full turn is $2\pi$.

Plotting the height against $x$ gives the **sine curve**, plotting the horizontal position gives the **cosine curve**.

| $x$ | $0$ | $\frac{\pi}{6}$ | $\frac{\pi}{2}$ | $\frac{5\pi}{6}$ | $\pi$ | $\frac{3\pi}{2}$ | $2\pi$ |
|---|---|---|---|---|---|---|---|
| $\sin x$ | $0$ | $\frac{1}{2}$ | $1$ | $\frac{1}{2}$ | $0$ | $-1$ | $0$ |
| $\cos x$ | $1$ | $\frac{\sqrt{3}}{2}$ | $0$ | $-\frac{\sqrt{3}}{2}$ | $-1$ | $0$ | $1$ |

The sine curve starts at the origin, rises to its maximum $1$ at $\frac{\pi}{2}$, comes back down to $0$ at $\pi$, reaches its minimum $-1$ at $\frac{3\pi}{2}$ and returns to $0$ at $2\pi$ – then the pattern repeats. The cosine curve has exactly the same shape but starts at its maximum $(0, 1)$.

## Key properties of sine and cosine

> **Key idea:** $\sin$ and $\cos$ are periodic with period $2\pi$: $\sin(x + 2\pi) = \sin x$ and $\cos(x + 2\pi) = \cos x$. Their values always lie between $-1$ and $1$.

| | $\sin x$ | $\cos x$ |
|---|---|---|
| Domain | $\mathbb{R}$ | $\mathbb{R}$ |
| Range | $[-1, 1]$ | $[-1, 1]$ |
| Period | $2\pi$ | $2\pi$ |
| Zeros | $k\pi$ | $\frac{\pi}{2} + k\pi$ |
| Maxima | $\frac{\pi}{2} + 2k\pi$ | $2k\pi$ |
| Symmetry | odd: $\sin(-x) = -\sin x$ | even: $\cos(-x) = \cos x$ |

Here $k$ stands for any integer. Two further facts are used constantly:

- The cosine curve is the sine curve shifted $\frac{\pi}{2}$ to the left: $\cos x = \sin\left(x + \frac{\pi}{2}\right)$.
- Pythagoras on the unit circle gives $\sin^2 x + \cos^2 x = 1$ for every $x$.

## The tangent function

The tangent is defined as

$$\tan x = \frac{\sin x}{\cos x}$$

It is undefined wherever $\cos x = 0$, i.e. at $x = \frac{\pi}{2} + k\pi$; there the graph has **vertical asymptotes**. Between two asymptotes, the graph rises from $-\infty$ to $+\infty$, passing through the zeros $x = k\pi$. The tangent has period $\pi$, not $2\pi$, and its range is all of $\mathbb{R}$.

## The general sine function

Stretching and shifting the sine curve gives

$$f(x) = a \cdot \sin\big(b(x - c)\big) + d \qquad (b > 0)$$

> **Key idea:** $|a|$ is the **amplitude**, the period is $p = \frac{2\pi}{b}$, $c$ shifts the curve horizontally, and $d$ shifts it vertically – the curve then oscillates around the midline $y = d$ between $d - |a|$ and $d + |a|$.

A negative $a$ additionally reflects the curve in its midline.

### Example 1

$f(x) = 3\sin(2x)$: amplitude $3$, period $\frac{2\pi}{2} = \pi$. The curve completes a full wave on $[0, \pi]$ and reaches its first maximum $3$ at $x = \frac{\pi}{4}$, a quarter of the period.

### Example 2

$f(x) = 2\sin\left(x - \frac{\pi}{3}\right) + 1$: amplitude $2$, period $2\pi$, shifted $\frac{\pi}{3}$ to the right and $1$ up. The values range from $1 - 2 = -1$ to $1 + 2 = 3$, and the curve crosses its midline $y = 1$ going upwards at $x = \frac{\pi}{3}$.

### Example 3: equation from a description

A wave has maximum $5$, minimum $1$ and period $4$, and at $x = 0$ it is on its midline and rising. Then $d = \frac{5 + 1}{2} = 3$, $a = \frac{5 - 1}{2} = 2$, $b = \frac{2\pi}{4} = \frac{\pi}{2}$ and $c = 0$:

$$f(x) = 2\sin\left(\frac{\pi}{2}x\right) + 3$$

## Solving trigonometric equations

Because of periodicity, an equation like $\sin x = c$ (with $-1 < c < 1$) has infinitely many solutions – two in each period.

### Example 4

Solve $\sin x = \frac{1}{2}$ for $0 \le x < 2\pi$.

1. One solution is known from the table: $x_1 = \frac{\pi}{6}$.
2. The sine curve is symmetric about $x = \frac{\pi}{2}$, so the second solution is $x_2 = \pi - \frac{\pi}{6} = \frac{5\pi}{6}$.

All solutions: $x = \frac{\pi}{6} + 2k\pi$ or $x = \frac{5\pi}{6} + 2k\pi$.

For cosine use the symmetry about $x = 0$ instead: if $x_1$ solves $\cos x = c$, so does $2\pi - x_1$.

## Common mistakes

- Calculating in degrees while the calculator (or the formula) expects radians – in functions, $x$ is in radians.
- Finding only one solution of $\sin x = c$ – there are two per period.
- Getting the period wrong: for $\sin(3x)$ the period is $\frac{2\pi}{3}$, not $6\pi$.
- Reading the shift from $\sin(2x - \pi)$ as $\pi$: factor first, $\sin\big(2(x - \frac{\pi}{2})\big)$, so the shift is $\frac{\pi}{2}$.
- Forgetting that $\tan x$ is undefined at $\frac{\pi}{2} + k\pi$.

## Practice

1. State the amplitude and the period of $f(x) = 4\cos(3x)$.

<details>
<summary>Solution</summary>

Amplitude $4$, period $\frac{2\pi}{3}$.

</details>

2. What is the range of $f(x) = -2\sin x + 3$?

<details>
<summary>Solution</summary>

$-2\sin x$ takes values between $-2$ and $2$; adding $3$ gives the range $[1, 5]$.

</details>

3. Solve $\cos x = 0$ for $0 \le x < 2\pi$.

<details>
<summary>Solution</summary>

$x = \frac{\pi}{2}$ and $x = \frac{3\pi}{2}$.

</details>

4. Solve $\cos x = \frac{1}{2}$ for $0 \le x < 2\pi$.

<details>
<summary>Solution</summary>

From the unit circle, $\cos \frac{\pi}{3} = \frac{1}{2}$, so $x_1 = \frac{\pi}{3}$. By symmetry, $x_2 = 2\pi - \frac{\pi}{3} = \frac{5\pi}{3}$.

</details>

5. Find a sine function with maximum $7$, minimum $1$ and period $\pi$ that is on its midline and rising at $x = 0$.

<details>
<summary>Solution</summary>

$d = \frac{7 + 1}{2} = 4$, $a = \frac{7 - 1}{2} = 3$, $b = \frac{2\pi}{\pi} = 2$. So $f(x) = 3\sin(2x) + 4$.

</details>
