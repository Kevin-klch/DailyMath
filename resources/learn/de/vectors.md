---
title: Vektoren
category: linear-algebra
order: 10
level: 2
summary: Pfeile mit Länge und Richtung – wie man Vektoren aufschreibt, addiert, vervielfacht und ihren Betrag berechnet.
related: dot-product, lines-and-planes, pythagorean-theorem
---

Ein **Vektor** beschreibt eine Verschiebung: wie weit und in welche Richtung. Während eine gewöhnliche Zahl nur eine Größe hat, besitzt ein Vektor eine Länge *und* eine Richtung. Vektoren sind das Grundwerkzeug der analytischen Geometrie und begegnen dir in der Physik ständig, etwa bei Kräften und Geschwindigkeiten.

## Was ist ein Vektor?

Stell dir einen Pfeil vor. Wo du ihn hinzeichnest, ist egal – alle Pfeile mit gleicher Länge und gleicher Richtung stellen **denselben** Vektor dar. Es kommt nur auf die Verschiebung vom Anfangs- zum Endpunkt an.

Im Koordinatensystem schreibt man einen Vektor als **Spalte** seiner Koordinaten:

$$\vec{v} = \begin{pmatrix} 3 \\ -2 \end{pmatrix} \quad \text{(in der Ebene)}, \qquad \vec{w} = \begin{pmatrix} 1 \\ 4 \\ 2 \end{pmatrix} \quad \text{(im Raum)}$$

Der Vektor $\vec{v}$ bedeutet: „3 Schritte in $x$-Richtung und 2 Schritte zurück in $y$-Richtung“. Beim **Nullvektor** $\vec{0}$ sind alle Koordinaten $0$ – er beschreibt gar keine Verschiebung.

### Ortsvektoren und Verbindungsvektoren

Der Vektor vom Ursprung $O$ zu einem Punkt $P(p_1 \mid p_2 \mid p_3)$ heißt **Ortsvektor** von $P$. Seine Koordinaten sind einfach die Koordinaten des Punktes.

Den Vektor von einem Punkt $A$ zu einem Punkt $B$ erhältst du, indem du die Koordinaten subtrahierst – „Spitze minus Fuß“:

$$\overrightarrow{AB} = \vec{b} - \vec{a} = \begin{pmatrix} b_1 - a_1 \\ b_2 - a_2 \\ b_3 - a_3 \end{pmatrix}$$

> **Merke:** Der Verbindungsvektor von $A$ nach $B$ ist immer „Endpunkt minus Anfangspunkt“: $\overrightarrow{AB} = \vec{b} - \vec{a}$.

## Rechnen mit Vektoren

### Addition und Subtraktion

Vektoren werden **koordinatenweise** addiert und subtrahiert:

$$\begin{pmatrix} 2 \\ -1 \\ 3 \end{pmatrix} + \begin{pmatrix} 1 \\ 4 \\ -2 \end{pmatrix} = \begin{pmatrix} 3 \\ 3 \\ 1 \end{pmatrix}$$

Anschaulich hängst du den zweiten Pfeil an die Spitze des ersten. Der Summenvektor zeigt vom Anfang des ersten bis zur Spitze des zweiten Pfeils. Zwei Verschiebungen nacheinander ergeben also dasselbe wie die Verschiebung um den Summenvektor.

### Vervielfachen mit einer Zahl

Multipliziert man einen Vektor mit einer reellen Zahl $r$ (einem **Skalar**), wird jede Koordinate mit $r$ multipliziert:

$$r \cdot \begin{pmatrix} v_1 \\ v_2 \\ v_3 \end{pmatrix} = \begin{pmatrix} r v_1 \\ r v_2 \\ r v_3 \end{pmatrix}$$

Für $r > 0$ behält der Pfeil seine Richtung und wird um den Faktor $r$ gestreckt. Für $r < 0$ dreht er sich zusätzlich um. Der **Gegenvektor** $-\vec{v}$ ist genauso lang wie $\vec{v}$, zeigt aber in die entgegengesetzte Richtung.

### Beispiel 1

Gegeben sind $\vec{a} = \begin{pmatrix} 2 \\ -1 \\ 3 \end{pmatrix}$ und $\vec{b} = \begin{pmatrix} 1 \\ 4 \\ -2 \end{pmatrix}$. Berechne $2\vec{a} - \vec{b}$.

$$2\vec{a} - \vec{b} = \begin{pmatrix} 4 \\ -2 \\ 6 \end{pmatrix} - \begin{pmatrix} 1 \\ 4 \\ -2 \end{pmatrix} = \begin{pmatrix} 3 \\ -6 \\ 8 \end{pmatrix}$$

## Der Betrag eines Vektors

Die Länge eines Vektors heißt **Betrag** und wird $|\vec{v}|$ geschrieben. Sie folgt aus dem Satz des Pythagoras, der im Raum zweimal angewendet wird:

$$\left| \begin{pmatrix} v_1 \\ v_2 \\ v_3 \end{pmatrix} \right| = \sqrt{v_1^2 + v_2^2 + v_3^2}$$

> **Merke:** Koordinaten quadrieren, addieren, Wurzel ziehen. Der Abstand zweier Punkte $A$ und $B$ ist der Betrag $|\overrightarrow{AB}|$.

Ein Vektor mit dem Betrag $1$ heißt **Einheitsvektor**. Den Einheitsvektor in Richtung von $\vec{v}$ erhältst du, indem du durch den Betrag teilst: $\vec{v}_0 = \frac{1}{|\vec{v}|} \cdot \vec{v}$.

### Beispiel 2

Berechne den Abstand der Punkte $A(1 \mid 2 \mid -1)$ und $B(4 \mid 6 \mid -1)$.

