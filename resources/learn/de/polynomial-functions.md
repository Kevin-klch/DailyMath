---
title: Ganzrationale Funktionen
category: functions
order: 40
level: 3
summary: Funktionen aus Potenzen von x – Grad, Leitkoeffizient, Verhalten im Unendlichen, Symmetrie, Nullstellen mit Vielfachheit, Substitution und Polynomdivision.
related: quadratic-functions, expanding-and-factoring, curve-sketching, limits
---

Eine **ganzrationale Funktion** (auch Polynomfunktion) ist eine Summe von Potenzen von $x$ mit festen Vorfaktoren. Lineare und quadratische Funktionen sind die einfachsten Vertreter, aber mit höheren Potenzen lassen sich viel kompliziertere Verläufe beschreiben – Kurven mit mehreren Hoch- und Tiefpunkten. Weil man sie leicht berechnen und ableiten kann, sind sie das Standardbeispiel in der Kurvendiskussion.

## Definition und Begriffe

Eine ganzrationale Funktion vom Grad $n$ hat die Form

$$f(x) = a_n x^n + a_{n-1} x^{n-1} + \dots + a_1 x + a_0 \qquad (a_n \neq 0)$$

- Die Zahlen $a_0, a_1, \dots, a_n$ heißen **Koeffizienten**.
- Die höchste vorkommende Potenz $n$ ist der **Grad** der Funktion.
- $a_n$ ist der **Leitkoeffizient**.
- $a_0 = f(0)$ ist der **y-Achsenabschnitt**.

Zum Beispiel hat $f(x) = -2x^3 + x^2 + 5$ den Grad $3$, den Leitkoeffizienten $-2$ und den y-Achsenabschnitt $5$. Terme wie $\frac{1}{x}$ oder $\sqrt{x}$ sind **nicht** erlaubt – nur natürliche Exponenten.

## Verhalten im Unendlichen

Für sehr große $|x|$ überwiegt der Summand mit der höchsten Potenz alle anderen. Wie der Graph „an den Rändern“ verläuft, hängt daher nur vom Grad und vom Vorzeichen von $a_n$ ab:

| | $a_n > 0$ | $a_n < 0$ |
|---|---|---|
| $n$ gerade | links oben, rechts oben | links unten, rechts unten |
| $n$ ungerade | links unten, rechts oben | links oben, rechts unten |

> **Merke:** Das Verhalten im Unendlichen bestimmt allein der Summand $a_n x^n$: Bei geradem Grad zeigen beide Enden in dieselbe Richtung, bei ungeradem Grad in entgegengesetzte.

Mit Grenzwerten geschrieben gilt für $f(x) = -2x^3 + x^2 + 5$: Für $x \to \infty$ geht $f(x) \to -\infty$, für $x \to -\infty$ geht $f(x) \to \infty$.

## Symmetrie

- Kommen **nur gerade** Exponenten vor (eine Konstante zählt als $x^0$), gilt $f(-x) = f(x)$: Der Graph ist **achsensymmetrisch zur $y$-Achse**. Beispiel: $x^4 - 3x^2 + 1$.
- Kommen **nur ungerade** Exponenten vor, gilt $f(-x) = -f(x)$: Der Graph ist **punktsymmetrisch zum Ursprung**. Beispiel: $x^3 + x$.
- Bei gemischten Exponenten wie in $x^3 + 1$ liegt keine dieser beiden Symmetrien vor.

## Nullstellen

> **Merke:** Eine ganzrationale Funktion vom Grad $n$ hat höchstens $n$ Nullstellen. Ist $x_1$ eine Nullstelle, lässt sich der Linearfaktor $(x - x_1)$ abspalten: $f(x) = (x - x_1) \cdot g(x)$, wobei $g$ den Grad $n - 1$ hat.

Für die Nullstellensuche gibt es drei Standardverfahren.

### Beispiel 1: Ausklammern

$$f(x) = x^3 - 4x = x(x^2 - 4) = x(x - 2)(x + 2)$$

Nach dem Satz vom Nullprodukt sind die Nullstellen $-2$, $0$ und $2$. Eine Wertetabelle hilft beim Skizzieren:

| $x$ | $-3$ | $-2$ | $-1$ | $0$ | $1$ | $2$ | $3$ |
|---|---|---|---|---|---|---|---|
| $f(x)$ | $-15$ | $0$ | $3$ | $0$ | $-3$ | $0$ | $15$ |

Der Graph kommt links von unten, schneidet die $x$-Achse bei $-2$, steigt zu einem Hochpunkt zwischen $-2$ und $0$, fällt durch den Ursprung in einen Tiefpunkt zwischen $0$ und $2$ und steigt dann rechts steil an. Da nur ungerade Exponenten vorkommen, ist er punktsymmetrisch zum Ursprung.

### Beispiel 2: Substitution

$f(x) = x^4 - 5x^2 + 4$ enthält nur $x^4$ und $x^2$ (eine **biquadratische** Gleichung). Man substituiert $z = x^2$:

$$z^2 - 5z + 4 = 0 \;\Rightarrow\; (z - 1)(z - 4) = 0 \;\Rightarrow\; z = 1 \text{ oder } z = 4$$

