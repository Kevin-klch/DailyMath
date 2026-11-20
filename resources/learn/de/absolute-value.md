---
title: Betrag
category: algebra
order: 110
level: 2
summary: Was der Betrag einer Zahl bedeutet, wie er Abstände misst und wie man Betragsgleichungen und Betragsungleichungen löst.
related: negative-numbers, inequalities, linear-equations
---

Der **Betrag** einer Zahl gibt an, wie weit sie auf dem Zahlenstrahl von der Null entfernt ist – egal in welche Richtung. Sowohl $5$ als auch $-5$ liegen fünf Einheiten von der Null entfernt, beide haben also den Betrag $5$. Beträge braucht man immer dann, wenn nur die Größe zählt und nicht das Vorzeichen: bei Abständen, Messfehlern und Toleranzen oder bei Abweichungen von einem Sollwert.

## Definition

Den Betrag von $x$ schreibt man $|x|$. Als Formel:

$$|x| = \begin{cases} x & \text{für } x \geq 0 \\ -x & \text{für } x < 0 \end{cases}$$

Die zweite Zeile verwirrt oft: Für ein negatives $x$ ist der Term $-x$ **positiv**. Zum Beispiel ist $|-3| = -(-3) = 3$.

### Beispiel 1

- $|7| = 7$
- $|-7| = 7$
- $|0| = 0$
- $|3 - 10| = |-7| = 7$
- $-|-4| = -4$ (das Minus außerhalb bleibt stehen)

> **Merke:** Ein Betrag ist nie negativ. Er „entfernt“ das Vorzeichen einer Zahl: $|x| \geq 0$ für jedes $x$, und $|x| = 0$ nur für $x = 0$.

## Der Betrag als Abstand

$|x|$ ist der Abstand von $x$ zur Null. Allgemeiner ist $|a - b|$ der **Abstand der Zahlen $a$ und $b$** auf dem Zahlenstrahl. Der Abstand von $-2$ und $5$ beträgt $|5 - (-2)| = 7$ – und ebenso $|-2 - 5| = 7$; die Reihenfolge spielt keine Rolle.

Mit dieser Vorstellung werden viele Aufgaben einfach. Die Gleichung $|x - 3| = 5$ fragt: „Welche Zahlen sind 5 Einheiten von 3 entfernt?“ Antwort: $8$ und $-2$.

## Nützliche Rechenregeln

Für alle reellen Zahlen $a$ und $b$ gilt:

- $|a \cdot b| = |a| \cdot |b|$ und $\left|\frac{a}{b}\right| = \frac{|a|}{|b|}$ (für $b \neq 0$)
- $|-a| = |a|$
- $\sqrt{a^2} = |a|$, zum Beispiel $\sqrt{(-3)^2} = 3$
- $|a + b| \leq |a| + |b|$ (Dreiecksungleichung)

Vorsicht: Bei Summen darf man den Betrag meist nicht aufteilen. $|-3 + 5| = 2$, aber $|-3| + |5| = 8$.

## Betragsgleichungen lösen

Für $c > 0$ bedeutet $|A| = c$, dass $A$ entweder $c$ oder $-c$ ist. Man zerlegt die Gleichung also in zwei lineare Gleichungen.

### Beispiel 2

$$|2x + 1| = 7$$

Erster Fall: $2x + 1 = 7$, also $x = 3$. Zweiter Fall: $2x + 1 = -7$, also $x = -4$. Beide sind Lösungen: $L = \{-4; 3\}$.

### Beispiel 3: erst isolieren

$$3|x - 1| + 2 = 14$$

Minus $2$ und geteilt durch $3$: $|x - 1| = 4$. Dann ist $x - 1 = 4$ oder $x - 1 = -4$, also $x = 5$ oder $x = -3$.

Ist die rechte Seite negativ, gibt es keine Lösung: $|x + 2| = -3$ ist unmöglich. Ist sie null, gibt es genau eine: $|x - 6| = 0$ ergibt $x = 6$.

