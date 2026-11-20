---
title: "Solids: Volume and Surface Area"
category: geometry
order: 60
level: 2
summary: Prisms, cylinders, pyramids, cones and spheres – how to calculate their volume and surface area, with all formulas in one table.
related: circles, quadrilaterals, pythagorean-theorem, units-and-conversions
---

A **solid** is a three-dimensional shape such as a box, a can, a pyramid or a ball. Two questions come up again and again: how much fits inside (the **volume**) and how much material covers the outside (the **surface area**). With a handful of formulas you can answer both for all common solids.

## Volume and surface area

**Volume** measures space and is given in cubic units: $\text{cm}^3$, $\text{m}^3$. For liquids, litres are common: $1\text{ L} = 1\text{ dm}^3 = 1000\text{ cm}^3$, and $1\text{ m}^3 = 1000\text{ L}$.

**Surface area** is the total area of all faces and is given in square units: $\text{cm}^2$, $\text{m}^2$. A good way to find it is to imagine unfolding the solid into a flat **net** and adding up the areas of all pieces.

## Prisms and cylinders

A **prism** has two identical, parallel faces – the **base** and the top – joined by rectangular side faces. A box (cuboid) is a prism with a rectangular base; a cylinder is like a prism with a circular base.

> **Key idea:** For every prism and every cylinder: volume = base area × height, $V = G \cdot h$.

Picture stacking identical thin slices of the base on top of each other up to height $h$ – that is why the volume is simply base area times height.

The surface area is two bases plus the side area (the **lateral area**):

$$S = 2G + \text{perimeter of the base} \cdot h$$

For a **cuboid** with edges $a$, $b$, $c$: $V = abc$ and $S = 2(ab + bc + ac)$. For a **cube** with edge $a$: $V = a^3$, $S = 6a^2$.

For a **cylinder** with radius $r$ and height $h$, unrolling the side gives a rectangle with width $2\pi r$ and height $h$:

$$V = \pi r^2 h \qquad\qquad S = 2\pi r^2 + 2\pi r h$$

## Pyramids and cones

A **pyramid** has a polygon as its base and triangular side faces that meet at a single apex. A **cone** is the same idea with a circular base. Both are pointed solids.

> **Key idea:** A pointed solid has exactly one third of the volume of the prism or cylinder with the same base and height: $V = \frac{1}{3} G \cdot h$.

You can check this with a classic experiment: fill a hollow pyramid with water three times and pour it into the prism with the same base and height – it is exactly full.

For a **cone** with radius $r$, height $h$ and slant height $s$ (the distance from the apex to the edge of the base):

$$V = \frac{1}{3}\pi r^2 h \qquad s = \sqrt{r^2 + h^2} \qquad S = \pi r^2 + \pi r s$$

The slant height comes from the Pythagorean theorem: the height, the radius and the slant height form a right triangle.

For a **square pyramid** with base edge $a$ and height $h$, each triangular face has a height $h_s$ (from the apex down the middle of the face). It forms a right triangle with $h$ and $\frac{a}{2}$, so $h_s = \sqrt{h^2 + \left(\frac{a}{2}\right)^2}$ and $S = a^2 + 4 \cdot \frac{1}{2} a h_s = a^2 + 2a h_s$.

## Spheres

A **sphere** with radius $r$ has

$$V = \frac{4}{3}\pi r^3 \qquad\qquad S = 4\pi r^2$$

The surface of a sphere is exactly four times the area of a circle with the same radius.

## Overview

| Solid | Volume | Surface area |
|---|---|---|
| cube (edge $a$) | $a^3$ | $6a^2$ |
| cuboid ($a$, $b$, $c$) | $abc$ | $2(ab + bc + ac)$ |
| prism (base $G$, height $h$) | $G \cdot h$ | $2G + \text{lateral area}$ |
| cylinder ($r$, $h$) | $\pi r^2 h$ | $2\pi r^2 + 2\pi r h$ |
| pyramid (base $G$, height $h$) | $\frac{1}{3} G h$ | $G + \text{triangles}$ |
| cone ($r$, $h$, slant $s$) | $\frac{1}{3}\pi r^2 h$ | $\pi r^2 + \pi r s$ |
| sphere ($r$) | $\frac{4}{3}\pi r^3$ | $4\pi r^2$ |

