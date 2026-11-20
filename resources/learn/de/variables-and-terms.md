---
title: Variablen und Terme
category: algebra
order: 10
level: 1
summary: Was Buchstaben wie x in der Mathematik bedeuten, wie man Terme berechnet und wie man sie durch Zusammenfassen gleichartiger Glieder vereinfacht.
related: order-of-operations, expanding-and-factoring, linear-equations
---

Die Algebra beginnt mit einer einfachen Idee: Statt einer bestimmten Zahl schreibt man einen Buchstaben, der für *irgendeine* Zahl steht. So lassen sich Regeln formulieren, die für alle Zahlen gleichzeitig gelten, Formeln aufschreiben und Gleichungen für unbekannte Größen aufstellen. Bevor man Gleichungen löst, sollte man Terme sicher lesen, berechnen und vereinfachen können.

## Variablen

Eine **Variable** ist ein Platzhalter für eine Zahl – meist ein Buchstabe wie $x$, $y$, $a$ oder $n$. Der Umfang eines Quadrats mit der Seitenlänge $s$ ist $4s$, ganz egal, wie lang die Seite ist. Für $s = 3$ beträgt der Umfang $12$, für $s = 10$ beträgt er $40$.

Ein paar Schreibregeln:

- Den Malpunkt zwischen Zahl und Variable lässt man meist weg: Statt $3 \cdot x$ schreibt man $3x$, statt $a \cdot b$ einfach $ab$.
- Die Zahl vor der Variablen heißt **Koeffizient** (oder Vorfaktor). In $5x^2$ ist der Koeffizient $5$.
- $x$ bedeutet $1x$, und $-x$ bedeutet $-1x$.
- $x \cdot x = x^2$ und $x \cdot x \cdot x = x^3$.

## Terme

Ein **Term** ist ein sinnvoller Rechenausdruck aus Zahlen, Variablen, Rechenzeichen und Klammern, zum Beispiel $3x + 7$ oder $2(a - b)^2$. Bei einer Summe nennt man die einzelnen Summanden auch **Glieder** des Terms. Der Term

$$4x^2 - 3x + 7$$

besteht aus den drei Gliedern $4x^2$, $-3x$ und $7$. Ein Glied ohne Variable wie $7$ heißt **Konstante**. Wichtig: Das Vorzeichen davor gehört zum Glied dazu.

## Termwerte berechnen

Um den **Wert eines Terms** zu berechnen, setzt man für jede Variable ihren Wert ein und rechnet aus – natürlich mit Klammer vor Potenz vor Punkt vor Strich. Negative Zahlen setzt man dabei immer in Klammern ein.

### Beispiel 1

Berechne $3x^2 - 2x + 5$ für $x = -2$.

$$3 \cdot (-2)^2 - 2 \cdot (-2) + 5 = 3 \cdot 4 + 4 + 5 = 21$$

Die Potenz kommt zuerst: $(-2)^2 = 4$. Ohne Klammer würde man $-2^2 = -4$ rechnen und ein falsches Ergebnis erhalten.

### Beispiel 2

Berechne $2a - 3b$ für $a = 4$ und $b = 5$: $2 \cdot 4 - 3 \cdot 5 = 8 - 15 = -7$.

## Gleichartige Glieder zusammenfassen

Zwei Glieder sind **gleichartig**, wenn sie genau denselben Variablenteil haben – dieselben Buchstaben mit denselben Exponenten. Nur die Koeffizienten dürfen sich unterscheiden.

- $3x$ und $-7x$ sind gleichartig.
- $2a^2b$ und $5a^2b$ sind gleichartig.
- $4x$ und $4x^2$ sind **nicht** gleichartig.
- $3ab$ und $3a$ sind **nicht** gleichartig.

> **Merke:** Addieren und subtrahieren kann man nur gleichartige Glieder. Dabei werden die Koeffizienten verrechnet, der Variablenteil bleibt gleich: $5x + 3x = 8x$.

