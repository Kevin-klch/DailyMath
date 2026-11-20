---
title: Primzahlen und Primfaktorzerlegung
category: arithmetic
order: 60
level: 1
summary: Was eine Primzahl ausmacht, wie man sie erkennt und wie man jede natürliche Zahl in ihre Primfaktoren zerlegt.
related: divisibility-rules, gcd-and-lcm, powers-and-roots, proof-by-induction
---

Primzahlen sind die Bausteine der natürlichen Zahlen: Jede natürliche Zahl größer als 1 lässt sich als Produkt von Primzahlen schreiben – und zwar auf genau eine Weise. Wer Primzahlen erkennt und Zahlen in **Primfaktoren** zerlegen kann, hat es beim Kürzen von Brüchen, beim Finden des Hauptnenners und beim Berechnen von ggT und kgV deutlich leichter.

## Was ist eine Primzahl?

Eine **Primzahl** ist eine natürliche Zahl größer als 1, die genau zwei Teiler hat: die 1 und sich selbst.

- $7$ ist eine Primzahl: Ihre einzigen Teiler sind $1$ und $7$.
- $9$ ist keine Primzahl: Sie hat die Teiler $1$, $3$ und $9$.

Eine natürliche Zahl größer als 1, die keine Primzahl ist, heißt **zusammengesetzt**. Sie lässt sich als Produkt zweier kleinerer natürlicher Zahlen schreiben, zum Beispiel $9 = 3 \cdot 3$.

Die Zahl $1$ ist **weder** Primzahl noch zusammengesetzt – sie hat nur einen einzigen Teiler.

Die Primzahlen unter 50 lauten:

$$2,\ 3,\ 5,\ 7,\ 11,\ 13,\ 17,\ 19,\ 23,\ 29,\ 31,\ 37,\ 41,\ 43,\ 47$$

Die $2$ ist die einzige gerade Primzahl. Jede andere gerade Zahl ist durch 2 teilbar und damit zusammengesetzt.

> **Merke:** Eine Primzahl hat genau zwei Teiler, nämlich 1 und sich selbst. Die 1 ist keine Primzahl.

## Das Sieb des Eratosthenes

Ein altes und elegantes Verfahren, um alle Primzahlen bis zu einer Grenze zu finden:

1. Schreibe alle Zahlen von 2 bis zur Grenze auf, zum Beispiel bis 100.
2. Kreise die $2$ ein und streiche alle weiteren Vielfachen von 2: $4, 6, 8, \dots$
3. Die nächste nicht gestrichene Zahl ist die $3$. Kreise sie ein und streiche alle ihre Vielfachen.
4. Mache mit $5$ weiter, dann mit $7$ und so fort.
5. Alle Zahlen, die übrig bleiben, sind Primzahlen.

Bis 100 muss man nur mit $2, 3, 5$ und $7$ sieben, denn $11 \cdot 11 = 121$ ist schon größer als 100.

## Prüfen, ob eine Zahl prim ist

Um zu prüfen, ob $n$ eine Primzahl ist, teilt man probeweise durch die Primzahlen $2, 3, 5, 7, \dots$ – aber nur bis $\sqrt{n}$. Ist keine davon ein Teiler, dann ist $n$ eine Primzahl.

Warum reicht das? Wäre $n = a \cdot b$ mit zwei Faktoren, die beide größer als $\sqrt{n}$ sind, dann wäre das Produkt größer als $n$. Mindestens ein Faktor muss also höchstens $\sqrt{n}$ sein.

### Beispiel 1

Ist $97$ eine Primzahl? Wegen $\sqrt{97} \approx 9{,}8$ prüft man $2, 3, 5, 7$:

- ungerade, also nicht durch 2 teilbar
- Quersumme $16$, also nicht durch 3 teilbar
- endet nicht auf 0 oder 5
- $97 : 7 = 13$ Rest $6$

Kein Teiler gefunden – $97$ ist eine Primzahl.

### Beispiel 2

Ist $91$ eine Primzahl? $\sqrt{91} \approx 9{,}5$. Test mit $7$: $91 = 7 \cdot 13$. Also ist $91$ zusammengesetzt – eine beliebte Falle, weil die Zahl „wie eine Primzahl aussieht“.

## Primfaktorzerlegung

Bei der **Primfaktorzerlegung** schreibt man eine Zahl als Produkt von Primzahlen. Der **Hauptsatz der Arithmetik** besagt: Jede natürliche Zahl größer als 1 besitzt eine solche Zerlegung, und diese ist bis auf die Reihenfolge der Faktoren eindeutig.

> **Merke:** Jede natürliche Zahl größer als 1 lässt sich auf genau eine Weise (abgesehen von der Reihenfolge) als Produkt von Primzahlen schreiben.

