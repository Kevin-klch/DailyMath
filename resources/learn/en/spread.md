---
title: Range, Variance and Standard Deviation
category: stochastics
order: 20
level: 2
summary: How far are the values scattered around the average? Range, interquartile range, variance and standard deviation explained step by step.
related: statistics-basics, binomial-distribution, probability-basics
---

An average tells you where the centre of a data set lies – but not how close the values are to it. Two classes can both have a mean test score of 70 points, yet in one class everyone scored between 65 and 75, while in the other the scores range from 20 to 100. **Measures of spread** (or dispersion) capture this difference with a single number.

## Why the average is not enough

Compare these two data sets:

$$A: \ 4, 5, 5, 6 \qquad\qquad B: \ 1, 3, 7, 9$$

Both have mean $5$ and median $5$. But the values in $B$ are far more scattered. We need a number that says "B is more spread out than A".

## The range

The simplest measure is the **range**: the largest value minus the smallest value.

$$\text{range} = x_{\max} - x_{\min}$$

For $A$ the range is $6 - 4 = 2$, for $B$ it is $9 - 1 = 8$.

The range is quick to compute, but it depends only on the two most extreme values. A single outlier can make it huge, even if all other values are close together.

## Quartiles and the interquartile range

A more robust idea is to look at the middle half of the data. Sort the data and split them at the median. The **lower quartile** $Q_1$ is the median of the lower half, the **upper quartile** $Q_3$ is the median of the upper half. The **interquartile range** is

$$\text{IQR} = Q_3 - Q_1$$

About half of all values lie between $Q_1$ and $Q_3$. Like the median, the IQR is hardly affected by outliers. Together with the minimum, the median and the maximum, the quartiles form the five numbers shown in a **box plot**. (There are slightly different conventions for computing quartiles; for large data sets they give practically the same results.)

## Variance and standard deviation

The most important measures of spread use the **deviations** $x_i - \bar{x}$ of each value from the mean. Simply averaging the deviations does not work – they always add up to zero. So we square them first, which makes them all positive and gives large deviations more weight.

The **variance** is the mean of the squared deviations:

$$\sigma^2 = \frac{(x_1 - \bar{x})^2 + (x_2 - \bar{x})^2 + \dots + (x_n - \bar{x})^2}{n} = \frac{1}{n}\sum_{i=1}^{n} (x_i - \bar{x})^2$$

Because of the squaring, the variance has squared units (for example cm²). Taking the square root brings us back to the original unit. That is the **standard deviation**:

$$\sigma = \sqrt{\sigma^2}$$

> **Key idea:** Variance = mean of the squared deviations from the mean. Standard deviation = square root of the variance. The larger they are, the more the data are spread out.

### Example 1

Data: $2, 4, 4, 4, 5, 5, 7, 9$.

1. Mean: $\bar{x} = \frac{40}{8} = 5$.
2. Deviations: $-3, -1, -1, -1, 0, 0, 2, 4$.
3. Squared deviations: $9, 1, 1, 1, 0, 0, 4, 16$, total $32$.
4. Variance: $\sigma^2 = \frac{32}{8} = 4$.
5. Standard deviation: $\sigma = \sqrt{4} = 2$.

On average, the values are "about 2 away" from the mean.

### Example 2: comparing the two data sets

For $A: 4, 5, 5, 6$ the squared deviations are $1, 0, 0, 1$, so $\sigma^2 = \frac{2}{4} = 0.5$ and $\sigma \approx 0.71$.

For $B: 1, 3, 7, 9$ they are $16, 4, 4, 16$, so $\sigma^2 = \frac{40}{4} = 10$ and $\sigma \approx 3.16$.

The standard deviation of $B$ is more than four times as large – exactly what we see by eye.

## A shortcut formula

Instead of computing every deviation, you can use

$$\sigma^2 = \overline{x^2} - \bar{x}^2$$

that is: the mean of the squares minus the square of the mean. For Example 1: the squares are $4, 16, 16, 16, 25, 25, 49, 81$ with total $232$, so $\overline{x^2} = 29$ and $\sigma^2 = 29 - 5^2 = 4$. Same result.

## Population or sample?

If your data are a **sample** taken from a larger population and you want to estimate the spread of the whole population, divide by $n - 1$ instead of $n$:

$$s^2 = \frac{1}{n - 1}\sum_{i=1}^{n} (x_i - \bar{x})^2$$

This **sample variance** is slightly larger and corrects for the fact that a sample tends to underestimate the true spread. For Example 1 it would be $s^2 = \frac{32}{7} \approx 4.57$ and $s \approx 2.14$. Calculators often show both versions, labelled $\sigma$ (or $\sigma_n$) and $s$ (or $\sigma_{n-1}$).

> **Key idea:** Divide by $n$ when your data are the whole population, by $n - 1$ when they are a sample used to estimate a population.

## How spread reacts to changes

- Adding the same number to every value shifts the mean but does **not** change the range, variance or standard deviation.
- Multiplying every value by a factor $c$ multiplies the range and standard deviation by $|c|$ and the variance by $c^2$.
- The standard deviation is $0$ exactly when all values are equal.

## Common mistakes

- Forgetting to square the deviations – the plain deviations always sum to zero.
- Giving the variance as the answer when the standard deviation was asked for (or the other way round).
- Mixing up the population formula (divide by $n$) and the sample formula (divide by $n - 1$).
- Confusing $\overline{x^2}$ (the mean of the squares) with $\bar{x}^2$ (the square of the mean) in the shortcut formula.
- Judging spread by the range alone when there are outliers.

## Practice

1. Find the range of $12, 7, 19, 3, 15$.

<details>
<summary>Solution</summary>

Largest value $19$, smallest value $3$, so the range is $19 - 3 = 16$.

</details>

2. Calculate the variance and standard deviation of $3, 5, 7, 9, 11$ (divide by $n$).

<details>
<summary>Solution</summary>

Mean: $\frac{35}{5} = 7$. Deviations: $-4, -2, 0, 2, 4$. Squares: $16, 4, 0, 4, 16$, total $40$. Variance: $\frac{40}{5} = 8$. Standard deviation: $\sqrt{8} \approx 2.83$.

</details>

3. A data set consists of $10, 10, 10, 10$. What is its standard deviation, and what does that mean?

<details>
<summary>Solution</summary>

The mean is $10$ and every deviation is $0$, so $\sigma = 0$. A standard deviation of zero means there is no spread at all – all values are identical.

</details>

4. The values $1, 3, 5, 7$ are a sample. Calculate the sample variance $s^2$ and the sample standard deviation $s$.

<details>
<summary>Solution</summary>

Mean: $4$. Squared deviations: $9, 1, 1, 9$, total $20$. Sample variance: $s^2 = \frac{20}{4 - 1} = \frac{20}{3} \approx 6.67$. Sample standard deviation: $s \approx 2.58$.

</details>

5. A data set has standard deviation $3$. What is the standard deviation if you (a) add $5$ to every value, (b) double every value?

<details>
<summary>Solution</summary>

(a) Shifting all values does not change the spread: still $3$. (b) Doubling all values doubles every deviation, so the standard deviation becomes $2 \cdot 3 = 6$ (and the variance grows from $9$ to $36$).

</details>
