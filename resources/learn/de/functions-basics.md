---
title: Was ist eine Funktion?
category: functions
order: 10
level: 2
summary: Eine Funktion ordnet jedem x genau ein y zu – Schreibweisen, Definitions- und Wertemenge, Wertetabellen, Graphen und der Senkrechtentest.
related: linear-functions, quadratic-functions, transformations-of-functions, sets-and-logic
---

Eine **Funktion** ist eine Vorschrift, die jedem Eingabewert genau einen Ausgabewert zuordnet. Mit Funktionen beschreibt man, wie eine Größe von einer anderen abhängt: Der Taxipreis hängt von der gefahrenen Strecke ab, der Flächeninhalt eines Quadrats von seiner Seitenlänge. Fast die gesamte höhere Mathematik – von Graphen bis zur Ableitung – baut auf diesem Begriff auf.

## Die Definition

Eine Funktion $f$ ordnet **jedem** Element $x$ einer Menge $D$ (der **Definitionsmenge**) **genau einen** Wert $f(x)$ zu. Den Eingabewert $x$ nennt man **Argument** oder unabhängige Variable, den Ausgabewert $y = f(x)$ den **Funktionswert**.

> **Merke:** Bei einer Funktion gehört zu jedem $x$ genau ein $y$. Verschiedene $x$ dürfen denselben Funktionswert haben – aber ein $x$ darf nie zwei Funktionswerte haben.

Zwei Bedingungen stecken in der Definition:

- **Jedes** $x$ aus der Definitionsmenge bekommt einen Wert – keines wird ausgelassen.
- Es gibt **genau einen** Wert – die Zuordnung ist eindeutig.

### Beispiel 1: Funktion oder nicht?

- Jedem Menschen sein Geburtsdatum zuzuordnen, ist eine Funktion: Jeder hat genau einen Geburtstag (dass mehrere Menschen denselben haben, stört nicht).
- Jedem Datum die an diesem Tag Geborenen zuzuordnen, ist **keine** Funktion: Zu einem Datum gehören viele Menschen.
- Die Zuordnung „$x \mapsto$ eine Zahl, deren Quadrat $x$ ist“ ist auf den positiven Zahlen keine Funktion, denn der $4$ würden sowohl $2$ als auch $-2$ zugeordnet.

## Schreibweisen

Für dieselbe Funktion gibt es mehrere übliche Schreibweisen:

$$f(x) = 2x + 1 \qquad \text{oder} \qquad f: x \mapsto 2x + 1 \qquad \text{oder} \qquad y = 2x + 1$$

Man liest $f(x)$ als „f von x“. $f(x) = 2x + 1$ heißt **Funktionsgleichung** oder Funktionsterm. Um einen Funktionswert zu berechnen, setzt man die Zahl für jedes $x$ ein:

$$f(3) = 2 \cdot 3 + 1 = 7, \qquad f(-2) = 2 \cdot (-2) + 1 = -3$$

Auch Terme lassen sich einsetzen: $f(a + 1) = 2(a + 1) + 1 = 2a + 3$.

## Definitionsmenge und Wertemenge

Die **Definitionsmenge** $D$ enthält alle zulässigen Eingabewerte. Ist nichts anderes angegeben, nimmt man die größtmögliche Menge reeller Zahlen, für die der Term sinnvoll ist. Zwei typische Einschränkungen:

- Durch null darf man nicht teilen: Bei $f(x) = \frac{1}{x - 2}$ muss $x = 2$ ausgeschlossen werden, also $D = \mathbb{R} \setminus \{2\}$.
- Aus negativen Zahlen zieht man (in den reellen Zahlen) keine Wurzel: Bei $g(x) = \sqrt{x + 3}$ muss $x + 3 \ge 0$ gelten, also $D = \{x \in \mathbb{R} \mid x \ge -3\}$.

Die **Wertemenge** $W$ enthält alle Werte, die die Funktion tatsächlich annimmt. Bei $h(x) = x^2$ ist $D = \mathbb{R}$, aber $W = \{y \in \mathbb{R} \mid y \ge 0\}$, denn ein Quadrat ist nie negativ.

## Wertetabelle und Graph

In einer **Wertetabelle** stehen einige $x$-Werte mit ihren Funktionswerten. Für $f(x) = x^2 - 1$:

| $x$ | $-2$ | $-1$ | $0$ | $1$ | $2$ |
|---|---|---|---|---|---|
| $f(x)$ | $3$ | $0$ | $-1$ | $0$ | $3$ |

Jede Spalte liefert einen Punkt $P(x \mid f(x))$ – hier $(-2 \mid 3)$, $(-1 \mid 0)$, $(0 \mid -1)$, $(1 \mid 0)$ und $(2 \mid 3)$. Trägt man die Punkte in ein Koordinatensystem ein und verbindet sie mit einer glatten Linie, entsteht der **Graph** der Funktion: eine nach oben geöffnete U-Form mit tiefstem Punkt $(0 \mid -1)$, die die $x$-Achse bei $-1$ und $1$ schneidet.

