---
title: Exponentialgleichungen
category: algebra
order: 100
level: 3
summary: Wie man Gleichungen löst, bei denen die Unbekannte im Exponenten steht – durch Exponentenvergleich, Logarithmieren oder Substitution, mit Anwendungen zu Wachstum und Zinsen.
related: logarithms, laws-of-exponents, exponential-functions
---

Bei einer **Exponentialgleichung** steht die Unbekannte im Exponenten, etwa in $2^x = 32$ oder $1000 \cdot 1{,}05^n = 2000$. Solche Gleichungen tauchen immer dann auf, wenn etwas um einen festen Faktor wächst oder schrumpft: Bevölkerungen, Guthaben mit Zinseszins, radioaktiver Zerfall, abkühlender Kaffee. Die üblichen Werkzeuge für lineare oder quadratische Gleichungen helfen hier nicht weiter – man braucht die Potenzgesetze und den Logarithmus.

## Überblick über die Strategie

1. Die Potenz **isolieren**, sodass die Form $b^{\ldots} = c$ entsteht.
2. Lassen sich beide Seiten als Potenzen **derselben Basis** schreiben, vergleicht man die Exponenten.
3. Sonst beide Seiten **logarithmieren**.
4. Kommen $b^x$ und $b^{2x}$ gemeinsam vor, hilft eine **Substitution**.

## Exponentenvergleich

Aus $b^m = b^n$ (mit $b > 0$, $b \neq 1$) folgt $m = n$. Kann man beide Seiten mit derselben Basis schreiben, bleibt also nur eine Gleichung für die Exponenten übrig.

### Beispiel 1

$$2^x = 32 = 2^5 \quad\Rightarrow\quad x = 5$$

### Beispiel 2

$$9^{x+1} = 27^x$$

Sowohl $9$ als auch $27$ sind Potenzen von $3$:

$$3^{2(x+1)} = 3^{3x} \quad\Rightarrow\quad 2x + 2 = 3x \quad\Rightarrow\quad x = 2$$

Probe: $9^3 = 729$ und $27^2 = 729$.

> **Merke:** Gleiche Basis auf beiden Seiten bedeutet gleiche Exponenten: Aus $b^m = b^n$ folgt $m = n$.

## Logarithmieren

Passen die Zahlen nicht zu einer gemeinsamen Basis, wendet man auf beide Seiten einen Logarithmus an. Das Logarithmengesetz $\ln b^x = x \cdot \ln b$ holt die Unbekannte aus dem Exponenten herunter.

### Beispiel 3

$$3^x = 20$$

Beide Seiten logarithmieren: $x \cdot \ln 3 = \ln 20$, also

$$x = \frac{\ln 20}{\ln 3} \approx 2{,}73$$

Das ist dasselbe wie $x = \log_3 20$. Allgemein gilt:

$$b^x = c \quad\Longleftrightarrow\quad x = \log_b c = \frac{\ln c}{\ln b} \qquad (c > 0)$$

> **Merke:** Der Logarithmus ist das Werkzeug, mit dem man die Unbekannte aus dem Exponenten holt: $\ln(b^x) = x \ln b$.

### Beispiel 4: erst isolieren

$$5 \cdot 2^x - 3 = 37$$

Plus $3$: $5 \cdot 2^x = 40$. Geteilt durch $5$: $2^x = 8$, also $x = 3$. Erst logarithmieren, wenn die Potenz allein steht – $\ln(5 \cdot 2^x - 3)$ lässt sich nicht vereinfachen.

### Beispiel 5: Basis e

$$e^{2x} = 7 \quad\Rightarrow\quad 2x = \ln 7 \quad\Rightarrow\quad x = \frac{\ln 7}{2} \approx 0{,}97$$

### Beispiel 6: verschiedene Basen

$$2^{x+1} = 3^x$$

Logarithmieren: $(x + 1)\ln 2 = x \ln 3$. Ausmultiplizieren und die $x$-Glieder sammeln:

$$x \ln 2 + \ln 2 = x \ln 3 \quad\Rightarrow\quad \ln 2 = x(\ln 3 - \ln 2) \quad\Rightarrow\quad x = \frac{\ln 2}{\ln 3 - \ln 2} \approx 1{,}71$$

## Substitution

Gleichungen mit $b^{2x}$ und $b^x$ sind verkleidete quadratische Gleichungen, denn $b^{2x} = (b^x)^2$.

### Beispiel 7

$$4^x - 6 \cdot 2^x + 8 = 0$$

Man setzt $u = 2^x$. Dann ist $4^x = u^2$, und die Gleichung lautet $u^2 - 6u + 8 = 0$. Mit der p-q-Formel: $u_{1,2} = 3 \pm \sqrt{9 - 8} = 3 \pm 1$, also $u_1 = 4$ und $u_2 = 2$. Rücksubstitution: $2^x = 4$ ergibt $x = 2$, und $2^x = 2$ ergibt $x = 1$.

Liefert die Substitution einen negativen Wert für $u$, fällt er weg: $2^x$ ist immer positiv.

## Keine Lösung

Da $b^x > 0$ für jedes $x$ gilt, haben Gleichungen wie $2^x = -4$ oder $3^x = 0$ **keine Lösung**.

## Anwendung: Zinseszins

### Beispiel 8

Du legst 1000 € zu 5 % Zinsen pro Jahr an. Nach wie vielen Jahren hat sich das Geld verdoppelt?

$$1000 \cdot 1{,}05^n = 2000 \quad\Rightarrow\quad 1{,}05^n = 2 \quad\Rightarrow\quad n = \frac{\ln 2}{\ln 1{,}05} \approx 14{,}2$$

Nach 15 vollen Jahren hat sich das Guthaben mehr als verdoppelt.

## Typische Fehler

- Logarithmieren, bevor die Potenz isoliert ist.
- $\ln(5 \cdot 2^x) = 5x \ln 2$ schreiben – richtig ist $\ln 5 + x \ln 2$.
- Exponenten vergleichen, obwohl die Basen verschieden sind: Aus $2^x = 3^5$ folgt **nicht** $x = 5$.
- Falsch kürzen: $\frac{\ln 20}{\ln 3}$ ist **weder** $\ln \frac{20}{3}$ noch $\frac{20}{3}$.
- Nach einer Substitution negative Werte behalten, also etwa $2^x = -1$ „lösen“.

## Übungen

1. Löse $3^{x-2} = 81$.

<details>
<summary>Lösung</summary>

$81 = 3^4$, also $x - 2 = 4$ und $x = 6$.

</details>

2. Löse $4^x = 8^{x-1}$.

<details>
<summary>Lösung</summary>

Basis $2$: $2^{2x} = 2^{3(x-1)}$, also $2x = 3x - 3$ und $x = 3$. Probe: $4^3 = 64 = 8^2$.

</details>

3. Löse $7 \cdot 5^x = 175$.

<details>
<summary>Lösung</summary>

Geteilt durch $7$: $5^x = 25 = 5^2$, also $x = 2$.

</details>

4. Löse $2^x = 10$ auf zwei Nachkommastellen genau.

<details>
<summary>Lösung</summary>

$x = \frac{\ln 10}{\ln 2} \approx \frac{2{,}303}{0{,}693} \approx 3{,}32$.

</details>

5. Löse $9^x - 10 \cdot 3^x + 9 = 0$.

<details>
<summary>Lösung</summary>

Mit $u = 3^x$: $u^2 - 10u + 9 = 0$. Die p-q-Formel liefert $u_{1,2} = 5 \pm \sqrt{25 - 9} = 5 \pm 4$, also $u_1 = 9$ und $u_2 = 1$. Aus $3^x = 9$ folgt $x = 2$, aus $3^x = 1$ folgt $x = 0$.

</details>
