---
title: Modular Arithmetic
category: advanced
order: 40
level: 3
summary: Calculating with remainders – congruences, the rules for adding, multiplying and taking powers modulo n, last digits, weekdays, divisibility rules and modular inverses.
related: divisibility-rules, prime-numbers, gcd-and-lcm, proof-by-induction
---

If it is 9 o'clock now, what time will it be in 100 hours? You do not need to count – only the **remainder** after dividing by 12 matters. **Modular arithmetic** is the mathematics of such remainders: numbers "wrap around" after reaching a fixed value, the **modulus**. It explains divisibility rules, lets you find the last digit of gigantic powers, and is the foundation of modern cryptography and of check digits on barcodes and IBANs.

## Division with remainder

For an integer $a$ and a natural number $n \ge 2$ there are unique integers $q$ and $r$ with

$$a = q \cdot n + r \qquad \text{and} \qquad 0 \le r < n$$

The number $r$ is the remainder, written $r = a \bmod n$. For example $47 = 9 \cdot 5 + 2$, so $47 \bmod 5 = 2$.

Careful with negative numbers: the remainder must not be negative. Since $-7 = (-2) \cdot 5 + 3$, we have $-7 \bmod 5 = 3$, not $-2$.

## Congruence

> **Key idea:** $a \equiv b \pmod{n}$ ("$a$ is congruent to $b$ modulo $n$") means that $a$ and $b$ leave the same remainder when divided by $n$ – equivalently, that $n$ divides the difference $a - b$.

Examples:

