---
title: Graphen verschieben und strecken
category: functions
order: 70
level: 2
summary: Wie Verschieben, Strecken und Spiegeln einen Graphen verändern – und warum f(x − c) den Graphen nach rechts schiebt, während a · f(x) ihn in y-Richtung streckt.
related: functions-basics, quadratic-functions, exponential-functions, trigonometric-functions
---

Viele Funktionen sind nichts anderes als eine bekannte Grundfunktion, die verschoben, gestreckt oder gespiegelt wurde. Wer weiß, wie $y = x^2$, $y = \sqrt{x}$ oder $y = \sin x$ aussehen, kann $y = -2(x - 3)^2 + 1$ oder $y = 3\sin(2x) + 1$ in Sekunden skizzieren – ganz ohne Wertetabelle. Hier findest du die Regeln für diese **Transformationen** und warum sie funktionieren.

## Verschieben in y-Richtung

Addiert man eine Zahl zum Funktionswert, wandert jeder Punkt senkrecht:

$$g(x) = f(x) + d$$

- $d > 0$: Verschiebung um $d$ nach **oben**.
- $d < 0$: Verschiebung um $|d|$ nach **unten**.

Jeder $y$-Wert ändert sich um $d$, die $x$-Werte bleiben gleich. So ist $x^2 + 3$ die um $3$ nach oben verschobene Normalparabel mit dem Scheitel $(0 \mid 3)$.

## Verschieben in x-Richtung

Ersetzt man $x$ durch $x - c$, wandert der Graph waagerecht:

$$g(x) = f(x - c)$$

- $c > 0$: Verschiebung um $c$ nach **rechts**.
- $c < 0$: Verschiebung um $|c|$ nach **links**.

Das wirkt zunächst verkehrt herum. Überleg dir: $g(x) = (x - 2)^2$ wird null, wenn $x - 2 = 0$ ist, also bei $x = 2$. Alles, was $f$ bei $x = 0$ macht, passiert bei $g$ erst bei $x = 2$ – zwei Einheiten später, also weiter **rechts**.

> **Merke:** Änderungen **außen** ($f(x) + d$, $a \cdot f(x)$) wirken auf die $y$-Werte und tun, was man erwartet. Änderungen **innen** ($f(x - c)$, $f(bx)$) wirken auf die $x$-Werte und tun das Gegenteil: $-c$ verschiebt nach rechts, ein Faktor $b$ staucht.

## Strecken und Stauchen

### In y-Richtung

$$g(x) = a \cdot f(x)$$

Jeder $y$-Wert wird mit $a$ multipliziert. Für $|a| > 1$ wird der Graph von der $x$-Achse weg **gestreckt**, für $0 < |a| < 1$ zu ihr hin **gestaucht**. Punkte auf der $x$-Achse – die Nullstellen – bleiben, wo sie sind.

### In x-Richtung

$$g(x) = f(bx) \qquad (b > 0)$$

Der Graph wird mit dem Faktor $\frac{1}{b}$ zur $y$-Achse hin gestaucht. Zum Beispiel durchläuft $\sin(2x)$ eine ganze Schwingung schon auf $[0; \pi]$ statt auf $[0; 2\pi]$ – die Periode halbiert sich. Ein Faktor $0 < b < 1$ streckt den Graphen dagegen in $x$-Richtung.

## Spiegeln

- $g(x) = -f(x)$ spiegelt den Graphen an der **$x$-Achse** (alle $y$-Werte wechseln das Vorzeichen).
- $g(x) = f(-x)$ spiegelt den Graphen an der **$y$-Achse** (links und rechts werden vertauscht).

So ist $-x^2$ die nach unten geöffnete Normalparabel, und $2^{-x}$ ist das Spiegelbild von $2^x$ – eine fallende Kurve.

## Mehrere Transformationen kombinieren

Alle Regeln zusammen ergeben die allgemeine Form

$$g(x) = a \cdot f\big(b(x - c)\big) + d$$

> **Merke:** Ein Punkt $(u \mid v)$ auf dem Graphen von $f$ wird zum Punkt $\left(\frac{u}{b} + c \;\middle|\; a \cdot v + d\right)$ auf dem Graphen von $g$.

Praktisch arbeitet man von innen nach außen: erst die Änderungen in $x$-Richtung ($b$, dann $c$), dann die in $y$-Richtung ($a$, dann $d$). Am sichersten klammert man innen zuerst aus: $f(2x - 6)$ ist $f\big(2(x - 3)\big)$ – um $\frac{1}{2}$ gestaucht und dann um **3** (nicht 6) nach rechts verschoben.

