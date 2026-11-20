---
title: Differentiation Rules
category: calculus
order: 50
level: 3
summary: Power, sum, product, quotient and chain rule – the toolkit that lets you differentiate almost any function without the limit definition.
related: derivatives, curve-sketching, exponential-functions, trigonometric-functions
---

Computing every derivative with the limit of the difference quotient would be slow and tedious. Fortunately, a handful of **differentiation rules** is enough to differentiate nearly every function you will meet. You learn a few basic derivatives by heart and then combine them using rules for sums, products, quotients and compositions.

## Basic rules

### Constant and power rule

The derivative of a constant is $0$ – a horizontal line has slope zero. For powers of $x$ the exponent moves to the front and is reduced by one:

> **Key idea:** Power rule: $\left(x^n\right)' = n \cdot x^{n-1}$. It works for every real exponent $n$, including negative numbers and fractions.

Examples: $(x^5)' = 5x^4$, $(x)' = 1$, and with negative and fractional exponents:

$$\left(\frac{1}{x}\right)' = \left(x^{-1}\right)' = -x^{-2} = -\frac{1}{x^2} \qquad \left(\sqrt{x}\right)' = \left(x^{\frac{1}{2}}\right)' = \frac{1}{2} x^{-\frac{1}{2}} = \frac{1}{2\sqrt{x}}$$

### Constant factor and sum rule

A constant factor stays: $(c \cdot f)' = c \cdot f'$. A sum is differentiated term by term: $(f + g)' = f' + g'$.

### Example 1

$$f(x) = 4x^3 - 2x^2 + 7x - 5 \quad \Rightarrow \quad f'(x) = 12x^2 - 4x + 7$$

## Standard derivatives

These are worth memorizing:

- $(e^x)' = e^x$ – the exponential function is its own derivative.
- $(\ln x)' = \frac{1}{x}$ for $x > 0$.
- $(\sin x)' = \cos x$ and $(\cos x)' = -\sin x$.
- $(a^x)' = a^x \cdot \ln a$ for $a > 0$.

## Product rule

The derivative of a product is **not** the product of the derivatives. Instead:

$$(u \cdot v)' = u' \cdot v + u \cdot v'$$

### Example 2

$f(x) = x^2 \cdot e^x$. With $u = x^2$, $u' = 2x$ and $v = e^x$, $v' = e^x$:

$$f'(x) = 2x \cdot e^x + x^2 \cdot e^x = e^x (x^2 + 2x)$$

## Quotient rule

For a fraction of two functions:

$$\left(\frac{u}{v}\right)' = \frac{u' \cdot v - u \cdot v'}{v^2}$$

A memory aid: "low d-high minus high d-low, over low squared".

### Example 3

$f(x) = \frac{2x + 1}{x - 3}$. Here $u = 2x + 1$, $u' = 2$, $v = x - 3$, $v' = 1$:

$$f'(x) = \frac{2(x - 3) - (2x + 1) \cdot 1}{(x - 3)^2} = \frac{2x - 6 - 2x - 1}{(x-3)^2} = \frac{-7}{(x - 3)^2}$$

## Chain rule

The chain rule handles **composed functions**, where one function is plugged into another, such as $(3x^2 + 1)^4$ or $\sin(2x)$. You split the function into an outer function and an inner function.

> **Key idea:** Chain rule: $\big(f(g(x))\big)' = f'(g(x)) \cdot g'(x)$ – "outer derivative times inner derivative". Leave the inside unchanged when differentiating the outer function.

### Example 4

$f(x) = (3x^2 + 1)^4$. The outer function is $(\ldots)^4$ with derivative $4(\ldots)^3$; the inner function is $3x^2 + 1$ with derivative $6x$:

$$f'(x) = 4(3x^2 + 1)^3 \cdot 6x = 24x(3x^2 + 1)^3$$

### Example 5

- $\big(\sin(2x)\big)' = \cos(2x) \cdot 2 = 2\cos(2x)$
- $\left(e^{-x^2}\right)' = e^{-x^2} \cdot (-2x) = -2x e^{-x^2}$

A special case worth remembering: for a linear inner function, $\big(f(ax + b)\big)' = a \cdot f'(ax + b)$.

## Higher derivatives

You can differentiate a derivative again. The result $f''$ is the **second derivative**; it describes how the slope itself changes (the curvature). For $f(x) = x^4$: $f'(x) = 4x^3$, $f''(x) = 12x^2$, $f'''(x) = 24x$.

## Common mistakes

- Differentiating a product factor by factor: $(x^2 e^x)' \ne 2x e^x$.
- Forgetting the inner derivative in the chain rule: $(\sin(2x))' \ne \cos(2x)$.
- Swapping the order in the numerator of the quotient rule – the minus sign makes the order matter.
- Treating a constant factor like a variable: $(5x^3)' = 15x^2$, but $(5)' = 0$.
- Writing $(e^x)' = x e^{x-1}$ – the power rule only applies when the variable is in the base, not in the exponent.

## Practice

1. Differentiate $f(x) = 5x^4 - \frac{3}{x} + \sqrt{x}$.

<details>
<summary>Solution</summary>

Write $-\frac{3}{x} = -3x^{-1}$ and $\sqrt{x} = x^{\frac{1}{2}}$. Then $f'(x) = 20x^3 + 3x^{-2} + \frac{1}{2}x^{-\frac{1}{2}} = 20x^3 + \frac{3}{x^2} + \frac{1}{2\sqrt{x}}$.

</details>

2. Differentiate $f(x) = x \cdot \sin x$.

<details>
<summary>Solution</summary>

Product rule: $f'(x) = 1 \cdot \sin x + x \cdot \cos x = \sin x + x\cos x$.

</details>

3. Differentiate $f(x) = \frac{x^2}{x + 1}$.

<details>
<summary>Solution</summary>

Quotient rule: $f'(x) = \frac{2x(x + 1) - x^2 \cdot 1}{(x + 1)^2} = \frac{x^2 + 2x}{(x + 1)^2}$.

</details>

4. Differentiate $f(x) = e^{3x - 2}$.

<details>
<summary>Solution</summary>

Chain rule with inner derivative $3$: $f'(x) = 3e^{3x - 2}$.

</details>

5. Differentiate $f(x) = \ln(x^2 + 1)$.

<details>
<summary>Solution</summary>

Outer derivative $\frac{1}{x^2 + 1}$, inner derivative $2x$: $f'(x) = \frac{2x}{x^2 + 1}$.

</details>
