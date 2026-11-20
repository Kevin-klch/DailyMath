---
title: Grenzwerte
category: calculus
order: 20
level: 3
summary: Welchem Wert nähert sich eine Folge oder Funktion an? Limes-Schreibweise, einseitige Grenzwerte, wichtige Standardgrenzwerte und Rechentechniken.
related: sequences-and-series, continuity, derivatives
---

Ein **Grenzwert** (lateinisch *Limes*) beschreibt den Wert, dem sich eine Folge oder Funktion immer weiter annähert – auch wenn sie ihn nie ganz erreicht. Grenzwerte sind das Fundament der Analysis: Ableitung, Integral und Stetigkeit werden alle mit ihrer Hilfe definiert. Hier lernst du, die Schreibweise zu lesen und Grenzwerte praktisch zu berechnen.

## Grenzwerte von Folgen

Sieh dir die Folge $a_n = \frac{1}{n}$ an: $1, \frac{1}{2}, \frac{1}{3}, \frac{1}{4}, \ldots$ Die Glieder werden immer kleiner und kommen der $0$ beliebig nahe, ohne sie je zu erreichen. Man schreibt

$$\lim_{n \to \infty} \frac{1}{n} = 0$$

und liest: „Der Limes von $\frac{1}{n}$ für $n$ gegen unendlich ist $0$.“ Eine Folge mit Grenzwert heißt **konvergent**, sonst **divergent**. Divergent sind zum Beispiel $a_n = n^2$ (wächst über jede Grenze) und $a_n = (-1)^n$ (springt ewig zwischen $-1$ und $1$ hin und her). Eine Folge mit dem Grenzwert $0$ nennt man auch **Nullfolge**.

> **Merke:** $\lim_{n \to \infty} a_n = g$ bedeutet: Egal wie klein man einen Abstand $\varepsilon > 0$ wählt – ab einem bestimmten Index liegen *alle* Folgenglieder näher als $\varepsilon$ an $g$.

## Grenzwerte von Funktionen

Bei Funktionen gibt es zwei typische Fragestellungen.

**Verhalten im Unendlichen:** Was passiert mit $f(x)$ für $x \to \infty$ bzw. $x \to -\infty$? Zum Beispiel ist $\lim_{x \to \infty} \frac{1}{x} = 0$ – der Graph schmiegt sich an die $x$-Achse an, sie ist eine waagrechte Asymptote.

**Verhalten an einer Stelle:** Was passiert mit $f(x)$, wenn sich $x$ einer Zahl $a$ nähert? Man schreibt $\lim_{x \to a} f(x)$. Dabei zählen nur die Funktionswerte *in der Nähe* von $a$, nicht der Wert an der Stelle selbst – $f(a)$ muss nicht einmal definiert sein.

### Links- und rechtsseitiger Grenzwert

Manchmal kommt es darauf an, von welcher Seite man sich $a$ nähert. Betrachte $f(x) = \frac{1}{x}$ in der Nähe von $0$:

$$\lim_{x \to 0^-} \frac{1}{x} = -\infty \qquad \lim_{x \to 0^+} \frac{1}{x} = +\infty$$

$x \to 0^-$ bedeutet „von links“ (Werte knapp unter $0$), $x \to 0^+$ bedeutet „von rechts“. Der Grenzwert $\lim_{x \to a} f(x)$ existiert nur, wenn links- und rechtsseitiger Grenzwert existieren und übereinstimmen. Hier sind sie verschieden, also existiert $\lim_{x \to 0} \frac{1}{x}$ nicht. Der Graph hat bei $x = 0$ eine Polstelle mit senkrechter Asymptote.

## Grenzwertsätze

Grenzwerte vertragen sich gut mit den Grundrechenarten. Existieren die einzelnen Grenzwerte, dann ist der Grenzwert einer Summe gleich der Summe der Grenzwerte – entsprechend für Differenz, Produkt und Quotient (solange man nicht durch null teilt). So kann man komplizierte Terme in einfache Teile zerlegen. Bei „gutartigen“ Funktionen wie ganzrationalen Funktionen darf man einfach einsetzen: $\lim_{x \to 2} (x^2 + 3x) = 4 + 6 = 10$.

## Wichtige Standardgrenzwerte

Einige Grenzwerte tauchen immer wieder auf und sollte man kennen:

- $\lim_{n \to \infty} \frac{1}{n^k} = 0$ für jedes $k > 0$
- $\lim_{n \to \infty} q^n = 0$ für $|q| < 1$
- $\lim_{x \to 0} \frac{\sin x}{x} = 1$ (mit $x$ im Bogenmaß)
- $\lim_{n \to \infty} \left(1 + \frac{1}{n}\right)^n = e \approx 2{,}718$

Der letzte Grenzwert definiert die Eulersche Zahl $e$, die zum Beispiel bei stetiger Verzinsung auftritt.

## Rechentechniken

