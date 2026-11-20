---
title: Antiderivatives and Integrals
category: calculus
order: 80
level: 3
summary: Differentiation in reverse – finding antiderivatives, the basic integration rules and the fundamental theorem that connects them to definite integrals.
related: differentiation-rules, area-under-curves, derivatives
---

Differentiation answers the question: given a function, what is its slope? **Integration** goes the other way: given the slope (the derivative), which function did it come from? Such a function is called an **antiderivative**. Antiderivatives are the key to computing areas, total distances and accumulated quantities.

## Antiderivatives

A function $F$ is an **antiderivative** of $f$ if $F'(x) = f(x)$.

For example, $F(x) = x^2$ is an antiderivative of $f(x) = 2x$, because $(x^2)' = 2x$. But $x^2 + 5$ and $x^2 - 3$ also have the derivative $2x$, since the derivative of a constant is zero. So every function has infinitely many antiderivatives, and they differ only by a constant.

> **Key idea:** If $F$ is an antiderivative of $f$, then all antiderivatives are $F(x) + C$ with an arbitrary constant $C$. You can always check an antiderivative by differentiating it.

The collection of all antiderivatives is written as the **indefinite integral**:

$$\int f(x) \, dx = F(x) + C$$

Here $\int$ is the integral sign, $f(x)$ is the integrand and $dx$ indicates that $x$ is the variable.

## Basic rules

Reading the differentiation rules backwards gives the basic integration rules.

**Power rule:** raise the exponent by one and divide by the new exponent:

$$\int x^n \, dx = \frac{x^{n+1}}{n+1} + C \qquad (n \ne -1)$$

Check: $\left(\frac{x^{n+1}}{n+1}\right)' = \frac{(n+1)x^n}{n+1} = x^n$.

**Further standard integrals:**

- $\int \frac{1}{x} \, dx = \ln|x| + C$ (this covers the missing case $n = -1$)
- $\int e^x \, dx = e^x + C$
- $\int \sin x \, dx = -\cos x + C$
- $\int \cos x \, dx = \sin x + C$

**Constant factor and sum rule:** constant factors can be pulled out, and sums can be integrated term by term.

### Example 1

$$\int (6x^2 - 4x + 3) \, dx = 6 \cdot \frac{x^3}{3} - 4 \cdot \frac{x^2}{2} + 3x + C = 2x^3 - 2x^2 + 3x + C$$

### Example 2: roots and fractions

Rewrite as powers first: $\sqrt{x} = x^{\frac{1}{2}}$ and $\frac{1}{x^2} = x^{-2}$.

$$\int \left(\sqrt{x} + \frac{1}{x^2}\right) dx = \frac{x^{\frac{3}{2}}}{\frac{3}{2}} + \frac{x^{-1}}{-1} + C = \frac{2}{3}x^{\frac{3}{2}} - \frac{1}{x} + C$$

## Linear inner functions

If the inner function is linear, $ax + b$, you integrate the outer function and divide by $a$ – the reverse of the chain rule:

$$\int f(ax + b) \, dx = \frac{1}{a} F(ax + b) + C$$

### Example 3

$$\int \cos(2x) \, dx = \frac{1}{2}\sin(2x) + C \qquad \int e^{3x} \, dx = \frac{1}{3}e^{3x} + C$$

## Antiderivatives with a condition

Sometimes you need the one antiderivative that passes through a given point.

### Example 4

Find the antiderivative $F$ of $f(x) = 2x + 1$ with $F(1) = 5$.

All antiderivatives: $F(x) = x^2 + x + C$. Plug in the condition: $1 + 1 + C = 5$, so $C = 3$. The answer is $F(x) = x^2 + x + 3$.

## The definite integral

The **definite integral** $\int_a^b f(x) \, dx$ has fixed limits $a$ and $b$ and is a *number*, not a function. Geometrically, it is built by splitting the interval $[a, b]$ into thin strips and adding up the products "height times width" – in the limit of infinitely thin strips. Remarkably, you can compute it with any antiderivative:

> **Key idea:** Fundamental theorem of calculus: $\displaystyle\int_a^b f(x) \, dx = \big[F(x)\big]_a^b = F(b) - F(a)$, where $F$ is any antiderivative of $f$.

The constant $C$ cancels in the difference, so you can leave it out.

### Example 5

$$\int_1^3 2x \, dx = \big[x^2\big]_1^3 = 9 - 1 = 8$$

$$\int_0^1 e^x \, dx = \big[e^x\big]_0^1 = e - 1$$

Useful properties: $\int_a^a f(x) \, dx = 0$, swapping the limits changes the sign, and $\int_a^b f \, dx + \int_b^c f \, dx = \int_a^c f \, dx$. How the definite integral relates to areas is explained in the article on definite integrals and area.

## Common mistakes

- Forgetting the $+ C$ in an indefinite integral.
- Using the power rule for $n = -1$: $\int \frac{1}{x} \, dx$ is $\ln|x| + C$, not $\frac{x^0}{0}$.
- Integrating products factor by factor – there is no simple product rule for integrals.
- Getting the sign wrong with sine and cosine: $\int \sin x \, dx = -\cos x + C$.
- Calculating $F(a) - F(b)$ instead of $F(b) - F(a)$.

## Practice

1. Find $\int (4x^3 + 2x) \, dx$.

<details>
<summary>Solution</summary>

$4 \cdot \frac{x^4}{4} + 2 \cdot \frac{x^2}{2} + C = x^4 + x^2 + C$.

</details>

2. Find $\int \left(\frac{3}{x} + e^x\right) dx$.

<details>
<summary>Solution</summary>

$3\ln|x| + e^x + C$.

</details>

3. Calculate $\int_0^2 (x^2 + 1) \, dx$.

<details>
<summary>Solution</summary>

$\left[\frac{x^3}{3} + x\right]_0^2 = \left(\frac{8}{3} + 2\right) - 0 = \frac{14}{3}$.

</details>

4. Find $\int e^{2x + 1} \, dx$.

<details>
<summary>Solution</summary>

Linear inner function with $a = 2$: $\frac{1}{2}e^{2x + 1} + C$. Check: $\left(\frac{1}{2}e^{2x+1}\right)' = \frac{1}{2} \cdot 2 e^{2x+1} = e^{2x+1}$.

</details>

5. Find the antiderivative $F$ of $f(x) = 6x^2$ with $F(1) = 4$.

<details>
<summary>Solution</summary>

$F(x) = 2x^3 + C$. From $F(1) = 2 + C = 4$ we get $C = 2$, so $F(x) = 2x^3 + 2$.

</details>
