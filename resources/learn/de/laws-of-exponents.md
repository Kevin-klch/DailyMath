---
title: Potenzgesetze
category: algebra
order: 80
level: 2
summary: Die Regeln zum Multiplizieren, Dividieren und Potenzieren von Potenzen – und was Exponenten wie null, negative Zahlen und Brüche bedeuten.
related: powers-and-roots, logarithms, scientific-notation, exponential-functions
---

Eine Potenz wie $2^5$ ist eine Kurzschreibweise für ein Produkt gleicher Faktoren: $2 \cdot 2 \cdot 2 \cdot 2 \cdot 2 = 32$. Die **Potenzgesetze** beschreiben, wie man mit Potenzen rechnet, ohne jeden Faktor auszuschreiben. Sie machen lange Terme kurz, erklären, was Exponenten wie $0$, $-2$ oder $\frac{1}{2}$ bedeuten, und sind die Grundlage für Logarithmen und Exponentialfunktionen.

## Begriffe

In $a^n$ heißt $a$ die **Basis** (Grundzahl) und $n$ der **Exponent** (Hochzahl). Für eine natürliche Zahl $n$ gilt:

$$a^n = \underbrace{a \cdot a \cdot \ldots \cdot a}_{n \text{ Faktoren}}$$

## Gleiche Basis: multiplizieren und dividieren

$$a^m \cdot a^n = a^{m+n} \qquad \frac{a^m}{a^n} = a^{m-n}$$

Warum? $2^3 \cdot 2^4$ bedeutet drei Faktoren $2$ und dann noch vier – zusammen sieben Faktoren, also $2^7 = 128$. Beim Dividieren kürzen sich gemeinsame Faktoren: $\frac{x^5}{x^2} = \frac{x \cdot x \cdot x \cdot x \cdot x}{x \cdot x} = x^3$.

## Potenzen potenzieren

$$(a^m)^n = a^{m \cdot n}$$

$(x^3)^4$ bedeutet $x^3 \cdot x^3 \cdot x^3 \cdot x^3 = x^{3+3+3+3} = x^{12}$.

## Gleicher Exponent: Produkte und Quotienten

$$a^n \cdot b^n = (ab)^n \qquad \frac{a^n}{b^n} = \left(\frac{a}{b}\right)^n$$

Das hilft beim Kopfrechnen: $2^5 \cdot 5^5 = 10^5 = 100\,000$. Umgekehrt heißt das auch: Bei einem Produkt in Klammern wird **jeder** Faktor potenziert, zum Beispiel $(2x)^3 = 8x^3$.

> **Merke:** Gleiche Basis – Exponenten addieren bzw. subtrahieren. Potenz einer Potenz – Exponenten multiplizieren. Gleicher Exponent – Basen zusammenfassen.

## Exponent null und negative Exponenten

Was $a^0$ bedeuten muss, verrät das Divisionsgesetz: $\frac{a^3}{a^3} = a^{3-3} = a^0$, gleichzeitig ist $\frac{a^3}{a^3} = 1$. Genauso ist $\frac{a^2}{a^5} = a^{-3}$ und zugleich $\frac{1}{a^3}$. Deshalb legt man für $a \neq 0$ fest:

$$a^0 = 1 \qquad a^{-n} = \frac{1}{a^n}$$

Ein negativer Exponent macht die Zahl also **nicht** negativ – er bedeutet „Kehrwert bilden“: $2^{-3} = \frac{1}{8}$ und $\left(\frac{2}{3}\right)^{-2} = \left(\frac{3}{2}\right)^2 = \frac{9}{4}$.

## Brüche als Exponenten

Welche Zahl ergibt quadriert $9$? Nach dem Gesetz $(a^m)^n = a^{mn}$ ist $\left(9^{\frac{1}{2}}\right)^2 = 9^1 = 9$, also muss $9^{\frac{1}{2}} = \sqrt{9} = 3$ sein. Allgemein gilt für $a \geq 0$:

$$a^{\frac{1}{n}} = \sqrt[n]{a} \qquad a^{\frac{m}{n}} = \sqrt[n]{a^m} = \left(\sqrt[n]{a}\right)^m$$

> **Merke:** Ein Bruch im Exponenten bedeutet eine Wurzel: Der Nenner gibt die Wurzel an, der Zähler die Potenz. $8^{\frac{2}{3}} = \left(\sqrt[3]{8}\right)^2 = 2^2 = 4$.

Zieht man zuerst die Wurzel, bleiben die Zahlen meist klein.

## Beispiele

### Beispiel 1

$$(2x^3y^2)^3 = 2^3 \cdot (x^3)^3 \cdot (y^2)^3 = 8x^9y^6$$

### Beispiel 2

$$\frac{a^4b^{-2}}{ab^3} = a^{4-1}b^{-2-3} = a^3b^{-5} = \frac{a^3}{b^5}$$

### Beispiel 3

$$\frac{3^7 \cdot 3^{-2}}{3^3} = 3^{7 - 2 - 3} = 3^2 = 9$$

### Beispiel 4

$$27^{-\frac{1}{3}} = \frac{1}{27^{\frac{1}{3}}} = \frac{1}{3}$$

## Was *nicht* geht

Für Summen von Potenzen gibt es kein Gesetz. $2^3 + 2^4 = 8 + 16 = 24$, und das ist nicht $2^7$. Ebenso ist $(a + b)^2 \neq a^2 + b^2$ – die Gesetze für Produkte lassen sich nicht auf Summen übertragen.

## Typische Fehler

- Exponenten multiplizieren statt addieren: $x^2 \cdot x^3 = x^5$, nicht $x^6$.
- Die Basen multiplizieren: $2^3 \cdot 2^4 = 2^7$, nicht $4^7$.
- Glauben, ein negativer Exponent ergebe eine negative Zahl: $5^{-2} = \frac{1}{25}$, nicht $-25$.
- $a^0 = 0$ annehmen – richtig ist $a^0 = 1$.
- Den Vorfaktor nicht mitpotenzieren: $(3x)^2 = 9x^2$, nicht $3x^2$.
- Die Gesetze auf Summen anwenden: $(x + y)^3 \neq x^3 + y^3$.

## Übungen

1. Vereinfache $3^4 \cdot 3^{-2}$.

<details>
<summary>Lösung</summary>

$3^{4 + (-2)} = 3^2 = 9$.

</details>

2. Vereinfache $(x^2)^5 \cdot x^3$.

<details>
<summary>Lösung</summary>

$(x^2)^5 = x^{10}$, dann $x^{10} \cdot x^3 = x^{13}$.

</details>

3. Berechne $16^{\frac{3}{4}}$.

<details>
<summary>Lösung</summary>

$\sqrt[4]{16} = 2$ und $2^3 = 8$.

</details>

4. Vereinfache $(3a^2b)^2 \cdot a^{-3}$.

<details>
<summary>Lösung</summary>

$(3a^2b)^2 = 9a^4b^2$. Dann $9a^4b^2 \cdot a^{-3} = 9ab^2$.

</details>

5. Berechne $\frac{4^5 \cdot 25^5}{10^9}$ ohne Taschenrechner.

<details>
<summary>Lösung</summary>

$4^5 \cdot 25^5 = (4 \cdot 25)^5 = 100^5 = 10^{10}$. Dann $\frac{10^{10}}{10^9} = 10$.

</details>
