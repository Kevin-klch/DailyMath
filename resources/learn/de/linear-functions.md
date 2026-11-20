---
title: Lineare Funktionen
category: functions
order: 20
level: 2
summary: Geraden mit der Gleichung y = mx + b – Steigung, y-Achsenabschnitt, Geradengleichung durch zwei Punkte, parallele und senkrechte Geraden.
related: functions-basics, linear-equations, systems-of-equations, transformations-of-functions
---

Eine **lineare Funktion** ist eine Funktion, deren Graph eine Gerade ist. Sie beschreibt Vorgänge, bei denen etwas gleichmäßig zu- oder abnimmt – etwa ein Handytarif mit Grundgebühr und festem Minutenpreis oder eine Kerze, die pro Stunde gleich viel herunterbrennt. Lineare Funktionen sind die einfachsten Funktionen überhaupt und tauchen später überall wieder auf, zum Beispiel als Tangenten in der Analysis.

## Die Funktionsgleichung y = mx + b

Jede lineare Funktion lässt sich schreiben als

$$f(x) = mx + b$$

mit zwei Zahlen:

- $m$ ist die **Steigung**. Sie gibt an, um wie viel sich $y$ ändert, wenn $x$ um $1$ größer wird.
- $b$ ist der **y-Achsenabschnitt**. Wegen $f(0) = b$ schneidet die Gerade die $y$-Achse im Punkt $(0 \mid b)$.

> **Merke:** In $f(x) = mx + b$ ist $m$ die Steigung (Änderung von $y$ pro Schritt in $x$-Richtung) und $b$ der Schnittpunkt mit der $y$-Achse.

## Was die Steigung verrät

- $m > 0$: Die Gerade **steigt** von links nach rechts.
- $m < 0$: Die Gerade **fällt**.
- $m = 0$: Die Gerade verläuft **waagerecht**, $f(x) = b$ ist eine konstante Funktion.
- Je größer $|m|$, desto steiler die Gerade.

Sonderfall $b = 0$: $f(x) = mx$ ist eine Ursprungsgerade. Sie beschreibt eine **proportionale Zuordnung** – verdoppelt man $x$, verdoppelt sich auch $y$.

Senkrechte Geraden wie $x = 3$ sind übrigens gar keine Funktionen, weil zu einem $x$ unendlich viele $y$-Werte gehören würden.

## Steigung aus zwei Punkten

Geht eine Gerade durch $P_1(x_1 \mid y_1)$ und $P_2(x_2 \mid y_2)$, dann gilt für die Steigung der **Differenzenquotient**:

$$m = \frac{y_2 - y_1}{x_2 - x_1}$$

Anschaulich ist das ein **Steigungsdreieck**: Man geht $x_2 - x_1$ Einheiten nach rechts und dann $y_2 - y_1$ Einheiten nach oben (oder unten). Das Verhältnis ist für je zwei Punkte der Geraden gleich – genau deshalb ist der Graph gerade.

### Beispiel 1: Gerade durch zwei Punkte

Gesucht ist die Gerade durch $A(1 \mid 3)$ und $B(4 \mid 9)$.

1. Steigung: $m = \frac{9 - 3}{4 - 1} = \frac{6}{3} = 2$.
2. Einen Punkt in $y = 2x + b$ einsetzen: $3 = 2 \cdot 1 + b$, also $b = 1$.
3. Ergebnis: $f(x) = 2x + 1$.

Probe mit $B$: $2 \cdot 4 + 1 = 9$. Stimmt.

Schneller geht es mit der **Punktsteigungsform** $y - y_1 = m(x - x_1)$: $y - 3 = 2(x - 1)$, umgeformt $y = 2x + 1$.

## Geraden zeichnen

So zeichnest du $f(x) = -\frac{2}{3}x + 4$:

1. Den y-Achsenabschnitt $(0 \mid 4)$ markieren.
2. Mit dem Steigungsdreieck weitergehen: $m = \frac{-2}{3}$ heißt „3 nach rechts, 2 nach unten“. Von $(0 \mid 4)$ kommt man zu $(3 \mid 2)$, dann zu $(6 \mid 0)$.
3. Eine Gerade durch die Punkte ziehen.

Die Wertetabelle bestätigt das:

| $x$ | $0$ | $3$ | $6$ |
|---|---|---|---|
| $f(x)$ | $4$ | $2$ | $0$ |

## Nullstelle

Die Nullstelle ist der Schnittpunkt mit der $x$-Achse. Man löst $mx + b = 0$:

