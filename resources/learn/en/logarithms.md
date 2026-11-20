---
title: Logarithms
category: algebra
order: 90
level: 2
summary: What a logarithm is, how to evaluate simple logs in your head, and how to use the logarithm laws and the change-of-base formula.
related: laws-of-exponents, exponential-equations, exponential-functions
---

A logarithm answers one question: **which exponent** do I need? Since $2^3 = 8$, the logarithm of $8$ to base $2$ is $3$. Logarithms are the inverse of exponentiation, just as subtraction undoes addition. You need them to solve equations where the unknown sits in the exponent – growth, decay, compound interest – and they appear in scales like decibels, pH values and the Richter scale.

## Definition

For a base $b > 0$ with $b \neq 1$ and a number $x > 0$:

$$\log_b x = y \quad\Longleftrightarrow\quad b^y = x$$

> **Key idea:** $\log_b x$ is the exponent you must put on $b$ to get $x$. Every logarithm statement is an exponent statement in disguise.

### Example 1

- $\log_2 8 = 3$, because $2^3 = 8$.
- $\log_{10} 1000 = 3$, because $10^3 = 1000$.
- $\log_3 \frac{1}{9} = -2$, because $3^{-2} = \frac{1}{9}$.
- $\log_{25} 5 = \frac{1}{2}$, because $25^{\frac{1}{2}} = \sqrt{25} = 5$.

To evaluate a logarithm in your head, ask yourself: "$b$ to the power of what gives $x$?"

## Special values

These follow directly from the definition:

$$\log_b 1 = 0 \qquad \log_b b = 1 \qquad \log_b b^n = n \qquad b^{\log_b x} = x$$

The logarithm of zero or of a negative number is **not defined**, since no power of a positive base is zero or negative.

## Common bases

Two bases have their own names and calculator buttons:

- **Common logarithm** (base $10$): $\log x$ or $\lg x$, e.g. $\log 100 = 2$.
- **Natural logarithm** (base $e \approx 2.718$): $\ln x$, e.g. $\ln e = 1$.

The natural logarithm is the most important one in calculus.

## The logarithm laws

Because logarithms are exponents, the laws of exponents turn into laws of logarithms. For $x, y > 0$:

$$\log_b (x \cdot y) = \log_b x + \log_b y$$

$$\log_b \frac{x}{y} = \log_b x - \log_b y$$

$$\log_b x^r = r \cdot \log_b x$$

> **Key idea:** A logarithm turns multiplication into addition, division into subtraction, and powers into multiplication.

Why does the first law hold? Write $x = b^m$ and $y = b^n$. Then $xy = b^{m+n}$, so $\log_b(xy) = m + n = \log_b x + \log_b y$.

### Example 2: combining

$$\log_6 4 + \log_6 9 = \log_6 36 = 2$$

$$\log_3 54 - \log_3 2 = \log_3 27 = 3$$

### Example 3: expanding

$$\log \frac{x^2 y}{z} = 2 \log x + \log y - \log z$$

### Example 4: the power law

$$\log_2 8^5 = 5 \cdot \log_2 8 = 5 \cdot 3 = 15$$

## Change of base

Calculators usually only offer $\log$ and $\ln$. To evaluate a logarithm with any other base, use

$$\log_b x = \frac{\ln x}{\ln b} = \frac{\log x}{\log b}$$

### Example 5

$$\log_2 5 = \frac{\ln 5}{\ln 2} \approx \frac{1.609}{0.693} \approx 2.32$$

Check: $2^{2.32} \approx 5$. That makes sense, since $5$ lies between $2^2 = 4$ and $2^3 = 8$.

## Common mistakes

- Inventing a law for sums: $\log(x + y)$ is **not** $\log x + \log y$.
- Splitting a quotient of logs: $\frac{\log x}{\log y}$ is **not** $\log x - \log y$.
- Applying the power law to the whole log: $(\log x)^2 \neq 2 \log x$.
- Taking the logarithm of zero or a negative number.
- Mixing up base and argument: $\log_2 8 = 3$, but $\log_8 2 = \frac{1}{3}$.

## Practice

1. Evaluate $\log_4 64$.

<details>
<summary>Solution</summary>

$4^3 = 64$, so $\log_4 64 = 3$.

</details>

2. Evaluate $\log_2 \frac{1}{32}$.

<details>
<summary>Solution</summary>

$\frac{1}{32} = 2^{-5}$, so $\log_2 \frac{1}{32} = -5$.

</details>

3. Calculate $\log 50 + \log 20$ without a calculator.

<details>
<summary>Solution</summary>

$\log 50 + \log 20 = \log 1000 = 3$.

</details>

4. Simplify $3 \log_2 4 - \log_2 8$.

<details>
<summary>Solution</summary>

$\log_2 4 = 2$ and $\log_2 8 = 3$, so $3 \cdot 2 - 3 = 3$.

</details>

5. Use the change-of-base formula to evaluate $\log_3 20$ to two decimal places.

<details>
<summary>Solution</summary>

$\log_3 20 = \frac{\ln 20}{\ln 3} \approx \frac{2.996}{1.099} \approx 2.73$.

</details>
