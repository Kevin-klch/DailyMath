---
title: The Inverse Matrix
category: linear-algebra
order: 70
level: 3
summary: The matrix that undoes another one – when it exists, the quick formula for 2×2 matrices and the Gauss-Jordan method for larger ones.
related: determinants, matrix-multiplication, gaussian-elimination, matrices
---

For numbers, dividing by $a$ is the same as multiplying by $\frac{1}{a}$. Matrices cannot be divided, but many square matrices have a partner that plays the role of $\frac{1}{a}$: the **inverse matrix**. With it you can solve systems of equations and matrix equations in one step and undo transformations.

## Definition

The inverse of a square matrix $A$ is the matrix $A^{-1}$ for which

$$A \cdot A^{-1} = A^{-1} \cdot A = I$$

where $I$ is the identity matrix of the same size. Just as $a \cdot \frac{1}{a} = 1$, multiplying a matrix by its inverse gives the "one" of matrices.

Not every matrix has an inverse. A matrix with an inverse is called **invertible** (or regular), otherwise **singular**.

> **Key idea:** A square matrix $A$ is invertible exactly when $\det A \ne 0$.

Only square matrices can have an inverse. The inverse, if it exists, is unique.

## The formula for 2×2 matrices

For a $2 \times 2$ matrix there is a short formula: swap the entries on the main diagonal, change the sign of the other two, and divide by the determinant.

$$\begin{pmatrix} a & b \\ c & d \end{pmatrix}^{-1} = \frac{1}{ad - bc} \begin{pmatrix} d & -b \\ -c & a \end{pmatrix}$$

> **Key idea:** For $2 \times 2$ matrices: swap the diagonal, negate the rest, divide by $\det A$.

### Example 1

$$A = \begin{pmatrix} 3 & 5 \\ 1 & 2 \end{pmatrix}, \qquad \det A = 6 - 5 = 1$$

$$A^{-1} = \frac{1}{1} \begin{pmatrix} 2 & -5 \\ -1 & 3 \end{pmatrix} = \begin{pmatrix} 2 & -5 \\ -1 & 3 \end{pmatrix}$$

Always check by multiplying:

$$\begin{pmatrix} 3 & 5 \\ 1 & 2 \end{pmatrix} \cdot \begin{pmatrix} 2 & -5 \\ -1 & 3 \end{pmatrix} = \begin{pmatrix} 6 - 5 & -15 + 15 \\ 2 - 2 & -5 + 6 \end{pmatrix} = \begin{pmatrix} 1 & 0 \\ 0 & 1 \end{pmatrix}$$

## The Gauss-Jordan method

For $3 \times 3$ matrices and larger, the inverse is found with row operations:

1. Write $A$ and the identity matrix side by side: $(A \mid I)$.
2. Use row operations (swap rows, multiply a row by a non-zero number, add a multiple of one row to another) to turn the left side into the identity matrix.
3. Apply every operation to the whole row, including the right side. When the left side is $I$, the right side is $A^{-1}$: $(I \mid A^{-1})$.

If a zero row appears on the left, the matrix is not invertible.

### Example 2

Find the inverse of $A = \begin{pmatrix} 1 & 2 & 1 \\ 0 & 1 & 1 \\ 1 & 2 & 2 \end{pmatrix}$.

$$\left( \begin{array}{ccc|ccc} 1 & 2 & 1 & 1 & 0 & 0 \\ 0 & 1 & 1 & 0 & 1 & 0 \\ 1 & 2 & 2 & 0 & 0 & 1 \end{array} \right)$$

Step 1: $R_3 - R_1$ creates a zero at the bottom left: $R_3 = (0, 0, 1 \mid -1, 0, 1)$.

Step 2: Clear the third column above the $1$: $R_2 - R_3$ gives $(0, 1, 0 \mid 1, 1, -1)$ and $R_1 - R_3$ gives $(1, 2, 0 \mid 2, 0, -1)$.

Step 3: Clear the second column in row 1: $R_1 - 2R_2$ gives $(1, 0, 0 \mid 0, -2, 1)$.

$$\left( \begin{array}{ccc|ccc} 1 & 0 & 0 & 0 & -2 & 1 \\ 0 & 1 & 0 & 1 & 1 & -1 \\ 0 & 0 & 1 & -1 & 0 & 1 \end{array} \right) \quad \Rightarrow \quad A^{-1} = \begin{pmatrix} 0 & -2 & 1 \\ 1 & 1 & -1 \\ -1 & 0 & 1 \end{pmatrix}$$

Check (first row of $A$ times the columns of $A^{-1}$): $0 + 2 - 1 = 1$, $\;-2 + 2 + 0 = 0$, $\;1 - 2 + 1 = 0$. The other rows work the same way.

## Rules for inverses

- $(A^{-1})^{-1} = A$
- $(AB)^{-1} = B^{-1} A^{-1}$ – the order is reversed, like taking off socks and shoes.
- $(A^T)^{-1} = (A^{-1})^T$
- $\det(A^{-1}) = \dfrac{1}{\det A}$
- $(rA)^{-1} = \frac{1}{r} A^{-1}$ for $r \ne 0$

