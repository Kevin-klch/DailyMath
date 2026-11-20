---
title: Trigonometrische Funktionen
category: functions
order: 60
level: 3
summary: Sinus, Kosinus und Tangens als periodische Funktionen – Graphen, Periode, Amplitude, Nullstellen, Symmetrie, die allgemeine Sinusfunktion und Gleichungen wie sin x = c.
related: unit-circle, trigonometry, transformations-of-functions, derivatives
---

In der Geometrie sind Sinus und Kosinus Seitenverhältnisse im rechtwinkligen Dreieck. Über den Einheitskreis erweitert, werden daraus Funktionen, die für **jede** reelle Zahl definiert sind – und ihre Graphen sind Wellen, die sich endlos wiederholen. Damit sind sie das natürliche Werkzeug für alles Periodische: Schall, Wechselstrom, Ebbe und Flut, die Tageslänge im Lauf eines Jahres oder die Bewegung eines Pendels.

## Vom Einheitskreis zum Graphen

Stell dir einen Punkt vor, der gegen den Uhrzeigersinn auf dem Einheitskreis (Radius $1$) läuft. Hat er einen Bogen der Länge $x$ zurückgelegt – das ist der Winkel im **Bogenmaß** –, so hat er die Koordinaten $(\cos x \mid \sin x)$. $\sin x$ ist also die Höhe des Punktes, $\cos x$ seine waagerechte Lage. Eine volle Umdrehung entspricht $2\pi$.

Trägt man die Höhe über $x$ auf, entsteht die **Sinuskurve**, bei der waagerechten Lage die **Kosinuskurve**.

| $x$ | $0$ | $\frac{\pi}{6}$ | $\frac{\pi}{2}$ | $\frac{5\pi}{6}$ | $\pi$ | $\frac{3\pi}{2}$ | $2\pi$ |
|---|---|---|---|---|---|---|---|
| $\sin x$ | $0$ | $\frac{1}{2}$ | $1$ | $\frac{1}{2}$ | $0$ | $-1$ | $0$ |
| $\cos x$ | $1$ | $\frac{\sqrt{3}}{2}$ | $0$ | $-\frac{\sqrt{3}}{2}$ | $-1$ | $0$ | $1$ |

Die Sinuskurve beginnt im Ursprung, steigt bis zum Hochpunkt $1$ bei $\frac{\pi}{2}$, fällt bei $\pi$ wieder auf $0$, erreicht bei $\frac{3\pi}{2}$ den Tiefpunkt $-1$ und kehrt bei $2\pi$ zu $0$ zurück – danach wiederholt sich alles. Die Kosinuskurve hat genau dieselbe Form, beginnt aber in ihrem Hochpunkt $(0 \mid 1)$.

## Wichtige Eigenschaften von Sinus und Kosinus

> **Merke:** Sinus und Kosinus sind periodisch mit der Periode $2\pi$: $\sin(x + 2\pi) = \sin x$ und $\cos(x + 2\pi) = \cos x$. Ihre Werte liegen immer zwischen $-1$ und $1$.

| | $\sin x$ | $\cos x$ |
|---|---|---|
| Definitionsmenge | $\mathbb{R}$ | $\mathbb{R}$ |
| Wertemenge | $[-1; 1]$ | $[-1; 1]$ |
| Periode | $2\pi$ | $2\pi$ |
| Nullstellen | $k\pi$ | $\frac{\pi}{2} + k\pi$ |
| Hochpunkte bei | $\frac{\pi}{2} + 2k\pi$ | $2k\pi$ |
| Symmetrie | punktsymmetrisch: $\sin(-x) = -\sin x$ | achsensymmetrisch: $\cos(-x) = \cos x$ |

Dabei steht $k$ für eine beliebige ganze Zahl. Zwei weitere Zusammenhänge braucht man ständig:

- Die Kosinuskurve ist die um $\frac{\pi}{2}$ nach links verschobene Sinuskurve: $\cos x = \sin\left(x + \frac{\pi}{2}\right)$.
- Der Satz des Pythagoras im Einheitskreis liefert den „trigonometrischen Pythagoras“ $\sin^2 x + \cos^2 x = 1$.

## Die Tangensfunktion

Der Tangens ist definiert als

$$\tan x = \frac{\sin x}{\cos x}$$

Er ist überall dort nicht definiert, wo $\cos x = 0$ ist, also bei $x = \frac{\pi}{2} + k\pi$; dort hat der Graph **senkrechte Asymptoten** (Polstellen). Zwischen zwei Polstellen steigt der Graph von $-\infty$ bis $+\infty$ an und geht dabei durch die Nullstellen $x = k\pi$. Der Tangens hat die Periode $\pi$, nicht $2\pi$, und seine Wertemenge ist ganz $\mathbb{R}$.

## Die allgemeine Sinusfunktion

Durch Strecken und Verschieben der Sinuskurve erhält man

$$f(x) = a \cdot \sin\big(b(x - c)\big) + d \qquad (b > 0)$$

