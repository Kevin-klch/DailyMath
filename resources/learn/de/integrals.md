---
title: Stammfunktionen und Integrale
category: calculus
order: 80
level: 3
summary: Ableiten rückwärts – wie man Stammfunktionen findet, die wichtigsten Integrationsregeln und der Hauptsatz, der sie mit dem bestimmten Integral verbindet.
related: differentiation-rules, area-under-curves, derivatives
---

Beim Ableiten fragt man: Welche Steigung hat eine Funktion? Beim **Integrieren** geht man den umgekehrten Weg: Die Ableitung ist bekannt – von welcher Funktion stammt sie? Eine solche Funktion heißt **Stammfunktion**. Stammfunktionen sind der Schlüssel, um Flächen, zurückgelegte Wege und andere Gesamtgrößen zu berechnen.

## Stammfunktionen

Eine Funktion $F$ heißt **Stammfunktion** von $f$, wenn $F'(x) = f(x)$ gilt.

Zum Beispiel ist $F(x) = x^2$ eine Stammfunktion von $f(x) = 2x$, denn $(x^2)' = 2x$. Aber auch $x^2 + 5$ und $x^2 - 3$ haben die Ableitung $2x$, weil die Ableitung einer Konstanten null ist. Jede Funktion hat also unendlich viele Stammfunktionen, und diese unterscheiden sich nur um eine Konstante.

> **Merke:** Ist $F$ eine Stammfunktion von $f$, dann sind alle Stammfunktionen von der Form $F(x) + C$ mit einer beliebigen Konstanten $C$. Eine Stammfunktion lässt sich immer durch Ableiten überprüfen.

Die Menge aller Stammfunktionen schreibt man als **unbestimmtes Integral**:

$$\int f(x) \, dx = F(x) + C$$

Dabei ist $\int$ das Integralzeichen, $f(x)$ der Integrand, und $dx$ zeigt an, dass $x$ die Integrationsvariable ist.

## Integrationsregeln

Liest man die Ableitungsregeln rückwärts, erhält man die Grundregeln des Integrierens.

**Potenzregel:** Exponent um eins erhöhen und durch den neuen Exponenten teilen:

$$\int x^n \, dx = \frac{x^{n+1}}{n+1} + C \qquad (n \ne -1)$$

Probe: $\left(\frac{x^{n+1}}{n+1}\right)' = \frac{(n+1)x^n}{n+1} = x^n$.

**Weitere Grundintegrale:**

- $\int \frac{1}{x} \, dx = \ln|x| + C$ (das ist der fehlende Fall $n = -1$)
- $\int e^x \, dx = e^x + C$
- $\int \sin x \, dx = -\cos x + C$
- $\int \cos x \, dx = \sin x + C$

**Faktor- und Summenregel:** Konstante Faktoren bleiben stehen, Summen werden gliedweise integriert.

### Beispiel 1

$$\int (6x^2 - 4x + 3) \, dx = 6 \cdot \frac{x^3}{3} - 4 \cdot \frac{x^2}{2} + 3x + C = 2x^3 - 2x^2 + 3x + C$$

### Beispiel 2: Wurzeln und Brüche

Zuerst als Potenz schreiben: $\sqrt{x} = x^{\frac{1}{2}}$ und $\frac{1}{x^2} = x^{-2}$.

$$\int \left(\sqrt{x} + \frac{1}{x^2}\right) dx = \frac{x^{\frac{3}{2}}}{\frac{3}{2}} + \frac{x^{-1}}{-1} + C = \frac{2}{3}x^{\frac{3}{2}} - \frac{1}{x} + C$$

## Lineare innere Funktionen

Ist die innere Funktion linear, also $ax + b$, integriert man die äußere Funktion und teilt durch $a$ – die Umkehrung der Kettenregel:

$$\int f(ax + b) \, dx = \frac{1}{a} F(ax + b) + C$$

### Beispiel 3

$$\int \cos(2x) \, dx = \frac{1}{2}\sin(2x) + C \qquad \int e^{3x} \, dx = \frac{1}{3}e^{3x} + C$$