## Solving equations with the inverse

A system of equations $A\vec{x} = \vec{b}$ with an invertible matrix $A$ has the unique solution

$$\vec{x} = A^{-1} \vec{b}$$

You get this by multiplying both sides **from the left** by $A^{-1}$.

### Example 3

Solve $3x + 5y = 11$, $x + 2y = 4$. The coefficient matrix is the $A$ from Example 1:

$$\begin{pmatrix} x \\ y \end{pmatrix} = \begin{pmatrix} 2 & -5 \\ -1 & 3 \end{pmatrix} \cdot \begin{pmatrix} 11 \\ 4 \end{pmatrix} = \begin{pmatrix} 22 - 20 \\ -11 + 12 \end{pmatrix} = \begin{pmatrix} 2 \\ 1 \end{pmatrix}$$

Check: $6 + 5 = 11$ and $2 + 2 = 4$.

For a matrix equation $AX = B$, multiply from the left: $X = A^{-1}B$. For $XA = B$, multiply from the right: $X = BA^{-1}$. Because matrix multiplication is not commutative, these two results are usually different.

## Common mistakes

- Inverting every entry: $A^{-1}$ is **not** the matrix of the reciprocals $\frac{1}{a_{ij}}$.
- Forgetting to divide by the determinant in the $2 \times 2$ formula, or swapping the wrong entries.
- Writing $\vec{x} = \vec{b} A^{-1}$ instead of $A^{-1}\vec{b}$.
- Using $(AB)^{-1} = A^{-1}B^{-1}$ without reversing the order.
- In the Gauss-Jordan method, applying a row operation only to the left half.

## Practice

1. Find the inverse of $\begin{pmatrix} 2 & 1 \\ 4 & 3 \end{pmatrix}$.

<details>
<summary>Solution</summary>

$\det = 6 - 4 = 2$, so the inverse is $\frac{1}{2} \begin{pmatrix} 3 & -1 \\ -4 & 2 \end{pmatrix} = \begin{pmatrix} \frac{3}{2} & -\frac{1}{2} \\ -2 & 1 \end{pmatrix}$. Check: $\begin{pmatrix} 2 & 1 \\ 4 & 3 \end{pmatrix} \cdot \begin{pmatrix} \frac{3}{2} & -\frac{1}{2} \\ -2 & 1 \end{pmatrix} = \begin{pmatrix} 1 & 0 \\ 0 & 1 \end{pmatrix}$.

</details>

2. Is $\begin{pmatrix} 6 & 4 \\ 3 & 2 \end{pmatrix}$ invertible?

<details>
<summary>Solution</summary>

$\det = 12 - 12 = 0$, so the matrix is singular and has no inverse.

</details>

3. Solve $2x + y = 5$, $5x + 3y = 13$ using the inverse matrix.

<details>
<summary>Solution</summary>

$A = \begin{pmatrix} 2 & 1 \\ 5 & 3 \end{pmatrix}$ has $\det A = 1$ and $A^{-1} = \begin{pmatrix} 3 & -1 \\ -5 & 2 \end{pmatrix}$. Then $\begin{pmatrix} x \\ y \end{pmatrix} = A^{-1} \begin{pmatrix} 5 \\ 13 \end{pmatrix} = \begin{pmatrix} 15 - 13 \\ -25 + 26 \end{pmatrix} = \begin{pmatrix} 2 \\ 1 \end{pmatrix}$.

</details>

4. Find the inverse of $\begin{pmatrix} 1 & 0 & 0 \\ 2 & 1 & 0 \\ 0 & 3 & 1 \end{pmatrix}$ with the Gauss-Jordan method.

<details>
<summary>Solution</summary>

$R_2 - 2R_1$ gives $(0, 1, 0 \mid -2, 1, 0)$. Then $R_3 - 3R_2$ gives $(0, 0, 1 \mid 6, -3, 1)$. The left side is now $I$, so the inverse is $\begin{pmatrix} 1 & 0 & 0 \\ -2 & 1 & 0 \\ 6 & -3 & 1 \end{pmatrix}$.

</details>

5. Solve the matrix equation $AX = B$ for $A = \begin{pmatrix} 3 & 5 \\ 1 & 2 \end{pmatrix}$ and $B = \begin{pmatrix} 1 & 0 \\ 2 & 1 \end{pmatrix}$.

<details>
<summary>Solution</summary>

$X = A^{-1}B = \begin{pmatrix} 2 & -5 \\ -1 & 3 \end{pmatrix} \cdot \begin{pmatrix} 1 & 0 \\ 2 & 1 \end{pmatrix} = \begin{pmatrix} -8 & -5 \\ 5 & 3 \end{pmatrix}$. Check: $AX = \begin{pmatrix} -24 + 25 & -15 + 15 \\ -8 + 10 & -5 + 6 \end{pmatrix} = B$.

</details>
