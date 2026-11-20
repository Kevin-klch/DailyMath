---
title: Matrix Multiplication
category: linear-algebra
order: 50
level: 3
summary: Row times column – how to multiply two matrices, when the product exists and why the order of the factors matters.
related: matrices, inverse-matrix, determinants, vectors
---

Adding matrices is easy, because it works entry by entry. **Multiplying** matrices follows a different rule: you combine the rows of the first matrix with the columns of the second. This rule may look strange at first, but it is exactly what is needed to describe systems of equations, chains of transformations and multi-step processes with matrices.

## When does the product exist?

The product $A \cdot B$ only exists if $A$ has as many **columns** as $B$ has **rows**. The result has as many rows as $A$ and as many columns as $B$:

$$\underbrace{A}_{m \times n} \cdot \underbrace{B}_{n \times p} = \underbrace{C}_{m \times p}$$

The two "inner" numbers must match, the two "outer" numbers give the size of the result.

> **Key idea:** $(m \times n) \cdot (n \times p) = (m \times p)$. If the inner numbers differ, the product is not defined.

For example, a $2 \times 3$ matrix times a $3 \times 4$ matrix gives a $2 \times 4$ matrix. The reverse product ($3 \times 4$ times $2 \times 3$) does not exist.

## The rule: row times column

The entry $c_{ij}$ of the product is computed from **row $i$ of $A$** and **column $j$ of $B$**: multiply the matching numbers pairwise and add everything up – just like a dot product.

$$c_{ij} = a_{i1} b_{1j} + a_{i2} b_{2j} + \ldots + a_{in} b_{nj}$$

> **Key idea:** Entry in row $i$, column $j$ of $A \cdot B$ = (row $i$ of $A$) · (column $j$ of $B$).

### Example 1

$$\begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix} \cdot \begin{pmatrix} 5 & 6 \\ 7 & 8 \end{pmatrix}$$

- Row 1 · column 1: $1 \cdot 5 + 2 \cdot 7 = 19$
- Row 1 · column 2: $1 \cdot 6 + 2 \cdot 8 = 22$
- Row 2 · column 1: $3 \cdot 5 + 4 \cdot 7 = 43$
- Row 2 · column 2: $3 \cdot 6 + 4 \cdot 8 = 50$

$$\begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix} \cdot \begin{pmatrix} 5 & 6 \\ 7 & 8 \end{pmatrix} = \begin{pmatrix} 19 & 22 \\ 43 & 50 \end{pmatrix}$$

### Example 2: non-square matrices

$$A = \begin{pmatrix} 1 & 0 & 2 \\ -1 & 3 & 1 \end{pmatrix}, \qquad B = \begin{pmatrix} 3 & 1 \\ 2 & 1 \\ 1 & 0 \end{pmatrix}$$

$A$ is $2 \times 3$ and $B$ is $3 \times 2$, so $AB$ is a $2 \times 2$ matrix:

$$AB = \begin{pmatrix} 3 + 0 + 2 & 1 + 0 + 0 \\ -3 + 6 + 1 & -1 + 3 + 0 \end{pmatrix} = \begin{pmatrix} 5 & 1 \\ 4 & 2 \end{pmatrix}$$

The product $BA$ also exists, but it is a $3 \times 3$ matrix:

$$BA = \begin{pmatrix} 2 & 3 & 7 \\ 1 & 3 & 5 \\ 1 & 0 & 2 \end{pmatrix}$$

## The order matters

With numbers, $3 \cdot 5 = 5 \cdot 3$. With matrices, this is generally **false**. Swap the factors in Example 1:

$$\begin{pmatrix} 5 & 6 \\ 7 & 8 \end{pmatrix} \cdot \begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix} = \begin{pmatrix} 23 & 34 \\ 31 & 46 \end{pmatrix} \ne \begin{pmatrix} 19 & 22 \\ 43 & 50 \end{pmatrix}$$

Matrix multiplication is **not commutative**: $AB \ne BA$ in general. Sometimes only one of the two products exists, or they have different sizes, as in Example 2.

Other familiar rules do still hold (whenever the products are defined):

- **Associative:** $(AB)C = A(BC)$
- **Distributive:** $A(B + C) = AB + AC$ and $(A + B)C = AC + BC$
- **Identity matrix:** $AI = IA = A$ – the identity matrix plays the role of the number $1$.
- **Transpose:** $(AB)^T = B^T A^T$ – note the reversed order.

Another surprise: a product can be the zero matrix even if neither factor is. For instance $\begin{pmatrix} 0 & 1 \\ 0 & 0 \end{pmatrix} \cdot \begin{pmatrix} 0 & 1 \\ 0 & 0 \end{pmatrix} = \begin{pmatrix} 0 & 0 \\ 0 & 0 \end{pmatrix}$.

