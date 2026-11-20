---
title: Binomial Formulas
category: algebra
order: 30
level: 2
summary: The three special products for squaring a sum, squaring a difference and multiplying sum by difference – and how to use them in both directions.
related: expanding-and-factoring, quadratic-equations, variables-and-terms
---

Some products of brackets appear so often that it pays to know their results by heart. The three **binomial formulas** (also called special products) tell you immediately what $(a + b)^2$, $(a - b)^2$ and $(a + b)(a - b)$ are. They save time when expanding, make mental arithmetic easier, and – used backwards – are one of the most important tools for factoring.

## The three formulas

$$(a + b)^2 = a^2 + 2ab + b^2$$

$$(a - b)^2 = a^2 - 2ab + b^2$$

$$(a + b)(a - b) = a^2 - b^2$$

The first two are the "square of a sum" and the "square of a difference". The third is called the **difference of two squares**.

> **Key idea:** Square of a sum: $(a + b)^2 = a^2 + 2ab + b^2$. Square of a difference: $(a - b)^2 = a^2 - 2ab + b^2$. Sum times difference: $(a + b)(a - b) = a^2 - b^2$.

## Where they come from

Each formula is just the distributive law applied to two brackets:

$$(a + b)^2 = (a + b)(a + b) = a^2 + ab + ba + b^2 = a^2 + 2ab + b^2$$

$$(a + b)(a - b) = a^2 - ab + ba - b^2 = a^2 - b^2$$

In the third formula the two middle terms cancel out – that is why the result is so short.

There is also a nice picture for the first formula. A square with side length $a + b$ can be split into a square of area $a^2$, a square of area $b^2$ and two rectangles of area $ab$ each. Together: $a^2 + 2ab + b^2$.

## Expanding with the formulas

Identify what plays the role of $a$ and of $b$ – these can be whole terms – and substitute.

### Example 1

$$(x + 5)^2 = x^2 + 2 \cdot x \cdot 5 + 5^2 = x^2 + 10x + 25$$

### Example 2

In $(3m - 2n)^2$ the first part is $3m$ and the second part is $2n$:

$$(3m - 2n)^2 = (3m)^2 - 2 \cdot 3m \cdot 2n + (2n)^2 = 9m^2 - 12mn + 4n^2$$

Note that the whole term is squared: $(3m)^2 = 9m^2$, not $3m^2$.

### Example 3

$$(2x + 7)(2x - 7) = (2x)^2 - 7^2 = 4x^2 - 49$$

## The middle term

The most common error is forgetting the middle term:

$$(a + b)^2 \neq a^2 + b^2$$

A quick number check makes this obvious: $(3 + 4)^2 = 49$, but $3^2 + 4^2 = 25$. The missing $24$ is exactly $2 \cdot 3 \cdot 4$.

> **Key idea:** When you square a sum or a difference, there are always **three** terms. The middle term is twice the product of the two parts.

## Mental arithmetic

The formulas make some calculations surprisingly easy:

$$51^2 = (50 + 1)^2 = 2500 + 100 + 1 = 2601$$

$$49 \cdot 51 = (50 - 1)(50 + 1) = 2500 - 1 = 2499$$

## Using the formulas backwards: factoring

Reading the formulas from right to left turns sums into products. Look for these patterns:

- Two squares with a plus and a middle term $\rightarrow$ first or second formula.
- Two squares with a minus and **no** middle term $\rightarrow$ third formula.

### Example 4

$$x^2 - 6x + 9$$

$x^2$ is the square of $x$, $9$ is the square of $3$, and the middle term is $2 \cdot x \cdot 3 = 6x$ with a minus sign. So:

$$x^2 - 6x + 9 = (x - 3)^2$$

### Example 5

$$4x^2 + 20x + 25 = (2x + 5)^2$$

Check: $(2x)^2 = 4x^2$, $5^2 = 25$ and $2 \cdot 2x \cdot 5 = 20x$.

### Example 6

$$9x^2 - 16 = (3x)^2 - 4^2 = (3x + 4)(3x - 4)$$

Always check the middle term before using the first or second formula. For example, $x^2 + 5x + 9$ is **not** $(x + 3)^2$, because the middle term would have to be $6x$.

A sum of two squares such as $x^2 + 9$ cannot be factored this way – there is no binomial formula for $a^2 + b^2$.

## Common mistakes

- Dropping the middle term: $(x + 3)^2 = x^2 + 9$ is wrong; correct is $x^2 + 6x + 9$.
- Forgetting the factor $2$ in the middle term: $(x + 3)^2 \neq x^2 + 3x + 9$.
- Squaring only part of a term: $(2x)^2 = 4x^2$, not $2x^2$.
- Getting the sign of the last term wrong in the second formula: $(a - b)^2$ ends with $+b^2$.
- Trying to factor $a^2 + b^2$ with the third formula.

## Practice

1. Expand $(x - 4)^2$.

<details>
<summary>Solution</summary>

$x^2 - 2 \cdot x \cdot 4 + 4^2 = x^2 - 8x + 16$.

</details>

2. Expand $(2a + 3)^2$.

<details>
<summary>Solution</summary>

$(2a)^2 + 2 \cdot 2a \cdot 3 + 3^2 = 4a^2 + 12a + 9$.

</details>

3. Expand $(5x - 1)(5x + 1)$.

<details>
<summary>Solution</summary>

Third formula: $(5x)^2 - 1^2 = 25x^2 - 1$.

</details>

4. Factor $x^2 + 14x + 49$.

<details>
<summary>Solution</summary>

$x^2$ and $49 = 7^2$ are squares, and $2 \cdot x \cdot 7 = 14x$ matches the middle term. So $x^2 + 14x + 49 = (x + 7)^2$.

</details>

5. Calculate $98 \cdot 102$ in your head.

<details>
<summary>Solution</summary>

$98 \cdot 102 = (100 - 2)(100 + 2) = 10000 - 4 = 9996$.

</details>
