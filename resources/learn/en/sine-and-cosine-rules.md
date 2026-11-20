---
title: Law of Sines and Law of Cosines
category: geometry
order: 100
level: 3
summary: How to find missing sides and angles in any triangle, not just right ones – the law of sines, the law of cosines, and when to use which.
related: trigonometry, triangles, pythagorean-theorem, unit-circle
---

SOH-CAH-TOA only works in right triangles. Real problems – distances between towns, forces in a bridge, the course of a ship – usually involve **general triangles**. The **law of sines** and the **law of cosines** let you calculate every missing side and angle as soon as three suitable pieces are known.

## Conventions

As usual, the corners are $A$, $B$, $C$, the angles there are $\alpha$, $\beta$, $\gamma$, and each side carries the lowercase letter of the opposite corner: $a$ is opposite $\alpha$, $b$ opposite $\beta$, $c$ opposite $\gamma$. Both laws depend on this pairing of each side with its opposite angle.

## The law of sines

> **Key idea:** In every triangle, $\frac{a}{\sin \alpha} = \frac{b}{\sin \beta} = \frac{c}{\sin \gamma}$. Each side divided by the sine of its opposite angle gives the same value.

**Why it holds:** draw the height $h$ from $C$ onto side $c$. It splits the triangle into two right triangles. In the left one, $h = b \cdot \sin \alpha$; in the right one, $h = a \cdot \sin \beta$. So $b \sin \alpha = a \sin \beta$, which rearranges to $\frac{a}{\sin \alpha} = \frac{b}{\sin \beta}$. The same argument with another height brings in $c$. (The common value is in fact the diameter of the circumcircle.)

You need a **pair** – a side together with its opposite angle – plus one more piece. Typical cases:

- two angles and one side (ASA or AAS),
- two sides and an angle opposite one of them (SSA).

### Example 1: two angles and a side

Given $\alpha = 40^\circ$, $\beta = 60^\circ$ and $a = 10$. First $\gamma = 180^\circ - 40^\circ - 60^\circ = 80^\circ$. Then

$$b = \frac{a \cdot \sin \beta}{\sin \alpha} = \frac{10 \cdot \sin 60^\circ}{\sin 40^\circ} \approx \frac{8.660}{0.6428} \approx 13.47$$

$$c = \frac{a \cdot \sin \gamma}{\sin \alpha} = \frac{10 \cdot \sin 80^\circ}{\sin 40^\circ} \approx \frac{9.848}{0.6428} \approx 15.32$$

### The ambiguous case (SSA)

When you use the law of sines to find an *angle*, be careful: $\sin \beta = 0.6667$ has two solutions between $0^\circ$ and $180^\circ$, namely $\beta \approx 41.81^\circ$ and $\beta \approx 180^\circ - 41.81^\circ = 138.19^\circ$.

Example: $a = 6$, $b = 8$, $\alpha = 30^\circ$. Then $\sin \beta = \frac{8 \cdot \sin 30^\circ}{6} = \frac{4}{6} \approx 0.6667$. Both values of $\beta$ work here, because $30^\circ + 138.19^\circ < 180^\circ$ – there are two different triangles. If the given angle lies opposite the **longer** of the two given sides, the solution is always unique.

## The law of cosines

> **Key idea:** In every triangle, $c^2 = a^2 + b^2 - 2ab \cos \gamma$ (and likewise $a^2 = b^2 + c^2 - 2bc \cos \alpha$, $b^2 = a^2 + c^2 - 2ac \cos \beta$).

The law of cosines is the Pythagorean theorem with a correction term. If $\gamma = 90^\circ$, then $\cos \gamma = 0$ and you get $c^2 = a^2 + b^2$. If $\gamma$ is obtuse, $\cos \gamma < 0$ and $c$ becomes longer than in the right-angled case; if $\gamma$ is acute, $c$ is shorter.

Use it when:

- two sides and the angle **between** them are known (SAS) – to find the third side,
- all three sides are known (SSS) – to find an angle. Solve for the cosine:

$$\cos \gamma = \frac{a^2 + b^2 - c^2}{2ab}$$

