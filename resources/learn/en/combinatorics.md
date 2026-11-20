---
title: Combinatorics
category: stochastics
order: 50
level: 2
summary: The art of counting without listing everything – the counting principle, factorials, permutations and combinations with clear rules for when to use which.
related: probability-basics, binomial-distribution, tree-diagrams
---

How many different PIN codes are there? In how many ways can a class elect a speaker and a deputy? How likely is it to win the lottery? Questions like these are about **counting possibilities** – often far too many to write them all down. **Combinatorics** provides a handful of formulas that do the counting for you, and it is the basis for many probability calculations.

## The basic counting principle

Everything in combinatorics builds on one simple rule.

> **Key idea:** If a choice happens in several steps, with $n_1$ options in the first step, $n_2$ in the second, and so on, then the total number of possibilities is $n_1 \cdot n_2 \cdot \ldots \cdot n_k$.

### Example 1

You have 3 shirts and 4 pairs of trousers. For each shirt there are 4 trousers to choose from, so there are $3 \cdot 4 = 12$ different outfits. With 2 pairs of shoes on top it would be $3 \cdot 4 \cdot 2 = 24$.

You can picture this as a tree diagram: 3 branches, each splitting into 4 – that makes 12 paths.

## Two key questions

Most counting problems can be described as choosing $k$ objects from $n$ objects. To pick the right formula, ask two questions:

1. **Does the order matter?** (Is "Anna then Ben" different from "Ben then Anna"?)
2. **Can an object be chosen more than once?** (with or without repetition)

## Ordered, with repetition

Each of the $k$ positions can be filled with any of the $n$ objects:

$$n \cdot n \cdot \ldots \cdot n = n^k$$

### Example 2

A PIN consists of 4 digits, each from 0 to 9, and digits may repeat. There are $10^4 = 10000$ possible PINs.

## Ordered, without repetition: permutations

If every object can only be used once, the number of options shrinks by one at each step.

**Arranging all $n$ objects** in a row: $n$ choices for the first place, $n - 1$ for the second, and so on down to $1$. This product is called **$n$ factorial**:

$$n! = n \cdot (n - 1) \cdot \ldots \cdot 2 \cdot 1$$

By definition $0! = 1$. Factorials grow extremely fast: $5! = 120$, but $10! = 3628800$.

**Choosing and arranging only $k$ of the $n$ objects:**

$$n \cdot (n - 1) \cdot \ldots \cdot (n - k + 1) = \frac{n!}{(n - k)!}$$

### Example 3

Five books can be arranged on a shelf in $5! = 120$ ways.

### Example 4

Eight runners compete in a race. How many different podiums (gold, silver, bronze) are possible? Order matters and nobody can win two medals:

$$8 \cdot 7 \cdot 6 = 336$$

## Unordered, without repetition: combinations

If the order does **not** matter – you choose a group, not a ranking – every group of $k$ objects was counted $k!$ times in the ordered count (once for each arrangement). So divide by $k!$. The result is the **binomial coefficient**, read "$n$ choose $k$":

$$\binom{n}{k} = \frac{n!}{k! \cdot (n - k)!}$$

> **Key idea:** Ordered selections without repetition: $\frac{n!}{(n-k)!}$. If the order does not matter, divide by $k!$ and you get $\binom{n}{k}$.

### Example 5

A committee of 3 people is chosen from 10. The order does not matter:

$$\binom{10}{3} = \frac{10 \cdot 9 \cdot 8}{3 \cdot 2 \cdot 1} = \frac{720}{6} = 120$$

Tip: cancel before multiplying. You never need to compute $10!$ in full.

### Example 6: the lottery

In a "6 out of 49" lottery, 6 numbers are drawn from 49, and the order does not matter. The number of possible tickets is

$$\binom{49}{6} = \frac{49 \cdot 48 \cdot 47 \cdot 46 \cdot 45 \cdot 44}{6!} = 13{,}983{,}816$$

So the probability of six correct numbers with one ticket is $\frac{1}{13983816}$ – roughly 1 in 14 million.

Useful facts about binomial coefficients: $\binom{n}{0} = \binom{n}{n} = 1$, $\binom{n}{1} = n$ and $\binom{n}{k} = \binom{n}{n - k}$ (choosing who is in the group is the same as choosing who is left out).

## Unordered, with repetition

This case is rarer. Choosing $k$ objects from $n$ types when repetition is allowed and order does not matter gives $\binom{n + k - 1}{k}$ possibilities. For example, 3 scoops of ice cream from 5 flavours (the same flavour may appear more than once) can be chosen in $\binom{7}{3} = 35$ ways.

## Overview

| | with repetition | without repetition |
|---|---|---|
| ordered | $n^k$ | $\frac{n!}{(n-k)!}$ |
| unordered | $\binom{n+k-1}{k}$ | $\binom{n}{k}$ |

## Arrangements with identical objects

If some of the objects are identical, swapping them does not create a new arrangement. The word ANNA has 4 letters, but the two A's and the two N's are identical, so instead of $4! = 24$ there are only

$$\frac{4!}{2! \cdot 2!} = \frac{24}{4} = 6$$

different arrangements: AANN, ANAN, ANNA, NAAN, NANA, NNAA.

## Common mistakes

- Using a combination when the order matters (or a permutation when it does not). Ask: would swapping two chosen objects give a different result?
- Adding the options of the steps instead of multiplying them.
- Forgetting that $0! = 1$.
- Computing huge factorials completely instead of cancelling first.
- Ignoring identical objects and counting the same arrangement several times.

## Practice

1. In how many ways can the letters of the word MATH be arranged?

<details>
<summary>Solution</summary>

Four different letters, all used once: $4! = 4 \cdot 3 \cdot 2 \cdot 1 = 24$.

</details>

2. How many codes of three letters (A to Z, repetition allowed) are there?

<details>
<summary>Solution</summary>

Ordered, with repetition: $26^3 = 17576$.

</details>

3. A club with 12 members elects a president, a vice president and a treasurer. Nobody can hold two positions. How many outcomes are possible?

<details>
<summary>Solution</summary>

Order matters (the positions are different), no repetition: $12 \cdot 11 \cdot 10 = 1320$.

</details>

4. At a party, each of 10 guests shakes hands with every other guest exactly once. How many handshakes are there?

<details>
<summary>Solution</summary>

A handshake is a pair of people, and the order does not matter: $\binom{10}{2} = \frac{10 \cdot 9}{2} = 45$.

</details>

5. From a group of 6 girls and 4 boys, a team of 2 girls and 2 boys is chosen. How many different teams are possible?

<details>
<summary>Solution</summary>

Choose the girls and the boys separately and multiply: $\binom{6}{2} \cdot \binom{4}{2} = 15 \cdot 6 = 90$.

</details>
