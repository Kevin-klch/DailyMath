---
title: Satz des Pythagoras
category: geometry
order: 30
level: 1
summary: Im rechtwinkligen Dreieck gilt a² + b² = c². So berechnest du fehlende Seiten, Abstände und Diagonalen – und so lässt sich der Satz begründen.
related: triangles, powers-and-roots, trigonometry, similarity
---

Der **Satz des Pythagoras** verbindet die drei Seiten eines rechtwinkligen Dreiecks. Kennt man zwei davon, kann man die dritte immer ausrechnen. Kaum ein Satz wird so oft gebraucht: Mit ihm bestimmt man Abstände im Koordinatensystem, Diagonalen von Rechtecken und Quadern oder die Höhe von Dächern und Leitern.

## Die Seiten im rechtwinkligen Dreieck

Im rechtwinkligen Dreieck liegt dem rechten Winkel die längste Seite gegenüber. Sie heißt **Hypotenuse** und wird meist mit $c$ bezeichnet. Die beiden kürzeren Seiten, die den rechten Winkel einschließen, heißen **Katheten**, meist $a$ und $b$.

> **Merke:** In jedem rechtwinkligen Dreieck mit den Katheten $a$, $b$ und der Hypotenuse $c$ gilt $a^2 + b^2 = c^2$.

In Worten: Die Quadrate über den beiden Katheten sind zusammen so groß wie das Quadrat über der Hypotenuse.

Prüfe immer, *welche* Seite die Hypotenuse ist – nämlich die, die dem rechten Winkel gegenüberliegt, nicht unbedingt die Seite, die in der Aufgabe $c$ heißt.

## Warum der Satz gilt

Nimm ein großes Quadrat mit der Seitenlänge $a + b$. Lege vier Kopien des rechtwinkligen Dreiecks so hinein, dass jede in einer Ecke liegt und die Katheten $a$ und $b$ an den Quadratseiten entlanglaufen. Die vier Hypotenusen umranden dann in der Mitte ein schräg stehendes Quadrat mit der Seite $c$.

Den Flächeninhalt des großen Quadrats kann man auf zwei Arten bestimmen:

$$(a + b)^2 = c^2 + 4 \cdot \frac{1}{2}ab$$

Ausmultipliziert ergibt das $a^2 + 2ab + b^2 = c^2 + 2ab$. Zieht man auf beiden Seiten $2ab$ ab, bleibt $a^2 + b^2 = c^2$.

## Fehlende Seiten berechnen

Löse die Gleichung nach der gesuchten Seite auf:

$$c = \sqrt{a^2 + b^2} \qquad\qquad a = \sqrt{c^2 - b^2}$$

Für die Hypotenuse werden die Quadrate **addiert**, für eine Kathete wird das kleinere Quadrat vom größeren **subtrahiert**.

### Beispiel 1: Hypotenuse

Die Katheten sind $6\text{ cm}$ und $8\text{ cm}$ lang:

$$c = \sqrt{6^2 + 8^2} = \sqrt{36 + 64} = \sqrt{100} = 10\text{ cm}$$

### Beispiel 2: Kathete

Die Hypotenuse ist $13$ lang, eine Kathete $5$:

$$b = \sqrt{13^2 - 5^2} = \sqrt{169 - 25} = \sqrt{144} = 12$$

### Beispiel 3: Leiter

Eine $5\text{ m}$ lange Leiter lehnt an einer Wand, ihr Fuß steht $1{,}4\text{ m}$ von der Wand entfernt. Wie hoch reicht sie?

Die Leiter ist die Hypotenuse, Bodenabstand und Höhe sind die Katheten:

$$h = \sqrt{5^2 - 1{,}4^2} = \sqrt{25 - 1{,}96} = \sqrt{23{,}04} = 4{,}8\text{ m}$$

## Die Umkehrung

Der Satz gilt auch umgekehrt: Erfüllen drei Seitenlängen die Gleichung $a^2 + b^2 = c^2$, dann hat das Dreieck gegenüber von $c$ einen rechten Winkel. So lässt sich prüfen, ob ein Winkel genau $90^\circ$ beträgt. Ist $a^2 + b^2 > c^2$ (mit $c$ als längster Seite), ist das Dreieck spitzwinklig, bei $a^2 + b^2 < c^2$ stumpfwinklig.