Beim Einsetzen entstehen oft unbestimmte Ausdrücke wie $\frac{0}{0}$ oder $\frac{\infty}{\infty}$. Das heißt nicht „kein Grenzwert“, sondern: Der Term muss erst umgeformt werden.

### Faktorisieren und Kürzen

Werden Zähler und Nenner bei $x = a$ beide null, haben sie meist den gemeinsamen Faktor $(x - a)$. Man klammert ihn aus und kürzt ihn weg.

### Beispiel 1

$$\lim_{x \to 3} \frac{x^2 - 9}{x - 3}$$

Einsetzen liefert $\frac{0}{0}$. Mit der dritten binomischen Formel ist $x^2 - 9 = (x-3)(x+3)$. Für $x \ne 3$ darf man kürzen:

$$\frac{(x-3)(x+3)}{x - 3} = x + 3 \quad \Rightarrow \quad \lim_{x \to 3} (x + 3) = 6$$

### Höchste Potenz ausklammern

Für $x \to \infty$ (oder $n \to \infty$) teilt man Zähler und Nenner durch die höchste Potenz des Nenners.

### Beispiel 2

$$\lim_{x \to \infty} \frac{3x^2 - x}{x^2 + 5} = \lim_{x \to \infty} \frac{3 - \frac{1}{x}}{1 + \frac{5}{x^2}} = \frac{3 - 0}{1 + 0} = 3$$

> **Merke:** Bei gebrochenrationalen Funktionen entscheiden für $x \to \infty$ nur die höchsten Potenzen. Zählergrad gleich Nennergrad: Grenzwert ist der Quotient der Leitkoeffizienten. Nennergrad größer: Grenzwert $0$. Zählergrad größer: Der Term strebt gegen $\pm\infty$.

### Regel von L'Hospital

Liefert das Einsetzen $\frac{0}{0}$ oder $\frac{\infty}{\infty}$, darf man Zähler und Nenner jeweils getrennt ableiten:

$$\lim_{x \to a} \frac{f(x)}{g(x)} = \lim_{x \to a} \frac{f'(x)}{g'(x)}$$

### Beispiel 3

$\lim_{x \to 0} \frac{e^x - 1}{x}$ ist vom Typ $\frac{0}{0}$. Zähler und Nenner abgeleitet: $\lim_{x \to 0} \frac{e^x}{1} = 1$.

## Typische Fehler

- Aus $\frac{0}{0}$ schließen, dass es keinen Grenzwert gibt – es ist nur ein Signal zum Umformen.
- Die Seite ignorieren: Der Grenzwert existiert nur, wenn links- und rechtsseitiger Grenzwert übereinstimmen.
- L'Hospital anwenden, obwohl kein Fall $\frac{0}{0}$ oder $\frac{\infty}{\infty}$ vorliegt, oder statt Zähler und Nenner getrennt abzuleiten die Quotientenregel benutzen.
- Glauben, dass $\lim_{x \to a} f(x)$ immer gleich $f(a)$ ist – das stimmt nur bei stetigen Funktionen.

## Übungen

1. Berechne $\lim_{n \to \infty} \frac{5n - 2}{2n + 7}$.

<details>
<summary>Lösung</summary>

Durch $n$ teilen: $\frac{5 - \frac{2}{n}}{2 + \frac{7}{n}} \to \frac{5}{2}$.

</details>

2. Berechne $\lim_{x \to 2} \frac{x^2 - 4}{x - 2}$.

<details>
<summary>Lösung</summary>

Typ $\frac{0}{0}$. Faktorisieren: $\frac{(x-2)(x+2)}{x-2} = x + 2$ für $x \ne 2$. Der Grenzwert ist $2 + 2 = 4$.

</details>

3. Berechne $\lim_{x \to \infty} \frac{4x^3 + x}{2x^3 - 5}$.

<details>
<summary>Lösung</summary>

Zählergrad gleich Nennergrad, also Quotient der Leitkoeffizienten: $\frac{4}{2} = 2$.

</details>

4. Bestimme den links- und rechtsseitigen Grenzwert von $f(x) = \frac{1}{x - 1}$ an der Stelle $x = 1$. Existiert $\lim_{x \to 1} f(x)$?

<details>
<summary>Lösung</summary>

Von rechts ist der Nenner klein und positiv, also $\lim_{x \to 1^+} f(x) = +\infty$. Von links ist er klein und negativ, also $\lim_{x \to 1^-} f(x) = -\infty$. Die einseitigen Grenzwerte sind verschieden, der Grenzwert existiert nicht (Polstelle bei $x = 1$).

</details>

5. Berechne $\lim_{x \to 0} \frac{\sin(3x)}{x}$.

<details>
<summary>Lösung</summary>

Typ $\frac{0}{0}$. Mit L'Hospital: $\lim_{x \to 0} \frac{3\cos(3x)}{1} = 3$. Alternativ: $\frac{\sin(3x)}{x} = 3 \cdot \frac{\sin(3x)}{3x}$, und mit dem Standardgrenzwert ergibt sich $3 \cdot 1 = 3$.

</details>
