---
title: Quadratische Funktionen
category: functions
order: 30
level: 2
summary: Parabeln mit der Gleichung y = ax² + bx + c – Streckfaktor a, Scheitelpunktform, quadratische Ergänzung, Scheitelpunkt, Nullstellen und Linearfaktorform.
related: quadratic-equations, transformations-of-functions, binomial-formulas, polynomial-functions
---

Eine **quadratische Funktion** enthält $x^2$ als höchste Potenz. Ihr Graph ist eine **Parabel** – die Flugbahn eines geworfenen Balls, die Form einer Satellitenschüssel oder näherungsweise das Tragseil einer Hängebrücke. Wer Parabeln versteht, kann direkt aus der Gleichung ablesen, wo ihr höchster oder tiefster Punkt liegt, wo sie die Achsen schneiden und wie sie geformt sind.

## Die Normalparabel

Die einfachste quadratische Funktion ist $f(x) = x^2$. Ihr Graph heißt **Normalparabel**. Die Wertetabelle:

| $x$ | $-3$ | $-2$ | $-1$ | $0$ | $1$ | $2$ | $3$ |
|---|---|---|---|---|---|---|---|
| $x^2$ | $9$ | $4$ | $1$ | $0$ | $1$ | $4$ | $9$ |

Der Graph ist nach oben geöffnet, sein tiefster Punkt – der **Scheitelpunkt** – liegt im Ursprung $(0 \mid 0)$. Er ist achsensymmetrisch zur $y$-Achse, weil $(-x)^2 = x^2$ gilt. Vom Scheitel aus geht es 1 nach rechts und 1 nach oben, dann 1 nach rechts und 3 nach oben, dann 1 nach rechts und 5 nach oben – die Zuwächse sind die ungeraden Zahlen $1, 3, 5, \dots$ Mit einer Parabelschablone lässt sich die Normalparabel schnell zeichnen.

## Drei Formen der Funktionsgleichung

Dieselbe Parabel kann man auf drei nützliche Arten schreiben:

| Form | Gleichung | Was man abliest |
|---|---|---|
| Allgemeine Form | $f(x) = ax^2 + bx + c$ | y-Achsenabschnitt $c$ |
| Scheitelpunktform | $f(x) = a(x - d)^2 + e$ | Scheitelpunkt $S(d \mid e)$ |
| Linearfaktorform | $f(x) = a(x - x_1)(x - x_2)$ | Nullstellen $x_1$, $x_2$ |

In allen drei Formen ist $a \neq 0$ dieselbe Zahl und bestimmt die Form der Parabel.

## Die Bedeutung von a

- $a > 0$: Die Parabel ist nach **oben** geöffnet, der Scheitel ist ein Tiefpunkt.
- $a < 0$: Sie ist nach **unten** geöffnet, der Scheitel ist ein Hochpunkt.
- $|a| > 1$: Sie ist **gestreckt** (schmaler als die Normalparabel).
- $|a| < 1$: Sie ist **gestaucht** (breiter).

Zum Beispiel ist $y = -\frac{1}{2}x^2$ eine breite, nach unten geöffnete Parabel: Bei $x = 2$ hat sie den Wert $-2$ statt $4$.

## Scheitelpunktform und Scheitelpunkt

> **Merke:** In der Scheitelpunktform $f(x) = a(x - d)^2 + e$ liegt der Scheitelpunkt bei $S(d \mid e)$. Achtung beim Vorzeichen: $(x - 3)^2$ bedeutet $d = 3$, $(x + 3)^2$ bedeutet $d = -3$.

Die senkrechte Gerade $x = d$ ist die **Symmetrieachse**. An der Scheitelpunktform sieht man, wie die Parabel aus der Normalparabel entsteht: mit $a$ strecken, um $d$ nach rechts und um $e$ nach oben verschieben.

### Quadratische Ergänzung

Um die allgemeine Form in die Scheitelpunktform umzuwandeln, benutzt man die **quadratische Ergänzung** mit der binomischen Formel $(x + p)^2 = x^2 + 2px + p^2$.

### Beispiel 1

$f(x) = x^2 - 6x + 5$.

1. Die Hälfte des Faktors vor $x$ ist $-3$, ihr Quadrat ist $9$. Ergänzen und gleich wieder abziehen: $f(x) = x^2 - 6x + 9 - 9 + 5$.
2. Binomische Formel anwenden: $f(x) = (x - 3)^2 - 4$.
3. Scheitelpunkt: $S(3 \mid -4)$. Wegen $a = 1 > 0$ ist es ein Tiefpunkt.

Nullstellen: $(x - 3)^2 = 4 \Rightarrow x - 3 = \pm 2 \Rightarrow x = 1$ oder $x = 5$. Die Linearfaktorform ist also $f(x) = (x - 1)(x - 5)$, der y-Achsenabschnitt ist $f(0) = 5$.

### Beispiel 2: mit Vorfaktor

$f(x) = 2x^2 + 8x + 3$. Zuerst den Faktor $2$ ausklammern:

$$f(x) = 2(x^2 + 4x) + 3 = 2\big((x + 2)^2 - 4\big) + 3 = 2(x + 2)^2 - 5$$

Der Scheitelpunkt ist $S(-2 \mid -5)$.

### Die Scheitelformel

Führt man die quadratische Ergänzung allgemein durch, erhält man eine Abkürzung:

> **Merke:** Der Scheitelpunkt von $f(x) = ax^2 + bx + c$ liegt bei $x_S = -\frac{b}{2a}$; die $y$-Koordinate ist $f(x_S)$.

Probe mit Beispiel 2: $x_S = -\frac{8}{2 \cdot 2} = -2$ und $f(-2) = 8 - 16 + 3 = -5$.

## Nullstellen

Die Nullstellen sind die Lösungen von $ax^2 + bx + c = 0$ (siehe quadratische Gleichungen, z. B. mit der p-q-Formel). Eine Parabel hat **zwei, eine oder keine** Nullstelle. An der Scheitelpunktform sieht man das sofort: Ist die Parabel nach oben geöffnet und liegt ihr Scheitel **oberhalb** der $x$-Achse ($e > 0$), erreicht sie die Achse nie. Rechnerisch entscheidet die **Diskriminante** $b^2 - 4ac$: positiv – zwei Nullstellen, null – eine, negativ – keine.

Wegen der Symmetrie liegt der Scheitel immer genau in der Mitte zwischen zwei Nullstellen: $x_S = \frac{x_1 + x_2}{2}$.

### Beispiel 3: Funktionsgleichung bestimmen

Eine Parabel hat den Scheitelpunkt $S(1 \mid 2)$ und geht durch $P(3 \mid 10)$. Ansatz $f(x) = a(x - 1)^2 + 2$, Punkt einsetzen:

$$10 = a(3 - 1)^2 + 2 = 4a + 2 \;\Rightarrow\; a = 2$$

Also ist $f(x) = 2(x - 1)^2 + 2$.

## Typische Fehler

- Vorzeichenfehler beim Scheitel: $(x + 4)^2 - 1$ hat den Scheitel $S(-4 \mid -1)$, nicht $S(4 \mid -1)$.
- Vor der quadratischen Ergänzung den Faktor $a$ nicht ausklammern.
- Die ergänzte Zahl nicht wieder abziehen – dann ändert sich die Funktion.
- Glauben, jede Parabel habe Nullstellen – sie kann ganz ober- oder unterhalb der $x$-Achse liegen.
- „Gestreckt“ und „gestaucht“ verwechseln: Ein größeres $|a|$ macht die Parabel schmaler.

## Übungen

1. Gib den Scheitelpunkt von $f(x) = (x + 1)^2 - 3$ an und ob die Parabel nach oben oder unten geöffnet ist. Berechne die Nullstellen.

<details>
<summary>Lösung</summary>

$S(-1 \mid -3)$, nach oben geöffnet wegen $a = 1 > 0$. Nullstellen: $(x + 1)^2 = 3 \Rightarrow x = -1 + \sqrt{3}$ oder $x = -1 - \sqrt{3}$.

</details>

2. Bringe $f(x) = x^2 + 4x + 1$ in Scheitelpunktform.

<details>
<summary>Lösung</summary>

$f(x) = x^2 + 4x + 4 - 4 + 1 = (x + 2)^2 - 3$. Scheitelpunkt $S(-2 \mid -3)$.

</details>

3. Bestimme Scheitelpunkt und Nullstellen von $f(x) = -x^2 + 6x - 5$.

<details>
<summary>Lösung</summary>

$x_S = -\frac{6}{2 \cdot (-1)} = 3$, $f(3) = -9 + 18 - 5 = 4$. Scheitelpunkt $S(3 \mid 4)$, ein Hochpunkt. Nullstellen: $-x^2 + 6x - 5 = -(x - 1)(x - 5) = 0 \Rightarrow x = 1$ oder $x = 5$. (Kontrolle: $3$ liegt genau in der Mitte zwischen $1$ und $5$.)

</details>

4. Eine Parabel hat die Nullstellen $-2$ und $4$ und geht durch $(0 \mid -8)$. Bestimme ihre Gleichung in allgemeiner Form.

<details>
<summary>Lösung</summary>

Ansatz $f(x) = a(x + 2)(x - 4)$. Aus $f(0) = a \cdot 2 \cdot (-4) = -8a = -8$ folgt $a = 1$. Also $f(x) = (x + 2)(x - 4) = x^2 - 2x - 8$.

</details>

5. Wie viele Nullstellen hat $f(x) = x^2 - 2x + 3$?

<details>
<summary>Lösung</summary>

Scheitelpunktform: $f(x) = (x - 1)^2 + 2$. Die Parabel ist nach oben geöffnet und ihr Scheitel $S(1 \mid 2)$ liegt oberhalb der $x$-Achse – also gibt es **keine** Nullstelle. (Diskriminante: $4 - 12 = -8 < 0$.)

</details>
