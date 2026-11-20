---
title: Folgen und Reihen
category: calculus
order: 10
level: 2
summary: Zahlen, die einer Regel folgen – arithmetische und geometrische Folgen, Summenformeln und warum eine unendliche Summe trotzdem endlich sein kann.
related: limits, proof-by-induction, exponential-functions, percentage-change
---

Eine **Folge** ist eine geordnete Liste von Zahlen, die nach einer bestimmten Regel gebildet wird, etwa $2, 4, 6, 8, \ldots$ Addiert man die Glieder einer Folge, erhält man eine **Reihe**. Folgen beschreiben alles, was sich schrittweise entwickelt – ein Sparguthaben von Jahr zu Jahr oder ein springender Ball, der immer weniger hoch springt. Außerdem sind sie der Einstieg in Grenzwerte und Analysis.

## Was ist eine Folge?

Die Glieder einer Folge schreibt man als $a_1, a_2, a_3, \ldots$ Die kleine Zahl $n$ in $a_n$ heißt **Index** und gibt die Position des Glieds an. Eine Folge lässt sich auf zwei Arten angeben:

- **Explizit:** $a_n$ wird direkt durch $n$ ausgedrückt, zum Beispiel $a_n = n^2$. Jedes Glied lässt sich sofort berechnen: $a_{10} = 100$.
- **Rekursiv:** Jedes Glied wird aus dem vorherigen berechnet, zum Beispiel $a_1 = 3$ und $a_{n+1} = a_n + 5$. Für $a_{10}$ muss man sich Glied für Glied vorarbeiten.

Eine Folge heißt **monoton steigend**, wenn jedes Glied mindestens so groß ist wie das vorige ($a_{n+1} \ge a_n$), und **monoton fallend**, wenn $a_{n+1} \le a_n$ gilt. Sie heißt **beschränkt**, wenn alle Glieder zwischen zwei festen Zahlen liegen.

## Arithmetische Folgen

Bei einer **arithmetischen Folge** ist die Differenz zweier aufeinanderfolgender Glieder immer gleich. Diese feste Differenz heißt $d$:

$$3, \; 7, \; 11, \; 15, \; \ldots \qquad (d = 4)$$

Um von $a_1$ zu $a_n$ zu kommen, addiert man $d$ genau $(n-1)$-mal.

> **Merke:** Arithmetische Folge: $a_n = a_1 + (n-1) \cdot d$. Geometrische Folge: $a_n = a_1 \cdot q^{n-1}$.

### Beispiel 1

Bestimme das 20. Glied der Folge $3, 7, 11, 15, \ldots$

Es ist $a_1 = 3$ und $d = 4$, also $a_n = 3 + (n-1) \cdot 4 = 4n - 1$. Damit ist $a_{20} = 4 \cdot 20 - 1 = 79$.

## Geometrische Folgen

Bei einer **geometrischen Folge** entsteht jedes Glied, indem man das vorige mit demselben Faktor $q$ multipliziert. Der Quotient zweier aufeinanderfolgender Glieder ist also konstant:

$$2, \; 6, \; 18, \; 54, \; \ldots \qquad (q = 3)$$

Für $q > 1$ (und $a_1 > 0$) wachsen die Glieder sehr schnell – das ist exponentielles Wachstum. Für $0 < q < 1$ werden sie immer kleiner und nähern sich der Null. Ist $q$ negativ, wechseln die Vorzeichen ständig.

### Beispiel 2

Gib eine Formel für $2, 6, 18, 54, \ldots$ an und berechne $a_6$.

$a_1 = 2$ und $q = \frac{6}{2} = 3$, also $a_n = 2 \cdot 3^{n-1}$ und $a_6 = 2 \cdot 3^5 = 2 \cdot 243 = 486$.

## Reihen: Glieder aufsummieren

Die Summe der ersten $n$ Glieder heißt **Partialsumme** $s_n$. Mit dem Summenzeichen schreibt man:

$$s_n = a_1 + a_2 + \ldots + a_n = \sum_{k=1}^{n} a_k$$

### Die arithmetische Summenformel

Der junge Carl Friedrich Gauß soll $1 + 2 + \ldots + 100$ in Sekunden ausgerechnet haben: Er fasste das erste und letzte Glied zusammen ($1 + 100$), dann das zweite und vorletzte ($2 + 99$) und so weiter. Jedes Paar ergibt $101$, und es gibt $50$ Paare – die Summe ist also $5050$. Der Trick funktioniert bei jeder arithmetischen Folge:

$$s_n = \frac{n \cdot (a_1 + a_n)}{2}$$

In Beispiel 1 ist die Summe der ersten 20 Glieder $\frac{20 \cdot (3 + 79)}{2} = 820$.

### Die geometrische Summenformel

Für eine geometrische Folge mit $q \ne 1$ gilt:

$$s_n = a_1 \cdot \frac{q^n - 1}{q - 1}$$

In Beispiel 2 ergeben die ersten fünf Glieder $2 \cdot \frac{3^5 - 1}{3 - 1} = 2 \cdot \frac{242}{2} = 242$. Probe: $2 + 6 + 18 + 54 + 162 = 242$.

## Die unendliche geometrische Reihe

Kann man unendlich viele Zahlen addieren und trotzdem ein endliches Ergebnis erhalten? Ja – wenn die Glieder schnell genug kleiner werden. Für $|q| < 1$ geht $q^n$ für wachsendes $n$ gegen $0$, und aus der Summenformel wird:

> **Merke:** Für $|q| < 1$ konvergiert die unendliche geometrische Reihe: $a_1 + a_1 q + a_1 q^2 + \ldots = \dfrac{a_1}{1 - q}$. Für $|q| \ge 1$ gibt es keinen endlichen Wert.

### Beispiel 3

$$1 + \frac{1}{2} + \frac{1}{4} + \frac{1}{8} + \ldots = \frac{1}{1 - \frac{1}{2}} = 2$$

Anschaulich: Du gehst die halbe Strecke bis zu einer Wand, dann die Hälfte des Rests und so weiter. Du kommst nie über die Wand hinaus – insgesamt legst du genau die ganze Strecke zurück.

Damit lässt sich auch erklären, warum $0{,}\overline{9} = 1$ ist: Es handelt sich um die Reihe $0{,}9 + 0{,}09 + 0{,}009 + \ldots$ mit $a_1 = 0{,}9$ und $q = 0{,}1$. Ihr Wert ist $\frac{0{,}9}{0{,}9} = 1$.

## Typische Fehler

- $a_1 + n \cdot d$ statt $a_1 + (n-1) \cdot d$ rechnen – zum ersten Glied braucht man null Schritte.
- Arithmetisch und geometrisch verwechseln: Prüfe, ob sich die Glieder um eine feste Zahl *unterscheiden* oder mit einer festen Zahl *multipliziert* werden.
- $\frac{a_1}{1-q}$ auch für $|q| \ge 1$ verwenden. Dann hat die Reihe keinen endlichen Wert.
- Folge (die Liste der Glieder) und Reihe (die Summe der Glieder) durcheinanderbringen.

## Übungen

1. Eine arithmetische Folge hat $a_1 = 5$ und $d = -3$. Berechne $a_{10}$.

<details>
<summary>Lösung</summary>

$a_{10} = 5 + 9 \cdot (-3) = 5 - 27 = -22$.

</details>

2. Berechne $1 + 2 + 3 + \ldots + 50$.

<details>
<summary>Lösung</summary>

Arithmetische Summenformel mit $n = 50$, $a_1 = 1$ und $a_{50} = 50$: $s_{50} = \frac{50 \cdot 51}{2} = 1275$.

</details>

3. Bestimme für die geometrische Folge $3, 6, 12, \ldots$ das Glied $a_8$ und die Summe der ersten 8 Glieder.

<details>
<summary>Lösung</summary>

$q = 2$, also $a_8 = 3 \cdot 2^7 = 384$. Die Summe ist $s_8 = 3 \cdot \frac{2^8 - 1}{2 - 1} = 3 \cdot 255 = 765$.

</details>

4. Berechne den Wert von $12 + 4 + \frac{4}{3} + \frac{4}{9} + \ldots$

<details>
<summary>Lösung</summary>

Geometrische Reihe mit $a_1 = 12$ und $q = \frac{1}{3}$. Wegen $|q| < 1$ ist der Wert $\frac{12}{1 - \frac{1}{3}} = \frac{12}{\frac{2}{3}} = 18$.

</details>

5. Eine Folge ist rekursiv gegeben durch $a_1 = 1$ und $a_{n+1} = 2a_n + 1$. Schreibe die ersten fünf Glieder auf und finde eine explizite Formel.

<details>
<summary>Lösung</summary>

$1, 3, 7, 15, 31$. Jedes Glied ist um eins kleiner als eine Zweierpotenz, also $a_n = 2^n - 1$.

</details>
