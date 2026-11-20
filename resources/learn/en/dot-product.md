---
title: Dot Product and Angles
category: linear-algebra
order: 20
level: 3
summary: Multiply two vectors to get a single number – and use it to find angles and to test whether vectors are perpendicular.
related: vectors, lines-and-planes, trigonometry
---

The **dot product** (also called the scalar product) combines two vectors into a single number. That number tells you a lot about how the vectors are positioned relative to each other: whether they are perpendicular, whether they enclose an acute or an obtuse angle, and exactly how large that angle is. It is the key tool for every question about angles and right angles in analytic geometry.

## Definition

For two vectors in space, multiply matching components and add the results:

$$\vec{a} \cdot \vec{b} = \begin{pmatrix} a_1 \\ a_2 \\ a_3 \end{pmatrix} \cdot \begin{pmatrix} b_1 \\ b_2 \\ b_3 \end{pmatrix} = a_1 b_1 + a_2 b_2 + a_3 b_3$$

In the plane there are only two terms: $a_1 b_1 + a_2 b_2$. Note that the result is a **number**, not a vector.

### Example 1

$$\begin{pmatrix} 1 \\ 2 \\ 3 \end{pmatrix} \cdot \begin{pmatrix} 4 \\ -5 \\ 6 \end{pmatrix} = 1 \cdot 4 + 2 \cdot (-5) + 3 \cdot 6 = 4 - 10 + 18 = 12$$

## Rules for the dot product

The dot product behaves much like ordinary multiplication:

- **Commutative:** $\vec{a} \cdot \vec{b} = \vec{b} \cdot \vec{a}$
- **Distributive:** $\vec{a} \cdot (\vec{b} + \vec{c}) = \vec{a} \cdot \vec{b} + \vec{a} \cdot \vec{c}$
- **Scalars can be pulled out:** $(r\vec{a}) \cdot \vec{b} = r(\vec{a} \cdot \vec{b})$
- **Link to the length:** $\vec{a} \cdot \vec{a} = a_1^2 + a_2^2 + a_3^2 = |\vec{a}|^2$

There is no "dot product of three vectors", and you cannot divide by a vector.

## The geometric meaning

The dot product can also be written using the lengths of the vectors and the angle $\varphi$ between them (with $0^\circ \le \varphi \le 180^\circ$):

$$\vec{a} \cdot \vec{b} = |\vec{a}| \cdot |\vec{b}| \cdot \cos \varphi$$

This follows from the law of cosines applied to the triangle formed by $\vec{a}$, $\vec{b}$ and $\vec{a} - \vec{b}$. Solving for the cosine gives the angle formula:

> **Key idea:** The angle $\varphi$ between two vectors satisfies $\cos \varphi = \dfrac{\vec{a} \cdot \vec{b}}{|\vec{a}| \cdot |\vec{b}|}$.

Since the lengths are positive, the **sign** of the dot product already reveals the type of angle:

- $\vec{a} \cdot \vec{b} > 0$: the angle is acute ($\varphi < 90^\circ$),
- $\vec{a} \cdot \vec{b} = 0$: the angle is a right angle,
- $\vec{a} \cdot \vec{b} < 0$: the angle is obtuse ($\varphi > 90^\circ$).

### Example 2

Find the angle between $\vec{a} = \begin{pmatrix} 1 \\ 0 \\ 1 \end{pmatrix}$ and $\vec{b} = \begin{pmatrix} 0 \\ 1 \\ 1 \end{pmatrix}$.

1. Dot product: $\vec{a} \cdot \vec{b} = 0 + 0 + 1 = 1$
2. Lengths: $|\vec{a}| = \sqrt{2}$ and $|\vec{b}| = \sqrt{2}$
3. Cosine: $\cos \varphi = \frac{1}{\sqrt{2} \cdot \sqrt{2}} = \frac{1}{2}$
4. Angle: $\varphi = 60^\circ$

### Example 3

Find the angle between $\vec{a} = \begin{pmatrix} 3 \\ 4 \end{pmatrix}$ and $\vec{b} = \begin{pmatrix} 4 \\ 3 \end{pmatrix}$.

$$\cos \varphi = \frac{12 + 12}{5 \cdot 5} = \frac{24}{25} = 0.96 \quad \Rightarrow \quad \varphi \approx 16.3^\circ$$