Rücksubstitution: $x^2 = 1$ liefert $x = \pm 1$, $x^2 = 4$ liefert $x = \pm 2$. Vier Nullstellen: $-2, -1, 1, 2$. (Ein negatives $z$ würde keine reelle Lösung für $x$ ergeben.)

### Beispiel 3: Nullstelle raten und Polynomdivision

$f(x) = x^3 - 6x^2 + 11x - 6$. Eine ganzzahlige Nullstelle muss ein Teiler des Absolutglieds $-6$ sein. Probieren mit $x = 1$: $1 - 6 + 11 - 6 = 0$. Also lässt sich $(x - 1)$ abspalten. **Polynomdivision**:

1. $x^3 : x = x^2$. Zurückmultiplizieren: $x^2(x - 1) = x^3 - x^2$. Abziehen: Rest $-5x^2 + 11x - 6$.
2. $-5x^2 : x = -5x$. Zurückmultiplizieren: $-5x(x - 1) = -5x^2 + 5x$. Abziehen: Rest $6x - 6$.
3. $6x : x = 6$. Zurückmultiplizieren: $6(x - 1) = 6x - 6$. Abziehen: Rest $0$.

Also ist $f(x) = (x - 1)(x^2 - 5x + 6) = (x - 1)(x - 2)(x - 3)$ mit den Nullstellen $1$, $2$ und $3$.

## Vielfachheit von Nullstellen

Kommt ein Linearfaktor mehrfach vor, spricht man von einer **mehrfachen Nullstelle**. In

$$f(x) = (x - 1)^2 (x + 2)$$

ist $x = 1$ eine **doppelte** und $x = -2$ eine **einfache** Nullstelle. Die Vielfachheit verrät, wie der Graph dort verläuft:

- **ungerade** Vielfachheit (einfach, dreifach, …): Der Graph **schneidet** die $x$-Achse – es gibt einen Vorzeichenwechsel;
- **gerade** Vielfachheit (doppelt, …): Der Graph **berührt** die Achse nur und kehrt um – kein Vorzeichenwechsel.

Der Graph von $(x - 1)^2(x + 2)$ schneidet die Achse also bei $-2$ und berührt sie bei $1$, wo er einen Tiefpunkt hat.

## Typische Fehler

- Durch $x$ teilen statt $x$ auszuklammern – dabei geht die Nullstelle $x = 0$ verloren.
- Bei der Rücksubstitution die negative Lösung vergessen: $x^2 = 4$ liefert $x = 2$ **und** $x = -2$.
- Aus einem negativen $z$ die Wurzel ziehen – ein solcher Wert liefert keine reelle Nullstelle.
- Das Verhalten im Unendlichen am falschen Summanden ablesen: Es zählt die höchste Potenz, nicht der zuerst geschriebene Summand.
- An jeder Nullstelle einen Vorzeichenwechsel erwarten – bei doppelten Nullstellen berührt der Graph nur.

## Übungen

1. Gib Grad, Leitkoeffizient und Verhalten im Unendlichen von $f(x) = -2x^3 + x^2 + 5$ an.

<details>
<summary>Lösung</summary>

Grad $3$, Leitkoeffizient $-2$. Ungerader Grad mit negativem Leitkoeffizienten: Für $x \to -\infty$ geht $f(x) \to \infty$ (links oben), für $x \to \infty$ geht $f(x) \to -\infty$ (rechts unten).

</details>

2. Bestimme alle Nullstellen von $f(x) = x^3 - x^2 - 6x$.

<details>
<summary>Lösung</summary>

$f(x) = x(x^2 - x - 6) = x(x - 3)(x + 2)$. Nullstellen: $-2$, $0$ und $3$.

</details>

3. Bestimme alle Nullstellen von $f(x) = x^4 - 10x^2 + 9$.

<details>
<summary>Lösung</summary>

Mit $z = x^2$: $z^2 - 10z + 9 = (z - 1)(z - 9) = 0$, also $z = 1$ oder $z = 9$. Rücksubstitution: $x = \pm 1$ und $x = \pm 3$.

</details>

4. $x = -1$ ist eine Nullstelle von $f(x) = x^3 + 2x^2 - 5x - 6$. Bestimme die übrigen Nullstellen.

<details>
<summary>Lösung</summary>

Probe: $-1 + 2 + 5 - 6 = 0$. Die Polynomdivision durch $(x + 1)$ ergibt $x^2 + x - 6$, denn $(x + 1)(x^2 + x - 6) = x^3 + 2x^2 - 5x - 6$. Mit $x^2 + x - 6 = (x + 3)(x - 2)$ sind die übrigen Nullstellen $-3$ und $2$.

</details>

5. Untersuche $f(x) = x^4 - 3x^2 + 1$, $g(x) = x^3 + x$ und $h(x) = x^3 + 1$ auf Symmetrie.

<details>
<summary>Lösung</summary>

$f$ hat nur gerade Exponenten: achsensymmetrisch zur $y$-Achse. $g$ hat nur ungerade Exponenten: punktsymmetrisch zum Ursprung. $h$ mischt einen ungeraden Exponenten mit einer Konstanten ($x^0$): keine dieser Symmetrien.

</details>
