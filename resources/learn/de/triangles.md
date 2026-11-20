---
title: Dreiecke
category: geometry
order: 20
level: 1
summary: Dreiecksarten, Winkelsumme, Dreiecksungleichung, Flächeninhalt, besondere Linien und die Kongruenzsätze im Überblick.
related: angles, pythagorean-theorem, similarity, trigonometry
---

Ein **Dreieck** ist das einfachste Vieleck: drei Punkte, die nicht auf einer Geraden liegen, verbunden durch drei Seiten. Jedes andere Vieleck lässt sich in Dreiecke zerlegen – deshalb führen so viele Sätze der Geometrie auf Dreiecke zurück. Hier findest du das Grundwissen, das du immer wieder brauchst.

## Bezeichnungen

Die Ecken heißen meist $A$, $B$, $C$ und werden gegen den Uhrzeigersinn beschriftet. Die Seite gegenüber einer Ecke bekommt den passenden Kleinbuchstaben: Seite $a$ liegt gegenüber von $A$, $b$ gegenüber von $B$, $c$ gegenüber von $C$. Die Innenwinkel heißen $\alpha$ (bei $A$), $\beta$ (bei $B$) und $\gamma$ (bei $C$). Wer sich an diese Konvention hält, liest Formeln viel leichter.

## Dreiecksarten

**Nach den Seiten:**

- **unregelmäßig** – alle Seiten sind verschieden lang,
- **gleichschenklig** – mindestens zwei Seiten sind gleich lang (die gleichen Seiten heißen **Schenkel**, die dritte **Basis**),
- **gleichseitig** – alle drei Seiten sind gleich lang.

**Nach den Winkeln:**

- **spitzwinklig** – alle Winkel sind kleiner als $90^\circ$,
- **rechtwinklig** – ein Winkel ist genau $90^\circ$,
- **stumpfwinklig** – ein Winkel ist größer als $90^\circ$.

Im gleichschenkligen Dreieck sind die beiden **Basiswinkel** gleich groß. Im gleichseitigen Dreieck misst jeder Winkel $60^\circ$.

## Die Winkelsumme

> **Merke:** In jedem Dreieck gilt $\alpha + \beta + \gamma = 180^\circ$.

Warum? Zeichne durch $C$ eine Parallele zur Seite $c$. An der Ecke $C$ liegen dann drei Winkel nebeneinander auf dieser Geraden: in der Mitte $\gamma$, links ein Winkel so groß wie $\alpha$, rechts einer so groß wie $\beta$ – beides Wechselwinkel an Parallelen. Zusammen bilden sie einen gestreckten Winkel, also $180^\circ$.

Daraus folgt der **Außenwinkelsatz**: Verlängert man eine Seite über eine Ecke hinaus, ist der Außenwinkel dort so groß wie die Summe der beiden nicht anliegenden Innenwinkel. Der Außenwinkel bei $C$ beträgt also $\alpha + \beta$.

## Die Dreiecksungleichung

Nicht aus drei beliebigen Längen lässt sich ein Dreieck bauen. Jede Seite muss kürzer sein als die beiden anderen zusammen:

$$a < b + c, \qquad b < a + c, \qquad c < a + b$$

Aus $3$, $4$ und $8$ entsteht kein Dreieck, denn $3 + 4 = 7 < 8$. Es genügt zu prüfen, ob die längste Seite kürzer ist als die Summe der beiden anderen. Außerdem gilt: Der längsten Seite liegt immer der größte Winkel gegenüber.

## Umfang und Flächeninhalt

Der Umfang ist einfach $u = a + b + c$. Für den Flächeninhalt wählt man eine Seite als **Grundseite** $g$ und zeichnet die zugehörige **Höhe** $h$ ein – den senkrechten Abstand der gegenüberliegenden Ecke von der Geraden durch $g$:

$$A = \frac{1}{2} \cdot g \cdot h$$

Der Grund: Zwei gleiche Dreiecke lassen sich zu einem Parallelogramm mit Grundseite $g$ und Höhe $h$ zusammensetzen. Im rechtwinkligen Dreieck stehen die Katheten senkrecht aufeinander, die eine ist also Höhe zur anderen: $A = \frac{1}{2}ab$. Im stumpfwinkligen Dreieck kann eine Höhe *außerhalb* liegen, auf der Verlängerung der Grundseite.

Kennt man nur die drei Seiten, hilft die **Heron'sche Formel**. Mit dem halben Umfang $s = \frac{a + b + c}{2}$ gilt:

$$A = \sqrt{s(s - a)(s - b)(s - c)}$$

## Besondere Linien im Dreieck

