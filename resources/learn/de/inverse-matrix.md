---
title: Inverse Matrix
category: linear-algebra
order: 70
level: 3
summary: Die Matrix, die eine andere rückgängig macht – wann sie existiert, die Formel für 2×2-Matrizen und das Gauß-Jordan-Verfahren für größere.
related: determinants, matrix-multiplication, gaussian-elimination, matrices
---

Bei Zahlen ist das Teilen durch $a$ dasselbe wie das Multiplizieren mit dem Kehrwert $\frac{1}{a}$. Durch Matrizen kann man nicht teilen, aber viele quadratische Matrizen haben einen Partner, der die Rolle des Kehrwerts übernimmt: die **inverse Matrix**. Mit ihr löst du Gleichungssysteme und Matrizengleichungen in einem Schritt und machst Abbildungen rückgängig.

## Definition

Die Inverse einer quadratischen Matrix $A$ ist die Matrix $A^{-1}$ mit

$$A \cdot A^{-1} = A^{-1} \cdot A = E$$

wobei $E$ die Einheitsmatrix gleicher Größe ist. So wie $a \cdot \frac{1}{a} = 1$ gilt, ergibt eine Matrix mal ihre Inverse die „Eins“ der Matrizen.

Nicht jede Matrix besitzt eine Inverse. Eine Matrix mit Inverse heißt **invertierbar** (oder regulär), sonst **singulär**.

> **Merke:** Eine quadratische Matrix $A$ ist genau dann invertierbar, wenn ihre Determinante nicht null ist: $\det A \ne 0$.

Nur quadratische Matrizen können eine Inverse haben, und wenn es sie gibt, ist sie eindeutig.

## Die Formel für 2×2-Matrizen

Für $2 \times 2$-Matrizen gibt es eine kurze Formel: Einträge der Hauptdiagonale vertauschen, bei den beiden anderen das Vorzeichen ändern und durch die Determinante teilen.

$$\begin{pmatrix} a & b \\ c & d \end{pmatrix}^{-1} = \frac{1}{ad - bc} \begin{pmatrix} d & -b \\ -c & a \end{pmatrix}$$

> **Merke:** Bei $2 \times 2$-Matrizen: Hauptdiagonale tauschen, Nebendiagonale mit Minus versehen, durch $\det A$ teilen.

### Beispiel 1

$$A = \begin{pmatrix} 3 & 5 \\ 1 & 2 \end{pmatrix}, \qquad \det A = 6 - 5 = 1$$

$$A^{-1} = \frac{1}{1} \begin{pmatrix} 2 & -5 \\ -1 & 3 \end{pmatrix} = \begin{pmatrix} 2 & -5 \\ -1 & 3 \end{pmatrix}$$

Mach immer die Probe durch Multiplizieren:

$$\begin{pmatrix} 3 & 5 \\ 1 & 2 \end{pmatrix} \cdot \begin{pmatrix} 2 & -5 \\ -1 & 3 \end{pmatrix} = \begin{pmatrix} 6 - 5 & -15 + 15 \\ 2 - 2 & -5 + 6 \end{pmatrix} = \begin{pmatrix} 1 & 0 \\ 0 & 1 \end{pmatrix}$$

## Das Gauß-Jordan-Verfahren

Für $3 \times 3$-Matrizen und größere bestimmt man die Inverse mit Zeilenumformungen:

1. Schreibe $A$ und die Einheitsmatrix nebeneinander: $(A \mid E)$.
2. Forme mit Zeilenumformungen (Zeilen vertauschen, eine Zeile mit einer Zahl ungleich null multiplizieren, ein Vielfaches einer Zeile zu einer anderen addieren) die linke Seite in die Einheitsmatrix um.
3. Jede Umformung gilt für die ganze Zeile, also auch für die rechte Seite. Steht links $E$, steht rechts $A^{-1}$: $(E \mid A^{-1})$.

Entsteht links eine Nullzeile, ist die Matrix nicht invertierbar.

### Beispiel 2

Bestimme die Inverse von $A = \begin{pmatrix} 1 & 2 & 1 \\ 0 & 1 & 1 \\ 1 & 2 & 2 \end{pmatrix}$.

$$\left( \begin{array}{ccc|ccc} 1 & 2 & 1 & 1 & 0 & 0 \\ 0 & 1 & 1 & 0 & 1 & 0 \\ 1 & 2 & 2 & 0 & 0 & 1 \end{array} \right)$$

Schritt 1: $\text{III} - \text{I}$ erzeugt unten links eine Null: Zeile III wird zu $(0, 0, 1 \mid -1, 0, 1)$.

Schritt 2: Die dritte Spalte oberhalb der $1$ ausräumen: $\text{II} - \text{III}$ ergibt $(0, 1, 0 \mid 1, 1, -1)$, und $\text{I} - \text{III}$ ergibt $(1, 2, 0 \mid 2, 0, -1)$.

Schritt 3: Die zweite Spalte in Zeile I ausräumen: $\text{I} - 2 \cdot \text{II}$ ergibt $(1, 0, 0 \mid 0, -2, 1)$.

$$\left( \begin{array}{ccc|ccc} 1 & 0 & 0 & 0 & -2 & 1 \\ 0 & 1 & 0 & 1 & 1 & -1 \\ 0 & 0 & 1 & -1 & 0 & 1 \end{array} \right) \quad \Rightarrow \quad A^{-1} = \begin{pmatrix} 0 & -2 & 1 \\ 1 & 1 & -1 \\ -1 & 0 & 1 \end{pmatrix}$$

Probe (erste Zeile von $A$ mal die Spalten von $A^{-1}$): $0 + 2 - 1 = 1$, $\;-2 + 2 + 0 = 0$, $\;1 - 2 + 1 = 0$. Die übrigen Zeilen prüft man genauso.

