---
title: Wissenschaftliche Schreibweise
category: arithmetic
order: 90
level: 2
summary: Wie man sehr große und sehr kleine Zahlen kompakt als Zahl mal Zehnerpotenz schreibt und wie man damit rechnet.
related: powers-and-roots, laws-of-exponents, place-value-and-rounding, units-and-conversions
---

Die Erde ist rund 150 000 000 km von der Sonne entfernt, ein rotes Blutkörperchen ist nur etwa 0,000007 m breit. Solche Zahlen sind schwer zu lesen, und beim Abzählen der Nullen verrutscht man leicht. Die **wissenschaftliche Schreibweise** (auch Exponentialschreibweise oder Gleitkommadarstellung) schreibt sie als handliche Zahl mal Zehnerpotenz. So werden sie kompakt, leicht vergleichbar und gut zu berechnen.

## Zehnerpotenzen

Grundlage sind die Zehnerpotenzen:

$$10^1 = 10,\quad 10^2 = 100,\quad 10^3 = 1000,\quad 10^6 = 1\,000\,000$$

Der Exponent gibt an, wie viele Nullen auf die 1 folgen. Für Zahlen kleiner als 1 verwendet man **negative Exponenten**:

$$10^{-1} = \frac{1}{10} = 0{,}1,\quad 10^{-2} = \frac{1}{100} = 0{,}01,\quad 10^{-3} = \frac{1}{1000} = 0{,}001$$

Allgemein gilt $10^{-n} = \frac{1}{10^n}$ und $10^0 = 1$.

## Die Form $a \cdot 10^n$

Eine Zahl steht in wissenschaftlicher Schreibweise, wenn sie die Form

$$a \cdot 10^n \qquad \text{mit } 1 \le a < 10 \text{ und ganzzahligem } n$$

hat. Die Zahl $a$ (die Mantisse) hat genau eine von null verschiedene Ziffer vor dem Komma. Der Exponent $n$ gibt an, um wie viele Stellen das Komma verschoben wurde.

> **Merke:** In der wissenschaftlichen Schreibweise ist der erste Faktor mindestens 1 und kleiner als 10. Ein positiver Exponent steht für eine große Zahl, ein negativer für eine Zahl zwischen 0 und 1.

Beispiele:

- $150\,000\,000 = 1{,}5 \cdot 10^8$
- $0{,}000007 = 7 \cdot 10^{-6}$
- $4230 = 4{,}23 \cdot 10^3$
- $0{,}0805 = 8{,}05 \cdot 10^{-2}$

Taschenrechner zeigen solche Zahlen oft mit einem E an: „E8“ am Ende bedeutet „mal $10^8$“.

## Umwandeln in wissenschaftliche Schreibweise

1. Verschiebe das Komma, bis genau eine von null verschiedene Ziffer davor steht.
2. Zähle, um wie viele Stellen du es verschoben hast. Das ist der Betrag des Exponenten.
3. Nach **links** verschoben (große Zahl): Exponent **positiv**. Nach **rechts** verschoben (kleine Zahl): Exponent **negativ**.

### Beispiel 1

Schreibe $384\,000$ in wissenschaftlicher Schreibweise.

Das Komma steht hinter der letzten Null. Verschiebt man es um 5 Stellen nach links, erhält man $3{,}84$:

$$384\,000 = 3{,}84 \cdot 10^5$$

### Beispiel 2

Schreibe $0{,}000\,029$ in wissenschaftlicher Schreibweise.

Das Komma wandert 5 Stellen nach rechts, dann steht dort $2{,}9$:

$$0{,}000\,029 = 2{,}9 \cdot 10^{-5}$$

## Zurückverwandeln

Multiplizieren mit $10^n$ verschiebt das Komma um $n$ Stellen nach rechts, Multiplizieren mit $10^{-n}$ um $n$ Stellen nach links. Lücken werden mit Nullen aufgefüllt.

- $6{,}02 \cdot 10^4 = 60\,200$
- $3{,}1 \cdot 10^{-3} = 0{,}0031$

> **Merke:** Zähle die Stellen, um die das Komma wandert. Große Zahlen bekommen positive, kleine Zahlen negative Exponenten.

## Rechnen in wissenschaftlicher Schreibweise

### Multiplizieren und Dividieren

