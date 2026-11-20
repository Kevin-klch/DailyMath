---
title: Exponential Equations
category: algebra
order: 100
level: 3
summary: How to solve equations with the unknown in the exponent – by matching bases, taking logarithms or substituting – with applications to growth and interest.
related: logarithms, laws-of-exponents, exponential-functions
---

In an **exponential equation** the unknown appears in the exponent, as in $2^x = 32$ or $1000 \cdot 1.05^n = 2000$. Such equations come up whenever something grows or shrinks by a constant factor: populations, savings with compound interest, radioactive decay, cooling coffee. The ordinary tools for linear or quadratic equations don't work here – you need the laws of exponents and logarithms.

## Strategy overview

1. **Isolate** the power: get the form $b^{\text{something}} = c$.
2. If both sides can be written with the **same base**, compare the exponents.
3. Otherwise, **take the logarithm** of both sides.
4. If the equation contains $b^x$ and $b^{2x}$, try a **substitution**.

## Method 1: same base

If $b^m = b^n$ (with $b > 0$, $b \neq 1$), then $m = n$. So if you can rewrite both sides as powers of the same base, you only need to solve an equation for the exponents.

### Example 1

$$2^x = 32 = 2^5 \quad\Rightarrow\quad x = 5$$

### Example 2

$$9^{x+1} = 27^x$$

Both $9$ and $27$ are powers of $3$:

$$3^{2(x+1)} = 3^{3x} \quad\Rightarrow\quad 2x + 2 = 3x \quad\Rightarrow\quad x = 2$$

Check: $9^3 = 729$ and $27^2 = 729$.

> **Key idea:** Same base on both sides means equal exponents: from $b^m = b^n$ it follows that $m = n$.

## Method 2: taking the logarithm

When the numbers don't fit a common base, apply a logarithm to both sides. The power law $\log b^x = x \cdot \log b$ brings the unknown down from the exponent.

### Example 3

$$3^x = 20$$

Take $\ln$ on both sides: $x \cdot \ln 3 = \ln 20$, so

$$x = \frac{\ln 20}{\ln 3} \approx 2.73$$

This is the same as $x = \log_3 20$. In general:

$$b^x = c \quad\Longleftrightarrow\quad x = \log_b c = \frac{\ln c}{\ln b} \qquad (c > 0)$$

> **Key idea:** Logarithms are the tool that gets the unknown out of the exponent: $\ln(b^x) = x \ln b$.

### Example 4: isolate first

$$5 \cdot 2^x - 3 = 37$$

Add $3$: $5 \cdot 2^x = 40$. Divide by $5$: $2^x = 8$, so $x = 3$. Never take the logarithm before the power stands alone – $\ln(5 \cdot 2^x - 3)$ cannot be simplified.

### Example 5: base e

$$e^{2x} = 7 \quad\Rightarrow\quad 2x = \ln 7 \quad\Rightarrow\quad x = \frac{\ln 7}{2} \approx 0.97$$

### Example 6: different bases on both sides

$$2^{x+1} = 3^x$$

Take $\ln$: $(x + 1)\ln 2 = x \ln 3$. Expand and collect the $x$-terms:

$$x \ln 2 + \ln 2 = x \ln 3 \quad\Rightarrow\quad \ln 2 = x(\ln 3 - \ln 2) \quad\Rightarrow\quad x = \frac{\ln 2}{\ln 3 - \ln 2} \approx 1.71$$

## Method 3: substitution

Equations with $b^{2x}$ and $b^x$ are quadratic equations in disguise, since $b^{2x} = (b^x)^2$.

### Example 7

$$4^x - 6 \cdot 2^x + 8 = 0$$

Set $u = 2^x$. Then $4^x = u^2$, and the equation becomes $u^2 - 6u + 8 = 0$, so $(u - 2)(u - 4) = 0$ and $u = 2$ or $u = 4$. Back-substitute: $2^x = 2$ gives $x = 1$, and $2^x = 4$ gives $x = 2$.

If a substitution gives a negative value for $u$, discard it: $2^x$ is always positive.

## No solution

Since $b^x > 0$ for every $x$, an equation like $2^x = -4$ or $3^x = 0$ has **no solution**.

## Application: compound interest

### Example 8

You invest 1000 € at 5 % interest per year. After how many years has the money doubled?

$$1000 \cdot 1.05^n = 2000 \quad\Rightarrow\quad 1.05^n = 2 \quad\Rightarrow\quad n = \frac{\ln 2}{\ln 1.05} \approx 14.2$$

After 15 full years the amount has more than doubled.

## Common mistakes

- Taking the logarithm before isolating the power.
- Writing $\ln(5 \cdot 2^x) = 5x \ln 2$ – correct is $\ln 5 + x \ln 2$.
- Comparing exponents when the bases are different: $2^x = 3^5$ does **not** mean $x = 5$.
- Cancelling wrongly: $\frac{\ln 20}{\ln 3}$ is **not** $\ln \frac{20}{3}$ and not $\frac{20}{3}$.
- Keeping negative values after a substitution, e.g. accepting $2^x = -1$.

## Practice

1. Solve $3^{x-2} = 81$.

<details>
<summary>Solution</summary>

$81 = 3^4$, so $x - 2 = 4$ and $x = 6$.

</details>

2. Solve $4^x = 8^{x-1}$.

<details>
<summary>Solution</summary>

Base $2$: $2^{2x} = 2^{3(x-1)}$, so $2x = 3x - 3$ and $x = 3$. Check: $4^3 = 64 = 8^2$.

</details>

3. Solve $7 \cdot 5^x = 175$.

<details>
<summary>Solution</summary>

Divide by $7$: $5^x = 25 = 5^2$, so $x = 2$.

</details>

4. Solve $2^x = 10$ to two decimal places.

<details>
<summary>Solution</summary>

$x = \frac{\ln 10}{\ln 2} \approx \frac{2.303}{0.693} \approx 3.32$.

</details>

5. Solve $9^x - 10 \cdot 3^x + 9 = 0$.

<details>
<summary>Solution</summary>

With $u = 3^x$: $u^2 - 10u + 9 = 0$, so $(u - 1)(u - 9) = 0$ and $u = 1$ or $u = 9$. Then $3^x = 1$ gives $x = 0$, and $3^x = 9$ gives $x = 2$.

</details>