- Die drei **Mittelsenkrechten** schneiden sich in einem Punkt, dem Mittelpunkt des **Umkreises** (er geht durch alle drei Ecken).
- Die drei **Winkelhalbierenden** schneiden sich im Mittelpunkt des **Inkreises** (er berührt alle drei Seiten).
- Die drei **Seitenhalbierenden** (von einer Ecke zur Mitte der Gegenseite) schneiden sich im **Schwerpunkt**. Er teilt jede Seitenhalbierende im Verhältnis $2 : 1$.
- Die drei **Höhen** schneiden sich im **Höhenschnittpunkt**.

## Kongruenz

Zwei Dreiecke heißen **kongruent** (deckungsgleich), wenn sie in Form und Größe übereinstimmen. Man muss dafür nicht alle sechs Stücke vergleichen – einer der **Kongruenzsätze** genügt:

- **SSS** – alle drei Seiten stimmen überein,
- **SWS** – zwei Seiten und der eingeschlossene Winkel,
- **WSW** bzw. **SWW** – eine Seite und zwei Winkel,
- **SsW** – zwei Seiten und der Winkel, der der *größeren* Seite gegenüberliegt.

> **Merke:** Ein Dreieck ist durch drei passende Angaben eindeutig festgelegt. Deshalb kann man es nach SSS, SWS, WSW oder SsW konstruieren.

## Beispiele

### Beispiel 1

Ein gleichschenkliges Dreieck hat an der Spitze einen Winkel von $40^\circ$. Wie groß sind die Basiswinkel?

Die Basiswinkel sind gleich groß: $2\beta = 180^\circ - 40^\circ = 140^\circ$, also $\beta = 70^\circ$.

### Beispiel 2

Ein Dreieck hat die Grundseite $g = 8\text{ cm}$ und die Höhe $h = 5\text{ cm}$. Sein Flächeninhalt ist

$$A = \frac{1}{2} \cdot 8 \cdot 5 = 20\text{ cm}^2$$

### Beispiel 3

Berechne den Flächeninhalt des Dreiecks mit den Seiten $13$, $14$ und $15$.

$s = \frac{13 + 14 + 15}{2} = 21$, also

$$A = \sqrt{21 \cdot 8 \cdot 7 \cdot 6} = \sqrt{7056} = 84$$

## Typische Fehler

- Die Höhe entlang einer schrägen Seite messen statt senkrecht zur Grundseite.
- Den Faktor $\frac{1}{2}$ in der Flächenformel vergessen.
- Annehmen, dass drei Längen immer ein Dreieck ergeben – erst die Dreiecksungleichung prüfen.
- SsW verwenden, obwohl der Winkel der *kleineren* Seite gegenüberliegt – dann kann es zwei verschiedene Dreiecke geben.
- Seitenhalbierende (zur Seitenmitte) und Höhen (senkrecht) verwechseln.

## Übungen

1. Zwei Winkel eines Dreiecks messen $35^\circ$ und $95^\circ$. Bestimme den dritten Winkel und die Dreiecksart.

<details>
<summary>Lösung</summary>

$180^\circ - 35^\circ - 95^\circ = 50^\circ$. Da ein Winkel $95^\circ > 90^\circ$ misst, ist das Dreieck stumpfwinklig.

</details>

2. Lässt sich aus den Längen $5$, $7$ und $13$ ein Dreieck bilden?

<details>
<summary>Lösung</summary>

Nein. $5 + 7 = 12$ ist kleiner als $13$, die Dreiecksungleichung ist verletzt.

</details>

3. Ein rechtwinkliges Dreieck hat die Katheten $6\text{ cm}$ und $9\text{ cm}$. Berechne den Flächeninhalt.

<details>
<summary>Lösung</summary>

Die Katheten sind Grundseite und Höhe: $A = \frac{1}{2} \cdot 6 \cdot 9 = 27\text{ cm}^2$.

</details>

4. Ein Dreieck hat den Flächeninhalt $30\text{ cm}^2$ und die Grundseite $12\text{ cm}$. Wie lang ist die zugehörige Höhe?

<details>
<summary>Lösung</summary>

$30 = \frac{1}{2} \cdot 12 \cdot h = 6h$, also $h = 5\text{ cm}$.

</details>

5. In einem Dreieck ist $\alpha = 50^\circ$, der Außenwinkel bei $C$ beträgt $110^\circ$. Bestimme $\beta$ und $\gamma$.

<details>
<summary>Lösung</summary>

Außenwinkelsatz: $\alpha + \beta = 110^\circ$, also $\beta = 60^\circ$. Dann ist $\gamma = 180^\circ - 110^\circ = 70^\circ$.

</details>
