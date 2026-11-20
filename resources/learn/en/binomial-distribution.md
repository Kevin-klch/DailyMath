---
title: The Binomial Distribution
category: stochastics
order: 70
level: 3
summary: How likely are exactly k successes in n independent trials? The binomial formula, cumulative probabilities, expected value and standard deviation.
related: tree-diagrams, combinatorics, spread, probability-basics
---

Flip a coin ten times and count the heads. Guess on a multiple-choice test and count the correct answers. Check 50 products and count the defective ones. In all these situations the same experiment is repeated several times, each time with only two possible results, and we count how often one of them occurs. The **binomial distribution** gives the probability for every possible count – it is one of the most important distributions in all of probability theory.

## Bernoulli trials

A **Bernoulli trial** is a random experiment with exactly two outcomes, called **success** and **failure**. The probability of success is $p$, the probability of failure is $1 - p$ (often written $q$).

What counts as "success" is up to you: rolling a six, a part being defective, a patient recovering. It does not have to be something good.

A **Bernoulli chain** of length $n$ consists of $n$ such trials that are

1. **independent** of each other, and
2. have the **same** success probability $p$ every time.

The random variable $X$ = "number of successes" can take the values $0, 1, 2, \dots, n$. If these conditions hold, $X$ is **binomially distributed** with parameters $n$ and $p$.

## The binomial formula

How likely are exactly $k$ successes? Consider one specific path in the tree diagram with $k$ successes and $n - k$ failures, for example success, success, failure, … By the product rule, it has probability

$$p^k \cdot (1 - p)^{n - k}$$

Every path with exactly $k$ successes has this same probability – only the order differs. The number of such paths is the number of ways to choose the $k$ positions of the successes among $n$ trials, which is $\binom{n}{k}$. So:

$$P(X = k) = \binom{n}{k} \cdot p^k \cdot (1 - p)^{n - k}$$

> **Key idea:** $P(X = k) = \binom{n}{k} p^k (1 - p)^{n - k}$. The binomial coefficient counts the paths, the powers give the probability of each path.

### Example 1

A fair coin is flipped 4 times. Let $X$ be the number of heads, so $n = 4$ and $p = 0.5$. Since $p = 1 - p = 0.5$, every path has probability $0.5^4 = \frac{1}{16}$:

| $k$ | 0 | 1 | 2 | 3 | 4 |
|---|---|---|---|---|---|
| $\binom{4}{k}$ | 1 | 4 | 6 | 4 | 1 |
| $P(X = k)$ | $\frac{1}{16}$ | $\frac{4}{16}$ | $\frac{6}{16}$ | $\frac{4}{16}$ | $\frac{1}{16}$ |

Two heads is the most likely result with $\frac{6}{16} = 0.375$. All probabilities add up to $1$.

### Example 2

A die is rolled 5 times. What is the probability of exactly two sixes? Here $n = 5$, $p = \frac{1}{6}$, $k = 2$:

$$P(X = 2) = \binom{5}{2} \cdot \left(\frac{1}{6}\right)^2 \cdot \left(\frac{5}{6}\right)^3 = 10 \cdot \frac{1}{36} \cdot \frac{125}{216} = \frac{1250}{7776} \approx 0.161$$

## "At most" and "at least"

Many questions ask for a range of values. Then you add up the individual probabilities – this is called the **cumulative** probability:

$$P(X \le k) = P(X = 0) + P(X = 1) + \dots + P(X = k)$$

For "at least" questions the complement is usually faster:

$$P(X \ge k) = 1 - P(X \le k - 1)$$

In practice, cumulative probabilities for larger $n$ are taken from a calculator or a table.

### Example 3: guessing on a test

A test has 10 multiple-choice questions with 4 options each. A student guesses every answer, so $n = 10$ and $p = 0.25$.

**At least one correct answer:**

$$P(X \ge 1) = 1 - P(X = 0) = 1 - 0.75^{10} \approx 1 - 0.0563 = 0.9437$$

**At most two correct answers:**

$$P(X = 0) = 0.75^{10} \approx 0.0563$$

$$P(X = 1) = 10 \cdot 0.25 \cdot 0.75^9 \approx 0.1877$$

