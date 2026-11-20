---
title: Quadrilaterals
category: geometry
order: 40
level: 1
summary: Square, rectangle, rhombus, parallelogram, trapezoid and kite – their properties, how they are related, and how to find their areas.
related: triangles, angles, pythagorean-theorem
---

A **quadrilateral** is a polygon with four corners and four sides. Squares, rectangles and the other special quadrilaterals appear everywhere – in floor plans, screens, fields and roofs. Knowing their properties and area formulas lets you tackle a huge range of everyday geometry problems.

## General facts

A quadrilateral $ABCD$ has four sides, four interior angles and two **diagonals** ($AC$ and $BD$). One diagonal splits it into two triangles, each with an angle sum of $180^\circ$. Hence:

> **Key idea:** The interior angles of every quadrilateral add up to $360^\circ$.

## The special quadrilaterals

**Trapezoid** (British English: trapezium): at least one pair of opposite sides is parallel. The parallel sides are the **bases**, the distance between them is the height.

**Parallelogram**: both pairs of opposite sides are parallel. As a consequence, opposite sides are equal, opposite angles are equal, neighbouring angles add up to $180^\circ$, and the diagonals bisect each other.

**Rectangle**: a parallelogram with four right angles. Its diagonals are equal in length.

**Rhombus**: a parallelogram with four equal sides. Its diagonals are perpendicular and bisect the angles.

**Square**: a rectangle *and* a rhombus at the same time – four equal sides and four right angles. Its diagonals are equal, perpendicular and bisect each other.

**Kite**: two pairs of equal *neighbouring* sides. Picture a classic toy kite: two short sides at the top, two long sides at the bottom. The diagonals are perpendicular, and the long diagonal is a line of symmetry.

## How they are related

The shapes form a family tree. Every property of a "parent" is inherited by its "children":

- every square is a rectangle and a rhombus,
- every rectangle and every rhombus is a parallelogram,
- every parallelogram is a trapezoid,
- every rhombus is also a kite.

So "a square is a rectangle" is true, but "a rectangle is a square" is only true if all sides happen to be equal.

| Shape | Opposite sides parallel | All sides equal | All angles $90^\circ$ | Diagonals perpendicular |
|---|---|---|---|---|
| parallelogram | yes | no | no | no |
| rectangle | yes | no | yes | no |
| rhombus | yes | yes | no | yes |
| square | yes | yes | yes | yes |
| kite | no | no | no | yes |

## Area formulas

| Shape | Area |
|---|---|
| square with side $a$ | $A = a^2$ |
| rectangle with sides $a$, $b$ | $A = a \cdot b$ |
| parallelogram with base $g$, height $h$ | $A = g \cdot h$ |
| trapezoid with bases $a$, $c$, height $h$ | $A = \frac{1}{2}(a + c) \cdot h$ |
| rhombus or kite with diagonals $e$, $f$ | $A = \frac{1}{2} \cdot e \cdot f$ |

Why these work:

- **Parallelogram:** cut off a right triangle on one side and move it to the other side – you get a rectangle with the same base and height. The height is measured perpendicular to the base, *not* along the slanted side.
- **Trapezoid:** two copies, one turned upside down, fit together to form a parallelogram with base $a + c$ and height $h$. The trapezoid is half of it.
- **Kite and rhombus:** the perpendicular diagonals divide the shape into triangles; together they fill exactly half of the rectangle with sides $e$ and $f$.

> **Key idea:** Heights are always measured perpendicular to the base. The trapezoid area is "average of the parallel sides times height".

The perimeter is just the sum of all four sides, for example $P = 2(a + b)$ for a rectangle and $P = 4a$ for a square or rhombus.

## Worked examples

### Example 1: trapezoid

The parallel sides of a trapezoid are $10\text{ cm}$ and $6\text{ cm}$ long, the height is $4\text{ cm}$:

$$A = \frac{1}{2}(10 + 6) \cdot 4 = 8 \cdot 4 = 32\text{ cm}^2$$

### Example 2: kite

A kite has diagonals of $8\text{ cm}$ and $5\text{ cm}$:

$$A = \frac{1}{2} \cdot 8 \cdot 5 = 20\text{ cm}^2$$

### Example 3: angles in a parallelogram

One angle of a parallelogram measures $70^\circ$. The opposite angle is also $70^\circ$; the neighbouring angles are $180^\circ - 70^\circ = 110^\circ$. Check: $70^\circ + 110^\circ + 70^\circ + 110^\circ = 360^\circ$.

## Common mistakes

- Multiplying base by the slanted side for a parallelogram instead of by the height.
- Forgetting the $\frac{1}{2}$ in the trapezoid and kite formulas.
- Believing a square is *not* a rectangle – it is a special rectangle.
- Assuming the diagonals of every parallelogram are perpendicular – that is only true for rhombi (and squares).
- Mixing up the kite (equal *neighbouring* sides) and the parallelogram (equal *opposite* sides).

## Practice

1. Three angles of a quadrilateral measure $85^\circ$, $95^\circ$ and $110^\circ$. Find the fourth.

<details>
<summary>Solution</summary>

$360^\circ - 85^\circ - 95^\circ - 110^\circ = 70^\circ$.

</details>

2. A rectangle has perimeter $30\text{ cm}$ and one side of $9\text{ cm}$. Find the other side and the area.

<details>
<summary>Solution</summary>

$2(9 + b) = 30$, so $9 + b = 15$ and $b = 6\text{ cm}$. Area: $9 \cdot 6 = 54\text{ cm}^2$.

</details>

3. A rhombus has diagonals $6\text{ cm}$ and $8\text{ cm}$. Find its area and side length.

<details>
<summary>Solution</summary>

$A = \frac{1}{2} \cdot 6 \cdot 8 = 24\text{ cm}^2$. The diagonals bisect each other at right angles, giving right triangles with legs $3$ and $4$. So the side is $\sqrt{9 + 16} = 5\text{ cm}$.

</details>

4. A trapezoid has area $45\text{ cm}^2$ and parallel sides of $11\text{ cm}$ and $7\text{ cm}$. How large is the height?

<details>
<summary>Solution</summary>

$45 = \frac{1}{2}(11 + 7) \cdot h = 9h$, so $h = 5\text{ cm}$.

</details>

5. True or false: "Every rhombus is a square." "Every square is a rhombus."

<details>
<summary>Solution</summary>

The first is false – a rhombus need not have right angles. The second is true – a square has four equal sides.

</details>