> **Merke:** $|a|$ ist die **Amplitude**, die Periode ist $p = \frac{2\pi}{b}$, $c$ verschiebt die Kurve in $x$-Richtung und $d$ in $y$-Richtung – die Kurve schwingt dann um die Mittellinie $y = d$ zwischen $d - |a|$ und $d + |a|$.

Ein negatives $a$ spiegelt die Kurve zusätzlich an ihrer Mittellinie.

### Beispiel 1

$f(x) = 3\sin(2x)$: Amplitude $3$, Periode $\frac{2\pi}{2} = \pi$. Die Kurve durchläuft auf $[0; \pi]$ eine ganze Schwingung und erreicht den ersten Hochpunkt mit dem Wert $3$ bei $x = \frac{\pi}{4}$, also nach einer Viertelperiode.

### Beispiel 2

$f(x) = 2\sin\left(x - \frac{\pi}{3}\right) + 1$: Amplitude $2$, Periode $2\pi$, um $\frac{\pi}{3}$ nach rechts und um $1$ nach oben verschoben. Die Werte reichen von $1 - 2 = -1$ bis $1 + 2 = 3$, und bei $x = \frac{\pi}{3}$ schneidet die Kurve ihre Mittellinie $y = 1$ steigend.

### Beispiel 3: Funktionsgleichung aus einer Beschreibung

Eine Schwingung hat den Höchstwert $5$, den Tiefstwert $1$ und die Periode $4$; bei $x = 0$ liegt sie auf der Mittellinie und steigt. Dann ist $d = \frac{5 + 1}{2} = 3$, $a = \frac{5 - 1}{2} = 2$, $b = \frac{2\pi}{4} = \frac{\pi}{2}$ und $c = 0$:

$$f(x) = 2\sin\left(\frac{\pi}{2}x\right) + 3$$

## Trigonometrische Gleichungen lösen

Wegen der Periodizität hat eine Gleichung wie $\sin x = c$ (mit $-1 < c < 1$) unendlich viele Lösungen – zwei in jeder Periode.

### Beispiel 4

Löse $\sin x = \frac{1}{2}$ für $0 \le x < 2\pi$.

1. Eine Lösung kennt man aus der Tabelle: $x_1 = \frac{\pi}{6}$.
2. Die Sinuskurve ist symmetrisch zur Geraden $x = \frac{\pi}{2}$, also ist die zweite Lösung $x_2 = \pi - \frac{\pi}{6} = \frac{5\pi}{6}$.

Alle Lösungen: $x = \frac{\pi}{6} + 2k\pi$ oder $x = \frac{5\pi}{6} + 2k\pi$.

Beim Kosinus nutzt man stattdessen die Symmetrie zur $y$-Achse: Löst $x_1$ die Gleichung $\cos x = c$, dann auch $2\pi - x_1$.

## Typische Fehler

- Im Gradmaß rechnen, obwohl Taschenrechner oder Formel das Bogenmaß erwarten – bei Funktionen ist $x$ im Bogenmaß angegeben (Taschenrechner auf RAD stellen).
- Bei $\sin x = c$ nur eine Lösung angeben – pro Periode gibt es zwei.
- Die Periode falsch bestimmen: Bei $\sin(3x)$ ist sie $\frac{2\pi}{3}$, nicht $6\pi$.
- Bei $\sin(2x - \pi)$ die Verschiebung $\pi$ ablesen: Erst ausklammern, $\sin\big(2(x - \frac{\pi}{2})\big)$ – die Verschiebung ist $\frac{\pi}{2}$.
- Vergessen, dass $\tan x$ bei $\frac{\pi}{2} + k\pi$ nicht definiert ist.

## Übungen

1. Gib Amplitude und Periode von $f(x) = 4\cos(3x)$ an.

<details>
<summary>Lösung</summary>

Amplitude $4$, Periode $\frac{2\pi}{3}$.

</details>

2. Bestimme die Wertemenge von $f(x) = -2\sin x + 3$.

<details>
<summary>Lösung</summary>

$-2\sin x$ nimmt Werte zwischen $-2$ und $2$ an; durch die Verschiebung um $3$ ergibt sich $W = [1; 5]$.

</details>

3. Löse $\cos x = 0$ für $0 \le x < 2\pi$.

<details>
<summary>Lösung</summary>

$x = \frac{\pi}{2}$ und $x = \frac{3\pi}{2}$.

</details>

4. Löse $\cos x = \frac{1}{2}$ für $0 \le x < 2\pi$.

<details>
<summary>Lösung</summary>

Am Einheitskreis gilt $\cos \frac{\pi}{3} = \frac{1}{2}$, also $x_1 = \frac{\pi}{3}$. Wegen der Symmetrie ist $x_2 = 2\pi - \frac{\pi}{3} = \frac{5\pi}{3}$.

</details>

5. Gib eine Sinusfunktion mit Höchstwert $7$, Tiefstwert $1$ und Periode $\pi$ an, die bei $x = 0$ auf der Mittellinie liegt und steigt.

<details>
<summary>Lösung</summary>

$d = \frac{7 + 1}{2} = 4$, $a = \frac{7 - 1}{2} = 3$, $b = \frac{2\pi}{\pi} = 2$. Also $f(x) = 3\sin(2x) + 4$.

</details>
