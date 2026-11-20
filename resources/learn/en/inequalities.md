---
title: Inequalities
category: algebra
order: 50
level: 2
summary: How to solve linear inequalities, why the inequality sign flips when you multiply by a negative number, and how to write the solution set.
related: linear-equations, absolute-value, negative-numbers
---

An inequality compares two expressions with one of the signs $<$, $>$, $\leq$ or $\geq$ instead of an equals sign. Inequalities describe limits and conditions: "at most 30 people", "faster than 50 km/h", "the cheaper plan". Solving them works almost exactly like solving linear equations – with one important exception that you need to know.

## The symbols

- $a < b$: $a$ is **less than** $b$.
- $a > b$: $a$ is **greater than** $b$.
- $a \leq b$: $a$ is less than **or equal to** $b$.
- $a \geq b$: $a$ is greater than or equal to $b$.

The open side of the sign always faces the larger number. You can also read an inequality backwards: $4 > x$ means the same as $x < 4$.

## Solutions are ranges

An equation like $x + 2 = 5$ usually has a single solution. An inequality like $x + 2 < 5$ has infinitely many: every number less than $3$ works – $2$, $0$, $-10$, $2.99$ … The solution is a **range** of numbers.

You can write this solution in several ways:

- as an inequality: $x < 3$,
- in set notation: $\{x \mid x < 3\}$,
- in interval notation: $(-\infty, 3)$,
- on a number line: an open circle at $3$ with an arrow to the left.

In interval notation a round bracket means the endpoint is **not** included, a square bracket means it **is** included. So $x \geq -2$ is $[-2, \infty)$, and on the number line it gets a filled circle at $-2$.

## Allowed steps

You may do the same things as with equations:

- add or subtract the same number or term on both sides,
- multiply or divide both sides by the same **positive** number.

None of these change the direction of the sign.

## The exception: negative numbers

Start with the true statement $2 < 5$ and multiply both sides by $-1$. You get $-2$ and $-5$ – but $-2$ is *greater* than $-5$. The order has reversed. Multiplying by a negative number mirrors the numbers on the number line, so the bigger one becomes the smaller one.

> **Key idea:** When you multiply or divide both sides of an inequality by a **negative** number, you must **reverse** the inequality sign: $<$ becomes $>$, and $\leq$ becomes $\geq$.

## Worked examples

### Example 1

$$2x + 3 < 11$$

Subtract $3$: $2x < 8$. Divide by $2$ (positive, sign stays): $x < 4$.

### Example 2

$$-3x + 4 \geq 13$$

Subtract $4$: $-3x \geq 9$. Divide by $-3$ – **flip the sign**: $x \leq -3$.

Check with $x = -4$: $-3 \cdot (-4) + 4 = 16 \geq 13$. True. With $x = 0$: $4 \geq 13$ is false, as expected.

### Example 3: variable on both sides

$$5x - 2 > 3x + 6$$

Subtract $3x$: $2x - 2 > 6$. Add $2$: $2x > 8$. So $x > 4$.

### Example 4: brackets

$$2(x - 1) \leq 4x + 6$$

Expand: $2x - 2 \leq 4x + 6$. Subtract $4x$: $-2x - 2 \leq 6$. Add $2$: $-2x \leq 8$. Divide by $-2$ and flip: $x \geq -4$.

You can avoid the flip by collecting $x$ on the side where its coefficient stays positive: subtract $2x$ and $6$ instead to get $-8 \leq 2x$, so $-4 \leq x$. Same answer.

> **Key idea:** Test your answer with one number inside the solution range and one outside. The inequality should be true for the first and false for the second.

## Double inequalities

An inequality like $-1 < 2x + 3 \leq 9$ contains two conditions at once. Apply each step to **all three parts**:

$$-1 < 2x + 3 \leq 9 \quad\Rightarrow\quad -4 < 2x \leq 6 \quad\Rightarrow\quad -2 < x \leq 3$$

In interval notation: $(-2, 3]$.

## Common mistakes

- Forgetting to flip the sign when dividing by a negative number.
- Flipping the sign when *subtracting* a number – subtracting never flips it, even if the number is negative.
- Mixing up open and closed endpoints: $x < 3$ does not include $3$, $x \leq 3$ does.
- Treating the solution as a single number: "$x = 4$" instead of "$x < 4$".
- In double inequalities, changing only two of the three parts.

## Practice

1. Solve $4x - 5 > 7$.

<details>
<summary>Solution</summary>

Add $5$: $4x > 12$. Divide by $4$: $x > 3$.

</details>

2. Solve $6 - 2x \geq 10$.

<details>
<summary>Solution</summary>

Subtract $6$: $-2x \geq 4$. Divide by $-2$ and flip: $x \leq -2$.

</details>

3. Solve $3(x + 1) < 5x - 7$.

<details>
<summary>Solution</summary>

$3x + 3 < 5x - 7$. Subtract $3x$ and add $7$: $10 < 2x$, so $x > 5$.

</details>

4. Solve $-3 \leq 2x - 1 < 5$ and list all whole numbers in the solution.

<details>
<summary>Solution</summary>

Add $1$: $-2 \leq 2x < 6$. Divide by $2$: $-1 \leq x < 3$. Whole numbers: $-1$, $0$, $1$, $2$.

</details>

5. Plan A costs 15 € per month plus 2 € per gigabyte. Plan B costs 35 € per month flat. For how many gigabytes is plan A cheaper?

<details>
<summary>Solution</summary>

With $g$ gigabytes: $15 + 2g < 35$, so $2g < 20$ and $g < 10$. Plan A is cheaper for less than 10 GB.

</details>
