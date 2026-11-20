---
title: Matrizen
category: linear-algebra
order: 40
level: 2
summary: Rechteckige Zahlenschemata – wie Matrizen aufgebaut sind, wie man sie addiert, mit einer Zahl multipliziert und transponiert.
related: matrix-multiplication, vectors, systems-of-equations, determinants
---

Eine **Matrix** ist ein rechteckiges Zahlenschema aus Zeilen und Spalten. Matrizen speichern viele zusammengehörige Daten auf kompakte Weise – eine Preisliste, die Koeffizienten eines Gleichungssystems oder eine geometrische Abbildung. Wer die Grundbegriffe und Rechenregeln kennt, kann mit ganzen Tabellen auf einmal rechnen statt mit jeder Zahl einzeln.

## Was ist eine Matrix?

Eine Matrix mit $m$ Zeilen und $n$ Spalten heißt $m \times n$-Matrix (gesprochen „$m$ Kreuz $n$“). Die Zahlen darin sind ihre **Einträge** oder Elemente. Der Eintrag in Zeile $i$ und Spalte $j$ wird $a_{ij}$ geschrieben – immer **zuerst die Zeile, dann die Spalte**.

$$A = \begin{pmatrix} 1 & -2 & 3 \\ 0 & 4 & 5 \end{pmatrix}$$

Das ist eine $2 \times 3$-Matrix: zwei Zeilen, drei Spalten. Zum Beispiel ist $a_{12} = -2$ (Zeile 1, Spalte 2) und $a_{23} = 5$ (Zeile 2, Spalte 3).

> **Merke:** Das Format einer Matrix wird immer als „Zeilen × Spalten“ angegeben, und auch beim Index $a_{ij}$ steht $i$ für die Zeile und $j$ für die Spalte. Eselsbrücke: „Zeilen zuerst, Spalten später“.

Auch ein Vektor ist eine Matrix: Ein Spaltenvektor mit drei Koordinaten ist eine $3 \times 1$-Matrix.

## Besondere Matrizen

- **Quadratische Matrix:** gleich viele Zeilen wie Spalten ($n \times n$). Die Einträge $a_{11}, a_{22}, \ldots, a_{nn}$ bilden die **Hauptdiagonale**.
- **Nullmatrix** $0$: alle Einträge sind $0$.
- **Einheitsmatrix** $E$ (auch $I$ geschrieben): Einsen auf der Hauptdiagonale, sonst Nullen. Im $3 \times 3$-Fall:

$$E = \begin{pmatrix} 1 & 0 & 0 \\ 0 & 1 & 0 \\ 0 & 0 & 1 \end{pmatrix}$$

- **Diagonalmatrix:** Nur auf der Hauptdiagonale dürfen Einträge ungleich null stehen.
- **Obere Dreiecksmatrix:** Alle Einträge unterhalb der Hauptdiagonale sind $0$.

## Rechnen mit Matrizen

### Gleichheit

Zwei Matrizen sind gleich, wenn sie dasselbe Format haben und **alle** einander entsprechenden Einträge übereinstimmen.

### Addition und Subtraktion

Addieren kann man nur Matrizen **gleichen Formats**. Dabei wird eintragsweise addiert:

$$\begin{pmatrix} 1 & -2 & 3 \\ 0 & 4 & 5 \end{pmatrix} + \begin{pmatrix} 2 & 0 & -1 \\ 3 & 1 & 2 \end{pmatrix} = \begin{pmatrix} 3 & -2 & 2 \\ 3 & 5 & 7 \end{pmatrix}$$

Die Subtraktion funktioniert genauso. Die Matrizenaddition ist kommutativ ($A + B = B + A$) und assoziativ.

### Vervielfachen mit einer Zahl

Eine Zahl $r$ wird mit **jedem** Eintrag multipliziert:

$$3 \cdot \begin{pmatrix} 1 & -2 & 3 \\ 0 & 4 & 5 \end{pmatrix} = \begin{pmatrix} 3 & -6 & 9 \\ 0 & 12 & 15 \end{pmatrix}$$

### Beispiel 1

Gegeben sind $A = \begin{pmatrix} 1 & -2 & 3 \\ 0 & 4 & 5 \end{pmatrix}$ und $B = \begin{pmatrix} 2 & 0 & -1 \\ 3 & 1 & 2 \end{pmatrix}$. Berechne $2A - B$.

$$2A - B = \begin{pmatrix} 2 & -4 & 6 \\ 0 & 8 & 10 \end{pmatrix} - \begin{pmatrix} 2 & 0 & -1 \\ 3 & 1 & 2 \end{pmatrix} = \begin{pmatrix} 0 & -4 & 7 \\ -3 & 7 & 8 \end{pmatrix}$$

> **Merke:** Addition, Subtraktion und Vervielfachen mit einer Zahl laufen eintragsweise ab – für die Addition müssen beide Matrizen dasselbe Format haben.

