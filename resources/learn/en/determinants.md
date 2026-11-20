---
title: Determinants
category: linear-algebra
order: 60
level: 3
summary: One number that tells you whether a square matrix is invertible – how to compute determinants and what they mean geometrically.
related: matrices, inverse-matrix, gaussian-elimination, matrix-multiplication
---

The **determinant** assigns a single number to every square matrix. This number answers an important question at a glance: is the matrix invertible, and does the corresponding system of equations have exactly one solution? Geometrically it measures how much the matrix stretches areas or volumes.

## Determinant of a 2×2 matrix

For a $2 \times 2$ matrix the determinant is "main diagonal minus secondary diagonal":

$$\det \begin{pmatrix} a & b \\ c & d \end{pmatrix} = \begin{vmatrix} a & b \\ c & d \end{vmatrix} = ad - bc$$

The notation with straight bars $|\ldots|$ also means the determinant – not the absolute value.

> **Key idea:** $\det \begin{pmatrix} a & b \\ c & d \end{pmatrix} = ad - bc$ – product of the main diagonal minus product of the other diagonal.

### Example 1

$$\begin{vmatrix} 3 & 2 \\ 1 & 4 \end{vmatrix} = 3 \cdot 4 - 2 \cdot 1 = 12 - 2 = 10$$

## Determinant of a 3×3 matrix

### The rule of Sarrus

Write the first two columns again to the right of the matrix. Then add the three products along the diagonals going down to the right and subtract the three products along the diagonals going up to the right:

$$\det A = a_{11}a_{22}a_{33} + a_{12}a_{23}a_{31} + a_{13}a_{21}a_{32} - a_{13}a_{22}a_{31} - a_{11}a_{23}a_{32} - a_{12}a_{21}a_{33}$$

### Example 2

$$A = \begin{pmatrix} 2 & 1 & 3 \\ 0 & -1 & 4 \\ 1 & 2 & 0 \end{pmatrix}$$

Products going down: $2 \cdot (-1) \cdot 0 = 0$, $\;1 \cdot 4 \cdot 1 = 4$, $\;3 \cdot 0 \cdot 2 = 0$. Sum: $4$.

Products going up: $3 \cdot (-1) \cdot 1 = -3$, $\;2 \cdot 4 \cdot 2 = 16$, $\;1 \cdot 0 \cdot 0 = 0$. Sum: $13$.

$$\det A = 4 - 13 = -9$$

The rule of Sarrus only works for $3 \times 3$ matrices.

### Cofactor expansion

A method that works for any size is **cofactor expansion** (Laplace expansion). Choose a row or column. For each entry, cross out its row and column, take the determinant of what remains and multiply by the entry. The signs follow a checkerboard pattern starting with $+$ in the top left:

$$\begin{pmatrix} + & - & + \\ - & + & - \\ + & - & + \end{pmatrix}$$

Check Example 2 by expanding along the first column (the zero saves work):

$$\det A = 2 \cdot \begin{vmatrix} -1 & 4 \\ 2 & 0 \end{vmatrix} - 0 \cdot \ldots + 1 \cdot \begin{vmatrix} 1 & 3 \\ -1 & 4 \end{vmatrix} = 2 \cdot (-8) + 7 = -9$$

Both methods agree. Tip: expand along the row or column with the most zeros.

## Properties

For square matrices $A$ and $B$ of size $n \times n$:

- $\det(A^T) = \det A$ – rows and columns behave the same.
- $\det(AB) = \det A \cdot \det B$.
- Swapping two rows changes the **sign** of the determinant.
- Multiplying one row by $r$ multiplies the determinant by $r$; hence $\det(rA) = r^n \det A$.
- Adding a multiple of one row to another row does **not** change the determinant.
- If a row is all zeros, or two rows are equal or multiples of each other, the determinant is $0$.
- For a triangular matrix the determinant is the product of the diagonal entries: $\det I = 1$.

The last three rules give a fast method for large matrices: use row operations to reach a triangular matrix, then multiply the diagonal.

## What the determinant tells you

