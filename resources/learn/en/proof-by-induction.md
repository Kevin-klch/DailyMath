---
title: Proof by Induction
category: advanced
order: 30
level: 3
summary: How to prove a statement for all natural numbers at once – base case, induction hypothesis and inductive step, with sum formulas, divisibility and inequalities.
related: sets-and-logic, sequences-and-series, divisibility-rules, modular-arithmetic
---

Many statements in mathematics claim something for **every** natural number: "the sum of the first $n$ odd numbers is $n^2$", "$4^n - 1$ is always divisible by 3". Checking a few cases is not enough – there are infinitely many. **Proof by induction** is a method that handles all of them in just two steps, and it is one of the most important proof techniques in mathematics.

## The domino principle

Imagine an infinitely long row of dominoes. To be sure that all of them fall, you need to know two things:

1. The **first** domino falls.
2. **Whenever** a domino falls, it knocks over the next one.

Then the first knocks over the second, the second the third, and so on – every domino falls eventually. Induction works in exactly the same way.

> **Key idea:** To prove a statement $A(n)$ for all natural numbers $n \ge n_0$, show: **(1) base case** – $A(n_0)$ is true; **(2) inductive step** – if $A(n)$ is true for some $n \ge n_0$, then $A(n + 1)$ is true as well.

In the inductive step, the assumption "$A(n)$ is true" is called the **induction hypothesis**. You do not prove it – you use it as a tool to prove $A(n + 1)$. The task is always to find $A(n)$ hidden inside $A(n + 1)$.

## Example 1: a sum formula

Prove that for all $n \ge 1$:

$$1 + 2 + 3 + \dots + n = \frac{n(n + 1)}{2}$$

**Base case** ($n = 1$): the left side is $1$, the right side is $\frac{1 \cdot 2}{2} = 1$. True.

**Induction hypothesis:** for some $n \ge 1$, $1 + 2 + \dots + n = \frac{n(n + 1)}{2}$.

**Inductive step:** we must show $1 + 2 + \dots + n + (n + 1) = \frac{(n + 1)(n + 2)}{2}$. The first $n$ terms are exactly the sum from the hypothesis:

$$1 + 2 + \dots + n + (n + 1) = \frac{n(n + 1)}{2} + (n + 1) = \frac{n(n + 1) + 2(n + 1)}{2} = \frac{(n + 1)(n + 2)}{2}$$

That is exactly the formula for $n + 1$. By induction, the formula holds for all $n \ge 1$.

With sigma notation the statement reads $\sum_{k=1}^{n} k = \frac{n(n + 1)}{2}$. The key move in the step is always the same: split off the last term, $\sum_{k=1}^{n+1} k = \sum_{k=1}^{n} k + (n + 1)$.

## Example 2: divisibility

Prove that $4^n - 1$ is divisible by $3$ for all $n \ge 1$.

**Base case** ($n = 1$): $4^1 - 1 = 3$ is divisible by $3$. True.

**Induction hypothesis:** $4^n - 1 = 3m$ for some integer $m$.

**Inductive step:** rewrite $4^{n+1} - 1$ so that $4^n - 1$ appears:

$$4^{n+1} - 1 = 4 \cdot 4^n - 1 = 4 \cdot (4^n - 1) + 4 - 1 = 4 \cdot 3m + 3 = 3(4m + 1)$$

This is a multiple of $3$, so the statement holds for $n + 1$ as well.

> **Key idea:** In divisibility proofs, add and subtract cleverly so that the expression from the induction hypothesis appears – then both parts are visibly divisible.

## Example 3: an inequality

Prove that $2^n > 2n + 1$ for all $n \ge 3$.

**Base case** ($n = 3$): $2^3 = 8 > 7 = 2 \cdot 3 + 1$. True. (For $n = 2$ it would be false: $4 > 5$ does not hold – that is why we start at $3$.)

**Induction hypothesis:** $2^n > 2n + 1$ for some $n \ge 3$.

