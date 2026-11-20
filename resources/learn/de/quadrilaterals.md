---
title: Vierecke
category: geometry
order: 40
level: 1
summary: Quadrat, Rechteck, Raute, Parallelogramm, Trapez und Drachenviereck – Eigenschaften, das Haus der Vierecke und alle Flächenformeln.
related: triangles, angles, pythagorean-theorem
---

Ein **Viereck** ist ein Vieleck mit vier Ecken und vier Seiten. Quadrate, Rechtecke und die anderen besonderen Vierecke begegnen dir überall – in Grundrissen, Bildschirmen, Feldern und Dächern. Wer ihre Eigenschaften und Flächenformeln kennt, kann sehr viele Alltagsaufgaben aus der Geometrie lösen.

## Allgemeines

Ein Viereck $ABCD$ hat vier Seiten, vier Innenwinkel und zwei **Diagonalen** ($AC$ und $BD$). Eine Diagonale zerlegt es in zwei Dreiecke mit jeweils $180^\circ$ Winkelsumme. Daraus folgt:

> **Merke:** Die Innenwinkel jedes Vierecks ergeben zusammen $360^\circ$.

## Die besonderen Vierecke

**Trapez**: Mindestens ein Paar gegenüberliegender Seiten ist parallel. Die parallelen Seiten heißen **Grundseiten**, ihr Abstand ist die Höhe.

**Parallelogramm**: Beide Paare gegenüberliegender Seiten sind parallel. Daraus folgt: Gegenüberliegende Seiten sind gleich lang, gegenüberliegende Winkel gleich groß, benachbarte Winkel ergänzen sich zu $180^\circ$, und die Diagonalen halbieren sich gegenseitig.

**Rechteck**: ein Parallelogramm mit vier rechten Winkeln. Seine Diagonalen sind gleich lang.

**Raute** (Rhombus): ein Parallelogramm mit vier gleich langen Seiten. Die Diagonalen stehen senkrecht aufeinander und halbieren die Innenwinkel.

**Quadrat**: Rechteck *und* Raute zugleich – vier gleich lange Seiten und vier rechte Winkel. Die Diagonalen sind gleich lang, stehen senkrecht aufeinander und halbieren sich.

**Drachenviereck**: zwei Paare gleich langer *benachbarter* Seiten. Denk an einen klassischen Papierdrachen: oben zwei kurze, unten zwei lange Seiten. Die Diagonalen stehen senkrecht aufeinander, die lange Diagonale ist Symmetrieachse.

## Das Haus der Vierecke

Die Vierecke bilden einen Stammbaum, das sogenannte **Haus der Vierecke**. Jede Eigenschaft eines „Elternteils“ gilt auch für die „Kinder“:

- Jedes Quadrat ist ein Rechteck und eine Raute.
- Jedes Rechteck und jede Raute ist ein Parallelogramm.
- Jedes Parallelogramm ist ein Trapez.
- Jede Raute ist auch ein Drachenviereck.

„Ein Quadrat ist ein Rechteck“ stimmt also, „ein Rechteck ist ein Quadrat“ dagegen nur, wenn zufällig alle Seiten gleich lang sind.

| Viereck | Gegenseiten parallel | Alle Seiten gleich | Alle Winkel $90^\circ$ | Diagonalen senkrecht |
|---|---|---|---|---|
| Parallelogramm | ja | nein | nein | nein |
| Rechteck | ja | nein | ja | nein |
| Raute | ja | ja | nein | ja |
| Quadrat | ja | ja | ja | ja |
| Drachenviereck | nein | nein | nein | ja |

## Flächenformeln

| Viereck | Flächeninhalt |
|---|---|
| Quadrat mit Seite $a$ | $A = a^2$ |
| Rechteck mit Seiten $a$, $b$ | $A = a \cdot b$ |
| Parallelogramm mit Grundseite $g$, Höhe $h$ | $A = g \cdot h$ |
| Trapez mit Grundseiten $a$, $c$, Höhe $h$ | $A = \frac{1}{2}(a + c) \cdot h$ |
| Raute oder Drachen mit Diagonalen $e$, $f$ | $A = \frac{1}{2} \cdot e \cdot f$ |

Warum das so ist:

- **Parallelogramm:** Schneidet man auf einer Seite ein rechtwinkliges Dreieck ab und setzt es auf der anderen Seite wieder an, entsteht ein Rechteck mit derselben Grundseite und Höhe. Die Höhe steht senkrecht auf der Grundseite – sie ist *nicht* die schräge Seite.
- **Trapez:** Zwei gleiche Trapeze, eines davon auf den Kopf gestellt, ergeben zusammen ein Parallelogramm mit Grundseite $a + c$ und Höhe $h$. Das Trapez ist die Hälfte davon.
- **Drachen und Raute:** Die senkrechten Diagonalen zerlegen die Figur in Dreiecke, die genau die Hälfte des Rechtecks mit den Seiten $e$ und $f$ ausfüllen.

> **Merke:** Höhen stehen immer senkrecht auf der Grundseite. Trapezfläche = Mittelwert der parallelen Seiten mal Höhe.

Der Umfang ist die Summe aller vier Seiten, etwa $u = 2(a + b)$ beim Rechteck und $u = 4a$ bei Quadrat und Raute.

## Beispiele

### Beispiel 1: Trapez

Die parallelen Seiten eines Trapezes sind $10\text{ cm}$ und $6\text{ cm}$ lang, die Höhe beträgt $4\text{ cm}$:

$$A = \frac{1}{2}(10 + 6) \cdot 4 = 8 \cdot 4 = 32\text{ cm}^2$$

### Beispiel 2: Drachenviereck

Ein Drachenviereck hat die Diagonalen $8\text{ cm}$ und $5\text{ cm}$:

$$A = \frac{1}{2} \cdot 8 \cdot 5 = 20\text{ cm}^2$$

### Beispiel 3: Winkel im Parallelogramm

Ein Winkel eines Parallelogramms misst $70^\circ$. Der gegenüberliegende Winkel misst ebenfalls $70^\circ$, die benachbarten Winkel jeweils $180^\circ - 70^\circ = 110^\circ$. Probe: $70^\circ + 110^\circ + 70^\circ + 110^\circ = 360^\circ$.

## Typische Fehler

- Beim Parallelogramm Grundseite mal schräge Seite rechnen statt Grundseite mal Höhe.
- Den Faktor $\frac{1}{2}$ bei Trapez und Drachen vergessen.
- Glauben, ein Quadrat sei *kein* Rechteck – es ist ein besonderes Rechteck.
- Annehmen, dass die Diagonalen jedes Parallelogramms senkrecht aufeinander stehen – das gilt nur bei Raute und Quadrat.
- Drachen (gleich lange *benachbarte* Seiten) und Parallelogramm (gleich lange *gegenüberliegende* Seiten) verwechseln.

## Übungen

1. Drei Winkel eines Vierecks messen $85^\circ$, $95^\circ$ und $110^\circ$. Bestimme den vierten.

<details>
<summary>Lösung</summary>

$360^\circ - 85^\circ - 95^\circ - 110^\circ = 70^\circ$.

</details>

2. Ein Rechteck hat den Umfang $30\text{ cm}$, eine Seite ist $9\text{ cm}$ lang. Bestimme die andere Seite und den Flächeninhalt.

<details>
<summary>Lösung</summary>

$2(9 + b) = 30$, also $9 + b = 15$ und $b = 6\text{ cm}$. Flächeninhalt: $9 \cdot 6 = 54\text{ cm}^2$.

</details>

3. Eine Raute hat die Diagonalen $6\text{ cm}$ und $8\text{ cm}$. Berechne Flächeninhalt und Seitenlänge.

<details>
<summary>Lösung</summary>

$A = \frac{1}{2} \cdot 6 \cdot 8 = 24\text{ cm}^2$. Die Diagonalen halbieren sich rechtwinklig, es entstehen rechtwinklige Dreiecke mit den Katheten $3$ und $4$. Die Seite ist also $\sqrt{9 + 16} = 5\text{ cm}$ lang.

</details>

4. Ein Trapez hat den Flächeninhalt $45\text{ cm}^2$ und die parallelen Seiten $11\text{ cm}$ und $7\text{ cm}$. Wie groß ist die Höhe?

<details>
<summary>Lösung</summary>

$45 = \frac{1}{2}(11 + 7) \cdot h = 9h$, also $h = 5\text{ cm}$.

</details>

5. Richtig oder falsch: „Jede Raute ist ein Quadrat.“ „Jedes Quadrat ist eine Raute.“

<details>
<summary>Lösung</summary>

Die erste Aussage ist falsch – eine Raute muss keine rechten Winkel haben. Die zweite ist richtig – ein Quadrat hat vier gleich lange Seiten.

</details>
