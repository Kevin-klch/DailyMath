---
title: Optimization Problems
category: calculus
order: 70
level: 3
summary: The largest area, the smallest cost, the biggest volume – how to turn a word problem into a function and find its best value with derivatives.
related: curve-sketching, differentiation-rules, quadratic-functions
---

How should you fence a field to get the largest possible area? How do you fold a box with the greatest volume? **Optimization problems** ask for the best possible value of some quantity under given conditions. With derivatives you can solve them exactly – the hardest part is usually setting up the right function.

## The strategy

Almost every optimization problem can be solved with the same recipe:

1. **Target function:** which quantity should be maximized or minimized? Write a formula for it – often it contains two variables at first.
2. **Constraint:** which condition links the variables? Write it as an equation.
3. **One variable:** solve the constraint for one variable and substitute it into the target function.
4. **Domain:** which values make sense in the real situation (lengths must be positive, etc.)?
5. **Extremum:** set the derivative to zero and check with the second derivative.
6. **Endpoints and answer:** compare with the values at the edges of the domain if necessary, and answer the actual question in a full sentence with units.

> **Key idea:** Target function + constraint → function of one variable → derivative equals zero → check that it really is the maximum or minimum you want.

## Example 1: the largest rectangle

A farmer has $40$ m of fence and wants to enclose a rectangular area that is as large as possible.

**Target function:** area $A = a \cdot b$.

**Constraint:** perimeter $2a + 2b = 40$, so $b = 20 - a$.

**One variable:** $A(a) = a(20 - a) = 20a - a^2$.

**Domain:** $0 < a < 20$.

**Extremum:** $A'(a) = 20 - 2a = 0$ gives $a = 10$. Since $A''(a) = -2 < 0$, this is a maximum.

**Answer:** $b = 20 - 10 = 10$. The best shape is a square with side $10$ m, giving an area of $100$ m².

## Example 2: the open box

From a square sheet of cardboard with side $12$ cm, equal squares with side $x$ are cut from the corners. The sides are folded up to make an open box. Which $x$ gives the largest volume?

**Target function:** the base is a square with side $12 - 2x$, the height is $x$:

$$V(x) = x(12 - 2x)^2 = 4x^3 - 48x^2 + 144x$$

**Domain:** $0 < x < 6$ (otherwise nothing is left of the base).

**Extremum:**

$$V'(x) = 12x^2 - 96x + 144 = 12(x^2 - 8x + 12) = 12(x - 2)(x - 6)$$

The zeros are $x = 2$ and $x = 6$; only $x = 2$ lies in the domain. $V''(x) = 24x - 96$, so $V''(2) = -48 < 0$: a maximum.

**Answer:** cut out squares with side $2$ cm. The box then has volume $V(2) = 2 \cdot 8^2 = 128$ cm³.

## Example 3: a minimum

Two numbers add up to $10$. When is the sum of their squares as small as possible?

With $x$ and $10 - x$: $S(x) = x^2 + (10 - x)^2$. Then $S'(x) = 2x - 2(10 - x) = 4x - 20 = 0$ gives $x = 5$. $S''(x) = 4 > 0$, so it is a minimum. Both numbers are $5$ and the smallest sum of squares is $50$.

## Watch the edges

The derivative only finds extrema *inside* the domain. If the domain is a closed interval, the largest or smallest value can also lie at an endpoint. For example, if a length may be at most $3$ m and the function is still increasing at $3$, the maximum is at the boundary – where the derivative is not zero at all.

> **Key idea:** On a closed interval, compare the values at the critical points with the values at the endpoints. The largest of them is the global maximum, the smallest the global minimum.

## Common mistakes

- Differentiating a function with two variables – always eliminate one first with the constraint.
- Forgetting the domain and accepting a solution such as $x = 6$ in Example 2, which gives a box with no base.
- Not checking whether the critical point is a maximum or a minimum.
- Stopping after finding $x$ – the question often asks for the area, volume or the other dimension too.

## Practice

1. Two positive numbers add up to $18$. For which numbers is their product as large as possible?

<details>
<summary>Solution</summary>

$P(x) = x(18 - x) = 18x - x^2$. $P'(x) = 18 - 2x = 0$ gives $x = 9$; $P''(x) = -2 < 0$, maximum. Both numbers are $9$, the product is $81$.

</details>

2. A rectangle has an area of $64$ m². Which side lengths give the smallest perimeter?

<details>
<summary>Solution</summary>

From $a \cdot b = 64$: $b = \frac{64}{a}$. Perimeter $P(a) = 2a + \frac{128}{a}$. $P'(a) = 2 - \frac{128}{a^2} = 0$ gives $a^2 = 64$, so $a = 8$ (since $a > 0$). $P''(a) = \frac{256}{a^3} > 0$, minimum. The rectangle is a square with side $8$ m and perimeter $32$ m.

</details>

3. A rectangular field next to a straight river is fenced on three sides only (the river forms the fourth side). There are $60$ m of fence. Find the largest possible area.

<details>
<summary>Solution</summary>

Let $x$ be the two sides perpendicular to the river and $y$ the side parallel to it: $2x + y = 60$, so $y = 60 - 2x$. $A(x) = x(60 - 2x) = 60x - 2x^2$. $A'(x) = 60 - 4x = 0$ gives $x = 15$; $A''(x) = -4 < 0$. Then $y = 30$ and the area is $15 \cdot 30 = 450$ m².

</details>

4. A rectangle has one corner at the origin and the opposite corner on the line $y = -2x + 8$ in the first quadrant. Find the largest possible area.

<details>
<summary>Solution</summary>

The corner is $(x, -2x + 8)$ with $0 < x < 4$. $A(x) = x(-2x + 8) = -2x^2 + 8x$. $A'(x) = -4x + 8 = 0$ gives $x = 2$; $A''(x) = -4 < 0$. The height is $-4 + 8 = 4$, the area $2 \cdot 4 = 8$.

</details>
