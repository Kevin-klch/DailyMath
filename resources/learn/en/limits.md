---
title: Limits
category: calculus
order: 20
level: 3
summary: What value does a sequence or function approach? Limit notation, one-sided limits, standard limits and the techniques to compute them.
related: sequences-and-series, continuity, derivatives
---

A **limit** describes the value that a sequence or a function gets closer and closer to – even if it never actually reaches it. Limits are the foundation of calculus: derivatives, integrals and continuity are all defined with them. This article shows how to read the notation and how to calculate limits in practice.

## Limits of sequences

Look at the sequence $a_n = \frac{1}{n}$: $1, \frac{1}{2}, \frac{1}{3}, \frac{1}{4}, \ldots$ The terms get smaller and smaller and come as close to $0$ as you like, without ever being $0$. We write

$$\lim_{n \to \infty} \frac{1}{n} = 0$$

and say: "the limit of $\frac{1}{n}$ as $n$ goes to infinity is $0$". A sequence with a limit is called **convergent**; otherwise it is **divergent**. Examples of divergent sequences are $a_n = n^2$ (grows beyond every bound) and $a_n = (-1)^n$ (jumps between $-1$ and $1$ forever).

> **Key idea:** $\lim_{n \to \infty} a_n = g$ means: no matter how small a distance $\varepsilon > 0$ you choose, from some index on *all* terms lie closer than $\varepsilon$ to $g$.

## Limits of functions

For functions there are two typical questions.

**Behavior at infinity:** what happens to $f(x)$ when $x \to \infty$ or $x \to -\infty$? For example $\lim_{x \to \infty} \frac{1}{x} = 0$ – the graph approaches the $x$-axis, which is a horizontal asymptote.

**Behavior near a point:** what happens to $f(x)$ when $x$ approaches a number $a$? We write $\lim_{x \to a} f(x)$. What matters is only the values *near* $a$, not the value at $a$ itself – $f(a)$ might not even exist.

### One-sided limits

Sometimes it matters from which side you approach $a$. Take $f(x) = \frac{1}{x}$ near $0$:

$$\lim_{x \to 0^-} \frac{1}{x} = -\infty \qquad \lim_{x \to 0^+} \frac{1}{x} = +\infty$$

The notation $x \to 0^-$ means "from the left" (values slightly below $0$), $x \to 0^+$ means "from the right". The (two-sided) limit $\lim_{x \to a} f(x)$ exists only if both one-sided limits exist and are equal. Here they differ, so $\lim_{x \to 0} \frac{1}{x}$ does not exist; the graph has a vertical asymptote (pole) at $x = 0$.

## Limit laws

Limits behave well with arithmetic. If the individual limits exist, then the limit of a sum is the sum of the limits, and the same holds for differences, products and quotients (as long as you do not divide by zero). So you can split complicated expressions into simple pieces. For a "nice" function such as a polynomial, you can simply plug in: $\lim_{x \to 2} (x^2 + 3x) = 4 + 6 = 10$.

## Standard limits

Some limits come up again and again and are worth knowing by heart:

- $\lim_{n \to \infty} \frac{1}{n^k} = 0$ for every $k > 0$
- $\lim_{n \to \infty} q^n = 0$ for $|q| < 1$
- $\lim_{x \to 0} \frac{\sin x}{x} = 1$ (with $x$ in radians)
- $\lim_{n \to \infty} \left(1 + \frac{1}{n}\right)^n = e \approx 2.718$

The last one defines Euler's number $e$. It appears, for example, in continuous compound interest.

## Techniques

Plugging in often leads to undefined expressions like $\frac{0}{0}$ or $\frac{\infty}{\infty}$. Such an expression does not mean "no limit" – it means you have to transform the expression first.

### Factoring and cancelling

If numerator and denominator both become $0$ at $x = a$, they usually share the factor $(x - a)$. Factor it out and cancel it.

### Example 1

