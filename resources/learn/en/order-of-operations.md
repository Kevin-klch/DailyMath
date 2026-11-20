---
title: Order of Operations
category: arithmetic
order: 30
level: 1
summary: Why 2 + 3 · 4 is 14 and not 20 – the rules that decide which calculation comes first.
related: negative-numbers, powers-and-roots, variables-and-terms
---

When an expression contains several operations, the result depends on the order in which you carry them out. So that everyone gets the same answer, mathematics uses a fixed agreement: the **order of operations**.

## Why we need a rule

Look at this expression:

$$2 + 3 \cdot 4$$

If you simply work from left to right, you get $5 \cdot 4 = 20$. If you multiply first, you get $2 + 12 = 14$. Both cannot be right – so we need a convention. The agreed answer is **14**.

## The order

Work through an expression in these steps:

1. **Parentheses** – everything inside brackets first, starting with the innermost pair.
2. **Powers and roots** – for example $3^2$ or $\sqrt{16}$.
3. **Multiplication and division** – from left to right.
4. **Addition and subtraction** – from left to right.

> **Key idea:** Parentheses before powers, powers before multiplication and division, and those before addition and subtraction. Operations of the same rank are done from left to right.

Many people remember this with an acronym such as **PEMDAS** (Parentheses, Exponents, Multiplication/Division, Addition/Subtraction) or **BODMAS**. Careful: multiplication does *not* come before division – they share a level, and so do addition and subtraction.

## Left to right for equal ranks

The left-to-right rule really matters:

$$12 : 3 \cdot 2 = 4 \cdot 2 = 8$$

If you multiplied first, you would wrongly get $12 : 6 = 2$. The same applies to subtraction:

$$10 - 4 + 3 = 6 + 3 = 9 \qquad \text{not} \qquad 10 - 7 = 3$$

## Worked examples

### Example 1

$$18 - 4 \cdot 3 + 12 : 4$$

Multiplication and division first: $4 \cdot 3 = 12$ and $12 : 4 = 3$. What remains is

$$18 - 12 + 3 = 9$$

### Example 2

$$7 + 3 \cdot (8 - 5)^2$$

1. Parentheses: $8 - 5 = 3$
2. Power: $3^2 = 9$
3. Multiplication: $3 \cdot 9 = 27$
4. Addition: $7 + 27 = 34$

### Example 3: nested parentheses

$$2 \cdot \big(10 - (3 + 1) \cdot 2\big)$$

Start with the innermost brackets: $3 + 1 = 4$. Inside the outer brackets, multiplication comes first: $10 - 4 \cdot 2 = 10 - 8 = 2$. Finally $2 \cdot 2 = 4$.

## Powers and negative numbers

A power only applies to what is directly in front of it:

$$-3^2 = -(3^2) = -9 \qquad \text{but} \qquad (-3)^2 = 9$$

If you want to square a negative number, it has to be in parentheses.

## Common mistakes

- Calculating strictly from left to right, ignoring multiplication before addition.
- Treating "multiplication before division" as a rule – they have the same rank.
- Forgetting that a fraction bar acts like parentheses: in $\frac{6 + 2}{4}$ you add first, then divide.
- Mixing up $-3^2$ and $(-3)^2$.

## Practice

1. Calculate $5 + 2 \cdot 6$.

<details>
<summary>Solution</summary>

Multiplication first: $2 \cdot 6 = 12$, then $5 + 12 = 17$.

</details>

2. Calculate $20 - 12 : 4 \cdot 2$.

<details>
<summary>Solution</summary>

Division and multiplication from left to right: $12 : 4 = 3$, then $3 \cdot 2 = 6$. Finally $20 - 6 = 14$.

</details>

3. Calculate $(4 + 2)^2 - 3 \cdot 5$.

<details>
<summary>Solution</summary>

Parentheses: $6$. Power: $6^2 = 36$. Multiplication: $3 \cdot 5 = 15$. Result: $36 - 15 = 21$.

</details>

4. Calculate $-2^4 + (-2)^4$.

<details>
<summary>Solution</summary>

$-2^4 = -16$ and $(-2)^4 = 16$, so the sum is $0$.

</details>
