---
title: Lines and Planes in Space
category: linear-algebra
order: 30
level: 3
summary: Describe lines and planes in 3D with vectors, switch between their forms and find where they meet.
related: vectors, dot-product, gaussian-elimination, systems-of-equations
---

With vectors you can describe straight lines and flat planes in three-dimensional space precisely. Every point of the object is reached by starting at one fixed point and moving along one or two directions. This lets you answer typical geometry questions by calculation: Does a point lie on a line? Do two lines cross? Where does a line pierce a plane?

## Lines in parametric form

A line is fixed by one point on it and one direction. If $\vec{p}$ is the position vector of a point on the line and $\vec{u} \ne \vec{0}$ is a **direction vector**, every point $X$ of the line has the position vector

$$g: \vec{x} = \vec{p} + t \cdot \vec{u}, \qquad t \in \mathbb{R}$$

Each value of the **parameter** $t$ gives exactly one point: $t = 0$ gives the starting point, $t = 1$ the point one "step" further, negative $t$ go backwards.

If two points $A$ and $B$ are given, take $\vec{a}$ as the support vector and $\overrightarrow{AB}$ as the direction.

### Example 1

Line through $A(1, 2, 0)$ and $B(3, 1, 4)$. Is $P(7, -1, 12)$ on it?

The direction is $\overrightarrow{AB} = \begin{pmatrix} 2 \\ -1 \\ 4 \end{pmatrix}$, so

$$g: \vec{x} = \begin{pmatrix} 1 \\ 2 \\ 0 \end{pmatrix} + t \begin{pmatrix} 2 \\ -1 \\ 4 \end{pmatrix}$$

For $P$, solve each row: $1 + 2t = 7$ gives $t = 3$. Check the other rows with $t = 3$: $2 - 3 = -1$ and $0 + 12 = 12$. All rows agree, so $P$ lies on $g$.

> **Key idea:** A point lies on a line exactly when **one** value of $t$ satisfies **all** coordinate equations at the same time.

## How two lines can be positioned

In space there are four possibilities:

1. **Identical** – the direction vectors are parallel and a point of one line lies on the other.
2. **Parallel** – the direction vectors are parallel, but the lines share no point.
3. **Intersecting** – the direction vectors are not parallel and the lines meet in one point.
4. **Skew** – the direction vectors are not parallel, yet the lines never meet. This case does not exist in the plane.

To decide between 3 and 4, set the two line equations equal and solve the resulting system for both parameters.

### Example 2

$$g: \vec{x} = \begin{pmatrix} 1 \\ 0 \\ 2 \end{pmatrix} + s \begin{pmatrix} 1 \\ 1 \\ 0 \end{pmatrix}, \qquad h: \vec{x} = \begin{pmatrix} 3 \\ 1 \\ 3 \end{pmatrix} + t \begin{pmatrix} 0 \\ 1 \\ -1 \end{pmatrix}$$

The directions are not multiples of each other. Setting the equations equal row by row:

- $1 + s = 3$, so $s = 2$
- $s = 1 + t$, so $t = 1$
- $2 = 3 - t$, which is true for $t = 1$

The system has a solution, so the lines intersect. Inserting $s = 2$ into $g$ gives the point $S(3, 2, 2)$. If the last row had produced a contradiction, the lines would be skew.

## Planes

### Parametric form

A plane needs one point and **two** non-parallel direction vectors:

$$E: \vec{x} = \vec{p} + r \cdot \vec{u} + s \cdot \vec{v}, \qquad r, s \in \mathbb{R}$$

### Normal form and coordinate form

Much handier is a description using a **normal vector** $\vec{n}$, which is perpendicular to the plane. A point $X$ lies in the plane exactly when $\overrightarrow{PX}$ is perpendicular to $\vec{n}$:

$$E: \vec{n} \cdot (\vec{x} - \vec{p}) = 0$$

Multiplying out gives the **coordinate form**

$$E: n_1 x + n_2 y + n_3 z = d \qquad \text{with } d = \vec{n} \cdot \vec{p}$$

> **Key idea:** The coefficients of $x$, $y$ and $z$ in the coordinate form are exactly the components of a normal vector of the plane.

### Example 3

Find the coordinate form of the plane through $A(1, 0, 0)$, $B(0, 2, 0)$ and $C(0, 0, 3)$.

1. Directions: $\overrightarrow{AB} = \begin{pmatrix} -1 \\ 2 \\ 0 \end{pmatrix}$, $\overrightarrow{AC} = \begin{pmatrix} -1 \\ 0 \\ 3 \end{pmatrix}$.
2. The normal vector must be perpendicular to both: $-n_1 + 2n_2 = 0$ and $-n_1 + 3n_3 = 0$. Choosing $n_1 = 6$ gives $n_2 = 3$ and $n_3 = 2$.
3. $d = \vec{n} \cdot \vec{a} = 6$, so $E: 6x + 3y + 2z = 6$.

Check: $B$ gives $6$ and $C$ gives $6$ as well.

