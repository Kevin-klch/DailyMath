---
title: Sets and Logic
category: advanced
order: 10
level: 2
summary: The language of mathematics – sets and their operations, Venn diagrams, logical connectives, truth tables, implications and how to negate statements with quantifiers.
related: number-sets, functions-basics, proof-by-induction, probability-basics
---

Sets and logic are the grammar of mathematics. Sets let us collect objects – numbers, points, outcomes of an experiment – and talk about them precisely. Logic tells us how statements can be combined and when a conclusion really follows. Anyone who wants to read definitions, understand proofs or work with probabilities needs these tools.

## Sets and elements

A **set** is a collection of distinct objects, its **elements**. We write $a \in A$ for "$a$ is an element of $A$" and $a \notin A$ for the opposite. There are two common ways to describe a set:

- **Listing** the elements: $A = \{1, 2, 3, 4\}$. Order and repetitions do not matter: $\{1, 2\} = \{2, 1, 1\}$.
- **Set-builder notation** with a property: $\{x \in \mathbb{Z} \mid -2 \le x < 2\} = \{-2, -1, 0, 1\}$. Read: "the set of all integers $x$ with $-2 \le x < 2$".

The **empty set** $\emptyset = \{\}$ contains no elements at all. The number of elements of a finite set is its **cardinality** $|A|$; for example $|\{1, 2, 3, 4\}| = 4$.

$A$ is a **subset** of $B$, written $A \subseteq B$, if every element of $A$ also belongs to $B$. For example $\{2, 4\} \subseteq \{1, 2, 3, 4\}$ and $\mathbb{N} \subseteq \mathbb{Z} \subseteq \mathbb{Q} \subseteq \mathbb{R}$. Two sets are equal if each is a subset of the other.

## Set operations

| Operation | Notation | Contains all elements that are … |
|---|---|---|
| Intersection | $A \cap B$ | in $A$ **and** in $B$ |
| Union | $A \cup B$ | in $A$ **or** in $B$ (or both) |
| Difference | $A \setminus B$ | in $A$ but **not** in $B$ |
| Complement | $\overline{A}$ | in the universal set $U$ but not in $A$ |

A **Venn diagram** shows sets as overlapping circles inside a rectangle (the universal set). The intersection is the lens-shaped region where the circles overlap, the union is everything covered by at least one circle, and the complement of $A$ is everything outside the circle $A$. If $A \cap B = \emptyset$, the sets are **disjoint** – their circles do not overlap.

### Example 1

$A = \{1, 2, 3, 4\}$ and $B = \{3, 4, 5\}$:

$$A \cap B = \{3, 4\}, \quad A \cup B = \{1, 2, 3, 4, 5\}, \quad A \setminus B = \{1, 2\}, \quad B \setminus A = \{5\}$$

## Counting with two sets

When you count the elements of $A$ and of $B$, the elements of the intersection are counted twice. So:

> **Key idea:** $|A \cup B| = |A| + |B| - |A \cap B|$ (inclusion–exclusion).

### Example 2

In a class of 30 students, 18 play football, 12 play tennis and 5 play both. At least one of the two sports is played by $18 + 12 - 5 = 25$ students, so $30 - 25 = 5$ play neither. In the Venn diagram: 13 only football, 7 only tennis, 5 in the overlap and 5 outside.

## Statements and connectives

A **statement** (proposition) is a sentence that is either true or false – "7 is a prime number" (true), "$2 + 2 = 5$" (false). "Is it raining?" or "$x > 3$" without knowing $x$ are not statements.

Statements can be combined:

| Name | Symbol | Meaning |
|---|---|---|
| Negation | $\neg A$ | not $A$ |
| Conjunction | $A \land B$ | $A$ and $B$ – true only if both are true |
| Disjunction | $A \lor B$ | $A$ or $B$ – true if at least one is true |
| Implication | $A \Rightarrow B$ | if $A$, then $B$ |
| Equivalence | $A \Leftrightarrow B$ | $A$ if and only if $B$ |

