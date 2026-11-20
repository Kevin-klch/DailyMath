---
title: Number Sets
category: arithmetic
order: 10
level: 1
summary: Natural numbers, integers, rationals, reals – how the main number sets are built and how they fit inside one another.
related: negative-numbers, decimals, powers-and-roots, sets-and-logic
---

Not all numbers are the same kind of number. Counting gives you $1, 2, 3, \dots$, debts need negative numbers, sharing a pizza needs fractions, and the diagonal of a square needs something even stranger. Mathematicians group numbers into **number sets**, each one extending the previous so that more calculations become possible.

## The natural numbers $\mathbb{N}$

The **natural numbers** are the counting numbers:

$$\mathbb{N} = \{1, 2, 3, 4, \dots\}$$

Whether $0$ belongs to $\mathbb{N}$ depends on the textbook. Many authors write $\mathbb{N}_0 = \{0, 1, 2, 3, \dots\}$ when they want to include zero explicitly.

Adding or multiplying two natural numbers always gives a natural number again – we say $\mathbb{N}$ is **closed** under addition and multiplication. Subtraction is a problem, though: $3 - 5$ has no answer inside $\mathbb{N}$.

## The integers $\mathbb{Z}$

To make every subtraction possible, we add the negative whole numbers. The result is the set of **integers**:

$$\mathbb{Z} = \{\dots, -3, -2, -1, 0, 1, 2, 3, \dots\}$$

The letter $\mathbb{Z}$ comes from the German word *Zahlen* ("numbers"). Now $3 - 5 = -2$ works. But division still fails: $7 : 2$ is not an integer.

## The rational numbers $\mathbb{Q}$

A **rational number** is any number that can be written as a fraction of two integers:

$$\mathbb{Q} = \left\{ \frac{p}{q} \;\middle|\; p, q \in \mathbb{Z},\ q \neq 0 \right\}$$

The $\mathbb{Q}$ stands for *quotient*. Every integer is rational, because $5 = \frac{5}{1}$. In $\mathbb{Q}$ you can add, subtract, multiply and divide (except by zero) without ever leaving the set.

As decimals, rational numbers are exactly those that either **terminate** or **repeat**:

- $\frac{3}{4} = 0.75$ (terminating)
- $\frac{1}{3} = 0.333\dots = 0.\overline{3}$ (repeating)
- $\frac{5}{11} = 0.\overline{45}$ (repeating block of two digits)

## The irrational numbers

Some numbers cannot be written as a fraction at all. Their decimal expansion goes on forever **without** a repeating pattern. These are the **irrational numbers**. Famous examples:

- $\sqrt{2} = 1.41421356\dots$ – the diagonal of a square with side 1
- $\pi = 3.14159265\dots$ – the ratio of a circle's circumference to its diameter
- $e = 2.71828182\dots$ – Euler's number

The square root of a natural number is either a whole number (like $\sqrt{49} = 7$) or irrational (like $\sqrt{5}$) – there is nothing in between.

## The real numbers $\mathbb{R}$

Rational and irrational numbers together form the **real numbers** $\mathbb{R}$. They fill the number line completely: every point on the line corresponds to exactly one real number, and every real number has its point.

> **Key idea:** The sets are nested inside one another: $\mathbb{N} \subset \mathbb{Z} \subset \mathbb{Q} \subset \mathbb{R}$. Each new set was created so that an operation that failed before becomes possible.

You can picture this as a set of boxes, one inside the other: every natural number is also an integer, every integer is also rational, and every rational number is also real. The irrational numbers are the part of $\mathbb{R}$ that lies outside $\mathbb{Q}$, written $\mathbb{R} \setminus \mathbb{Q}$.

## Notation

- $a \in \mathbb{Z}$ means "$a$ is an element of $\mathbb{Z}$", e.g. $-4 \in \mathbb{Z}$.
- $a \notin \mathbb{N}$ means "$a$ is not an element of $\mathbb{N}$", e.g. $-4 \notin \mathbb{N}$.
- $\mathbb{Z}^+$ or $\mathbb{R}^+$ often denote only the positive elements.

## Worked examples

### Example 1: classify numbers

Find the smallest number set that contains each number.

| Number | Smallest set | Reason |
|---|---|---|
| $12$ | $\mathbb{N}$ | counting number |
| $-7$ | $\mathbb{Z}$ | negative whole number |
| $0.25$ | $\mathbb{Q}$ | equals $\frac{1}{4}$ |
| $\sqrt{36}$ | $\mathbb{N}$ | equals $6$ |
| $\sqrt{10}$ | irrational, so $\mathbb{R}$ | $10$ is not a perfect square |
| $-\frac{8}{2}$ | $\mathbb{Z}$ | equals $-4$ |

Always simplify first – $\sqrt{36}$ and $-\frac{8}{2}$ look complicated but are whole numbers.

### Example 2: turning a repeating decimal into a fraction

Show that $0.\overline{7}$ is rational. Let $x = 0.777\dots$. Then

$$10x = 7.777\dots$$

Subtracting the first equation from the second gets rid of the endless tail:

$$10x - x = 7 \quad\Rightarrow\quad 9x = 7 \quad\Rightarrow\quad x = \frac{7}{9}$$

So $0.\overline{7} = \frac{7}{9} \in \mathbb{Q}$.

### Example 3: which operations stay inside?

Is $\mathbb{Z}$ closed under division? No: $1 : 2 = 0.5$, and $0.5 \notin \mathbb{Z}$. One counterexample is enough to show that a set is *not* closed.

> **Key idea:** A decimal that terminates or repeats is rational. A decimal that never ends and never repeats is irrational.

## Common mistakes

- Thinking that $\sqrt{16}$ is irrational because it has a root sign – it is just $4$.
- Believing that $\pi = 3.14$ or $\pi = \frac{22}{7}$ exactly. These are only approximations; $\pi$ is irrational.
- Forgetting that integers are also rational numbers (and natural numbers are also integers).
- Assuming a long decimal must be irrational – $\frac{1}{7} = 0.\overline{142857}$ is long but repeating, so it is rational.
- Treating $0$ as negative. Zero is neither positive nor negative.

## Practice

1. Which of these numbers are integers: $-3$, $\frac{1}{2}$, $0$, $\sqrt{25}$, $2.5$?

<details>
<summary>Solution</summary>

$-3$, $0$ and $\sqrt{25} = 5$ are integers. $\frac{1}{2}$ and $2.5$ are rational, but not integers.

</details>

2. Decide whether each number is rational or irrational: $\sqrt{3}$, $0.\overline{12}$, $\frac{22}{7}$, $\pi$.

<details>
<summary>Solution</summary>

$\sqrt{3}$ is irrational ($3$ is not a perfect square). $0.\overline{12}$ is rational (it repeats). $\frac{22}{7}$ is rational (it is a fraction of integers). $\pi$ is irrational.

</details>

3. Write $0.\overline{4}$ as a fraction.

<details>
<summary>Solution</summary>

Let $x = 0.444\dots$. Then $10x = 4.444\dots$, so $10x - x = 4$, which gives $9x = 4$ and $x = \frac{4}{9}$.

</details>

4. Give a counterexample showing that $\mathbb{N}$ is not closed under subtraction.

<details>
<summary>Solution</summary>

For example $2 - 5 = -3$. Both $2$ and $5$ are natural numbers, but $-3 \notin \mathbb{N}$.

</details>

5. True or false: every real number is rational.

<details>
<summary>Solution</summary>

False. For example $\sqrt{2}$ is real but cannot be written as a fraction of integers, so it is irrational.

</details>