Ganzzahlige Lösungen heißen **pythagoreische Zahlentripel**. Die bekanntesten sind $(3, 4, 5)$, $(5, 12, 13)$, $(8, 15, 17)$ und $(7, 24, 25)$. Jedes Vielfache eines Tripels ist wieder eines, etwa $(6, 8, 10)$.

## Typische Anwendungen

**Diagonale eines Rechtecks** mit den Seiten $a$ und $b$: $d = \sqrt{a^2 + b^2}$. Beim Quadrat mit Seite $a$ ergibt das $d = a\sqrt{2}$.

**Höhe im gleichseitigen Dreieck** mit Seite $a$: Die Höhe zerlegt es in zwei rechtwinklige Dreiecke mit Hypotenuse $a$ und Kathete $\frac{a}{2}$, also

$$h = \sqrt{a^2 - \left(\frac{a}{2}\right)^2} = \frac{\sqrt{3}}{2}a$$

**Abstand zweier Punkte** $P(x_1 | y_1)$ und $Q(x_2 | y_2)$: Die Differenzen in $x$- und $y$-Richtung sind die Katheten:

$$d = \sqrt{(x_2 - x_1)^2 + (y_2 - y_1)^2}$$

Für $P(1 | 2)$ und $Q(7 | 10)$: $d = \sqrt{6^2 + 8^2} = 10$.

**Raumdiagonale eines Quaders** mit den Kanten $a$, $b$, $c$: Zweimal Pythagoras liefert $d = \sqrt{a^2 + b^2 + c^2}$. Ein Quader mit $2 \times 3 \times 6$ hat $d = \sqrt{4 + 9 + 36} = \sqrt{49} = 7$.

> **Merke:** Suche bei jeder gesuchten Länge nach einem rechtwinkligen Dreieck, in dem sie vorkommt – oft muss man dafür erst eine Höhe oder Diagonale einzeichnen.

## Typische Fehler

- Den Satz in Dreiecken ohne rechten Winkel anwenden.
- Eine Kathete für die Hypotenuse halten – die Hypotenuse liegt immer dem rechten Winkel gegenüber und ist die längste Seite.
- $\sqrt{a^2 + b^2} = a + b$ schreiben. Die Wurzel aus einer Summe ist *nicht* die Summe der Wurzeln: $\sqrt{9 + 16} = 5$, nicht $7$.
- Bei der Berechnung einer Kathete addieren statt subtrahieren.
- Am Ende das Wurzelziehen vergessen.

## Übungen

1. Ein rechtwinkliges Dreieck hat die Katheten $9$ und $12$. Wie lang ist die Hypotenuse?

<details>
<summary>Lösung</summary>

$c = \sqrt{81 + 144} = \sqrt{225} = 15$.

</details>

2. Die Hypotenuse eines rechtwinkligen Dreiecks ist $17\text{ cm}$ lang, eine Kathete $8\text{ cm}$. Berechne die andere Kathete.

<details>
<summary>Lösung</summary>

$b = \sqrt{289 - 64} = \sqrt{225} = 15\text{ cm}$.

</details>

3. Ist das Dreieck mit den Seiten $7$, $8$ und $11$ rechtwinklig?

<details>
<summary>Lösung</summary>

$7^2 + 8^2 = 49 + 64 = 113$, aber $11^2 = 121$. Wegen $113 \neq 121$ ist es nicht rechtwinklig (wegen $113 < 121$ sogar stumpfwinklig).

</details>

4. Wie lang ist die Diagonale eines Quadrats mit der Seitenlänge $5\text{ cm}$?

<details>
<summary>Lösung</summary>

$d = \sqrt{25 + 25} = \sqrt{50} = 5\sqrt{2} \approx 7{,}07\text{ cm}$.

</details>

5. Berechne den Abstand der Punkte $A(-2 | 1)$ und $B(3 | 13)$.

<details>
<summary>Lösung</summary>

Differenzen: $3 - (-2) = 5$ und $13 - 1 = 12$. Also $d = \sqrt{25 + 144} = \sqrt{169} = 13$.

</details>
