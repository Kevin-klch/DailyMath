---
title: Ungleichungen
category: algebra
order: 50
level: 2
summary: Wie man lineare Ungleichungen löst, warum sich das Zeichen beim Multiplizieren mit einer negativen Zahl umdreht und wie man die Lösungsmenge angibt.
related: linear-equations, absolute-value, negative-numbers
---

Eine Ungleichung vergleicht zwei Terme – statt mit einem Gleichheitszeichen mit einem der Zeichen $<$, $>$, $\leq$ oder $\geq$. Ungleichungen beschreiben Grenzen und Bedingungen: „höchstens 30 Personen“, „schneller als 50 km/h“, „der günstigere Tarif“. Gelöst werden sie fast genauso wie lineare Gleichungen – mit einer wichtigen Ausnahme, die man kennen muss.

## Die Zeichen

- $a < b$: $a$ ist **kleiner als** $b$.
- $a > b$: $a$ ist **größer als** $b$.
- $a \leq b$: $a$ ist kleiner **oder gleich** $b$.
- $a \geq b$: $a$ ist größer oder gleich $b$.

Die offene Seite des Zeichens zeigt immer zur größeren Zahl. Man darf eine Ungleichung auch von rechts nach links lesen: $4 > x$ bedeutet dasselbe wie $x < 4$.

## Lösungen sind Bereiche

Eine Gleichung wie $x + 2 = 5$ hat meist genau eine Lösung. Eine Ungleichung wie $x + 2 < 5$ hat dagegen unendlich viele: Jede Zahl kleiner als $3$ passt – $2$, $0$, $-10$, $2{,}99$ … Die Lösung ist ein ganzer **Zahlenbereich**.

Man kann ihn auf verschiedene Arten angeben:

- als Ungleichung: $x < 3$,
- als Lösungsmenge: $L = \{x \in \mathbb{R} \mid x < 3\}$,
- als Intervall: $L = \left]-\infty; 3\right[$,
- am Zahlenstrahl: ein offener Kreis bei $3$ und ein Pfeil nach links.

Bei Intervallen bedeutet eine nach außen geöffnete Klammer, dass der Randpunkt **nicht** dazugehört, eine nach innen zeigende Klammer, dass er **dazugehört**. So ist $x \geq -2$ das Intervall $\left[-2; \infty\right[$, und am Zahlenstrahl bekommt $-2$ einen ausgefüllten Punkt.

## Erlaubte Umformungen

Erlaubt ist dasselbe wie bei Gleichungen:

- auf beiden Seiten dieselbe Zahl oder denselben Term addieren oder subtrahieren,
- beide Seiten mit derselben **positiven** Zahl multiplizieren oder durch sie dividieren.

Dabei bleibt das Ungleichheitszeichen unverändert.

## Die Ausnahme: negative Zahlen

Aus der wahren Aussage $2 < 5$ wird durch Multiplizieren mit $-1$ das Zahlenpaar $-2$ und $-5$ – aber $-2$ ist *größer* als $-5$. Die Reihenfolge hat sich umgekehrt. Das Multiplizieren mit einer negativen Zahl spiegelt die Zahlen am Nullpunkt des Zahlenstrahls, und dabei wird aus der größeren die kleinere.

> **Merke:** Multipliziert oder dividiert man beide Seiten einer Ungleichung mit einer **negativen** Zahl, muss man das Ungleichheitszeichen **umdrehen**: Aus $<$ wird $>$, aus $\leq$ wird $\geq$.

## Beispiele

### Beispiel 1

$$2x + 3 < 11$$

Minus $3$: $2x < 8$. Geteilt durch $2$ (positiv, Zeichen bleibt): $x < 4$.

### Beispiel 2

$$-3x + 4 \geq 13$$

Minus $4$: $-3x \geq 9$. Geteilt durch $-3$ – **Zeichen umdrehen**: $x \leq -3$.

Probe mit $x = -4$: $-3 \cdot (-4) + 4 = 16 \geq 13$. Wahr. Mit $x = 0$: $4 \geq 13$ ist falsch – wie erwartet.

### Beispiel 3: Variable auf beiden Seiten

$$5x - 2 > 3x + 6$$

Minus $3x$: $2x - 2 > 6$. Plus $2$: $2x > 8$. Also $x > 4$.

### Beispiel 4: Klammern

$$2(x - 1) \leq 4x + 6$$

Ausmultiplizieren: $2x - 2 \leq 4x + 6$. Minus $4x$: $-2x - 2 \leq 6$. Plus $2$: $-2x \leq 8$. Geteilt durch $-2$, Zeichen umdrehen: $x \geq -4$.

Das Umdrehen lässt sich vermeiden, wenn man die $x$-Glieder auf der Seite sammelt, wo der Koeffizient positiv bleibt: Minus $2x$ und minus $6$ ergibt $-8 \leq 2x$, also $-4 \leq x$. Gleiches Ergebnis.

> **Merke:** Zur Probe setzt man eine Zahl aus dem Lösungsbereich und eine Zahl außerhalb ein. Für die erste muss die Ungleichung stimmen, für die zweite nicht.

## Doppelte Ungleichungen

Eine Ungleichung wie $-1 < 2x + 3 \leq 9$ enthält zwei Bedingungen auf einmal. Jede Umformung wird auf **alle drei Teile** angewendet:

$$-1 < 2x + 3 \leq 9 \quad\Rightarrow\quad -4 < 2x \leq 6 \quad\Rightarrow\quad -2 < x \leq 3$$

Als Intervall: $L = \left]-2; 3\right]$.

## Typische Fehler

- Beim Teilen durch eine negative Zahl das Zeichen nicht umdrehen.
- Das Zeichen beim *Subtrahieren* umdrehen – Addieren und Subtrahieren drehen es nie um, auch nicht bei negativen Zahlen.
- Offene und geschlossene Randpunkte verwechseln: $x < 3$ schließt $3$ aus, $x \leq 3$ schließt $3$ ein.
- Die Lösung als einzelne Zahl angeben: „$x = 4$“ statt „$x < 4$“.
- Bei doppelten Ungleichungen nur zwei der drei Teile umformen.

## Übungen

1. Löse $4x - 5 > 7$.

<details>
<summary>Lösung</summary>

Plus $5$: $4x > 12$. Geteilt durch $4$: $x > 3$.

</details>

2. Löse $6 - 2x \geq 10$.

<details>
<summary>Lösung</summary>

Minus $6$: $-2x \geq 4$. Geteilt durch $-2$, Zeichen umdrehen: $x \leq -2$.

</details>

3. Löse $3(x + 1) < 5x - 7$.

<details>
<summary>Lösung</summary>

$3x + 3 < 5x - 7$. Minus $3x$ und plus $7$: $10 < 2x$, also $x > 5$.

</details>

4. Löse $-3 \leq 2x - 1 < 5$ und gib alle ganzen Zahlen in der Lösungsmenge an.

<details>
<summary>Lösung</summary>

Plus $1$: $-2 \leq 2x < 6$. Geteilt durch $2$: $-1 \leq x < 3$. Ganze Zahlen: $-1$, $0$, $1$, $2$.

</details>

5. Tarif A kostet 15 € im Monat plus 2 € pro Gigabyte, Tarif B pauschal 35 € im Monat. Bis zu welchem Datenvolumen ist Tarif A günstiger?

<details>
<summary>Lösung</summary>

Bei $g$ Gigabyte: $15 + 2g < 35$, also $2g < 20$ und $g < 10$. Tarif A ist bei weniger als 10 GB günstiger.

</details>
