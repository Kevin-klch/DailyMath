---
title: Decimals and Fractions
category: fractions
order: 50
level: 1
summary: How decimals relate to fractions, how to convert in both directions, and why some fractions give repeating decimals.
related: fractions-basics, place-value-and-rounding, percentages, scientific-notation
---

Decimals and fractions are two ways of writing the same numbers. A price tag shows 2.50 €, a recipe asks for $\frac{1}{2}$ cup – and both describe parts of a whole. Being able to convert between the two forms lets you pick whichever is easier for the problem in front of you, and it explains a curious fact: some fractions turn into decimals that never end.

## Place value after the decimal point

Each digit after the decimal point stands for a fraction with a power of ten in the denominator: tenths, hundredths, thousandths and so on.

$$3.725 = 3 + \frac{7}{10} + \frac{2}{100} + \frac{5}{1000}$$

So a decimal is really a fraction with denominator $10$, $100$, $1000$, … in disguise.

## Decimal to fraction

Write the digits after the point over the matching power of ten, then simplify. The number of decimal places tells you how many zeros the denominator has.

### Example 1

$$0.375 = \frac{375}{1000} = \frac{3}{8}$$

(Here we divided by the GCD $125$.)

### Example 2

$$2.4 = \frac{24}{10} = \frac{12}{5} = 2\frac{2}{5}$$

## Fraction to decimal

There are two methods.

**Expand to a power of ten.** If the denominator can be turned into $10$, $100$ or $1000$, this is the quickest way:

$$\frac{3}{5} = \frac{6}{10} = 0.6 \qquad \frac{7}{20} = \frac{35}{100} = 0.35$$

**Divide.** A fraction bar means division, so you can always calculate numerator divided by denominator, for example with long division:

$$\frac{3}{8} = 3 : 8 = 0.375$$

> **Key idea:** A decimal is a fraction whose denominator is a power of ten. To convert a fraction, expand it to $10$, $100$, $1000$, … or simply divide the numerator by the denominator.

## Terminating and repeating decimals

When you divide, one of two things happens:

- The division comes to an end: $\frac{3}{8} = 0.375$. This is a **terminating** decimal.
- The digits start repeating forever: $\frac{1}{3} = 0.333\ldots$. This is a **repeating** (recurring) decimal.

Repeating digits are marked with a bar:

$$\frac{1}{3} = 0.\overline{3} \qquad \frac{2}{11} = 0.\overline{18} \qquad \frac{5}{6} = 0.8\overline{3}$$

Why must the digits repeat? In long division by $n$, the only possible remainders are $0, 1, \ldots, n - 1$. If the remainder never becomes $0$, some remainder must eventually come back – and from that point on the division repeats itself.

Which fractions terminate? Simplify the fraction fully and look at the prime factors of the denominator:

> **Key idea:** A fully simplified fraction gives a terminating decimal exactly when its denominator has no prime factors other than $2$ and $5$. Otherwise the decimal repeats.

For example $\frac{7}{40}$ terminates because $40 = 2^3 \cdot 5$, while $\frac{1}{6}$ repeats because $6 = 2 \cdot 3$.

## Repeating decimal to fraction

A repeating decimal can always be written as a fraction. The trick is to shift the repeating part with a power of ten and subtract.

### Example 3

Let $x = 0.\overline{4}$. Then $10x = 4.\overline{4}$. Subtracting removes the endless tail:

$$10x - x = 4 \quad \Rightarrow \quad 9x = 4 \quad \Rightarrow \quad x = \frac{4}{9}$$

### Example 4

For $x = 0.\overline{27}$ the period has two digits, so multiply by $100$:

$$100x - x = 27 \quad \Rightarrow \quad x = \frac{27}{99} = \frac{3}{11}$$

A handy rule follows: a pure repeating block of $k$ digits becomes that block over $k$ nines, such as $0.\overline{27} = \frac{27}{99}$.

## Comparing decimals

Compare digit by digit from the left. It helps to fill in zeros so both numbers have the same number of decimal places: $0.5 = 0.50 > 0.45$. A longer decimal is not automatically larger.

### Useful values to know

| Fraction | Decimal |
|---|---|
| $\frac{1}{2}$ | $0.5$ |
| $\frac{1}{4}$ | $0.25$ |
| $\frac{3}{4}$ | $0.75$ |
| $\frac{1}{5}$ | $0.2$ |
| $\frac{1}{8}$ | $0.125$ |
| $\frac{1}{3}$ | $0.\overline{3}$ |
| $\frac{2}{3}$ | $0.\overline{6}$ |

## Common mistakes

- Thinking $0.45 > 0.5$ because $45 > 5$.
- Using the wrong power of ten: $0.07 = \frac{7}{100}$, not $\frac{7}{10}$.
- Rounding a repeating decimal and then treating it as exact: $0.33$ is not $\frac{1}{3}$.
- Deciding whether a fraction terminates before simplifying it: $\frac{3}{6} = \frac{1}{2}$ terminates even though $6$ contains the factor $3$.

## Practice

1. Write $0.65$ as a fully simplified fraction.

<details>
<summary>Solution</summary>

$0.65 = \frac{65}{100} = \frac{13}{20}$ (divide by $5$).

</details>

2. Write $\frac{7}{8}$ as a decimal.

<details>
<summary>Solution</summary>

$\frac{7}{8} = \frac{875}{1000} = 0.875$ (expand by $125$), or divide $7 : 8 = 0.875$.

</details>

3. Write $\frac{4}{15}$ as a decimal.

<details>
<summary>Solution</summary>

Long division: $4 : 15 = 0.2666\ldots = 0.2\overline{6}$.

</details>

4. Write $0.\overline{36}$ as a fully simplified fraction.

<details>
<summary>Solution</summary>

Two repeating digits: $0.\overline{36} = \frac{36}{99} = \frac{4}{11}$.

</details>

5. Which of these fractions give terminating decimals: $\frac{3}{40}$, $\frac{5}{12}$, $\frac{7}{25}$?

<details>
<summary>Solution</summary>

$40 = 2^3 \cdot 5$ and $25 = 5^2$ contain only the primes $2$ and $5$, so $\frac{3}{40} = 0.075$ and $\frac{7}{25} = 0.28$ terminate. $12 = 2^2 \cdot 3$ contains a $3$, so $\frac{5}{12} = 0.41\overline{6}$ repeats.

</details>
