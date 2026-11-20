---
title: Dezimalzahlen und Brüche
category: fractions
order: 50
level: 1
summary: Wie Dezimalzahlen und Brüche zusammenhängen, wie man in beide Richtungen umwandelt und warum manche Brüche periodisch werden.
related: fractions-basics, place-value-and-rounding, percentages, scientific-notation
---

Dezimalzahlen und Brüche sind zwei Schreibweisen für dieselben Zahlen. Auf dem Preisschild steht 2,50 €, im Rezept steht $\frac{1}{2}$ Liter – beides beschreibt Teile eines Ganzen. Wer zwischen den beiden Formen umrechnen kann, wählt immer die, mit der sich gerade leichter rechnen lässt. Außerdem klärt sich dabei eine merkwürdige Tatsache: Manche Brüche ergeben Dezimalzahlen, die nie aufhören.

## Stellenwerte nach dem Komma

Jede Ziffer nach dem Komma steht für einen Bruch mit einer Zehnerpotenz im Nenner: Zehntel, Hundertstel, Tausendstel und so weiter.

$$3{,}725 = 3 + \frac{7}{10} + \frac{2}{100} + \frac{5}{1000}$$

Eine Dezimalzahl ist also eigentlich ein verkleideter Bruch mit dem Nenner $10$, $100$, $1000$, …

## Dezimalzahl in Bruch umwandeln

Man schreibt die Nachkommaziffern über die passende Zehnerpotenz und kürzt. Die Anzahl der Nachkommastellen verrät, wie viele Nullen der Nenner hat.

### Beispiel 1

$$0{,}375 = \frac{375}{1000} = \frac{3}{8}$$

(Gekürzt wurde mit dem ggT $125$.)

### Beispiel 2

$$2{,}4 = \frac{24}{10} = \frac{12}{5} = 2\frac{2}{5}$$

## Bruch in Dezimalzahl umwandeln

Dafür gibt es zwei Wege.

**Auf eine Zehnerpotenz erweitern.** Lässt sich der Nenner auf $10$, $100$ oder $1000$ erweitern, geht es so am schnellsten:

$$\frac{3}{5} = \frac{6}{10} = 0{,}6 \qquad \frac{7}{20} = \frac{35}{100} = 0{,}35$$

**Dividieren.** Der Bruchstrich ist ein Geteiltzeichen, also kann man immer Zähler durch Nenner rechnen, zum Beispiel schriftlich:

$$\frac{3}{8} = 3 : 8 = 0{,}375$$

> **Merke:** Eine Dezimalzahl ist ein Bruch mit einer Zehnerpotenz im Nenner. Einen Bruch wandelt man um, indem man auf $10$, $100$, $1000$, … erweitert oder einfach den Zähler durch den Nenner teilt.

## Abbrechende und periodische Dezimalzahlen

Beim Dividieren passiert eines von zwei Dingen:

- Die Division geht irgendwann auf: $\frac{3}{8} = 0{,}375$. Das ist eine **abbrechende** Dezimalzahl.
- Die Ziffern wiederholen sich endlos: $\frac{1}{3} = 0{,}333\ldots$ Das ist eine **periodische** Dezimalzahl.

Die sich wiederholenden Ziffern – die **Periode** – kennzeichnet man mit einem Strich:

$$\frac{1}{3} = 0{,}\overline{3} \qquad \frac{2}{11} = 0{,}\overline{18} \qquad \frac{5}{6} = 0{,}8\overline{3}$$

Warum muss sich etwas wiederholen? Bei der schriftlichen Division durch $n$ sind nur die Reste $0, 1, \ldots, n - 1$ möglich. Wird der Rest nie $0$, muss irgendwann ein Rest zum zweiten Mal auftreten – und ab da wiederholt sich die ganze Rechnung.

Welche Brüche brechen ab? Man kürzt den Bruch vollständig und zerlegt den Nenner in Primfaktoren:

> **Merke:** Ein vollständig gekürzter Bruch ergibt genau dann eine abbrechende Dezimalzahl, wenn sein Nenner nur die Primfaktoren $2$ und $5$ enthält. Sonst ist die Dezimalzahl periodisch.

So bricht $\frac{7}{40}$ ab, weil $40 = 2^3 \cdot 5$ ist, während $\frac{1}{6}$ periodisch wird, weil $6 = 2 \cdot 3$ ist.

