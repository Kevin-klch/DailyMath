---
title: Potenzen und Wurzeln
category: arithmetic
order: 80
level: 1
summary: Was Potenzen und Quadratwurzeln sind, wie man sie berechnet und welche Regeln und Stolperfallen es dabei gibt.
related: laws-of-exponents, scientific-notation, prime-numbers, pythagorean-theorem
---

Eine **Potenz** ist eine Kurzschreibweise für wiederholtes Multiplizieren: Statt $2 \cdot 2 \cdot 2 \cdot 2 \cdot 2$ schreibt man $2^5$. Die **Quadratwurzel** ist die Umkehrung des Quadrierens: Sie fragt, welche Zahl mit sich selbst multipliziert einen bestimmten Wert ergibt. Potenzen und Wurzeln begegnen dir überall – bei Flächen und Volumen, im Satz des Pythagoras, bei Wachstumsvorgängen und in der wissenschaftlichen Schreibweise.

## Potenzen

In der Potenz $a^n$ heißt $a$ die **Basis** (Grundzahl) und $n$ der **Exponent** (Hochzahl). Der Exponent gibt an, wie oft die Basis als Faktor vorkommt:

$$a^n = \underbrace{a \cdot a \cdot \ldots \cdot a}_{n \text{ Faktoren}}$$

Beispiele:

- $3^4 = 3 \cdot 3 \cdot 3 \cdot 3 = 81$
- $10^3 = 10 \cdot 10 \cdot 10 = 1000$
- $\left(\frac{1}{2}\right)^3 = \frac{1}{2} \cdot \frac{1}{2} \cdot \frac{1}{2} = \frac{1}{8}$

$a^2$ liest man „$a$ hoch zwei“ oder „$a$ Quadrat“ – das ist der Flächeninhalt eines Quadrats mit Seitenlänge $a$. $a^3$ heißt „$a$ hoch drei“ und ist das Volumen eines Würfels mit Kantenlänge $a$.

> **Merke:** $a^n$ bedeutet, $a$ genau $n$-mal mit sich selbst zu multiplizieren. Das ist **nicht** $a \cdot n$: $2^3 = 8$, aber $2 \cdot 3 = 6$.

### Besondere Exponenten

- $a^1 = a$
- $a^0 = 1$ für jedes $a \neq 0$

Warum ist $a^0 = 1$? Sieh dir die Reihe $2^3 = 8$, $2^2 = 4$, $2^1 = 2$ an: Bei jedem Schritt nach unten wird durch 2 geteilt. Ein Schritt weiter ergibt $2^0 = 2 : 2 = 1$.

### Negative Basis und Klammern

$$(-3)^2 = (-3) \cdot (-3) = 9 \qquad -3^2 = -(3 \cdot 3) = -9$$

Ohne Klammer gehört der Exponent nur zur $3$. Eine negative Basis mit geradem Exponenten ergibt ein positives Ergebnis, mit ungeradem Exponenten ein negatives: $(-2)^5 = -32$.

### Quadratzahlen, die man kennen sollte

| $n$ | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10 | 11 | 12 | 13 | 14 | 15 |
|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|
| $n^2$ | 1 | 4 | 9 | 16 | 25 | 36 | 49 | 64 | 81 | 100 | 121 | 144 | 169 | 196 | 225 |

Wer diese Quadratzahlen auswendig kann, ist bei Wurzeln und beim Satz des Pythagoras deutlich schneller.

## Quadratwurzeln

Die **Quadratwurzel** einer Zahl $a \ge 0$ ist diejenige nicht negative Zahl, die quadriert $a$ ergibt:

$$\sqrt{a} = b \quad \text{bedeutet} \quad b^2 = a \text{ und } b \ge 0$$

Die Zahl unter dem Wurzelzeichen heißt **Radikand**.

- $\sqrt{49} = 7$, denn $7^2 = 49$
- $\sqrt{0{,}09} = 0{,}3$, denn $0{,}3^2 = 0{,}09$
- $\sqrt{\frac{4}{25}} = \frac{2}{5}$, denn $\left(\frac{2}{5}\right)^2 = \frac{4}{25}$

Zwar ist auch $(-7)^2 = 49$, aber das Zeichen $\sqrt{49}$ meint immer den **positiven** Wert $7$. Die Gleichung $x^2 = 49$ hat dagegen zwei Lösungen: $x = 7$ und $x = -7$.

> **Merke:** $\sqrt{a}$ ist immer $\ge 0$ und (in den reellen Zahlen) nur für $a \ge 0$ definiert. Quadrieren und Wurzelziehen heben sich gegenseitig auf: $\left(\sqrt{a}\right)^2 = a$ und $\sqrt{a^2} = |a|$.

### Wurzeln aus negativen Zahlen

Es gibt keine reelle Zahl, deren Quadrat negativ ist. Deshalb ist $\sqrt{-4}$ in den reellen Zahlen **nicht definiert**.

