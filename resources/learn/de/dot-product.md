---
title: Skalarprodukt und Winkel
category: linear-algebra
order: 20
level: 3
summary: Zwei Vektoren ergeben eine Zahl – damit berechnest du Winkel und prüfst, ob Vektoren senkrecht aufeinander stehen.
related: vectors, lines-and-planes, trigonometry
---

Das **Skalarprodukt** verknüpft zwei Vektoren zu einer einzigen Zahl. Diese Zahl verrät viel über die Lage der Vektoren zueinander: ob sie senkrecht aufeinander stehen, ob sie einen spitzen oder stumpfen Winkel einschließen und wie groß dieser Winkel genau ist. In der analytischen Geometrie ist es deshalb das zentrale Werkzeug für alle Fragen rund um Winkel und Orthogonalität.

## Definition

Für zwei Vektoren im Raum multiplizierst du die zueinander gehörenden Koordinaten und addierst die Ergebnisse:

$$\vec{a} \cdot \vec{b} = \begin{pmatrix} a_1 \\ a_2 \\ a_3 \end{pmatrix} \cdot \begin{pmatrix} b_1 \\ b_2 \\ b_3 \end{pmatrix} = a_1 b_1 + a_2 b_2 + a_3 b_3$$

In der Ebene gibt es nur zwei Summanden: $a_1 b_1 + a_2 b_2$. Wichtig: Das Ergebnis ist eine **Zahl** (ein Skalar), kein Vektor – daher der Name.

### Beispiel 1

$$\begin{pmatrix} 1 \\ 2 \\ 3 \end{pmatrix} \cdot \begin{pmatrix} 4 \\ -5 \\ 6 \end{pmatrix} = 1 \cdot 4 + 2 \cdot (-5) + 3 \cdot 6 = 4 - 10 + 18 = 12$$

## Rechenregeln

Das Skalarprodukt verhält sich in vielem wie die gewohnte Multiplikation:

- **Kommutativgesetz:** $\vec{a} \cdot \vec{b} = \vec{b} \cdot \vec{a}$
- **Distributivgesetz:** $\vec{a} \cdot (\vec{b} + \vec{c}) = \vec{a} \cdot \vec{b} + \vec{a} \cdot \vec{c}$
- **Skalare herausziehen:** $(r\vec{a}) \cdot \vec{b} = r(\vec{a} \cdot \vec{b})$
- **Zusammenhang mit dem Betrag:** $\vec{a} \cdot \vec{a} = a_1^2 + a_2^2 + a_3^2 = |\vec{a}|^2$

Ein „Skalarprodukt aus drei Vektoren“ gibt es nicht, und durch einen Vektor kann man nicht teilen.

## Die geometrische Bedeutung

Das Skalarprodukt lässt sich auch mit den Beträgen der Vektoren und dem eingeschlossenen Winkel $\varphi$ ausdrücken (mit $0^\circ \le \varphi \le 180^\circ$):

$$\vec{a} \cdot \vec{b} = |\vec{a}| \cdot |\vec{b}| \cdot \cos \varphi$$

Das folgt aus dem Kosinussatz im Dreieck, das von $\vec{a}$, $\vec{b}$ und $\vec{a} - \vec{b}$ gebildet wird. Löst man nach dem Kosinus auf, erhält man die Winkelformel:

> **Merke:** Für den Winkel $\varphi$ zwischen zwei Vektoren gilt $\cos \varphi = \dfrac{\vec{a} \cdot \vec{b}}{|\vec{a}| \cdot |\vec{b}|}$.

Weil die Beträge positiv sind, zeigt schon das **Vorzeichen** des Skalarprodukts, welche Art von Winkel vorliegt:

- $\vec{a} \cdot \vec{b} > 0$: spitzer Winkel ($\varphi < 90^\circ$),
- $\vec{a} \cdot \vec{b} = 0$: rechter Winkel,
- $\vec{a} \cdot \vec{b} < 0$: stumpfer Winkel ($\varphi > 90^\circ$).

### Beispiel 2

Berechne den Winkel zwischen $\vec{a} = \begin{pmatrix} 1 \\ 0 \\ 1 \end{pmatrix}$ und $\vec{b} = \begin{pmatrix} 0 \\ 1 \\ 1 \end{pmatrix}$.

1. Skalarprodukt: $\vec{a} \cdot \vec{b} = 0 + 0 + 1 = 1$
2. Beträge: $|\vec{a}| = \sqrt{2}$ und $|\vec{b}| = \sqrt{2}$
3. Kosinus: $\cos \varphi = \frac{1}{\sqrt{2} \cdot \sqrt{2}} = \frac{1}{2}$
4. Winkel: $\varphi = 60^\circ$

### Beispiel 3

Berechne den Winkel zwischen $\vec{a} = \begin{pmatrix} 3 \\ 4 \end{pmatrix}$ und $\vec{b} = \begin{pmatrix} 4 \\ 3 \end{pmatrix}$.

$$\cos \varphi = \frac{12 + 12}{5 \cdot 5} = \frac{24}{25} = 0{,}96 \quad \Rightarrow \quad \varphi \approx 16{,}3^\circ$$

