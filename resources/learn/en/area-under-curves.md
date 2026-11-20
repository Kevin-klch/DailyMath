---
title: Definite Integrals and Area
category: calculus
order: 90
level: 3
summary: How definite integrals measure area – from rectangle sums to the exact value, areas below the axis, and the area between two curves.
related: integrals, curve-sketching, polynomial-functions
---

How large is the region under a curved graph? For rectangles and triangles there are simple formulas, but for a region bounded by a parabola there are none. The **definite integral** solves this problem: it computes such areas exactly. This article shows how integrals and areas are related and what to watch out for when the graph dips below the $x$-axis.

## Approximating with rectangles

Suppose we want the area between the graph of $f(x) = x^2$ and the $x$-axis from $x = 0$ to $x = 1$. Split the interval into $n$ strips of equal width and replace each strip with a rectangle:

- If each rectangle uses the *smallest* function value in its strip, the rectangles fit under the curve: the **lower sum** is a bit too small.
- If each uses the *largest* value, they stick out above the curve: the **upper sum** is a bit too large.

The more strips you use, the closer both sums get to each other. In the limit $n \to \infty$ they meet at one number – the definite integral. For $x^2$ on $[0, 1]$ that number is $\frac{1}{3}$.

Fortunately you don't have to compute these limits by hand: the fundamental theorem of calculus gives the value directly with an antiderivative $F$:

$$\int_a^b f(x) \, dx = F(b) - F(a)$$

## Signed area

The definite integral does not measure area directly – it measures **signed area**:

> **Key idea:** Regions above the $x$-axis count positive, regions below the $x$-axis count negative. If $f(x) \ge 0$ on $[a, b]$, then $\int_a^b f(x) \, dx$ is exactly the area between the graph and the $x$-axis.

### Example 1: graph above the axis

Area between $f(x) = x^2$ and the $x$-axis on $[0, 3]$:

$$\int_0^3 x^2 \, dx = \left[\frac{x^3}{3}\right]_0^3 = 9 - 0 = 9$$

### Example 2: graph below the axis

$f(x) = x^2 - 4$ is negative between its zeros $-2$ and $2$:

$$\int_{-2}^{2} (x^2 - 4) \, dx = \left[\frac{x^3}{3} - 4x\right]_{-2}^{2} = \left(\frac{8}{3} - 8\right) - \left(-\frac{8}{3} + 8\right) = -\frac{32}{3}$$

The integral is negative; the area is its absolute value, $\frac{32}{3}$.

## When the graph crosses the axis

If the graph changes sign in the interval, positive and negative parts partly cancel. To get the actual area:

1. Find the zeros of $f$ in the interval.
2. Integrate separately between consecutive zeros (and the interval limits).
3. Add the **absolute values** of the partial integrals.

### Example 3

Find the area between $f(x) = x^2 - 1$ and the $x$-axis on $[0, 2]$.

The zero in the interval is $x = 1$. An antiderivative is $F(x) = \frac{x^3}{3} - x$.

$$\int_0^1 (x^2 - 1) \, dx = \left(\frac{1}{3} - 1\right) - 0 = -\frac{2}{3}$$

$$\int_1^2 (x^2 - 1) \, dx = \left(\frac{8}{3} - 2\right) - \left(\frac{1}{3} - 1\right) = \frac{2}{3} + \frac{2}{3} = \frac{4}{3}$$

The area is $\frac{2}{3} + \frac{4}{3} = 2$. Integrating straight from $0$ to $2$ would give only $-\frac{2}{3} + \frac{4}{3} = \frac{2}{3}$ – the wrong answer for the area.

## Area between two curves

The area enclosed by two graphs $f$ and $g$ is found by integrating their difference:

> **Key idea:** If $f(x) \ge g(x)$ on $[a, b]$, the area between the graphs is $\displaystyle A = \int_a^b \big(f(x) - g(x)\big) \, dx$. The limits are usually the intersection points, found from $f(x) = g(x)$.

Here it doesn't matter whether the graphs are above or below the $x$-axis – only which one is on top. If the graphs cross inside the interval, split it at the intersection points, just like at zeros.

### Example 4

Find the area enclosed by $f(x) = x$ and $g(x) = x^2$.

Intersections: $x = x^2$ gives $x(x - 1) = 0$, so $x = 0$ and $x = 1$. Between them $x \ge x^2$ (test with $x = \frac{1}{2}$: $\frac{1}{2} > \frac{1}{4}$). So

$$A = \int_0^1 (x - x^2) \, dx = \left[\frac{x^2}{2} - \frac{x^3}{3}\right]_0^1 = \frac{1}{2} - \frac{1}{3} = \frac{1}{6}$$

## Average value of a function

The integral also gives the **average value** of a function on $[a, b]$: $\frac{1}{b - a}\int_a^b f(x) \, dx$. This is the height of the rectangle over $[a, b]$ that has the same area as the region under the graph.

## Common mistakes

- Integrating straight across a zero and taking the result as the area – parts below the axis cancel parts above.
- Reporting a negative number as an area. Areas are always positive.
- Forgetting to find the intersection points before computing the area between two curves.
- Subtracting the wrong way round, $g - f$ instead of $f - g$ (the result is negative – a warning sign).

## Practice

1. Calculate the area between $f(x) = 3x^2 + 1$ and the $x$-axis on $[1, 2]$.

<details>
<summary>Solution</summary>

$f$ is positive, so $\int_1^2 (3x^2 + 1) \, dx = \big[x^3 + x\big]_1^2 = 10 - 2 = 8$.

</details>

2. Find the area enclosed by the graph of $f(x) = -x^2 + 4$ and the $x$-axis.

<details>
<summary>Solution</summary>

Zeros: $x = \pm 2$. $\int_{-2}^{2} (-x^2 + 4) \, dx = \left[-\frac{x^3}{3} + 4x\right]_{-2}^{2} = \left(-\frac{8}{3} + 8\right) - \left(\frac{8}{3} - 8\right) = 16 - \frac{16}{3} = \frac{32}{3}$.

</details>

3. Calculate $\int_{-1}^{1} x^3 \, dx$ and the area between $f(x) = x^3$ and the $x$-axis on $[-1, 1]$.

<details>
<summary>Solution</summary>

$\left[\frac{x^4}{4}\right]_{-1}^{1} = \frac{1}{4} - \frac{1}{4} = 0$. For the area, split at $0$: $\int_{-1}^{0} x^3 \, dx = -\frac{1}{4}$ and $\int_0^1 x^3 \, dx = \frac{1}{4}$. Area: $\frac{1}{4} + \frac{1}{4} = \frac{1}{2}$.

</details>

4. Find the area enclosed by $f(x) = x + 2$ and $g(x) = x^2$.

<details>
<summary>Solution</summary>

Intersections: $x^2 = x + 2$ gives $x^2 - x - 2 = (x - 2)(x + 1) = 0$, so $x = -1$ and $x = 2$. Between them the line is on top. $A = \int_{-1}^{2} (x + 2 - x^2) \, dx = \left[\frac{x^2}{2} + 2x - \frac{x^3}{3}\right]_{-1}^{2} = \frac{10}{3} - \left(-\frac{7}{6}\right) = \frac{27}{6} = \frac{9}{2}$.

</details>

5. Find the average value of $f(x) = x^2$ on $[0, 3]$.

<details>
<summary>Solution</summary>

$\frac{1}{3 - 0} \int_0^3 x^2 \, dx = \frac{1}{3} \cdot 9 = 3$.

</details>
