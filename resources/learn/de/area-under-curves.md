---
title: Bestimmte Integrale und Flächen
category: calculus
order: 90
level: 3
summary: Wie das bestimmte Integral Flächen misst – von Rechtecksummen zum exakten Wert, Flächen unterhalb der x-Achse und Flächen zwischen zwei Graphen.
related: integrals, curve-sketching, polynomial-functions
---

Wie groß ist die Fläche unter einem gekrümmten Graphen? Für Rechtecke und Dreiecke gibt es einfache Formeln, für eine von einer Parabel begrenzte Fläche nicht. Das **bestimmte Integral** löst dieses Problem: Mit ihm lassen sich solche Flächen exakt berechnen. Hier erfährst du, wie Integral und Flächeninhalt zusammenhängen und worauf man achten muss, wenn der Graph unter die $x$-Achse taucht.

## Annäherung durch Rechtecke

Gesucht ist die Fläche zwischen dem Graphen von $f(x) = x^2$ und der $x$-Achse von $x = 0$ bis $x = 1$. Man teilt das Intervall in $n$ gleich breite Streifen und ersetzt jeden Streifen durch ein Rechteck:

- Nimmt man für jedes Rechteck den *kleinsten* Funktionswert im Streifen, liegen alle Rechtecke unter der Kurve: Die **Untersumme** ist etwas zu klein.
- Nimmt man jeweils den *größten* Wert, ragen die Rechtecke über die Kurve hinaus: Die **Obersumme** ist etwas zu groß.

Je mehr Streifen man nimmt, desto näher rücken beide Summen zusammen. Für $n \to \infty$ treffen sie sich in einer Zahl – dem bestimmten Integral. Für $x^2$ auf $[0; 1]$ ist diese Zahl $\frac{1}{3}$.

Zum Glück muss man diese Grenzwerte nicht von Hand berechnen: Der Hauptsatz der Differential- und Integralrechnung liefert den Wert direkt mit einer Stammfunktion $F$:

$$\int_a^b f(x) \, dx = F(b) - F(a)$$

## Orientierter Flächeninhalt

Das bestimmte Integral misst nicht direkt den Flächeninhalt, sondern einen **orientierten Flächeninhalt**:

> **Merke:** Flächen oberhalb der $x$-Achse zählen positiv, Flächen unterhalb der $x$-Achse negativ. Gilt $f(x) \ge 0$ auf $[a; b]$, dann ist $\int_a^b f(x) \, dx$ genau der Inhalt der Fläche zwischen Graph und $x$-Achse.

### Beispiel 1: Graph oberhalb der Achse

Fläche zwischen $f(x) = x^2$ und der $x$-Achse auf $[0; 3]$:

$$\int_0^3 x^2 \, dx = \left[\frac{x^3}{3}\right]_0^3 = 9 - 0 = 9$$

### Beispiel 2: Graph unterhalb der Achse

$f(x) = x^2 - 4$ ist zwischen den Nullstellen $-2$ und $2$ negativ:

$$\int_{-2}^{2} (x^2 - 4) \, dx = \left[\frac{x^3}{3} - 4x\right]_{-2}^{2} = \left(\frac{8}{3} - 8\right) - \left(-\frac{8}{3} + 8\right) = -\frac{32}{3}$$

Das Integral ist negativ; der Flächeninhalt ist sein Betrag, also $\frac{32}{3}$.

## Wenn der Graph die Achse schneidet

Wechselt der Graph im Intervall das Vorzeichen, heben sich positive und negative Anteile teilweise auf. Für den tatsächlichen Flächeninhalt geht man so vor:

1. Nullstellen von $f$ im Intervall bestimmen.
2. Zwischen aufeinanderfolgenden Nullstellen (und den Intervallgrenzen) getrennt integrieren.
3. Die **Beträge** der Teilintegrale addieren.

### Beispiel 3

Bestimme den Inhalt der Fläche zwischen $f(x) = x^2 - 1$ und der $x$-Achse auf $[0; 2]$.

Die Nullstelle im Intervall ist $x = 1$. Eine Stammfunktion ist $F(x) = \frac{x^3}{3} - x$.

$$\int_0^1 (x^2 - 1) \, dx = \left(\frac{1}{3} - 1\right) - 0 = -\frac{2}{3}$$

$$\int_1^2 (x^2 - 1) \, dx = \left(\frac{8}{3} - 2\right) - \left(\frac{1}{3} - 1\right) = \frac{2}{3} + \frac{2}{3} = \frac{4}{3}$$

Der Flächeninhalt ist $\frac{2}{3} + \frac{4}{3} = 2$. Hätte man direkt von $0$ bis $2$ integriert, käme nur $-\frac{2}{3} + \frac{4}{3} = \frac{2}{3}$ heraus – als Flächeninhalt falsch.

## Fläche zwischen zwei Graphen

