---
title: Systems of Linear Equations
category: algebra
order: 60
level: 2
summary: How to solve two linear equations with two unknowns by substitution, elimination or equating – and what it means when there is no or infinitely many solutions.
related: linear-equations, linear-functions, gaussian-elimination
---

Many problems involve two unknown quantities at once – the price of two different items, two numbers with a given sum and difference, two lines that cross. One equation alone cannot pin down two unknowns, but **two equations** usually can. Such a pair of equations is called a **system of linear equations**, and its solution is a pair of values $(x, y)$ that satisfies **both** equations at the same time.

## What a solution means

Consider the system

$$\begin{cases} x + y = 10 \\ x - y = 4 \end{cases}$$

The pair $x = 7$, $y = 3$ is a solution: $7 + 3 = 10$ and $7 - 3 = 4$. The pair $x = 6$, $y = 4$ fits the first equation but not the second, so it is not a solution of the system.

Each linear equation in $x$ and $y$ describes a straight line. A solution of the system is a point that lies on **both** lines – their intersection point.

> **Key idea:** The goal of every method is the same: combine the two equations so that one variable disappears. Then you are left with an ordinary linear equation in one variable.

## Method 1: substitution

Solve one equation for one variable and substitute that expression into the other equation.

### Example 1

$$\begin{cases} y = 2x - 1 \\ 3x + 2y = 12 \end{cases}$$

The first equation already gives $y$. Substitute it into the second:

$$3x + 2(2x - 1) = 12 \quad\Rightarrow\quad 7x - 2 = 12 \quad\Rightarrow\quad x = 2$$

Then $y = 2 \cdot 2 - 1 = 3$. Solution: $(2, 3)$.

Substitution is the best choice when one variable is already isolated or has the coefficient $1$.

## Method 2: elimination

Add or subtract the equations so that one variable cancels out. If necessary, first multiply the equations by suitable numbers so that the coefficients of one variable are opposites.

### Example 2

$$\begin{cases} 3x + 2y = 16 \\ 5x - 2y = 16 \end{cases}$$

The $y$-terms are already opposites. Adding the equations gives $8x = 32$, so $x = 4$. Substitute into the first equation: $12 + 2y = 16$, so $y = 2$. Solution: $(4, 2)$.

### Example 3

$$\begin{cases} 2x + 3y = 12 \\ 3x + 2y = 13 \end{cases}$$

Multiply the first equation by $3$ and the second by $2$ so that both contain $6x$:

$$\begin{cases} 6x + 9y = 36 \\ 6x + 4y = 26 \end{cases}$$

Subtract the second from the first: $5y = 10$, so $y = 2$. Then $2x + 6 = 12$ gives $x = 3$. Solution: $(3, 2)$.

Check: $2 \cdot 3 + 3 \cdot 2 = 12$ and $3 \cdot 3 + 2 \cdot 2 = 13$. Correct.

## Method 3: equating

If both equations are solved for the same variable, set the two right-hand sides equal.

### Example 4

$$\begin{cases} y = 2x + 1 \\ y = -x + 7 \end{cases}$$

$$2x + 1 = -x + 7 \quad\Rightarrow\quad 3x = 6 \quad\Rightarrow\quad x = 2$$

Then $y = 2 \cdot 2 + 1 = 5$. The two lines intersect at $(2, 5)$.

## How many solutions?

Two lines in the plane can relate in three ways, and so can the equations:

- **Exactly one solution:** the lines intersect in one point (the usual case).
- **No solution:** the lines are parallel. Example: $x + y = 3$ and $2x + 2y = 8$. Doubling the first gives $2x + 2y = 6$, which contradicts $2x + 2y = 8$. During the calculation you get a false statement such as $0 = 2$.
- **Infinitely many solutions:** both equations describe the same line. Example: $x + y = 3$ and $2x + 2y = 6$. You end up with a true statement like $0 = 0$.

> **Key idea:** If a variable disappears and a false statement remains, the system has no solution. If a true statement remains, it has infinitely many solutions.

## Word problems

### Example 5

A cinema sells 30 tickets for a total of 210 €. Adult tickets cost 8 €, child tickets 5 €. How many of each were sold?

Let $a$ be the number of adult tickets and $c$ the number of child tickets:

$$\begin{cases} a + c = 30 \\ 8a + 5c = 210 \end{cases}$$

From the first equation $c = 30 - a$. Substitute: $8a + 5(30 - a) = 210$, so $3a + 150 = 210$ and $a = 20$. Then $c = 10$. Check: $160 + 50 = 210$.

## Common mistakes

- Finding $x$ and forgetting to calculate $y$ – the solution is always a **pair**.
- Multiplying only one side of an equation (or only some terms) before eliminating.
- Sign errors when subtracting equations: subtract **every** term, e.g. $9y - 4y$ and $36 - 26$.
- Substituting an expression without brackets: $2(2x - 1)$, not $2 \cdot 2x - 1$.
- Not checking the result in **both** original equations.

## Practice

1. Solve by substitution: $y = 3x - 2$ and $2x + y = 8$.

<details>
<summary>Solution</summary>

$2x + (3x - 2) = 8$, so $5x = 10$ and $x = 2$. Then $y = 3 \cdot 2 - 2 = 4$. Solution: $(2, 4)$.

</details>

2. Solve by elimination: $x + 2y = 7$ and $3x - 2y = 5$.

<details>
<summary>Solution</summary>

Add the equations: $4x = 12$, so $x = 3$. Then $3 + 2y = 7$ gives $y = 2$. Solution: $(3, 2)$.

</details>

3. Solve: $4x + 3y = 10$ and $2x + 5y = 12$.

<details>
<summary>Solution</summary>

Multiply the second equation by $2$: $4x + 10y = 24$. Subtract the first equation: $7y = 14$, so $y = 2$. Then $4x + 6 = 10$ gives $x = 1$. Solution: $(1, 2)$.

</details>

4. How many solutions does the system $2x - y = 3$ and $-4x + 2y = 5$ have?

<details>
<summary>Solution</summary>

Multiply the first equation by $2$: $4x - 2y = 6$. Adding the second equation gives $0 = 11$, a false statement. The system has no solution (the lines are parallel).

</details>

5. Two numbers add up to 25, and their difference is 7. Find the numbers.

<details>
<summary>Solution</summary>

$x + y = 25$ and $x - y = 7$. Adding: $2x = 32$, so $x = 16$ and $y = 9$.

</details>