- $17 \equiv 5 \pmod{12}$, since $17 - 5 = 12$. (17:00 is 5 o'clock.)
- $38 \equiv 2 \pmod{9}$, since $38 - 2 = 36 = 4 \cdot 9$.
- $-1 \equiv 6 \pmod{7}$, since $-1 - 6 = -7$.
- $a \equiv 0 \pmod{n}$ simply means "$n$ divides $a$".

Modulo $n$, every integer is congruent to exactly one of the numbers $0, 1, \dots, n - 1$. You can think of these $n$ remainders as the hours on a clock with $n$ positions.

## Calculating with congruences

The great advantage: you can replace any number by its remainder **before** calculating.

> **Key idea:** If $a \equiv a'$ and $b \equiv b' \pmod{n}$, then $a + b \equiv a' + b'$, $a - b \equiv a' - b'$, $a \cdot b \equiv a' \cdot b'$ and $a^k \equiv a'^k \pmod{n}$.

Why does this work for multiplication? Write $a = a' + sn$ and $b = b' + tn$. Then $ab = a'b' + (a't + b's + stn) \cdot n$, which differs from $a'b'$ by a multiple of $n$.

### Example 1: clock and calendar

It is 9 o'clock. In 100 hours: $9 + 100 = 109 = 9 \cdot 12 + 1$, so it will be 1 o'clock.

Today is Friday. In 100 days: $100 = 14 \cdot 7 + 2$, so it is Friday plus 2 days – a Sunday.

### Example 2: a product

What remainder does $38 \cdot 47$ leave when divided by $9$? Instead of multiplying out, reduce first: $38 \equiv 2$ and $47 \equiv 2 \pmod{9}$, so

$$38 \cdot 47 \equiv 2 \cdot 2 = 4 \pmod{9}$$

Check: $38 \cdot 47 = 1786 = 198 \cdot 9 + 4$.

## Large powers

To handle a power, look for a power that is congruent to $1$ (or another simple number), then use the laws of exponents.

### Example 3: the last digit

The last digit of a number is its remainder modulo $10$. What is the last digit of $7^{100}$?

$$7^1 \equiv 7, \quad 7^2 = 49 \equiv 9, \quad 7^3 \equiv 9 \cdot 7 = 63 \equiv 3, \quad 7^4 \equiv 3 \cdot 7 = 21 \equiv 1 \pmod{10}$$

The last digits repeat with period 4. Since $100 = 4 \cdot 25$:

$$7^{100} = (7^4)^{25} \equiv 1^{25} = 1 \pmod{10}$$

The last digit is $1$.

### Example 4

$2^{50} \bmod 7$: since $2^3 = 8 \equiv 1 \pmod{7}$ and $50 = 3 \cdot 16 + 2$,

$$2^{50} = (2^3)^{16} \cdot 2^2 \equiv 1 \cdot 4 = 4 \pmod{7}$$

## Divisibility rules explained

Because $10 \equiv 1 \pmod{9}$, every power $10^k \equiv 1 \pmod{9}$. A number like $4725 = 4 \cdot 10^3 + 7 \cdot 10^2 + 2 \cdot 10 + 5$ is therefore congruent to $4 + 7 + 2 + 5 = 18$ modulo $9$. A number and its digit sum leave the same remainder modulo $9$ (and modulo $3$) – this is exactly why the digit-sum rules work. Here $18$ is divisible by $9$, so $4725$ is too.

## Division and inverses

Dividing is the one operation that does not transfer directly. Instead, you multiply by an **inverse**: a number $a^{-1}$ with $a \cdot a^{-1} \equiv 1 \pmod{n}$. Such an inverse exists exactly when $\gcd(a, n) = 1$. For example, $2$ has no inverse modulo $6$, since $2x$ is always even and can never leave remainder $1$ when divided by $6$.

### Example 5: a linear congruence

Solve $3x \equiv 4 \pmod{7}$.

1. Find the inverse of $3$ modulo $7$: $3 \cdot 5 = 15 = 2 \cdot 7 + 1$, so $3^{-1} \equiv 5$.
2. Multiply both sides by $5$: $x \equiv 4 \cdot 5 = 20 \equiv 6 \pmod{7}$.

Check: $3 \cdot 6 = 18 = 2 \cdot 7 + 4$. All solutions are $x = 6 + 7k$ with integer $k$.

## Common mistakes

- Giving negative remainders: $-13 \bmod 4$ is $3$, not $-1$.
- Reducing an exponent modulo $n$: $7^{12} \bmod 10$ is **not** $7^2 \bmod 10$ – exponents follow the cycle of the powers, not the modulus.
- Dividing both sides of a congruence by a number that is not coprime to the modulus: $2 \cdot 3 \equiv 2 \cdot 0 \pmod{6}$, but $3 \not\equiv 0 \pmod{6}$.
- Confusing $\equiv$ with $=$: $17 \equiv 5 \pmod{12}$, but of course $17 \neq 5$.

## Practice

1. Calculate $47 \bmod 5$ and $-13 \bmod 4$.

<details>
<summary>Solution</summary>

$47 = 9 \cdot 5 + 2$, so $47 \bmod 5 = 2$. $-13 = (-4) \cdot 4 + 3$, so $-13 \bmod 4 = 3$.

</details>

2. Which day of the week is it 1000 days after a Monday?

<details>
<summary>Solution</summary>

$1000 = 142 \cdot 7 + 6$, so it is Monday plus 6 days: a Sunday.

</details>

3. What remainder does $123 \cdot 456$ leave when divided by $7$?

<details>
<summary>Solution</summary>

$123 = 17 \cdot 7 + 4$, so $123 \equiv 4$; $456 = 65 \cdot 7 + 1$, so $456 \equiv 1$. Hence $123 \cdot 456 \equiv 4 \cdot 1 = 4 \pmod{7}$.

</details>

4. What is the last digit of $3^{2026}$?

<details>
<summary>Solution</summary>

Modulo $10$: $3^1 \equiv 3$, $3^2 \equiv 9$, $3^3 \equiv 7$, $3^4 \equiv 1$. Since $2026 = 4 \cdot 506 + 2$, we get $3^{2026} \equiv 3^2 \equiv 9$. The last digit is $9$.

</details>

5. Solve $5x \equiv 3 \pmod{8}$.

<details>
<summary>Solution</summary>

$5 \cdot 5 = 25 = 3 \cdot 8 + 1$, so $5^{-1} \equiv 5 \pmod{8}$. Then $x \equiv 3 \cdot 5 = 15 \equiv 7 \pmod{8}$. Check: $5 \cdot 7 = 35 = 4 \cdot 8 + 3$.

</details>
