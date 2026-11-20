---
title: The Pythagorean Theorem
category: geometry
order: 30
level: 1
summary: In a right triangle a² + b² = c². How to use it to find missing sides, distances and diagonals – and why it is true.
related: triangles, powers-and-roots, trigonometry, similarity
---

The **Pythagorean theorem** links the three sides of a right triangle. If you know two of them, you can always calculate the third. It is one of the most useful results in all of mathematics: it gives distances in a coordinate system, diagonals of rectangles and boxes, and heights of roofs and ladders.

## The parts of a right triangle

In a right triangle, the side opposite the right angle is the longest side. It is called the **hypotenuse**, usually labelled $c$. The two shorter sides that form the right angle are the **legs**, usually $a$ and $b$.

> **Key idea:** In every right triangle with legs $a$, $b$ and hypotenuse $c$, the equation $a^2 + b^2 = c^2$ holds.

In words: the squares on the two legs together have the same area as the square on the hypotenuse.

Always check *which* side is the hypotenuse – it is the side opposite the right angle, not necessarily the one called $c$ in an exercise.

## Why it is true

Take a large square with side length $a + b$. Inside it, place four copies of the right triangle so that each one sits in a corner, with legs $a$ and $b$ running along the edges of the square. Their hypotenuses then form a tilted square in the middle with side $c$.

The area of the large square can be counted in two ways:

$$(a + b)^2 = c^2 + 4 \cdot \frac{1}{2}ab$$

Expanding the left side gives $a^2 + 2ab + b^2 = c^2 + 2ab$. Subtract $2ab$ on both sides and you get $a^2 + b^2 = c^2$.

## Finding a missing side

Solve the equation for the side you need:

$$c = \sqrt{a^2 + b^2} \qquad\qquad a = \sqrt{c^2 - b^2}$$

For the hypotenuse you **add** the squares; for a leg you **subtract** the smaller square from the larger one.

### Example 1: hypotenuse

The legs are $6\text{ cm}$ and $8\text{ cm}$:

$$c = \sqrt{6^2 + 8^2} = \sqrt{36 + 64} = \sqrt{100} = 10\text{ cm}$$

### Example 2: leg

The hypotenuse is $13$, one leg is $5$:

$$b = \sqrt{13^2 - 5^2} = \sqrt{169 - 25} = \sqrt{144} = 12$$

### Example 3: a ladder

A $5\text{ m}$ ladder leans against a wall. Its foot is $1.4\text{ m}$ away from the wall. How high up the wall does it reach?

The ladder is the hypotenuse, the ground distance and the wall height are the legs:

$$h = \sqrt{5^2 - 1.4^2} = \sqrt{25 - 1.96} = \sqrt{23.04} = 4.8\text{ m}$$

## The converse

The theorem also works backwards: if three side lengths satisfy $a^2 + b^2 = c^2$, the triangle has a right angle opposite $c$. This lets you test whether an angle is exactly $90^\circ$. If $a^2 + b^2 > c^2$ (with $c$ the longest side), the triangle is acute; if $a^2 + b^2 < c^2$, it is obtuse.

Whole-number solutions are called **Pythagorean triples**. The best known are $(3, 4, 5)$, $(5, 12, 13)$, $(8, 15, 17)$ and $(7, 24, 25)$. Every multiple of a triple is again a triple, for example $(6, 8, 10)$.

## Typical applications

**Diagonal of a rectangle** with sides $a$ and $b$: $d = \sqrt{a^2 + b^2}$. For a square with side $a$ this gives $d = a\sqrt{2}$.

**Height of an equilateral triangle** with side $a$: the height splits it into two right triangles with hypotenuse $a$ and leg $\frac{a}{2}$, so

$$h = \sqrt{a^2 - \left(\frac{a}{2}\right)^2} = \frac{\sqrt{3}}{2}a$$

**Distance between two points** $P(x_1, y_1)$ and $Q(x_2, y_2)$: the horizontal and vertical differences are the legs, so

$$d = \sqrt{(x_2 - x_1)^2 + (y_2 - y_1)^2}$$

For $P(1, 2)$ and $Q(7, 10)$: $d = \sqrt{6^2 + 8^2} = 10$.

**Space diagonal of a box** with edges $a$, $b$, $c$: apply the theorem twice to get $d = \sqrt{a^2 + b^2 + c^2}$. A box of $2 \times 3 \times 6$ has $d = \sqrt{4 + 9 + 36} = \sqrt{49} = 7$.

> **Key idea:** Whenever you need a length in a figure, look for a right triangle that contains it – often you have to draw in a height or a diagonal first.

## Common mistakes

- Using the theorem in triangles that have no right angle.
- Treating a leg as the hypotenuse – the hypotenuse is always opposite the right angle and is the longest side.
- Writing $\sqrt{a^2 + b^2} = a + b$. The root of a sum is *not* the sum of the roots: $\sqrt{9 + 16} = 5$, not $7$.
- Adding the squares when looking for a leg instead of subtracting.
- Forgetting to take the square root at the end.

## Practice

1. A right triangle has legs $9$ and $12$. How long is the hypotenuse?

<details>
<summary>Solution</summary>

$c = \sqrt{81 + 144} = \sqrt{225} = 15$.

</details>

2. The hypotenuse of a right triangle is $17\text{ cm}$, one leg is $8\text{ cm}$. Find the other leg.

<details>
<summary>Solution</summary>

$b = \sqrt{289 - 64} = \sqrt{225} = 15\text{ cm}$.

</details>

3. Is the triangle with sides $7$, $8$ and $11$ right-angled?

<details>
<summary>Solution</summary>

$7^2 + 8^2 = 49 + 64 = 113$, but $11^2 = 121$. Since $113 \neq 121$, it is not right-angled (because $113 < 121$, it is obtuse).

</details>

4. How long is the diagonal of a square with side $5\text{ cm}$?

<details>
<summary>Solution</summary>

$d = \sqrt{25 + 25} = \sqrt{50} = 5\sqrt{2} \approx 7.07\text{ cm}$.

</details>

5. Find the distance between the points $A(-2, 1)$ and $B(3, 13)$.

<details>
<summary>Solution</summary>

Differences: $3 - (-2) = 5$ and $13 - 1 = 12$. So $d = \sqrt{25 + 144} = \sqrt{169} = 13$.

</details>