$$x_0 = -\frac{b}{m} \quad (m \neq 0)$$

Für $f(x) = -\frac{2}{3}x + 4$ ergibt sich $x_0 = -\frac{4}{-2/3} = 6$ – passend zur Tabelle.

## Parallele und senkrechte Geraden

> **Merke:** Zwei Geraden sind **parallel**, wenn sie dieselbe Steigung haben: $m_1 = m_2$. Sie stehen **senkrecht** (orthogonal) aufeinander, wenn $m_1 \cdot m_2 = -1$ gilt, also $m_2 = -\frac{1}{m_1}$.

Die Geraden $y = 3x + 1$ und $y = 3x - 5$ sind also parallel, während $y = 2x$ und $y = -\frac{1}{2}x + 7$ senkrecht zueinander sind, denn $2 \cdot \left(-\frac{1}{2}\right) = -1$.

## Schnittpunkt zweier Geraden

Im Schnittpunkt haben beide Funktionen denselben Wert. Man setzt die Terme gleich und löst nach $x$ auf.

### Beispiel 2

$f(x) = 2x + 1$ und $g(x) = -x + 7$:

$$2x + 1 = -x + 7 \;\Rightarrow\; 3x = 6 \;\Rightarrow\; x = 2$$

Dann ist $y = f(2) = 5$. Die Geraden schneiden sich in $S(2 \mid 5)$. Parallele Geraden mit verschiedenem Achsenabschnitt schneiden sich nie – die Gleichung hat dann keine Lösung.

### Beispiel 3: Textaufgabe

Ein Taxi kostet 4 € Grundgebühr plus 2 € pro Kilometer. Die Kosten sind $f(x) = 2x + 4$ (in €, $x$ in km). Eine Fahrt über 10 km kostet $f(10) = 24$, also 24 €. Mit 30 € kommt man $2x + 4 = 30 \Rightarrow x = 13$ Kilometer weit.

## Typische Fehler

- Die Steigungsformel durcheinanderbringen: Oben steht die $y$-Differenz, unten die $x$-Differenz – und beide in derselben Reihenfolge der Punkte.
- $b$ für die Nullstelle halten – $b$ ist der y-Achsenabschnitt, die Nullstelle ist $-\frac{b}{m}$.
- Bei senkrechten Geraden nur das Vorzeichen umdrehen: Nötig ist der **negative Kehrwert**, z. B. $4$ und $-\frac{1}{4}$.
- Eine senkrechte Gerade $x = c$ für eine lineare Funktion halten.
- Vorzeichenfehler beim Steigungsdreieck: $-\frac{2}{3}$ heißt 3 nach rechts, 2 nach **unten**.

## Übungen

1. Gib Steigung und y-Achsenabschnitt von $f(x) = -3x + 4$ an und berechne die Nullstelle.

<details>
<summary>Lösung</summary>

$m = -3$, $b = 4$. Nullstelle: $-3x + 4 = 0 \Rightarrow x = \frac{4}{3}$.

</details>

2. Bestimme die Gleichung der Geraden durch $(2 \mid 1)$ und $(6 \mid 9)$.

<details>
<summary>Lösung</summary>

$m = \frac{9 - 1}{6 - 2} = \frac{8}{4} = 2$. Aus $1 = 2 \cdot 2 + b$ folgt $b = -3$. Also $f(x) = 2x - 3$.

</details>

3. Bestimme die Gerade, die parallel zu $y = 0{,}5x + 2$ ist und durch $(4 \mid 1)$ geht.

<details>
<summary>Lösung</summary>

Gleiche Steigung $m = 0{,}5$. Aus $1 = 0{,}5 \cdot 4 + b = 2 + b$ folgt $b = -1$. Also $y = 0{,}5x - 1$.

</details>

4. Bestimme die Gerade, die senkrecht auf $y = 2x - 1$ steht und durch $(2 \mid 3)$ geht.

<details>
<summary>Lösung</summary>

$m = -\frac{1}{2}$. Aus $3 = -\frac{1}{2} \cdot 2 + b = -1 + b$ folgt $b = 4$. Also $y = -\frac{1}{2}x + 4$.

</details>

5. Wo schneiden sich $f(x) = 3x - 2$ und $g(x) = -2x + 8$?

<details>
<summary>Lösung</summary>

$3x - 2 = -2x + 8 \Rightarrow 5x = 10 \Rightarrow x = 2$. Dann $f(2) = 4$. Schnittpunkt: $S(2 \mid 4)$.

</details>
