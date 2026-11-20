---
title: Exponentialfunktionen
category: functions
order: 50
level: 2
summary: Wachstum und Zerfall mit festem Faktor – die Form f(x) = a · bˣ, Wachstumsfaktor und Prozentsatz, Verdopplungszeit, Halbwertszeit und die eulersche Zahl e.
related: laws-of-exponents, logarithms, exponential-equations, percentage-change
---

Bei einer **Exponentialfunktion** steht die Variable im Exponenten: $f(x) = 2^x$. Solche Funktionen beschreiben Vorgänge, bei denen eine Größe in jedem Zeitschritt mit demselben Faktor **multipliziert** wird – Bakterien, die sich teilen, Guthaben mit Zinseszins oder radioaktiver Zerfall. Exponentielles Wachstum beginnt unscheinbar, überholt aber schon bald jedes lineare Wachstum – deshalb wird es so oft unterschätzt.

## Die allgemeine Form

Eine Exponentialfunktion hat die Form

$$f(x) = a \cdot b^x \qquad (a \neq 0,\; b > 0,\; b \neq 1)$$

- $a = f(0)$ ist der **Anfangswert** (der y-Achsenabschnitt).
- $b$ ist der **Wachstumsfaktor**: Wird $x$ um $1$ größer, wird der Funktionswert mit $b$ multipliziert.

> **Merke:** Lineare Funktionen addieren pro Schritt denselben Betrag, Exponentialfunktionen multiplizieren pro Schritt mit demselben Faktor. $b > 1$ bedeutet Wachstum, $0 < b < 1$ bedeutet Zerfall (Abnahme).

Die Basis muss positiv sein – bei $b = -2$ wäre etwa $(-2)^{1/2}$ keine reelle Zahl –, und $b = 1$ ergäbe nur eine konstante Funktion.

## Der Graph

Wertetabelle von $f(x) = 2^x$:

| $x$ | $-2$ | $-1$ | $0$ | $1$ | $2$ | $3$ |
|---|---|---|---|---|---|---|
| $2^x$ | $\frac{1}{4}$ | $\frac{1}{2}$ | $1$ | $2$ | $4$ | $8$ |

Der Graph geht durch $(0 \mid 1)$, steigt nach rechts immer steiler an und schmiegt sich nach links immer enger an die $x$-Achse an, ohne sie je zu erreichen. Die $x$-Achse ($y = 0$) ist eine waagerechte **Asymptote**.

Der Graph von $\left(\frac{1}{2}\right)^x = 2^{-x}$ ist das Spiegelbild von $2^x$ an der $y$-Achse: Er fällt von links nach rechts und nähert sich rechts der $x$-Achse.

Für $f(x) = a \cdot b^x$ mit $a > 0$ gilt:

- Alle Funktionswerte sind **positiv** – der Graph berührt oder schneidet die $x$-Achse nie, es gibt **keine Nullstellen**.
- Die Wertemenge ist $W = \{y \in \mathbb{R} \mid y > 0\}$.
- Der Graph schneidet die $y$-Achse in $(0 \mid a)$.

## Linear oder exponentiell?

Vergleich von $g(x) = 2x$ und $f(x) = 2^x$:

| $x$ | $1$ | $2$ | $5$ | $10$ | $20$ |
|---|---|---|---|---|---|
| $2x$ | $2$ | $4$ | $10$ | $20$ | $40$ |
| $2^x$ | $2$ | $4$ | $32$ | $1024$ | $1\,048\,576$ |

Anfangs stimmen die Werte überein, dann zieht die Exponentialfunktion davon. Auf lange Sicht übertrifft exponentielles Wachstum jedes lineare und sogar jedes ganzrationale Wachstum.

## Prozentsatz und Wachstumsfaktor

Wächst eine Größe um $p$ Prozent pro Schritt, multipliziert man mit $1 + \frac{p}{100}$; nimmt sie um $p$ Prozent ab, mit $1 - \frac{p}{100}$.

> **Merke:** Zunahme um $p\,\%$: $b = 1 + \frac{p}{100}$. Abnahme um $p\,\%$: $b = 1 - \frac{p}{100}$. Zum Beispiel ergibt $+3\,\%$ den Faktor $b = 1{,}03$ und $-20\,\%$ den Faktor $b = 0{,}8$.

### Beispiel 1: Bakterien

Eine Kultur enthält 500 Bakterien und verdoppelt sich jede Stunde: $f(t) = 500 \cdot 2^t$ ($t$ in Stunden). Nach 5 Stunden sind es $f(5) = 500 \cdot 32 = 16\,000$ Bakterien.

### Beispiel 2: Zinseszins

1000 € werden zu 3 % Zinsen pro Jahr angelegt: $K(t) = 1000 \cdot 1{,}03^t$. Nach 2 Jahren: $1000 \cdot 1{,}03^2 = 1000 \cdot 1{,}0609 = 1060{,}90$, also 1060,90 €.

