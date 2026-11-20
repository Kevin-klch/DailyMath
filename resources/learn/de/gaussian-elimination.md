---
title: Gauß-Verfahren
category: linear-algebra
order: 80
level: 3
summary: Ein festes Rezept für jedes lineare Gleichungssystem – Zeilenumformungen, Stufenform, Rückwärtseinsetzen und die drei möglichen Lösungsfälle.
related: systems-of-equations, matrices, determinants, inverse-matrix
---

Das **Gauß-Verfahren** (Gaußscher Algorithmus) ist eine Schritt-für-Schritt-Methode, mit der sich lineare Gleichungssysteme lösen lassen – ganz gleich, wie viele Gleichungen und Unbekannte es gibt. Man eliminiert eine Variable nach der anderen, bis das System eine „Treppenform“ hat, und liest die Lösung dann von unten nach oben ab. Weil es immer gleich abläuft, ist es das Standardverfahren in Schule, Studium und Computerprogrammen.

## Erlaubte Umformungen

Die folgenden Umformungen verändern die Lösungsmenge eines Gleichungssystems nicht:

1. Zwei Gleichungen **vertauschen**.
2. Eine Gleichung mit einer Zahl ungleich $0$ **multiplizieren**.
3. Ein Vielfaches einer Gleichung zu einer anderen Gleichung **addieren**.

> **Merke:** Zeilen vertauschen, eine Zeile mit einer Zahl ungleich null multiplizieren und ein Vielfaches einer Zeile zu einer anderen addieren – mehr Werkzeuge braucht man nicht, und keines davon verändert die Lösungen.

## Die erweiterte Koeffizientenmatrix

Um Schreibarbeit zu sparen, notiert man nur die Koeffizienten und die rechten Seiten. Aus dem Gleichungssystem

$$\begin{cases} x + y + z = 6 \\ 2x - y + z = 3 \\ x + 2y - z = 2 \end{cases}$$

wird die **erweiterte Koeffizientenmatrix**

$$\left( \begin{array}{ccc|c} 1 & 1 & 1 & 6 \\ 2 & -1 & 1 & 3 \\ 1 & 2 & -1 & 2 \end{array} \right)$$

Jede Zeile steht für eine Gleichung, jede Spalte gehört zu einer Variablen, und der senkrechte Strich trennt die rechte Seite ab. Die Zeilen bezeichnet man mit römischen Ziffern I, II, III.

## Der Ablauf

1. **Vorwärtselimination:** Mit Zeile I erzeugt man in der ersten Spalte unterhalb des ersten Eintrags Nullen. Dann erzeugt man mit Zeile II in der zweiten Spalte unterhalb des zweiten Eintrags Nullen, und so weiter.
2. Ergebnis ist die **Stufenform** (Zeilenstufenform): Unterhalb der Treppe stehen nur Nullen.
3. **Rückwärtseinsetzen:** Die letzte Gleichung lösen, das Ergebnis in die darüberliegende einsetzen und so nach oben weiterarbeiten.

### Beispiel 1: genau eine Lösung

Wir starten mit der erweiterten Koeffizientenmatrix von oben.

$x$ in den Zeilen II und III eliminieren mit $\text{II} - 2 \cdot \text{I}$ und $\text{III} - \text{I}$:

$$\left( \begin{array}{ccc|c} 1 & 1 & 1 & 6 \\ 0 & -3 & -1 & -9 \\ 0 & 1 & -2 & -4 \end{array} \right)$$

$y$ in Zeile III eliminieren mit $3 \cdot \text{III} + \text{II}$:

$$\left( \begin{array}{ccc|c} 1 & 1 & 1 & 6 \\ 0 & -3 & -1 & -9 \\ 0 & 0 & -7 & -21 \end{array} \right)$$

Rückwärtseinsetzen:

- Zeile III: $-7z = -21$, also $z = 3$.
- Zeile II: $-3y - 3 = -9$, also $-3y = -6$ und $y = 2$.
- Zeile I: $x + 2 + 3 = 6$, also $x = 1$.

Die Lösung ist $(x, y, z) = (1, 2, 3)$. Probe in der ursprünglichen zweiten Gleichung: $2 - 2 + 3 = 3$.

## Die drei Lösungsfälle

An den letzten Zeilen der Stufenform erkennst du, welcher Fall vorliegt:

- **Genau eine Lösung:** Die Treppe hat in jeder Variablenspalte eine Stufe, wie in Beispiel 1.
- **Keine Lösung:** Es entsteht eine Zeile der Form $(0 \;\; 0 \;\; 0 \mid c)$ mit $c \ne 0$. Sie steht für die falsche Aussage $0 = c$.
- **Unendlich viele Lösungen:** Es entsteht eine Nullzeile $(0 \;\; 0 \;\; 0 \mid 0)$ (und kein Widerspruch). Dann ist mindestens eine Variable frei wählbar und wird als **Parameter** gesetzt.

> **Merke:** Eine Widerspruchszeile $0 = c$ bedeutet: keine Lösung. Eine Nullzeile mit weniger Stufen als Variablen bedeutet: unendlich viele Lösungen, die man mit einem Parameter beschreibt.

### Beispiel 2: keine Lösung