## Worked examples

### Example 1: cuboid

Edges $3\text{ cm}$, $4\text{ cm}$, $5\text{ cm}$:

$$V = 3 \cdot 4 \cdot 5 = 60\text{ cm}^3 \qquad S = 2(12 + 20 + 15) = 94\text{ cm}^2$$

### Example 2: cylinder

Radius $3\text{ cm}$, height $10\text{ cm}$:

$$V = \pi \cdot 9 \cdot 10 = 90\pi \approx 282.74\text{ cm}^3$$

$$S = 2\pi \cdot 9 + 2\pi \cdot 3 \cdot 10 = 18\pi + 60\pi = 78\pi \approx 245.04\text{ cm}^2$$

### Example 3: cone

Radius $3\text{ cm}$, height $4\text{ cm}$. Slant height $s = \sqrt{9 + 16} = 5\text{ cm}$.

$$V = \frac{1}{3}\pi \cdot 9 \cdot 4 = 12\pi \approx 37.70\text{ cm}^3 \qquad S = 9\pi + 15\pi = 24\pi \approx 75.40\text{ cm}^2$$

### Example 4: square pyramid

Base edge $6\text{ cm}$, height $4\text{ cm}$. Volume: $V = \frac{1}{3} \cdot 36 \cdot 4 = 48\text{ cm}^3$. Face height: $h_s = \sqrt{16 + 9} = 5\text{ cm}$. Surface: $S = 36 + 2 \cdot 6 \cdot 5 = 96\text{ cm}^2$.

## Scaling

If all lengths of a solid are multiplied by $k$, the surface area is multiplied by $k^2$ and the volume by $k^3$. Doubling every edge of a cube makes it $4$ times as large on the outside and $8$ times as large inside.

## Common mistakes

- Forgetting the $\frac{1}{3}$ for pyramids and cones.
- Using the slant height $s$ instead of the height $h$ in the volume formula of a cone or pyramid.
- Mixing up units: volume in $\text{cm}^3$, area in $\text{cm}^2$. And $1\text{ m}^3$ is $1000\text{ L}$, not $100\text{ L}$.
- Using the diameter instead of the radius.
- Forgetting the top or bottom face when computing the surface of a cylinder or prism.

## Practice

1. A cube has surface area $150\text{ cm}^2$. Find its edge length and volume.

<details>
<summary>Solution</summary>

$6a^2 = 150$, so $a^2 = 25$ and $a = 5\text{ cm}$. Then $V = 5^3 = 125\text{ cm}^3$.

</details>

2. A cylindrical tank has radius $0.5\text{ m}$ and height $2\text{ m}$. How many litres does it hold?

<details>
<summary>Solution</summary>

$V = \pi \cdot 0.25 \cdot 2 = 0.5\pi \approx 1.571\text{ m}^3$. Since $1\text{ m}^3 = 1000\text{ L}$, that is about $1571\text{ L}$.

</details>

3. Find the volume and surface area of a sphere with radius $3\text{ cm}$.

<details>
<summary>Solution</summary>

$V = \frac{4}{3}\pi \cdot 27 = 36\pi \approx 113.10\text{ cm}^3$ and $S = 4\pi \cdot 9 = 36\pi \approx 113.10\text{ cm}^2$. (The numbers match only because $r = 3$; the units differ.)

</details>

4. A cone has radius $6\text{ cm}$ and height $8\text{ cm}$. Find its slant height and volume.

<details>
<summary>Solution</summary>

$s = \sqrt{36 + 64} = 10\text{ cm}$. $V = \frac{1}{3}\pi \cdot 36 \cdot 8 = 96\pi \approx 301.59\text{ cm}^3$.

</details>

5. A model car is built at scale $1 : 10$. How does its volume compare with the real car?

<details>
<summary>Solution</summary>

Lengths are multiplied by $k = \frac{1}{10}$, so the volume is multiplied by $k^3 = \frac{1}{1000}$.

</details>
