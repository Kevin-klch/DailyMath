---
title: Einheitskreis und Bogenmaß
category: geometry
order: 90
level: 3
summary: Wie der Einheitskreis Sinus und Kosinus für jeden Winkel festlegt, wie man mit dem Bogenmaß rechnet und welche Symmetrien Werte in allen Quadranten liefern.
related: trigonometry, trigonometric-functions, circles, angles
---

Im rechtwinkligen Dreieck sind Sinus und Kosinus nur für Winkel zwischen $0^\circ$ und $90^\circ$ erklärt. Der **Einheitskreis** erweitert sie auf *jeden* Winkel – auch auf stumpfe, überstumpfe und negative Winkel. Gleichzeitig führt er auf eine neue Art, Winkel zu messen: das **Bogenmaß**, das in der Analysis und Physik Standard ist.

## Der Einheitskreis

Der Einheitskreis ist der Kreis mit Radius $1$ um den Ursprung eines Koordinatensystems. Starte im Punkt $(1 | 0)$ auf der positiven $x$-Achse und drehe um den Winkel $\alpha$ gegen den Uhrzeigersinn. So landest du in einem Punkt $P$ auf dem Kreis.

Fällt man von $P$ das Lot auf die $x$-Achse, entsteht bei spitzem Winkel ein rechtwinkliges Dreieck mit der Hypotenuse $1$ (dem Radius). Die waagerechte Kathete ist die $x$-Koordinate von $P$, die senkrechte die $y$-Koordinate. Weil die Hypotenuse $1$ ist, liefern die Definitionen am Dreieck $\cos \alpha = x$ und $\sin \alpha = y$.

> **Merke:** Der Punkt auf dem Einheitskreis zum Winkel $\alpha$ ist $P(\cos \alpha \,|\, \sin \alpha)$. Genau so werden Sinus und Kosinus für alle Winkel *definiert*.

Da $P$ auf einem Kreis mit Radius $1$ liegt, folgt mit dem Satz des Pythagoras sofort

$$\sin^2 \alpha + \cos^2 \alpha = 1$$

für jeden Winkel. Der Tangens ist definiert als $\tan \alpha = \frac{\sin \alpha}{\cos \alpha}$ (für $\cos \alpha \neq 0$); er ist die Steigung des Radius $OP$.

## Vorzeichen in den vier Quadranten

Die Achsen teilen die Ebene in vier Quadranten. Die Vorzeichen der Koordinaten bestimmen die Vorzeichen von Sinus und Kosinus:

| Quadrant | Winkel | $\sin \alpha$ | $\cos \alpha$ | $\tan \alpha$ |
|---|---|---|---|---|
| I | $0^\circ$ bis $90^\circ$ | $+$ | $+$ | $+$ |
| II | $90^\circ$ bis $180^\circ$ | $+$ | $-$ | $-$ |
| III | $180^\circ$ bis $270^\circ$ | $-$ | $-$ | $+$ |
| IV | $270^\circ$ bis $360^\circ$ | $-$ | $+$ | $-$ |

Auf den Achsen gilt: $\sin 0^\circ = 0$, $\cos 0^\circ = 1$; $\sin 90^\circ = 1$, $\cos 90^\circ = 0$; $\sin 180^\circ = 0$, $\cos 180^\circ = -1$; $\sin 270^\circ = -1$, $\cos 270^\circ = 0$.

## Symmetrien

Jeder Punkt im II., III. und IV. Quadranten ist ein Spiegelbild eines Punktes im I. Quadranten. Deshalb genügt es, die Werte für spitze Winkel zu kennen:

$$\sin(180^\circ - \alpha) = \sin \alpha \qquad \cos(180^\circ - \alpha) = -\cos \alpha$$

$$\sin(180^\circ + \alpha) = -\sin \alpha \qquad \cos(180^\circ + \alpha) = -\cos \alpha$$

$$\sin(-\alpha) = -\sin \alpha \qquad \cos(-\alpha) = \cos \alpha$$

Negative Winkel bedeuten eine Drehung im Uhrzeigersinn. Und nach einer vollen Umdrehung ist man wieder am Start: $\sin(\alpha + 360^\circ) = \sin \alpha$, $\cos(\alpha + 360^\circ) = \cos \alpha$.

## Das Bogenmaß

Statt eine volle Drehung in $360$ Teile zu teilen, kann man einen Winkel auch durch die **Länge des Bogens** messen, den er aus dem Einheitskreis ausschneidet. Das ist das **Bogenmaß** (Einheit: rad). Der ganze Umfang des Einheitskreises ist $2\pi$, also gilt

$$360^\circ \mathrel{\hat{=}} 2\pi \qquad\qquad 180^\circ \mathrel{\hat{=}} \pi$$

> **Merke:** Umrechnung: $x = \frac{\pi}{180^\circ} \cdot \alpha$ (Gradmaß ins Bogenmaß) und $\alpha = \frac{180^\circ}{\pi} \cdot x$ (Bogenmaß ins Gradmaß).

