---
title: Gaussian Elimination
category: linear-algebra
order: 80
level: 3
summary: A systematic recipe for solving any system of linear equations – row operations, echelon form, back substitution and the three possible outcomes.
related: systems-of-equations, matrices, determinants, inverse-matrix
---

**Gaussian elimination** is a step-by-step method for solving systems of linear equations, no matter how many equations and unknowns there are. You eliminate one variable after another until the system has a "staircase" shape, and then read off the solution from the bottom up. Because it always works the same way, it is the standard method in school, at university and inside computers.

## Allowed row operations

The following changes never alter the solution set of a system:

1. **Swap** two equations.
2. **Multiply** an equation by a number other than $0$.
3. **Add** a multiple of one equation to another equation.

> **Key idea:** Swapping rows, multiplying a row by a non-zero number and adding a multiple of one row to another are the only tools you need – none of them changes the solutions.

## The augmented matrix

To save writing, you only note the coefficients and the right-hand sides. The system

$$\begin{cases} x + y + z = 6 \\ 2x - y + z = 3 \\ x + 2y - z = 2 \end{cases}$$

becomes the **augmented matrix**

$$\left( \begin{array}{ccc|c} 1 & 1 & 1 & 6 \\ 2 & -1 & 1 & 3 \\ 1 & 2 & -1 & 2 \end{array} \right)$$

Each row is one equation, each column belongs to one variable, and the line separates the right-hand side.

## The method

1. **Forward elimination:** Use the first row to create zeros below the first entry of the first column. Then use the second row to create zeros below the second entry of the second column, and so on.
2. The result is the **row echelon form**: below the staircase there are only zeros.
3. **Back substitution:** Solve the last equation, insert the result into the one above it, and continue upward.

### Example 1: exactly one solution

Start with the augmented matrix above.

Eliminate $x$ from rows 2 and 3 with $R_2 - 2R_1$ and $R_3 - R_1$:

$$\left( \begin{array}{ccc|c} 1 & 1 & 1 & 6 \\ 0 & -3 & -1 & -9 \\ 0 & 1 & -2 & -4 \end{array} \right)$$

Eliminate $y$ from row 3 with $3R_3 + R_2$:

$$\left( \begin{array}{ccc|c} 1 & 1 & 1 & 6 \\ 0 & -3 & -1 & -9 \\ 0 & 0 & -7 & -21 \end{array} \right)$$

Back substitution:

- Row 3: $-7z = -21$, so $z = 3$.
- Row 2: $-3y - 3 = -9$, so $-3y = -6$ and $y = 2$.
- Row 1: $x + 2 + 3 = 6$, so $x = 1$.

The solution is $(x, y, z) = (1, 2, 3)$. Check in the original second equation: $2 - 2 + 3 = 3$.

## The three possible outcomes

The last rows of the echelon form show which case you are in:

- **Exactly one solution:** the staircase has a step in every column of the variables, as in Example 1.
- **No solution:** a row of the form $(0 \;\; 0 \;\; 0 \mid c)$ with $c \ne 0$ appears. It stands for the false statement $0 = c$.
- **Infinitely many solutions:** a row of zeros $(0 \;\; 0 \;\; 0 \mid 0)$ appears (and no contradiction). Then at least one variable can be chosen freely as a **parameter**.

> **Key idea:** A contradiction row $0 = c$ means no solution; a zero row with fewer steps than variables means infinitely many solutions, described with a parameter.

### Example 2: no solution

$$\left( \begin{array}{ccc|c} 1 & 1 & 1 & 2 \\ 1 & 2 & 3 & 5 \\ 2 & 3 & 4 & 8 \end{array} \right) \;\xrightarrow{R_2 - R_1,\; R_3 - 2R_1}\; \left( \begin{array}{ccc|c} 1 & 1 & 1 & 2 \\ 0 & 1 & 2 & 3 \\ 0 & 1 & 2 & 4 \end{array} \right) \;\xrightarrow{R_3 - R_2}\; \left( \begin{array}{ccc|c} 1 & 1 & 1 & 2 \\ 0 & 1 & 2 & 3 \\ 0 & 0 & 0 & 1 \end{array} \right)$$