## Verdopplungszeit und Halbwertszeit

Bei Wachstum ist die **Verdopplungszeit** die Zeit, nach der sich die Größe verdoppelt hat; bei Zerfall ist die **Halbwertszeit** die Zeit, nach der nur noch die Hälfte übrig ist. Beide sind konstant – egal, wann man zu zählen beginnt.

Bei einer Halbwertszeit $T$ ist nach der Zeit $t$ noch

$$N(t) = N_0 \cdot \left(\frac{1}{2}\right)^{t/T}$$

vorhanden.

### Beispiel 3: Halbwertszeit

Ein Medikament hat eine Halbwertszeit von 6 Stunden, eingenommen werden 80 mg. Nach 18 Stunden sind drei Halbwertszeiten vergangen:

$$N(18) = 80 \cdot \left(\frac{1}{2}\right)^{3} = 80 \cdot \frac{1}{8} = 10 \text{ mg}$$

Will man umgekehrt wissen, *wann* eine bestimmte Menge erreicht ist (etwa „wann ist nur noch 1 mg übrig?“), braucht man den Logarithmus.

## Funktionsgleichung aus zwei Punkten

### Beispiel 4

Von einer Exponentialfunktion weiß man $f(0) = 3$ und $f(2) = 48$. Aus $f(0) = a$ folgt $a = 3$. Dann gilt $3 \cdot b^2 = 48$, also $b^2 = 16$ und $b = 4$ (die Basis muss positiv sein). Ergebnis: $f(x) = 3 \cdot 4^x$.

## Die natürliche Exponentialfunktion

Eine besonders wichtige Basis ist die **eulersche Zahl** $e \approx 2{,}718$. Die Funktion $f(x) = e^x$ hat die besondere Eigenschaft, dass ihre Steigung an jeder Stelle gleich ihrem Funktionswert ist – sie ist also ihre eigene Ableitung. Jede Exponentialfunktion lässt sich mit der Basis $e$ schreiben: $b^x = e^{x \ln b}$.

## Typische Fehler

- $2^x$ und $x^2$ verwechseln – bei der Potenzfunktion steht die Variable in der Basis, bei der Exponentialfunktion im Exponenten.
- Eine Abnahme um 20 % mit dem Faktor $0{,}2$ statt $0{,}8$ rechnen.
- Prozentsätze über mehrere Jahre addieren: 3 % über 2 Jahre sind nicht 6 %, sondern der Faktor $1{,}03^2 = 1{,}0609$, also 6,09 %.
- Glauben, der Graph erreiche irgendwann die $x$-Achse – er kommt ihr nur beliebig nahe.
- $a \cdot b^x$ als $(a \cdot b)^x$ rechnen: Die Potenz wird zuerst berechnet.

## Übungen

1. Eine Stadt hat 2000 Einwohner und wächst jährlich um 5 %. Gib die Funktion an und berechne die Einwohnerzahl nach 2 Jahren.

<details>
<summary>Lösung</summary>

$f(t) = 2000 \cdot 1{,}05^t$. Nach 2 Jahren: $2000 \cdot 1{,}1025 = 2205$ Einwohner.

</details>

2. Ein Auto im Wert von 20 000 € verliert jedes Jahr 20 % an Wert. Wie viel ist es nach 3 Jahren wert?

<details>
<summary>Lösung</summary>

Faktor $0{,}8$ pro Jahr: $20\,000 \cdot 0{,}8^3 = 20\,000 \cdot 0{,}512 = 10\,240$, also 10 240 €.

</details>

3. Bestimme $f(x) = a \cdot b^x$ mit $f(1) = 6$ und $f(3) = 54$.

<details>
<summary>Lösung</summary>

Division: $\frac{f(3)}{f(1)} = b^2 = \frac{54}{6} = 9$, also $b = 3$. Aus $a \cdot 3 = 6$ folgt $a = 2$. Also $f(x) = 2 \cdot 3^x$.

</details>

4. Beschreibt $f(x) = 5 \cdot 0{,}7^x$ Wachstum oder Zerfall? Um wie viel Prozent pro Schritt? Wo schneidet der Graph die $y$-Achse?

<details>
<summary>Lösung</summary>

$b = 0{,}7 < 1$: Abnahme um $30\,\%$ pro Schritt. Der y-Achsenabschnitt ist $f(0) = 5$, also der Punkt $(0 \mid 5)$.

</details>

5. Ein Stoff hat eine Halbwertszeit von 3 Tagen. Wie viel ist von 64 g nach 12 Tagen noch übrig?

<details>
<summary>Lösung</summary>

12 Tage sind $4$ Halbwertszeiten: $64 \cdot \left(\frac{1}{2}\right)^4 = \frac{64}{16} = 4$ g.

</details>
