---
title: Vectors
category: linear-algebra
order: 10
level: 2
summary: Arrows with a length and a direction – how to write vectors, add them, scale them and measure their length.
related: dot-product, lines-and-planes, pythagorean-theorem
---

A **vector** describes a movement: how far and in which direction. Unlike an ordinary number, which only has a size, a vector carries a size *and* a direction. Vectors are the basic building block of analytic geometry and appear everywhere in physics, from forces to velocities.

## What is a vector?

Think of an arrow. It does not matter where you draw it – all arrows with the same length and the same direction represent the **same** vector. What counts is only the shift from the start to the tip.

In a coordinate system we write a vector as a **column** of its components:

$$\vec{v} = \begin{pmatrix} 3 \\ -2 \end{pmatrix} \quad \text{(in the plane)}, \qquad \vec{w} = \begin{pmatrix} 1 \\ 4 \\ 2 \end{pmatrix} \quad \text{(in space)}$$

The vector $\vec{v}$ means "3 steps in the $x$-direction and 2 steps back in the $y$-direction". The **zero vector** $\vec{0}$ has all components equal to $0$ – it describes no movement at all.

### Position vectors and connecting vectors

The vector from the origin $O$ to a point $P(p_1, p_2, p_3)$ is called the **position vector** of $P$; its components are simply the coordinates of the point.

The vector from a point $A$ to a point $B$ is found by subtracting the coordinates – "tip minus tail":

$$\overrightarrow{AB} = \vec{b} - \vec{a} = \begin{pmatrix} b_1 - a_1 \\ b_2 - a_2 \\ b_3 - a_3 \end{pmatrix}$$

> **Key idea:** The connecting vector from $A$ to $B$ is always "end point minus start point": $\overrightarrow{AB} = \vec{b} - \vec{a}$.

## Calculating with vectors

### Addition and subtraction

Vectors are added and subtracted **component by component**:

$$\begin{pmatrix} 2 \\ -1 \\ 3 \end{pmatrix} + \begin{pmatrix} 1 \\ 4 \\ -2 \end{pmatrix} = \begin{pmatrix} 3 \\ 3 \\ 1 \end{pmatrix}$$

Geometrically, you put the tail of the second arrow at the tip of the first; the sum points from the very start to the final tip. Doing one movement after the other gives the same result as the sum vector.

### Multiplying by a number

Multiplying a vector by a real number $r$ (a **scalar**) multiplies every component:

$$r \cdot \begin{pmatrix} v_1 \\ v_2 \\ v_3 \end{pmatrix} = \begin{pmatrix} r v_1 \\ r v_2 \\ r v_3 \end{pmatrix}$$

For $r > 0$ the arrow keeps its direction and is stretched by the factor $r$; for $r < 0$ it also flips around. The vector $-\vec{v}$ has the same length as $\vec{v}$ but points the opposite way.

### Example 1

Let $\vec{a} = \begin{pmatrix} 2 \\ -1 \\ 3 \end{pmatrix}$ and $\vec{b} = \begin{pmatrix} 1 \\ 4 \\ -2 \end{pmatrix}$. Calculate $2\vec{a} - \vec{b}$.

$$2\vec{a} - \vec{b} = \begin{pmatrix} 4 \\ -2 \\ 6 \end{pmatrix} - \begin{pmatrix} 1 \\ 4 \\ -2 \end{pmatrix} = \begin{pmatrix} 3 \\ -6 \\ 8 \end{pmatrix}$$

## Length of a vector

The length (or **magnitude**) of a vector is written $|\vec{v}|$. It follows from the Pythagorean theorem – in space it is applied twice:

$$\left| \begin{pmatrix} v_1 \\ v_2 \\ v_3 \end{pmatrix} \right| = \sqrt{v_1^2 + v_2^2 + v_3^2}$$

> **Key idea:** Square the components, add them up and take the square root. The distance between two points $A$ and $B$ is the length $|\overrightarrow{AB}|$.

A vector of length $1$ is a **unit vector**. You get the unit vector in the direction of $\vec{v}$ by dividing by its length: $\vec{v}_0 = \frac{1}{|\vec{v}|} \cdot \vec{v}$.

### Example 2

Find the distance between $A(1, 2, -1)$ and $B(4, 6, -1)$.

$$\overrightarrow{AB} = \begin{pmatrix} 4 - 1 \\ 6 - 2 \\ -1 - (-1) \end{pmatrix} = \begin{pmatrix} 3 \\ 4 \\ 0 \end{pmatrix}, \qquad |\overrightarrow{AB}| = \sqrt{9 + 16 + 0} = 5$$

### Example 3

