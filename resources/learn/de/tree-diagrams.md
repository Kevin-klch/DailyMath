---
title: Baumdiagramme und mehrstufige Zufallsexperimente
category: stochastics
order: 40
level: 2
summary: Zweimal werfen, dreimal ziehen: Wie Baumdiagramme und die beiden Pfadregeln Wahrscheinlichkeiten bei mehrstufigen Experimenten einfach machen.
related: probability-basics, conditional-probability, binomial-distribution, combinatorics
---

Viele Zufallsexperimente laufen in mehreren Stufen ab: Eine Münze wird zweimal geworfen, zwei Karten werden nacheinander gezogen, ein Bauteil durchläuft drei Qualitätskontrollen. Ein **Baumdiagramm** zeigt alle möglichen Abläufe eines solchen **mehrstufigen Zufallsexperiments** auf einen Blick – und mit zwei einfachen Regeln lassen sich daraus Wahrscheinlichkeiten ablesen. In der Schule ist das Baumdiagramm das wichtigste Werkzeug für fast jede mehrstufige Aufgabe.

## Ein Baumdiagramm zeichnen

Ein Baumdiagramm beginnt an einem Punkt, dem Startpunkt. Für die erste Stufe zeichnet man für jedes mögliche Ergebnis einen Ast und schreibt die zugehörige Wahrscheinlichkeit daran. Am Ende jedes Astes setzt man die Äste der zweiten Stufe an, und so weiter.

Beim zweimaligen Wurf einer fairen Münze (K = Kopf, Z = Zahl) hat der Baum auf der ersten Stufe zwei Äste und an jedem Ende noch einmal zwei – insgesamt also vier **Pfade**:

| Pfad | Wahrscheinlichkeit |
|---|---|
| K, K | $\frac{1}{2} \cdot \frac{1}{2} = \frac{1}{4}$ |
| K, Z | $\frac{1}{2} \cdot \frac{1}{2} = \frac{1}{4}$ |
| Z, K | $\frac{1}{2} \cdot \frac{1}{2} = \frac{1}{4}$ |
| Z, Z | $\frac{1}{2} \cdot \frac{1}{2} = \frac{1}{4}$ |

An jeder Verzweigung müssen sich die Wahrscheinlichkeiten der abgehenden Äste zu $1$ addieren – eines der Ergebnisse tritt ja sicher ein.

## Die beiden Pfadregeln

> **Merke:** **1. Pfadregel (Produktregel):** Die Wahrscheinlichkeit eines Pfades ist das Produkt der Wahrscheinlichkeiten entlang des Pfades. **2. Pfadregel (Summenregel):** Die Wahrscheinlichkeit eines Ereignisses ist die Summe der Wahrscheinlichkeiten aller Pfade, die zu diesem Ereignis gehören.

Warum multipliziert man? Hat die erste Stufe die Wahrscheinlichkeit $\frac{1}{2}$, landet auf lange Sicht nur die Hälfte aller Durchgänge auf diesem Ast. Davon geht wiederum nur ein bestimmter Anteil auf dem nächsten Ast weiter. „Ein Anteil von einem Anteil“ bedeutet Multiplizieren.

Warum addiert man? Verschiedene Pfade können nie gleichzeitig eintreten, deshalb darf man ihre Wahrscheinlichkeiten einfach zusammenzählen.

### Beispiel 1

Zwei Münzwürfe. Wahrscheinlichkeit für **genau einmal Kopf**: Zu diesem Ereignis gehören die Pfade K, Z und Z, K, also

$$P(\text{genau einmal Kopf}) = \frac{1}{4} + \frac{1}{4} = \frac{1}{2}$$

## Mit und ohne Zurücklegen

Beim Ziehen aus einer Urne kommt es darauf an, ob die gezogene Kugel zurückgelegt wird.

- **Mit Zurücklegen:** Der Inhalt der Urne bleibt gleich, die Wahrscheinlichkeiten sind auf jeder Stufe dieselben.
- **Ohne Zurücklegen:** Nach jedem Zug ist eine Kugel weniger in der Urne, die Wahrscheinlichkeiten der späteren Stufen ändern sich.

### Beispiel 2: mit Zurücklegen

In einer Urne liegen 3 rote (r) und 2 blaue (b) Kugeln. Man zieht eine Kugel, notiert die Farbe, legt sie zurück und zieht noch einmal.

$$P(rr) = \frac{3}{5} \cdot \frac{3}{5} = \frac{9}{25}, \qquad P(bb) = \frac{2}{5} \cdot \frac{2}{5} = \frac{4}{25}$$

Je eine Kugel jeder Farbe kann in zwei Reihenfolgen auftreten:

$$P(\text{verschiedene Farben}) = \frac{3}{5} \cdot \frac{2}{5} + \frac{2}{5} \cdot \frac{3}{5} = \frac{12}{25}$$

Probe: $\frac{9}{25} + \frac{4}{25} + \frac{12}{25} = 1$.

### Beispiel 3: ohne Zurücklegen