## Line meets plane

Insert the coordinates of the general line point into the coordinate form and solve for the parameter.

### Example 4

$g: \vec{x} = \begin{pmatrix} 1 \\ 2 \\ 3 \end{pmatrix} + t \begin{pmatrix} 1 \\ 1 \\ 1 \end{pmatrix}$ and $E: 2x - y + z = 7$.

$$2(1 + t) - (2 + t) + (3 + t) = 7 \quad \Rightarrow \quad 3 + 2t = 7 \quad \Rightarrow \quad t = 2$$

The intersection point is $S(3, 4, 5)$; check: $6 - 4 + 5 = 7$.

If the parameter cancels out, the line is parallel to the plane: a false statement such as $0 = 4$ means no common point, a true one such as $0 = 0$ means the line lies in the plane. You can see this in advance: $\vec{n} \cdot \vec{u} = 0$ means the direction runs parallel to the plane.

## Distance from a point to a plane

Divide the coordinate form by the length of the normal vector. The distance of $Q(q_1, q_2, q_3)$ from $E: n_1 x + n_2 y + n_3 z = d$ is

$$\text{dist}(Q, E) = \frac{|n_1 q_1 + n_2 q_2 + n_3 q_3 - d|}{|\vec{n}|}$$

For $Q(3, 0, 3)$ and $E: 2x - y + 2z = 3$: $|\vec{n}| = 3$, so the distance is $\frac{|6 - 0 + 6 - 3|}{3} = 3$.

## Common mistakes

- Using a different parameter value for each row when testing a point.
- Using the same letter for the parameters of two lines when setting them equal.
- Calling two lines in space "intersecting" just because they are not parallel – they might be skew.
- Forgetting to compute $d$ after finding the normal vector, or choosing a normal vector that is perpendicular to only one direction.
- Concluding "parallel" for line and plane without checking whether the line actually lies in the plane.

## Practice

1. Does $C(8, 9, 1)$ lie on the line through $A(2, 0, 1)$ and $B(4, 3, 1)$?

<details>
<summary>Solution</summary>

$g: \vec{x} = \begin{pmatrix} 2 \\ 0 \\ 1 \end{pmatrix} + t \begin{pmatrix} 2 \\ 3 \\ 0 \end{pmatrix}$. From $2 + 2t = 8$ we get $t = 3$; then $3t = 9$ and $1 = 1$ also hold. So yes, $C$ lies on the line.

</details>

2. Write the plane through $P(1, 2, 3)$ with normal vector $\begin{pmatrix} 2 \\ -1 \\ 4 \end{pmatrix}$ in coordinate form.

<details>
<summary>Solution</summary>

$d = 2 \cdot 1 - 1 \cdot 2 + 4 \cdot 3 = 12$, so $E: 2x - y + 4z = 12$.

</details>

3. Find the intersection of $g: \vec{x} = \begin{pmatrix} 0 \\ 1 \\ 2 \end{pmatrix} + t \begin{pmatrix} 1 \\ 2 \\ -1 \end{pmatrix}$ with $E: x + y + z = 9$.

<details>
<summary>Solution</summary>

$t + (1 + 2t) + (2 - t) = 9$ gives $2t + 3 = 9$, so $t = 3$. The point is $S(3, 7, -1)$; check: $3 + 7 - 1 = 9$.

</details>

4. How are $g: \vec{x} = \begin{pmatrix} 1 \\ 0 \\ 0 \end{pmatrix} + s \begin{pmatrix} 2 \\ 1 \\ 1 \end{pmatrix}$ and $h: \vec{x} = \begin{pmatrix} 0 \\ 1 \\ 0 \end{pmatrix} + t \begin{pmatrix} 4 \\ 2 \\ 2 \end{pmatrix}$ positioned?

<details>
<summary>Solution</summary>

The direction of $h$ is twice that of $g$, so the lines are parallel or identical. Test the point $(0, 1, 0)$ on $g$: $1 + 2s = 0$ gives $s = -\frac{1}{2}$, but $s = 1$ from the second row – a contradiction. The lines are parallel and distinct.

</details>

5. Find the coordinate form of the plane through $A(1, 1, 0)$, $B(3, 1, 2)$ and $C(1, 2, 1)$.

<details>
<summary>Solution</summary>

$\overrightarrow{AB} = \begin{pmatrix} 2 \\ 0 \\ 2 \end{pmatrix}$, $\overrightarrow{AC} = \begin{pmatrix} 0 \\ 1 \\ 1 \end{pmatrix}$. From $2n_1 + 2n_3 = 0$ and $n_2 + n_3 = 0$, choose $n_3 = -1$: $\vec{n} = \begin{pmatrix} 1 \\ 1 \\ -1 \end{pmatrix}$. With $d = 1 + 1 - 0 = 2$: $E: x + y - z = 2$. Check: $B$ gives $3 + 1 - 2 = 2$, $C$ gives $1 + 2 - 1 = 2$.

</details>