## Stammfunktion mit Bedingung

Manchmal ist genau die Stammfunktion gesucht, deren Graph durch einen bestimmten Punkt geht.

### Beispiel 4

Bestimme die Stammfunktion $F$ von $f(x) = 2x + 1$ mit $F(1) = 5$.

Alle Stammfunktionen: $F(x) = x^2 + x + C$. Bedingung einsetzen: $1 + 1 + C = 5$, also $C = 3$. Gesucht ist $F(x) = x^2 + x + 3$.

## Das bestimmte Integral

Das **bestimmte Integral** $\int_a^b f(x) \, dx$ hat feste Grenzen $a$ und $b$ und ist eine *Zahl*, keine Funktion. Anschaulich zerlegt man das Intervall $[a; b]$ in schmale Streifen und addiert die Produkte „Höhe mal Breite“ – im Grenzfall unendlich schmaler Streifen. Das Erstaunliche: Man kann es mit einer beliebigen Stammfunktion ausrechnen.

> **Merke:** Hauptsatz der Differential- und Integralrechnung: $\displaystyle\int_a^b f(x) \, dx = \big[F(x)\big]_a^b = F(b) - F(a)$, wobei $F$ eine beliebige Stammfunktion von $f$ ist.

Die Konstante $C$ hebt sich in der Differenz auf, man kann sie also weglassen.

### Beispiel 5

$$\int_1^3 2x \, dx = \big[x^2\big]_1^3 = 9 - 1 = 8$$

$$\int_0^1 e^x \, dx = \big[e^x\big]_0^1 = e - 1$$

Nützliche Eigenschaften: $\int_a^a f(x) \, dx = 0$, beim Vertauschen der Grenzen ändert sich das Vorzeichen, und es gilt $\int_a^b f \, dx + \int_b^c f \, dx = \int_a^c f \, dx$. Wie das bestimmte Integral mit Flächeninhalten zusammenhängt, erklärt der Artikel über bestimmte Integrale und Flächen.

## Typische Fehler

- Beim unbestimmten Integral das $+ C$ vergessen.
- Die Potenzregel für $n = -1$ verwenden: $\int \frac{1}{x} \, dx$ ist $\ln|x| + C$, nicht $\frac{x^0}{0}$.
- Produkte faktorweise integrieren – für Integrale gibt es keine so einfache Produktregel.
- Vorzeichenfehler bei Sinus und Kosinus: $\int \sin x \, dx = -\cos x + C$.
- $F(a) - F(b)$ statt $F(b) - F(a)$ rechnen.

## Übungen

1. Bestimme $\int (4x^3 + 2x) \, dx$.

<details>
<summary>Lösung</summary>

$4 \cdot \frac{x^4}{4} + 2 \cdot \frac{x^2}{2} + C = x^4 + x^2 + C$.

</details>

2. Bestimme $\int \left(\frac{3}{x} + e^x\right) dx$.

<details>
<summary>Lösung</summary>

$3\ln|x| + e^x + C$.

</details>

3. Berechne $\int_0^2 (x^2 + 1) \, dx$.

<details>
<summary>Lösung</summary>

$\left[\frac{x^3}{3} + x\right]_0^2 = \left(\frac{8}{3} + 2\right) - 0 = \frac{14}{3}$.

</details>

4. Bestimme $\int e^{2x + 1} \, dx$.

<details>
<summary>Lösung</summary>

Lineare innere Funktion mit $a = 2$: $\frac{1}{2}e^{2x + 1} + C$. Probe: $\left(\frac{1}{2}e^{2x+1}\right)' = \frac{1}{2} \cdot 2 e^{2x+1} = e^{2x+1}$.

</details>

5. Bestimme die Stammfunktion $F$ von $f(x) = 6x^2$ mit $F(1) = 4$.

<details>
<summary>Lösung</summary>

$F(x) = 2x^3 + C$. Aus $F(1) = 2 + C = 4$ folgt $C = 2$, also $F(x) = 2x^3 + 2$.

</details>
