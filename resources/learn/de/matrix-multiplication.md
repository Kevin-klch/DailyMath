---
title: Matrizenmultiplikation
category: linear-algebra
order: 50
level: 3
summary: Zeile mal Spalte – wie man zwei Matrizen multipliziert, wann das Produkt existiert und warum die Reihenfolge wichtig ist.
related: matrices, inverse-matrix, determinants, vectors
---

Matrizen zu addieren ist einfach, weil man eintragsweise rechnet. Beim **Multiplizieren** gilt eine andere Regel: Man verknüpft die Zeilen der ersten Matrix mit den Spalten der zweiten. Das wirkt zunächst ungewohnt, ist aber genau das, was man braucht, um Gleichungssysteme, hintereinander ausgeführte Abbildungen und mehrstufige Prozesse mit Matrizen zu beschreiben.

## Wann existiert das Produkt?

Das Produkt $A \cdot B$ existiert nur, wenn $A$ genauso viele **Spalten** hat wie $B$ **Zeilen**. Das Ergebnis hat so viele Zeilen wie $A$ und so viele Spalten wie $B$:

$$\underbrace{A}_{m \times n} \cdot \underbrace{B}_{n \times p} = \underbrace{C}_{m \times p}$$

Die beiden „inneren“ Zahlen müssen übereinstimmen, die beiden „äußeren“ geben das Format des Ergebnisses an.

> **Merke:** $(m \times n) \cdot (n \times p) = (m \times p)$. Stimmen die inneren Zahlen nicht überein, ist das Produkt nicht definiert.

Eine $2 \times 3$-Matrix mal eine $3 \times 4$-Matrix ergibt also eine $2 \times 4$-Matrix. Das umgekehrte Produkt ($3 \times 4$ mal $2 \times 3$) existiert nicht.

## Die Regel: Zeile mal Spalte

Der Eintrag $c_{ij}$ des Produkts entsteht aus der **$i$-ten Zeile von $A$** und der **$j$-ten Spalte von $B$**: Man multipliziert die Zahlen paarweise und addiert alles – genau wie beim Skalarprodukt.

$$c_{ij} = a_{i1} b_{1j} + a_{i2} b_{2j} + \ldots + a_{in} b_{nj}$$

> **Merke:** Eintrag in Zeile $i$, Spalte $j$ von $A \cdot B$ = ($i$-te Zeile von $A$) · ($j$-te Spalte von $B$).

Beim Rechnen von Hand hilft das **Falk-Schema**: Man schreibt $B$ rechts oberhalb von $A$, dann steht jeder Eintrag des Ergebnisses genau im Schnitt der passenden Zeile und Spalte.

### Beispiel 1

$$\begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix} \cdot \begin{pmatrix} 5 & 6 \\ 7 & 8 \end{pmatrix}$$

- 1. Zeile · 1. Spalte: $1 \cdot 5 + 2 \cdot 7 = 19$
- 1. Zeile · 2. Spalte: $1 \cdot 6 + 2 \cdot 8 = 22$
- 2. Zeile · 1. Spalte: $3 \cdot 5 + 4 \cdot 7 = 43$
- 2. Zeile · 2. Spalte: $3 \cdot 6 + 4 \cdot 8 = 50$

$$\begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix} \cdot \begin{pmatrix} 5 & 6 \\ 7 & 8 \end{pmatrix} = \begin{pmatrix} 19 & 22 \\ 43 & 50 \end{pmatrix}$$

### Beispiel 2: nicht quadratische Matrizen

$$A = \begin{pmatrix} 1 & 0 & 2 \\ -1 & 3 & 1 \end{pmatrix}, \qquad B = \begin{pmatrix} 3 & 1 \\ 2 & 1 \\ 1 & 0 \end{pmatrix}$$

$A$ ist eine $2 \times 3$-, $B$ eine $3 \times 2$-Matrix, also ist $AB$ eine $2 \times 2$-Matrix:

$$AB = \begin{pmatrix} 3 + 0 + 2 & 1 + 0 + 0 \\ -3 + 6 + 1 & -1 + 3 + 0 \end{pmatrix} = \begin{pmatrix} 5 & 1 \\ 4 & 2 \end{pmatrix}$$

Auch $BA$ existiert, ist aber eine $3 \times 3$-Matrix:

$$BA = \begin{pmatrix} 2 & 3 & 7 \\ 1 & 3 & 5 \\ 1 & 0 & 2 \end{pmatrix}$$

## Die Reihenfolge ist entscheidend

Bei Zahlen gilt $3 \cdot 5 = 5 \cdot 3$. Bei Matrizen ist das im Allgemeinen **falsch**. Vertauscht man in Beispiel 1 die Faktoren, erhält man

$$\begin{pmatrix} 5 & 6 \\ 7 & 8 \end{pmatrix} \cdot \begin{pmatrix} 1 & 2 \\ 3 & 4 \end{pmatrix} = \begin{pmatrix} 23 & 34 \\ 31 & 46 \end{pmatrix} \ne \begin{pmatrix} 19 & 22 \\ 43 & 50 \end{pmatrix}$$

Die Matrizenmultiplikation ist **nicht kommutativ**: Im Allgemeinen ist $AB \ne BA$. Manchmal existiert sogar nur eines der beiden Produkte, oder sie haben verschiedene Formate wie in Beispiel 2.

Andere vertraute Regeln gelten weiterhin (sofern die Produkte definiert sind):

- **Assoziativgesetz:** $(AB)C = A(BC)$
- **Distributivgesetze:** $A(B + C) = AB + AC$ und $(A + B)C = AC + BC$
- **Einheitsmatrix:** $AE = EA = A$ – die Einheitsmatrix spielt die Rolle der Zahl $1$.
- **Transponieren:** $(AB)^T = B^T A^T$ – mit umgekehrter Reihenfolge.

