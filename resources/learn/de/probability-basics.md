---
title: Grundlagen der Wahrscheinlichkeit
category: stochastics
order: 30
level: 1
summary: Ergebnisse, Ereignisse und wie wahrscheinlich sie sind – die Sprache des Zufalls, Laplace-Wahrscheinlichkeit, Gegenereignis und Additionssatz.
related: tree-diagrams, combinatorics, conditional-probability, statistics-basics
---

Ob beim Würfeln, Kartenziehen oder Münzwurf: Das Ergebnis lässt sich nicht vorhersagen – wohl aber, wie **wahrscheinlich** jedes Ergebnis ist. Die Wahrscheinlichkeitsrechnung macht aus diesem Bauchgefühl Zahlen zwischen 0 und 1. Das hilft nicht nur bei Spielen, sondern auch bei Wettervorhersagen, Versicherungen, in der Medizin und in der Qualitätskontrolle.

## Zufallsexperiment, Ergebnis und Ereignis

Ein **Zufallsexperiment** ist ein Vorgang, dessen Ausgang man nicht sicher vorhersagen kann, dessen mögliche Ausgänge aber bekannt sind. Jeder mögliche Ausgang heißt **Ergebnis**. Die Menge aller Ergebnisse ist die **Ergebnismenge** $\Omega$ (Omega).

Beim einmaligen Würfeln gilt:

$$\Omega = \{1, 2, 3, 4, 5, 6\}$$

Ein **Ereignis** ist eine Teilmenge der Ergebnismenge – also eine Aussage über den Ausgang, die entweder zutrifft oder nicht. „Die Augenzahl ist gerade“ ist das Ereignis $A = \{2, 4, 6\}$. Ein Ereignis **tritt ein**, wenn das tatsächliche Ergebnis darin liegt.

Zwei Sonderfälle: Das **sichere Ereignis** $\Omega$ tritt immer ein, das **unmögliche Ereignis** $\emptyset$ (die leere Menge) nie.

## Wahrscheinlichkeit als Zahl

Die Wahrscheinlichkeit eines Ereignisses $A$ schreibt man $P(A)$ (vom englischen *probability*). Es gilt immer

$$0 \le P(A) \le 1$$

Dabei bedeutet $0$ „unmöglich“ und $1$ „sicher“. Wahrscheinlichkeiten kann man als Bruch, Dezimalzahl oder in Prozent angeben: $\frac{1}{4} = 0{,}25 = 25\,\%$.

## Laplace-Experimente

Sind alle Ergebnisse **gleich wahrscheinlich** – idealer Würfel, gut gemischte Karten, faire Münze –, spricht man von einem **Laplace-Experiment**. Dann ist die Wahrscheinlichkeit eines Ereignisses einfach ein Verhältnis von Anzahlen:

$$P(A) = \frac{\text{Anzahl der für } A \text{ günstigen Ergebnisse}}{\text{Anzahl aller möglichen Ergebnisse}} = \frac{|A|}{|\Omega|}$$

> **Merke:** Laplace-Wahrscheinlichkeit = günstige Ergebnisse geteilt durch mögliche Ergebnisse – aber nur, wenn alle Ergebnisse gleich wahrscheinlich sind.

### Beispiel 1

Ein idealer Würfel wird geworfen. Wahrscheinlichkeit für eine gerade Zahl: $A = \{2, 4, 6\}$, also $P(A) = \frac{3}{6} = \frac{1}{2}$.

Wahrscheinlichkeit für eine Augenzahl von mindestens 5: $B = \{5, 6\}$, also $P(B) = \frac{2}{6} = \frac{1}{3}$.

### Beispiel 2

In einer Urne liegen 3 rote, 5 blaue und 2 grüne Kugeln. Eine Kugel wird zufällig gezogen. Jede der 10 Kugeln ist gleich wahrscheinlich, also

$$P(\text{rot}) = \frac{3}{10}, \qquad P(\text{blau}) = \frac{5}{10} = \frac{1}{2}, \qquad P(\text{grün}) = \frac{2}{10} = \frac{1}{5}$$

Die drei Wahrscheinlichkeiten ergeben zusammen $1$ – irgendeine Farbe wird ja sicher gezogen.

### Beispiel 3: zwei Würfel

Es werden zwei Würfel geworfen. Naheliegend wäre, die 11 möglichen Augensummen $2, 3, \dots, 12$ als Ergebnisse zu nehmen – sie sind aber **nicht** gleich wahrscheinlich. Gleich wahrscheinlich sind die $6 \cdot 6 = 36$ geordneten Paare $(1,1), (1,2), \dots, (6,6)$. Die Augensumme 7 entsteht durch $(1,6), (2,5), (3,4), (4,3), (5,2), (6,1)$, also

$$P(\text{Augensumme } 7) = \frac{6}{36} = \frac{1}{6}$$

Die Augensumme 2 dagegen entsteht nur durch $(1,1)$ und hat die Wahrscheinlichkeit $\frac{1}{36}$.

## Relative Häufigkeit

Nicht jedes Zufallsexperiment ist ein Laplace-Experiment – eine Reißzwecke kann auf dem Kopf oder auf der Seite landen, und beides ist nicht gleich wahrscheinlich. Dann schätzt man Wahrscheinlichkeiten, indem man das Experiment oft wiederholt. Die **relative Häufigkeit** eines Ereignisses ist