## Orthogonale Vektoren

Der wichtigste Spezialfall: Zwei Vektoren (beide ungleich dem Nullvektor) stehen genau dann senkrecht aufeinander – sie sind **orthogonal** –, wenn ihr Skalarprodukt null ist.

> **Merke:** $\vec{a} \perp \vec{b} \iff \vec{a} \cdot \vec{b} = 0$.

So lässt sich ein rechter Winkel ganz ohne Winkelberechnung nachweisen.

### Beispiel 4

Sind $\begin{pmatrix} 2 \\ 1 \\ -2 \end{pmatrix}$ und $\begin{pmatrix} 1 \\ 2 \\ 2 \end{pmatrix}$ orthogonal? Das Skalarprodukt ist $2 + 2 - 4 = 0$, also ja.

### Beispiel 5

Für welches $t$ steht $\begin{pmatrix} 3 \\ t \\ 1 \end{pmatrix}$ senkrecht auf $\begin{pmatrix} 2 \\ -1 \\ 4 \end{pmatrix}$?

Skalarprodukt gleich null setzen: $6 - t + 4 = 0$, also $t = 10$.

### Einen senkrechten Vektor finden

In der Ebene hilft ein Trick: Koordinaten vertauschen und bei einer das Vorzeichen ändern. Der Vektor $\begin{pmatrix} a_1 \\ a_2 \end{pmatrix}$ steht senkrecht auf $\begin{pmatrix} -a_2 \\ a_1 \end{pmatrix}$, denn $-a_1 a_2 + a_2 a_1 = 0$. Im Raum gibt es zu jedem Vektor unendlich viele senkrechte Vektoren. Einen davon findest du, indem du zwei Koordinaten frei wählst und die dritte aus $\vec{a} \cdot \vec{n} = 0$ bestimmst.

## Winkel in Figuren

Für den Innenwinkel eines Dreiecks $ABC$ am Eckpunkt $A$ nimmst du die beiden Vektoren, die in $A$ **beginnen**: $\overrightarrow{AB}$ und $\overrightarrow{AC}$. Nimmst du stattdessen $\overrightarrow{BA}$, erhältst du den Nebenwinkel $180^\circ - \varphi$.

## Typische Fehler

- Das Ergebnis als Vektor aufschreiben – das Skalarprodukt ist immer eine Zahl.
- In der Winkelformel nur durch einen der beiden Beträge teilen.
- Für einen Innenwinkel Vektoren verwenden, die nicht im selben Eckpunkt beginnen.
- „Orthogonal“ schließen, obwohl das Skalarprodukt nur klein ist – es muss genau $0$ sein.
- Den Taschenrechner im Bogenmaß-Modus lassen, obwohl der Winkel in Grad gesucht ist.

## Übungen

1. Sind $\begin{pmatrix} 2 \\ -3 \\ 1 \end{pmatrix}$ und $\begin{pmatrix} 4 \\ 1 \\ -5 \end{pmatrix}$ orthogonal?

<details>
<summary>Lösung</summary>

$8 - 3 - 5 = 0$. Das Skalarprodukt ist null, die Vektoren sind also orthogonal.

</details>

2. Berechne den Winkel zwischen $\begin{pmatrix} 1 \\ 1 \\ 0 \end{pmatrix}$ und $\begin{pmatrix} 1 \\ 0 \\ 0 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

Skalarprodukt $1$, Beträge $\sqrt{2}$ und $1$. Also ist $\cos \varphi = \frac{1}{\sqrt{2}}$ und $\varphi = 45^\circ$.

</details>

3. Berechne den Winkel zwischen $\begin{pmatrix} 1 \\ 2 \\ 2 \end{pmatrix}$ und $\begin{pmatrix} 2 \\ 2 \\ 1 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

Skalarprodukt $2 + 4 + 2 = 8$, beide Beträge sind $3$. Also ist $\cos \varphi = \frac{8}{9}$ und $\varphi \approx 27{,}3^\circ$.

</details>

4. Bestimme $a$ so, dass $\begin{pmatrix} a \\ 2 \\ -1 \end{pmatrix}$ und $\begin{pmatrix} 3 \\ a \\ 4 \end{pmatrix}$ senkrecht aufeinander stehen.

<details>
<summary>Lösung</summary>

$3a + 2a - 4 = 0$, also $5a = 4$ und $a = \frac{4}{5}$.

</details>

5. Zeige, dass das Dreieck mit $A(1 \mid 0 \mid 0)$, $B(3 \mid 1 \mid 0)$ und $C(2 \mid 3 \mid 0)$ bei $B$ einen rechten Winkel hat.

<details>
<summary>Lösung</summary>

$\overrightarrow{BA} = \begin{pmatrix} -2 \\ -1 \\ 0 \end{pmatrix}$ und $\overrightarrow{BC} = \begin{pmatrix} -1 \\ 2 \\ 0 \end{pmatrix}$. Ihr Skalarprodukt ist $2 - 2 + 0 = 0$, der Winkel bei $B$ beträgt also $90^\circ$.

</details>
