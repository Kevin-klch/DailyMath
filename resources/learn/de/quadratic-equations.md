---
title: Quadratische Gleichungen
category: algebra
order: 70
level: 2
summary: Wie man Gleichungen wie x² − 5x + 6 = 0 mit der p-q-Formel, der Mitternachtsformel, quadratischer Ergänzung oder Faktorisieren löst – und was die Diskriminante verrät.
related: quadratic-functions, binomial-formulas, expanding-and-factoring, linear-equations
---

In einer **quadratischen Gleichung** kommt die Variable im Quadrat vor, aber in keiner höheren Potenz. Solche Gleichungen begegnen einem bei Flächenberechnungen, bei Wurfbahnen und immer dann, wenn man die Nullstellen einer Parabel sucht. Anders als lineare Gleichungen können sie zwei, eine oder gar keine Lösung haben – und es gibt mehrere Lösungswege. Wer weiß, welcher Weg zu welcher Gleichung passt, spart viel Rechenarbeit.

## Allgemeine Form und Normalform

Jede quadratische Gleichung lässt sich in die **allgemeine Form** bringen:

$$ax^2 + bx + c = 0 \qquad (a \neq 0)$$

Teilt man durch $a$, erhält man die **Normalform**, bei der vor $x^2$ nur noch eine $1$ steht:

$$x^2 + px + q = 0$$

Beispiel: Aus $2x^2 = 8x - 6$ wird zuerst $2x^2 - 8x + 6 = 0$ und nach dem Teilen durch $2$ die Normalform $x^2 - 4x + 3 = 0$ mit $p = -4$ und $q = 3$. Wichtig: Auf einer Seite muss immer die Null stehen.

## Sonderfall: kein $x$-Glied

Fehlt das lineare Glied, stellt man nach $x^2$ um und zieht die Wurzel. Die negative Lösung nicht vergessen!

### Beispiel 1

$$x^2 - 9 = 0 \quad\Rightarrow\quad x^2 = 9 \quad\Rightarrow\quad x_1 = 3,\ x_2 = -3$$

Eine Gleichung wie $x^2 = -4$ hat keine reelle Lösung, denn kein Quadrat einer reellen Zahl ist negativ.

## Sonderfall: kein Absolutglied

Fehlt die Zahl ohne $x$, klammert man $x$ aus und nutzt den **Satz vom Nullprodukt**: Ein Produkt ist genau dann null, wenn einer der Faktoren null ist.

### Beispiel 2

$$x^2 - 5x = 0 \quad\Rightarrow\quad x(x - 5) = 0 \quad\Rightarrow\quad x_1 = 0,\ x_2 = 5$$

Hier niemals durch $x$ teilen – sonst geht die Lösung $x = 0$ verloren.

## Die p-q-Formel

Für die Normalform $x^2 + px + q = 0$ gilt:

$$x_{1,2} = -\frac{p}{2} \pm \sqrt{\left(\frac{p}{2}\right)^2 - q}$$

> **Merke:** Die p-q-Formel funktioniert nur für die Normalform. Steht vor $x^2$ eine andere Zahl als $1$, muss man zuerst die ganze Gleichung durch diese Zahl teilen.

### Beispiel 3

$$x^2 - 2x - 15 = 0 \qquad (p = -2,\ q = -15)$$

$$x_{1,2} = 1 \pm \sqrt{1 + 15} = 1 \pm 4$$

Also $x_1 = 5$ und $x_2 = -3$. Vorsicht mit den Vorzeichen: $-\frac{p}{2} = -\frac{-2}{2} = 1$, und $-q = -(-15) = +15$.

### Beispiel 4: erst normieren

$$2x^2 - 8x + 6 = 0 \qquad | :2$$

$$x^2 - 4x + 3 = 0 \qquad (p = -4,\ q = 3)$$

$$x_{1,2} = 2 \pm \sqrt{4 - 3} = 2 \pm 1$$

Also $x_1 = 3$ und $x_2 = 1$.

## Die abc-Formel (Mitternachtsformel)

Wer nicht erst durch $a$ teilen möchte, kann die allgemeine Form $ax^2 + bx + c = 0$ direkt mit der **abc-Formel** lösen, die in Süddeutschland oft **Mitternachtsformel** heißt – weil man sie auch um Mitternacht aufsagen können soll:

$$x_{1,2} = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$$

### Beispiel 5

$$2x^2 - 3x - 2 = 0 \qquad (a = 2,\ b = -3,\ c = -2)$$

$$x_{1,2} = \frac{3 \pm \sqrt{9 + 16}}{4} = \frac{3 \pm 5}{4}$$

Also $x_1 = 2$ und $x_2 = -\frac{1}{2}$. Mit der p-q-Formel hätte man hier mit Brüchen rechnen müssen – bei $a \neq 1$ ist die abc-Formel oft bequemer. Beide Formeln liefern immer dieselben Lösungen.

## Die Diskriminante

