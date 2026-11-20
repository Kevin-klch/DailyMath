---
title: Similarity and the Intercept Theorems
category: geometry
order: 70
level: 2
summary: Same shape, different size – scale factors, similar triangles, how areas and volumes scale, and the intercept theorems for parallel lines.
related: triangles, ratios-and-proportions, trigonometry, solids
---

Two figures are **similar** if one is an enlarged or reduced copy of the other – same shape, possibly different size. Maps, model trains, photos on different screens and shadows on the ground are all based on similarity. The **intercept theorems** turn this idea into a practical tool for calculating lengths you cannot measure directly.

## Scale factor

When a figure is enlarged or reduced, every length is multiplied by the same number $k$, the **scale factor**:

- $k > 1$: enlargement,
- $0 < k < 1$: reduction,
- $k = 1$: congruent (same size).

> **Key idea:** In similar figures, corresponding angles are equal and corresponding lengths are in the same ratio: $\frac{a'}{a} = \frac{b'}{b} = \frac{c'}{c} = k$.

A map with scale $1 : 25\,000$ is a reduction with $k = \frac{1}{25\,000}$: $8\text{ cm}$ on the map correspond to $8 \cdot 25\,000 = 200\,000\text{ cm} = 2\text{ km}$ in reality.

## Similar triangles

For triangles, you do not need to check everything. Two triangles are similar if one of these holds:

- **AA**: two angles are equal (then the third is equal too, because of the angle sum).
- **SSS**: all three pairs of sides are in the same ratio.
- **SAS**: two pairs of sides are in the same ratio, and the angles between them are equal.

The AA criterion is used most often: as soon as you find two matching angles, the triangles are similar and you may set up ratios.

When setting up ratios, be careful to match corresponding sides – the sides opposite equal angles.

## Areas and volumes

If lengths are multiplied by $k$, then

$$\text{area} \to k^2 \cdot \text{area} \qquad\qquad \text{volume} \to k^3 \cdot \text{volume}$$

The reason: area is "length times length", so the factor $k$ appears twice; volume is "length times length times length". Enlarging a photo to twice the width and height ($k = 2$) needs four times as much paper.

## The intercept theorems

Picture two rays starting at the same point $S$, like an open pair of scissors. Two parallel lines cut across both rays. The first parallel meets the rays at $A$ (on the first ray) and $B$ (on the second ray); the second parallel, further away from $S$, meets them at $A'$ and $B'$. You now see a small triangle $SAB$ inside a large triangle $SA'B'$, and these two triangles are similar (they share the angle at $S$, and the parallels create equal corresponding angles).

> **Key idea:** **First intercept theorem:** the segments on one ray have the same ratio as the corresponding segments on the other ray: $\frac{SA}{SA'} = \frac{SB}{SB'}$, and also $\frac{SA}{AA'} = \frac{SB}{BB'}$. **Second intercept theorem:** the parallel segments are in the same ratio as the segments from $S$: $\frac{AB}{A'B'} = \frac{SA}{SA'}$.

Important: in the second theorem, the ratio of the parallel segments must be compared with segments that **start at $S$** – not with $AA'$.

The same theorems hold for the **"X" figure**: two lines cross at $S$, and the parallels lie on opposite sides of $S$. Then the small and the large triangle meet at their tips.

The **converse** of the first theorem is also true: if the ratios on the rays are equal, the lines are parallel.

## Worked examples

### Example 1: intercept theorems

Given: $SA = 4$, $AA' = 6$, $SB = 5$ and $AB = 3$, with $AB \parallel A'B'$. Find $SB'$ and $A'B'$.

First $SA' = 4 + 6 = 10$, so the factor from small to large is $k = \frac{10}{4} = 2.5$.

$$SB' = 2.5 \cdot 5 = 12.5 \qquad\qquad A'B' = 2.5 \cdot 3 = 7.5$$

### Example 2: shadows

A $1.5\text{ m}$ stick casts a $2\text{ m}$ shadow. At the same time, a tree casts a $12\text{ m}$ shadow. How tall is the tree?

The sun's rays are parallel, so stick and shadow form a triangle similar to tree and shadow:

$$\frac{h}{12} = \frac{1.5}{2} \quad\Rightarrow\quad h = 12 \cdot 0.75 = 9\text{ m}$$

### Example 3: area

Two similar triangles have scale factor $k = 3$. The small one has area $5\text{ cm}^2$, so the large one has area $3^2 \cdot 5 = 45\text{ cm}^2$.

## Common mistakes

- Matching the wrong sides – always pair sides opposite equal angles.
- Using $AA'$ in the second intercept theorem instead of $SA'$.
- Multiplying areas by $k$ instead of $k^2$ (or volumes by $k$ instead of $k^3$).
- Applying the intercept theorems when the lines are not parallel.
- Mixing up $k$ and $\frac{1}{k}$ – check whether you go from small to large or large to small.

## Practice

1. A triangle with sides $3$, $4$, $5$ is enlarged so that its longest side becomes $15$. Find the other sides.

<details>
<summary>Solution</summary>

$k = \frac{15}{5} = 3$, so the sides are $9$, $12$ and $15$.

</details>

2. In an intercept figure, $SA = 2$, $SA' = 5$ and $AB = 3$, with $AB \parallel A'B'$. Find $A'B'$.

<details>
<summary>Solution</summary>

$\frac{A'B'}{AB} = \frac{SA'}{SA} = \frac{5}{2}$, so $A'B' = 3 \cdot 2.5 = 7.5$.

</details>

3. A $1.8\text{ m}$ tall person casts a $2.4\text{ m}$ shadow. A building casts a $20\text{ m}$ shadow at the same time. How tall is the building?

<details>
<summary>Solution</summary>

$\frac{h}{20} = \frac{1.8}{2.4} = 0.75$, so $h = 15\text{ m}$.

</details>

4. Two similar figures have areas $16\text{ cm}^2$ and $36\text{ cm}^2$. What is the scale factor for lengths?

<details>
<summary>Solution</summary>

$k^2 = \frac{36}{16} = \frac{9}{4}$, so $k = \frac{3}{2} = 1.5$.

</details>

5. On a map with scale $1 : 50\,000$, two towns are $7\text{ cm}$ apart. What is the real distance?

<details>
<summary>Solution</summary>

$7 \cdot 50\,000 = 350\,000\text{ cm} = 3.5\text{ km}$.

</details>
