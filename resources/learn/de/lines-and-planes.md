---
title: Geraden und Ebenen im Raum
category: linear-algebra
order: 30
level: 3
summary: Geraden und Ebenen im Raum mit Vektoren beschreiben, zwischen den Darstellungsformen wechseln und Schnittpunkte berechnen.
related: vectors, dot-product, gaussian-elimination, systems-of-equations
---

Mit Vektoren lassen sich Geraden und Ebenen im dreidimensionalen Raum exakt beschreiben. Jeder Punkt des Objekts wird erreicht, indem man von einem festen Punkt aus in eine oder zwei Richtungen geht. So kannst du typische Geometriefragen rechnerisch beantworten: Liegt ein Punkt auf einer Geraden? Schneiden sich zwei Geraden? Wo durchstößt eine Gerade eine Ebene?

## Geraden in Parameterform

Eine Gerade ist durch einen Punkt und eine Richtung festgelegt. Ist $\vec{p}$ der Ortsvektor eines Punktes der Geraden (der **Stützvektor**) und $\vec{u} \ne \vec{0}$ ein **Richtungsvektor**, so hat jeder Punkt $X$ der Geraden den Ortsvektor

$$g: \vec{x} = \vec{p} + t \cdot \vec{u}, \qquad t \in \mathbb{R}$$

Jeder Wert des **Parameters** $t$ liefert genau einen Punkt: $t = 0$ den Stützpunkt, $t = 1$ den Punkt einen „Schritt“ weiter, negative Werte von $t$ führen in die Gegenrichtung.

Sind zwei Punkte $A$ und $B$ gegeben, nimmt man $\vec{a}$ als Stützvektor und $\overrightarrow{AB}$ als Richtungsvektor.

### Beispiel 1

Gerade durch $A(1 \mid 2 \mid 0)$ und $B(3 \mid 1 \mid 4)$. Liegt $P(7 \mid -1 \mid 12)$ auf ihr?

Der Richtungsvektor ist $\overrightarrow{AB} = \begin{pmatrix} 2 \\ -1 \\ 4 \end{pmatrix}$, also

$$g: \vec{x} = \begin{pmatrix} 1 \\ 2 \\ 0 \end{pmatrix} + t \begin{pmatrix} 2 \\ -1 \\ 4 \end{pmatrix}$$

Punktprobe: Aus der ersten Zeile $1 + 2t = 7$ folgt $t = 3$. Mit $t = 3$ gilt auch $2 - 3 = -1$ und $0 + 12 = 12$. Alle Zeilen passen, $P$ liegt also auf $g$.

> **Merke:** Ein Punkt liegt genau dann auf einer Geraden, wenn **ein und derselbe** Parameterwert **alle** Koordinatengleichungen erfüllt.

## Lagebeziehungen zweier Geraden

Im Raum gibt es vier Möglichkeiten:

1. **Identisch** – die Richtungsvektoren sind kollinear und ein Punkt der einen Geraden liegt auf der anderen.
2. **Echt parallel** – die Richtungsvektoren sind kollinear, aber die Geraden haben keinen gemeinsamen Punkt.
3. **Schneidend** – die Richtungsvektoren sind nicht kollinear und die Geraden treffen sich in einem Punkt.
4. **Windschief** – die Richtungsvektoren sind nicht kollinear, trotzdem treffen sich die Geraden nie. Diesen Fall gibt es in der Ebene nicht.

Um zwischen 3 und 4 zu unterscheiden, setzt man die beiden Geradengleichungen gleich und löst das entstehende Gleichungssystem nach beiden Parametern.

### Beispiel 2

$$g: \vec{x} = \begin{pmatrix} 1 \\ 0 \\ 2 \end{pmatrix} + s \begin{pmatrix} 1 \\ 1 \\ 0 \end{pmatrix}, \qquad h: \vec{x} = \begin{pmatrix} 3 \\ 1 \\ 3 \end{pmatrix} + t \begin{pmatrix} 0 \\ 1 \\ -1 \end{pmatrix}$$

Die Richtungsvektoren sind keine Vielfachen voneinander. Gleichsetzen liefert zeilenweise:

- $1 + s = 3$, also $s = 2$
- $s = 1 + t$, also $t = 1$
- $2 = 3 - t$, das ist für $t = 1$ erfüllt

Das System ist lösbar, die Geraden schneiden sich. Einsetzen von $s = 2$ in $g$ ergibt den Schnittpunkt $S(3 \mid 2 \mid 2)$. Hätte die letzte Zeile einen Widerspruch ergeben, wären die Geraden windschief.

## Ebenen

### Parameterform

Eine Ebene braucht einen Punkt und **zwei** nicht kollineare Spannvektoren:

$$E: \vec{x} = \vec{p} + r \cdot \vec{u} + s \cdot \vec{v}, \qquad r, s \in \mathbb{R}$$

### Normalenform und Koordinatenform

Viel praktischer ist die Beschreibung mit einem **Normalenvektor** $\vec{n}$, der senkrecht auf der Ebene steht. Ein Punkt $X$ liegt genau dann in der Ebene, wenn $\overrightarrow{PX}$ senkrecht auf $\vec{n}$ steht:

$$E: \vec{n} \cdot (\vec{x} - \vec{p}) = 0$$

Ausmultiplizieren ergibt die **Koordinatenform**

$$E: n_1 x + n_2 y + n_3 z = d \qquad \text{mit } d = \vec{n} \cdot \vec{p}$$

> **Merke:** Die Vorfaktoren von $x$, $y$ und $z$ in der Koordinatenform sind genau die Koordinaten eines Normalenvektors der Ebene.

### Beispiel 3

Bestimme eine Koordinatenform der Ebene durch $A(1 \mid 0 \mid 0)$, $B(0 \mid 2 \mid 0)$ und $C(0 \mid 0 \mid 3)$.

1. Spannvektoren: $\overrightarrow{AB} = \begin{pmatrix} -1 \\ 2 \\ 0 \end{pmatrix}$, $\overrightarrow{AC} = \begin{pmatrix} -1 \\ 0 \\ 3 \end{pmatrix}$.
2. Der Normalenvektor steht auf beiden senkrecht: $-n_1 + 2n_2 = 0$ und $-n_1 + 3n_3 = 0$. Mit $n_1 = 6$ folgt $n_2 = 3$ und $n_3 = 2$.
3. $d = \vec{n} \cdot \vec{a} = 6$, also $E: 6x + 3y + 2z = 6$.

Probe: Auch $B$ und $C$ ergeben jeweils $6$.

## Schnitt von Gerade und Ebene

Man setzt die Koordinaten des allgemeinen Geradenpunkts in die Koordinatenform ein und löst nach dem Parameter auf.

### Beispiel 4

$g: \vec{x} = \begin{pmatrix} 1 \\ 2 \\ 3 \end{pmatrix} + t \begin{pmatrix} 1 \\ 1 \\ 1 \end{pmatrix}$ und $E: 2x - y + z = 7$.

$$2(1 + t) - (2 + t) + (3 + t) = 7 \quad \Rightarrow \quad 3 + 2t = 7 \quad \Rightarrow \quad t = 2$$

Der Schnittpunkt ist $S(3 \mid 4 \mid 5)$, Probe: $6 - 4 + 5 = 7$.

Fällt der Parameter beim Einsetzen weg, verläuft die Gerade parallel zur Ebene: Eine falsche Aussage wie $0 = 4$ bedeutet keinen gemeinsamen Punkt, eine wahre Aussage wie $0 = 0$ bedeutet, dass die Gerade in der Ebene liegt. Man erkennt das schon vorher an $\vec{n} \cdot \vec{u} = 0$.

## Abstand eines Punktes von einer Ebene

Teilt man die Koordinatenform durch den Betrag des Normalenvektors, erhält man die **Hessesche Normalform**. Der Abstand von $Q(q_1 \mid q_2 \mid q_3)$ zur Ebene $E: n_1 x + n_2 y + n_3 z = d$ ist

$$d(Q, E) = \frac{|n_1 q_1 + n_2 q_2 + n_3 q_3 - d|}{|\vec{n}|}$$

Für $Q(3 \mid 0 \mid 3)$ und $E: 2x - y + 2z = 3$ ist $|\vec{n}| = 3$, der Abstand beträgt also $\frac{|6 - 0 + 6 - 3|}{3} = 3$.