### Beispiel 1: eine Parabel

$g(x) = (x - 2)^2 + 3$ entsteht aus der Normalparabel durch Verschiebung um $2$ nach rechts und $3$ nach oben. Der Scheitel wandert von $(0 \mid 0)$ nach $(2 \mid 3)$.

### Beispiel 2: eine Wurzelfunktion

Skizziere $g(x) = -2\sqrt{x + 1}$. Ausgangspunkt ist $f(x) = \sqrt{x}$ mit den Punkten $(0 \mid 0)$, $(1 \mid 1)$, $(4 \mid 2)$.

1. $\sqrt{x + 1}$: um $1$ nach links verschieben. Punkte: $(-1 \mid 0)$, $(0 \mid 1)$, $(3 \mid 2)$.
2. Mit $-2$ multiplizieren: mit Faktor $2$ strecken und an der $x$-Achse spiegeln. Punkte: $(-1 \mid 0)$, $(0 \mid -2)$, $(3 \mid -4)$.

Der Graph beginnt in $(-1 \mid 0)$ und verläuft nach rechts in einem Bogen nach unten. Die Definitionsmenge ist $x \ge -1$.

### Beispiel 3: eine Exponentialfunktion

$g(x) = 2^{x - 1} - 4$ ist $2^x$, um $1$ nach rechts und $4$ nach unten verschoben. Die Asymptote wandert mit: Sie liegt jetzt bei $y = -4$. Der y-Achsenabschnitt ist $g(0) = 2^{-1} - 4 = \frac{1}{2} - 4 = -\frac{7}{2}$.

## Typische Fehler

- In die falsche Richtung verschieben: $f(x + 3)$ verschiebt den Graphen um $3$ nach **links**.
- Das Ausklammern vergessen: $f(2x - 6)$ ist um $3$ verschoben, nicht um $6$.
- $f(2x)$ (Stauchung in $x$-Richtung) und $2f(x)$ (Streckung in $y$-Richtung) verwechseln.
- Die beiden Spiegelungen vertauschen: Ein Minus außen spiegelt an der $x$-Achse, ein Minus innen an der $y$-Achse.
- Asymptoten und besondere Punkte nicht mitverschieben.

## Übungen

1. Beschreibe, wie $g(x) = (x + 3)^2 - 1$ aus der Normalparabel entsteht, und gib den Scheitelpunkt an.

<details>
<summary>Lösung</summary>

Verschiebung um $3$ nach links und $1$ nach unten. Scheitelpunkt: $S(-3 \mid -1)$.

</details>

2. Die Normalparabel wird um $4$ nach rechts verschoben, an der $x$-Achse gespiegelt und dann um $2$ nach oben verschoben. Gib die Funktionsgleichung an.

<details>
<summary>Lösung</summary>

Verschieben: $(x - 4)^2$. Spiegeln: $-(x - 4)^2$. Nach oben: $g(x) = -(x - 4)^2 + 2$. Die Parabel ist nach unten geöffnet mit Scheitel $S(4 \mid 2)$.

</details>

3. Der Punkt $(2 \mid 5)$ liegt auf dem Graphen von $f$. Welcher Punkt liegt auf dem Graphen von (a) $f(x - 1) + 3$, (b) $-f(x)$, (c) $f(-x)$, (d) $f(2x)$?

<details>
<summary>Lösung</summary>

(a) $(3 \mid 8)$, (b) $(2 \mid -5)$, (c) $(-2 \mid 5)$, (d) $(1 \mid 5)$, denn $f(2 \cdot 1) = f(2) = 5$.

</details>

4. Gib die Asymptote und den y-Achsenabschnitt von $g(x) = 2^{x + 2} - 1$ an.

<details>
<summary>Lösung</summary>

$2^x$ wird um $2$ nach links und $1$ nach unten verschoben, die Asymptote ist also $y = -1$. y-Achsenabschnitt: $g(0) = 2^2 - 1 = 3$.

</details>

5. Eine Funktion $f$ hat die Nullstellen $-1$ und $3$. Bestimme die Nullstellen von $g(x) = f(x - 2)$, $h(x) = 3f(x)$ und $k(x) = f(2x)$.

<details>
<summary>Lösung</summary>

$g$: um $2$ nach rechts verschoben, Nullstellen $1$ und $5$. $h$: Eine Streckung in $y$-Richtung verändert die Nullstellen nicht, also $-1$ und $3$. $k$: mit Faktor $\frac{1}{2}$ gestaucht, Nullstellen $-\frac{1}{2}$ und $\frac{3}{2}$.

</details>