## Rechenregeln

- $(A^{-1})^{-1} = A$
- $(AB)^{-1} = B^{-1} A^{-1}$ – die Reihenfolge dreht sich um, wie beim Ausziehen von Socken und Schuhen.
- $(A^T)^{-1} = (A^{-1})^T$
- $\det(A^{-1}) = \dfrac{1}{\det A}$
- $(rA)^{-1} = \frac{1}{r} A^{-1}$ für $r \ne 0$

## Gleichungen mit der Inversen lösen

Ein Gleichungssystem $A\vec{x} = \vec{b}$ mit invertierbarer Matrix $A$ hat die eindeutige Lösung

$$\vec{x} = A^{-1} \vec{b}$$

Man erhält sie, indem man beide Seiten **von links** mit $A^{-1}$ multipliziert.

### Beispiel 3

Löse $3x + 5y = 11$, $x + 2y = 4$. Die Koeffizientenmatrix ist das $A$ aus Beispiel 1:

$$\begin{pmatrix} x \\ y \end{pmatrix} = \begin{pmatrix} 2 & -5 \\ -1 & 3 \end{pmatrix} \cdot \begin{pmatrix} 11 \\ 4 \end{pmatrix} = \begin{pmatrix} 22 - 20 \\ -11 + 12 \end{pmatrix} = \begin{pmatrix} 2 \\ 1 \end{pmatrix}$$

Probe: $6 + 5 = 11$ und $2 + 2 = 4$.

Bei einer Matrizengleichung $AX = B$ multipliziert man von links: $X = A^{-1}B$. Bei $XA = B$ multipliziert man von rechts: $X = BA^{-1}$. Weil die Matrizenmultiplikation nicht kommutativ ist, sind diese beiden Ergebnisse meist verschieden.

## Typische Fehler

- Jeden Eintrag einzeln umkehren: $A^{-1}$ ist **nicht** die Matrix der Kehrwerte $\frac{1}{a_{ij}}$.
- In der $2 \times 2$-Formel das Teilen durch die Determinante vergessen oder die falschen Einträge vertauschen.
- $\vec{x} = \vec{b} A^{-1}$ statt $A^{-1}\vec{b}$ schreiben.
- $(AB)^{-1} = A^{-1}B^{-1}$ verwenden, ohne die Reihenfolge umzudrehen.
- Beim Gauß-Jordan-Verfahren eine Umformung nur auf die linke Hälfte anwenden.

## Übungen

1. Bestimme die Inverse von $\begin{pmatrix} 2 & 1 \\ 4 & 3 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

$\det = 6 - 4 = 2$, also ist die Inverse $\frac{1}{2} \begin{pmatrix} 3 & -1 \\ -4 & 2 \end{pmatrix} = \begin{pmatrix} \frac{3}{2} & -\frac{1}{2} \\ -2 & 1 \end{pmatrix}$. Probe: $\begin{pmatrix} 2 & 1 \\ 4 & 3 \end{pmatrix} \cdot \begin{pmatrix} \frac{3}{2} & -\frac{1}{2} \\ -2 & 1 \end{pmatrix} = \begin{pmatrix} 1 & 0 \\ 0 & 1 \end{pmatrix}$.

</details>

2. Ist $\begin{pmatrix} 6 & 4 \\ 3 & 2 \end{pmatrix}$ invertierbar?

<details>
<summary>Lösung</summary>

$\det = 12 - 12 = 0$, die Matrix ist also singulär und hat keine Inverse.

</details>

3. Löse $2x + y = 5$, $5x + 3y = 13$ mithilfe der inversen Matrix.

<details>
<summary>Lösung</summary>

$A = \begin{pmatrix} 2 & 1 \\ 5 & 3 \end{pmatrix}$ hat $\det A = 1$ und $A^{-1} = \begin{pmatrix} 3 & -1 \\ -5 & 2 \end{pmatrix}$. Damit ist $\begin{pmatrix} x \\ y \end{pmatrix} = A^{-1} \begin{pmatrix} 5 \\ 13 \end{pmatrix} = \begin{pmatrix} 15 - 13 \\ -25 + 26 \end{pmatrix} = \begin{pmatrix} 2 \\ 1 \end{pmatrix}$.

</details>

4. Bestimme die Inverse von $\begin{pmatrix} 1 & 0 & 0 \\ 2 & 1 & 0 \\ 0 & 3 & 1 \end{pmatrix}$ mit dem Gauß-Jordan-Verfahren.

<details>
<summary>Lösung</summary>

$\text{II} - 2 \cdot \text{I}$ ergibt $(0, 1, 0 \mid -2, 1, 0)$. Danach ergibt $\text{III} - 3 \cdot \text{II}$ die Zeile $(0, 0, 1 \mid 6, -3, 1)$. Links steht nun $E$, die Inverse ist also $\begin{pmatrix} 1 & 0 & 0 \\ -2 & 1 & 0 \\ 6 & -3 & 1 \end{pmatrix}$.

</details>

5. Löse die Matrizengleichung $AX = B$ mit $A = \begin{pmatrix} 3 & 5 \\ 1 & 2 \end{pmatrix}$ und $B = \begin{pmatrix} 1 & 0 \\ 2 & 1 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

$X = A^{-1}B = \begin{pmatrix} 2 & -5 \\ -1 & 3 \end{pmatrix} \cdot \begin{pmatrix} 1 & 0 \\ 2 & 1 \end{pmatrix} = \begin{pmatrix} -8 & -5 \\ 5 & 3 \end{pmatrix}$. Probe: $AX = \begin{pmatrix} -24 + 25 & -15 + 15 \\ -8 + 10 & -5 + 6 \end{pmatrix} = B$.

</details>
