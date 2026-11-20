---
title: Prime Numbers and Prime Factorization
category: arithmetic
order: 60
level: 1
summary: What makes a number prime, how to test it, and how to break any whole number down into its prime factors.
related: divisibility-rules, gcd-and-lcm, powers-and-roots, proof-by-induction
---

Prime numbers are the building blocks of the whole numbers: every whole number greater than 1 can be built by multiplying primes, and in only one way. Knowing how to find primes and how to split a number into its **prime factors** makes simplifying fractions, finding common denominators and computing the GCD and LCM much easier.

## What is a prime number?

A **prime number** is a natural number greater than 1 that has exactly two divisors: 1 and itself.

- $7$ is prime: its only divisors are $1$ and $7$.
- $9$ is not prime: it has the divisors $1$, $3$ and $9$.

A natural number greater than 1 that is not prime is called **composite**. It can be written as a product of two smaller natural numbers, for example $9 = 3 \cdot 3$.

The number $1$ is **neither** prime nor composite – it has only one divisor.

The primes below 50 are:

$$2,\ 3,\ 5,\ 7,\ 11,\ 13,\ 17,\ 19,\ 23,\ 29,\ 31,\ 37,\ 41,\ 43,\ 47$$

$2$ is the only even prime. Every other even number is divisible by 2 and therefore composite.

> **Key idea:** A prime has exactly two divisors, 1 and itself. The number 1 is not a prime.

## The Sieve of Eratosthenes

An old and elegant method for finding all primes up to some limit:

1. Write down the numbers from 2 to the limit, e.g. 100.
2. Circle $2$ and cross out all its other multiples: $4, 6, 8, \dots$
3. The next number that is not crossed out is $3$. Circle it and cross out all its multiples.
4. Continue with $5$, then $7$, and so on.
5. Everything left uncrossed is prime.

For a limit of 100 you only need to sieve with $2, 3, 5$ and $7$, because $11 \cdot 11 = 121$ is already larger than 100.

## Testing whether a number is prime

To check whether $n$ is prime, try dividing it by the primes $2, 3, 5, 7, \dots$ – but only up to $\sqrt{n}$. If none of them divides $n$, then $n$ is prime.

Why is that enough? If $n = a \cdot b$ with both factors larger than $\sqrt{n}$, the product would be larger than $n$. So at least one factor must be at most $\sqrt{n}$.

### Example 1

Is $97$ prime? Since $\sqrt{97} \approx 9.8$, test $2, 3, 5, 7$:

- not even, so not divisible by 2
- digit sum $16$, so not divisible by 3
- does not end in 0 or 5
- $97 : 7 = 13$ remainder $6$

No divisor found, so $97$ is prime.

### Example 2

Is $91$ prime? $\sqrt{91} \approx 9.5$. Testing $7$: $91 = 7 \cdot 13$. So $91$ is composite – a classic trap, because it "looks" prime.

## Prime factorization

The **prime factorization** of a number writes it as a product of primes. The **Fundamental Theorem of Arithmetic** says that every natural number greater than 1 has such a factorization, and it is unique apart from the order of the factors.

> **Key idea:** Every whole number greater than 1 can be written as a product of primes in exactly one way (ignoring order).

### Method: repeated division

Divide by the smallest prime that works, then repeat with the quotient until you reach 1.

### Example 3

Factorize $360$.

- $360 : 2 = 180$
- $180 : 2 = 90$
- $90 : 2 = 45$
- $45 : 3 = 15$
- $15 : 3 = 5$
- $5 : 5 = 1$

Collect the divisors and write repeated factors as powers:

$$360 = 2 \cdot 2 \cdot 2 \cdot 3 \cdot 3 \cdot 5 = 2^3 \cdot 3^2 \cdot 5$$

### Method: factor tree

You can also split a number into any two factors and keep splitting until only primes remain:

$$84 = 4 \cdot 21 = (2 \cdot 2) \cdot (3 \cdot 7) = 2^2 \cdot 3 \cdot 7$$

Whichever split you start with, the final primes are always the same – that is exactly what uniqueness means.

## What the factorization tells you

From the prime factorization you can read off all divisors. Every divisor of $2^3 \cdot 3^2 \cdot 5$ has the form $2^a \cdot 3^b \cdot 5^c$ with $0 \le a \le 3$, $0 \le b \le 2$, $0 \le c \le 1$. That gives $4 \cdot 3 \cdot 2 = 24$ divisors of $360$.

## There are infinitely many primes

Euclid proved this more than 2000 years ago. Suppose there were only finitely many primes $p_1, p_2, \dots, p_k$. The number $N = p_1 \cdot p_2 \cdots p_k + 1$ leaves the remainder 1 when divided by any of them, so none of them divides $N$. But $N$ must have some prime factor – a prime not on the list. Contradiction.

## Common mistakes

- Calling $1$ a prime number.
- Thinking all odd numbers are prime: $9$, $15$, $21$, $91$ are odd but composite.
- Stopping the factorization too early, e.g. writing $360 = 2^3 \cdot 45$ – $45$ is not prime.
- Testing divisors far beyond $\sqrt{n}$ – unnecessary work.
- Forgetting a factor when collecting the results of repeated division.

## Practice

1. Which of these numbers are prime: $29$, $39$, $51$, $53$, $87$?

<details>
<summary>Solution</summary>

$29$ and $53$ are prime. $39 = 3 \cdot 13$, $51 = 3 \cdot 17$ and $87 = 3 \cdot 29$ are composite (each has digit sum divisible by 3).

</details>

2. Find the prime factorization of $252$.

<details>
<summary>Solution</summary>

$252 : 2 = 126$, $126 : 2 = 63$, $63 : 3 = 21$, $21 : 3 = 7$, $7 : 7 = 1$. So $252 = 2^2 \cdot 3^2 \cdot 7$.

</details>

3. Is $143$ prime?

<details>
<summary>Solution</summary>

$\sqrt{143} \approx 12$, so test $2, 3, 5, 7, 11$. It is odd, the digit sum is $8$, it does not end in 0 or 5, and $143 : 7$ leaves remainder $3$. But $143 = 11 \cdot 13$, so it is composite.

</details>

4. Find the prime factorization of $1000$ and of $1001$.

<details>
<summary>Solution</summary>

$1000 = 10^3 = (2 \cdot 5)^3 = 2^3 \cdot 5^3$. For $1001$: $1001 = 7 \cdot 143 = 7 \cdot 11 \cdot 13$.

</details>

5. How many divisors does $72 = 2^3 \cdot 3^2$ have?

<details>
<summary>Solution</summary>

The exponent of 2 can be $0$ to $3$ (4 choices), the exponent of 3 can be $0$ to $2$ (3 choices). So there are $4 \cdot 3 = 12$ divisors: $1, 2, 3, 4, 6, 8, 9, 12, 18, 24, 36, 72$.

</details>