Man multipliziert (bzw. dividiert) die vorderen Zahlen und behandelt die Zehnerpotenzen getrennt. Dabei gilt $10^m \cdot 10^n = 10^{m+n}$ und $10^m : 10^n = 10^{m-n}$.

### Beispiel 3

$$(3 \cdot 10^4) \cdot (5 \cdot 10^7) = (3 \cdot 5) \cdot 10^{4+7} = 15 \cdot 10^{11}$$

$15$ liegt nicht zwischen 1 und 10, also wird angepasst: $15 = 1{,}5 \cdot 10^1$. Damit gilt

$$15 \cdot 10^{11} = 1{,}5 \cdot 10^{12}$$

### Beispiel 4

$$\frac{8{,}4 \cdot 10^{3}}{2 \cdot 10^{-2}} = \frac{8{,}4}{2} \cdot 10^{3 - (-2)} = 4{,}2 \cdot 10^5$$

### Addieren und Subtrahieren

Hier müssen die Exponenten zuerst **gleich** gemacht werden – so wie man auch nur gleichartige Terme zusammenfassen kann.

### Beispiel 5

$$6 \cdot 10^5 + 3 \cdot 10^4 = 6 \cdot 10^5 + 0{,}3 \cdot 10^5 = 6{,}3 \cdot 10^5$$

Probe mit ausgeschriebenen Zahlen: $600\,000 + 30\,000 = 630\,000$.

## Zahlen vergleichen

Beim Vergleichen schaut man zuerst auf die Exponenten: Der größere Exponent gewinnt, egal wie die vorderen Zahlen aussehen. Nur bei gleichen Exponenten vergleicht man die Mantissen.

$9{,}9 \cdot 10^3 < 1{,}1 \cdot 10^4$, denn $9900 < 11\,000$.

## Typische Fehler

- Die vordere Zahl liegt nicht im richtigen Bereich: $12 \cdot 10^3$ oder $0{,}5 \cdot 10^2$ sind keine wissenschaftliche Schreibweise.
- Das Vorzeichen des Exponenten vertauschen: Kleine Zahlen brauchen einen negativen Exponenten.
- Stellen falsch zählen, besonders bei Nullen direkt nach dem Komma.
- Beim Addieren die Exponenten addieren: $2 \cdot 10^3 + 3 \cdot 10^3 = 5 \cdot 10^3$, nicht $5 \cdot 10^6$.
- Nach dem Multiplizieren vergessen anzupassen, etwa $15 \cdot 10^{11}$ stehen lassen.

## Übungen

1. Schreibe in wissenschaftlicher Schreibweise: $72\,000\,000$ und $0{,}00045$.

<details>
<summary>Lösung</summary>

$72\,000\,000 = 7{,}2 \cdot 10^7$ (Komma 7 Stellen nach links). $0{,}00045 = 4{,}5 \cdot 10^{-4}$ (Komma 4 Stellen nach rechts).

</details>

2. Schreibe als gewöhnliche Zahl: $5{,}06 \cdot 10^6$ und $1{,}2 \cdot 10^{-5}$.

<details>
<summary>Lösung</summary>

$5{,}06 \cdot 10^6 = 5\,060\,000$ und $1{,}2 \cdot 10^{-5} = 0{,}000012$.

</details>

3. Berechne $(4 \cdot 10^{-3}) \cdot (6 \cdot 10^{8})$ und gib das Ergebnis in wissenschaftlicher Schreibweise an.

<details>
<summary>Lösung</summary>

$4 \cdot 6 = 24$ und $10^{-3} \cdot 10^8 = 10^5$. Also $24 \cdot 10^5 = 2{,}4 \cdot 10^6$.

</details>

4. Berechne $\frac{9 \cdot 10^{4}}{3 \cdot 10^{9}}$.

<details>
<summary>Lösung</summary>

$\frac{9}{3} = 3$ und $10^{4-9} = 10^{-5}$. Ergebnis: $3 \cdot 10^{-5}$.

</details>

5. Licht legt pro Sekunde etwa $3 \cdot 10^8$ m zurück. Wie weit kommt es in $5 \cdot 10^2$ Sekunden (ungefähr die Zeit von der Sonne bis zur Erde)?

<details>
<summary>Lösung</summary>

$(3 \cdot 10^8) \cdot (5 \cdot 10^2) = 15 \cdot 10^{10} = 1{,}5 \cdot 10^{11}$ m, das sind $150$ Millionen km.

</details>
