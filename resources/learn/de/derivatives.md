---
title: Die Ableitung
category: calculus
order: 40
level: 3
summary: Wie steil ist eine Kurve in einem einzelnen Punkt? Von der Sekantensteigung zur Tangentensteigung – die Idee hinter der Ableitung.
related: limits, differentiation-rules, linear-functions, curve-sketching
---

Bei einer Geraden ist die Steigung überall gleich. Eine Kurve dagegen ist an manchen Stellen steil, an anderen flach. Die **Ableitung** misst die Steigung einer Kurve in einem einzelnen Punkt – und damit die momentane Änderungsrate einer Größe, etwa die Geschwindigkeit eines Autos in genau einem Augenblick. Sie ist die zentrale Idee der Differentialrechnung.

## Mittlere Änderungsrate

Gegeben ist eine Funktion $f$. Wir betrachten zwei Punkte auf ihrem Graphen, an den Stellen $x_0$ und $x_0 + h$. Die Gerade durch diese Punkte heißt **Sekante**. Ihre Steigung ist der **Differenzenquotient**:

$$\frac{f(x_0 + h) - f(x_0)}{h}$$

Er gibt die **mittlere Änderungsrate** von $f$ zwischen den beiden Stellen an – „Änderung von $y$ geteilt durch Änderung von $x$“.

### Beispiel 1

Für $f(x) = x^2$ zwischen $x = 1$ und $x = 3$: $\frac{f(3) - f(1)}{3 - 1} = \frac{9 - 1}{2} = 4$. Im Mittel steigt die Funktion um $4$ Einheiten pro Einheit in $x$-Richtung.

## Von der Sekante zur Tangente

Jetzt lassen wir den zweiten Punkt auf den ersten zuwandern, das heißt, $h$ wird immer kleiner. Aus der Sekante wird die **Tangente** – die Gerade, die den Graphen an der Stelle $x_0$ gerade berührt. Ihre Steigung ist der Grenzwert der Differenzenquotienten, der **Differentialquotient**.

> **Merke:** Die Ableitung von $f$ an der Stelle $x_0$ ist $f'(x_0) = \lim\limits_{h \to 0} \dfrac{f(x_0 + h) - f(x_0)}{h}$. Sie ist die Steigung der Tangente im Punkt $P(x_0 \mid f(x_0))$ – die momentane Änderungsrate.

Existiert dieser Grenzwert, heißt $f$ an der Stelle $x_0$ **differenzierbar**.

### Beispiel 2: die h-Methode

Bestimme die Ableitung von $f(x) = x^2$ an der Stelle $x_0 = 3$.

$$\frac{f(3 + h) - f(3)}{h} = \frac{9 + 6h + h^2 - 9}{h} = \frac{6h + h^2}{h} = 6 + h$$

Für $h \to 0$ strebt das gegen $6$. Also ist $f'(3) = 6$: Bei $x = 3$ ist die Parabel so steil wie eine Gerade mit der Steigung $6$.

## Die Ableitungsfunktion

Statt an einer festen Stelle kann man dieselbe Rechnung für ein allgemeines $x$ durchführen:

$$\frac{(x + h)^2 - x^2}{h} = \frac{2xh + h^2}{h} = 2x + h \;\to\; 2x$$

Die Funktion $f(x) = x^2$ hat also die **Ableitungsfunktion** $f'(x) = 2x$. Sie liefert die Steigung an jeder Stelle auf einmal: $f'(3) = 6$, $f'(0) = 0$ (im Scheitelpunkt ist der Graph waagrecht), $f'(-1) = -2$ (fallend). In der Praxis rechnet man nicht jedes Mal mit der h-Methode – die Ableitungsregeln liefern Ableitungen direkt.

Übliche Schreibweisen sind $f'(x)$ („f Strich von x“) und $\frac{dy}{dx}$. Die zweite erinnert an die Herkunft: ein Quotient winziger Änderungen von $y$ und $x$.

## Die Tangentengleichung

Die Tangente geht durch den Punkt $P(x_0 \mid f(x_0))$ und hat die Steigung $f'(x_0)$. Daraus folgt:

> **Merke:** Tangente an der Stelle $x_0$: $\; y = f'(x_0) \cdot (x - x_0) + f(x_0)$

### Beispiel 3

Tangente an $f(x) = x^2$ bei $x_0 = 3$: $f(3) = 9$ und $f'(3) = 6$, also

$$y = 6(x - 3) + 9 = 6x - 9$$

## Was die Ableitung verrät

- $f'(x_0) > 0$: Der Graph steigt an der Stelle $x_0$.
- $f'(x_0) < 0$: Der Graph fällt an der Stelle $x_0$.
- $f'(x_0) = 0$: waagrechte Tangente – ein Kandidat für einen Hoch- oder Tiefpunkt.

In der Physik gilt: Ist $s(t)$ der zurückgelegte Weg nach der Zeit $t$, dann ist $s'(t)$ die Geschwindigkeit. Für $s(t) = 5t^2$ (in Metern, $t$ in Sekunden) liefert die h-Methode

$$\frac{5(2 + h)^2 - 20}{h} = \frac{20h + 5h^2}{h} = 20 + 5h \;\to\; 20,$$

die Momentangeschwindigkeit bei $t = 2$ beträgt also $20$ Meter pro Sekunde.

## Wo es keine Ableitung gibt

An einer Stelle, an der der Graph einen Knick, einen Sprung oder eine senkrechte Tangente hat, ist die Funktion nicht differenzierbar. Beispiel: $f(x) = |x|$ bei $x = 0$. Von rechts ist die Steigung $1$, von links $-1$ – die einseitigen Grenzwerte des Differenzenquotienten sind verschieden, also existiert $f'(0)$ nicht.

## Typische Fehler

- Mittlere Änderungsrate (Sekante) und momentane Änderungsrate (Tangente) verwechseln.
- $h = 0$ einsetzen, *bevor* gekürzt wurde – das ergibt das sinnlose $\frac{0}{0}$.
- $f(x_0)$ (die Höhe des Graphen) und $f'(x_0)$ (seine Steigung) durcheinanderbringen.
- In der Tangentengleichung das $+ f(x_0)$ vergessen.

## Übungen

1. Berechne die mittlere Änderungsrate von $f(x) = x^2$ im Intervall $[1; 4]$.

<details>
<summary>Lösung</summary>

$\frac{f(4) - f(1)}{4 - 1} = \frac{16 - 1}{3} = 5$.

</details>

2. Bestimme mit der h-Methode $f'(1)$ für $f(x) = 3x^2$.

<details>
<summary>Lösung</summary>

$\frac{3(1 + h)^2 - 3}{h} = \frac{3 + 6h + 3h^2 - 3}{h} = 6 + 3h \to 6$. Also ist $f'(1) = 6$.

</details>

3. Bestimme die Gleichung der Tangente an $f(x) = x^2$ an der Stelle $x_0 = -1$.

<details>
<summary>Lösung</summary>

$f(-1) = 1$ und $f'(-1) = 2 \cdot (-1) = -2$. Tangente: $y = -2(x + 1) + 1 = -2x - 1$.

</details>

4. Zeige mit der h-Methode, dass $f(x) = x^3$ die Ableitung $f'(x) = 3x^2$ hat.

<details>
<summary>Lösung</summary>

$(x + h)^3 = x^3 + 3x^2 h + 3x h^2 + h^3$. Also ist $\frac{(x+h)^3 - x^3}{h} = 3x^2 + 3xh + h^2$, und das strebt für $h \to 0$ gegen $3x^2$.

</details>
