---
title: Probability Basics
category: stochastics
order: 30
level: 1
summary: Outcomes, events and how likely they are – the language of chance, equally likely outcomes, complements and the addition rule.
related: tree-diagrams, combinatorics, conditional-probability, statistics-basics
---

Rolling a die, drawing a card or flipping a coin: we cannot predict the result, but we can say how **likely** each result is. Probability theory turns this vague feeling into numbers between 0 and 1. These numbers help with games, but also with weather forecasts, insurance, medicine and quality control.

## Experiments, outcomes and events

A **random experiment** is a process whose result cannot be predicted with certainty, but whose possible results are known. Each possible result is an **outcome**. The set of all outcomes is the **sample space**, usually written $\Omega$ (omega) or $S$.

For one roll of a die:

$$\Omega = \{1, 2, 3, 4, 5, 6\}$$

An **event** is a set of outcomes – any statement about the result that is either true or false. "The number is even" is the event $A = \{2, 4, 6\}$. An event **occurs** if the actual outcome belongs to it.

Two special events: the **certain event** $\Omega$ always occurs, the **impossible event** $\emptyset$ (the empty set) never occurs.

## Probability as a number

The probability of an event $A$ is written $P(A)$. It always satisfies

$$0 \le P(A) \le 1$$

where $0$ means impossible and $1$ means certain. Probabilities can be given as fractions, decimals or percentages: $\frac{1}{4} = 0.25 = 25\,\%$.

## Equally likely outcomes

If all outcomes are **equally likely** – a fair die, a well-shuffled deck, a fair coin – the probability of an event is simply a ratio of counts:

$$P(A) = \frac{\text{number of outcomes in } A}{\text{number of all outcomes}} = \frac{|A|}{|\Omega|}$$

> **Key idea:** For equally likely outcomes, probability = favourable outcomes divided by possible outcomes.

### Example 1

Roll a fair die. Probability of an even number: $A = \{2, 4, 6\}$, so $P(A) = \frac{3}{6} = \frac{1}{2}$.

Probability of at least 5: $B = \{5, 6\}$, so $P(B) = \frac{2}{6} = \frac{1}{3}$.

### Example 2

A bag contains 3 red, 5 blue and 2 green marbles. One marble is drawn at random. Each of the 10 marbles is equally likely, so

$$P(\text{red}) = \frac{3}{10}, \qquad P(\text{blue}) = \frac{5}{10} = \frac{1}{2}, \qquad P(\text{green}) = \frac{2}{10} = \frac{1}{5}$$

The three probabilities add up to $1$, as they must – one of the colours is certain to be drawn.

### Example 3: two dice

Roll two dice. It is tempting to think of the 11 possible sums $2, 3, \dots, 12$ as outcomes – but they are **not** equally likely. The equally likely outcomes are the $6 \cdot 6 = 36$ ordered pairs $(1,1), (1,2), \dots, (6,6)$. The sum 7 comes from $(1,6), (2,5), (3,4), (4,3), (5,2), (6,1)$, so

$$P(\text{sum } 7) = \frac{6}{36} = \frac{1}{6}$$

whereas the sum 2 only comes from $(1,1)$ and has probability $\frac{1}{36}$.

## Relative frequency

Not every experiment has equally likely outcomes – a drawing pin can land on its head or on its side. Then you can estimate probabilities by repeating the experiment many times. The **relative frequency** of an event is

$$\text{relative frequency} = \frac{\text{number of times } A \text{ occurred}}{\text{number of trials}}$$

The **law of large numbers** says: the more often you repeat the experiment, the closer the relative frequency tends to get to the true probability. After 10 coin flips you might easily have 7 heads, but after 10000 flips the share of heads will almost surely be very close to $50\,\%$.

## The complement

The **complement** $\overline{A}$ of an event $A$ is "$A$ does not occur". Since exactly one of $A$ and $\overline{A}$ happens,

$$P(\overline{A}) = 1 - P(A)$$

This is extremely useful when the opposite is easier to count, especially for "at least one" questions.

### Example 4

Roll two dice. What is the probability of at least one six? The complement is "no six at all": both dice show one of 5 numbers, which happens in $5 \cdot 5 = 25$ of the 36 cases. So

$$P(\text{at least one six}) = 1 - \frac{25}{36} = \frac{11}{36}$$

## The addition rule

The event "$A$ or $B$" (at least one of them occurs) is written $A \cup B$, the event "$A$ and $B$" is $A \cap B$. If you add $P(A)$ and $P(B)$, the outcomes in both events are counted twice, so you subtract them once:

$$P(A \cup B) = P(A) + P(B) - P(A \cap B)$$

If $A$ and $B$ cannot happen together (they are **mutually exclusive**), then $P(A \cap B) = 0$ and you can simply add.

> **Key idea:** $P(\overline{A}) = 1 - P(A)$, and $P(A \cup B) = P(A) + P(B) - P(A \cap B)$.

### Example 5

Roll a die. $A$: "even" $= \{2, 4, 6\}$, $B$: "at least 4" $= \{4, 5, 6\}$. Both: $A \cap B = \{4, 6\}$.

$$P(A \cup B) = \frac{3}{6} + \frac{3}{6} - \frac{2}{6} = \frac{4}{6} = \frac{2}{3}$$

Check: $A \cup B = \{2, 4, 5, 6\}$ really has 4 elements.

## Common mistakes

- Using the counting formula when the outcomes are not equally likely (like the sums of two dice).
- Treating $(1,2)$ and $(2,1)$ as the same outcome when rolling two dice – they are different.
- Adding probabilities of events that overlap without subtracting the overlap.
- Getting a probability greater than 1 or negative – a sure sign of an error.
- Believing in the "gambler's fallacy": after five heads in a row, tails is **not** more likely on the next flip.

## Practice

1. Roll a fair die. What is the probability of rolling a prime number?

<details>
<summary>Solution</summary>

The primes among $1, \dots, 6$ are $2, 3, 5$. So $P = \frac{3}{6} = \frac{1}{2}$.

</details>

2. An urn contains 4 red and 6 white balls. What is the probability that a randomly drawn ball is not red?

<details>
<summary>Solution</summary>

$P(\text{red}) = \frac{4}{10}$, so $P(\text{not red}) = 1 - \frac{4}{10} = \frac{6}{10} = \frac{3}{5}$.

</details>

3. Roll two dice. What is the probability that the sum is 10?

<details>
<summary>Solution</summary>

The favourable pairs are $(4,6), (5,5), (6,4)$ – three of 36 equally likely pairs. So $P = \frac{3}{36} = \frac{1}{12}$.

</details>

4. A number from 1 to 20 is chosen at random. What is the probability that it is divisible by 3 or by 5?

<details>
<summary>Solution</summary>

Divisible by 3: $3, 6, 9, 12, 15, 18$ (6 numbers). Divisible by 5: $5, 10, 15, 20$ (4 numbers). Both: only $15$. By the addition rule $P = \frac{6}{20} + \frac{4}{20} - \frac{1}{20} = \frac{9}{20}$.

</details>