$$\overrightarrow{AB} = \begin{pmatrix} 4 - 1 \\ 6 - 2 \\ -1 - (-1) \end{pmatrix} = \begin{pmatrix} 3 \\ 4 \\ 0 \end{pmatrix}, \qquad |\overrightarrow{AB}| = \sqrt{9 + 16 + 0} = 5$$

### Beispiel 3

Bestimme den Einheitsvektor in Richtung von $\vec{v} = \begin{pmatrix} 2 \\ -1 \\ 2 \end{pmatrix}$.

Der Betrag ist $\sqrt{4 + 1 + 4} = 3$, also

$$\vec{v}_0 = \frac{1}{3} \begin{pmatrix} 2 \\ -1 \\ 2 \end{pmatrix} = \begin{pmatrix} \frac{2}{3} \\ -\frac{1}{3} \\ \frac{2}{3} \end{pmatrix}$$

## Parallele Vektoren und Mittelpunkte

Zwei Vektoren heißen **kollinear** (parallel), wenn einer ein Vielfaches des anderen ist: $\vec{u} = r \cdot \vec{v}$ für eine Zahl $r$. Zum Prüfen bildest du für jede Koordinate den Quotienten – er muss überall gleich sein.

Zum Beispiel ist $\begin{pmatrix} 2 \\ -4 \\ 6 \end{pmatrix} = -2 \cdot \begin{pmatrix} -1 \\ 2 \\ -3 \end{pmatrix}$. Die beiden Vektoren sind also parallel, zeigen aber in entgegengesetzte Richtungen.

Der **Mittelpunkt** $M$ einer Strecke $AB$ hat den Ortsvektor $\vec{m} = \frac{1}{2}(\vec{a} + \vec{b})$ – man bildet also den Mittelwert der Koordinaten. Für $A(1 \mid 2 \mid -1)$ und $B(5 \mid 0 \mid 3)$ ergibt sich $M(3 \mid 1 \mid 1)$.

## Typische Fehler

- $\overrightarrow{AB}$ als „Anfang minus Ende“ berechnen – dann erhält man den Gegenvektor $\overrightarrow{BA}$.
- Beim Vervielfachen nicht *jede* Koordinate mit dem Skalar multiplizieren.
- Den Betrag als $v_1 + v_2 + v_3$ statt $\sqrt{v_1^2 + v_2^2 + v_3^2}$ berechnen oder vergessen, dass negative Koordinaten beim Quadrieren positiv werden.
- Punkt und Vektor verwechseln: Ein Punkt ist ein Ort, ein Vektor eine Verschiebung.
- Vektoren für parallel halten, obwohl nur einige Quotienten übereinstimmen.

## Übungen

1. Gegeben sind $\vec{u} = \begin{pmatrix} 3 \\ -2 \end{pmatrix}$ und $\vec{v} = \begin{pmatrix} -1 \\ 5 \end{pmatrix}$. Berechne $\vec{u} + \vec{v}$ und $3\vec{u} - \vec{v}$.

<details>
<summary>Lösung</summary>

$\vec{u} + \vec{v} = \begin{pmatrix} 2 \\ 3 \end{pmatrix}$ und $3\vec{u} - \vec{v} = \begin{pmatrix} 9 \\ -6 \end{pmatrix} - \begin{pmatrix} -1 \\ 5 \end{pmatrix} = \begin{pmatrix} 10 \\ -11 \end{pmatrix}$.

</details>

2. Berechne den Abstand der Punkte $P(2 \mid -1 \mid 4)$ und $Q(5 \mid 3 \mid 4)$.

<details>
<summary>Lösung</summary>

$\overrightarrow{PQ} = \begin{pmatrix} 3 \\ 4 \\ 0 \end{pmatrix}$, also $|\overrightarrow{PQ}| = \sqrt{9 + 16 + 0} = \sqrt{25} = 5$.

</details>

3. Bestimme den Einheitsvektor in Richtung von $\begin{pmatrix} 1 \\ 2 \\ 2 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

Der Betrag ist $\sqrt{1 + 4 + 4} = 3$. Der Einheitsvektor lautet $\begin{pmatrix} \frac{1}{3} \\ \frac{2}{3} \\ \frac{2}{3} \end{pmatrix}$.

</details>

4. Sind $\begin{pmatrix} 3 \\ -6 \\ 9 \end{pmatrix}$ und $\begin{pmatrix} -2 \\ 4 \\ -6 \end{pmatrix}$ parallel?

<details>
<summary>Lösung</summary>

Quotienten der Koordinaten: $\frac{3}{-2} = -\frac{3}{2}$, $\frac{-6}{4} = -\frac{3}{2}$, $\frac{9}{-6} = -\frac{3}{2}$. Der Quotient ist überall gleich, also ja: Der erste Vektor ist das $-\frac{3}{2}$-Fache des zweiten.

</details>

5. $A(1 \mid 0 \mid 2)$, $B(4 \mid 1 \mid 2)$ und $C(5 \mid 4 \mid 3)$ sind drei Eckpunkte des Parallelogramms $ABCD$. Bestimme $D$.

<details>
<summary>Lösung</summary>

Im Parallelogramm gilt $\overrightarrow{AD} = \overrightarrow{BC} = \begin{pmatrix} 1 \\ 3 \\ 1 \end{pmatrix}$. Also ist $\vec{d} = \vec{a} + \overrightarrow{BC} = \begin{pmatrix} 2 \\ 3 \\ 3 \end{pmatrix}$, d. h. $D(2 \mid 3 \mid 3)$. Probe: $\overrightarrow{DC} = \begin{pmatrix} 3 \\ 1 \\ 0 \end{pmatrix} = \overrightarrow{AB}$.

</details>
