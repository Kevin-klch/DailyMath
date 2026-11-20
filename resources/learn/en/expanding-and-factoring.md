---
title: Expanding and Factoring
category: algebra
order: 20
level: 1
summary: How to multiply out brackets with the distributive law and how to reverse the process by pulling out common factors.
related: variables-and-terms, binomial-formulas, quadratic-equations
---

Expanding and factoring are two directions of the same rule, the **distributive law**. Expanding removes brackets by multiplying them out; factoring puts brackets back in by pulling out a common factor. You need both constantly: expanding to simplify expressions and solve equations, factoring to simplify fractions and to find zeros.

## The distributive law

For any numbers $a$, $b$ and $c$:

$$a(b + c) = ab + ac$$

A quick check with numbers: $3 \cdot (4 + 5) = 3 \cdot 9 = 27$, and $3 \cdot 4 + 3 \cdot 5 = 12 + 15 = 27$. Read from left to right, the law tells you how to **expand**; read from right to left, it tells you how to **factor**.

> **Key idea:** When you multiply a bracket by a factor, multiply **every** term inside the bracket by that factor – including its sign.

## Expanding a single bracket

### Example 1

$$3(x + 4) = 3x + 12$$

### Example 2

$$-2(a - 5) = -2a + 10$$

The factor $-2$ multiplies both terms: $(-2) \cdot a = -2a$ and $(-2) \cdot (-5) = +10$.

### Example 3: minus in front of a bracket

A minus sign in front of a bracket means multiplying by $-1$, so every sign inside flips:

$$7 - (2x - 3) = 7 - 2x + 3 = 10 - 2x$$

A plus sign in front of a bracket changes nothing: $5 + (x - 2) = 5 + x - 2 = x + 3$.

## Multiplying two brackets

To multiply two brackets, multiply **each term of the first bracket by each term of the second**, then combine like terms:

$$(a + b)(c + d) = ac + ad + bc + bd$$

For two binomials this is often remembered as **FOIL**: First, Outer, Inner, Last.

### Example 4

$$(x + 3)(x - 5) = x^2 - 5x + 3x - 15 = x^2 - 2x - 15$$

### Example 5

$$(2a - 1)(a + 4) = 2a^2 + 8a - a - 4 = 2a^2 + 7a - 4$$

With longer brackets the idea is the same – there are just more products. A bracket with 2 terms times a bracket with 3 terms gives $2 \cdot 3 = 6$ products before combining.

## Factoring out a common factor

Factoring is the reverse: look for a factor that appears in **every** term and write it in front of a bracket.

1. Find the greatest common factor of the coefficients.
2. Find the variables that appear in every term, with the smallest exponent.
3. Divide each term by this factor and write the results in the bracket.

### Example 6

$$6x + 9 = 3(2x + 3)$$

### Example 7

$$4x^2 - 10x = 2x(2x - 5)$$

Both terms contain $2$ and $x$. Check: $2x \cdot 2x = 4x^2$ and $2x \cdot (-5) = -10x$.

### Example 8

$$12a^2b - 18ab^2 = 6ab(2a - 3b)$$

> **Key idea:** You can always check a factorization by expanding it again. If you get the original expression back, it is correct.

If the factor you pull out equals a whole term, a $1$ remains in its place: $5x + 5 = 5(x + 1)$, not $5x$.

## Factoring by grouping

Sometimes there is no factor common to all terms, but pairs of terms share one. Then group them:

$$ax + ay + bx + by = a(x + y) + b(x + y) = (a + b)(x + y)$$

The bracket $(x + y)$ is now the common factor.

### Example 9

$$x^3 + 2x^2 + 3x + 6 = x^2(x + 2) + 3(x + 2) = (x^2 + 3)(x + 2)$$

## Factoring simple trinomials

An expression like $x^2 + 7x + 12$ can often be written as $(x + p)(x + q)$. Expanding shows $(x + p)(x + q) = x^2 + (p + q)x + pq$, so you need two numbers whose **sum** is $7$ and whose **product** is $12$. These are $3$ and $4$:

$$x^2 + 7x + 12 = (x + 3)(x + 4)$$

Special patterns such as $x^2 - 9 = (x + 3)(x - 3)$ are covered under binomial formulas.

## Common mistakes

- Multiplying only the first term: $3(x + 4) = 3x + 4$ is wrong.
- Forgetting to flip all signs after a minus: $-(2x - 3)$ is $-2x + 3$, not $-2x - 3$.
- Missing products when multiplying two brackets – each term must meet each term.
- Forgetting the $1$ when factoring: $3x + 3 = 3(x + 1)$.
- Not pulling out the *greatest* common factor: $8x + 12 = 2(4x + 6)$ is correct but not finished; $4(2x + 3)$ is.

## Practice

1. Expand $-3(2x - 4)$.

<details>
<summary>Solution</summary>

$(-3) \cdot 2x = -6x$ and $(-3) \cdot (-4) = 12$, so $-6x + 12$.

</details>

2. Expand and simplify $(x - 4)(x + 6)$.

<details>
<summary>Solution</summary>

$x^2 + 6x - 4x - 24 = x^2 + 2x - 24$.

</details>

3. Simplify $4(x + 2) - 2(3x - 1)$.

<details>
<summary>Solution</summary>

$4x + 8 - 6x + 2 = -2x + 10$.

</details>

4. Factor $15a^2 - 10a$.

<details>
<summary>Solution</summary>

The common factor is $5a$: $15a^2 - 10a = 5a(3a - 2)$.

</details>

5. Factor by grouping: $2xy + 6x + y + 3$.

<details>
<summary>Solution</summary>

$2x(y + 3) + 1 \cdot (y + 3) = (2x + 1)(y + 3)$.

</details>