### Wurzeln, die nicht aufgehen

Ist der Radikand keine Quadratzahl, ist die Wurzel irrational, zum Beispiel $\sqrt{2} \approx 1{,}414$. Abschätzen kann man sie trotzdem: Wegen $36 < 40 < 49$ gilt $6 < \sqrt{40} < 7$.

## Rechenregeln für Quadratwurzeln

Für $a, b \ge 0$ gilt:

$$\sqrt{a \cdot b} = \sqrt{a} \cdot \sqrt{b} \qquad \sqrt{\frac{a}{b}} = \frac{\sqrt{a}}{\sqrt{b}} \quad (b > 0)$$

Damit kann man Wurzeln **teilweise radizieren** (vereinfachen), indem man Quadratzahlen herauszieht:

$$\sqrt{72} = \sqrt{36 \cdot 2} = \sqrt{36} \cdot \sqrt{2} = 6\sqrt{2}$$

Für die Addition gibt es **keine** solche Regel: $\sqrt{9 + 16} = \sqrt{25} = 5$, aber $\sqrt{9} + \sqrt{16} = 3 + 4 = 7$.

## Andere Wurzeln

Die **Kubikwurzel** (dritte Wurzel) $\sqrt[3]{a}$ ist die Zahl, deren dritte Potenz $a$ ergibt: $\sqrt[3]{125} = 5$, denn $5^3 = 125$. Anders als bei Quadratwurzeln gibt es dritte Wurzeln auch aus negativen Zahlen: $\sqrt[3]{-8} = -2$. Allgemein heißt $\sqrt[n]{a}$ die $n$-te Wurzel. Das Rechnen mit allgemeinen Exponenten behandeln die Potenzgesetze.

## Beispiele

### Beispiel 1

$$2^3 + 3^2 \cdot \sqrt{16}$$

Zuerst Potenzen und Wurzeln: $2^3 = 8$, $3^2 = 9$, $\sqrt{16} = 4$. Dann Punkt vor Strich: $8 + 9 \cdot 4 = 8 + 36 = 44$.

### Beispiel 2

Vereinfache $\sqrt{50} + \sqrt{18}$.

$\sqrt{50} = \sqrt{25 \cdot 2} = 5\sqrt{2}$ und $\sqrt{18} = \sqrt{9 \cdot 2} = 3\sqrt{2}$. Beide enthalten dieselbe Wurzel und lassen sich zusammenfassen: $5\sqrt{2} + 3\sqrt{2} = 8\sqrt{2}$.

### Beispiel 3

Ein quadratisches Feld hat einen Flächeninhalt von $169 \text{ m}^2$. Wie lang ist eine Seite? Die Seitenlänge beträgt $\sqrt{169} = 13$ m.

## Typische Fehler

- $a^n$ als $a \cdot n$ rechnen, etwa $5^2 = 10$ statt $25$.
- $-3^2 = -9$ und $(-3)^2 = 9$ verwechseln.
- Die Wurzel auf eine Summe aufteilen: $\sqrt{a + b} \neq \sqrt{a} + \sqrt{b}$.
- $\sqrt{25} = \pm 5$ schreiben. Das Wurzelzeichen meint nur den positiven Wert.
- Glauben, $a^0$ sei $0$. Tatsächlich ist $a^0 = 1$.

## Übungen

1. Berechne $4^3$, $(-2)^4$, $-2^4$ und $7^0$.

<details>
<summary>Lösung</summary>

$4^3 = 64$, $(-2)^4 = 16$, $-2^4 = -16$ und $7^0 = 1$.

</details>

2. Berechne $\sqrt{144}$, $\sqrt{0{,}25}$ und $\sqrt{\frac{9}{64}}$.

<details>
<summary>Lösung</summary>

$\sqrt{144} = 12$, $\sqrt{0{,}25} = 0{,}5$ und $\sqrt{\frac{9}{64}} = \frac{3}{8}$.

</details>

3. Zwischen welchen beiden ganzen Zahlen liegt $\sqrt{90}$?

<details>
<summary>Lösung</summary>

$81 < 90 < 100$, also $9 < \sqrt{90} < 10$.

</details>

4. Vereinfache $\sqrt{48}$ und $\sqrt{200}$ durch teilweises Radizieren.

<details>
<summary>Lösung</summary>

$\sqrt{48} = \sqrt{16 \cdot 3} = 4\sqrt{3}$ und $\sqrt{200} = \sqrt{100 \cdot 2} = 10\sqrt{2}$.

</details>

5. Berechne $\sqrt{36 + 64}$ und $\sqrt{36} + \sqrt{64}$. Was fällt auf?

<details>
<summary>Lösung</summary>

$\sqrt{36 + 64} = \sqrt{100} = 10$, aber $\sqrt{36} + \sqrt{64} = 6 + 8 = 14$. Die Wurzel aus einer Summe ist nicht die Summe der Wurzeln.

</details>
