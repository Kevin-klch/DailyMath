---
title: Ableitungsregeln
category: calculus
order: 50
level: 3
summary: Potenz-, Summen-, Produkt-, Quotienten- und Kettenregel – das Werkzeug, mit dem man fast jede Funktion ohne h-Methode ableiten kann.
related: derivatives, curve-sketching, exponential-functions, trigonometric-functions
---

Jede Ableitung über den Grenzwert des Differenzenquotienten zu berechnen, wäre mühsam. Zum Glück genügen einige wenige **Ableitungsregeln**, um nahezu jede Funktion abzuleiten, die dir begegnet. Man lernt ein paar Grundableitungen auswendig und kombiniert sie dann mit Regeln für Summen, Produkte, Quotienten und Verkettungen.

## Grundregeln

### Konstanten- und Potenzregel

Die Ableitung einer Konstanten ist $0$ – eine waagrechte Gerade hat die Steigung null. Bei Potenzen von $x$ wandert der Exponent als Faktor nach vorn und wird um eins verringert:

> **Merke:** Potenzregel: $\left(x^n\right)' = n \cdot x^{n-1}$. Sie gilt für jeden reellen Exponenten $n$, also auch für negative Zahlen und Brüche.

Beispiele: $(x^5)' = 5x^4$, $(x)' = 1$, und mit negativen bzw. gebrochenen Exponenten:

$$\left(\frac{1}{x}\right)' = \left(x^{-1}\right)' = -x^{-2} = -\frac{1}{x^2} \qquad \left(\sqrt{x}\right)' = \left(x^{\frac{1}{2}}\right)' = \frac{1}{2} x^{-\frac{1}{2}} = \frac{1}{2\sqrt{x}}$$

### Faktor- und Summenregel

Ein konstanter Faktor bleibt beim Ableiten erhalten: $(c \cdot f)' = c \cdot f'$. Eine Summe wird gliedweise abgeleitet: $(f + g)' = f' + g'$.

### Beispiel 1

$$f(x) = 4x^3 - 2x^2 + 7x - 5 \quad \Rightarrow \quad f'(x) = 12x^2 - 4x + 7$$

## Wichtige Grundableitungen

Diese solltest du auswendig kennen:

- $(e^x)' = e^x$ – die e-Funktion ist ihre eigene Ableitung.
- $(\ln x)' = \frac{1}{x}$ für $x > 0$.
- $(\sin x)' = \cos x$ und $(\cos x)' = -\sin x$.
- $(a^x)' = a^x \cdot \ln a$ für $a > 0$.

## Produktregel

Die Ableitung eines Produkts ist **nicht** das Produkt der Ableitungen. Stattdessen gilt:

$$(u \cdot v)' = u' \cdot v + u \cdot v'$$

### Beispiel 2

$f(x) = x^2 \cdot e^x$. Mit $u = x^2$, $u' = 2x$ und $v = e^x$, $v' = e^x$:

$$f'(x) = 2x \cdot e^x + x^2 \cdot e^x = e^x (x^2 + 2x)$$

## Quotientenregel

Für einen Bruch aus zwei Funktionen gilt:

$$\left(\frac{u}{v}\right)' = \frac{u' \cdot v - u \cdot v'}{v^2}$$

Eine Eselsbrücke: „NAZ minus ZAN durch N Quadrat“ – Nenner mal Ableitung des Zählers minus Zähler mal Ableitung des Nenners, geteilt durch den Nenner zum Quadrat.

### Beispiel 3

$f(x) = \frac{2x + 1}{x - 3}$. Hier ist $u = 2x + 1$, $u' = 2$, $v = x - 3$, $v' = 1$:

$$f'(x) = \frac{2(x - 3) - (2x + 1) \cdot 1}{(x - 3)^2} = \frac{2x - 6 - 2x - 1}{(x-3)^2} = \frac{-7}{(x - 3)^2}$$

## Kettenregel