## Periodische Dezimalzahl in Bruch umwandeln

Jede periodische Dezimalzahl lässt sich als Bruch schreiben. Der Trick: Man verschiebt die Periode mit einer Zehnerpotenz und subtrahiert.

### Beispiel 3

Sei $x = 0{,}\overline{4}$. Dann ist $10x = 4{,}\overline{4}$. Beim Subtrahieren fällt der endlose Rest weg:

$$10x - x = 4 \quad \Rightarrow \quad 9x = 4 \quad \Rightarrow \quad x = \frac{4}{9}$$

### Beispiel 4

Bei $x = 0{,}\overline{27}$ hat die Periode zwei Ziffern, also multipliziert man mit $100$:

$$100x - x = 27 \quad \Rightarrow \quad x = \frac{27}{99} = \frac{3}{11}$$

Daraus ergibt sich eine praktische Regel: Beginnt die Periode direkt nach dem Komma und hat $k$ Ziffern, schreibt man sie über $k$ Neunen, etwa $0{,}\overline{27} = \frac{27}{99}$.

## Dezimalzahlen vergleichen

Man vergleicht Stelle für Stelle von links. Es hilft, mit Nullen aufzufüllen, bis beide Zahlen gleich viele Nachkommastellen haben: $0{,}5 = 0{,}50 > 0{,}45$. Mehr Nachkommastellen bedeuten nicht automatisch eine größere Zahl.

### Werte, die man kennen sollte

| Bruch | Dezimalzahl |
|---|---|
| $\frac{1}{2}$ | $0{,}5$ |
| $\frac{1}{4}$ | $0{,}25$ |
| $\frac{3}{4}$ | $0{,}75$ |
| $\frac{1}{5}$ | $0{,}2$ |
| $\frac{1}{8}$ | $0{,}125$ |
| $\frac{1}{3}$ | $0{,}\overline{3}$ |
| $\frac{2}{3}$ | $0{,}\overline{6}$ |

## Typische Fehler

- $0{,}45 > 0{,}5$ glauben, weil $45 > 5$ ist.
- Die falsche Zehnerpotenz verwenden: $0{,}07 = \frac{7}{100}$, nicht $\frac{7}{10}$.
- Eine periodische Zahl runden und dann so tun, als sei sie exakt: $0{,}33$ ist nicht $\frac{1}{3}$.
- Vor dem Kürzen entscheiden, ob ein Bruch abbricht: $\frac{3}{6} = \frac{1}{2}$ bricht ab, obwohl $6$ den Faktor $3$ enthält.

## Übungen

1. Schreibe $0{,}65$ als vollständig gekürzten Bruch.

<details>
<summary>Lösung</summary>

$0{,}65 = \frac{65}{100} = \frac{13}{20}$ (mit $5$ gekürzt).

</details>

2. Schreibe $\frac{7}{8}$ als Dezimalzahl.

<details>
<summary>Lösung</summary>

$\frac{7}{8} = \frac{875}{1000} = 0{,}875$ (mit $125$ erweitert), oder schriftlich $7 : 8 = 0{,}875$.

</details>

3. Schreibe $\frac{4}{15}$ als Dezimalzahl.

<details>
<summary>Lösung</summary>

Schriftliche Division: $4 : 15 = 0{,}2666\ldots = 0{,}2\overline{6}$.

</details>

4. Schreibe $0{,}\overline{36}$ als vollständig gekürzten Bruch.

<details>
<summary>Lösung</summary>

Zweistellige Periode: $0{,}\overline{36} = \frac{36}{99} = \frac{4}{11}$.

</details>

5. Welche dieser Brüche ergeben abbrechende Dezimalzahlen: $\frac{3}{40}$, $\frac{5}{12}$, $\frac{7}{25}$?

<details>
<summary>Lösung</summary>

$40 = 2^3 \cdot 5$ und $25 = 5^2$ enthalten nur die Primfaktoren $2$ und $5$, also brechen $\frac{3}{40} = 0{,}075$ und $\frac{7}{25} = 0{,}28$ ab. $12 = 2^2 \cdot 3$ enthält eine $3$, also ist $\frac{5}{12} = 0{,}41\overline{6}$ periodisch.

</details>
