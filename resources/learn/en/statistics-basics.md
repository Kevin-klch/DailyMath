---
title: Mean, Median and Mode
category: stochastics
order: 10
level: 1
summary: Three ways to describe the "typical" value of a data set – how to calculate the mean, median and mode and when to use which.
related: spread, probability-basics, percentages
---

When you collect data – test scores, temperatures, heights – you usually want a single number that tells you what a "typical" value looks like. Such a number is called a **measure of central tendency** or simply an **average**. The three most important ones are the **mean**, the **median** and the **mode**, and each of them tells a slightly different story.

## The mean

The **mean** (also called the arithmetic mean) is what most people simply call "the average": add up all values and divide by how many there are.

$$\bar{x} = \frac{x_1 + x_2 + \dots + x_n}{n} = \frac{1}{n}\sum_{i=1}^{n} x_i$$

Here $x_1, \dots, x_n$ are the data values and $n$ is the number of values. The symbol $\bar{x}$ is read "x bar".

You can picture the mean as a balance point: if you put equal weights at every data value on a number line, the line would balance exactly at $\bar{x}$. A useful consequence is that the deviations from the mean always add up to zero.

### Example 1

Seven students solved $4, 7, 2, 9, 7, 5, 8$ puzzles in a week.

$$\bar{x} = \frac{4 + 7 + 2 + 9 + 7 + 5 + 8}{7} = \frac{42}{7} = 6$$

On average, each student solved 6 puzzles.

## The median

The **median** is the middle value once the data are **sorted** by size. Half of the values lie below it, half above it.

- If $n$ is **odd**, the median is the value exactly in the middle.
- If $n$ is **even**, there are two middle values; the median is their mean.

### Example 2: odd number of values

Sort the data from Example 1: $2, 4, 5, 7, 7, 8, 9$. There are 7 values, so the 4th one is in the middle. The median is $7$.

### Example 3: even number of values

Data: $10, 3, 16, 6, 8, 5$. Sorted: $3, 5, 6, 8, 10, 16$. The two middle values are $6$ and $8$, so

$$\text{median} = \frac{6 + 8}{2} = 7$$

For comparison, the mean is $\frac{48}{6} = 8$.

> **Key idea:** Always sort the data before looking for the median. With an even number of values, take the mean of the two middle ones.

## The mode

The **mode** is the value that occurs **most often**. In Example 1 the value $7$ appears twice and every other value only once, so the mode is $7$.

A data set can have one mode, several modes (if two or more values are tied for most frequent), or no useful mode at all (if every value occurs exactly once). The mode is the only one of the three measures that also works for non-numerical data: the most popular favourite colour in a class is a mode, but you cannot compute a "mean colour".

## Frequency tables

With many repeated values, data are often given as a table of frequencies. Then you multiply each value by how often it occurs.

### Example 4

The grades of 20 students:

| Grade | 1 | 2 | 3 | 4 | 5 |
|---|---|---|---|---|---|
| Number of students | 2 | 5 | 8 | 4 | 1 |

Mean:

$$\bar{x} = \frac{1 \cdot 2 + 2 \cdot 5 + 3 \cdot 8 + 4 \cdot 4 + 5 \cdot 1}{20} = \frac{57}{20} = 2.85$$

Median: with 20 values, the median is the mean of the 10th and 11th value. The first $2 + 5 = 7$ values are grades 1 and 2, values 8 to 15 are all grade 3. So both the 10th and 11th value are $3$, and the median is $3$. The mode is also $3$, because it occurs most often.

## Which average should I use?

The mean uses every single value – which is a strength, but also a weakness. One extreme value (an **outlier**) can pull it far away from the bulk of the data. The median only cares about the order of the values, so outliers barely affect it.

### Example 5: an outlier

Five people in a small company earn (per month) 2000 €, 2200 €, 2400 €, 2600 € and 10800 €.

$$\bar{x} = \frac{20000}{5} = 4000 \qquad \text{median} = 2400$$

The mean of 4000 € is higher than what four of the five people earn. The median of 2400 € describes the typical salary much better. That is why statistics about incomes or house prices usually report the median.

> **Key idea:** The mean is sensitive to outliers, the median is robust. Use the mode for categories or to find the most common value.

The average alone never tells the whole story: two data sets can have the same mean but look very different. How widely the values are scattered is described by measures of spread.

## Common mistakes

- Forgetting to sort the data before reading off the median.
- With an even number of values, picking one of the two middle values instead of their mean.
- Dividing by the number of *different* values instead of the total number of values, especially in frequency tables.
- Thinking the mean must be one of the data values – $2.85$ is a perfectly fine mean for whole-number grades.
- Using the mean for data with strong outliers, where the median would be more meaningful.

## Practice

1. Find the mean, median and mode of $6, 2, 9, 4, 6, 3$.

<details>
<summary>Solution</summary>

Mean: $\frac{6 + 2 + 9 + 4 + 6 + 3}{6} = \frac{30}{6} = 5$. Sorted: $2, 3, 4, 6, 6, 9$, so the median is $\frac{4 + 6}{2} = 5$. The value $6$ occurs twice, so the mode is $6$.

</details>

2. After four tests, Mia's mean score is 78 points. What does she need in the fifth test to raise her mean to 80?

<details>
<summary>Solution</summary>

A mean of 80 over five tests requires a total of $5 \cdot 80 = 400$ points. So far she has $4 \cdot 78 = 312$ points. She needs $400 - 312 = 88$ points.

</details>

3. Calculate the mean and the median of $1, 2, 2, 3, 100$. Which value describes the data better?

<details>
<summary>Solution</summary>

Mean: $\frac{108}{5} = 21.6$. Median: the middle value of the sorted list is $2$. The value $100$ is an outlier that pulls the mean up, so the median describes the typical value much better.

</details>

4. A survey asked 20 children how many siblings they have: 4 have none, 7 have one, 6 have two and 3 have three. Find the mean, median and mode.

<details>
<summary>Solution</summary>

Mean: $\frac{0 \cdot 4 + 1 \cdot 7 + 2 \cdot 6 + 3 \cdot 3}{20} = \frac{28}{20} = 1.4$. Median: the 10th and 11th values lie among values 5 to 11, which are all $1$, so the median is $1$. The mode is $1$ (7 children).

</details>
