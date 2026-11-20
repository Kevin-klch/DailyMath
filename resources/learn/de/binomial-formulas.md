---
title: Binomische Formeln
category: algebra
order: 30
level: 2
summary: Die drei binomischen Formeln zum schnellen Ausmultiplizieren – und wie man sie rückwärts zum Faktorisieren nutzt.
related: expanding-and-factoring, quadratic-equations, variables-and-terms
---

Manche Klammerprodukte tauchen so häufig auf, dass es sich lohnt, ihr Ergebnis auswendig zu kennen. Die drei **binomischen Formeln** sagen sofort, was $(a + b)^2$, $(a - b)^2$ und $(a + b)(a - b)$ ergeben. Sie sparen Rechenarbeit beim Ausmultiplizieren, erleichtern das Kopfrechnen und sind – rückwärts angewendet – eines der wichtigsten Werkzeuge zum Faktorisieren.

## Die drei Formeln

$$(a + b)^2 = a^2 + 2ab + b^2 \qquad \text{(1. binomische Formel)}$$

$$(a - b)^2 = a^2 - 2ab + b^2 \qquad \text{(2. binomische Formel)}$$

$$(a + b)(a - b) = a^2 - b^2 \qquad \text{(3. binomische Formel)}$$

> **Merke:** 1. Formel: $(a + b)^2 = a^2 + 2ab + b^2$. 2. Formel: $(a - b)^2 = a^2 - 2ab + b^2$. 3. Formel: $(a + b)(a - b) = a^2 - b^2$.

## Woher die Formeln kommen

Jede Formel ist nichts anderes als das Ausmultiplizieren zweier Klammern:

$$(a + b)^2 = (a + b)(a + b) = a^2 + ab + ba + b^2 = a^2 + 2ab + b^2$$

$$(a + b)(a - b) = a^2 - ab + ba - b^2 = a^2 - b^2$$

Bei der dritten Formel heben sich die beiden mittleren Glieder auf – deshalb ist das Ergebnis so kurz.

Für die erste Formel gibt es auch ein schönes Bild: Ein Quadrat mit der Seitenlänge $a + b$ lässt sich in ein Quadrat mit Flächeninhalt $a^2$, ein Quadrat mit Flächeninhalt $b^2$ und zwei Rechtecke mit je $ab$ zerlegen. Zusammen ergibt das $a^2 + 2ab + b^2$.

## Ausmultiplizieren mit den Formeln

Man überlegt zuerst, was die Rolle von $a$ und $b$ übernimmt – das können auch ganze Terme sein – und setzt dann ein.

### Beispiel 1

$$(x + 5)^2 = x^2 + 2 \cdot x \cdot 5 + 5^2 = x^2 + 10x + 25$$

### Beispiel 2

Bei $(3m - 2n)^2$ ist der erste Teil $3m$ und der zweite Teil $2n$:

$$(3m - 2n)^2 = (3m)^2 - 2 \cdot 3m \cdot 2n + (2n)^2 = 9m^2 - 12mn + 4n^2$$

Achtung: Quadriert wird der ganze Teil, also $(3m)^2 = 9m^2$ und nicht $3m^2$.

### Beispiel 3

$$(2x + 7)(2x - 7) = (2x)^2 - 7^2 = 4x^2 - 49$$

## Das gemischte Glied

Der häufigste Fehler ist das Vergessen des mittleren, „gemischten“ Glieds:

$$(a + b)^2 \neq a^2 + b^2$$

Eine Probe mit Zahlen zeigt das sofort: $(3 + 4)^2 = 49$, aber $3^2 + 4^2 = 25$. Die fehlenden $24$ sind genau $2 \cdot 3 \cdot 4$.

> **Merke:** Beim Quadrieren einer Summe oder Differenz entstehen immer **drei** Glieder. Das mittlere ist das doppelte Produkt der beiden Teile.

## Kopfrechnen

Mit den Formeln werden manche Rechnungen überraschend einfach:

$$51^2 = (50 + 1)^2 = 2500 + 100 + 1 = 2601$$

$$49 \cdot 51 = (50 - 1)(50 + 1) = 2500 - 1 = 2499$$

## Rückwärts: Faktorisieren

Liest man die Formeln von rechts nach links, wird aus einer Summe ein Produkt. Man achtet auf diese Muster:

- Zwei Quadrate, dazu ein gemischtes Glied mit Plus oder Minus → 1. oder 2. binomische Formel.
- Zwei Quadrate mit Minus dazwischen und **ohne** gemischtes Glied → 3. binomische Formel.

### Beispiel 4

$$x^2 - 6x + 9$$

$x^2$ ist das Quadrat von $x$, $9$ das Quadrat von $3$, und das gemischte Glied $2 \cdot x \cdot 3 = 6x$ steht mit Minus da. Also:

$$x^2 - 6x + 9 = (x - 3)^2$$

### Beispiel 5

$$4x^2 + 20x + 25 = (2x + 5)^2$$

Probe: $(2x)^2 = 4x^2$, $5^2 = 25$ und $2 \cdot 2x \cdot 5 = 20x$.

### Beispiel 6

$$9x^2 - 16 = (3x)^2 - 4^2 = (3x + 4)(3x - 4)$$

Vor dem Anwenden der 1. oder 2. Formel immer das gemischte Glied prüfen: $x^2 + 5x + 9$ ist **nicht** $(x + 3)^2$, denn dafür müsste das mittlere Glied $6x$ heißen.

Eine Summe zweier Quadrate wie $x^2 + 9$ lässt sich so nicht zerlegen – für $a^2 + b^2$ gibt es keine binomische Formel.

## Typische Fehler

- Das gemischte Glied weglassen: $(x + 3)^2 = x^2 + 9$ ist falsch, richtig ist $x^2 + 6x + 9$.
- Den Faktor $2$ im gemischten Glied vergessen: $(x + 3)^2 \neq x^2 + 3x + 9$.
- Nur einen Teil quadrieren: $(2x)^2 = 4x^2$, nicht $2x^2$.
- Bei der 2. Formel das Vorzeichen am Ende falsch setzen: $(a - b)^2$ endet mit $+b^2$.
- Versuchen, $a^2 + b^2$ mit der 3. Formel zu zerlegen.

## Übungen

1. Multipliziere aus: $(x - 4)^2$.

<details>
<summary>Lösung</summary>

Mit der 2. binomischen Formel: $x^2 - 2 \cdot x \cdot 4 + 4^2 = x^2 - 8x + 16$.

</details>

2. Multipliziere aus: $(2a + 3)^2$.

<details>
<summary>Lösung</summary>

Mit der 1. binomischen Formel: $(2a)^2 + 2 \cdot 2a \cdot 3 + 3^2 = 4a^2 + 12a + 9$.

</details>

3. Multipliziere aus: $(5x - 1)(5x + 1)$.

<details>
<summary>Lösung</summary>

Mit der 3. binomischen Formel: $(5x)^2 - 1^2 = 25x^2 - 1$.

</details>

4. Faktorisiere $x^2 + 14x + 49$.

<details>
<summary>Lösung</summary>

$x^2$ und $49 = 7^2$ sind Quadrate, und $2 \cdot x \cdot 7 = 14x$ passt zum gemischten Glied. Also $x^2 + 14x + 49 = (x + 7)^2$.

</details>

5. Berechne $98 \cdot 102$ im Kopf.

<details>
<summary>Lösung</summary>

$98 \cdot 102 = (100 - 2)(100 + 2) = 10000 - 4 = 9996$.

</details>
