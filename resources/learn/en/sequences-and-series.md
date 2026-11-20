---
title: Sequences and Series
category: calculus
order: 10
level: 2
summary: Lists of numbers that follow a rule – arithmetic and geometric sequences, sum formulas and why an infinite sum can still be finite.
related: limits, proof-by-induction, exponential-functions, percentage-change
---

A **sequence** is an ordered list of numbers that follows a rule, such as $2, 4, 6, 8, \ldots$ A **series** is what you get when you add up the terms of a sequence. Sequences describe things that happen step by step – savings growing year by year, a bouncing ball losing height – and they are the starting point for limits and calculus.

## What is a sequence?

The terms of a sequence are written $a_1, a_2, a_3, \ldots$ The small number $n$ in $a_n$ is the **index** – it tells you the position of the term. There are two common ways to describe a sequence:

- **Explicit formula:** $a_n$ is given directly in terms of $n$, for example $a_n = n^2$. You can jump straight to any term: $a_{10} = 100$.
- **Recursive formula:** each term is built from the previous one, for example $a_1 = 3$ and $a_{n+1} = a_n + 5$. To find $a_{10}$, you have to work through the terms one by one.

A sequence is **increasing** if every term is at least as large as the one before ($a_{n+1} \ge a_n$) and **decreasing** if $a_{n+1} \le a_n$. It is **bounded** if all its terms stay between two fixed numbers.

## Arithmetic sequences

In an **arithmetic sequence**, the difference between consecutive terms is always the same number $d$, the **common difference**:

$$3, \; 7, \; 11, \; 15, \; \ldots \qquad (d = 4)$$

To reach $a_n$ from $a_1$, you add $d$ exactly $n - 1$ times.

> **Key idea:** Arithmetic sequence: $a_n = a_1 + (n-1) \cdot d$. Geometric sequence: $a_n = a_1 \cdot q^{n-1}$.

### Example 1

Find the 20th term of $3, 7, 11, 15, \ldots$

Here $a_1 = 3$ and $d = 4$, so $a_n = 3 + (n-1) \cdot 4 = 4n - 1$. Therefore $a_{20} = 4 \cdot 20 - 1 = 79$.

## Geometric sequences

In a **geometric sequence**, each term is the previous one multiplied by the same factor $q$, the **common ratio**:

$$2, \; 6, \; 18, \; 54, \; \ldots \qquad (q = 3)$$

If $q > 1$ (and $a_1 > 0$), the terms grow quickly – this is exponential growth. If $0 < q < 1$, they shrink towards zero. A negative $q$ makes the signs alternate.

### Example 2

Find a formula for $2, 6, 18, 54, \ldots$ and compute $a_6$.

$a_1 = 2$, $q = \frac{6}{2} = 3$, so $a_n = 2 \cdot 3^{n-1}$ and $a_6 = 2 \cdot 3^5 = 2 \cdot 243 = 486$.

## Series: adding up the terms

The sum of the first $n$ terms is called the **partial sum** $s_n$. With sigma notation:

$$s_n = a_1 + a_2 + \ldots + a_n = \sum_{k=1}^{n} a_k$$

### The arithmetic sum

The young Carl Friedrich Gauss is said to have added $1 + 2 + \ldots + 100$ in seconds: pair the first and last term ($1 + 100$), the second and second-to-last ($2 + 99$), and so on. Each pair gives $101$, and there are $50$ pairs, so the sum is $5050$. The same trick works for every arithmetic sequence:

$$s_n = \frac{n \cdot (a_1 + a_n)}{2}$$

For Example 1, the sum of the first 20 terms is $\frac{20 \cdot (3 + 79)}{2} = 820$.

### The geometric sum

For a geometric sequence with $q \ne 1$:

$$s_n = a_1 \cdot \frac{q^n - 1}{q - 1}$$

For Example 2, the first five terms add up to $2 \cdot \frac{3^5 - 1}{3 - 1} = 2 \cdot \frac{242}{2} = 242$. Check: $2 + 6 + 18 + 54 + 162 = 242$.

## Infinite geometric series

Can you add infinitely many numbers and get a finite result? Yes – if the terms shrink fast enough. For $|q| < 1$, the power $q^n$ goes to $0$ as $n$ grows, and the geometric sum formula turns into:

> **Key idea:** For $|q| < 1$ the infinite geometric series converges: $a_1 + a_1 q + a_1 q^2 + \ldots = \dfrac{a_1}{1 - q}$. For $|q| \ge 1$ it has no finite sum.

### Example 3

$$1 + \frac{1}{2} + \frac{1}{4} + \frac{1}{8} + \ldots = \frac{1}{1 - \frac{1}{2}} = 2$$

Picture it: walk half the way to a wall, then half of the remaining distance, and so on. You never pass the wall – the total distance is exactly the full length.

This also explains why $0.999\ldots = 1$: it is the series $0.9 + 0.09 + 0.009 + \ldots$ with $a_1 = 0.9$ and $q = 0.1$, so its sum is $\frac{0.9}{0.9} = 1$.

## Common mistakes

- Using $a_1 + n \cdot d$ instead of $a_1 + (n-1) \cdot d$ – the first term needs zero steps.
- Mixing up arithmetic and geometric: check whether the terms *differ* by a constant or are *multiplied* by a constant.
- Applying $\frac{a_1}{1-q}$ when $|q| \ge 1$. Then the series has no finite sum.
- Confusing the sequence (the list of terms) with the series (the sum of the terms).

## Practice

1. An arithmetic sequence has $a_1 = 5$ and $d = -3$. Find $a_{10}$.

<details>
<summary>Solution</summary>

$a_{10} = 5 + 9 \cdot (-3) = 5 - 27 = -22$.

</details>

2. Calculate $1 + 2 + 3 + \ldots + 50$.

<details>
<summary>Solution</summary>

Arithmetic sum with $n = 50$, $a_1 = 1$, $a_{50} = 50$: $s_{50} = \frac{50 \cdot 51}{2} = 1275$.

</details>

3. For the geometric sequence $3, 6, 12, \ldots$ find $a_8$ and the sum of the first 8 terms.

<details>
<summary>Solution</summary>

$q = 2$, so $a_8 = 3 \cdot 2^7 = 384$. The sum is $s_8 = 3 \cdot \frac{2^8 - 1}{2 - 1} = 3 \cdot 255 = 765$.

</details>

4. Find the value of $12 + 4 + \frac{4}{3} + \frac{4}{9} + \ldots$

<details>
<summary>Solution</summary>

Geometric with $a_1 = 12$ and $q = \frac{1}{3}$. Since $|q| < 1$, the sum is $\frac{12}{1 - \frac{1}{3}} = \frac{12}{\frac{2}{3}} = 18$.

</details>

5. A sequence is defined by $a_1 = 1$ and $a_{n+1} = 2a_n + 1$. Write down the first five terms and guess an explicit formula.

<details>
<summary>Solution</summary>

$1, 3, 7, 15, 31$. Each term is one less than a power of two, so $a_n = 2^n - 1$.

</details>
