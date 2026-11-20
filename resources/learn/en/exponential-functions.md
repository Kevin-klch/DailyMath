---
title: Exponential Functions
category: functions
order: 50
level: 2
summary: Growth and decay by a constant factor – the form f(x) = a · bˣ, growth factors and percentages, doubling time, half-life and the number e.
related: laws-of-exponents, logarithms, exponential-equations, percentage-change
---

In an **exponential function** the variable sits in the exponent: $f(x) = 2^x$. Such functions describe processes in which a quantity is **multiplied** by the same factor in every time step – bacteria dividing, money earning compound interest, radioactive material decaying. Exponential growth starts slowly but quickly overtakes any linear growth, which is why it so often surprises people.

## The general form

An exponential function has the form

$$f(x) = a \cdot b^x \qquad (a \neq 0,\; b > 0,\; b \neq 1)$$

- $a = f(0)$ is the **initial value** (the y-intercept).
- $b$ is the **growth factor**: each time $x$ increases by $1$, the value is multiplied by $b$.

> **Key idea:** Linear functions add the same amount per step, exponential functions multiply by the same factor per step. $b > 1$ means growth, $0 < b < 1$ means decay.

The base must be positive – for $b = -2$, the expression $(-2)^{1/2}$ would not be a real number – and $b = 1$ would just give a constant.

## The graph

A value table for $f(x) = 2^x$:

| $x$ | $-2$ | $-1$ | $0$ | $1$ | $2$ | $3$ |
|---|---|---|---|---|---|---|
| $2^x$ | $\frac{1}{4}$ | $\frac{1}{2}$ | $1$ | $2$ | $4$ | $8$ |

The graph passes through $(0, 1)$, rises ever more steeply to the right, and to the left it gets closer and closer to the $x$-axis without ever reaching it. The $x$-axis ($y = 0$) is a **horizontal asymptote**.

The graph of $\left(\frac{1}{2}\right)^x = 2^{-x}$ is the mirror image of $2^x$ in the $y$-axis: it falls from left to right and approaches the $x$-axis on the right.

For $f(x) = a \cdot b^x$ with $a > 0$:

- all values are **positive** – the graph never touches or crosses the $x$-axis, so there are **no zeros**;
- the range is $y > 0$;
- the y-intercept is $(0, a)$.

## Linear versus exponential

Compare $g(x) = 2x$ and $f(x) = 2^x$ for whole numbers:

| $x$ | $1$ | $2$ | $5$ | $10$ | $20$ |
|---|---|---|---|---|---|
| $2x$ | $2$ | $4$ | $10$ | $20$ | $40$ |
| $2^x$ | $2$ | $4$ | $32$ | $1024$ | $1\,048\,576$ |

At first they agree, then the exponential function races away. In the long run, exponential growth beats any linear and even any polynomial growth.

## Percentages and growth factors

Growth by $p$ percent per step means multiplying by $1 + \frac{p}{100}$; decay by $p$ percent means multiplying by $1 - \frac{p}{100}$.

> **Key idea:** Growth by $p\,\%$: $b = 1 + \frac{p}{100}$. Decay by $p\,\%$: $b = 1 - \frac{p}{100}$. For example $+3\,\%$ gives $b = 1.03$, and $-20\,\%$ gives $b = 0.8$.

### Example 1: bacteria

A culture contains 500 bacteria and doubles every hour. Then $f(t) = 500 \cdot 2^t$ ($t$ in hours). After 5 hours there are $f(5) = 500 \cdot 32 = 16\,000$ bacteria.

### Example 2: compound interest

1000 € are invested at 3 % interest per year: $K(t) = 1000 \cdot 1.03^t$. After 2 years: $1000 \cdot 1.03^2 = 1000 \cdot 1.0609 = 1060.90$, i.e. 1060.90 €.

## Doubling time and half-life

For growth, the **doubling time** is the time after which the quantity has doubled; for decay, the **half-life** is the time after which only half is left. Both are constant – no matter when you start counting.

If the half-life is $T$, the amount after time $t$ is

$$N(t) = N_0 \cdot \left(\frac{1}{2}\right)^{t/T}$$

### Example 3: half-life

A medication has a half-life of 6 hours, and 80 mg are taken. After 18 hours, three half-lives have passed:

$$N(18) = 80 \cdot \left(\frac{1}{2}\right)^{3} = 80 \cdot \frac{1}{8} = 10 \text{ mg}$$

To find the time for a given amount (e.g. "when is only 1 mg left?"), you need logarithms.

## Finding the equation from two points

### Example 4

An exponential function satisfies $f(0) = 3$ and $f(2) = 48$. From $f(0) = a$ we get $a = 3$. Then $3 \cdot b^2 = 48$, so $b^2 = 16$ and $b = 4$ (the base must be positive). Result: $f(x) = 3 \cdot 4^x$.

## The natural exponential function

A particularly important base is **Euler's number** $e \approx 2.718$. The function $f(x) = e^x$ has the special property that its slope at every point equals its value – which makes it central in calculus. Every exponential function can be written with base $e$: $b^x = e^{x \ln b}$.

## Common mistakes

- Confusing $2^x$ with $x^2$ – in a power function the variable is the base, in an exponential function it is the exponent.
- Writing a 20 % decrease as factor $0.2$ instead of $0.8$.
- Adding percentages over several years: 3 % for 2 years is not 6 %, but a factor $1.03^2 = 1.0609$, i.e. 6.09 %.
- Thinking the graph eventually reaches the $x$-axis – it only gets arbitrarily close.
- Calculating $a \cdot b^x$ as $(a \cdot b)^x$: the power is evaluated first.

## Practice

1. A town has 2000 inhabitants and grows by 5 % per year. Give the function and the population after 2 years.

<details>
<summary>Solution</summary>

$f(t) = 2000 \cdot 1.05^t$. After 2 years: $2000 \cdot 1.1025 = 2205$ inhabitants.

</details>

2. A car worth 20 000 € loses 20 % of its value each year. What is it worth after 3 years?

<details>
<summary>Solution</summary>

Factor $0.8$ per year: $20\,000 \cdot 0.8^3 = 20\,000 \cdot 0.512 = 10\,240$, i.e. 10 240 €.

</details>

3. Find $f(x) = a \cdot b^x$ with $f(1) = 6$ and $f(3) = 54$.

<details>
<summary>Solution</summary>

Dividing: $\frac{f(3)}{f(1)} = b^2 = \frac{54}{6} = 9$, so $b = 3$. From $a \cdot 3 = 6$ we get $a = 2$. So $f(x) = 2 \cdot 3^x$.

</details>

4. Does $f(x) = 5 \cdot 0.7^x$ describe growth or decay? By how many percent per step? Where does the graph cross the $y$-axis?

<details>
<summary>Solution</summary>

$b = 0.7 < 1$: decay by $30\,\%$ per step. The y-intercept is $f(0) = 5$, i.e. the point $(0, 5)$.

</details>

5. A substance has a half-life of 3 days. Of 64 g, how much is left after 12 days?

<details>
<summary>Solution</summary>

12 days are $4$ half-lives: $64 \cdot \left(\frac{1}{2}\right)^4 = \frac{64}{16} = 4$ g.

</details>
