---
title: Logarithmen
category: algebra
order: 90
level: 2
summary: Was ein Logarithmus ist, wie man einfache Logarithmen im Kopf bestimmt und wie man mit den Logarithmengesetzen und dem Basiswechsel rechnet.
related: laws-of-exponents, exponential-equations, exponential-functions
---

Ein Logarithmus beantwortet genau eine Frage: **Welcher Exponent** wird gebraucht? Weil $2^3 = 8$ ist, ist der Logarithmus von $8$ zur Basis $2$ gleich $3$. Das Logarithmieren ist die Umkehrung des Potenzierens – so wie die Subtraktion die Addition rückgängig macht. Man braucht Logarithmen, um Gleichungen zu lösen, bei denen die Unbekannte im Exponenten steht, etwa bei Wachstum, Zerfall oder Zinseszins. Außerdem stecken sie in Skalen wie Dezibel, pH-Wert und Richterskala.

## Definition

Für eine Basis $b > 0$ mit $b \neq 1$ und eine Zahl $x > 0$ gilt:

$$\log_b x = y \quad\Longleftrightarrow\quad b^y = x$$

> **Merke:** $\log_b x$ ist die Hochzahl, mit der man $b$ potenzieren muss, um $x$ zu erhalten. Jede Logarithmus-Aussage ist eine versteckte Potenz-Aussage.

### Beispiel 1

- $\log_2 8 = 3$, denn $2^3 = 8$.
- $\log_{10} 1000 = 3$, denn $10^3 = 1000$.
- $\log_3 \frac{1}{9} = -2$, denn $3^{-2} = \frac{1}{9}$.
- $\log_{25} 5 = \frac{1}{2}$, denn $25^{\frac{1}{2}} = \sqrt{25} = 5$.

Um einen Logarithmus im Kopf zu bestimmen, fragt man sich: „$b$ hoch wie viel ergibt $x$?“

## Besondere Werte

Direkt aus der Definition folgt:

$$\log_b 1 = 0 \qquad \log_b b = 1 \qquad \log_b b^n = n \qquad b^{\log_b x} = x$$

Der Logarithmus von null oder von einer negativen Zahl ist **nicht definiert**, denn keine Potenz einer positiven Basis ist null oder negativ.

## Wichtige Basen

Zwei Basen haben eigene Namen und eigene Tasten auf dem Taschenrechner:

- **Zehnerlogarithmus** (Basis $10$): $\lg x$ oder $\log x$, zum Beispiel $\lg 100 = 2$.
- **Natürlicher Logarithmus** (Basis $e \approx 2{,}718$): $\ln x$, zum Beispiel $\ln e = 1$.

In der Analysis ist der natürliche Logarithmus der wichtigste.

## Die Logarithmengesetze

Da Logarithmen Exponenten sind, werden aus den Potenzgesetzen die Logarithmengesetze. Für $x, y > 0$ gilt:

$$\log_b (x \cdot y) = \log_b x + \log_b y$$

$$\log_b \frac{x}{y} = \log_b x - \log_b y$$

$$\log_b x^r = r \cdot \log_b x$$

> **Merke:** Der Logarithmus macht aus einem Produkt eine Summe, aus einem Quotienten eine Differenz und aus einer Potenz ein Produkt.

Warum gilt das erste Gesetz? Schreibt man $x = b^m$ und $y = b^n$, dann ist $xy = b^{m+n}$, also $\log_b(xy) = m + n = \log_b x + \log_b y$.

### Beispiel 2: zusammenfassen

$$\log_6 4 + \log_6 9 = \log_6 36 = 2$$

$$\log_3 54 - \log_3 2 = \log_3 27 = 3$$

### Beispiel 3: zerlegen

$$\lg \frac{x^2 y}{z} = 2 \lg x + \lg y - \lg z$$

### Beispiel 4: Potenzgesetz

$$\log_2 8^5 = 5 \cdot \log_2 8 = 5 \cdot 3 = 15$$

## Basiswechsel

Der Taschenrechner kennt meist nur $\lg$ und $\ln$. Logarithmen zu anderen Basen berechnet man mit der Formel für den Basiswechsel:

$$\log_b x = \frac{\ln x}{\ln b} = \frac{\lg x}{\lg b}$$

### Beispiel 5

$$\log_2 5 = \frac{\ln 5}{\ln 2} \approx \frac{1{,}609}{0{,}693} \approx 2{,}32$$

Kontrolle: $2^{2{,}32} \approx 5$. Das passt, denn $5$ liegt zwischen $2^2 = 4$ und $2^3 = 8$.

## Typische Fehler

- Ein Gesetz für Summen erfinden: $\lg(x + y)$ ist **nicht** $\lg x + \lg y$.
- Einen Quotienten von Logarithmen auseinanderziehen: $\frac{\lg x}{\lg y}$ ist **nicht** $\lg x - \lg y$.
- Das Potenzgesetz auf den ganzen Logarithmus anwenden: $(\lg x)^2 \neq 2 \lg x$.
- Den Logarithmus von null oder einer negativen Zahl bilden.
- Basis und Argument verwechseln: $\log_2 8 = 3$, aber $\log_8 2 = \frac{1}{3}$.

## Übungen

1. Bestimme $\log_4 64$.

<details>
<summary>Lösung</summary>

$4^3 = 64$, also $\log_4 64 = 3$.

</details>

2. Bestimme $\log_2 \frac{1}{32}$.

<details>
<summary>Lösung</summary>

$\frac{1}{32} = 2^{-5}$, also $\log_2 \frac{1}{32} = -5$.

</details>

3. Berechne $\lg 50 + \lg 20$ ohne Taschenrechner.

<details>
<summary>Lösung</summary>

$\lg 50 + \lg 20 = \lg 1000 = 3$.

</details>

4. Vereinfache $3 \log_2 4 - \log_2 8$.

<details>
<summary>Lösung</summary>

$\log_2 4 = 2$ und $\log_2 8 = 3$, also $3 \cdot 2 - 3 = 3$.

</details>

5. Berechne $\log_3 20$ mit dem Basiswechsel auf zwei Nachkommastellen.

<details>
<summary>Lösung</summary>

$\log_3 20 = \frac{\ln 20}{\ln 3} \approx \frac{2{,}996}{1{,}099} \approx 2{,}73$.

</details>