$$\left( \begin{array}{ccc|c} 1 & 1 & 1 & 2 \\ 1 & 2 & 3 & 5 \\ 2 & 3 & 4 & 8 \end{array} \right) \;\xrightarrow{\text{II} - \text{I},\; \text{III} - 2 \cdot \text{I}}\; \left( \begin{array}{ccc|c} 1 & 1 & 1 & 2 \\ 0 & 1 & 2 & 3 \\ 0 & 1 & 2 & 4 \end{array} \right) \;\xrightarrow{\text{III} - \text{II}}\; \left( \begin{array}{ccc|c} 1 & 1 & 1 & 2 \\ 0 & 1 & 2 & 3 \\ 0 & 0 & 0 & 1 \end{array} \right)$$

Die letzte Zeile bedeutet $0 = 1$. Das System hat keine Lösung, die Lösungsmenge ist leer.

### Beispiel 3: unendlich viele Lösungen

Ändere die letzte rechte Seite von $8$ auf $7$. Dieselben Schritte führen nun zur Zeile $(0 \;\; 0 \;\; 0 \mid 0)$, also $0 = 0$. Es bleiben nur zwei Gleichungen übrig:

$$x + y + z = 2, \qquad y + 2z = 3$$

Setze $z = t$ als Parameter. Dann ist $y = 3 - 2t$ und $x = 2 - (3 - 2t) - t = -1 + t$. Die Lösungsmenge lautet

$$L = \left\{ (-1 + t \mid 3 - 2t \mid t) \mid t \in \mathbb{R} \right\}$$

Für $t = 0$ erhält man $(-1 \mid 3 \mid 0)$; Probe in der dritten ursprünglichen Gleichung: $-2 + 9 + 0 = 7$. Geometrisch bilden diese Lösungen eine Gerade im Raum.

## Tipps für saubere Rechnungen

- Wenn möglich, eine Zeile mit dem Vorfaktor $1$ nach oben tauschen – das vermeidet Brüche.
- Zeilen vor dem Subtrahieren mit passenden Zahlen multiplizieren, wie oben bei $3 \cdot \text{III} + \text{II}$, damit man bei ganzen Zahlen bleibt.
- Jede Umformung neben die Zeile schreiben, damit man Fehler später findet.
- Das Ergebnis immer in **alle** ursprünglichen Gleichungen einsetzen.

Führt man die Umformungen weiter, bis links die Einheitsmatrix steht, spricht man vom **Gauß-Jordan-Verfahren**. Damit berechnet man auch inverse Matrizen.

## Typische Fehler

- Eine Umformung nur auf einen Teil der Zeile anwenden – auch die rechte Seite muss mitgerechnet werden.
- Eine Zeile mit sich selbst umformen, etwa „$\text{II} - \text{II}$“.
- Eine Nullzeile für „keine Lösung“ halten – das bedeutet nur die Widerspruchszeile $0 = c$ mit $c \ne 0$.
- Bei unendlich vielen Lösungen nur eine einzelne Lösung angeben statt der allgemeinen Lösung mit Parameter.
- Vorzeichenfehler beim Subtrahieren negativer Einträge.

## Übungen

1. Löse $x + 2y = 8$, $3x - y = 3$ mit dem Gauß-Verfahren.

<details>
<summary>Lösung</summary>

$\text{II} - 3 \cdot \text{I}$ ergibt $-7y = -21$, also $y = 3$. Dann ist $x + 6 = 8$, also $x = 2$. Probe: $6 - 3 = 3$.

</details>

2. Löse das Gleichungssystem $x + y - z = 0$, $2x + y + z = 7$, $x - y + 2z = 5$.

<details>
<summary>Lösung</summary>

$\text{II} - 2 \cdot \text{I}$: $(0, -1, 3 \mid 7)$. $\text{III} - \text{I}$: $(0, -2, 3 \mid 5)$. Dann $\text{III} - 2 \cdot \text{II}$: $(0, 0, -3 \mid -9)$, also $z = 3$. Aus $-y + 9 = 7$ folgt $y = 2$, aus $x + 2 - 3 = 0$ folgt $x = 1$. Lösung: $(1 \mid 2 \mid 3)$.

</details>

3. Zeige, dass $x + 2y + z = 4$, $2x + 4y + 2z = 9$, $x - y = 1$ keine Lösung hat.

<details>
<summary>Lösung</summary>

$\text{II} - 2 \cdot \text{I}$ ergibt $0x + 0y + 0z = 1$, also $0 = 1$. Das ist ein Widerspruch, das System ist unlösbar.

</details>

4. Löse $x - y + 2z = 3$, $2x - y + 3z = 5$, $3x - 2y + 5z = 8$.

<details>
<summary>Lösung</summary>

$\text{II} - 2 \cdot \text{I}$: $(0, 1, -1 \mid -1)$. $\text{III} - 3 \cdot \text{I}$: $(0, 1, -1 \mid -1)$. $\text{III} - \text{II}$: Nullzeile. Mit $z = t$ folgt $y = -1 + t$ und $x = 3 + y - 2z = 2 - t$. Lösungsmenge: $L = \left\{ (2 - t \mid -1 + t \mid t) \mid t \in \mathbb{R} \right\}$.

</details>

5. Für welchen Wert von $a$ hat das System $x + y = 2$, $x + ay = 3$ keine Lösung?

<details>
<summary>Lösung</summary>

$\text{II} - \text{I}$ ergibt $(a - 1)y = 1$. Für $a = 1$ wird daraus $0 = 1$ – keine Lösung. Für jedes andere $a$ gibt es genau eine Lösung mit $y = \frac{1}{a - 1}$.

</details>