Note that the mathematical "or" is **inclusive**: $A \lor B$ is also true when both are true.

### The implication

The truth table of $A \Rightarrow B$ (T = true, F = false):

| $A$ | $B$ | $A \Rightarrow B$ |
|---|---|---|
| T | T | T |
| T | F | F |
| F | T | T |
| F | F | T |

An implication is only false when the premise is true and the conclusion false. "If $n$ is divisible by 4, then $n$ is even" is true – even though $6$ is even and not divisible by 4. That only shows the **converse** $B \Rightarrow A$ is false.

> **Key idea:** $A \Rightarrow B$ is equivalent to its **contrapositive** $\neg B \Rightarrow \neg A$, but **not** to its converse $B \Rightarrow A$.

The contrapositive is the basis of many proofs: to show "if $n^2$ is even, then $n$ is even", you may instead show "if $n$ is odd, then $n^2$ is odd".

## Quantifiers and negation

Statements about many objects use **quantifiers**:

- $\forall x$: "for all $x$" – e.g. $\forall x \in \mathbb{R}: x^2 \ge 0$ (true).
- $\exists x$: "there exists an $x$" – e.g. $\exists x \in \mathbb{N}: x^2 = 49$ (true, $x = 7$).

To negate, swap the quantifier and negate the inner statement: the negation of "$\forall x: P(x)$" is "$\exists x: \neg P(x)$", and vice versa.

### Example 3

"All prime numbers are odd." Negation: "There is a prime number that is not odd." The negation is true ($2$ is prime and even), so the original statement is false. A single counterexample is enough to refute a "for all" statement.

### De Morgan's laws

The same pattern appears in logic and in sets:

$$\neg(A \land B) = \neg A \lor \neg B, \qquad \neg(A \lor B) = \neg A \land \neg B$$

$$\overline{A \cap B} = \overline{A} \cup \overline{B}, \qquad \overline{A \cup B} = \overline{A} \cap \overline{B}$$

"Not (sunny and warm)" means "not sunny or not warm".

## Common mistakes

- Confusing $\in$ (element) with $\subseteq$ (subset): $2 \in \{1, 2\}$, but $\{2\} \subseteq \{1, 2\}$.
- Adding $|A| + |B|$ for the union and forgetting to subtract the intersection.
- Reading "or" as "either … or" – in mathematics both may be true.
- Concluding $B \Rightarrow A$ from $A \Rightarrow B$.
- Negating "all are …" as "none are …" – the correct negation is "at least one is not …".

## Practice

1. Let $A = \{2, 4, 6, 8\}$ and $B = \{1, 2, 3, 4\}$. Find $A \cap B$, $A \cup B$ and $B \setminus A$.

<details>
<summary>Solution</summary>

$A \cap B = \{2, 4\}$, $A \cup B = \{1, 2, 3, 4, 6, 8\}$, $B \setminus A = \{1, 3\}$.

</details>

2. Of 40 students, 25 learn English, 20 learn French and 10 learn both. How many learn neither?

<details>
<summary>Solution</summary>

At least one language: $25 + 20 - 10 = 35$. Neither: $40 - 35 = 5$.

</details>

3. Negate the statement "Every student in the class has a phone."

<details>
<summary>Solution</summary>

"At least one student in the class has no phone." (Not: "No student has a phone.")

</details>

4. Is "If $n$ is divisible by 6, then $n$ is divisible by 3" true? Is its converse true? State the contrapositive.

<details>
<summary>Solution</summary>

True, since $6 = 2 \cdot 3$. The converse "if $n$ is divisible by 3, then by 6" is false – counterexample $n = 3$. Contrapositive: "If $n$ is not divisible by 3, then $n$ is not divisible by 6."

</details>

5. $A$ is false and $B$ is true. Determine the truth value of $(A \lor B) \land \neg A$ and of $A \Rightarrow \neg B$.

<details>
<summary>Solution</summary>

$A \lor B$ is true and $\neg A$ is true, so $(A \lor B) \land \neg A$ is true. $A \Rightarrow \neg B$ has a false premise, so it is true.

</details>
