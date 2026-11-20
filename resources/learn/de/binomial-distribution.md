---
title: Binomialverteilung
category: stochastics
order: 70
level: 3
summary: Wie wahrscheinlich sind genau k Treffer bei n unabhängigen Versuchen? Bernoulli-Formel, kumulierte Wahrscheinlichkeiten, Erwartungswert und Standardabweichung.
related: tree-diagrams, combinatorics, spread, probability-basics
---

Zehnmal eine Münze werfen und zählen, wie oft Kopf fällt. Bei einem Multiple-Choice-Test raten und die richtigen Antworten zählen. 50 Produkte prüfen und die defekten zählen. In all diesen Fällen wird dasselbe Experiment mehrmals wiederholt, jedes Mal mit nur zwei möglichen Ausgängen, und man zählt, wie oft einer davon eintritt. Die **Binomialverteilung** liefert die Wahrscheinlichkeit für jede mögliche Anzahl – sie ist eine der wichtigsten Verteilungen der ganzen Stochastik.

## Bernoulli-Experimente

Ein **Bernoulli-Experiment** ist ein Zufallsexperiment mit genau zwei Ausgängen, die man **Treffer** und **Niete** nennt. Die **Trefferwahrscheinlichkeit** ist $p$, die Wahrscheinlichkeit für eine Niete ist $1 - p$ (oft auch $q$ genannt).

Was als „Treffer“ gilt, legt man selbst fest: eine Sechs würfeln, ein defektes Teil, ein geheilter Patient. Ein Treffer muss also nichts Positives sein.

Eine **Bernoulli-Kette** der Länge $n$ besteht aus $n$ solchen Versuchen, die

1. voneinander **unabhängig** sind und
2. jedes Mal **dieselbe** Trefferwahrscheinlichkeit $p$ haben.

Die Zufallsgröße $X$ = „Anzahl der Treffer“ kann die Werte $0, 1, 2, \dots, n$ annehmen. Sind die Bedingungen erfüllt, heißt $X$ **binomialverteilt** mit den Parametern $n$ und $p$.

## Die Bernoulli-Formel

Wie wahrscheinlich sind genau $k$ Treffer? Betrachte einen bestimmten Pfad im Baumdiagramm mit $k$ Treffern und $n - k$ Nieten, etwa Treffer, Treffer, Niete, … Nach der 1. Pfadregel hat er die Wahrscheinlichkeit

$$p^k \cdot (1 - p)^{n - k}$$

Jeder Pfad mit genau $k$ Treffern hat dieselbe Wahrscheinlichkeit – nur die Reihenfolge ist eine andere. Wie viele solche Pfade gibt es? So viele, wie man die $k$ Trefferpositionen unter den $n$ Versuchen auswählen kann, also $\binom{n}{k}$. Damit gilt:

$$P(X = k) = \binom{n}{k} \cdot p^k \cdot (1 - p)^{n - k}$$

In vielen Büchern schreibt man dafür auch $B(n; p; k)$.

> **Merke:** $P(X = k) = \binom{n}{k} p^k (1 - p)^{n - k}$. Der Binomialkoeffizient zählt die Pfade, die Potenzen liefern die Wahrscheinlichkeit eines einzelnen Pfades.

### Beispiel 1

Eine faire Münze wird 4-mal geworfen, $X$ ist die Anzahl von Kopf. Also $n = 4$ und $p = 0{,}5$. Weil $p = 1 - p = 0{,}5$ ist, hat jeder Pfad die Wahrscheinlichkeit $0{,}5^4 = \frac{1}{16}$:

| $k$ | 0 | 1 | 2 | 3 | 4 |
|---|---|---|---|---|---|
| $\binom{4}{k}$ | 1 | 4 | 6 | 4 | 1 |
| $P(X = k)$ | $\frac{1}{16}$ | $\frac{4}{16}$ | $\frac{6}{16}$ | $\frac{4}{16}$ | $\frac{1}{16}$ |

Zweimal Kopf ist mit $\frac{6}{16} = 0{,}375$ am wahrscheinlichsten. Alle Wahrscheinlichkeiten ergeben zusammen $1$.

### Beispiel 2

Ein Würfel wird 5-mal geworfen. Wie wahrscheinlich sind genau zwei Sechsen? Hier ist $n = 5$, $p = \frac{1}{6}$, $k = 2$:

$$P(X = 2) = \binom{5}{2} \cdot \left(\frac{1}{6}\right)^2 \cdot \left(\frac{5}{6}\right)^3 = 10 \cdot \frac{1}{36} \cdot \frac{125}{216} = \frac{1250}{7776} \approx 0{,}161$$

## „Höchstens“ und „mindestens“

Oft ist nach einem ganzen Bereich von Werten gefragt. Dann addiert man die einzelnen Wahrscheinlichkeiten – das nennt man **kumulierte Wahrscheinlichkeit**:

$$P(X \le k) = P(X = 0) + P(X = 1) + \dots + P(X = k)$$

Bei „mindestens“ geht es meist schneller über das Gegenereignis:

$$P(X \ge k) = 1 - P(X \le k - 1)$$

Für größere $n$ nimmt man kumulierte Wahrscheinlichkeiten in der Praxis aus dem Taschenrechner oder einer Tabelle.

### Beispiel 3: Raten im Test

Ein Test hat 10 Multiple-Choice-Fragen mit je 4 Antwortmöglichkeiten. Eine Schülerin rät bei jeder Frage, also $n = 10$ und $p = 0{,}25$.

**Mindestens eine richtige Antwort:**

$$P(X \ge 1) = 1 - P(X = 0) = 1 - 0{,}75^{10} \approx 1 - 0{,}0563 = 0{,}9437$$

**Höchstens zwei richtige Antworten:**