$$\lim_{x \to 3} \frac{x^2 - 9}{x - 3}$$

Plugging in gives $\frac{0}{0}$. Factor the numerator: $x^2 - 9 = (x-3)(x+3)$. For $x \ne 3$ we may cancel:

$$\frac{(x-3)(x+3)}{x - 3} = x + 3 \quad \Rightarrow \quad \lim_{x \to 3} (x + 3) = 6$$

### Dominant terms

For $x \to \infty$ (or $n \to \infty$), divide numerator and denominator by the highest power of the denominator.

### Example 2

$$\lim_{x \to \infty} \frac{3x^2 - x}{x^2 + 5} = \lim_{x \to \infty} \frac{3 - \frac{1}{x}}{1 + \frac{5}{x^2}} = \frac{3 - 0}{1 + 0} = 3$$

> **Key idea:** For a fraction of polynomials as $x \to \infty$, only the highest powers matter. Equal degrees: the limit is the ratio of the leading coefficients. Higher degree in the denominator: the limit is $0$. Higher degree in the numerator: the expression grows to $\pm\infty$.

### L'Hôpital's rule

If plugging in gives $\frac{0}{0}$ or $\frac{\infty}{\infty}$, you may replace numerator and denominator by their derivatives:

$$\lim_{x \to a} \frac{f(x)}{g(x)} = \lim_{x \to a} \frac{f'(x)}{g'(x)}$$

### Example 3

$\lim_{x \to 0} \frac{e^x - 1}{x}$ is of type $\frac{0}{0}$. Differentiating numerator and denominator gives $\lim_{x \to 0} \frac{e^x}{1} = 1$.

## Common mistakes

- Concluding "the limit is undefined" from $\frac{0}{0}$ – it is only a signal to transform the expression.
- Ignoring the side: a two-sided limit only exists if the left and right limits agree.
- Using L'Hôpital when the expression is *not* of type $\frac{0}{0}$ or $\frac{\infty}{\infty}$, or applying the quotient rule instead of differentiating numerator and denominator separately.
- Thinking that $\lim_{x \to a} f(x)$ must equal $f(a)$ – that is only true for continuous functions.

## Practice

1. Find $\lim_{n \to \infty} \frac{5n - 2}{2n + 7}$.

<details>
<summary>Solution</summary>

Divide by $n$: $\frac{5 - \frac{2}{n}}{2 + \frac{7}{n}} \to \frac{5}{2}$.

</details>

2. Find $\lim_{x \to 2} \frac{x^2 - 4}{x - 2}$.

<details>
<summary>Solution</summary>

Type $\frac{0}{0}$. Factor: $\frac{(x-2)(x+2)}{x-2} = x + 2$ for $x \ne 2$. The limit is $2 + 2 = 4$.

</details>

3. Find $\lim_{x \to \infty} \frac{4x^3 + x}{2x^3 - 5}$.

<details>
<summary>Solution</summary>

Equal degrees, so the limit is the ratio of the leading coefficients: $\frac{4}{2} = 2$.

</details>

4. Determine both one-sided limits of $f(x) = \frac{1}{x - 1}$ at $x = 1$. Does $\lim_{x \to 1} f(x)$ exist?

<details>
<summary>Solution</summary>

From the right the denominator is small and positive, so $\lim_{x \to 1^+} f(x) = +\infty$. From the left it is small and negative, so $\lim_{x \to 1^-} f(x) = -\infty$. The one-sided limits differ, so the limit does not exist (there is a pole at $x = 1$).

</details>

5. Find $\lim_{x \to 0} \frac{\sin(3x)}{x}$.

<details>
<summary>Solution</summary>

Type $\frac{0}{0}$. With L'Hôpital: $\lim_{x \to 0} \frac{3\cos(3x)}{1} = 3$. Alternatively, write $\frac{\sin(3x)}{x} = 3 \cdot \frac{\sin(3x)}{3x}$ and use the standard limit: $3 \cdot 1 = 3$.

</details>