Noch eine Überraschung: Ein Produkt kann die Nullmatrix sein, obwohl keiner der Faktoren die Nullmatrix ist. So ist $\begin{pmatrix} 0 & 1 \\ 0 & 0 \end{pmatrix} \cdot \begin{pmatrix} 0 & 1 \\ 0 & 0 \end{pmatrix} = \begin{pmatrix} 0 & 0 \\ 0 & 0 \end{pmatrix}$.

## Matrix mal Vektor

Ein Spaltenvektor ist eine $n \times 1$-Matrix. Matrix mal Vektor ergibt deshalb wieder einen Vektor:

$$\begin{pmatrix} 2 & -1 \\ 1 & 3 \end{pmatrix} \cdot \begin{pmatrix} 4 \\ 1 \end{pmatrix} = \begin{pmatrix} 8 - 1 \\ 4 + 3 \end{pmatrix} = \begin{pmatrix} 7 \\ 7 \end{pmatrix}$$

Darum lässt sich jedes lineare Gleichungssystem kurz als $A \vec{x} = \vec{b}$ schreiben. Das System $2x - y = 7$, $x + 3y = 7$ ist genau die Gleichung oben mit $\vec{x} = \begin{pmatrix} x \\ y \end{pmatrix}$.

### Beispiel 3: Kosten

Zwei Kunden kaufen Stifte und Hefte. Die Mengen stehen in der Matrix $Q$ (Zeilen: Kunden, Spalten: Stifte und Hefte), die Preise in € im Vektor $\vec{p}$:

$$Q \cdot \vec{p} = \begin{pmatrix} 2 & 3 \\ 1 & 4 \end{pmatrix} \cdot \begin{pmatrix} 2 \\ 1 \end{pmatrix} = \begin{pmatrix} 7 \\ 6 \end{pmatrix}$$

Der erste Kunde zahlt 7 €, der zweite 6 €.

## Potenzen von Matrizen

Für eine quadratische Matrix ist $A^2 = A \cdot A$, $A^3 = A \cdot A \cdot A$ usw. Zum Beispiel ist

$$\begin{pmatrix} 1 & 1 \\ 0 & 1 \end{pmatrix}^2 = \begin{pmatrix} 1 & 2 \\ 0 & 1 \end{pmatrix}$$

Vorsicht: $A^2$ erhält man **nicht**, indem man jeden Eintrag quadriert.

## Typische Fehler

- Eintragsweise multiplizieren wie bei der Addition.
- Die Formate nicht vorher prüfen – die inneren Zahlen müssen übereinstimmen.
- $AB = BA$ annehmen oder beim Lösen von Matrizengleichungen die Faktoren vertauschen.
- Spalte mal Zeile statt Zeile mal Spalte rechnen.
- Für $A^2$ jeden Eintrag einzeln quadrieren.

## Übungen

1. Berechne $\begin{pmatrix} 2 & 0 \\ 1 & 3 \end{pmatrix} \cdot \begin{pmatrix} 1 & 4 \\ 2 & -1 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

Zeile mal Spalte: $\begin{pmatrix} 2 + 0 & 8 + 0 \\ 1 + 6 & 4 - 3 \end{pmatrix} = \begin{pmatrix} 2 & 8 \\ 7 & 1 \end{pmatrix}$.

</details>

2. $A$ ist eine $2 \times 3$-Matrix, $B$ eine $3 \times 4$-Matrix. Welche der Produkte $AB$ und $BA$ existieren, und welches Format haben sie?

<details>
<summary>Lösung</summary>

$AB$: $(2 \times 3) \cdot (3 \times 4)$, die inneren Zahlen stimmen überein, Ergebnis $2 \times 4$. $BA$: $(3 \times 4) \cdot (2 \times 3)$, $4 \ne 2$, nicht definiert.

</details>

3. Berechne $\begin{pmatrix} 1 & -1 & 2 \\ 0 & 3 & 1 \end{pmatrix} \cdot \begin{pmatrix} 2 \\ 1 \\ 3 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

$\begin{pmatrix} 2 - 1 + 6 \\ 0 + 3 + 3 \end{pmatrix} = \begin{pmatrix} 7 \\ 6 \end{pmatrix}$.

</details>

4. Berechne $\begin{pmatrix} 1 & 2 & 3 \end{pmatrix} \cdot \begin{pmatrix} 4 \\ 5 \\ 6 \end{pmatrix}$ und $\begin{pmatrix} 4 \\ 5 \\ 6 \end{pmatrix} \cdot \begin{pmatrix} 1 & 2 & 3 \end{pmatrix}$.

<details>
<summary>Lösung</summary>

$(1 \times 3) \cdot (3 \times 1)$ ergibt eine $1 \times 1$-Matrix: $4 + 10 + 18 = 32$. $(3 \times 1) \cdot (1 \times 3)$ ergibt eine $3 \times 3$-Matrix: $\begin{pmatrix} 4 & 8 & 12 \\ 5 & 10 & 15 \\ 6 & 12 & 18 \end{pmatrix}$.

</details>

5. Zeige, dass $AB \ne BA$ für $A = \begin{pmatrix} 0 & 1 \\ 0 & 0 \end{pmatrix}$ und $B = \begin{pmatrix} 0 & 0 \\ 1 & 0 \end{pmatrix}$ gilt.

<details>
<summary>Lösung</summary>

$AB = \begin{pmatrix} 1 & 0 \\ 0 & 0 \end{pmatrix}$, aber $BA = \begin{pmatrix} 0 & 0 \\ 0 & 1 \end{pmatrix}$. Die Produkte sind verschieden.

</details>