Die Kettenregel ist für **verkettete Funktionen** da, bei denen eine Funktion in eine andere eingesetzt wird, etwa $(3x^2 + 1)^4$ oder $\sin(2x)$. Man zerlegt die Funktion in eine äußere und eine innere Funktion.

> **Merke:** Kettenregel: $\big(f(g(x))\big)' = f'(g(x)) \cdot g'(x)$ – „äußere Ableitung mal innere Ableitung“. Beim Ableiten der äußeren Funktion bleibt das Innere unverändert stehen.

### Beispiel 4

$f(x) = (3x^2 + 1)^4$. Die äußere Funktion ist $(\ldots)^4$ mit der Ableitung $4(\ldots)^3$, die innere Funktion ist $3x^2 + 1$ mit der Ableitung $6x$:

$$f'(x) = 4(3x^2 + 1)^3 \cdot 6x = 24x(3x^2 + 1)^3$$

### Beispiel 5

- $\big(\sin(2x)\big)' = \cos(2x) \cdot 2 = 2\cos(2x)$
- $\left(e^{-x^2}\right)' = e^{-x^2} \cdot (-2x) = -2x e^{-x^2}$

Ein Spezialfall, den man sich merken sollte: Bei linearer innerer Funktion gilt $\big(f(ax + b)\big)' = a \cdot f'(ax + b)$.

## Höhere Ableitungen

Eine Ableitung kann man erneut ableiten. Das Ergebnis $f''$ heißt **zweite Ableitung**; sie beschreibt, wie sich die Steigung selbst ändert, also das Krümmungsverhalten. Für $f(x) = x^4$ ist $f'(x) = 4x^3$, $f''(x) = 12x^2$ und $f'''(x) = 24x$.

## Typische Fehler

- Ein Produkt faktorweise ableiten: $(x^2 e^x)' \ne 2x e^x$.
- Bei der Kettenregel die innere Ableitung vergessen: $(\sin(2x))' \ne \cos(2x)$.
- Im Zähler der Quotientenregel die Reihenfolge vertauschen – wegen des Minuszeichens kommt es darauf an.
- Einen konstanten Faktor wie eine Variable behandeln: $(5x^3)' = 15x^2$, aber $(5)' = 0$.
- $(e^x)' = x e^{x-1}$ schreiben – die Potenzregel gilt nur, wenn die Variable in der Basis steht, nicht im Exponenten.

## Übungen

1. Leite $f(x) = 5x^4 - \frac{3}{x} + \sqrt{x}$ ab.

<details>
<summary>Lösung</summary>

Schreibe $-\frac{3}{x} = -3x^{-1}$ und $\sqrt{x} = x^{\frac{1}{2}}$. Dann ist $f'(x) = 20x^3 + 3x^{-2} + \frac{1}{2}x^{-\frac{1}{2}} = 20x^3 + \frac{3}{x^2} + \frac{1}{2\sqrt{x}}$.

</details>

2. Leite $f(x) = x \cdot \sin x$ ab.

<details>
<summary>Lösung</summary>

Produktregel: $f'(x) = 1 \cdot \sin x + x \cdot \cos x = \sin x + x\cos x$.

</details>

3. Leite $f(x) = \frac{x^2}{x + 1}$ ab.

<details>
<summary>Lösung</summary>

Quotientenregel: $f'(x) = \frac{2x(x + 1) - x^2 \cdot 1}{(x + 1)^2} = \frac{x^2 + 2x}{(x + 1)^2}$.

</details>

4. Leite $f(x) = e^{3x - 2}$ ab.

<details>
<summary>Lösung</summary>

Kettenregel mit der inneren Ableitung $3$: $f'(x) = 3e^{3x - 2}$.

</details>

5. Leite $f(x) = \ln(x^2 + 1)$ ab.

<details>
<summary>Lösung</summary>

Äußere Ableitung $\frac{1}{x^2 + 1}$, innere Ableitung $2x$: $f'(x) = \frac{2x}{x^2 + 1}$.

</details>
