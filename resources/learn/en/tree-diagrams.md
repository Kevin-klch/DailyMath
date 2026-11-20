---
title: Tree Diagrams and Multi-Step Experiments
category: stochastics
order: 40
level: 2
summary: Flip twice, draw three times: how tree diagrams and the two path rules make probabilities of multi-step experiments easy to calculate.
related: probability-basics, conditional-probability, binomial-distribution, combinatorics
---

Many random experiments happen in several steps: a coin is flipped twice, two cards are drawn one after the other, a machine part passes three quality checks. A **tree diagram** shows every possible course of such an experiment at a glance, and two simple rules turn it into probabilities. Tree diagrams are the main tool for almost every multi-step probability problem in school.

## Building a tree diagram

A tree diagram starts at a single point (the root). For the first step, draw one branch for each possible outcome and write its probability on the branch. From the end of each branch, draw the branches for the second step, and so on.

For two flips of a fair coin (H = heads, T = tails) the tree has two branches at the first level and two more at the end of each of them – four **paths** in total:

| Path | Probability |
|---|---|
| H, H | $\frac{1}{2} \cdot \frac{1}{2} = \frac{1}{4}$ |
| H, T | $\frac{1}{2} \cdot \frac{1}{2} = \frac{1}{4}$ |
| T, H | $\frac{1}{2} \cdot \frac{1}{2} = \frac{1}{4}$ |
| T, T | $\frac{1}{2} \cdot \frac{1}{2} = \frac{1}{4}$ |

At every branching point, the probabilities on the outgoing branches must add up to $1$ – one of the outcomes is certain to happen.

## The two path rules

> **Key idea:** **Product rule:** the probability of a path is the product of the probabilities along that path. **Sum rule:** the probability of an event is the sum of the probabilities of all paths that belong to it.

Why multiply? If the first step has probability $\frac{1}{2}$, then in the long run only half of all runs even get onto this branch. Of those, again only a certain fraction continues along the next branch. Taking "a fraction of a fraction" means multiplying.

Why add? Different paths can never happen at the same time, so their probabilities can simply be added.

### Example 1

Two coin flips. Probability of **exactly one head**: the paths H, T and T, H belong to this event, so

$$P(\text{exactly one head}) = \frac{1}{4} + \frac{1}{4} = \frac{1}{2}$$

## With and without replacement

When drawing from an urn, it matters whether the drawn object is put back.

- **With replacement:** the contents of the urn stay the same, so the probabilities are identical at every step.
- **Without replacement:** after each draw there is one object fewer, so the probabilities in later steps change.

### Example 2: with replacement

An urn contains 3 red (R) and 2 blue (B) balls. Draw a ball, note the colour, put it back and draw again.

$$P(RR) = \frac{3}{5} \cdot \frac{3}{5} = \frac{9}{25}, \qquad P(BB) = \frac{2}{5} \cdot \frac{2}{5} = \frac{4}{25}$$

One of each colour can happen in two orders:

$$P(\text{one of each}) = \frac{3}{5} \cdot \frac{2}{5} + \frac{2}{5} \cdot \frac{3}{5} = \frac{12}{25}$$

Check: $\frac{9}{25} + \frac{4}{25} + \frac{12}{25} = 1$.

### Example 3: without replacement

Same urn, but the first ball is **not** put back. If the first ball was red, there are 2 red and 2 blue left; if it was blue, there are 3 red and 1 blue left.

$$P(RR) = \frac{3}{5} \cdot \frac{2}{4} = \frac{3}{10}, \qquad P(RB) = \frac{3}{5} \cdot \frac{2}{4} = \frac{3}{10}$$

$$P(BR) = \frac{2}{5} \cdot \frac{3}{4} = \frac{3}{10}, \qquad P(BB) = \frac{2}{5} \cdot \frac{1}{4} = \frac{1}{10}$$

So $P(\text{one of each}) = \frac{3}{10} + \frac{3}{10} = \frac{3}{5}$. The four paths again add up to $1$.

## "At least one": use the complement

Questions like "at least one hit in three attempts" would need many paths. The opposite event "no hit at all" is just a single path. So calculate that and subtract from 1.

> **Key idea:** $P(\text{at least one}) = 1 - P(\text{none})$.

### Example 4

A basketball player scores a free throw with probability $0.8$, independently each time. She takes three throws. The probability of missing all three is the single path "miss, miss, miss":

$$P(\text{no hit}) = 0.2 \cdot 0.2 \cdot 0.2 = 0.008$$

$$P(\text{at least one hit}) = 1 - 0.008 = 0.992$$

## Reduced trees

You do not always have to draw every branch. If you only care about one particular outcome per step (for example "six" or "not six"), two branches per step are enough. And you can leave out parts of the tree that are irrelevant for the question – just make sure the paths you do use are complete.

## Common mistakes

- Adding along a path instead of multiplying, or multiplying different paths instead of adding them.
- Forgetting to adjust the probabilities in later steps when drawing without replacement.
- Forgetting that "one of each colour" can occur in several orders, so several paths count.
- Branch probabilities at a point that do not add up to 1 – always check.
- Calculating "at least one" path by path when the complement would be much quicker.

## Practice

1. A fair coin is flipped three times. What is the probability of exactly two heads?

<details>
<summary>Solution</summary>

Each of the $2^3 = 8$ paths has probability $\frac{1}{8}$. Exactly two heads: HHT, HTH, THH – three paths. So $P = \frac{3}{8}$.

</details>

2. An urn contains 4 red balls and 1 white ball. Two balls are drawn without replacement. What is the probability that both are red?

<details>
<summary>Solution</summary>

$P(RR) = \frac{4}{5} \cdot \frac{3}{4} = \frac{12}{20} = \frac{3}{5}$.

</details>

3. On the way to school there are two traffic lights that work independently of each other. Each one is green with probability $0.4$. What is the probability that exactly one of them is green?

<details>
<summary>Solution</summary>

Two paths: green–red and red–green. $P = 0.4 \cdot 0.6 + 0.6 \cdot 0.4 = 0.24 + 0.24 = 0.48$.

</details>

4. A box contains 5 light bulbs, 2 of which are defective. Three bulbs are taken out one after the other without replacement. What is the probability that none of them is defective?

<details>
<summary>Solution</summary>

There are 3 working bulbs. $P = \frac{3}{5} \cdot \frac{2}{4} \cdot \frac{1}{3} = \frac{6}{60} = \frac{1}{10}$.

</details>

5. A die is rolled three times. What is the probability of rolling at least one six?

<details>
<summary>Solution</summary>

Complement: no six in three rolls, $P = \left(\frac{5}{6}\right)^3 = \frac{125}{216}$. So $P(\text{at least one six}) = 1 - \frac{125}{216} = \frac{91}{216} \approx 0.42$.

</details>
