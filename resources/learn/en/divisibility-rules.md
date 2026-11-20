---
title: Divisibility Rules
category: arithmetic
order: 50
level: 1
summary: Quick tests that tell you whether a number is divisible by 2, 3, 4, 5, 6, 8, 9, 10 or 11 – without doing the division.
related: prime-numbers, gcd-and-lcm, fractions-basics, modular-arithmetic
---

Is 7,416 divisible by 3? You could do the long division – or you could add up the digits and know the answer in two seconds. **Divisibility rules** are shortcuts that tell you whether one whole number divides another without a remainder. They are essential for simplifying fractions, finding prime factors and doing mental math.

## What "divisible" means

A whole number $a$ is **divisible** by $b$ if $a : b$ leaves no remainder, i.e. if $a = b \cdot k$ for some whole number $k$. We then say $b$ is a **divisor** (or factor) of $a$, and $a$ is a **multiple** of $b$. A common notation is $b \mid a$, read "$b$ divides $a$".

- $3 \mid 12$, because $12 = 3 \cdot 4$.
- $5 \nmid 12$, because $12 : 5 = 2$ remainder $2$.

## Rules based on the last digits

These rules work because $10$, $100$ and $1000$ are themselves divisible by certain numbers, so only the end of the number matters.

- **By 2:** the last digit is even ($0, 2, 4, 6, 8$).
- **By 5:** the last digit is $0$ or $5$.
- **By 10:** the last digit is $0$.
- **By 4:** the number formed by the last **two** digits is divisible by 4.
- **By 8:** the number formed by the last **three** digits is divisible by 8.

Why does the rule for 4 work? Every number can be split as "hundreds part + last two digits", for example $7316 = 7300 + 16$. Since $100 = 4 \cdot 25$, the hundreds part is always divisible by 4. So only the last two digits decide. For 8 the same idea uses $1000 = 8 \cdot 125$.

### Example 1

Is $5\,732$ divisible by 4? The last two digits form $32 = 4 \cdot 8$. Yes.

Is $91\,250$ divisible by 8? The last three digits form $250$, and $250 : 8 = 31$ remainder $2$. No.

## Rules based on the digit sum

The **digit sum** of a number is the sum of its digits. For $7416$ it is $7 + 4 + 1 + 6 = 18$.

- **By 3:** the digit sum is divisible by 3.
- **By 9:** the digit sum is divisible by 9.

> **Key idea:** A number is divisible by 3 (or 9) exactly when its digit sum is divisible by 3 (or 9). If the digit sum is still large, you can take the digit sum again.

### Why the digit sum works

Each power of ten is one more than a multiple of 9: $10 = 9 + 1$, $100 = 99 + 1$, $1000 = 999 + 1$. So

$$7416 = 7 \cdot 1000 + 4 \cdot 100 + 1 \cdot 10 + 6 = 7 \cdot 999 + 4 \cdot 99 + 1 \cdot 9 + (7 + 4 + 1 + 6)$$

Everything except the bracket is a multiple of 9 (and therefore also of 3). So $7416$ leaves the same remainder as its digit sum $18$. Since $18$ is divisible by both 9 and 3, so is $7416$.

## Combined rules

If a number is divisible by two numbers that share no common factor, it is divisible by their product.

- **By 6:** divisible by 2 **and** by 3.
- **By 12:** divisible by 3 **and** by 4.
- **By 15:** divisible by 3 **and** by 5.

Careful: "divisible by 2 and by 4" does **not** mean divisible by 8 – for example $4$ itself. The two numbers must not share a factor.

## The rule for 11

Form the **alternating digit sum**: starting from the last digit, alternately add and subtract the digits. If the result is divisible by 11 (including $0$), so is the number.

### Example 2

$8\,294$: alternating sum from the right is $4 - 9 + 2 - 8 = -11$. Since $-11$ is divisible by 11, so is $8294$. Check: $8294 = 11 \cdot 754$.

## Overview

| Divisor | Test |
|---|---|
| 2 | last digit even |
| 3 | digit sum divisible by 3 |
| 4 | last two digits divisible by 4 |
| 5 | last digit 0 or 5 |
| 6 | divisible by 2 and 3 |
| 8 | last three digits divisible by 8 |
| 9 | digit sum divisible by 9 |
| 10 | last digit 0 |
| 11 | alternating digit sum divisible by 11 |

There is no handy rule for 7 – for 7 it is usually fastest to divide.

### Example 3: checking many divisors at once

Which of the numbers 2, 3, 4, 5, 6, 9 divide $1\,620$?

- Last digit $0$: divisible by 2 and 5 (and 10).
- Last two digits $20 = 4 \cdot 5$: divisible by 4.
- Digit sum $1 + 6 + 2 + 0 = 9$: divisible by 3 and 9.
- Divisible by 2 and 3, so also by 6.

All six numbers divide $1620$.

> **Key idea:** For a composite divisor, split it into factors without a common divisor and check each one: $6 = 2 \cdot 3$, $12 = 3 \cdot 4$, $18 = 2 \cdot 9$.

## Common mistakes

- Using the digit sum for 4 or 8. The digit sum only works for 3 and 9.
- Checking only the last digit for 4: $34$ ends in an even digit but is not divisible by 4.
- Combining factors that overlap: divisible by 2 and 4 does not imply divisible by 8.
- Starting the alternating sum carelessly – any consistent start works, but you must alternate strictly.
- Forgetting that $0$ is divisible by every number other than zero.

## Practice

1. Is $43\,218$ divisible by 3? By 9? By 6?

<details>
<summary>Solution</summary>

Digit sum: $4 + 3 + 2 + 1 + 8 = 18$. Divisible by 3 and by 9. The last digit $8$ is even, so it is divisible by 2, and therefore also by 6.

</details>

2. Is $7\,124$ divisible by 4? Is $3\,016$ divisible by 8?

<details>
<summary>Solution</summary>

$7124$: the last two digits are $24 = 4 \cdot 6$, so yes. $3016$: the last three digits are $016 = 16 = 8 \cdot 2$, so yes.

</details>

3. Find the missing digit so that $52\square 4$ is divisible by 9.

<details>
<summary>Solution</summary>

Digit sum without the missing digit: $5 + 2 + 4 = 11$. The next multiple of 9 is $18$, so the missing digit is $7$. The number is $5274 = 9 \cdot 586$.

</details>

4. Is $9\,163$ divisible by 11?

<details>
<summary>Solution</summary>

Alternating sum from the right: $3 - 6 + 1 - 9 = -11$. Divisible by 11, so yes: $9163 = 11 \cdot 833$.

</details>

5. Is $2\,340$ divisible by 12?

<details>
<summary>Solution</summary>

$12 = 3 \cdot 4$. Digit sum $2 + 3 + 4 + 0 = 9$, so divisible by 3. Last two digits $40 = 4 \cdot 10$, so divisible by 4. Therefore yes: $2340 = 12 \cdot 195$.

</details>
