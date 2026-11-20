---
title: Komplexe Zahlen
category: advanced
order: 20
level: 3
summary: Zahlen der Form a + bi mit i² = −1 – Rechenregeln, konjugiert komplexe Zahl, Division, Gaußsche Zahlenebene, Betrag und Argument, Polarform und Lösen jeder quadratischen Gleichung.
related: number-sets, quadratic-equations, vectors, trigonometric-functions
---

Die Gleichung $x^2 = -1$ hat keine reelle Lösung, denn das Quadrat einer reellen Zahl ist nie negativ. Die **komplexen Zahlen** erweitern die reellen Zahlen um eine neue Zahl $i$, die genau diese Eigenschaft hat. So entsteht ein Zahlbereich, in dem jede quadratische Gleichung – ja sogar jede Polynomgleichung – lösbar ist. In Physik und Technik sind komplexe Zahlen unverzichtbar, etwa bei Schwingungen und in der Wechselstromtechnik.

## Die imaginäre Einheit

> **Merke:** Die imaginäre Einheit $i$ ist definiert durch $i^2 = -1$. Eine komplexe Zahl hat die Form $z = a + bi$ mit reellen Zahlen $a$ und $b$.

- $a = \operatorname{Re}(z)$ heißt **Realteil**,
- $b = \operatorname{Im}(z)$ heißt **Imaginärteil** (die reelle Zahl $b$, nicht $bi$).

Für $b = 0$ ist $z$ eine gewöhnliche reelle Zahl – es gilt also $\mathbb{R} \subseteq \mathbb{C}$. Zahlen mit $a = 0$ wie $3i$ heißen rein imaginär. Zwei komplexe Zahlen sind genau dann gleich, wenn sie in Realteil und Imaginärteil übereinstimmen.

Mit $i$ lassen sich nun auch Wurzeln aus negativen Zahlen angeben: $\sqrt{-9} = 3i$, denn $(3i)^2 = 9i^2 = -9$.

### Potenzen von i

$$i^1 = i, \quad i^2 = -1, \quad i^3 = -i, \quad i^4 = 1$$

Danach wiederholt sich das Muster mit der Periode 4. Zum Beispiel ist $i^{10} = i^8 \cdot i^2 = 1 \cdot (-1) = -1$.

## Rechnen mit komplexen Zahlen

Man rechnet mit $a + bi$ wie mit einem Term mit Variable – und ersetzt $i^2$ jedes Mal durch $-1$.

- **Addition:** $(a + bi) + (c + di) = (a + c) + (b + d)i$
- **Multiplikation:** $(a + bi)(c + di) = (ac - bd) + (ad + bc)i$

### Beispiel 1

Es sei $z = 3 + 2i$ und $w = 1 - 5i$.

$$z + w = 4 - 3i$$

$$z \cdot w = 3 - 15i + 2i - 10i^2 = 3 - 13i + 10 = 13 - 13i$$

## Konjugiert komplexe Zahl und Division

Die zu $z = a + bi$ **konjugiert komplexe Zahl** ist $\overline{z} = a - bi$. Das Produkt einer Zahl mit ihrer Konjugierten ist immer reell und nicht negativ:

$$z \cdot \overline{z} = (a + bi)(a - bi) = a^2 - b^2 i^2 = a^2 + b^2$$

Das ist der Trick beim Dividieren: Man erweitert den Bruch mit der Konjugierten des Nenners (dritte binomische Formel).

### Beispiel 2

$$\frac{5 + 5i}{1 + 2i} = \frac{(5 + 5i)(1 - 2i)}{(1 + 2i)(1 - 2i)} = \frac{5 - 10i + 5i - 10i^2}{1 + 4} = \frac{15 - 5i}{5} = 3 - i$$

Probe: $(3 - i)(1 + 2i) = 3 + 6i - i - 2i^2 = 5 + 5i$. Stimmt.

## Quadratische Gleichungen

Mit komplexen Zahlen funktioniert die p-q-Formel immer – auch wenn die Diskriminante negativ ist.

### Beispiel 3

Löse $x^2 - 4x + 13 = 0$. Mit $p = -4$ und $q = 13$:

$$x = 2 \pm \sqrt{4 - 13} = 2 \pm \sqrt{-9} = 2 \pm 3i$$

Die beiden Lösungen $2 + 3i$ und $2 - 3i$ sind zueinander konjugiert. Das ist immer so, wenn eine quadratische Gleichung mit reellen Koeffizienten keine reellen Lösungen hat.

## Die Gaußsche Zahlenebene