$$P(X = 2) = 45 \cdot 0.25^2 \cdot 0.75^8 \approx 0.2816$$

$$P(X \le 2) \approx 0.0563 + 0.1877 + 0.2816 = 0.5256$$

So more than half the time, a pure guesser gets at most 2 of 10 answers right.

## Expected value and standard deviation

The **expected value** is the average number of successes you would get if you repeated the whole chain very often. For a binomial distribution it is simply

$$\mu = E(X) = n \cdot p$$

The spread around this value is described by the variance and the standard deviation:

$$\sigma^2 = n \cdot p \cdot (1 - p), \qquad \sigma = \sqrt{n \cdot p \cdot (1 - p)}$$

> **Key idea:** For a binomial distribution, $\mu = np$ and $\sigma = \sqrt{np(1 - p)}$.

For the guessing student in Example 3: $\mu = 10 \cdot 0.25 = 2.5$ correct answers on average, and $\sigma = \sqrt{10 \cdot 0.25 \cdot 0.75} = \sqrt{1.875} \approx 1.37$.

The histogram of a binomial distribution has its peak at or next to $\mu$. For $p = 0.5$ it is symmetric; for small $p$ it leans to the left, for large $p$ to the right. The larger $n$ is, the more it looks like a bell curve, and most of the probability lies within about two standard deviations of $\mu$.

## When is it binomial?

Always check the conditions before using the formula:

- exactly **two** outcomes per trial,
- a **fixed** number $n$ of trials,
- the **same** $p$ in every trial,
- **independent** trials.

Drawing **with** replacement fits. Drawing **without** replacement from a small urn does not, because $p$ changes after every draw. (If the urn is very large compared to the number of draws, the binomial distribution is still a good approximation.)

## Common mistakes

- Forgetting the binomial coefficient and only computing $p^k (1 - p)^{n - k}$ – that is the probability of one single path.
- Mixing up $k$ and $n - k$ in the exponents.
- Reading "at least 3" as $P(X \ge 3) = 1 - P(X \le 3)$ instead of $1 - P(X \le 2)$.
- Using the binomial distribution when $p$ changes, for example when drawing without replacement from a small urn.
- Computing $\sigma = np(1 - p)$ and forgetting the square root.

## Practice

1. A fair coin is flipped 6 times. What is the probability of exactly 3 heads?

<details>
<summary>Solution</summary>

$P(X = 3) = \binom{6}{3} \cdot 0.5^3 \cdot 0.5^3 = 20 \cdot \frac{1}{64} = \frac{20}{64} = \frac{5}{16} = 0.3125$.

</details>

2. A die is rolled 3 times. What is the probability of exactly one six?

<details>
<summary>Solution</summary>

$P(X = 1) = \binom{3}{1} \cdot \frac{1}{6} \cdot \left(\frac{5}{6}\right)^2 = 3 \cdot \frac{1}{6} \cdot \frac{25}{36} = \frac{75}{216} = \frac{25}{72} \approx 0.347$.

</details>

3. $10\,\%$ of the screws from a machine are defective. 5 screws are checked. Find the probability that (a) none is defective, (b) at least one is defective.

<details>
<summary>Solution</summary>

$n = 5$, $p = 0.1$. (a) $P(X = 0) = 0.9^5 = 0.59049 \approx 0.590$. (b) $P(X \ge 1) = 1 - 0.59049 = 0.40951 \approx 0.410$.

</details>

4. $X$ is binomially distributed with $n = 100$ and $p = 0.2$. Calculate the expected value and the standard deviation.

<details>
<summary>Solution</summary>

$\mu = 100 \cdot 0.2 = 20$. $\sigma = \sqrt{100 \cdot 0.2 \cdot 0.8} = \sqrt{16} = 4$.

</details>

5. From an urn with 3 red and 2 blue balls, 3 balls are drawn without replacement. Can the number of red balls be modelled with a binomial distribution?

<details>
<summary>Solution</summary>

No. Without replacement, the probability of red changes after every draw (for example from $\frac{3}{5}$ to $\frac{2}{4}$ after a red ball), so the trials are not independent with a constant $p$. With replacement it would be binomial with $n = 3$ and $p = 0.6$.

</details>
