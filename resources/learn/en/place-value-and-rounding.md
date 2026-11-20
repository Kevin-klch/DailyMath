---
title: Place Value and Rounding
category: arithmetic
order: 20
level: 1
summary: What each digit in a number is worth, and how to round to tens, hundreds, decimal places or significant figures.
related: number-sets, decimals, scientific-notation, units-and-conversions
---

In the number 3,527 the digit 5 is not worth five – it is worth five **hundred**. Our number system is a **place value system**: the value of a digit depends on where it stands. Once you understand place value, rounding becomes easy, and rounding is what you do every time you estimate a price, a distance or a measurement.

## The decimal place value system

We use ten digits, $0$ to $9$, and every position is worth ten times as much as the position to its right. From right to left, the places of a whole number are ones, tens, hundreds, thousands, ten thousands, and so on.

$$3527 = 3 \cdot 1000 + 5 \cdot 100 + 2 \cdot 10 + 7 \cdot 1$$

Writing a number like this is called **expanded form**. Using powers of ten, the place values are $10^0 = 1$, $10^1 = 10$, $10^2 = 100$, $10^3 = 1000$, …

The digit $0$ is a placeholder: in $4070$ it shows that there are no hundreds and no ones. Without it, $4070$ and $47$ would look the same.

> **Key idea:** Each place is worth ten times the place to its right. The value of a digit = digit × place value.

## Decimal places

To the right of the decimal point the pattern continues: each place is worth a tenth of the place to its left.

| Place | tenths | hundredths | thousandths |
|---|---|---|---|
| Value | $\frac{1}{10} = 0.1$ | $\frac{1}{100} = 0.01$ | $\frac{1}{1000} = 0.001$ |

So

$$6.348 = 6 + \frac{3}{10} + \frac{4}{100} + \frac{8}{1000}$$

In $6.348$ the digit $4$ is in the hundredths place and is worth $0.04$.

Large numbers are grouped in threes to make them readable, using commas (12,450,000) or thin spaces ($12\,450\,000$). Either way, the number is twelve million four hundred fifty thousand.

## Rounding

Rounding replaces a number by a nearby, simpler one. You always round to a chosen place – the **rounding digit**.

1. Find the rounding digit (the last digit you want to keep).
2. Look at the digit immediately to its **right**.
3. If that digit is $0, 1, 2, 3$ or $4$, keep the rounding digit (**round down**).
4. If it is $5, 6, 7, 8$ or $9$, increase the rounding digit by one (**round up**).
5. Replace all digits to the right with zeros (whole numbers) or drop them (decimal places).

> **Key idea:** Only the digit directly to the right of the rounding place decides. 0–4 rounds down, 5–9 rounds up.

The symbol $\approx$ means "is approximately equal to". Write $3527 \approx 3500$, never $3527 = 3500$.

### Example 1: rounding whole numbers

Round $48\,763$ to the nearest hundred.

The hundreds digit is $7$. The digit to its right is $6$, so we round up: $7$ becomes $8$, and everything after it becomes zero.

$$48\,763 \approx 48\,800$$

Rounded to the nearest thousand, the deciding digit is $7$ (hundreds), so $48\,763 \approx 49\,000$.

### Example 2: rounding decimals

Round $2.6849$ to two decimal places.

The second decimal place is $8$. The next digit is $4$, so we round down:

$$2.6849 \approx 2.68$$

Note that rounding first to three places ($2.685$) and then to two ($2.69$) would give a **different, wrong** answer. Always round in one step from the original number.

### Example 3: a carry that ripples

Round $3.996$ to two decimal places. The digit after the second place is $6$, so the $9$ must go up – it becomes $10$, which carries into the next places:

$$3.996 \approx 4.00$$

Keep the zeros: $4.00$ shows that the value is accurate to two decimal places, which $4$ alone would not.

## Significant figures

Sometimes you round to a number of **significant figures** instead of a fixed place. Significant figures are counted from the first non-zero digit.

- $0.004\,072$: the first significant figure is $4$. To 2 significant figures: $0.0041$.
- $58\,390$ to 2 significant figures: $58\,000$.
- $7.0362$ to 3 significant figures: $7.04$.

Leading zeros never count; zeros between non-zero digits always count.

## Estimating with rounded numbers

Rounding is a powerful check. To estimate $612 \cdot 49$, round to $600 \cdot 50 = 30\,000$. The exact answer is $29\,988$ – very close. If a calculator showed $2998.8$, you would know immediately that something went wrong.

## Common mistakes

- Looking at the wrong digit: when rounding to hundreds, the **tens** digit decides, not the ones digit.
- Rounding in several steps ($2.6849 \to 2.685 \to 2.69$) instead of once.
- Dropping trailing zeros that matter: $4.00$ and $4$ are not the same statement about precision.
- Forgetting the carry: $1\,971$ rounded to tens is $1\,970$, but $1\,996$ rounded to tens is $2\,000$.
- Writing $=$ instead of $\approx$ after rounding.

## Practice

1. What is the value of the digit $6$ in $46\,215$ and in $0.068$?

<details>
<summary>Solution</summary>

In $46\,215$ the $6$ is in the thousands place, so it is worth $6000$. In $0.068$ it is in the hundredths place, so it is worth $0.06$.

</details>

2. Round $7\,451$ to the nearest ten, hundred and thousand.

<details>
<summary>Solution</summary>

Nearest ten: the ones digit is $1$, so $7\,450$. Nearest hundred: the tens digit is $5$, so round up to $7\,500$. Nearest thousand: the hundreds digit is $4$, so $7\,000$.

</details>

3. Round $12.3956$ to one, two and three decimal places.

<details>
<summary>Solution</summary>

One place: next digit $9$, so $12.4$. Two places: next digit $5$, so $12.40$. Three places: next digit $6$, so $12.396$.

</details>

4. Round $0.050\,73$ to two significant figures.

<details>
<summary>Solution</summary>

The first significant figure is $5$, the second is $0$. The next digit is $7$, so round up: $0.051$.

</details>

5. Estimate $398 \cdot 21$ by rounding, then compare with the exact result.

<details>
<summary>Solution</summary>

Estimate: $400 \cdot 20 = 8000$. Exact: $398 \cdot 21 = 8358$. The estimate is in the right range.

</details>