Der Term unter der Wurzel heißt **Diskriminante**. Bei der p-q-Formel ist das $D = \left(\frac{p}{2}\right)^2 - q$, bei der abc-Formel $D = b^2 - 4ac$. Am Vorzeichen erkennt man die Anzahl der Lösungen, ohne die Gleichung ganz zu lösen:

- $D > 0$: zwei verschiedene Lösungen,
- $D = 0$: genau eine Lösung, nämlich $x = -\frac{p}{2}$,
- $D < 0$: keine reelle Lösung, denn aus einer negativen Zahl kann man keine Wurzel ziehen.

> **Merke:** Ist die Diskriminante positiv, gibt es zwei Lösungen, ist sie null, eine, ist sie negativ, keine.

### Beispiel 6

Bei $x^2 - 4x + 4 = 0$ ist $D = 4 - 4 = 0$. Es gibt genau eine Lösung, $x = 2$ – tatsächlich ist $x^2 - 4x + 4 = (x - 2)^2$.

Bei $x^2 + 2x + 5 = 0$ ist $D = 1 - 5 = -4 < 0$. Die Gleichung hat keine Lösung: $L = \{\}$.

Anschaulich sind die Lösungen die Nullstellen der Parabel $y = x^2 + px + q$. Sie kann die $x$-Achse zweimal schneiden, sie einmal berühren oder ganz verfehlen.

## Quadratische Ergänzung

Aus diesem Verfahren entsteht die p-q-Formel. Man formt die linke Seite mithilfe der binomischen Formeln zu einem Quadrat um.

### Beispiel 7

$$x^2 + 6x - 7 = 0$$

1. Die Zahl nach rechts bringen: $x^2 + 6x = 7$.
2. Die Hälfte der Zahl vor $x$ quadrieren, also $3^2 = 9$, und auf beiden Seiten addieren: $x^2 + 6x + 9 = 16$.
3. Mit der 1. binomischen Formel zusammenfassen: $(x + 3)^2 = 16$.
4. Wurzel ziehen: $x + 3 = 4$ oder $x + 3 = -4$.

Also $x_1 = 1$ und $x_2 = -7$.

## Faktorisieren und Satz von Vieta

Für die Lösungen $x_1, x_2$ von $x^2 + px + q = 0$ gilt $x_1 + x_2 = -p$ und $x_1 \cdot x_2 = q$ (**Satz von Vieta**). Bei ganzzahligen Lösungen kann man sie daher oft erraten: Für $x^2 - 5x + 6 = 0$ sucht man zwei Zahlen mit Produkt $6$ und Summe $5$ – das sind $2$ und $3$. Also $(x - 2)(x - 3) = 0$ mit $x_1 = 2$, $x_2 = 3$.

## Typische Fehler

- Die p-q-Formel anwenden, obwohl vor $x^2$ noch eine Zahl steht.
- Die Gleichung nicht vorher auf die Form „… $= 0$“ bringen.
- Vorzeichenfehler bei $-\frac{p}{2}$ oder $-q$, wenn $p$ oder $q$ negativ sind.
- Die negative Lösung vergessen: $x^2 = 9$ hat **zwei** Lösungen.
- Durch $x$ teilen und damit die Lösung $x = 0$ verlieren.
- Den Satz vom Nullprodukt anwenden, obwohl rechts keine Null steht: Aus $(x - 1)(x - 2) = 6$ folgt **nicht** $x - 1 = 6$.

## Übungen

1. Löse $3x^2 = 48$.

<details>
<summary>Lösung</summary>

$x^2 = 16$, also $x_1 = 4$ und $x_2 = -4$.

</details>

2. Löse $x^2 + 7x = 0$.

<details>
<summary>Lösung</summary>

$x(x + 7) = 0$, also $x_1 = 0$ und $x_2 = -7$.

</details>

3. Löse $x^2 - x - 12 = 0$ mit der p-q-Formel.

<details>
<summary>Lösung</summary>

$p = -1$, $q = -12$: $x_{1,2} = \frac{1}{2} \pm \sqrt{\frac{1}{4} + 12} = \frac{1}{2} \pm \sqrt{\frac{49}{4}} = \frac{1}{2} \pm \frac{7}{2}$. Also $x_1 = 4$ und $x_2 = -3$.

</details>

4. Löse $2x^2 + 5x - 3 = 0$ mit der abc-Formel.

<details>
<summary>Lösung</summary>

$a = 2$, $b = 5$, $c = -3$. $D = 25 + 24 = 49$. $x_{1,2} = \frac{-5 \pm 7}{4}$, also $x_1 = \frac{1}{2}$ und $x_2 = -3$.

</details>

5. Für welchen Wert von $c$ hat $x^2 + 6x + c = 0$ genau eine Lösung?

<details>
<summary>Lösung</summary>

Genau eine Lösung bedeutet $D = 0$: $\left(\frac{6}{2}\right)^2 - c = 9 - c = 0$, also $c = 9$. Die Gleichung lautet dann $(x + 3)^2 = 0$ mit der Lösung $x = -3$.

</details>
