---
title: Lineare Gleichungssysteme
category: algebra
order: 60
level: 2
summary: Wie man zwei lineare Gleichungen mit zwei Unbekannten mit dem Einsetzungs-, Gleichsetzungs- oder Additionsverfahren löst – und wann es keine oder unendlich viele Lösungen gibt.
related: linear-equations, linear-functions, gaussian-elimination
---

Viele Aufgaben enthalten zwei unbekannte Größen auf einmal – die Preise zweier Artikel, zwei Zahlen mit bekannter Summe und Differenz, zwei Geraden, die sich schneiden. Eine einzelne Gleichung reicht nicht aus, um zwei Unbekannte festzulegen, **zwei Gleichungen** dagegen meistens schon. Ein solches Paar heißt **lineares Gleichungssystem** (kurz LGS). Seine Lösung ist ein Zahlenpaar $(x \mid y)$, das **beide** Gleichungen gleichzeitig erfüllt.

## Was eine Lösung bedeutet

Betrachte das Gleichungssystem

$$\begin{cases} x + y = 10 \\ x - y = 4 \end{cases}$$

Das Paar $x = 7$, $y = 3$ ist eine Lösung: $7 + 3 = 10$ und $7 - 3 = 4$. Das Paar $x = 6$, $y = 4$ erfüllt zwar die erste, aber nicht die zweite Gleichung – es ist keine Lösung des Systems.

Jede lineare Gleichung mit $x$ und $y$ beschreibt eine Gerade. Eine Lösung des Systems ist ein Punkt, der auf **beiden** Geraden liegt – also ihr Schnittpunkt.

> **Merke:** Alle Lösungsverfahren verfolgen dasselbe Ziel: Die beiden Gleichungen werden so kombiniert, dass eine Variable wegfällt. Übrig bleibt eine gewöhnliche lineare Gleichung mit nur einer Variablen.

## Einsetzungsverfahren

Man löst eine Gleichung nach einer Variablen auf und setzt den entstandenen Term in die andere Gleichung ein.

### Beispiel 1

$$\begin{cases} y = 2x - 1 \\ 3x + 2y = 12 \end{cases}$$

Die erste Gleichung ist bereits nach $y$ aufgelöst. Eingesetzt in die zweite:

$$3x + 2(2x - 1) = 12 \quad\Rightarrow\quad 7x - 2 = 12 \quad\Rightarrow\quad x = 2$$

Dann ist $y = 2 \cdot 2 - 1 = 3$. Lösung: $L = \{(2 \mid 3)\}$.

Das Einsetzungsverfahren lohnt sich, wenn eine Variable schon allein steht oder den Koeffizienten $1$ hat.

## Gleichsetzungsverfahren

Sind beide Gleichungen nach derselben Variablen aufgelöst, setzt man die rechten Seiten gleich.

### Beispiel 2

$$\begin{cases} y = 2x + 1 \\ y = -x + 7 \end{cases}$$

$$2x + 1 = -x + 7 \quad\Rightarrow\quad 3x = 6 \quad\Rightarrow\quad x = 2$$

Dann ist $y = 2 \cdot 2 + 1 = 5$. Die beiden Geraden schneiden sich im Punkt $(2 \mid 5)$.

## Additionsverfahren

Man addiert oder subtrahiert die Gleichungen so, dass eine Variable herausfällt. Falls nötig, multipliziert man die Gleichungen vorher mit passenden Zahlen, damit die Koeffizienten einer Variablen entgegengesetzt gleich sind.

### Beispiel 3

$$\begin{cases} 3x + 2y = 16 \\ 5x - 2y = 16 \end{cases}$$

Die $y$-Glieder heben sich schon auf. Addition der Gleichungen ergibt $8x = 32$, also $x = 4$. Einsetzen in die erste Gleichung: $12 + 2y = 16$, also $y = 2$. Lösung: $(4 \mid 2)$.

### Beispiel 4

$$\begin{cases} 2x + 3y = 12 \\ 3x + 2y = 13 \end{cases}$$

Die erste Gleichung mal $3$, die zweite mal $2$ – dann steht in beiden $6x$:

$$\begin{cases} 6x + 9y = 36 \\ 6x + 4y = 26 \end{cases}$$

Erste minus zweite Gleichung: $5y = 10$, also $y = 2$. Aus $2x + 6 = 12$ folgt $x = 3$. Lösung: $(3 \mid 2)$.

