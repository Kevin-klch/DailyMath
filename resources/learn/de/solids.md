---
title: "Körper: Volumen und Oberfläche"
category: geometry
order: 60
level: 2
summary: Prisma, Zylinder, Pyramide, Kegel und Kugel – so berechnest du Volumen und Oberflächeninhalt, mit allen Formeln in einer Tabelle.
related: circles, quadrilaterals, pythagorean-theorem, units-and-conversions
---

Ein **Körper** ist eine räumliche Figur wie ein Karton, eine Dose, eine Pyramide oder ein Ball. Dabei tauchen immer wieder zwei Fragen auf: Wie viel passt hinein (das **Volumen**) und wie viel Material braucht man für die Hülle (der **Oberflächeninhalt**)? Mit einer Handvoll Formeln lassen sich beide Fragen für alle gängigen Körper beantworten.

## Volumen und Oberfläche

Das **Volumen** misst den Rauminhalt und wird in Kubikeinheiten angegeben: $\text{cm}^3$, $\text{m}^3$. Bei Flüssigkeiten sind Liter üblich: $1\text{ l} = 1\text{ dm}^3 = 1000\text{ cm}^3$ und $1\text{ m}^3 = 1000\text{ l}$.

Der **Oberflächeninhalt** ist die Summe der Flächeninhalte aller Begrenzungsflächen, angegeben in Quadrateinheiten: $\text{cm}^2$, $\text{m}^2$. Am besten stellt man sich vor, den Körper zu einem flachen **Netz** aufzuklappen, und addiert die Flächen aller Teile.

## Prismen und Zylinder

Ein **Prisma** hat zwei deckungsgleiche, parallele Flächen – **Grundfläche** und Deckfläche –, die durch rechteckige Seitenflächen verbunden sind. Ein Quader ist ein Prisma mit rechteckiger Grundfläche; ein Zylinder ist wie ein Prisma mit kreisförmiger Grundfläche.

> **Merke:** Für jedes Prisma und jeden Zylinder gilt: Volumen = Grundfläche mal Höhe, $V = G \cdot h$.

Stell dir vor, du stapelst lauter dünne Scheiben in Form der Grundfläche bis zur Höhe $h$ übereinander – deshalb ist das Volumen einfach Grundfläche mal Höhe.

Die Oberfläche besteht aus Grund- und Deckfläche plus **Mantelfläche**:

$$O = 2G + M \qquad\text{mit}\qquad M = \text{Umfang der Grundfläche} \cdot h$$

Für einen **Quader** mit den Kanten $a$, $b$, $c$: $V = abc$ und $O = 2(ab + bc + ac)$. Für einen **Würfel** mit Kante $a$: $V = a^3$, $O = 6a^2$.

Beim **Zylinder** mit Radius $r$ und Höhe $h$ rollt man den Mantel zu einem Rechteck mit der Breite $2\pi r$ und der Höhe $h$ ab:

$$V = \pi r^2 h \qquad\qquad O = 2\pi r^2 + 2\pi r h$$

## Pyramiden und Kegel

Eine **Pyramide** hat ein Vieleck als Grundfläche und dreieckige Seitenflächen, die sich in einer Spitze treffen. Der **Kegel** ist dasselbe Prinzip mit kreisförmiger Grundfläche. Beide sind spitze Körper.

> **Merke:** Ein spitzer Körper hat genau ein Drittel des Volumens des Prismas bzw. Zylinders mit gleicher Grundfläche und Höhe: $V = \frac{1}{3} G \cdot h$.

Das lässt sich mit einem klassischen Versuch zeigen: Füllt man eine hohle Pyramide dreimal mit Wasser und gießt es in das Prisma mit gleicher Grundfläche und Höhe, ist dieses genau voll.

Für einen **Kegel** mit Radius $r$, Höhe $h$ und Mantellinie $s$ (Abstand der Spitze vom Rand der Grundfläche) gilt:

$$V = \frac{1}{3}\pi r^2 h \qquad s = \sqrt{r^2 + h^2} \qquad O = \pi r^2 + \pi r s$$

Die Mantellinie liefert der Satz des Pythagoras: Höhe, Radius und Mantellinie bilden ein rechtwinkliges Dreieck.

Bei einer **quadratischen Pyramide** mit Grundkante $a$ und Höhe $h$ hat jede Seitenfläche eine Höhe $h_s$ (von der Spitze senkrecht zur Grundkante). Sie bildet mit $h$ und $\frac{a}{2}$ ein rechtwinkliges Dreieck, also $h_s = \sqrt{h^2 + \left(\frac{a}{2}\right)^2}$ und $O = a^2 + 4 \cdot \frac{1}{2} a h_s = a^2 + 2a h_s$.

## Kugel

Eine **Kugel** mit Radius $r$ hat

$$V = \frac{4}{3}\pi r^3 \qquad\qquad O = 4\pi r^2$$

Die Kugeloberfläche ist genau viermal so groß wie die Fläche eines Kreises mit demselben Radius.

## Überblick

