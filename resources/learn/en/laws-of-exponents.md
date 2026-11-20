---
title: Laws of Exponents
category: algebra
order: 80
level: 2
summary: The rules for multiplying, dividing and raising powers – plus what zero, negative and fractional exponents mean.
related: powers-and-roots, logarithms, scientific-notation, exponential-functions
---

A power like $2^5$ is shorthand for repeated multiplication: $2 \cdot 2 \cdot 2 \cdot 2 \cdot 2 = 32$. The **laws of exponents** describe how to calculate with powers without writing out every factor. They make long expressions short, they explain what exponents like $0$, $-2$ or $\frac{1}{2}$ mean, and they are the foundation for logarithms and exponential functions.

## Vocabulary

In $a^n$ the number $a$ is the **base** and $n$ is the **exponent** (or power). For a positive whole number $n$:

$$a^n = \underbrace{a \cdot a \cdot \ldots \cdot a}_{n \text{ factors}}$$

## Same base: multiplying and dividing

$$a^m \cdot a^n = a^{m+n} \qquad \frac{a^m}{a^n} = a^{m-n}$$

Why? $2^3 \cdot 2^4$ means three factors of $2$ followed by four more – seven factors in total, so $2^7 = 128$. When dividing, common factors cancel: $\frac{x^5}{x^2} = \frac{x \cdot x \cdot x \cdot x \cdot x}{x \cdot x} = x^3$.

## Power of a power

$$(a^m)^n = a^{m \cdot n}$$

$(x^3)^4$ means $x^3 \cdot x^3 \cdot x^3 \cdot x^3 = x^{3+3+3+3} = x^{12}$.

## Same exponent: products and quotients

$$a^n \cdot b^n = (ab)^n \qquad \frac{a^n}{b^n} = \left(\frac{a}{b}\right)^n$$

This is handy for mental math: $2^5 \cdot 5^5 = 10^5 = 100\,000$. It also means you must raise **every** factor in a product: $(2x)^3 = 8x^3$.

> **Key idea:** Same base – add or subtract the exponents. Power of a power – multiply the exponents. Same exponent – combine the bases.

## Zero and negative exponents

The division rule tells us what $a^0$ must be: $\frac{a^3}{a^3} = a^{3-3} = a^0$, but also $\frac{a^3}{a^3} = 1$. Likewise $\frac{a^2}{a^5} = a^{-3}$ and also $\frac{1}{a^3}$. So for $a \neq 0$:

$$a^0 = 1 \qquad a^{-n} = \frac{1}{a^n}$$

A negative exponent does **not** make the number negative – it means "take the reciprocal": $2^{-3} = \frac{1}{8}$ and $\left(\frac{2}{3}\right)^{-2} = \left(\frac{3}{2}\right)^2 = \frac{9}{4}$.

## Fractional exponents

Which number squared gives $9$? The rule $(a^m)^n = a^{mn}$ says $\left(9^{\frac{1}{2}}\right)^2 = 9^1 = 9$, so $9^{\frac{1}{2}}$ must be $\sqrt{9} = 3$. In general, for $a \geq 0$:

$$a^{\frac{1}{n}} = \sqrt[n]{a} \qquad a^{\frac{m}{n}} = \sqrt[n]{a^m} = \left(\sqrt[n]{a}\right)^m$$

> **Key idea:** A fractional exponent is a root: the denominator is the root, the numerator the power. $8^{\frac{2}{3}} = \left(\sqrt[3]{8}\right)^2 = 2^2 = 4$.

Taking the root first usually keeps the numbers small.

## Worked examples

### Example 1

$$(2x^3y^2)^3 = 2^3 \cdot (x^3)^3 \cdot (y^2)^3 = 8x^9y^6$$

### Example 2

$$\frac{a^4b^{-2}}{ab^3} = a^{4-1}b^{-2-3} = a^3b^{-5} = \frac{a^3}{b^5}$$

### Example 3

$$\frac{3^7 \cdot 3^{-2}}{3^3} = 3^{7 - 2 - 3} = 3^2 = 9$$

### Example 4

$$27^{-\frac{1}{3}} = \frac{1}{27^{\frac{1}{3}}} = \frac{1}{3}$$

## What does *not* work

There is no rule for sums of powers. $2^3 + 2^4 = 8 + 16 = 24$, which is not $2^7$. Also $(a + b)^2 \neq a^2 + b^2$ – the laws for products do not carry over to sums.

## Common mistakes

- Multiplying exponents instead of adding them: $x^2 \cdot x^3 = x^5$, not $x^6$.
- Multiplying the bases: $2^3 \cdot 2^4 = 2^7$, not $4^7$.
- Thinking a negative exponent gives a negative number: $5^{-2} = \frac{1}{25}$, not $-25$.
- Believing $a^0 = 0$ – it is $1$.
- Forgetting to raise the coefficient: $(3x)^2 = 9x^2$, not $3x^2$.
- Applying the laws to sums: $(x + y)^3 \neq x^3 + y^3$.

## Practice

1. Simplify $3^4 \cdot 3^{-2}$.

<details>
<summary>Solution</summary>

$3^{4 + (-2)} = 3^2 = 9$.

</details>

2. Simplify $(x^2)^5 \cdot x^3$.

<details>
<summary>Solution</summary>

$(x^2)^5 = x^{10}$, then $x^{10} \cdot x^3 = x^{13}$.

</details>

3. Calculate $16^{\frac{3}{4}}$.

<details>
<summary>Solution</summary>

$\sqrt[4]{16} = 2$, and $2^3 = 8$.

</details>

4. Simplify $(3a^2b)^2 \cdot a^{-3}$.

<details>
<summary>Solution</summary>

$(3a^2b)^2 = 9a^4b^2$. Then $9a^4b^2 \cdot a^{-3} = 9ab^2$.

</details>

5. Calculate $\frac{4^5 \cdot 25^5}{10^9}$ without a calculator.

<details>
<summary>Solution</summary>

$4^5 \cdot 25^5 = (4 \cdot 25)^5 = 100^5 = 10^{10}$. Then $\frac{10^{10}}{10^9} = 10$.

</details>