### Verfahren: fortgesetztes Teilen

Man teilt durch die kleinste passende Primzahl und wiederholt das mit dem Ergebnis, bis 1 übrig bleibt.

### Beispiel 3

Zerlege $360$ in Primfaktoren.

- $360 : 2 = 180$
- $180 : 2 = 90$
- $90 : 2 = 45$
- $45 : 3 = 15$
- $15 : 3 = 5$
- $5 : 5 = 1$

Man sammelt die Teiler und fasst gleiche Faktoren zu Potenzen zusammen:

$$360 = 2 \cdot 2 \cdot 2 \cdot 3 \cdot 3 \cdot 5 = 2^3 \cdot 3^2 \cdot 5$$

### Verfahren: Faktorbaum

Man kann eine Zahl auch in zwei beliebige Faktoren zerlegen und so lange weiterzerlegen, bis nur noch Primzahlen dastehen:

$$84 = 4 \cdot 21 = (2 \cdot 2) \cdot (3 \cdot 7) = 2^2 \cdot 3 \cdot 7$$

Egal, wie man anfängt – am Ende stehen immer dieselben Primfaktoren. Genau das bedeutet „eindeutig“.

## Was die Zerlegung verrät

Aus der Primfaktorzerlegung kann man alle Teiler ablesen. Jeder Teiler von $2^3 \cdot 3^2 \cdot 5$ hat die Form $2^a \cdot 3^b \cdot 5^c$ mit $0 \le a \le 3$, $0 \le b \le 2$, $0 \le c \le 1$. Das ergibt $4 \cdot 3 \cdot 2 = 24$ Teiler von $360$.

## Es gibt unendlich viele Primzahlen

Das hat Euklid schon vor über 2000 Jahren bewiesen. Angenommen, es gäbe nur endlich viele Primzahlen $p_1, p_2, \dots, p_k$. Die Zahl $N = p_1 \cdot p_2 \cdots p_k + 1$ lässt bei Division durch jede von ihnen den Rest 1, keine davon teilt also $N$. Trotzdem muss $N$ einen Primfaktor haben – und der fehlt in der Liste. Widerspruch!

## Typische Fehler

- Die $1$ als Primzahl bezeichnen.
- Glauben, alle ungeraden Zahlen seien Primzahlen: $9$, $15$, $21$, $91$ sind ungerade, aber zusammengesetzt.
- Die Zerlegung zu früh beenden, etwa $360 = 2^3 \cdot 45$ – die $45$ ist keine Primzahl.
- Teiler weit über $\sqrt{n}$ hinaus testen – das ist unnötige Arbeit.
- Beim Einsammeln der Ergebnisse einen Faktor vergessen.

## Übungen

1. Welche dieser Zahlen sind Primzahlen: $29$, $39$, $51$, $53$, $87$?

<details>
<summary>Lösung</summary>

$29$ und $53$ sind Primzahlen. $39 = 3 \cdot 13$, $51 = 3 \cdot 17$ und $87 = 3 \cdot 29$ sind zusammengesetzt (ihre Quersumme ist jeweils durch 3 teilbar).

</details>

2. Zerlege $252$ in Primfaktoren.

<details>
<summary>Lösung</summary>

$252 : 2 = 126$, $126 : 2 = 63$, $63 : 3 = 21$, $21 : 3 = 7$, $7 : 7 = 1$. Also $252 = 2^2 \cdot 3^2 \cdot 7$.

</details>

3. Ist $143$ eine Primzahl?

<details>
<summary>Lösung</summary>

$\sqrt{143} \approx 12$, also prüft man $2, 3, 5, 7, 11$. Die Zahl ist ungerade, die Quersumme ist $8$, sie endet nicht auf 0 oder 5, und $143 : 7$ lässt den Rest $3$. Aber $143 = 11 \cdot 13$ – also zusammengesetzt.

</details>

4. Zerlege $1000$ und $1001$ in Primfaktoren.

<details>
<summary>Lösung</summary>

$1000 = 10^3 = (2 \cdot 5)^3 = 2^3 \cdot 5^3$. Für $1001$ gilt: $1001 = 7 \cdot 143 = 7 \cdot 11 \cdot 13$.

</details>

5. Wie viele Teiler hat $72 = 2^3 \cdot 3^2$?

<details>
<summary>Lösung</summary>

Der Exponent von 2 kann $0$ bis $3$ sein (4 Möglichkeiten), der Exponent von 3 kann $0$ bis $2$ sein (3 Möglichkeiten). Also gibt es $4 \cdot 3 = 12$ Teiler: $1, 2, 3, 4, 6, 8, 9, 12, 18, 24, 36, 72$.

</details>
