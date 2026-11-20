---
title: Circles
category: geometry
order: 50
level: 1
summary: Radius, diameter and the number π – how to calculate circumference, area, arc length and sector area, plus the key angle theorems in circles.
related: angles, unit-circle, solids
---

A **circle** is the set of all points in a plane that have the same distance from a fixed point, the **centre**. Wheels, clocks, pizzas and orbits are circular, and circles are the gateway to trigonometry. This article covers the vocabulary, the formulas for circumference and area, and the most important angle theorems.

## Vocabulary

- **Radius** $r$: the distance from the centre to any point on the circle.
- **Diameter** $d$: a segment through the centre from one side to the other, so $d = 2r$.
- **Chord**: a segment joining two points on the circle. The diameter is the longest chord.
- **Arc**: a piece of the circle between two points.
- **Sector**: a "pizza slice", bounded by two radii and an arc. The angle between the two radii is the **central angle** $\alpha$.
- **Tangent**: a line that touches the circle at exactly one point. **Secant**: a line that cuts through the circle at two points.

## The number π

If you divide the circumference of *any* circle by its diameter, you always get the same number. It is called **pi**:

$$\pi = \frac{C}{d} \approx 3.14159$$

$\pi$ is irrational – its decimal expansion never ends and never repeats. For calculations, use the $\pi$ key on your calculator, or give exact answers such as $25\pi$.

## Circumference and area

> **Key idea:** For a circle with radius $r$: circumference $C = 2\pi r = \pi d$ and area $A = \pi r^2$.

Why is the area $\pi r^2$? Cut the circle into many thin sectors and arrange them alternately pointing up and down. Together they form something very close to a rectangle: its height is the radius $r$, and its length is half the circumference, $\pi r$. So the area is $\pi r \cdot r = \pi r^2$. The more slices, the better the approximation.

### Example 1

A circle has radius $r = 5\text{ cm}$:

$$C = 2\pi \cdot 5 = 10\pi \approx 31.42\text{ cm} \qquad A = \pi \cdot 5^2 = 25\pi \approx 78.54\text{ cm}^2$$

### Example 2: working backwards

A circle has circumference $12\pi\text{ cm}$. Then $2\pi r = 12\pi$, so $r = 6\text{ cm}$, and the area is $A = 36\pi \approx 113.10\text{ cm}^2$.

## Arcs and sectors

A sector with central angle $\alpha$ is the fraction $\frac{\alpha}{360^\circ}$ of the full circle. So you simply take that fraction of the circumference and of the area:

$$b = \frac{\alpha}{360^\circ} \cdot 2\pi r \qquad\qquad A_{\text{sector}} = \frac{\alpha}{360^\circ} \cdot \pi r^2$$

A handy connection: $A_{\text{sector}} = \frac{1}{2} \cdot b \cdot r$.

### Example 3

Sector with $r = 6\text{ cm}$ and $\alpha = 60^\circ$. Since $\frac{60^\circ}{360^\circ} = \frac{1}{6}$:

$$b = \frac{1}{6} \cdot 12\pi = 2\pi \approx 6.28\text{ cm} \qquad A = \frac{1}{6} \cdot 36\pi = 6\pi \approx 18.85\text{ cm}^2$$

## Annulus (ring)

The area between two circles with the same centre and radii $R > r$ is

$$A = \pi R^2 - \pi r^2 = \pi (R^2 - r^2)$$

## Angle theorems in circles

**Tangent and radius**: a tangent is perpendicular to the radius at the point where it touches the circle.

**Inscribed angle theorem**: pick two points $A$ and $B$ on the circle. An **inscribed angle** has its vertex at a third point $P$ on the circle and its arms through $A$ and $B$. The central angle has its vertex at the centre $M$ and its arms through $A$ and $B$. If $P$ and $M$ lie on the same side of the chord $AB$, then

$$\text{inscribed angle} = \frac{1}{2} \cdot \text{central angle}$$

In particular, all inscribed angles over the same arc are equal.

**Thales' theorem** is the special case where $AB$ is a diameter: the central angle is $180^\circ$, so every inscribed angle is $90^\circ$. Any triangle whose longest side is a diameter and whose third corner lies on the circle is right-angled.

> **Key idea:** An angle on the circle is half the central angle over the same arc. An angle in a semicircle is always a right angle (Thales).

## Common mistakes

- Mixing up radius and diameter – if the diameter is given, halve it first.
- Squaring the wrong thing: $\pi r^2$ means $\pi \cdot (r^2)$, not $(\pi r)^2$.
- Confusing circumference (a length, in cm) with area (in cm²).
- Forgetting the fraction $\frac{\alpha}{360^\circ}$ for arcs and sectors.
- Using Thales' theorem when the segment is not a diameter.

## Practice

1. A circle has diameter $10\text{ cm}$. Find its area.

<details>
<summary>Solution</summary>

$r = 5\text{ cm}$, so $A = 25\pi \approx 78.54\text{ cm}^2$.

</details>

2. A circle has area $49\pi\text{ cm}^2$. Find its radius and circumference.

<details>
<summary>Solution</summary>

$\pi r^2 = 49\pi$ gives $r = 7\text{ cm}$. Then $C = 14\pi \approx 43.98\text{ cm}$.

</details>

3. Find the length of the arc with radius $9\text{ cm}$ and central angle $40^\circ$.

<details>
<summary>Solution</summary>

$b = \frac{40^\circ}{360^\circ} \cdot 2\pi \cdot 9 = \frac{1}{9} \cdot 18\pi = 2\pi \approx 6.28\text{ cm}$.

</details>

4. A ring has outer radius $5\text{ cm}$ and inner radius $3\text{ cm}$. Find its area.

<details>
<summary>Solution</summary>

$A = \pi(25 - 9) = 16\pi \approx 50.27\text{ cm}^2$.

</details>

5. A central angle measures $100^\circ$. How large is an inscribed angle over the same arc (on the same side as the centre)?

<details>
<summary>Solution</summary>

Half of the central angle: $50^\circ$.

</details>