Probe: $2 \cdot 3 + 3 \cdot 2 = 12$ und $3 \cdot 3 + 2 \cdot 2 = 13$. Stimmt.

## Wie viele Lösungen?

Zwei Geraden in der Ebene können auf drei Arten zueinander liegen – entsprechend gibt es drei Fälle:

- **Genau eine Lösung:** Die Geraden schneiden sich in einem Punkt (der Normalfall).
- **Keine Lösung:** Die Geraden sind parallel. Beispiel: $x + y = 3$ und $2x + 2y = 8$. Verdoppelt man die erste Gleichung, erhält man $2x + 2y = 6$ – ein Widerspruch zu $2x + 2y = 8$. Beim Rechnen entsteht eine falsche Aussage wie $0 = 2$.
- **Unendlich viele Lösungen:** Beide Gleichungen beschreiben dieselbe Gerade. Beispiel: $x + y = 3$ und $2x + 2y = 6$. Am Ende steht eine wahre Aussage wie $0 = 0$.

> **Merke:** Fällt beim Rechnen eine Variable weg und bleibt eine falsche Aussage übrig, hat das LGS keine Lösung. Bleibt eine wahre Aussage übrig, hat es unendlich viele Lösungen.

## Textaufgaben

### Beispiel 5

Ein Kino verkauft 30 Karten für insgesamt 210 €. Erwachsene zahlen 8 €, Kinder 5 €. Wie viele Karten jeder Sorte wurden verkauft?

Es sei $e$ die Anzahl der Erwachsenenkarten und $k$ die Anzahl der Kinderkarten:

$$\begin{cases} e + k = 30 \\ 8e + 5k = 210 \end{cases}$$

Aus der ersten Gleichung folgt $k = 30 - e$. Eingesetzt: $8e + 5(30 - e) = 210$, also $3e + 150 = 210$ und $e = 20$. Dann ist $k = 10$. Probe: $160 + 50 = 210$.

## Typische Fehler

- Nur $x$ ausrechnen und $y$ vergessen – die Lösung ist immer ein **Zahlenpaar**.
- Vor dem Addieren nur eine Seite einer Gleichung (oder nur einzelne Glieder) multiplizieren.
- Vorzeichenfehler beim Subtrahieren der Gleichungen: **jedes** Glied abziehen, also $9y - 4y$ und $36 - 26$.
- Einen Term ohne Klammer einsetzen: $2(2x - 1)$, nicht $2 \cdot 2x - 1$.
- Die Probe nicht in **beiden** Ausgangsgleichungen machen.

## Übungen

1. Löse mit dem Einsetzungsverfahren: $y = 3x - 2$ und $2x + y = 8$.

<details>
<summary>Lösung</summary>

$2x + (3x - 2) = 8$, also $5x = 10$ und $x = 2$. Dann ist $y = 3 \cdot 2 - 2 = 4$. Lösung: $(2 \mid 4)$.

</details>

2. Löse mit dem Additionsverfahren: $x + 2y = 7$ und $3x - 2y = 5$.

<details>
<summary>Lösung</summary>

Addition der Gleichungen: $4x = 12$, also $x = 3$. Aus $3 + 2y = 7$ folgt $y = 2$. Lösung: $(3 \mid 2)$.

</details>

3. Löse: $4x + 3y = 10$ und $2x + 5y = 12$.

<details>
<summary>Lösung</summary>

Zweite Gleichung mal $2$: $4x + 10y = 24$. Davon die erste Gleichung abziehen: $7y = 14$, also $y = 2$. Aus $4x + 6 = 10$ folgt $x = 1$. Lösung: $(1 \mid 2)$.

</details>

4. Wie viele Lösungen hat das System $2x - y = 3$ und $-4x + 2y = 5$?

<details>
<summary>Lösung</summary>

Erste Gleichung mal $2$: $4x - 2y = 6$. Addiert man die zweite Gleichung, erhält man $0 = 11$ – eine falsche Aussage. Das System hat keine Lösung, die Geraden sind parallel.

</details>

5. Zwei Zahlen ergeben zusammen 25, ihre Differenz ist 7. Wie heißen die Zahlen?

<details>
<summary>Lösung</summary>

$x + y = 25$ und $x - y = 7$. Addition: $2x = 32$, also $x = 16$ und $y = 9$.

</details>
