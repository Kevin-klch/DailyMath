---
title: Sinus- und Kosinussatz
category: geometry
order: 100
level: 3
summary: Fehlende Seiten und Winkel in beliebigen Dreiecken berechnen, nicht nur in rechtwinkligen – Sinussatz, Kosinussatz und wann man welchen nimmt.
related: trigonometry, triangles, pythagorean-theorem, unit-circle
---

Sinus, Kosinus und Tangens als Seitenverhältnisse funktionieren nur im rechtwinkligen Dreieck. Echte Aufgaben – Entfernungen zwischen Orten, Kräfte in einer Brücke, der Kurs eines Schiffs – führen aber meist auf **allgemeine Dreiecke**. Mit dem **Sinussatz** und dem **Kosinussatz** lassen sich alle fehlenden Seiten und Winkel berechnen, sobald drei passende Stücke bekannt sind.

## Bezeichnungen

Wie üblich heißen die Ecken $A$, $B$, $C$, die Winkel dort $\alpha$, $\beta$, $\gamma$, und jede Seite trägt den Kleinbuchstaben der gegenüberliegenden Ecke: $a$ liegt $\alpha$ gegenüber, $b$ liegt $\beta$ gegenüber, $c$ liegt $\gamma$ gegenüber. Beide Sätze beruhen auf dieser Zuordnung von Seite und Gegenwinkel.

## Der Sinussatz

> **Merke:** In jedem Dreieck gilt $\frac{a}{\sin \alpha} = \frac{b}{\sin \beta} = \frac{c}{\sin \gamma}$. Jede Seite geteilt durch den Sinus ihres Gegenwinkels ergibt denselben Wert.

**Begründung:** Zeichne die Höhe $h$ von $C$ auf die Seite $c$. Sie zerlegt das Dreieck in zwei rechtwinklige Teildreiecke. Im linken gilt $h = b \cdot \sin \alpha$, im rechten $h = a \cdot \sin \beta$. Also ist $b \sin \alpha = a \sin \beta$, umgeformt $\frac{a}{\sin \alpha} = \frac{b}{\sin \beta}$. Mit einer anderen Höhe kommt genauso $c$ dazu. (Der gemeinsame Wert ist übrigens der Durchmesser des Umkreises.)

Man braucht ein **Paar** aus Seite und Gegenwinkel und dazu ein weiteres Stück. Typische Fälle:

- zwei Winkel und eine Seite (WSW bzw. SWW),
- zwei Seiten und ein Winkel, der einer davon gegenüberliegt (SsW bzw. SSW).

### Beispiel 1: zwei Winkel und eine Seite

Gegeben sind $\alpha = 40^\circ$, $\beta = 60^\circ$ und $a = 10$. Zuerst ist $\gamma = 180^\circ - 40^\circ - 60^\circ = 80^\circ$. Dann gilt

$$b = \frac{a \cdot \sin \beta}{\sin \alpha} = \frac{10 \cdot \sin 60^\circ}{\sin 40^\circ} \approx \frac{8{,}660}{0{,}6428} \approx 13{,}47$$

$$c = \frac{a \cdot \sin \gamma}{\sin \alpha} = \frac{10 \cdot \sin 80^\circ}{\sin 40^\circ} \approx \frac{9{,}848}{0{,}6428} \approx 15{,}32$$

### Der Fall SSW: zwei Lösungen möglich

Berechnet man mit dem Sinussatz einen *Winkel*, ist Vorsicht geboten: $\sin \beta = 0{,}6667$ hat zwischen $0^\circ$ und $180^\circ$ zwei Lösungen, nämlich $\beta \approx 41{,}81^\circ$ und $\beta \approx 180^\circ - 41{,}81^\circ = 138{,}19^\circ$.

Beispiel: $a = 6$, $b = 8$, $\alpha = 30^\circ$. Dann ist $\sin \beta = \frac{8 \cdot \sin 30^\circ}{6} = \frac{4}{6} \approx 0{,}6667$. Hier passen beide Werte, denn $30^\circ + 138{,}19^\circ < 180^\circ$ – es gibt zwei verschiedene Dreiecke. Liegt der gegebene Winkel der **größeren** der beiden Seiten gegenüber (Fall SsW), ist die Lösung immer eindeutig.

## Der Kosinussatz

> **Merke:** In jedem Dreieck gilt $c^2 = a^2 + b^2 - 2ab \cos \gamma$ (und entsprechend $a^2 = b^2 + c^2 - 2bc \cos \alpha$ sowie $b^2 = a^2 + c^2 - 2ac \cos \beta$).

Der Kosinussatz ist der Satz des Pythagoras mit einem Korrekturglied. Für $\gamma = 90^\circ$ ist $\cos \gamma = 0$, und es bleibt $c^2 = a^2 + b^2$. Ist $\gamma$ stumpf, gilt $\cos \gamma < 0$, und $c$ wird länger als im rechtwinkligen Fall; ist $\gamma$ spitz, wird $c$ kürzer.

Man verwendet ihn, wenn

- zwei Seiten und der **eingeschlossene** Winkel bekannt sind (SWS) – für die dritte Seite,
- alle drei Seiten bekannt sind (SSS) – für einen Winkel. Dazu löst man nach dem Kosinus auf:

$$\cos \gamma = \frac{a^2 + b^2 - c^2}{2ab}$$

Winkel aus dem Kosinussatz sind nie mehrdeutig: Ein Winkel zwischen $0^\circ$ und $180^\circ$ ist durch seinen Kosinus eindeutig bestimmt.

### Beispiel 2: zwei Seiten und eingeschlossener Winkel

$a = 5$, $b = 8$, $\gamma = 60^\circ$:

$$c^2 = 25 + 64 - 2 \cdot 5 \cdot 8 \cdot \cos 60^\circ = 89 - 80 \cdot 0{,}5 = 49 \quad\Rightarrow\quad c = 7$$

### Beispiel 3: drei Seiten

$a = 3$, $b = 5$, $c = 7$. Der größte Winkel liegt der längsten Seite gegenüber:

$$\cos \gamma = \frac{9 + 25 - 49}{2 \cdot 3 \cdot 5} = \frac{-15}{30} = -0{,}5 \quad\Rightarrow\quad \gamma = 120^\circ$$

## Welcher Satz wann?

| Gegeben | Vorgehen |
|---|---|
| SSS | Kosinussatz für einen Winkel, dann Sinus- oder Kosinussatz |
| SWS | Kosinussatz für die dritte Seite |
| WSW / SWW | Winkelsumme, dann Sinussatz |
| SSW / SsW | Sinussatz (auf zwei Lösungen achten) |

Eine gute Gewohnheit: Hat man einen Winkel mit dem Kosinussatz bestimmt, berechnet man den nächsten mit dem Sinussatz (und zwar einen *kleineren* Winkel, um Mehrdeutigkeit zu vermeiden) und den letzten über die Winkelsumme.

## Flächeninhalt

Kennt man zwei Seiten und den eingeschlossenen Winkel, ist die Höhe auf $a$ gleich $h = b \sin \gamma$, also

$$A = \frac{1}{2} ab \sin \gamma$$

Für $a = 5$, $b = 8$, $\gamma = 60^\circ$: $A = \frac{1}{2} \cdot 40 \cdot \frac{\sqrt{3}}{2} = 10\sqrt{3} \approx 17{,}32$.

## Typische Fehler

- Seite und Winkel falsch zuordnen – $a$ gehört immer zu $\alpha$, dem *gegenüberliegenden* Winkel.
- Den Kosinussatz mit einem Winkel verwenden, der nicht zwischen den beiden gegebenen Seiten liegt.
- Im Fall SSW die zweite Lösung von $\sin \beta = k$ übersehen.
- Erst $a^2 + b^2 - 2ab$ ausrechnen und dann mit $\cos \gamma$ multiplizieren – abgezogen wird nur das Produkt $2ab \cos \gamma$.
- Am Ende des Kosinussatzes das Wurzelziehen vergessen.

## Übungen

1. In einem Dreieck ist $a = 8$, $b = 5$ und $\gamma = 60^\circ$. Berechne $c$.

<details>
<summary>Lösung</summary>

$c^2 = 64 + 25 - 2 \cdot 8 \cdot 5 \cdot 0{,}5 = 89 - 40 = 49$, also $c = 7$.

</details>

2. Ein Dreieck hat die Seiten $5$, $7$ und $8$. Bestimme den Winkel, der der Seite der Länge $7$ gegenüberliegt.

<details>
<summary>Lösung</summary>

$\cos \beta = \frac{5^2 + 8^2 - 7^2}{2 \cdot 5 \cdot 8} = \frac{25 + 64 - 49}{80} = \frac{40}{80} = 0{,}5$, also $\beta = 60^\circ$.

</details>

3. Gegeben sind $\alpha = 45^\circ$, $\beta = 75^\circ$ und $c = 10$. Berechne $a$.

<details>
<summary>Lösung</summary>

$\gamma = 180^\circ - 45^\circ - 75^\circ = 60^\circ$. Sinussatz: $a = \frac{c \cdot \sin \alpha}{\sin \gamma} = \frac{10 \cdot \frac{\sqrt{2}}{2}}{\frac{\sqrt{3}}{2}} = \frac{10\sqrt{2}}{\sqrt{3}} \approx 8{,}165$.

</details>

4. Berechne den Flächeninhalt eines Dreiecks mit $a = 6$, $b = 10$ und $\gamma = 30^\circ$.

<details>
<summary>Lösung</summary>

$A = \frac{1}{2} \cdot 6 \cdot 10 \cdot \sin 30^\circ = 30 \cdot 0{,}5 = 15$.

</details>

5. Zwei Wanderer starten am selben Punkt auf geraden Wegen, die einen Winkel von $60^\circ$ einschließen. Der eine geht $4\text{ km}$, der andere $6\text{ km}$. Wie weit sind sie voneinander entfernt?

<details>
<summary>Lösung</summary>

$d^2 = 16 + 36 - 2 \cdot 4 \cdot 6 \cdot 0{,}5 = 52 - 24 = 28$, also $d = \sqrt{28} = 2\sqrt{7} \approx 5{,}29\text{ km}$.

</details>