## Perpendicular vectors

The most important special case: two vectors (neither of them the zero vector) are perpendicular – **orthogonal** – exactly when their dot product is zero.

> **Key idea:** $\vec{a} \perp \vec{b} \iff \vec{a} \cdot \vec{b} = 0$.

This makes checking for right angles very easy – no angle has to be calculated.

### Example 4

Are $\begin{pmatrix} 2 \\ 1 \\ -2 \end{pmatrix}$ and $\begin{pmatrix} 1 \\ 2 \\ 2 \end{pmatrix}$ orthogonal? The dot product is $2 + 2 - 4 = 0$, so yes.

### Example 5

For which $t$ is $\begin{pmatrix} 3 \\ t \\ 1 \end{pmatrix}$ perpendicular to $\begin{pmatrix} 2 \\ -1 \\ 4 \end{pmatrix}$?

Set the dot product equal to zero: $6 - t + 4 = 0$, so $t = 10$.

### Finding a perpendicular vector

In the plane there is a quick trick: swap the components and change one sign. The vector $\begin{pmatrix} a_1 \\ a_2 \end{pmatrix}$ is perpendicular to $\begin{pmatrix} -a_2 \\ a_1 \end{pmatrix}$, because $-a_1 a_2 + a_2 a_1 = 0$. In space, every vector has infinitely many perpendicular vectors; you can find one by choosing two components freely and solving $\vec{a} \cdot \vec{n} = 0$ for the third.

## Angles in figures

To find an angle in a triangle $ABC$ at the vertex $A$, use the two vectors that **start** at $A$: $\overrightarrow{AB}$ and $\overrightarrow{AC}$. If you take $\overrightarrow{BA}$ instead of $\overrightarrow{AB}$, you get the supplementary angle $180^\circ - \varphi$.

## Common mistakes

- Writing the result as a vector – the dot product is always a number.
- Forgetting to divide by both lengths in the angle formula.
- Using vectors that do not start at the same vertex when calculating an angle in a triangle.
- Concluding "orthogonal" from a dot product that is merely small – it has to be exactly $0$.
- Having the calculator in radian mode when you want the angle in degrees.

## Practice

1. Are $\begin{pmatrix} 2 \\ -3 \\ 1 \end{pmatrix}$ and $\begin{pmatrix} 4 \\ 1 \\ -5 \end{pmatrix}$ orthogonal?

<details>
<summary>Solution</summary>

$8 - 3 - 5 = 0$. The dot product is zero, so the vectors are orthogonal.

</details>

2. Find the angle between $\begin{pmatrix} 1 \\ 1 \\ 0 \end{pmatrix}$ and $\begin{pmatrix} 1 \\ 0 \\ 0 \end{pmatrix}$.

<details>
<summary>Solution</summary>

Dot product $1$, lengths $\sqrt{2}$ and $1$. So $\cos \varphi = \frac{1}{\sqrt{2}}$ and $\varphi = 45^\circ$.

</details>

3. Find the angle between $\begin{pmatrix} 1 \\ 2 \\ 2 \end{pmatrix}$ and $\begin{pmatrix} 2 \\ 2 \\ 1 \end{pmatrix}$.

<details>
<summary>Solution</summary>

Dot product $2 + 4 + 2 = 8$, both lengths are $3$. So $\cos \varphi = \frac{8}{9}$ and $\varphi \approx 27.3^\circ$.

</details>

4. Determine $a$ so that $\begin{pmatrix} a \\ 2 \\ -1 \end{pmatrix}$ and $\begin{pmatrix} 3 \\ a \\ 4 \end{pmatrix}$ are perpendicular.

<details>
<summary>Solution</summary>

$3a + 2a - 4 = 0$, so $5a = 4$ and $a = \frac{4}{5}$.

</details>

5. Show that the triangle with $A(1, 0, 0)$, $B(3, 1, 0)$ and $C(2, 3, 0)$ has a right angle at $B$.

<details>
<summary>Solution</summary>

$\overrightarrow{BA} = \begin{pmatrix} -2 \\ -1 \\ 0 \end{pmatrix}$ and $\overrightarrow{BC} = \begin{pmatrix} -1 \\ 2 \\ 0 \end{pmatrix}$. Their dot product is $2 - 2 + 0 = 0$, so the angle at $B$ is $90^\circ$.

</details>