The last row says $0 = 1$. The system has no solution.

### Example 3: infinitely many solutions

Change the last right-hand side from $8$ to $7$. The same steps now lead to the row $(0 \;\; 0 \;\; 0 \mid 0)$, i.e. $0 = 0$. Only two equations remain:

$$x + y + z = 2, \qquad y + 2z = 3$$

Choose $z = t$ as a parameter. Then $y = 3 - 2t$ and $x = 2 - (3 - 2t) - t = -1 + t$. The solution set is

$$\left\{ (-1 + t,\; 3 - 2t,\; t) \mid t \in \mathbb{R} \right\}$$

For $t = 0$ you get $(-1, 3, 0)$; insert it into the third original equation: $-2 + 9 + 0 = 7$. Geometrically, these solutions form a line in space.

## Tips for clean calculations

- If possible, put a row with leading coefficient $1$ at the top (swap rows) – this avoids fractions.
- Multiply rows by suitable numbers before subtracting, as in $3R_3 + R_2$ above, so that you stay with whole numbers.
- Write down every operation you use, so you can find mistakes later.
- Always check the final answer in **all** original equations.

The same row operations, continued until the left side is the identity matrix, are called the **Gauss-Jordan method**; it is also used to compute inverse matrices.

## Common mistakes

- Applying an operation to only part of a row – the right-hand side must change too.
- Using the row you are currently changing to change itself, e.g. "$R_2 - R_2$".
- Thinking a zero row means "no solution" – it is the contradiction row $0 = c$ with $c \ne 0$ that means that.
- Giving only one particular solution when there are infinitely many, instead of the general solution with a parameter.
- Sign errors when subtracting negative entries.

## Practice

1. Solve $x + 2y = 8$, $3x - y = 3$ with Gaussian elimination.

<details>
<summary>Solution</summary>

$R_2 - 3R_1$ gives $-7y = -21$, so $y = 3$. Then $x + 6 = 8$, so $x = 2$. Check: $6 - 3 = 3$.

</details>

2. Solve the system $x + y - z = 0$, $2x + y + z = 7$, $x - y + 2z = 5$.

<details>
<summary>Solution</summary>

$R_2 - 2R_1$: $(0, -1, 3 \mid 7)$. $R_3 - R_1$: $(0, -2, 3 \mid 5)$. Then $R_3 - 2R_2$: $(0, 0, -3 \mid -9)$, so $z = 3$. From $-y + 9 = 7$ we get $y = 2$, and from $x + 2 - 3 = 0$ we get $x = 1$. Solution: $(1, 2, 3)$.

</details>

3. Show that $x + 2y + z = 4$, $2x + 4y + 2z = 9$, $x - y = 1$ has no solution.

<details>
<summary>Solution</summary>

$R_2 - 2R_1$ gives $0x + 0y + 0z = 1$, i.e. $0 = 1$. This is a contradiction, so there is no solution.

</details>

4. Solve $x - y + 2z = 3$, $2x - y + 3z = 5$, $3x - 2y + 5z = 8$.

<details>
<summary>Solution</summary>

$R_2 - 2R_1$: $(0, 1, -1 \mid -1)$. $R_3 - 3R_1$: $(0, 1, -1 \mid -1)$. $R_3 - R_2$: zero row. With $z = t$: $y = -1 + t$ and $x = 3 + y - 2z = 2 - t$. Solution set: $\left\{ (2 - t,\; -1 + t,\; t) \mid t \in \mathbb{R} \right\}$.

</details>

5. For which value of $a$ does the system $x + y = 2$, $x + ay = 3$ have no solution?

<details>
<summary>Solution</summary>

$R_2 - R_1$ gives $(a - 1)y = 1$. For $a = 1$ this becomes $0 = 1$ – no solution. For every other $a$ there is exactly one solution, $y = \frac{1}{a - 1}$.

</details>
