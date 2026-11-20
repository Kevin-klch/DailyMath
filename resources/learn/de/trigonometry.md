---
title: Trigonometrie im rechtwinkligen Dreieck
category: geometry
order: 80
level: 2
summary: Sinus, Kosinus und Tangens als Seitenverhältnisse – mit Gegenkathete, Ankathete und Hypotenuse fehlende Seiten und Winkel berechnen.
related: pythagorean-theorem, similarity, unit-circle, sine-and-cosine-rules
---

Der Satz des Pythagoras verbindet die drei Seiten eines rechtwinkligen Dreiecks – über die Winkel sagt er aber nichts. Diese Lücke schließt die **Trigonometrie**: Mit Sinus, Kosinus und Tangens berechnest du aus zwei Seiten einen Winkel oder aus einem Winkel und einer Seite eine weitere Seite. Vermesser, Ingenieurinnen und Spieleentwickler brauchen das täglich.

## Die Seiten benennen

Nimm ein rechtwinkliges Dreieck und wähle einen der beiden spitzen Winkel, etwa $\alpha$. Bezogen auf diesen Winkel bekommen die Seiten Namen:

- Die **Hypotenuse** ist die längste Seite, sie liegt dem rechten Winkel gegenüber.
- Die **Gegenkathete** liegt dem Winkel $\alpha$ gegenüber.
- Die **Ankathete** ist die Kathete, die am Winkel $\alpha$ anliegt (die andere anliegende Seite ist die Hypotenuse).

Welche Kathete Gegen- und welche Ankathete ist, hängt vom betrachteten Winkel ab. Für den anderen spitzen Winkel tauschen sie die Rollen.

## Sinus, Kosinus und Tangens

Alle rechtwinkligen Dreiecke mit demselben Winkel $\alpha$ sind ähnlich. Das Verhältnis zweier Seiten hängt deshalb nur von $\alpha$ ab, nicht von der Größe des Dreiecks. Diese Verhältnisse haben eigene Namen:

> **Merke:** $\sin \alpha = \frac{\text{Gegenkathete}}{\text{Hypotenuse}}$, $\quad \cos \alpha = \frac{\text{Ankathete}}{\text{Hypotenuse}}$, $\quad \tan \alpha = \frac{\text{Gegenkathete}}{\text{Ankathete}}$. Eselsbrücke: **GAGA HHAA** (Gegenkathete/Hypotenuse, Ankathete/Hypotenuse, Gegenkathete/Ankathete).

Da die Hypotenuse die längste Seite ist, liegen $\sin \alpha$ und $\cos \alpha$ bei spitzen Winkeln immer zwischen $0$ und $1$. Der Tangens kann jede positive Zahl sein.

## Exakte Werte

Einige Winkel kommen so häufig vor, dass man ihre Werte auswendig kennen sollte. Sie stammen aus dem halben Quadrat ($45^\circ$) und dem halben gleichseitigen Dreieck ($30^\circ$ und $60^\circ$).

| $\alpha$ | $30^\circ$ | $45^\circ$ | $60^\circ$ |
|---|---|---|---|
| $\sin \alpha$ | $\frac{1}{2}$ | $\frac{\sqrt{2}}{2}$ | $\frac{\sqrt{3}}{2}$ |
| $\cos \alpha$ | $\frac{\sqrt{3}}{2}$ | $\frac{\sqrt{2}}{2}$ | $\frac{1}{2}$ |
| $\tan \alpha$ | $\frac{\sqrt{3}}{3}$ | $1$ | $\sqrt{3}$ |

Für alle anderen Winkel nimmst du den Taschenrechner – achte darauf, dass er auf **Grad** (DEG) eingestellt ist, nicht auf Bogenmaß.

## Nützliche Zusammenhänge

Aus den Definitionen und dem Satz des Pythagoras folgt:

$$\tan \alpha = \frac{\sin \alpha}{\cos \alpha} \qquad\qquad \sin^2 \alpha + \cos^2 \alpha = 1$$

Die beiden spitzen Winkel ergänzen sich zu $90^\circ$, und die Gegenkathete des einen ist die Ankathete des anderen. Deshalb gilt

$$\sin \alpha = \cos(90^\circ - \alpha) \qquad\qquad \cos \alpha = \sin(90^\circ - \alpha)$$

## Seiten berechnen

Wähle das Verhältnis, in dem die bekannte und die gesuchte Seite vorkommen, und löse nach der gesuchten Seite auf.

### Beispiel 1

Hypotenuse $10\text{ cm}$, $\alpha = 30^\circ$. Berechne beide Katheten.

$$\text{Gegenkathete} = 10 \cdot \sin 30^\circ = 10 \cdot 0{,}5 = 5\text{ cm}$$