$$P(X = 0) = 0{,}75^{10} \approx 0{,}0563$$

$$P(X = 1) = 10 \cdot 0{,}25 \cdot 0{,}75^9 \approx 0{,}1877$$

$$P(X = 2) = 45 \cdot 0{,}25^2 \cdot 0{,}75^8 \approx 0{,}2816$$

$$P(X \le 2) \approx 0{,}0563 + 0{,}1877 + 0{,}2816 = 0{,}5256$$

Wer nur rät, hat also in mehr als der Hälfte der Fälle höchstens 2 von 10 Antworten richtig.

## Erwartungswert und Standardabweichung

Der **Erwartungswert** ist die durchschnittliche Trefferzahl, die man erhält, wenn man die ganze Kette sehr oft wiederholt. Bei der Binomialverteilung ist er einfach

$$\mu = E(X) = n \cdot p$$

Die Streuung um diesen Wert beschreiben Varianz und Standardabweichung:

$$\sigma^2 = n \cdot p \cdot (1 - p), \qquad \sigma = \sqrt{n \cdot p \cdot (1 - p)}$$

> **Merke:** Für eine binomialverteilte Zufallsgröße gilt $\mu = np$ und $\sigma = \sqrt{np(1 - p)}$.

Für die ratende Schülerin aus Beispiel 3: $\mu = 10 \cdot 0{,}25 = 2{,}5$ richtige Antworten im Schnitt und $\sigma = \sqrt{10 \cdot 0{,}25 \cdot 0{,}75} = \sqrt{1{,}875} \approx 1{,}37$.

Das Histogramm einer Binomialverteilung hat sein Maximum bei oder direkt neben $\mu$. Für $p = 0{,}5$ ist es symmetrisch, für kleines $p$ linkssteil, für großes $p$ rechtssteil. Je größer $n$ ist, desto mehr ähnelt es einer Glockenkurve, und der größte Teil der Wahrscheinlichkeit liegt innerhalb von etwa zwei Standardabweichungen um $\mu$.

## Wann ist etwas binomialverteilt?

Vor dem Einsetzen in die Formel immer die Bedingungen prüfen:

- genau **zwei** Ausgänge pro Versuch,
- eine **feste** Anzahl $n$ von Versuchen,
- **dieselbe** Trefferwahrscheinlichkeit $p$ bei jedem Versuch,
- **unabhängige** Versuche.

Ziehen **mit** Zurücklegen passt. Ziehen **ohne** Zurücklegen aus einer kleinen Urne passt nicht, weil sich $p$ nach jedem Zug ändert. (Ist die Urne im Vergleich zur Anzahl der Züge sehr groß, ist die Binomialverteilung trotzdem eine gute Näherung.)

## Typische Fehler

- Den Binomialkoeffizienten vergessen und nur $p^k (1 - p)^{n - k}$ ausrechnen – das ist die Wahrscheinlichkeit eines einzigen Pfades.
- $k$ und $n - k$ in den Exponenten vertauschen.
- „Mindestens 3“ als $1 - P(X \le 3)$ statt als $1 - P(X \le 2)$ berechnen.
- Die Binomialverteilung verwenden, obwohl sich $p$ ändert, etwa beim Ziehen ohne Zurücklegen aus einer kleinen Urne.
- $\sigma = np(1 - p)$ rechnen und die Wurzel vergessen.

## Übungen

1. Eine faire Münze wird 6-mal geworfen. Wie wahrscheinlich ist genau 3-mal Kopf?

<details>
<summary>Lösung</summary>

$P(X = 3) = \binom{6}{3} \cdot 0{,}5^3 \cdot 0{,}5^3 = 20 \cdot \frac{1}{64} = \frac{20}{64} = \frac{5}{16} = 0{,}3125$.

</details>

2. Ein Würfel wird 3-mal geworfen. Wie wahrscheinlich ist genau eine Sechs?

<details>
<summary>Lösung</summary>

$P(X = 1) = \binom{3}{1} \cdot \frac{1}{6} \cdot \left(\frac{5}{6}\right)^2 = 3 \cdot \frac{1}{6} \cdot \frac{25}{36} = \frac{75}{216} = \frac{25}{72} \approx 0{,}347$.

</details>

3. $10\,\%$ der Schrauben einer Maschine sind defekt. Es werden 5 Schrauben geprüft. Bestimme die Wahrscheinlichkeit, dass (a) keine defekt ist, (b) mindestens eine defekt ist.

<details>
<summary>Lösung</summary>

$n = 5$, $p = 0{,}1$. (a) $P(X = 0) = 0{,}9^5 = 0{,}59049 \approx 0{,}590$. (b) $P(X \ge 1) = 1 - 0{,}59049 = 0{,}40951 \approx 0{,}410$.

</details>

4. $X$ ist binomialverteilt mit $n = 100$ und $p = 0{,}2$. Berechne Erwartungswert und Standardabweichung.

<details>
<summary>Lösung</summary>

$\mu = 100 \cdot 0{,}2 = 20$. $\sigma = \sqrt{100 \cdot 0{,}2 \cdot 0{,}8} = \sqrt{16} = 4$.

</details>

5. Aus einer Urne mit 3 roten und 2 blauen Kugeln werden 3 Kugeln ohne Zurücklegen gezogen. Ist die Anzahl der roten Kugeln binomialverteilt?

<details>
<summary>Lösung</summary>

Nein. Ohne Zurücklegen ändert sich die Wahrscheinlichkeit für Rot nach jedem Zug (zum Beispiel von $\frac{3}{5}$ auf $\frac{2}{4}$ nach einer roten Kugel), die Versuche sind also nicht unabhängig mit konstantem $p$. Mit Zurücklegen wäre die Anzahl binomialverteilt mit $n = 3$ und $p = 0{,}6$.

</details>
