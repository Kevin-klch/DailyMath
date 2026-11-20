---
title: Determinanten
category: linear-algebra
order: 60
level: 3
summary: Eine Zahl, die verrät, ob eine quadratische Matrix invertierbar ist – wie man Determinanten berechnet und was sie geometrisch bedeuten.
related: matrices, inverse-matrix, gaussian-elimination, matrix-multiplication
---

Die **Determinante** ordnet jeder quadratischen Matrix eine einzige Zahl zu. An dieser Zahl lässt sich sofort eine wichtige Frage beantworten: Ist die Matrix invertierbar, und hat das zugehörige Gleichungssystem genau eine Lösung? Geometrisch gibt die Determinante an, wie stark die Matrix Flächen oder Volumen verzerrt.

## Determinante einer 2×2-Matrix

Bei einer $2 \times 2$-Matrix gilt „Hauptdiagonale minus Nebendiagonale“:

$$\det \begin{pmatrix} a & b \\ c & d \end{pmatrix} = \begin{vmatrix} a & b \\ c & d \end{vmatrix} = ad - bc$$

Die Schreibweise mit senkrechten Strichen $|\ldots|$ bedeutet hier die Determinante – nicht den Betrag.

> **Merke:** $\det \begin{pmatrix} a & b \\ c & d \end{pmatrix} = ad - bc$ – Produkt der Hauptdiagonale minus Produkt der Nebendiagonale.

### Beispiel 1

$$\begin{vmatrix} 3 & 2 \\ 1 & 4 \end{vmatrix} = 3 \cdot 4 - 2 \cdot 1 = 12 - 2 = 10$$

## Determinante einer 3×3-Matrix

### Die Regel von Sarrus

Schreibe die ersten beiden Spalten noch einmal rechts neben die Matrix. Dann addierst du die drei Produkte entlang der Diagonalen von links oben nach rechts unten und subtrahierst die drei Produkte entlang der Diagonalen von links unten nach rechts oben:

$$\det A = a_{11}a_{22}a_{33} + a_{12}a_{23}a_{31} + a_{13}a_{21}a_{32} - a_{13}a_{22}a_{31} - a_{11}a_{23}a_{32} - a_{12}a_{21}a_{33}$$

### Beispiel 2

$$A = \begin{pmatrix} 2 & 1 & 3 \\ 0 & -1 & 4 \\ 1 & 2 & 0 \end{pmatrix}$$

Produkte nach rechts unten: $2 \cdot (-1) \cdot 0 = 0$, $\;1 \cdot 4 \cdot 1 = 4$, $\;3 \cdot 0 \cdot 2 = 0$. Summe: $4$.

Produkte nach rechts oben: $3 \cdot (-1) \cdot 1 = -3$, $\;2 \cdot 4 \cdot 2 = 16$, $\;1 \cdot 0 \cdot 0 = 0$. Summe: $13$.

$$\det A = 4 - 13 = -9$$

Die Regel von Sarrus gilt ausschließlich für $3 \times 3$-Matrizen.

### Der Laplace'sche Entwicklungssatz

Für Matrizen beliebiger Größe gibt es die **Entwicklung nach einer Zeile oder Spalte**. Du wählst eine Zeile oder Spalte. Zu jedem ihrer Einträge streichst du dessen Zeile und Spalte, berechnest die Determinante der Restmatrix (die Unterdeterminante) und multiplizierst sie mit dem Eintrag. Die Vorzeichen folgen einem Schachbrettmuster, links oben beginnend mit $+$:

$$\begin{pmatrix} + & - & + \\ - & + & - \\ + & - & + \end{pmatrix}$$

Zur Kontrolle von Beispiel 2 entwickeln wir nach der ersten Spalte (die Null spart Arbeit):

$$\det A = 2 \cdot \begin{vmatrix} -1 & 4 \\ 2 & 0 \end{vmatrix} - 0 \cdot \ldots + 1 \cdot \begin{vmatrix} 1 & 3 \\ -1 & 4 \end{vmatrix} = 2 \cdot (-8) + 7 = -9$$

Beide Verfahren liefern dasselbe. Tipp: Entwickle nach der Zeile oder Spalte mit den meisten Nullen.

## Rechenregeln

Für quadratische $n \times n$-Matrizen $A$ und $B$ gilt:

- $\det(A^T) = \det A$ – Zeilen und Spalten verhalten sich gleich.
- $\det(AB) = \det A \cdot \det B$ (Determinantenmultiplikationssatz).
- Vertauscht man zwei Zeilen, ändert sich das **Vorzeichen** der Determinante.
- Multipliziert man eine Zeile mit $r$, wird die Determinante mit $r$ multipliziert; daher ist $\det(rA) = r^n \det A$.
- Addiert man ein Vielfaches einer Zeile zu einer anderen, ändert sich die Determinante **nicht**.
- Ist eine Zeile eine Nullzeile oder sind zwei Zeilen gleich bzw. Vielfache voneinander, ist die Determinante $0$.
- Bei einer Dreiecksmatrix ist die Determinante das Produkt der Diagonaleinträge; insbesondere ist $\det E = 1$.