## Die transponierte Matrix

Beim **Transponieren** werden aus den Zeilen Spalten. Die Transponierte von $A$ heißt $A^T$. Aus einer $m \times n$-Matrix wird eine $n \times m$-Matrix, und der Eintrag $a_{ij}$ wandert an die Stelle $ji$:

$$A = \begin{pmatrix} 1 & -2 & 3 \\ 0 & 4 & 5 \end{pmatrix} \quad \Rightarrow \quad A^T = \begin{pmatrix} 1 & 0 \\ -2 & 4 \\ 3 & 5 \end{pmatrix}$$

Zweimal transponieren führt zurück: $(A^T)^T = A$. Eine quadratische Matrix mit $A^T = A$ heißt **symmetrisch** – sie ist an der Hauptdiagonale gespiegelt, etwa $\begin{pmatrix} 2 & 7 \\ 7 & -1 \end{pmatrix}$.

## Wofür man Matrizen braucht

### Beispiel 2: Tabellen

Eine Bäckerei verkauft in zwei Filialen Brote und Brötchen. Die Verkaufszahlen von Montag und Dienstag:

$$M = \begin{pmatrix} 40 & 120 \\ 25 & 90 \end{pmatrix}, \qquad D = \begin{pmatrix} 35 & 100 \\ 30 & 110 \end{pmatrix}$$

(Zeilen: Filialen, Spalten: Brote und Brötchen). Der Absatz beider Tage zusammen ist $M + D = \begin{pmatrix} 75 & 220 \\ 55 & 200 \end{pmatrix}$. Steigt der Absatz nächste Woche um 10 %, erwartet man am Montag $1{,}1 \cdot M = \begin{pmatrix} 44 & 132 \\ 27{,}5 & 99 \end{pmatrix}$.

### Beispiel 3: Gleichungssysteme

Die Koeffizienten eines linearen Gleichungssystems bilden seine **Koeffizientenmatrix**. Für

$$2x + 3y = 7, \qquad x - y = 1$$

lautet sie $\begin{pmatrix} 2 & 3 \\ 1 & -1 \end{pmatrix}$. Verfahren wie das Gauß-Verfahren arbeiten direkt mit diesem Schema.

## Typische Fehler

- Zeilen und Spalten verwechseln: Eine $2 \times 3$-Matrix hat 2 Zeilen, nicht 2 Spalten.
- $a_{23}$ als „Spalte 2, Zeile 3“ lesen.
- Matrizen unterschiedlichen Formats addieren wollen.
- Beim Vervielfachen nur einige Einträge (z. B. nur die erste Zeile) mit der Zahl multiplizieren.
- Glauben, dass sich beim Transponieren das Format nicht ändert – Zeilen- und Spaltenzahl werden vertauscht.

## Übungen

1. Gib das Format von $M = \begin{pmatrix} 4 & 0 & -1 \\ 2 & 7 & 3 \end{pmatrix}$ sowie die Einträge $m_{21}$ und $m_{13}$ an.

<details>
<summary>Lösung</summary>

$M$ ist eine $2 \times 3$-Matrix. $m_{21} = 2$ (Zeile 2, Spalte 1) und $m_{13} = -1$ (Zeile 1, Spalte 3).

</details>

2. Berechne $\begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix} + \begin{pmatrix} 5 & -2 \\ 0 & 1 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

Eintragsweise: $\begin{pmatrix} 6 & 0 \\ 3 & 5 \end{pmatrix}$.

</details>

3. Berechne $3 \begin{pmatrix} 2 & -1 \\ 0 & 4 \end{pmatrix} - 2 \begin{pmatrix} 1 & 1 \\ 3 & -2 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

$\begin{pmatrix} 6 & -3 \\ 0 & 12 \end{pmatrix} - \begin{pmatrix} 2 & 2 \\ 6 & -4 \end{pmatrix} = \begin{pmatrix} 4 & -5 \\ -6 & 16 \end{pmatrix}$.

</details>

4. Bestimme die Transponierte von $\begin{pmatrix} 1 & 2 & 3 \\ 4 & 5 & 6 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

Aus Zeilen werden Spalten: $\begin{pmatrix} 1 & 4 \\ 2 & 5 \\ 3 & 6 \end{pmatrix}$, eine $3 \times 2$-Matrix.

</details>

5. Bestimme $x$ und $y$ so, dass $\begin{pmatrix} x + 1 & 4 \\ 2 & 2y \end{pmatrix} = \begin{pmatrix} 3 & 4 \\ 2 & -10 \end{pmatrix}$ gilt.

<details>
<summary>Lösung</summary>

Einträge vergleichen: $x + 1 = 3$, also $x = 2$, und $2y = -10$, also $y = -5$.

</details>