## Matrix times vector

A column vector is an $n \times 1$ matrix, so a matrix times a vector gives a vector:

$$\begin{pmatrix} 2 & -1 \\ 1 & 3 \end{pmatrix} \cdot \begin{pmatrix} 4 \\ 1 \end{pmatrix} = \begin{pmatrix} 8 - 1 \\ 4 + 3 \end{pmatrix} = \begin{pmatrix} 7 \\ 7 \end{pmatrix}$$

This is why every system of linear equations can be written briefly as $A \vec{x} = \vec{b}$. The system $2x - y = 7$, $x + 3y = 7$ is exactly the equation above with $\vec{x} = \begin{pmatrix} x \\ y \end{pmatrix}$.

### Example 3: costs

Two customers buy pens and notebooks. The quantities are in the matrix $Q$ (rows: customers, columns: pens and notebooks), the prices in € in the vector $\vec{p}$:

$$Q \cdot \vec{p} = \begin{pmatrix} 2 & 3 \\ 1 & 4 \end{pmatrix} \cdot \begin{pmatrix} 2 \\ 1 \end{pmatrix} = \begin{pmatrix} 7 \\ 6 \end{pmatrix}$$

The first customer pays 7 €, the second 6 €.

## Powers of a matrix

For a square matrix, $A^2 = A \cdot A$, $A^3 = A \cdot A \cdot A$ and so on. For example

$$\begin{pmatrix} 1 & 1 \\ 0 & 1 \end{pmatrix}^2 = \begin{pmatrix} 1 & 2 \\ 0 & 1 \end{pmatrix}$$

Careful: $A^2$ is **not** obtained by squaring each entry.

## Common mistakes

- Multiplying entry by entry, as with addition.
- Not checking the sizes first – the inner numbers must match.
- Assuming $AB = BA$, or swapping factors when solving matrix equations.
- Computing column times row instead of row times column.
- Squaring every entry to get $A^2$.

## Practice

1. Calculate $\begin{pmatrix} 2 & 0 \\ 1 & 3 \end{pmatrix} \cdot \begin{pmatrix} 1 & 4 \\ 2 & -1 \end{pmatrix}$.

<details>
<summary>Solution</summary>

Row times column: $\begin{pmatrix} 2 + 0 & 8 + 0 \\ 1 + 6 & 4 - 3 \end{pmatrix} = \begin{pmatrix} 2 & 8 \\ 7 & 1 \end{pmatrix}$.

</details>

2. $A$ is a $2 \times 3$ matrix and $B$ a $3 \times 4$ matrix. Which of the products $AB$ and $BA$ exist, and what size do they have?

<details>
<summary>Solution</summary>

$AB$: $(2 \times 3) \cdot (3 \times 4)$, inner numbers match, result $2 \times 4$. $BA$: $(3 \times 4) \cdot (2 \times 3)$, $4 \ne 2$, not defined.

</details>

3. Calculate $\begin{pmatrix} 1 & -1 & 2 \\ 0 & 3 & 1 \end{pmatrix} \cdot \begin{pmatrix} 2 \\ 1 \\ 3 \end{pmatrix}$.

<details>
<summary>Solution</summary>

$\begin{pmatrix} 2 - 1 + 6 \\ 0 + 3 + 3 \end{pmatrix} = \begin{pmatrix} 7 \\ 6 \end{pmatrix}$.

</details>

4. Calculate $\begin{pmatrix} 1 & 2 & 3 \end{pmatrix} \cdot \begin{pmatrix} 4 \\ 5 \\ 6 \end{pmatrix}$ and $\begin{pmatrix} 4 \\ 5 \\ 6 \end{pmatrix} \cdot \begin{pmatrix} 1 & 2 & 3 \end{pmatrix}$.

<details>
<summary>Solution</summary>

$(1 \times 3) \cdot (3 \times 1)$ gives a $1 \times 1$ matrix: $4 + 10 + 18 = 32$. $(3 \times 1) \cdot (1 \times 3)$ gives a $3 \times 3$ matrix: $\begin{pmatrix} 4 & 8 & 12 \\ 5 & 10 & 15 \\ 6 & 12 & 18 \end{pmatrix}$.

</details>

5. Show that $AB \ne BA$ for $A = \begin{pmatrix} 0 & 1 \\ 0 & 0 \end{pmatrix}$ and $B = \begin{pmatrix} 0 & 0 \\ 1 & 0 \end{pmatrix}$.

<details>
<summary>Solution</summary>

$AB = \begin{pmatrix} 1 & 0 \\ 0 & 0 \end{pmatrix}$, but $BA = \begin{pmatrix} 0 & 0 \\ 0 & 1 \end{pmatrix}$. The products differ.

</details>
