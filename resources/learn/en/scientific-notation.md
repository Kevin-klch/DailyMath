---
title: Scientific Notation
category: arithmetic
order: 90
level: 2
summary: How to write very large and very small numbers compactly as a number times a power of ten, and how to calculate with them.
related: powers-and-roots, laws-of-exponents, place-value-and-rounding, units-and-conversions
---

The distance from the Earth to the Sun is about 150,000,000 km; a red blood cell is about 0.000007 m wide. Numbers like these are hard to read and easy to miscount. **Scientific notation** writes them as a manageable number times a power of ten, which makes them compact, easy to compare and easy to calculate with.

## Powers of ten

Scientific notation is built on powers of ten:

$$10^1 = 10,\quad 10^2 = 100,\quad 10^3 = 1000,\quad 10^6 = 1\,000\,000$$

The exponent tells you how many zeros follow the 1. For numbers smaller than 1 we use **negative exponents**:

$$10^{-1} = \frac{1}{10} = 0.1,\quad 10^{-2} = \frac{1}{100} = 0.01,\quad 10^{-3} = \frac{1}{1000} = 0.001$$

In general $10^{-n} = \frac{1}{10^n}$. And $10^0 = 1$.

## The form $a \cdot 10^n$

A number is in scientific notation if it is written as

$$a \cdot 10^n \qquad \text{with } 1 \le a < 10 \text{ and } n \text{ a whole number}$$

The number $a$ (sometimes called the mantissa or coefficient) has exactly one non-zero digit before the decimal point. The exponent $n$ says how far the decimal point has moved.

> **Key idea:** In scientific notation, the first factor is at least 1 and less than 10. A positive exponent means a large number, a negative exponent means a number between 0 and 1.

Examples:

- $150\,000\,000 = 1.5 \cdot 10^8$
- $0.000007 = 7 \cdot 10^{-6}$
- $4\,230 = 4.23 \cdot 10^3$
- $0.0805 = 8.05 \cdot 10^{-2}$

On calculators you will often see `1.5E8`, which means $1.5 \cdot 10^8$.

## Converting to scientific notation

1. Move the decimal point until exactly one non-zero digit stands in front of it.
2. Count how many places you moved it. That number is the size of the exponent.
3. Moved to the **left** (big number): the exponent is **positive**. Moved to the **right** (small number): the exponent is **negative**.

### Example 1

Write $384\,000$ in scientific notation.

The decimal point sits after the last zero. Move it 5 places left to get $3.84$:

$$384\,000 = 3.84 \cdot 10^5$$

### Example 2

Write $0.000\,029$ in scientific notation.

Move the decimal point 5 places right to get $2.9$:

$$0.000\,029 = 2.9 \cdot 10^{-5}$$

## Converting back

Multiplying by $10^n$ moves the decimal point $n$ places to the right; multiplying by $10^{-n}$ moves it $n$ places to the left. Fill gaps with zeros.

- $6.02 \cdot 10^4 = 60\,200$
- $3.1 \cdot 10^{-3} = 0.0031$

> **Key idea:** Count the places the decimal point moves. Big numbers get positive exponents, small numbers get negative exponents.

## Calculating in scientific notation

### Multiplying and dividing

Multiply (or divide) the front numbers and handle the powers of ten separately, using $10^m \cdot 10^n = 10^{m+n}$ and $10^m : 10^n = 10^{m-n}$.

### Example 3

$$(3 \cdot 10^4) \cdot (5 \cdot 10^7) = (3 \cdot 5) \cdot 10^{4+7} = 15 \cdot 10^{11}$$

$15$ is not between 1 and 10, so adjust: $15 = 1.5 \cdot 10^1$. Hence

$$15 \cdot 10^{11} = 1.5 \cdot 10^{12}$$

### Example 4

$$\frac{8.4 \cdot 10^{3}}{2 \cdot 10^{-2}} = \frac{8.4}{2} \cdot 10^{3 - (-2)} = 4.2 \cdot 10^5$$

### Adding and subtracting

Here the exponents must be **the same** first – just as you can only add like terms.

### Example 5

$$6 \cdot 10^5 + 3 \cdot 10^4 = 6 \cdot 10^5 + 0.3 \cdot 10^5 = 6.3 \cdot 10^5$$

You can check this by writing out the numbers: $600\,000 + 30\,000 = 630\,000$.

## Comparing numbers

To compare two numbers in scientific notation, first look at the exponents: the larger exponent wins, no matter what the front numbers are. Only if the exponents are equal do you compare the front numbers.

$9.9 \cdot 10^3 < 1.1 \cdot 10^4$, because $9900 < 11\,000$.

## Common mistakes

- Leaving the front number outside the range: $12 \cdot 10^3$ or $0.5 \cdot 10^2$ are not in scientific notation.
- Getting the sign of the exponent wrong: small numbers need a negative exponent.
- Miscounting places, especially with zeros right after the decimal point.
- Adding exponents when adding numbers: $2 \cdot 10^3 + 3 \cdot 10^3 = 5 \cdot 10^3$, not $5 \cdot 10^6$.
- Forgetting to adjust the result after multiplying, e.g. leaving $15 \cdot 10^{11}$.

## Practice

1. Write in scientific notation: $72\,000\,000$ and $0.00045$.

<details>
<summary>Solution</summary>

$72\,000\,000 = 7.2 \cdot 10^7$ (point moved 7 places left). $0.00045 = 4.5 \cdot 10^{-4}$ (point moved 4 places right).

</details>

2. Write as ordinary numbers: $5.06 \cdot 10^6$ and $1.2 \cdot 10^{-5}$.

<details>
<summary>Solution</summary>

$5.06 \cdot 10^6 = 5\,060\,000$ and $1.2 \cdot 10^{-5} = 0.000012$.

</details>

3. Calculate $(4 \cdot 10^{-3}) \cdot (6 \cdot 10^{8})$ and give the result in scientific notation.

<details>
<summary>Solution</summary>

$4 \cdot 6 = 24$ and $10^{-3} \cdot 10^8 = 10^5$. So $24 \cdot 10^5 = 2.4 \cdot 10^6$.

</details>

4. Calculate $\frac{9 \cdot 10^{4}}{3 \cdot 10^{9}}$.

<details>
<summary>Solution</summary>

$\frac{9}{3} = 3$ and $10^{4-9} = 10^{-5}$. Result: $3 \cdot 10^{-5}$.

</details>

5. Light travels about $3 \cdot 10^8$ m per second. How far does it travel in $5 \cdot 10^2$ seconds (roughly the time from the Sun to the Earth)?

<details>
<summary>Solution</summary>

$(3 \cdot 10^8) \cdot (5 \cdot 10^2) = 15 \cdot 10^{10} = 1.5 \cdot 10^{11}$ m, which is $150$ million km.

</details>
