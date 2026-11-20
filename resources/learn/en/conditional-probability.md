---
title: Conditional Probability
category: stochastics
order: 60
level: 3
summary: How probabilities change when you already know something – conditional probability, two-way tables, independence, total probability and Bayes' theorem.
related: tree-diagrams, probability-basics, binomial-distribution
---

Probabilities depend on what you know. The chance that a randomly chosen person is over 1.90 m tall is small – but if you know the person plays professional basketball, it is much larger. **Conditional probability** describes exactly this: the probability of an event **given** that another event has already occurred. It is the key to understanding medical tests, spam filters and many surprising paradoxes.

## Definition

The probability of $B$ given $A$ is written $P(B \mid A)$ (read "probability of B given A"). Knowing that $A$ has occurred, we only look at the outcomes inside $A$ – $A$ becomes our new sample space. Of these, the ones that also belong to $B$ are favourable:

$$P(B \mid A) = \frac{P(A \cap B)}{P(A)} \qquad \text{for } P(A) > 0$$

> **Key idea:** $P(B \mid A)$ is the share of $B$ within $A$: divide the probability of "both" by the probability of the condition.

### Example 1

Roll a fair die. Given that the number is even, what is the probability that it is a 6?

$A = \{2, 4, 6\}$ and $A \cap B = \{6\}$, so

$$P(6 \mid \text{even}) = \frac{1/6}{3/6} = \frac{1}{3}$$

Without the extra information the probability would be $\frac{1}{6}$. Knowing "even" doubles it.

## Two-way tables

When data are classified by two features, a **two-way table** makes conditional probabilities easy to read.

### Example 2

In a class of 30 students, 18 are girls and 12 are boys. 6 of the girls and 2 of the boys wear glasses.

| | glasses | no glasses | total |
|---|---|---|---|
| girl | 6 | 12 | 18 |
| boy | 2 | 10 | 12 |
| total | 8 | 22 | 30 |

A student is chosen at random.

- Given that it is a girl, the probability of glasses is $P(\text{glasses} \mid \text{girl}) = \frac{6}{18} = \frac{1}{3}$. We only look at the row "girl".
- Given that the student wears glasses, the probability of a girl is $P(\text{girl} \mid \text{glasses}) = \frac{6}{8} = \frac{3}{4}$. Now we only look at the column "glasses".

The two results are different: $P(B \mid A)$ and $P(A \mid B)$ are generally **not** the same.

## The multiplication rule

Rearranging the definition gives

$$P(A \cap B) = P(A) \cdot P(B \mid A)$$

This is exactly the product rule for tree diagrams: the probabilities on the second level of a tree are conditional probabilities. For example, when drawing without replacement, "red on the second draw" has a different probability depending on what happened first.

## Independence

Two events are **independent** if knowing that one occurred does not change the probability of the other: $P(B \mid A) = P(B)$. Equivalently:

$$P(A \cap B) = P(A) \cdot P(B)$$

> **Key idea:** $A$ and $B$ are independent exactly when $P(A \cap B) = P(A) \cdot P(B)$. Only then may you multiply the plain probabilities.

### Example 3

Roll a die. $A$: "even" $= \{2, 4, 6\}$, $B$: "at most 2" $= \{1, 2\}$. Then $A \cap B = \{2\}$ and

$$P(A \cap B) = \frac{1}{6}, \qquad P(A) \cdot P(B) = \frac{1}{2} \cdot \frac{1}{3} = \frac{1}{6}$$

The two values agree, so $A$ and $B$ are independent. In Example 2, on the other hand, $P(\text{glasses} \mid \text{girl}) = \frac{1}{3}$ but $P(\text{glasses}) = \frac{8}{30} \approx 0.27$, so gender and glasses are dependent in that class.

Do not confuse independent with mutually exclusive: if $A$ and $B$ exclude each other and both have positive probability, then knowing $A$ tells you that $B$ did **not** happen – they are strongly dependent.

## Total probability and Bayes' theorem

Often the conditional probabilities are given "in the wrong direction". Then a tree diagram helps.

**Law of total probability:** if $A$ either occurs or not, then

$$P(B) = P(A) \cdot P(B \mid A) + P(\overline{A}) \cdot P(B \mid \overline{A})$$

**Bayes' theorem** reverses the condition:

$$P(A \mid B) = \frac{P(A) \cdot P(B \mid A)}{P(B)}$$

### Example 4: a medical test

A disease affects $1\,\%$ of the population. A test detects it in $90\,\%$ of sick people, but also gives a (false) positive result for $5\,\%$ of healthy people. Someone tests positive. How likely is it that they are actually sick?

Let $S$ = "sick" and $T$ = "positive test". Total probability of a positive test:

$$P(T) = 0.01 \cdot 0.9 + 0.99 \cdot 0.05 = 0.009 + 0.0495 = 0.0585$$

Bayes' theorem:

$$P(S \mid T) = \frac{0.009}{0.0585} \approx 0.154$$

Only about $15\,\%$! The reason: the disease is rare, so the many healthy people produce more false positives than the few sick people produce true positives. Imagine 10000 people: 100 are sick, 90 of them test positive; of the 9900 healthy, 495 test positive. Of the 585 positives, only 90 are sick.

## Common mistakes

- Confusing $P(B \mid A)$ with $P(A \mid B)$ – for example, mixing up "the test is positive if you are sick" with "you are sick if the test is positive".
- Dividing by the total instead of by the probability of the condition.
- Multiplying $P(A) \cdot P(B)$ for events that are not independent.
- Thinking that mutually exclusive events are independent.
- Ignoring how rare an event is to begin with (the base rate).

## Practice

1. Two dice are rolled. Given that the sum is 8, what is the probability that both dice show the same number?

<details>
<summary>Solution</summary>

Sum 8: $(2,6), (3,5), (4,4), (5,3), (6,2)$ – five equally likely pairs. Only $(4,4)$ is a double. So $P = \frac{1}{5}$.

</details>

2. $P(A) = 0.6$ and $P(A \cap B) = 0.15$. Calculate $P(B \mid A)$.

<details>
<summary>Solution</summary>

$P(B \mid A) = \frac{0.15}{0.6} = 0.25$.

</details>

3. $P(A) = 0.5$, $P(B) = 0.4$ and $P(A \cap B) = 0.2$. Are $A$ and $B$ independent?

<details>
<summary>Solution</summary>

$P(A) \cdot P(B) = 0.5 \cdot 0.4 = 0.2 = P(A \cap B)$. Yes, they are independent.

</details>

4. Machine X produces $60\,\%$ of all parts in a factory, machine Y produces $40\,\%$. $2\,\%$ of the parts from X and $5\,\%$ of the parts from Y are defective. (a) What percentage of all parts are defective? (b) A defective part is found. What is the probability that it came from Y?

<details>
<summary>Solution</summary>

(a) $P(D) = 0.6 \cdot 0.02 + 0.4 \cdot 0.05 = 0.012 + 0.02 = 0.032$, so $3.2\,\%$. (b) $P(Y \mid D) = \frac{0.4 \cdot 0.05}{0.032} = \frac{0.02}{0.032} = 0.625$, so $62.5\,\%$.

</details>
