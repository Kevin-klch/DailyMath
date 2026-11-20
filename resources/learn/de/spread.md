---
title: Spannweite, Varianz und Standardabweichung
category: stochastics
order: 20
level: 2
summary: Wie weit liegen die Werte um den Durchschnitt verstreut? Spannweite, Quartilsabstand, Varianz und Standardabweichung Schritt für Schritt erklärt.
related: statistics-basics, binomial-distribution, probability-basics
---

Ein Mittelwert sagt, wo die Mitte einer Datenreihe liegt – aber nicht, wie dicht die Werte um diese Mitte liegen. Zwei Klassen können beide im Schnitt 70 Punkte im Test haben, und trotzdem liegen in der einen alle Ergebnisse zwischen 65 und 75, in der anderen zwischen 20 und 100. **Streuungsmaße** fassen diesen Unterschied in einer einzigen Zahl zusammen.

## Warum der Mittelwert nicht reicht

Vergleiche diese beiden Datenreihen:

$$A: \ 4, 5, 5, 6 \qquad\qquad B: \ 1, 3, 7, 9$$

Beide haben den Mittelwert $5$ und den Median $5$. Die Werte von $B$ liegen aber viel weiter auseinander. Gesucht ist eine Zahl, die ausdrückt: „$B$ streut stärker als $A$“.

## Die Spannweite

Das einfachste Streuungsmaß ist die **Spannweite**: größter Wert minus kleinster Wert.

$$\text{Spannweite} = x_{\max} - x_{\min}$$

Für $A$ beträgt sie $6 - 4 = 2$, für $B$ dagegen $9 - 1 = 8$.

Die Spannweite ist schnell berechnet, hängt aber nur von den beiden extremsten Werten ab. Ein einzelner Ausreißer kann sie riesig machen, selbst wenn alle anderen Werte eng beieinanderliegen.

## Quartile und Quartilsabstand

Robuster ist es, nur die mittlere Hälfte der Daten zu betrachten. Man ordnet die Daten und teilt sie am Median. Das **untere Quartil** $Q_1$ ist der Median der unteren Hälfte, das **obere Quartil** $Q_3$ der Median der oberen Hälfte. Der **Quartilsabstand** ist

$$Q_3 - Q_1$$

Zwischen $Q_1$ und $Q_3$ liegt etwa die Hälfte aller Werte. Wie der Median wird auch der Quartilsabstand von Ausreißern kaum beeinflusst. Zusammen mit Minimum, Median und Maximum ergeben die Quartile die fünf Kennwerte eines **Boxplots**. (Für die Quartile gibt es leicht unterschiedliche Berechnungsvorschriften; bei großen Datenmengen liefern sie praktisch dieselben Werte.)

## Varianz und Standardabweichung

Die wichtigsten Streuungsmaße beruhen auf den **Abweichungen** $x_i - \bar{x}$ der einzelnen Werte vom Mittelwert. Diese einfach zu mitteln, bringt nichts – sie ergeben zusammen immer null. Deshalb quadriert man sie zuerst: So werden alle positiv, und große Abweichungen fallen stärker ins Gewicht.

Die **Varianz** ist der Mittelwert der quadrierten Abweichungen:

$$\sigma^2 = \frac{(x_1 - \bar{x})^2 + (x_2 - \bar{x})^2 + \dots + (x_n - \bar{x})^2}{n} = \frac{1}{n}\sum_{i=1}^{n} (x_i - \bar{x})^2$$

Durch das Quadrieren hat die Varianz eine quadrierte Einheit (zum Beispiel cm²). Zieht man die Wurzel, landet man wieder bei der ursprünglichen Einheit – das ist die **Standardabweichung**:

$$\sigma = \sqrt{\sigma^2}$$

> **Merke:** Varianz = Mittelwert der quadrierten Abweichungen vom Mittelwert. Standardabweichung = Wurzel aus der Varianz. Je größer sie sind, desto stärker streuen die Daten.

### Beispiel 1

Daten: $2, 4, 4, 4, 5, 5, 7, 9$.

1. Mittelwert: $\bar{x} = \frac{40}{8} = 5$.
2. Abweichungen: $-3, -1, -1, -1, 0, 0, 2, 4$.
3. Quadrierte Abweichungen: $9, 1, 1, 1, 0, 0, 4, 16$, Summe $32$.
4. Varianz: $\sigma^2 = \frac{32}{8} = 4$.
5. Standardabweichung: $\sigma = \sqrt{4} = 2$.

Die Werte liegen also „im Schnitt etwa 2“ vom Mittelwert entfernt.

### Beispiel 2: die beiden Datenreihen im Vergleich

Für $A: 4, 5, 5, 6$ sind die quadrierten Abweichungen $1, 0, 0, 1$, also $\sigma^2 = \frac{2}{4} = 0{,}5$ und $\sigma \approx 0{,}71$.

Für $B: 1, 3, 7, 9$ sind es $16, 4, 4, 16$, also $\sigma^2 = \frac{40}{4} = 10$ und $\sigma \approx 3{,}16$.