> **Key idea:** A square matrix is invertible exactly when $\det A \ne 0$. Then the system $A\vec{x} = \vec{b}$ has exactly one solution.

If $\det A = 0$, the matrix is called **singular**: the system has either no solution or infinitely many.

Geometrically, $|\det A|$ is the area of the parallelogram spanned by the column vectors (for $2 \times 2$) or the volume of the parallelepiped spanned by them (for $3 \times 3$). The vectors $\begin{pmatrix} 3 \\ 1 \end{pmatrix}$ and $\begin{pmatrix} 1 \\ 2 \end{pmatrix}$ span a parallelogram with area $3 \cdot 2 - 1 \cdot 1 = 5$. A determinant of $0$ means the vectors lie on a line (or in a plane) – the area or volume collapses.

### Example 3

For which $k$ is $\begin{pmatrix} k & 2 \\ 3 & k - 1 \end{pmatrix}$ not invertible?

$$k(k - 1) - 6 = 0 \quad \Leftrightarrow \quad k^2 - k - 6 = 0 \quad \Leftrightarrow \quad (k - 3)(k + 2) = 0$$

The matrix is singular for $k = 3$ and $k = -2$.

## Cramer's rule

For a system with $\det A \ne 0$, each unknown is a quotient of determinants: replace the column of that unknown by the right-hand side. For $2x + y = 5$, $x + 3y = 5$:

$$x = \frac{\begin{vmatrix} 5 & 1 \\ 5 & 3 \end{vmatrix}}{\begin{vmatrix} 2 & 1 \\ 1 & 3 \end{vmatrix}} = \frac{10}{5} = 2, \qquad y = \frac{\begin{vmatrix} 2 & 5 \\ 1 & 5 \end{vmatrix}}{5} = \frac{5}{5} = 1$$

## Common mistakes

- Computing $ad + bc$ or $ab - cd$ instead of $ad - bc$.
- Using the rule of Sarrus for $4 \times 4$ matrices – it only works for $3 \times 3$.
- Forgetting the checkerboard signs in cofactor expansion.
- Assuming $\det(A + B) = \det A + \det B$ – this is false in general.
- Thinking $\det(2A) = 2 \det A$ – for a $3 \times 3$ matrix it is $8 \det A$.

## Practice

1. Calculate $\begin{vmatrix} 5 & -2 \\ 3 & 4 \end{vmatrix}$.

<details>
<summary>Solution</summary>

$5 \cdot 4 - (-2) \cdot 3 = 20 + 6 = 26$.

</details>

2. Calculate $\det \begin{pmatrix} 2 & 0 & 1 \\ 1 & 3 & -1 \\ 0 & 1 & 4 \end{pmatrix}$.

<details>
<summary>Solution</summary>

Sarrus: down $2 \cdot 3 \cdot 4 + 0 \cdot (-1) \cdot 0 + 1 \cdot 1 \cdot 1 = 25$, up $1 \cdot 3 \cdot 0 + 2 \cdot (-1) \cdot 1 + 0 \cdot 1 \cdot 4 = -2$. So $\det = 25 - (-2) = 27$.

</details>

3. Show that $\det \begin{pmatrix} 1 & 2 & 3 \\ 4 & 5 & 6 \\ 7 & 8 & 9 \end{pmatrix} = 0$.

<details>
<summary>Solution</summary>

Sarrus: $45 + 84 + 96 - 105 - 48 - 72 = 225 - 225 = 0$. (Reason: the third row equals twice the second minus the first.)

</details>

4. Calculate $\det \begin{pmatrix} 3 & 5 & -1 \\ 0 & 2 & 7 \\ 0 & 0 & -4 \end{pmatrix}$.

<details>
<summary>Solution</summary>

Triangular matrix: multiply the diagonal, $3 \cdot 2 \cdot (-4) = -24$.

</details>

5. For which values of $k$ is $\begin{pmatrix} 1 & k \\ k & 4 \end{pmatrix}$ invertible?

<details>
<summary>Solution</summary>

$\det = 4 - k^2$. This is zero for $k = 2$ and $k = -2$. The matrix is invertible for all other $k$.

</details>