Die letzten drei Regeln ergeben ein schnelles Verfahren für große Matrizen: Mit Zeilenumformungen auf Dreiecksform bringen und dann die Diagonale multiplizieren.

## Was die Determinante verrät

> **Merke:** Eine quadratische Matrix ist genau dann invertierbar, wenn $\det A \ne 0$ ist. Dann hat das Gleichungssystem $A\vec{x} = \vec{b}$ genau eine Lösung.

Ist $\det A = 0$, heißt die Matrix **singulär**: Das Gleichungssystem hat dann entweder keine oder unendlich viele Lösungen.

Geometrisch ist $|\det A|$ der Flächeninhalt des Parallelogramms, das die Spaltenvektoren aufspannen (bei $2 \times 2$), bzw. das Volumen des aufgespannten Spats (bei $3 \times 3$). Die Vektoren $\begin{pmatrix} 3 \\ 1 \end{pmatrix}$ und $\begin{pmatrix} 1 \\ 2 \end{pmatrix}$ spannen ein Parallelogramm mit dem Flächeninhalt $3 \cdot 2 - 1 \cdot 1 = 5$ auf. Eine Determinante von $0$ bedeutet, dass die Vektoren auf einer Geraden (bzw. in einer Ebene) liegen – Fläche bzw. Volumen fallen in sich zusammen.

### Beispiel 3

Für welche $k$ ist $\begin{pmatrix} k & 2 \\ 3 & k - 1 \end{pmatrix}$ nicht invertierbar?

$$k(k - 1) - 6 = 0 \quad \Leftrightarrow \quad k^2 - k - 6 = 0 \quad \Leftrightarrow \quad (k - 3)(k + 2) = 0$$

Für $k = 3$ und $k = -2$ ist die Matrix singulär.

## Die Cramersche Regel

Ist $\det A \ne 0$, lässt sich jede Unbekannte als Quotient zweier Determinanten berechnen: Man ersetzt die Spalte der Unbekannten durch die rechte Seite. Für $2x + y = 5$, $x + 3y = 5$ gilt:

$$x = \frac{\begin{vmatrix} 5 & 1 \\ 5 & 3 \end{vmatrix}}{\begin{vmatrix} 2 & 1 \\ 1 & 3 \end{vmatrix}} = \frac{10}{5} = 2, \qquad y = \frac{\begin{vmatrix} 2 & 5 \\ 1 & 5 \end{vmatrix}}{5} = \frac{5}{5} = 1$$

## Typische Fehler

- $ad + bc$ oder $ab - cd$ statt $ad - bc$ rechnen.
- Die Regel von Sarrus auf $4 \times 4$-Matrizen anwenden – sie gilt nur für $3 \times 3$.
- Beim Entwicklungssatz das Schachbrettmuster der Vorzeichen vergessen.
- $\det(A + B) = \det A + \det B$ annehmen – das ist im Allgemeinen falsch.
- $\det(2A) = 2 \det A$ glauben – bei einer $3 \times 3$-Matrix ist es $8 \det A$.

## Übungen

1. Berechne $\begin{vmatrix} 5 & -2 \\ 3 & 4 \end{vmatrix}$.

<details>
<summary>Lösung</summary>

$5 \cdot 4 - (-2) \cdot 3 = 20 + 6 = 26$.

</details>

2. Berechne $\det \begin{pmatrix} 2 & 0 & 1 \\ 1 & 3 & -1 \\ 0 & 1 & 4 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

Sarrus: nach rechts unten $2 \cdot 3 \cdot 4 + 0 \cdot (-1) \cdot 0 + 1 \cdot 1 \cdot 1 = 25$, nach rechts oben $1 \cdot 3 \cdot 0 + 2 \cdot (-1) \cdot 1 + 0 \cdot 1 \cdot 4 = -2$. Also ist $\det = 25 - (-2) = 27$.

</details>

3. Zeige, dass $\det \begin{pmatrix} 1 & 2 & 3 \\ 4 & 5 & 6 \\ 7 & 8 & 9 \end{pmatrix} = 0$ ist.

<details>
<summary>Lösung</summary>

Sarrus: $45 + 84 + 96 - 105 - 48 - 72 = 225 - 225 = 0$. (Grund: Die dritte Zeile ist das Doppelte der zweiten minus die erste.)

</details>

4. Berechne $\det \begin{pmatrix} 3 & 5 & -1 \\ 0 & 2 & 7 \\ 0 & 0 & -4 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

Dreiecksmatrix: Diagonale multiplizieren, $3 \cdot 2 \cdot (-4) = -24$.

</details>

5. Für welche Werte von $k$ ist $\begin{pmatrix} 1 & k \\ k & 4 \end{pmatrix}$ invertierbar?

<details>
<summary>Lösung</summary>

$\det = 4 - k^2$. Das ist null für $k = 2$ und $k = -2$. Für alle anderen $k$ ist die Matrix invertierbar.

</details>