Die Standardabweichung von $B$ ist mehr als viermal so groß – genau das, was man schon mit bloßem Auge sieht.

## Eine Rechenabkürzung

Statt jede Abweichung einzeln zu berechnen, kann man auch

$$\sigma^2 = \overline{x^2} - \bar{x}^2$$

verwenden, also: Mittelwert der Quadrate minus Quadrat des Mittelwerts. Für Beispiel 1: Die Quadrate sind $4, 16, 16, 16, 25, 25, 49, 81$ mit der Summe $232$, also $\overline{x^2} = 29$ und $\sigma^2 = 29 - 5^2 = 4$. Dasselbe Ergebnis.

## Grundgesamtheit oder Stichprobe?

Sind die Daten nur eine **Stichprobe** aus einer größeren Grundgesamtheit und will man die Streuung der Grundgesamtheit schätzen, teilt man durch $n - 1$ statt durch $n$:

$$s^2 = \frac{1}{n - 1}\sum_{i=1}^{n} (x_i - \bar{x})^2$$

Diese **Stichprobenvarianz** (auch korrigierte empirische Varianz) fällt etwas größer aus und gleicht aus, dass eine Stichprobe die wahre Streuung tendenziell unterschätzt. Für Beispiel 1 ergäbe sich $s^2 = \frac{32}{7} \approx 4{,}57$ und $s \approx 2{,}14$. Taschenrechner zeigen oft beide Varianten an, meist als $\sigma$ (oder $\sigma_n$) und $s$ (oder $\sigma_{n-1}$).

> **Merke:** Durch $n$ teilen, wenn die Daten die gesamte Grundgesamtheit sind – durch $n - 1$, wenn sie eine Stichprobe sind, mit der man die Grundgesamtheit schätzen will.

## Wie sich die Streuung verändert

- Addiert man zu allen Werten dieselbe Zahl, verschiebt sich der Mittelwert, aber Spannweite, Varianz und Standardabweichung bleiben **gleich**.
- Multipliziert man alle Werte mit einem Faktor $c$, werden Spannweite und Standardabweichung mit $|c|$ multipliziert, die Varianz mit $c^2$.
- Die Standardabweichung ist genau dann $0$, wenn alle Werte gleich sind.

## Typische Fehler

- Vergessen, die Abweichungen zu quadrieren – die bloßen Abweichungen ergeben zusammen immer null.
- Die Varianz angeben, obwohl nach der Standardabweichung gefragt war (oder umgekehrt).
- Die Formel für die Grundgesamtheit (durch $n$) und die für die Stichprobe (durch $n - 1$) verwechseln.
- In der Rechenabkürzung $\overline{x^2}$ (Mittelwert der Quadrate) mit $\bar{x}^2$ (Quadrat des Mittelwerts) verwechseln.
- Die Streuung nur an der Spannweite festmachen, obwohl es Ausreißer gibt.

## Übungen

1. Bestimme die Spannweite von $12, 7, 19, 3, 15$.

<details>
<summary>Lösung</summary>

Größter Wert $19$, kleinster Wert $3$, die Spannweite ist also $19 - 3 = 16$.

</details>

2. Berechne Varianz und Standardabweichung von $3, 5, 7, 9, 11$ (Division durch $n$).

<details>
<summary>Lösung</summary>

Mittelwert: $\frac{35}{5} = 7$. Abweichungen: $-4, -2, 0, 2, 4$. Quadrate: $16, 4, 0, 4, 16$, Summe $40$. Varianz: $\frac{40}{5} = 8$. Standardabweichung: $\sqrt{8} \approx 2{,}83$.

</details>

3. Eine Datenreihe lautet $10, 10, 10, 10$. Wie groß ist die Standardabweichung, und was bedeutet das?

<details>
<summary>Lösung</summary>

Der Mittelwert ist $10$, jede Abweichung ist $0$, also $\sigma = 0$. Eine Standardabweichung von null heißt: Es gibt überhaupt keine Streuung, alle Werte sind gleich.

</details>

4. Die Werte $1, 3, 5, 7$ sind eine Stichprobe. Berechne die Stichprobenvarianz $s^2$ und die Standardabweichung $s$.

<details>
<summary>Lösung</summary>

Mittelwert: $4$. Quadrierte Abweichungen: $9, 1, 1, 9$, Summe $20$. Stichprobenvarianz: $s^2 = \frac{20}{4 - 1} = \frac{20}{3} \approx 6{,}67$. Standardabweichung: $s \approx 2{,}58$.

</details>

5. Eine Datenreihe hat die Standardabweichung $3$. Wie groß ist sie, wenn man (a) zu jedem Wert $5$ addiert, (b) jeden Wert verdoppelt?

<details>
<summary>Lösung</summary>

(a) Eine Verschiebung aller Werte ändert die Streuung nicht: weiterhin $3$. (b) Beim Verdoppeln verdoppelt sich jede Abweichung, die Standardabweichung wird also $2 \cdot 3 = 6$ (und die Varianz wächst von $9$ auf $36$).

</details>