$$\text{relative Häufigkeit} = \frac{\text{Anzahl, wie oft } A \text{ eingetreten ist}}{\text{Anzahl der Versuche}}$$

Das **Gesetz der großen Zahlen** besagt: Je öfter man das Experiment wiederholt, desto näher liegt die relative Häufigkeit in der Regel an der tatsächlichen Wahrscheinlichkeit. Nach 10 Münzwürfen hat man leicht 7-mal Zahl, nach 10000 Würfen liegt der Anteil fast sicher sehr nah bei $50\,\%$.

## Das Gegenereignis

Das **Gegenereignis** $\overline{A}$ bedeutet „$A$ tritt nicht ein“. Da genau eines von beiden eintritt, gilt

$$P(\overline{A}) = 1 - P(A)$$

Das ist enorm praktisch, wenn sich das Gegenteil leichter abzählen lässt – vor allem bei Fragen nach „mindestens einem“.

### Beispiel 4

Zwei Würfel werden geworfen. Wie wahrscheinlich ist mindestens eine Sechs? Das Gegenereignis ist „keine Sechs“: Beide Würfel zeigen eine der 5 anderen Zahlen, das passiert in $5 \cdot 5 = 25$ von 36 Fällen. Also

$$P(\text{mindestens eine Sechs}) = 1 - \frac{25}{36} = \frac{11}{36}$$

## Der Additionssatz

Das Ereignis „$A$ oder $B$“ (mindestens eines tritt ein) schreibt man $A \cup B$, das Ereignis „$A$ und $B$“ schreibt man $A \cap B$. Addiert man $P(A)$ und $P(B)$, werden die Ergebnisse, die in beiden liegen, doppelt gezählt – also zieht man sie einmal ab:

$$P(A \cup B) = P(A) + P(B) - P(A \cap B)$$

Können $A$ und $B$ nicht gleichzeitig eintreten (sie sind **unvereinbar**), ist $P(A \cap B) = 0$, und man darf einfach addieren.

> **Merke:** $P(\overline{A}) = 1 - P(A)$ und $P(A \cup B) = P(A) + P(B) - P(A \cap B)$.

### Beispiel 5

Ein Würfel wird geworfen. $A$: „gerade“ $= \{2, 4, 6\}$, $B$: „mindestens 4“ $= \{4, 5, 6\}$. Beides zugleich: $A \cap B = \{4, 6\}$.

$$P(A \cup B) = \frac{3}{6} + \frac{3}{6} - \frac{2}{6} = \frac{4}{6} = \frac{2}{3}$$

Probe: $A \cup B = \{2, 4, 5, 6\}$ hat tatsächlich 4 Elemente.

## Typische Fehler

- Die Laplace-Formel verwenden, obwohl die Ergebnisse nicht gleich wahrscheinlich sind (wie bei den Augensummen zweier Würfel).
- Beim Wurf mit zwei Würfeln $(1,2)$ und $(2,1)$ für dasselbe Ergebnis halten – es sind zwei verschiedene.
- Wahrscheinlichkeiten von Ereignissen addieren, die sich überschneiden, ohne die Schnittmenge abzuziehen.
- Eine Wahrscheinlichkeit größer als 1 oder kleiner als 0 herausbekommen – ein sicheres Zeichen für einen Fehler.
- Auf den „Spielerfehlschluss“ hereinfallen: Nach fünfmal Kopf ist Zahl beim nächsten Wurf **nicht** wahrscheinlicher.

## Übungen

1. Ein idealer Würfel wird geworfen. Wie groß ist die Wahrscheinlichkeit für eine Primzahl?

<details>
<summary>Lösung</summary>

Die Primzahlen unter $1, \dots, 6$ sind $2, 3, 5$. Also $P = \frac{3}{6} = \frac{1}{2}$.

</details>

2. In einer Urne liegen 4 rote und 6 weiße Kugeln. Wie wahrscheinlich ist es, dass eine zufällig gezogene Kugel nicht rot ist?

<details>
<summary>Lösung</summary>

$P(\text{rot}) = \frac{4}{10}$, also $P(\text{nicht rot}) = 1 - \frac{4}{10} = \frac{6}{10} = \frac{3}{5}$.

</details>

3. Zwei Würfel werden geworfen. Wie groß ist die Wahrscheinlichkeit für die Augensumme 10?

<details>
<summary>Lösung</summary>

Günstig sind $(4,6), (5,5), (6,4)$ – drei von 36 gleich wahrscheinlichen Paaren. Also $P = \frac{3}{36} = \frac{1}{12}$.

</details>

4. Aus den Zahlen 1 bis 20 wird eine zufällig ausgewählt. Wie wahrscheinlich ist es, dass sie durch 3 oder durch 5 teilbar ist?

<details>
<summary>Lösung</summary>

Durch 3 teilbar: $3, 6, 9, 12, 15, 18$ (6 Zahlen). Durch 5 teilbar: $5, 10, 15, 20$ (4 Zahlen). Beides: nur die $15$. Mit dem Additionssatz: $P = \frac{6}{20} + \frac{4}{20} - \frac{1}{20} = \frac{9}{20}$.

</details>
