---
title: Matrices
category: linear-algebra
order: 40
level: 2
summary: Rectangular tables of numbers – how matrices are built, named and added, multiplied by a number and transposed.
related: matrix-multiplication, vectors, systems-of-equations, determinants
---

A **matrix** is a rectangular table of numbers arranged in rows and columns. Matrices are a compact way to store a lot of related data – a price list, the coefficients of a system of equations or a geometric transformation. Once you know the basic vocabulary and rules, you can calculate with whole tables at once instead of with each number separately.

## What is a matrix?

A matrix with $m$ rows and $n$ columns is called an $m \times n$ matrix (read "$m$ by $n$"). The numbers inside are its **entries**. The entry in row $i$ and column $j$ is written $a_{ij}$ – always **row first, then column**.

$$A = \begin{pmatrix} 1 & -2 & 3 \\ 0 & 4 & 5 \end{pmatrix}$$

This is a $2 \times 3$ matrix: two rows, three columns. For example $a_{12} = -2$ (row 1, column 2) and $a_{23} = 5$ (row 2, column 3).

> **Key idea:** The size of a matrix is always given as "rows × columns", and the index $a_{ij}$ also means row $i$, column $j$.

A vector is just a special matrix: a column vector with three components is a $3 \times 1$ matrix.

## Special matrices

- **Square matrix:** as many rows as columns ($n \times n$). Its entries $a_{11}, a_{22}, \ldots, a_{nn}$ form the **main diagonal**.
- **Zero matrix** $0$: all entries are $0$.
- **Identity matrix** $I$ (also written $E$): ones on the main diagonal, zeros everywhere else. In the $3 \times 3$ case:

$$I = \begin{pmatrix} 1 & 0 & 0 \\ 0 & 1 & 0 \\ 0 & 0 & 1 \end{pmatrix}$$

- **Diagonal matrix:** only the main diagonal may contain non-zero entries.
- **Upper triangular matrix:** all entries below the main diagonal are $0$.

## Calculating with matrices

### Equality

Two matrices are equal if they have the same size and **all** corresponding entries are equal.

### Addition and subtraction

Only matrices of the **same size** can be added. You add entry by entry:

$$\begin{pmatrix} 1 & -2 & 3 \\ 0 & 4 & 5 \end{pmatrix} + \begin{pmatrix} 2 & 0 & -1 \\ 3 & 1 & 2 \end{pmatrix} = \begin{pmatrix} 3 & -2 & 2 \\ 3 & 5 & 7 \end{pmatrix}$$

Subtraction works the same way. Matrix addition is commutative ($A + B = B + A$) and associative.

### Multiplying by a number

A number $r$ multiplies **every** entry:

$$3 \cdot \begin{pmatrix} 1 & -2 & 3 \\ 0 & 4 & 5 \end{pmatrix} = \begin{pmatrix} 3 & -6 & 9 \\ 0 & 12 & 15 \end{pmatrix}$$

### Example 1

With $A = \begin{pmatrix} 1 & -2 & 3 \\ 0 & 4 & 5 \end{pmatrix}$ and $B = \begin{pmatrix} 2 & 0 & -1 \\ 3 & 1 & 2 \end{pmatrix}$, calculate $2A - B$.

$$2A - B = \begin{pmatrix} 2 & -4 & 6 \\ 0 & 8 & 10 \end{pmatrix} - \begin{pmatrix} 2 & 0 & -1 \\ 3 & 1 & 2 \end{pmatrix} = \begin{pmatrix} 0 & -4 & 7 \\ -3 & 7 & 8 \end{pmatrix}$$

> **Key idea:** Addition, subtraction and multiplication by a number all work entry by entry – and addition requires both matrices to have the same size.

## The transpose

**Transposing** a matrix turns its rows into columns. The transpose of $A$ is written $A^T$; an $m \times n$ matrix becomes an $n \times m$ matrix, and the entry $a_{ij}$ moves to position $ji$:

$$A = \begin{pmatrix} 1 & -2 & 3 \\ 0 & 4 & 5 \end{pmatrix} \quad \Rightarrow \quad A^T = \begin{pmatrix} 1 & 0 \\ -2 & 4 \\ 3 & 5 \end{pmatrix}$$

Transposing twice brings you back: $(A^T)^T = A$. A square matrix with $A^T = A$ is called **symmetric** – it is mirrored along its main diagonal, like $\begin{pmatrix} 2 & 7 \\ 7 & -1 \end{pmatrix}$.

## Where matrices are used

### Example 2: tables of data

A bakery sells bread and rolls in two shops. Sales on Monday and Tuesday:

$$M = \begin{pmatrix} 40 & 120 \\ 25 & 90 \end{pmatrix}, \qquad T = \begin{pmatrix} 35 & 100 \\ 30 & 110 \end{pmatrix}$$

(rows: shops, columns: bread and rolls). The total sales for both days are $M + T = \begin{pmatrix} 75 & 220 \\ 55 & 200 \end{pmatrix}$. If sales rise by 10 % next week, the expected Monday sales are $1.1 \cdot M = \begin{pmatrix} 44 & 132 \\ 27.5 & 99 \end{pmatrix}$.

### Example 3: systems of equations

The coefficients of a system of linear equations form its **coefficient matrix**. For

$$2x + 3y = 7, \qquad x - y = 1$$

the coefficient matrix is $\begin{pmatrix} 2 & 3 \\ 1 & -1 \end{pmatrix}$. Methods like Gaussian elimination work directly with this table.

## Common mistakes

- Mixing up rows and columns: a $2 \times 3$ matrix has 2 rows, not 2 columns.
- Reading $a_{23}$ as "column 2, row 3".
- Trying to add matrices of different sizes.
- Multiplying only some entries (e.g. only the first row) by a number.
- Thinking the transpose keeps the size – it swaps the numbers of rows and columns.

## Practice

1. Give the size of $M = \begin{pmatrix} 4 & 0 & -1 \\ 2 & 7 & 3 \end{pmatrix}$ and the entries $m_{21}$ and $m_{13}$.

<details>
<summary>Solution</summary>

$M$ is a $2 \times 3$ matrix. $m_{21} = 2$ (row 2, column 1) and $m_{13} = -1$ (row 1, column 3).

</details>

2. Calculate $\begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix} + \begin{pmatrix} 5 & -2 \\ 0 & 1 \end{pmatrix}$.

<details>
<summary>Solution</summary>

Entry by entry: $\begin{pmatrix} 6 & 0 \\ 3 & 5 \end{pmatrix}$.

</details>

3. Calculate $3 \begin{pmatrix} 2 & -1 \\ 0 & 4 \end{pmatrix} - 2 \begin{pmatrix} 1 & 1 \\ 3 & -2 \end{pmatrix}$.

<details>
<summary>Solution</summary>

$\begin{pmatrix} 6 & -3 \\ 0 & 12 \end{pmatrix} - \begin{pmatrix} 2 & 2 \\ 6 & -4 \end{pmatrix} = \begin{pmatrix} 4 & -5 \\ -6 & 16 \end{pmatrix}$.

</details>

4. Find the transpose of $\begin{pmatrix} 1 & 2 & 3 \\ 4 & 5 & 6 \end{pmatrix}$.

<details>
<summary>Solution</summary>

Rows become columns: $\begin{pmatrix} 1 & 4 \\ 2 & 5 \\ 3 & 6 \end{pmatrix}$, a $3 \times 2$ matrix.

</details>

5. Find $x$ and $y$ so that $\begin{pmatrix} x + 1 & 4 \\ 2 & 2y \end{pmatrix} = \begin{pmatrix} 3 & 4 \\ 2 & -10 \end{pmatrix}$.

<details>
<summary>Solution</summary>

Compare the entries: $x + 1 = 3$, so $x = 2$, and $2y = -10$, so $y = -5$.

</details>