Ein Punkt $P(a \mid b)$ liegt genau dann auf dem Graphen, wenn $f(a) = b$ gilt. Zum Beispiel liegt $(3 \mid 8)$ auf dem Graphen oben, denn $3^2 - 1 = 8$. Diese Kontrolle heißt **Punktprobe**.

### Der Senkrechtentest

Eine Kurve ist genau dann Graph einer Funktion, wenn jede Parallele zur $y$-Achse sie **höchstens einmal** schneidet. Ein Kreis besteht diesen Test nicht: Die senkrechte Gerade durch den Mittelpunkt schneidet ihn zweimal – zu einem $x$ gäbe es also zwei $y$-Werte.

## Nullstellen und y-Achsenabschnitt

Zwei besondere Punkte werden oft gesucht:

- Der **y-Achsenabschnitt** ist die Stelle, an der der Graph die $y$-Achse schneidet. Man setzt $x = 0$ ein: Schnittpunkt $S_y(0 \mid f(0))$.
- Die **Nullstellen** sind die $x$-Werte mit $f(x) = 0$. Man löst die Gleichung $f(x) = 0$.

> **Merke:** Schnittpunkt mit der y-Achse: $f(0)$ berechnen. Nullstellen: $f(x) = 0$ lösen.

### Beispiel 2

Für $f(x) = 3x - 6$: $f(0) = -6$, also $S_y(0 \mid -6)$. Nullstelle: $3x - 6 = 0 \Rightarrow x = 2$, also $N(2 \mid 0)$.

### Beispiel 3

Bestimme die Definitionsmenge von $f(x) = \frac{x}{x^2 - 9}$.

Der Nenner darf nicht null werden: $x^2 - 9 = 0 \Rightarrow x = 3$ oder $x = -3$. Also ist $D = \mathbb{R} \setminus \{-3; 3\}$.

## Typische Fehler

- Glauben, zwei $x$ mit demselben Funktionswert verletzen die Definition – verboten ist nur ein $x$ mit zwei Werten.
- Beim Einsetzen negativer Zahlen die Klammer vergessen: Bei $f(x) = x^2$ ist $f(-3) = (-3)^2 = 9$ und nicht $-9$.
- Die Definitionsmenge übersehen – Division durch null und Wurzeln aus negativen Zahlen müssen ausgeschlossen werden.
- $f$ (die ganze Funktion) und $f(x)$ (einen einzelnen Funktionswert) verwechseln.
- Definitionsmenge ($x$-Achse) und Wertemenge ($y$-Achse) vertauschen.

## Übungen

1. Gegeben ist $f(x) = x^2 - 4x$. Berechne $f(0)$, $f(3)$ und $f(-1)$.

<details>
<summary>Lösung</summary>

$f(0) = 0 - 0 = 0$, $f(3) = 9 - 12 = -3$, $f(-1) = 1 + 4 = 5$.

</details>

2. Bestimme die größtmögliche Definitionsmenge von $g(x) = \sqrt{8 - 2x}$.

<details>
<summary>Lösung</summary>

Der Radikand darf nicht negativ sein: $8 - 2x \ge 0 \Rightarrow 8 \ge 2x \Rightarrow x \le 4$. Also $D = \{x \in \mathbb{R} \mid x \le 4\}$.

</details>

3. Liegt der Punkt $P(2 \mid 5)$ auf dem Graphen von $f(x) = 3x - 1$? Und $Q(-1 \mid -4)$?

<details>
<summary>Lösung</summary>

Punktprobe: $f(2) = 6 - 1 = 5$, also liegt $P$ auf dem Graphen. $f(-1) = -3 - 1 = -4$, also liegt auch $Q$ auf dem Graphen.

</details>

4. Bestimme den y-Achsenabschnitt und die Nullstellen von $f(x) = x^2 - 9$.

<details>
<summary>Lösung</summary>

$f(0) = -9$, also $S_y(0 \mid -9)$. Nullstellen: $x^2 - 9 = 0 \Rightarrow x^2 = 9 \Rightarrow x = 3$ oder $x = -3$.

</details>

5. Welche Zuordnung ist eine Funktion: (a) Jeder Schülerin wird ihre Körpergröße zugeordnet, (b) jeder positiven Zahl ihre beiden Quadratwurzeln?

<details>
<summary>Lösung</summary>

(a) ist eine Funktion – jede Schülerin hat genau eine Körpergröße. (b) ist keine, denn jeder positiven Zahl würden zwei Werte ($\sqrt{x}$ und $-\sqrt{x}$) zugeordnet.

</details>