Dahinter steckt das Distributivgesetz: $5x + 3x = (5 + 3)x = 8x$. Es ist wie beim Zählen – 5 Äpfel plus 3 Äpfel sind 8 Äpfel, aber 5 Äpfel plus 3 Birnen bleiben „5 Äpfel + 3 Birnen“.

### Beispiel 3

Vereinfache $4x + 3y - x + 5 + 2y - 8$.

Gleichartige Glieder ordnen und zusammenfassen:

$$(4x - x) + (3y + 2y) + (5 - 8) = 3x + 5y - 3$$

### Beispiel 4

Vereinfache $2a^2 + 3a - 5a^2 + a$.

$$(2a^2 - 5a^2) + (3a + a) = -3a^2 + 4a$$

## Terme multiplizieren

Beim Multiplizieren ist es anders: Hier müssen die Variablen *nicht* übereinstimmen. Man multipliziert die Koeffizienten miteinander und die Variablen miteinander; gleiche Buchstaben werden zu Potenzen zusammengefasst:

$$3x \cdot 4y = 12xy \qquad 2a \cdot 5a = 10a^2 \qquad (-2x^2) \cdot 3x = -6x^3$$

> **Merke:** Für Plus und Minus braucht man gleichartige Glieder, Malnehmen geht immer. $2x + 3x = 5x$, aber $2x \cdot 3x = 6x^2$.

## Texte in Terme übersetzen

Viele Aufgaben sind in Worten gestellt. Typische Übersetzungen:

- „eine Zahl, um 5 vergrößert“ → $x + 5$
- „das Dreifache einer Zahl“ → $3x$
- „das Doppelte einer Zahl, vermindert um 4“ → $2x - 4$
- „das Doppelte der Summe aus einer Zahl und 4“ → $2(x + 4)$
- „das Quadrat einer Zahl“ → $x^2$

Auf die Klammern achten: „das Doppelte der Summe“ ist etwas anderes als „das Doppelte der Zahl plus etwas“.

## Typische Fehler

- Ungleichartige Glieder zusammenfassen: $3x + 2y$ ist **nicht** $5xy$, und $x + x^2$ ist **weder** $x^3$ noch $2x^2$.
- Vergessen, dass das Vorzeichen zum Glied gehört: $5 - 3x + 2x$ ergibt $5 - x$, nicht $5 - 5x$.
- Negative Zahlen ohne Klammer einsetzen, also $-3^2$ statt $(-3)^2$ rechnen.
- $2x$ (zweimal $x$) mit $x^2$ ($x$ mal $x$) verwechseln.
- $x + x = x^2$ rechnen – richtig ist $x + x = 2x$.

## Übungen

1. Berechne $5x - 2x^2$ für $x = 3$.

<details>
<summary>Lösung</summary>

$5 \cdot 3 - 2 \cdot 3^2 = 15 - 2 \cdot 9 = 15 - 18 = -3$.

</details>

2. Vereinfache $7a - 2b + 3a + 6b - a$.

<details>
<summary>Lösung</summary>

$a$-Glieder: $7a + 3a - a = 9a$. $b$-Glieder: $-2b + 6b = 4b$. Ergebnis: $9a + 4b$.

</details>

3. Vereinfache $3x^2 + 2x - x^2 + 4 - 5x$.

<details>
<summary>Lösung</summary>

$(3x^2 - x^2) + (2x - 5x) + 4 = 2x^2 - 3x + 4$.

</details>

4. Multipliziere $(-4a) \cdot 3ab$.

<details>
<summary>Lösung</summary>

Koeffizienten: $(-4) \cdot 3 = -12$. Variablen: $a \cdot ab = a^2b$. Ergebnis: $-12a^2b$.

</details>

5. Stelle einen Term auf und vereinfache: „eine Zahl plus das Dreifache derselben Zahl, vermindert um 7“.

<details>
<summary>Lösung</summary>

$x + 3x - 7 = 4x - 7$.

</details>