**Inductive step:** we must show $2^{n+1} > 2(n + 1) + 1 = 2n + 3$.

$$2^{n+1} = 2 \cdot 2^n > 2(2n + 1) = 4n + 2 = 2n + 3 + (2n - 1) > 2n + 3$$

The last step holds because $2n - 1 > 0$. Done.

In inequality proofs you often need an estimate like this at the end – write down clearly which fact you use.

## Why the base case matters

Leaving out the base case can "prove" false statements. Take the claim "$n^2 + n + 1$ is even". Assume it is true for $n$. Then

$$(n + 1)^2 + (n + 1) + 1 = (n^2 + n + 1) + 2(n + 1)$$

is even plus even, so even – the inductive step works! But for $n = 1$ we get $3$, which is odd. In fact $n^2 + n + 1$ is **never** even. Without a starting domino, nothing falls.

## Common mistakes

- Skipping the base case or only checking it carelessly.
- Assuming what you want to prove: in the step, the goal $A(n + 1)$ is what you must reach, not what you may use.
- Not using the induction hypothesis at all – then it is usually not an induction proof (or something went wrong).
- Errors when replacing $n$ by $n + 1$: for $\frac{n(n + 1)}{2}$ you get $\frac{(n + 1)(n + 2)}{2}$, not $\frac{n(n + 1)}{2} + 1$.
- Choosing the wrong starting value for statements that only hold from some $n_0$ on.

## Practice

1. Prove that $1 + 3 + 5 + \dots + (2n - 1) = n^2$ for all $n \ge 1$.

<details>
<summary>Solution</summary>

Base case $n = 1$: $1 = 1^2$. Step: assume the formula for $n$. Then $1 + 3 + \dots + (2n - 1) + (2n + 1) = n^2 + 2n + 1 = (n + 1)^2$, which is the formula for $n + 1$.

</details>

2. Prove that $2 + 4 + 6 + \dots + 2n = n(n + 1)$ for all $n \ge 1$.

<details>
<summary>Solution</summary>

Base case $n = 1$: $2 = 1 \cdot 2$. Step: $2 + 4 + \dots + 2n + 2(n + 1) = n(n + 1) + 2(n + 1) = (n + 1)(n + 2)$, which is the formula for $n + 1$.

</details>

3. Prove that $6^n - 1$ is divisible by $5$ for all $n \ge 1$.

<details>
<summary>Solution</summary>

Base case: $6 - 1 = 5$. Step: assume $6^n - 1 = 5m$. Then $6^{n+1} - 1 = 6(6^n - 1) + 6 - 1 = 6 \cdot 5m + 5 = 5(6m + 1)$, a multiple of $5$.

</details>

4. Prove that $1^2 + 2^2 + \dots + n^2 = \frac{n(n + 1)(2n + 1)}{6}$ for all $n \ge 1$.

<details>
<summary>Solution</summary>

Base case: $1 = \frac{1 \cdot 2 \cdot 3}{6}$. Step: $\frac{n(n + 1)(2n + 1)}{6} + (n + 1)^2 = \frac{(n + 1)\big(n(2n + 1) + 6(n + 1)\big)}{6} = \frac{(n + 1)(2n^2 + 7n + 6)}{6}$. Since $2n^2 + 7n + 6 = (n + 2)(2n + 3)$, this equals $\frac{(n + 1)(n + 2)(2(n + 1) + 1)}{6}$ – the formula for $n + 1$.

</details>

5. Someone "proves" that $5^n + 1$ is divisible by $4$: if $5^n + 1 = 4m$, then $5^{n+1} + 1 = 5(5^n + 1) - 4 = 20m - 4 = 4(5m - 1)$. What is wrong?

<details>
<summary>Solution</summary>

The inductive step is correct, but the base case fails: $5^1 + 1 = 6$ is not divisible by $4$. In fact $5^n + 1$ always leaves remainder $2$ when divided by $4$, so the statement is false.

</details>