Eine komplexe Zahl $a + bi$ lässt sich als Punkt $(a \mid b)$ – oder als Pfeil vom Ursprung dorthin – in der **Gaußschen Zahlenebene** darstellen: Die waagerechte Achse ist die reelle Achse, die senkrechte die imaginäre Achse. Die Addition entspricht dann dem Aneinanderhängen von Pfeilen wie bei Vektoren, und das Konjugieren ist eine Spiegelung an der reellen Achse.

Die Länge des Pfeils ist der **Betrag**:

$$|z| = \sqrt{a^2 + b^2}$$

Der Winkel $\varphi$ zwischen der positiven reellen Achse und dem Pfeil heißt **Argument**. Für ihn gilt $\tan \varphi = \frac{b}{a}$ – man muss aber prüfen, in welchem Quadranten der Punkt liegt.

## Die Polarform

Mit Betrag $r = |z|$ und Argument $\varphi$ lässt sich jede komplexe Zahl schreiben als

$$z = r(\cos \varphi + i \sin \varphi)$$

In dieser Form wird das Multiplizieren besonders einfach:

> **Merke:** Beim Multiplizieren komplexer Zahlen werden die Beträge **multipliziert** und die Argumente **addiert**.

Die Multiplikation mit $i$ (Betrag $1$, Argument $90^\circ$) dreht eine Zahl also einfach um $90^\circ$ gegen den Uhrzeigersinn. Mit der eulerschen Formel $e^{i\varphi} = \cos \varphi + i \sin \varphi$ schreibt man die Polarform auch als $z = r e^{i\varphi}$ (Exponentialform).

### Beispiel 4

$z = 1 + i$ hat den Betrag $|z| = \sqrt{1 + 1} = \sqrt{2}$ und liegt im ersten Quadranten mit $\tan \varphi = 1$, also $\varphi = 45^\circ = \frac{\pi}{4}$. Dann hat $z^2$ den Betrag $\sqrt{2}^2 = 2$ und das Argument $90^\circ$, also ist $z^2 = 2i$. Probe: $(1 + i)^2 = 1 + 2i + i^2 = 2i$.

## Typische Fehler

- Vergessen, $i^2$ durch $-1$ zu ersetzen.
- $bi$ für den Imaginärteil halten – der Imaginärteil von $3 + 4i$ ist $4$.
- Wurzelgesetze wie $\sqrt{a} \cdot \sqrt{b} = \sqrt{ab}$ auf negative Zahlen anwenden: $\sqrt{-1} \cdot \sqrt{-1} = i \cdot i = -1$, nicht $\sqrt{1} = 1$.
- Den Betrag als $a + b$ berechnen oder $i$ mitnehmen: $|3 - 4i| = \sqrt{9 + 16} = 5$.
- Das Argument aus $\tan \varphi = \frac{b}{a}$ bestimmen, ohne auf den Quadranten zu achten.

## Übungen

1. Es sei $z = 2 - 3i$ und $w = 4 + i$. Berechne $z + w$ und $z \cdot w$.

<details>
<summary>Lösung</summary>

$z + w = 6 - 2i$. $z \cdot w = 8 + 2i - 12i - 3i^2 = 8 - 10i + 3 = 11 - 10i$.

</details>

2. Berechne $\frac{4 + 2i}{1 - i}$.

<details>
<summary>Lösung</summary>

Mit $1 + i$ erweitern: $\frac{(4 + 2i)(1 + i)}{(1 - i)(1 + i)} = \frac{4 + 4i + 2i + 2i^2}{2} = \frac{2 + 6i}{2} = 1 + 3i$.

</details>

3. Löse $x^2 + 2x + 5 = 0$.

<details>
<summary>Lösung</summary>

$x = -1 \pm \sqrt{1 - 5} = -1 \pm \sqrt{-4} = -1 \pm 2i$.

</details>

4. Bestimme für $z = 3 - 4i$ den Betrag $|z|$, die Konjugierte $\overline{z}$ und das Produkt $z \cdot \overline{z}$.

<details>
<summary>Lösung</summary>

$|z| = \sqrt{9 + 16} = 5$, $\overline{z} = 3 + 4i$, $z \cdot \overline{z} = 9 + 16 = 25 = |z|^2$.

</details>

5. Vereinfache $i^{23}$.

<details>
<summary>Lösung</summary>

$23 = 4 \cdot 5 + 3$, also $i^{23} = (i^4)^5 \cdot i^3 = 1 \cdot (-i) = -i$.

</details>