## Variable auf beiden Seiten: Fallunterscheidung

Steht auch rechts ein $x$, arbeitet man mit der Definition und prüft jedes Ergebnis an der jeweiligen Fallbedingung.

### Beispiel 4

$$|x - 4| = 2x - 1$$

**Fall $x \geq 4$:** Dann ist $|x - 4| = x - 4$, also $x - 4 = 2x - 1$ und $x = -3$. Aber $-3$ ist nicht $\geq 4$ – das Ergebnis entfällt.

**Fall $x < 4$:** Dann ist $|x - 4| = -(x - 4) = -x + 4$, also $-x + 4 = 2x - 1$. Daraus folgt $3x = 5$ und $x = \frac{5}{3}$. Das passt zur Fallbedingung.

Probe: $\left|\frac{5}{3} - 4\right| = \frac{7}{3}$ und $2 \cdot \frac{5}{3} - 1 = \frac{7}{3}$. Die einzige Lösung ist $x = \frac{5}{3}$.

## Betragsungleichungen

Wieder hilft die Vorstellung vom Abstand: $|x| < 3$ heißt „weniger als 3 von der Null entfernt“, also $-3 < x < 3$. Und $|x| > 3$ heißt „mehr als 3 entfernt“, also $x < -3$ oder $x > 3$.

> **Merke:** Für $c > 0$ gilt: $|A| < c$ bedeutet $-c < A < c$ (ein zusammenhängendes Intervall). $|A| > c$ bedeutet $A < -c$ oder $A > c$ (zwei getrennte Teile).

### Beispiel 5

$$|x - 2| < 3 \quad\Rightarrow\quad -3 < x - 2 < 3 \quad\Rightarrow\quad -1 < x < 5$$

### Beispiel 6

$$|x + 1| \geq 4 \quad\Rightarrow\quad x + 1 \leq -4 \ \text{oder}\ x + 1 \geq 4 \quad\Rightarrow\quad x \leq -5 \ \text{oder}\ x \geq 3$$

## Typische Fehler

- Annehmen, $|-x|$ sei immer $x$: Ist $x$ negativ, gilt $|-x| = -x$.
- Summen aufteilen: $|a + b|$ ist im Allgemeinen nicht $|a| + |b|$.
- Bei $|A| = c$ nur eine Lösung finden und den Fall $A = -c$ vergessen.
- Den Betrag nicht isolieren, bevor man die Fälle unterscheidet.
- Bei der Fallunterscheidung Ergebnisse behalten, die nicht zur Fallbedingung passen.
- $|x| > 3$ als $-3 > x > 3$ schreiben – das ist unmöglich, richtig ist „oder“.

## Übungen

1. Berechne $|-7| + |3 - 5|$.

<details>
<summary>Lösung</summary>

$|-7| = 7$ und $|3 - 5| = |-2| = 2$, die Summe ist also $9$.

</details>

2. Löse $|x + 4| = 6$.

<details>
<summary>Lösung</summary>

$x + 4 = 6$ ergibt $x = 2$, $x + 4 = -6$ ergibt $x = -10$.

</details>

3. Löse $2|x - 3| - 1 = 9$.

<details>
<summary>Lösung</summary>

$2|x - 3| = 10$, also $|x - 3| = 5$. Damit ist $x = 8$ oder $x = -2$.

</details>

4. Löse $|2x - 1| \leq 5$.

<details>
<summary>Lösung</summary>

$-5 \leq 2x - 1 \leq 5$. Plus $1$: $-4 \leq 2x \leq 6$. Geteilt durch $2$: $-2 \leq x \leq 3$.

</details>

5. Löse $|x - 1| > 3$.

<details>
<summary>Lösung</summary>

$x - 1 < -3$ oder $x - 1 > 3$, also $x < -2$ oder $x > 4$.

</details>