Die Fläche, die zwei Graphen $f$ und $g$ einschließen, berechnet man über das Integral der Differenzfunktion:

> **Merke:** Gilt $f(x) \ge g(x)$ auf $[a; b]$, ist die Fläche zwischen den Graphen $\displaystyle A = \int_a^b \big(f(x) - g(x)\big) \, dx$. Die Grenzen sind meist die Schnittstellen, die man aus $f(x) = g(x)$ erhält.

Dabei spielt es keine Rolle, ob die Graphen über oder unter der $x$-Achse liegen – entscheidend ist nur, welcher oben liegt. Schneiden sich die Graphen innerhalb des Intervalls, teilt man es wie bei Nullstellen an den Schnittstellen auf.

### Beispiel 4

Bestimme die Fläche, die von $f(x) = x$ und $g(x) = x^2$ eingeschlossen wird.

Schnittstellen: $x = x^2$ liefert $x(x - 1) = 0$, also $x = 0$ und $x = 1$. Dazwischen gilt $x \ge x^2$ (Test mit $x = \frac{1}{2}$: $\frac{1}{2} > \frac{1}{4}$). Also

$$A = \int_0^1 (x - x^2) \, dx = \left[\frac{x^2}{2} - \frac{x^3}{3}\right]_0^1 = \frac{1}{2} - \frac{1}{3} = \frac{1}{6}$$

## Mittelwert einer Funktion

Mit dem Integral lässt sich auch der **Mittelwert** einer Funktion auf $[a; b]$ berechnen: $\frac{1}{b - a}\int_a^b f(x) \, dx$. Das ist die Höhe des Rechtecks über $[a; b]$, das denselben Flächeninhalt hat wie die Fläche unter dem Graphen.

## Typische Fehler

- Über eine Nullstelle hinweg integrieren und das Ergebnis als Flächeninhalt nehmen – Anteile unter der Achse heben Anteile darüber auf.
- Eine negative Zahl als Flächeninhalt angeben. Flächeninhalte sind immer positiv.
- Bei der Fläche zwischen zwei Graphen vergessen, zuerst die Schnittstellen zu bestimmen.
- Falsch herum subtrahieren, also $g - f$ statt $f - g$ (das Ergebnis wird negativ – ein Warnsignal).

## Übungen

1. Berechne den Inhalt der Fläche zwischen $f(x) = 3x^2 + 1$ und der $x$-Achse auf $[1; 2]$.

<details>
<summary>Lösung</summary>

$f$ ist positiv, also $\int_1^2 (3x^2 + 1) \, dx = \big[x^3 + x\big]_1^2 = 10 - 2 = 8$.

</details>

2. Bestimme den Inhalt der Fläche, die der Graph von $f(x) = -x^2 + 4$ mit der $x$-Achse einschließt.

<details>
<summary>Lösung</summary>

Nullstellen: $x = \pm 2$. $\int_{-2}^{2} (-x^2 + 4) \, dx = \left[-\frac{x^3}{3} + 4x\right]_{-2}^{2} = \left(-\frac{8}{3} + 8\right) - \left(\frac{8}{3} - 8\right) = 16 - \frac{16}{3} = \frac{32}{3}$.

</details>

3. Berechne $\int_{-1}^{1} x^3 \, dx$ und den Inhalt der Fläche zwischen $f(x) = x^3$ und der $x$-Achse auf $[-1; 1]$.

<details>
<summary>Lösung</summary>

$\left[\frac{x^4}{4}\right]_{-1}^{1} = \frac{1}{4} - \frac{1}{4} = 0$. Für die Fläche bei $0$ aufteilen: $\int_{-1}^{0} x^3 \, dx = -\frac{1}{4}$ und $\int_0^1 x^3 \, dx = \frac{1}{4}$. Flächeninhalt: $\frac{1}{4} + \frac{1}{4} = \frac{1}{2}$.

</details>

4. Bestimme die Fläche, die von $f(x) = x + 2$ und $g(x) = x^2$ eingeschlossen wird.

<details>
<summary>Lösung</summary>

Schnittstellen: $x^2 = x + 2$ liefert $x^2 - x - 2 = (x - 2)(x + 1) = 0$, also $x = -1$ und $x = 2$. Dazwischen liegt die Gerade oben. $A = \int_{-1}^{2} (x + 2 - x^2) \, dx = \left[\frac{x^2}{2} + 2x - \frac{x^3}{3}\right]_{-1}^{2} = \frac{10}{3} - \left(-\frac{7}{6}\right) = \frac{27}{6} = \frac{9}{2}$.

</details>

5. Bestimme den Mittelwert von $f(x) = x^2$ auf $[0; 3]$.

<details>
<summary>Lösung</summary>

$\frac{1}{3 - 0} \int_0^3 x^2 \, dx = \frac{1}{3} \cdot 9 = 3$.

</details>