| Körper | Volumen | Oberfläche |
|---|---|---|
| Würfel (Kante $a$) | $a^3$ | $6a^2$ |
| Quader ($a$, $b$, $c$) | $abc$ | $2(ab + bc + ac)$ |
| Prisma (Grundfläche $G$, Höhe $h$) | $G \cdot h$ | $2G + M$ |
| Zylinder ($r$, $h$) | $\pi r^2 h$ | $2\pi r^2 + 2\pi r h$ |
| Pyramide (Grundfläche $G$, Höhe $h$) | $\frac{1}{3} G h$ | $G + \text{Dreiecke}$ |
| Kegel ($r$, $h$, Mantellinie $s$) | $\frac{1}{3}\pi r^2 h$ | $\pi r^2 + \pi r s$ |
| Kugel ($r$) | $\frac{4}{3}\pi r^3$ | $4\pi r^2$ |

## Beispiele

### Beispiel 1: Quader

Kanten $3\text{ cm}$, $4\text{ cm}$, $5\text{ cm}$:

$$V = 3 \cdot 4 \cdot 5 = 60\text{ cm}^3 \qquad O = 2(12 + 20 + 15) = 94\text{ cm}^2$$

### Beispiel 2: Zylinder

Radius $3\text{ cm}$, Höhe $10\text{ cm}$:

$$V = \pi \cdot 9 \cdot 10 = 90\pi \approx 282{,}74\text{ cm}^3$$

$$O = 2\pi \cdot 9 + 2\pi \cdot 3 \cdot 10 = 18\pi + 60\pi = 78\pi \approx 245{,}04\text{ cm}^2$$

### Beispiel 3: Kegel

Radius $3\text{ cm}$, Höhe $4\text{ cm}$. Mantellinie $s = \sqrt{9 + 16} = 5\text{ cm}$.

$$V = \frac{1}{3}\pi \cdot 9 \cdot 4 = 12\pi \approx 37{,}70\text{ cm}^3 \qquad O = 9\pi + 15\pi = 24\pi \approx 75{,}40\text{ cm}^2$$

### Beispiel 4: quadratische Pyramide

Grundkante $6\text{ cm}$, Höhe $4\text{ cm}$. Volumen: $V = \frac{1}{3} \cdot 36 \cdot 4 = 48\text{ cm}^3$. Höhe der Seitenfläche: $h_s = \sqrt{16 + 9} = 5\text{ cm}$. Oberfläche: $O = 36 + 2 \cdot 6 \cdot 5 = 96\text{ cm}^2$.

## Vergrößern und Verkleinern

Werden alle Längen eines Körpers mit dem Faktor $k$ multipliziert, wächst die Oberfläche um den Faktor $k^2$ und das Volumen um den Faktor $k^3$. Verdoppelt man alle Kanten eines Würfels, wird seine Oberfläche $4$-mal und sein Volumen $8$-mal so groß.

## Typische Fehler

- Den Faktor $\frac{1}{3}$ bei Pyramide und Kegel vergessen.
- In der Volumenformel von Kegel oder Pyramide die Mantellinie $s$ statt der Höhe $h$ verwenden.
- Einheiten verwechseln: Volumen in $\text{cm}^3$, Flächen in $\text{cm}^2$. Und $1\text{ m}^3$ sind $1000\text{ l}$, nicht $100\text{ l}$.
- Mit dem Durchmesser statt mit dem Radius rechnen.
- Bei der Oberfläche von Zylinder oder Prisma Grund- oder Deckfläche vergessen.

## Übungen

1. Ein Würfel hat den Oberflächeninhalt $150\text{ cm}^2$. Bestimme Kantenlänge und Volumen.

<details>
<summary>Lösung</summary>

$6a^2 = 150$, also $a^2 = 25$ und $a = 5\text{ cm}$. Dann ist $V = 5^3 = 125\text{ cm}^3$.

</details>

2. Ein zylinderförmiger Tank hat den Radius $0{,}5\text{ m}$ und die Höhe $2\text{ m}$. Wie viele Liter fasst er?

<details>
<summary>Lösung</summary>

$V = \pi \cdot 0{,}25 \cdot 2 = 0{,}5\pi \approx 1{,}571\text{ m}^3$. Wegen $1\text{ m}^3 = 1000\text{ l}$ sind das etwa $1571\text{ l}$.

</details>

3. Berechne Volumen und Oberfläche einer Kugel mit Radius $3\text{ cm}$.

<details>
<summary>Lösung</summary>

$V = \frac{4}{3}\pi \cdot 27 = 36\pi \approx 113{,}10\text{ cm}^3$ und $O = 4\pi \cdot 9 = 36\pi \approx 113{,}10\text{ cm}^2$. (Die Zahlen stimmen nur wegen $r = 3$ überein; die Einheiten sind verschieden.)

</details>

4. Ein Kegel hat den Radius $6\text{ cm}$ und die Höhe $8\text{ cm}$. Bestimme Mantellinie und Volumen.

<details>
<summary>Lösung</summary>

$s = \sqrt{36 + 64} = 10\text{ cm}$. $V = \frac{1}{3}\pi \cdot 36 \cdot 8 = 96\pi \approx 301{,}59\text{ cm}^3$.

</details>

5. Ein Modellauto ist im Maßstab $1 : 10$ gebaut. Wie verhält sich sein Volumen zu dem des echten Autos?

<details>
<summary>Lösung</summary>

Die Längen werden mit $k = \frac{1}{10}$ multipliziert, das Volumen also mit $k^3 = \frac{1}{1000}$.

</details>
