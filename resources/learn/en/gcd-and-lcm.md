---
title: GCD and LCM
category: arithmetic
order: 70
level: 1
summary: How to find the greatest common divisor and the least common multiple – by listing, by prime factors or with the Euclidean algorithm.
related: prime-numbers, divisibility-rules, fractions-basics, adding-fractions
---

The **greatest common divisor (GCD)** of two numbers is the largest number that divides both of them. The **least common multiple (LCM)** is the smallest number that both of them divide. The GCD is what you need to simplify a fraction in one step; the LCM gives you the lowest common denominator when adding fractions. Both also show up in everyday puzzles about tiles, timetables and gears.

## The greatest common divisor

The GCD of $a$ and $b$ is written $\gcd(a, b)$. (In some countries it is called the highest common factor, HCF.)

### Method 1: listing divisors

For small numbers, simply list all divisors and pick the largest one they share.

- Divisors of $18$: $1, 2, 3, 6, 9, 18$
- Divisors of $24$: $1, 2, 3, 4, 6, 8, 12, 24$

Common divisors: $1, 2, 3, 6$. So $\gcd(18, 24) = 6$.

### Method 2: prime factorization

Factorize both numbers. The GCD is the product of the primes they **share**, each taken with the **smaller** exponent.

$$84 = 2^2 \cdot 3 \cdot 7 \qquad 90 = 2 \cdot 3^2 \cdot 5$$

Shared primes: $2$ (smaller exponent 1) and $3$ (smaller exponent 1). So

$$\gcd(84, 90) = 2 \cdot 3 = 6$$

If two numbers share no prime factor, their GCD is $1$ and they are called **coprime**, e.g. $\gcd(8, 15) = 1$.

## The least common multiple

The LCM of $a$ and $b$ is written $\operatorname{lcm}(a, b)$.

### Method 1: listing multiples

- Multiples of $6$: $6, 12, 18, 24, 30, 36, \dots$
- Multiples of $8$: $8, 16, 24, 32, 40, \dots$

The first number on both lists is $24$, so $\operatorname{lcm}(6, 8) = 24$.

A useful shortcut: list the multiples of the **larger** number and stop at the first one the smaller number divides.

### Method 2: prime factorization

The LCM is the product of **all** primes that appear in either number, each taken with the **larger** exponent.

$$84 = 2^2 \cdot 3 \cdot 7 \qquad 90 = 2 \cdot 3^2 \cdot 5$$

$$\operatorname{lcm}(84, 90) = 2^2 \cdot 3^2 \cdot 5 \cdot 7 = 4 \cdot 9 \cdot 5 \cdot 7 = 1260$$

> **Key idea:** GCD: shared primes, smaller exponent. LCM: all primes, larger exponent.

## The link between GCD and LCM

For any two natural numbers:

$$\gcd(a, b) \cdot \operatorname{lcm}(a, b) = a \cdot b$$

Check with the example above: $6 \cdot 1260 = 7560$ and $84 \cdot 90 = 7560$. ✓

This gives a quick way to get the LCM once you know the GCD:

$$\operatorname{lcm}(a, b) = \frac{a \cdot b}{\gcd(a, b)}$$

> **Key idea:** The product of GCD and LCM equals the product of the two numbers.

## The Euclidean algorithm

For large numbers, factorizing is slow. The **Euclidean algorithm** finds the GCD with just a few divisions. It is based on this fact: the GCD of $a$ and $b$ equals the GCD of $b$ and the remainder of $a : b$.

1. Divide the larger number by the smaller one.
2. Replace the larger number by the remainder.
3. Repeat until the remainder is $0$. The last non-zero remainder is the GCD.

### Example 1

Find $\gcd(252, 198)$.

- $252 = 1 \cdot 198 + 54$
- $198 = 3 \cdot 54 + 36$
- $54 = 1 \cdot 36 + 18$
- $36 = 2 \cdot 18 + 0$

The last non-zero remainder is $18$, so $\gcd(252, 198) = 18$.

Then $\operatorname{lcm}(252, 198) = \frac{252 \cdot 198}{18} = 14 \cdot 198 = 2772$.

## Applications

### Example 2: simplifying a fraction

Simplify $\frac{84}{90}$. Since $\gcd(84, 90) = 6$:

$$\frac{84}{90} = \frac{84 : 6}{90 : 6} = \frac{14}{15}$$

One step, and the fraction is fully simplified.

### Example 3: a timetable problem

One bus leaves every 12 minutes, another every 18 minutes. Both leave together at 8:00. When do they next leave together?

We need $\operatorname{lcm}(12, 18)$. With $12 = 2^2 \cdot 3$ and $18 = 2 \cdot 3^2$:

$$\operatorname{lcm}(12, 18) = 2^2 \cdot 3^2 = 36$$

They leave together again after 36 minutes, at 8:36.

A rule of thumb for word problems: "the largest equal pieces" or "split into groups" suggests the GCD; "when will it happen together again" suggests the LCM.

## Common mistakes

- Mixing up the rules: taking the larger exponent for the GCD or the smaller one for the LCM.
- Forgetting primes that appear in only one number when computing the LCM.
- Thinking the LCM is always $a \cdot b$. That is only true when $a$ and $b$ are coprime: $\operatorname{lcm}(6, 8) = 24$, not $48$.
- Stopping the Euclidean algorithm too early, or reporting the remainder $0$ as the GCD.
- Using the GCD when a problem asks "when do they meet again".

## Practice

1. Find $\gcd(36, 48)$ and $\operatorname{lcm}(36, 48)$.

<details>
<summary>Solution</summary>

$36 = 2^2 \cdot 3^2$ and $48 = 2^4 \cdot 3$. GCD: $2^2 \cdot 3 = 12$. LCM: $2^4 \cdot 3^2 = 144$. Check: $12 \cdot 144 = 1728 = 36 \cdot 48$.

</details>

2. Use the Euclidean algorithm to find $\gcd(391, 299)$.

<details>
<summary>Solution</summary>

$391 = 1 \cdot 299 + 92$, $299 = 3 \cdot 92 + 23$, $92 = 4 \cdot 23 + 0$. So $\gcd(391, 299) = 23$.

</details>

3. Simplify $\frac{72}{120}$ in one step.

<details>
<summary>Solution</summary>

$\gcd(72, 120) = 24$ (since $72 = 2^3 \cdot 3^2$ and $120 = 2^3 \cdot 3 \cdot 5$). So $\frac{72}{120} = \frac{3}{5}$.

</details>

4. Find $\operatorname{lcm}(4, 6, 10)$.

<details>
<summary>Solution</summary>

$4 = 2^2$, $6 = 2 \cdot 3$, $10 = 2 \cdot 5$. All primes with the largest exponent: $2^2 \cdot 3 \cdot 5 = 60$.

</details>

5. A floor measuring 240 cm by 180 cm is to be covered with equal square tiles without cutting any. What is the largest possible tile size, and how many tiles are needed?

<details>
<summary>Solution</summary>

The side length must divide both 240 and 180, and be as large as possible: $\gcd(240, 180) = 60$. So the tiles are 60 cm by 60 cm. Along the sides fit $240 : 60 = 4$ and $180 : 60 = 3$ tiles, so $4 \cdot 3 = 12$ tiles are needed.

</details>