| Gradmaß | $0^\circ$ | $30^\circ$ | $45^\circ$ | $60^\circ$ | $90^\circ$ | $180^\circ$ | $270^\circ$ | $360^\circ$ |
|---|---|---|---|---|---|---|---|---|
| Bogenmaß | $0$ | $\frac{\pi}{6}$ | $\frac{\pi}{4}$ | $\frac{\pi}{3}$ | $\frac{\pi}{2}$ | $\pi$ | $\frac{3\pi}{2}$ | $2\pi$ |

Ein Radiant entspricht etwa $57{,}3^\circ$. Auf einem Kreis mit Radius $r$ ist die Bogenlänge zum Winkel $x$ im Bogenmaß einfach $b = r \cdot x$ – viel einfacher als mit Gradmaß.

Im Bogenmaß werden die Formeln der Analysis besonders einfach. Deshalb schreibt man trigonometrische Funktionen fast immer mit dem Bogenmaß.

## Beispiele

### Beispiel 1: Umrechnen

$135^\circ$ entspricht $\frac{\pi}{180^\circ} \cdot 135^\circ = \frac{3\pi}{4}$, und $\frac{5\pi}{6}$ entspricht $\frac{180^\circ}{\pi} \cdot \frac{5\pi}{6} = 150^\circ$.

### Beispiel 2: Werte jenseits von 90°

$\sin 150^\circ = \sin(180^\circ - 30^\circ) = \sin 30^\circ = \frac{1}{2}$.

$\cos 240^\circ = \cos(180^\circ + 60^\circ) = -\cos 60^\circ = -\frac{1}{2}$.

### Beispiel 3: eine Gleichung lösen

Bestimme alle Winkel $\alpha$ mit $0^\circ \le \alpha < 360^\circ$ und $\sin \alpha = \frac{1}{2}$.

Der Taschenrechner liefert $\alpha_1 = 30^\circ$. Der Sinus ist aber auch im II. Quadranten positiv, und es gilt $\sin(180^\circ - 30^\circ) = \sin 30^\circ$. Die zweite Lösung ist also $\alpha_2 = 150^\circ$.

## Typische Fehler

- Taschenrechner im falschen Modus (DEG statt RAD oder umgekehrt).
- Beim Lösen von $\sin \alpha = c$ nur das Ergebnis des Taschenrechners angeben – meist gibt es in $[0^\circ; 360^\circ)$ eine zweite Lösung.
- Die Vorzeichen im II. bis IV. Quadranten vergessen.
- Beim Umrechnen mit $\frac{180}{\pi}$ in die falsche Richtung rechnen. Probe: Aus $\pi$ muss $180^\circ$ werden.
- Glauben, $\pi$ „sei“ die Zahl $180$ – es ist $\pi \approx 3{,}14$; nur als *Winkel* entspricht $\pi$ dem Gradmaß $180^\circ$.

## Übungen

1. Rechne $210^\circ$ ins Bogenmaß und $\frac{3\pi}{2}$ ins Gradmaß um.

<details>
<summary>Lösung</summary>

$210^\circ \cdot \frac{\pi}{180^\circ} = \frac{7\pi}{6}$ und $\frac{3\pi}{2} \cdot \frac{180^\circ}{\pi} = 270^\circ$.

</details>

2. Bestimme $\cos 300^\circ$ und $\sin 225^\circ$ exakt.

<details>
<summary>Lösung</summary>

$\cos 300^\circ = \cos(360^\circ - 60^\circ) = \cos 60^\circ = \frac{1}{2}$. $\sin 225^\circ = \sin(180^\circ + 45^\circ) = -\sin 45^\circ = -\frac{\sqrt{2}}{2}$.

</details>

3. Löse $\cos x = -\frac{1}{2}$ für $0 \le x < 2\pi$.

<details>
<summary>Lösung</summary>

Es gilt $\cos \frac{\pi}{3} = \frac{1}{2}$. Der Kosinus ist im II. und III. Quadranten negativ: $x_1 = \pi - \frac{\pi}{3} = \frac{2\pi}{3}$ und $x_2 = \pi + \frac{\pi}{3} = \frac{4\pi}{3}$.

</details>

4. Wie lang ist der Bogen auf einem Kreis mit Radius $4\text{ cm}$ zum Winkel $x = \frac{\pi}{3}$?

<details>
<summary>Lösung</summary>

$b = r \cdot x = 4 \cdot \frac{\pi}{3} = \frac{4\pi}{3} \approx 4{,}19\text{ cm}$.

</details>

5. In welchem Quadranten liegt ein Winkel mit $\sin \alpha < 0$ und $\tan \alpha > 0$?

<details>
<summary>Lösung</summary>

$\sin \alpha < 0$ bedeutet III. oder IV. Quadrant. $\tan \alpha > 0$ verlangt gleiche Vorzeichen von Sinus und Kosinus, also auch $\cos \alpha < 0$: III. Quadrant.

</details>
