---
title: Variables and Terms
category: algebra
order: 10
level: 1
summary: What letters like x mean in math, how to evaluate expressions, and how to simplify them by combining like terms.
related: order-of-operations, expanding-and-factoring, linear-equations
---

Algebra starts with a simple idea: instead of a specific number, you write a letter that stands for *some* number. This lets you describe rules that work for every number at once, write down formulas, and set up equations for quantities you don't know yet. Before you can solve equations, you need to be comfortable reading, evaluating and simplifying such expressions.

## Variables

A **variable** is a placeholder – usually a letter such as $x$, $y$, $a$ or $n$ – for a number. The perimeter of a square with side length $s$ is $4s$, no matter how long the side is. If $s = 3$, the perimeter is $12$; if $s = 10$, it is $40$.

A few writing conventions:

- A multiplication dot between a number and a variable is usually left out: $3 \cdot x$ is written $3x$, and $a \cdot b$ is written $ab$.
- The number in front of a variable is called its **coefficient**. In $5x^2$ the coefficient is $5$.
- $x$ means $1x$, and $-x$ means $-1x$.
- $x \cdot x = x^2$ and $x \cdot x \cdot x = x^3$.

## Terms and expressions

An **expression** is any meaningful combination of numbers, variables, operations and parentheses, for example $3x + 7$ or $2(a - b)^2$. The parts that are added or subtracted are called **terms**. The expression

$$4x^2 - 3x + 7$$

has three terms: $4x^2$, $-3x$ and $7$. A term without a variable, like $7$, is a **constant**. Notice that the sign in front belongs to the term.

## Evaluating an expression

To **evaluate** an expression, replace every variable by its value and calculate – always following the order of operations. Put negative numbers in parentheses when you substitute them.

### Example 1

Evaluate $3x^2 - 2x + 5$ for $x = -2$.

$$3 \cdot (-2)^2 - 2 \cdot (-2) + 5 = 3 \cdot 4 + 4 + 5 = 21$$

The power comes first: $(-2)^2 = 4$. Without the parentheses you would compute $-2^2 = -4$ and get a wrong result.

### Example 2

Evaluate $2a - 3b$ for $a = 4$ and $b = 5$: $2 \cdot 4 - 3 \cdot 5 = 8 - 15 = -7$.

## Like terms

Two terms are **like terms** if they have exactly the same variable part – the same letters with the same exponents. Only the coefficients may differ.

- $3x$ and $-7x$ are like terms.
- $2a^2b$ and $5a^2b$ are like terms.
- $4x$ and $4x^2$ are **not** like terms.
- $3ab$ and $3a$ are **not** like terms.

> **Key idea:** You may only add or subtract like terms. To do it, add or subtract the coefficients and keep the variable part unchanged: $5x + 3x = 8x$.

The reason is the distributive law: $5x + 3x = (5 + 3)x = 8x$. It is just like counting objects – 5 apples plus 3 apples are 8 apples, but 5 apples plus 3 pears stay "5 apples + 3 pears".

### Example 3

Simplify $4x + 3y - x + 5 + 2y - 8$.

Group like terms:

$$(4x - x) + (3y + 2y) + (5 - 8) = 3x + 5y - 3$$

### Example 4

Simplify $2a^2 + 3a - 5a^2 + a$.

$$(2a^2 - 5a^2) + (3a + a) = -3a^2 + 4a$$

## Multiplying terms

Multiplying is different from adding: here the variables do *not* have to match. Multiply the coefficients and multiply the variables, collecting equal letters as powers:

$$3x \cdot 4y = 12xy \qquad 2a \cdot 5a = 10a^2 \qquad (-2x^2) \cdot 3x = -6x^3$$

> **Key idea:** Adding needs like terms; multiplying works with any terms. $2x + 3x = 5x$, but $2x \cdot 3x = 6x^2$.

## Translating words into expressions

Many problems start in words. Some typical translations:

- "a number increased by 5" → $x + 5$
- "three times a number" → $3x$
- "twice a number, decreased by 4" → $2x - 4$
- "the sum of a number and 4, doubled" → $2(x + 4)$
- "the square of a number" → $x^2$

Watch the parentheses: "twice the sum" is not the same as "twice the number plus something".

## Common mistakes

- Combining unlike terms: $3x + 2y$ is **not** $5xy$, and $x + x^2$ is **not** $x^3$ or $2x^2$.
- Forgetting the sign belongs to the term: in $5 - 3x + 2x$ the result is $5 - x$, not $5 - 5x$.
- Substituting negative numbers without parentheses, e.g. writing $-3^2$ instead of $(-3)^2$.
- Confusing $2x$ (two times $x$) with $x^2$ ($x$ times $x$).
- Treating $x$ as if it had no coefficient: $x + x = 2x$, not $x^2$.

## Practice

1. Evaluate $5x - 2x^2$ for $x = 3$.

<details>
<summary>Solution</summary>

$5 \cdot 3 - 2 \cdot 3^2 = 15 - 2 \cdot 9 = 15 - 18 = -3$.

</details>

2. Simplify $7a - 2b + 3a + 6b - a$.

<details>
<summary>Solution</summary>

$a$-terms: $7a + 3a - a = 9a$. $b$-terms: $-2b + 6b = 4b$. Result: $9a + 4b$.

</details>

3. Simplify $3x^2 + 2x - x^2 + 4 - 5x$.

<details>
<summary>Solution</summary>

$(3x^2 - x^2) + (2x - 5x) + 4 = 2x^2 - 3x + 4$.

</details>

4. Multiply $(-4a) \cdot 3ab$.

<details>
<summary>Solution</summary>

Coefficients: $(-4) \cdot 3 = -12$. Variables: $a \cdot ab = a^2b$. Result: $-12a^2b$.

</details>

5. Write as an expression and simplify: "a number, plus three times the same number, minus 7".

<details>
<summary>Solution</summary>

$x + 3x - 7 = 4x - 7$.

</details>