Find the unit vector in the direction of $\vec{v} = \begin{pmatrix} 2 \\ -1 \\ 2 \end{pmatrix}$.

The length is $\sqrt{4 + 1 + 4} = 3$, so

$$\vec{v}_0 = \frac{1}{3} \begin{pmatrix} 2 \\ -1 \\ 2 \end{pmatrix} = \begin{pmatrix} \frac{2}{3} \\ -\frac{1}{3} \\ \frac{2}{3} \end{pmatrix}$$

## Parallel vectors and midpoints

Two vectors are **collinear** (parallel) if one is a multiple of the other: $\vec{u} = r \cdot \vec{v}$ for some number $r$. Check this by computing the ratio for each component – it must be the same everywhere.

For example, $\begin{pmatrix} 2 \\ -4 \\ 6 \end{pmatrix} = -2 \cdot \begin{pmatrix} -1 \\ 2 \\ -3 \end{pmatrix}$, so these vectors are parallel (pointing in opposite directions).

The **midpoint** $M$ of a segment $AB$ has the position vector $\vec{m} = \frac{1}{2}(\vec{a} + \vec{b})$ – you average the coordinates. For $A(1, 2, -1)$ and $B(5, 0, 3)$ you get $M(3, 1, 1)$.

## Common mistakes

- Calculating $\overrightarrow{AB}$ as "start minus end" – this gives the opposite vector $\overrightarrow{BA}$.
- Forgetting to multiply *every* component by the scalar.
- Taking the length as $v_1 + v_2 + v_3$ instead of $\sqrt{v_1^2 + v_2^2 + v_3^2}$, or forgetting that negative components become positive when squared.
- Confusing a point with a vector: a point is a location, a vector is a shift.
- Calling two vectors parallel when only some components have the same ratio.

## Practice

1. Let $\vec{u} = \begin{pmatrix} 3 \\ -2 \end{pmatrix}$ and $\vec{v} = \begin{pmatrix} -1 \\ 5 \end{pmatrix}$. Calculate $\vec{u} + \vec{v}$ and $3\vec{u} - \vec{v}$.

<details>
<summary>Solution</summary>

$\vec{u} + \vec{v} = \begin{pmatrix} 2 \\ 3 \end{pmatrix}$ and $3\vec{u} - \vec{v} = \begin{pmatrix} 9 \\ -6 \end{pmatrix} - \begin{pmatrix} -1 \\ 5 \end{pmatrix} = \begin{pmatrix} 10 \\ -11 \end{pmatrix}$.

</details>

2. Find the distance between $P(2, -1, 4)$ and $Q(5, 3, 4)$.

<details>
<summary>Solution</summary>

$\overrightarrow{PQ} = \begin{pmatrix} 3 \\ 4 \\ 0 \end{pmatrix}$, so $|\overrightarrow{PQ}| = \sqrt{9 + 16 + 0} = \sqrt{25} = 5$.

</details>

3. Find the unit vector in the direction of $\begin{pmatrix} 1 \\ 2 \\ 2 \end{pmatrix}$.

<details>
<summary>Solution</summary>

The length is $\sqrt{1 + 4 + 4} = 3$. The unit vector is $\begin{pmatrix} \frac{1}{3} \\ \frac{2}{3} \\ \frac{2}{3} \end{pmatrix}$.

</details>

4. Are $\begin{pmatrix} 3 \\ -6 \\ 9 \end{pmatrix}$ and $\begin{pmatrix} -2 \\ 4 \\ -6 \end{pmatrix}$ parallel?

<details>
<summary>Solution</summary>

Component ratios: $\frac{3}{-2} = -\frac{3}{2}$, $\frac{-6}{4} = -\frac{3}{2}$, $\frac{9}{-6} = -\frac{3}{2}$. The ratio is the same everywhere, so yes: the first vector is $-\frac{3}{2}$ times the second.

</details>

5. $A(1, 0, 2)$, $B(4, 1, 2)$ and $C(5, 4, 3)$ are three vertices of the parallelogram $ABCD$. Find $D$.

<details>
<summary>Solution</summary>

In a parallelogram $\overrightarrow{AD} = \overrightarrow{BC} = \begin{pmatrix} 1 \\ 3 \\ 1 \end{pmatrix}$. So $\vec{d} = \vec{a} + \overrightarrow{BC} = \begin{pmatrix} 2 \\ 3 \\ 3 \end{pmatrix}$, i.e. $D(2, 3, 3)$. Check: $\overrightarrow{DC} = \begin{pmatrix} 3 \\ 1 \\ 0 \end{pmatrix} = \overrightarrow{AB}$.

</details>