## Typische Fehler

- Bei der Punktprobe für jede Zeile einen anderen Parameterwert akzeptieren.
- Beim Gleichsetzen zweier Geraden für beide Parameter denselben Buchstaben verwenden.
- Zwei Geraden im Raum für schneidend halten, nur weil sie nicht parallel sind – sie können windschief sein.
- Nach dem Normalenvektor vergessen, $d$ zu berechnen, oder einen Vektor nehmen, der nur auf einem Spannvektor senkrecht steht.
- Bei Gerade und Ebene „parallel“ schließen, ohne zu prüfen, ob die Gerade sogar in der Ebene liegt.

## Übungen

1. Liegt $C(8 \mid 9 \mid 1)$ auf der Geraden durch $A(2 \mid 0 \mid 1)$ und $B(4 \mid 3 \mid 1)$?

<details>
<summary>Lösung</summary>

$g: \vec{x} = \begin{pmatrix} 2 \\ 0 \\ 1 \end{pmatrix} + t \begin{pmatrix} 2 \\ 3 \\ 0 \end{pmatrix}$. Aus $2 + 2t = 8$ folgt $t = 3$; damit gilt auch $3t = 9$ und $1 = 1$. Also liegt $C$ auf der Geraden.

</details>

2. Gib die Ebene durch $P(1 \mid 2 \mid 3)$ mit dem Normalenvektor $\begin{pmatrix} 2 \\ -1 \\ 4 \end{pmatrix}$ in Koordinatenform an.

<details>
<summary>Lösung</summary>

$d = 2 \cdot 1 - 1 \cdot 2 + 4 \cdot 3 = 12$, also $E: 2x - y + 4z = 12$.

</details>

3. Berechne den Schnittpunkt von $g: \vec{x} = \begin{pmatrix} 0 \\ 1 \\ 2 \end{pmatrix} + t \begin{pmatrix} 1 \\ 2 \\ -1 \end{pmatrix}$ mit $E: x + y + z = 9$.

<details>
<summary>Lösung</summary>

$t + (1 + 2t) + (2 - t) = 9$ ergibt $2t + 3 = 9$, also $t = 3$. Der Schnittpunkt ist $S(3 \mid 7 \mid -1)$, Probe: $3 + 7 - 1 = 9$.

</details>

4. Untersuche die Lage von $g: \vec{x} = \begin{pmatrix} 1 \\ 0 \\ 0 \end{pmatrix} + s \begin{pmatrix} 2 \\ 1 \\ 1 \end{pmatrix}$ und $h: \vec{x} = \begin{pmatrix} 0 \\ 1 \\ 0 \end{pmatrix} + t \begin{pmatrix} 4 \\ 2 \\ 2 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

Der Richtungsvektor von $h$ ist das Doppelte des Richtungsvektors von $g$, die Geraden sind also parallel oder identisch. Punktprobe mit $(0 \mid 1 \mid 0)$ in $g$: Aus $1 + 2s = 0$ folgt $s = -\frac{1}{2}$, aus der zweiten Zeile aber $s = 1$ – Widerspruch. Die Geraden sind echt parallel.

</details>

5. Bestimme eine Koordinatenform der Ebene durch $A(1 \mid 1 \mid 0)$, $B(3 \mid 1 \mid 2)$ und $C(1 \mid 2 \mid 1)$.

<details>
<summary>Lösung</summary>

$\overrightarrow{AB} = \begin{pmatrix} 2 \\ 0 \\ 2 \end{pmatrix}$, $\overrightarrow{AC} = \begin{pmatrix} 0 \\ 1 \\ 1 \end{pmatrix}$. Aus $2n_1 + 2n_3 = 0$ und $n_2 + n_3 = 0$ folgt mit $n_3 = -1$: $\vec{n} = \begin{pmatrix} 1 \\ 1 \\ -1 \end{pmatrix}$. Mit $d = 1 + 1 - 0 = 2$ ergibt sich $E: x + y - z = 2$. Probe: $B$ liefert $3 + 1 - 2 = 2$, $C$ liefert $1 + 2 - 1 = 2$.

</details>