$$\text{Ankathete} = 10 \cdot \cos 30^\circ \approx 10 \cdot 0{,}866 = 8{,}66\text{ cm}$$

### Beispiel 2: Höhenwinkel

Von einem Punkt $20\text{ m}$ vom Fuß eines Turms entfernt sieht man die Turmspitze unter einem Winkel von $40^\circ$ über der Waagerechten. Die Entfernung ist die Ankathete, die Höhe die Gegenkathete:

$$h = 20 \cdot \tan 40^\circ \approx 20 \cdot 0{,}8391 \approx 16{,}78\text{ m}$$

## Winkel berechnen

Um aus einem Verhältnis den Winkel zu bestimmen, verwendet man die **Umkehrfunktionen** $\sin^{-1}$, $\cos^{-1}$, $\tan^{-1}$ (auch arcsin, arccos, arctan). Auf den meisten Taschenrechnern liegen sie als Zweitbelegung auf den Tasten sin, cos und tan.

> **Merke:** Ist $\tan \alpha = 0{,}75$, dann ist $\alpha = \tan^{-1}(0{,}75)$. Die Umkehrfunktion beantwortet die Frage: „Welcher Winkel hat dieses Verhältnis?“

### Beispiel 3

Die Katheten eines rechtwinkligen Dreiecks sind $3$ (Gegenkathete von $\alpha$) und $4$ (Ankathete von $\alpha$):

$$\tan \alpha = \frac{3}{4} = 0{,}75 \quad\Rightarrow\quad \alpha = \tan^{-1}(0{,}75) \approx 36{,}87^\circ$$

Der andere spitze Winkel ist $90^\circ - 36{,}87^\circ = 53{,}13^\circ$ groß.

## Typische Fehler

- Gegen- und Ankathete verwechseln – die Seiten immer vom betrachteten Winkel aus benennen.
- Sinus, Kosinus und Tangens in Dreiecken ohne rechten Winkel verwenden. Dort braucht man Sinus- oder Kosinussatz.
- Taschenrechner im Bogenmaß: $\sin 30$ liefert dann etwa $-0{,}988$ statt $0{,}5$.
- $\sin^{-1}(x) = \frac{1}{\sin x}$ schreiben. Die Umkehrfunktion ist *nicht* der Kehrwert.
- Teilen statt multiplizieren: Steht die gesuchte Seite im Zähler, wird multipliziert, steht sie im Nenner, wird geteilt.

## Übungen

1. Ein rechtwinkliges Dreieck hat die Hypotenuse $12$ und $\alpha = 60^\circ$. Berechne Gegen- und Ankathete exakt.

<details>
<summary>Lösung</summary>

Gegenkathete: $12 \cdot \sin 60^\circ = 12 \cdot \frac{\sqrt{3}}{2} = 6\sqrt{3} \approx 10{,}39$. Ankathete: $12 \cdot \cos 60^\circ = 12 \cdot \frac{1}{2} = 6$.

</details>

2. Eine $6\text{ m}$ lange Leiter steht im Winkel von $70^\circ$ zum Boden. Wie hoch reicht sie an der Wand?

<details>
<summary>Lösung</summary>

Die Leiter ist die Hypotenuse, die Höhe die Gegenkathete: $h = 6 \cdot \sin 70^\circ \approx 6 \cdot 0{,}9397 \approx 5{,}64\text{ m}$.

</details>

3. In einem rechtwinkligen Dreieck ist die Gegenkathete von $\alpha$ $5$ lang, die Hypotenuse $13$. Bestimme $\alpha$.

<details>
<summary>Lösung</summary>

$\sin \alpha = \frac{5}{13} \approx 0{,}3846$, also $\alpha = \sin^{-1}(0{,}3846) \approx 22{,}62^\circ$.

</details>

4. Für einen spitzen Winkel gilt $\sin \alpha = 0{,}6$. Bestimme $\cos \alpha$ und $\tan \alpha$ ohne Taschenrechner.

<details>
<summary>Lösung</summary>

$\cos^2 \alpha = 1 - 0{,}36 = 0{,}64$, also $\cos \alpha = 0{,}8$. Dann ist $\tan \alpha = \frac{0{,}6}{0{,}8} = 0{,}75$.

</details>

5. Eine Rampe steigt auf $12\text{ m}$ waagerechter Strecke um $1\text{ m}$ an. Welchen Winkel bildet sie mit dem Boden?

<details>
<summary>Lösung</summary>

$\tan \alpha = \frac{1}{12} \approx 0{,}0833$, also $\alpha \approx 4{,}76^\circ$.

</details>