Finding angles with the law of cosines is never ambiguous: an angle between $0^\circ$ and $180^\circ$ is uniquely determined by its cosine.

### Example 2: two sides and the included angle

$a = 5$, $b = 8$, $\gamma = 60^\circ$:

$$c^2 = 25 + 64 - 2 \cdot 5 \cdot 8 \cdot \cos 60^\circ = 89 - 80 \cdot 0.5 = 49 \quad\Rightarrow\quad c = 7$$

### Example 3: three sides

$a = 3$, $b = 5$, $c = 7$. The largest angle lies opposite the longest side:

$$\cos \gamma = \frac{9 + 25 - 49}{2 \cdot 3 \cdot 5} = \frac{-15}{30} = -0.5 \quad\Rightarrow\quad \gamma = 120^\circ$$

## Which law when?

| Given | Method |
|---|---|
| SSS | law of cosines for one angle, then law of sines or cosines |
| SAS | law of cosines for the third side |
| ASA / AAS | angle sum, then law of sines |
| SSA | law of sines (watch for two solutions) |

A good habit: once you have found one angle with the law of cosines, get the next one with the law of sines (for a *smaller* angle, to avoid ambiguity) and the last from the angle sum.

## Area of a triangle

With two sides and the included angle, the height is $h = b \sin \gamma$ on base $a$, so

$$A = \frac{1}{2} ab \sin \gamma$$

For $a = 5$, $b = 8$, $\gamma = 60^\circ$: $A = \frac{1}{2} \cdot 40 \cdot \frac{\sqrt{3}}{2} = 10\sqrt{3} \approx 17.32$.

## Common mistakes

- Pairing a side with the wrong angle – $a$ always belongs to $\alpha$, the angle *opposite* it.
- Using the law of cosines with an angle that is not between the two given sides.
- Forgetting the second solution of $\sin \beta = k$ in the SSA case.
- Calculating $a^2 + b^2 - 2ab$ first and multiplying by $\cos \gamma$ afterwards – only the term $2ab \cos \gamma$ is subtracted.
- Forgetting to take the square root at the end of the law of cosines.

## Practice

1. In a triangle, $a = 8$, $b = 5$ and $\gamma = 60^\circ$. Find $c$.

<details>
<summary>Solution</summary>

$c^2 = 64 + 25 - 2 \cdot 8 \cdot 5 \cdot 0.5 = 89 - 40 = 49$, so $c = 7$.

</details>

2. A triangle has sides $5$, $7$ and $8$. Find the angle opposite the side of length $7$.

<details>
<summary>Solution</summary>

$\cos \beta = \frac{5^2 + 8^2 - 7^2}{2 \cdot 5 \cdot 8} = \frac{25 + 64 - 49}{80} = \frac{40}{80} = 0.5$, so $\beta = 60^\circ$.

</details>

3. Given $\alpha = 45^\circ$, $\beta = 75^\circ$ and $c = 10$. Find $a$.

<details>
<summary>Solution</summary>

$\gamma = 180^\circ - 45^\circ - 75^\circ = 60^\circ$. Law of sines: $a = \frac{c \cdot \sin \alpha}{\sin \gamma} = \frac{10 \cdot \frac{\sqrt{2}}{2}}{\frac{\sqrt{3}}{2}} = \frac{10\sqrt{2}}{\sqrt{3}} \approx 8.165$.

</details>

4. Find the area of a triangle with $a = 6$, $b = 10$ and $\gamma = 30^\circ$.

<details>
<summary>Solution</summary>

$A = \frac{1}{2} \cdot 6 \cdot 10 \cdot \sin 30^\circ = 30 \cdot 0.5 = 15$.

</details>

5. Two hikers leave the same point along straight paths that form an angle of $60^\circ$. One walks $4\text{ km}$, the other $6\text{ km}$. How far apart are they?

<details>
<summary>Solution</summary>

$d^2 = 16 + 36 - 2 \cdot 4 \cdot 6 \cdot 0.5 = 52 - 24 = 28$, so $d = \sqrt{28} = 2\sqrt{7} \approx 5.29\text{ km}$.

</details>
