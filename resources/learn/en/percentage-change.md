---
title: Percentage Change and Interest
category: fractions
order: 70
level: 2
summary: Increase and decrease by a percentage with growth factors, undo a change, chain several changes and compute simple and compound interest.
related: percentages, decimals, exponential-functions, sequences-and-series
---

Prices rise, populations shrink, savings earn interest – all of these are percentage changes. The most powerful tool for them is the **growth factor**: instead of calculating the change and then adding or subtracting it, you multiply by a single number. This makes it easy to undo a change, to combine several changes and, eventually, to understand compound interest.

## Absolute and relative change

If a price goes from 250 € to 300 €, the **absolute change** is 50 €. The **relative change** compares this to the original value:

$$\text{relative change} = \frac{\text{new} - \text{old}}{\text{old}} = \frac{300 - 250}{250} = \frac{50}{250} = 0.2 = 20\%$$

The reference value is always the **old** value. Going back from 300 € to 250 € is a change of $\frac{-50}{300} \approx -16.7\%$ – not $-20\%$, because the base is now larger.

## Growth factors

Increasing a value by $p\%$ means keeping the original $100\%$ and adding $p\%$ on top, so you end up with $(100 + p)\%$ of it:

$$\text{new} = \text{old} \cdot \left(1 + \frac{p}{100}\right)$$

A decrease by $p\%$ leaves $(100 - p)\%$:

$$\text{new} = \text{old} \cdot \left(1 - \frac{p}{100}\right)$$

The number in the brackets is called the **growth factor** (or **multiplier**). An increase of $15\%$ has factor $1.15$, a decrease of $15\%$ has factor $0.85$.

> **Key idea:** Increasing by $p\%$ means multiplying by $1 + \frac{p}{100}$, decreasing by $p\%$ means multiplying by $1 - \frac{p}{100}$. A factor above $1$ is growth, a factor below $1$ is decline.

### Example 1

A bike costs 80 €, and the price rises by $15\%$:

$$80 \cdot 1.15 = 92$$

The new price is 92 €.

## Undoing a change

To get back to the original value, **divide** by the growth factor – do not subtract the same percentage.

### Example 2

A price including $19\%$ sales tax is 119 €. What is the price before tax?

$$\text{old} = \frac{119}{1.19} = 100$$

So the net price is 100 €. Subtracting $19\%$ of 119 € would give the wrong value $96.39$ €, because the $19\%$ refer to the net price, not to the gross price.

## Several changes in a row

Successive changes are combined by **multiplying** their factors.

### Example 3

A share rises by $20\%$ and then falls by $20\%$. Is it back where it started?

$$1.2 \cdot 0.8 = 0.96$$

No – it has lost $4\%$ overall. Percentages of successive changes cannot simply be added, because each change refers to a different base.

> **Key idea:** Chain changes by multiplying the growth factors. The overall percentage change is the product minus $1$.

## Simple interest

Money in a savings account earns **interest**. With **simple interest**, the interest is always calculated on the original amount (the **principal**) $P$. At an annual rate of $r\%$ for $t$ years:

$$I = P \cdot \frac{r}{100} \cdot t$$

### Example 4

1000 € at $3\%$ simple interest for $5$ years earns $1000 \cdot 0.03 \cdot 5 = 150$, i.e. 150 € interest. For part of a year, $t$ is a fraction: $6$ months means $t = \frac{1}{2}$.

## Compound interest

Usually, interest is added to the account at the end of each year and then earns interest itself. This is **compound interest**. Each year the balance is multiplied by the same growth factor, so after $n$ years:

$$A_n = P \cdot \left(1 + \frac{r}{100}\right)^n$$

### Example 5

1000 € at $3\%$ compound interest for $5$ years:

$$A_5 = 1000 \cdot 1.03^5 \approx 1000 \cdot 1.159274 \approx 1159.27$$

That is 1159.27 € – a bit more than the 1150 € from simple interest, because the interest itself earns interest. Over long periods the difference grows dramatically: this is exponential growth.

A handy rule of thumb (the **rule of 72**): money doubles after roughly $\frac{72}{r}$ years. At $6\%$ that is about $12$ years, and indeed $1.06^{12} \approx 2.01$.

## Common mistakes

- Using the new value as the reference when calculating a percentage change.
- Undoing a change by subtracting the same percentage instead of dividing by the factor.
- Adding percentages of successive changes: $+20\%$ and $-20\%$ do not cancel out.
- Writing the factor for a $5\%$ increase as $1.5$ instead of $1.05$.
- Using the simple interest formula when interest is compounded.

## Practice

1. Increase $250$ by $12\%$.

<details>
<summary>Solution</summary>

$250 \cdot 1.12 = 280$.

</details>

2. A price falls from 80 € to 68 €. By what percentage did it fall?

<details>
<summary>Solution</summary>

$\frac{68 - 80}{80} = \frac{-12}{80} = -0.15$, so it fell by $15\%$.

</details>

3. After a $25\%$ discount, a game costs 45 €. What was the original price?

<details>
<summary>Solution</summary>

The factor is $0.75$, so the original price is $\frac{45}{0.75} = 60$, i.e. 60 €.

</details>

4. A town grows by $10\%$ in one year and by another $10\%$ the next year. What is the total percentage growth?

<details>
<summary>Solution</summary>

$1.1 \cdot 1.1 = 1.21$, so the total growth is $21\%$ – not $20\%$.

</details>

5. You invest 2000 € at $2.5\%$ compound interest. How much do you have after $3$ years?

<details>
<summary>Solution</summary>

$2000 \cdot 1.025^3 = 2000 \cdot 1.076890625 \approx 2153.78$, so about 2153.78 €.

</details>
