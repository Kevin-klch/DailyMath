---
title: Triangles
category: geometry
order: 20
level: 1
summary: Types of triangles, the angle sum, the triangle inequality, area formulas, special lines and the congruence criteria.
related: angles, pythagorean-theorem, similarity, trigonometry
---

A **triangle** is the simplest polygon: three points that do not lie on one line, joined by three sides. Every other polygon can be cut into triangles, which is why so many geometric facts come back to triangle rules. This article collects the basics you need again and again.

## Naming conventions

The corners are usually labelled $A$, $B$, $C$ counter-clockwise. The side opposite a corner gets the matching lowercase letter: side $a$ lies opposite $A$, side $b$ opposite $B$, side $c$ opposite $C$. The angles at the corners are $\alpha$ (at $A$), $\beta$ (at $B$) and $\gamma$ (at $C$). Sticking to this convention makes formulas much easier to read.

## Types of triangles

**By sides:**

- **scalene** – all three sides have different lengths,
- **isosceles** – at least two sides are equal (the two equal sides are the **legs**, the third side is the **base**),
- **equilateral** – all three sides are equal.

**By angles:**

- **acute** – all angles are less than $90^\circ$,
- **right** – one angle is exactly $90^\circ$,
- **obtuse** – one angle is greater than $90^\circ$.

In an isosceles triangle the two **base angles** are equal. In an equilateral triangle all angles are $60^\circ$.

## The angle sum

> **Key idea:** In every triangle, $\alpha + \beta + \gamma = 180^\circ$.

Why? Draw a line through $C$ parallel to side $c$. At $C$ you now see three angles lying side by side along this line: in the middle $\gamma$, on the left an angle equal to $\alpha$, on the right an angle equal to $\beta$ (both are alternate angles with the parallel line). Together they form a straight angle, so the three angles add up to $180^\circ$.

A consequence is the **exterior angle theorem**: if you extend one side beyond a corner, the exterior angle there equals the sum of the two interior angles at the other corners. For example, the exterior angle at $C$ is $\alpha + \beta$.

## The triangle inequality

Not every three lengths form a triangle. Each side must be shorter than the other two together:

$$a < b + c, \qquad b < a + c, \qquad c < a + b$$

With sides $3$, $4$ and $8$ there is no triangle, because $3 + 4 = 7 < 8$. It is enough to check that the longest side is shorter than the sum of the two others. Also: the longest side always lies opposite the largest angle.

## Perimeter and area

The perimeter is simply $P = a + b + c$. For the area, pick a side as the **base** $g$ and drop the **height** $h$ – the perpendicular distance from the opposite corner to the line through the base:

$$A = \frac{1}{2} \cdot g \cdot h$$

The reason: two copies of the triangle can be put together to form a parallelogram with base $g$ and height $h$. In a right triangle the two legs are perpendicular, so one leg is the height for the other: $A = \frac{1}{2}ab$. In an obtuse triangle a height may fall *outside* the triangle, onto the extension of the base.

If only the three sides are known, **Heron's formula** helps. With half the perimeter $s = \frac{a + b + c}{2}$:

$$A = \sqrt{s(s - a)(s - b)(s - c)}$$

## Special lines in a triangle

- The three **perpendicular bisectors** of the sides meet in one point, the centre of the **circumcircle** (the circle through all three corners).
- The three **angle bisectors** meet in the centre of the **incircle** (the circle touching all three sides).
- The three **medians** (from a corner to the midpoint of the opposite side) meet in the **centroid**, the balance point. It divides each median in the ratio $2 : 1$.
- The three **altitudes** (heights) meet in the **orthocentre**.

## Congruence

Two triangles are **congruent** if they have exactly the same shape and size. You do not need to check all six parts – one of these criteria is enough:

- **SSS** – all three sides equal,
- **SAS** – two sides and the angle between them equal,
- **ASA** or **AAS** – one side and two angles equal,
- **SSA** with the angle opposite the *longer* of the two sides.

> **Key idea:** A triangle is determined by three suitable pieces of information. That is why you can construct it from SSS, SAS, ASA, or SSA (angle opposite the longer side).

## Worked examples

### Example 1

An isosceles triangle has a vertex angle of $40^\circ$. Find the base angles.

The base angles are equal: $2\beta = 180^\circ - 40^\circ = 140^\circ$, so $\beta = 70^\circ$.

### Example 2

A triangle has base $g = 8\text{ cm}$ and height $h = 5\text{ cm}$. Its area is

$$A = \frac{1}{2} \cdot 8 \cdot 5 = 20\text{ cm}^2$$

### Example 3

Find the area of the triangle with sides $13$, $14$ and $15$.

$s = \frac{13 + 14 + 15}{2} = 21$, so

$$A = \sqrt{21 \cdot 8 \cdot 7 \cdot 6} = \sqrt{7056} = 84$$

## Common mistakes

- Measuring the height along a slanted side instead of perpendicular to the base.
- Forgetting the factor $\frac{1}{2}$ in the area formula.
- Assuming three lengths always form a triangle – check the triangle inequality.
- Using SSA as a congruence rule when the angle lies opposite the *shorter* side; then two different triangles can exist.
- Confusing medians (to the midpoint) with altitudes (perpendicular).

## Practice

1. Two angles of a triangle are $35^\circ$ and $95^\circ$. Find the third angle and classify the triangle.

<details>
<summary>Solution</summary>

$180^\circ - 35^\circ - 95^\circ = 50^\circ$. Since one angle is $95^\circ > 90^\circ$, the triangle is obtuse.

</details>

2. Can the lengths $5$, $7$ and $13$ form a triangle?

<details>
<summary>Solution</summary>

No. $5 + 7 = 12$ is less than $13$, so the triangle inequality fails.

</details>

3. A right triangle has legs $6\text{ cm}$ and $9\text{ cm}$. Find its area.

<details>
<summary>Solution</summary>

The legs are base and height: $A = \frac{1}{2} \cdot 6 \cdot 9 = 27\text{ cm}^2$.

</details>

4. A triangle has area $30\text{ cm}^2$ and base $12\text{ cm}$. How long is the height to this base?

<details>
<summary>Solution</summary>

$30 = \frac{1}{2} \cdot 12 \cdot h = 6h$, so $h = 5\text{ cm}$.

</details>

5. In a triangle, $\alpha = 50^\circ$ and the exterior angle at $C$ is $110^\circ$. Find $\beta$ and $\gamma$.

<details>
<summary>Solution</summary>

Exterior angle at $C$: $\alpha + \beta = 110^\circ$, so $\beta = 60^\circ$. Then $\gamma = 180^\circ - 110^\circ = 70^\circ$.

</details>