Dieselbe Urne, aber die erste Kugel wird **nicht** zurückgelegt. War sie rot, liegen noch 2 rote und 2 blaue Kugeln in der Urne; war sie blau, noch 3 rote und 1 blaue.

$$P(rr) = \frac{3}{5} \cdot \frac{2}{4} = \frac{3}{10}, \qquad P(rb) = \frac{3}{5} \cdot \frac{2}{4} = \frac{3}{10}$$

$$P(br) = \frac{2}{5} \cdot \frac{3}{4} = \frac{3}{10}, \qquad P(bb) = \frac{2}{5} \cdot \frac{1}{4} = \frac{1}{10}$$

Also $P(\text{verschiedene Farben}) = \frac{3}{10} + \frac{3}{10} = \frac{3}{5}$. Auch hier ergeben die vier Pfade zusammen $1$.

## „Mindestens einmal“: über das Gegenereignis

Fragen wie „mindestens ein Treffer bei drei Versuchen“ würden viele Pfade erfordern. Das Gegenereignis „kein einziger Treffer“ ist dagegen nur ein Pfad. Also berechnet man diesen und zieht ihn von 1 ab.

> **Merke:** $P(\text{mindestens einmal}) = 1 - P(\text{keinmal})$.

### Beispiel 4

Eine Basketballspielerin trifft einen Freiwurf mit der Wahrscheinlichkeit $0{,}8$, unabhängig bei jedem Wurf. Sie wirft dreimal. Die Wahrscheinlichkeit, alle drei Würfe zu verfehlen, ist der einzelne Pfad „daneben, daneben, daneben“:

$$P(\text{kein Treffer}) = 0{,}2 \cdot 0{,}2 \cdot 0{,}2 = 0{,}008$$

$$P(\text{mindestens ein Treffer}) = 1 - 0{,}008 = 0{,}992$$

## Reduzierte Baumdiagramme

Man muss nicht immer jeden Ast zeichnen. Interessiert pro Stufe nur ein bestimmtes Ergebnis (etwa „Sechs“ oder „keine Sechs“), reichen zwei Äste pro Stufe. Außerdem darf man Teile des Baums weglassen, die für die Frage keine Rolle spielen – die verwendeten Pfade müssen aber vollständig sein.

## Typische Fehler

- Entlang eines Pfades addieren statt multiplizieren – oder verschiedene Pfade multiplizieren statt addieren.
- Beim Ziehen ohne Zurücklegen vergessen, die Wahrscheinlichkeiten der späteren Stufen anzupassen.
- Übersehen, dass „verschiedene Farben“ in mehreren Reihenfolgen auftreten kann und deshalb mehrere Pfade zählen.
- Astwahrscheinlichkeiten an einer Verzweigung, die nicht zusammen 1 ergeben – immer kontrollieren.
- „Mindestens einmal“ mühsam Pfad für Pfad ausrechnen, obwohl das Gegenereignis viel schneller wäre.

## Übungen

1. Eine faire Münze wird dreimal geworfen. Wie groß ist die Wahrscheinlichkeit für genau zweimal Kopf?

<details>
<summary>Lösung</summary>

Jeder der $2^3 = 8$ Pfade hat die Wahrscheinlichkeit $\frac{1}{8}$. Genau zweimal Kopf: KKZ, KZK, ZKK – drei Pfade. Also $P = \frac{3}{8}$.

</details>

2. In einer Urne liegen 4 rote Kugeln und 1 weiße. Es werden zwei Kugeln ohne Zurücklegen gezogen. Wie wahrscheinlich sind beide rot?

<details>
<summary>Lösung</summary>

$P(rr) = \frac{4}{5} \cdot \frac{3}{4} = \frac{12}{20} = \frac{3}{5}$.

</details>

3. Auf dem Schulweg liegen zwei Ampeln, die unabhängig voneinander schalten. Jede zeigt mit der Wahrscheinlichkeit $0{,}4$ Grün. Wie wahrscheinlich ist genau eine der beiden grün?

<details>
<summary>Lösung</summary>

Zwei Pfade: grün–rot und rot–grün. $P = 0{,}4 \cdot 0{,}6 + 0{,}6 \cdot 0{,}4 = 0{,}24 + 0{,}24 = 0{,}48$.

</details>

4. In einer Kiste liegen 5 Glühbirnen, davon sind 2 defekt. Es werden nacheinander drei Birnen ohne Zurücklegen entnommen. Wie groß ist die Wahrscheinlichkeit, dass keine davon defekt ist?

<details>
<summary>Lösung</summary>

Es gibt 3 intakte Birnen. $P = \frac{3}{5} \cdot \frac{2}{4} \cdot \frac{1}{3} = \frac{6}{60} = \frac{1}{10}$.

</details>

5. Ein Würfel wird dreimal geworfen. Wie wahrscheinlich ist mindestens eine Sechs?

<details>
<summary>Lösung</summary>

Gegenereignis: keine Sechs in drei Würfen, $P = \left(\frac{5}{6}\right)^3 = \frac{125}{216}$. Also $P(\text{mindestens eine Sechs}) = 1 - \frac{125}{216} = \frac{91}{216} \approx 0{,}42$.

</details>
