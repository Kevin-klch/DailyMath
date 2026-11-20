---
title: Lineare Gleichungen
category: algebra
order: 40
level: 1
summary: Wie man Gleichungen wie 3x + 5 = 20 Schritt für Schritt durch Äquivalenzumformungen löst – auch mit Klammern, Brüchen und Textaufgaben.
related: variables-and-terms, expanding-and-factoring, inequalities, systems-of-equations
---

Eine Gleichung sagt aus, dass zwei Terme gleich sind. Bei einer **linearen Gleichung** kommt die Variable nur in der ersten Potenz vor – kein $x^2$, kein $\sqrt{x}$, kein $x$ im Nenner. Eine Gleichung zu lösen heißt, den Wert der Variablen zu finden, für den die Aussage wahr ist. Lineare Gleichungen sind das Fundament der Algebra: Fast jede Textaufgabe, jedes Umstellen von Formeln und viele schwierigere Gleichungen laufen am Ende auf eine lineare Gleichung hinaus.

## Die Idee der Waage

Man kann sich eine Gleichung wie eine Balkenwaage vorstellen: Linke und rechte Seite sind gleich schwer. Macht man auf beiden Seiten dasselbe, bleibt die Waage im Gleichgewicht. Erlaubt sind diese **Äquivalenzumformungen**:

- auf beiden Seiten dieselbe Zahl oder denselben Term addieren,
- auf beiden Seiten dieselbe Zahl oder denselben Term subtrahieren,
- beide Seiten mit derselben Zahl multiplizieren (nicht mit null),
- beide Seiten durch dieselbe Zahl dividieren (nicht durch null).

> **Merke:** Was man auf der einen Seite der Gleichung macht, muss man auch auf der anderen Seite machen. Ziel ist, dass die Variable allein auf einer Seite steht: $x = \ldots$

## Das Lösungsverfahren

1. Beide Seiten **vereinfachen**: Klammern auflösen, gleichartige Glieder zusammenfassen.
2. Alle Glieder mit der Variablen auf eine Seite **bringen**, alle Zahlen auf die andere (durch Addieren oder Subtrahieren).
3. Durch den Koeffizienten der Variablen **dividieren**.
4. Die **Probe** machen: Lösung in die ursprüngliche Gleichung einsetzen.

Üblich ist es, die Umformung rechts hinter einem senkrechten Strich zu notieren, zum Beispiel „$| -5$“.

### Beispiel 1

$$3x + 5 = 20 \qquad | -5$$

$$3x = 15 \qquad | :3$$

$$x = 5$$

Probe: $3 \cdot 5 + 5 = 20$. Stimmt.

### Beispiel 2: Variable auf beiden Seiten

$$5x - 7 = 2x + 11$$

Minus $2x$: $3x - 7 = 11$. Plus $7$: $3x = 18$. Geteilt durch $3$: $x = 6$.

Probe: links $5 \cdot 6 - 7 = 23$, rechts $2 \cdot 6 + 11 = 23$. Stimmt.

### Beispiel 3: Klammern

$$4(x - 2) = 2(x + 3)$$

Ausmultiplizieren: $4x - 8 = 2x + 6$. Minus $2x$: $2x - 8 = 6$. Plus $8$: $2x = 14$, also $x = 7$.

### Beispiel 4: Brüche

$$\frac{x}{2} + \frac{x}{3} = 10$$

Die Brüche verschwinden, wenn man beide Seiten mit dem Hauptnenner $6$ multipliziert:

$$3x + 2x = 60 \quad\Rightarrow\quad 5x = 60 \quad\Rightarrow\quad x = 12$$

> **Merke:** Kommen in einer Gleichung Brüche vor, multipliziert man zuerst **jedes** Glied auf beiden Seiten mit dem Hauptnenner. Dann ist der Rest reine Routine.

## Sonderfälle

Meist hat eine lineare Gleichung genau eine Lösung. Es gibt aber zwei weitere Möglichkeiten – man erkennt sie daran, dass die Variable verschwindet:

- **Keine Lösung:** $2x + 1 = 2x + 5$ führt auf $1 = 5$, eine falsche Aussage. Die Lösungsmenge ist leer: $L = \{\}$.
- **Unendlich viele Lösungen:** $2(x + 1) = 2x + 2$ führt auf $2 = 2$, eine immer wahre Aussage. Jede Zahl ist Lösung: $L = \mathbb{R}$.

## Textaufgaben

Bei Textaufgaben wählt man eine Variable für die gesuchte Größe, übersetzt den Text in eine Gleichung, löst sie und formuliert einen Antwortsatz.

### Beispiel 5

Drei aufeinanderfolgende ganze Zahlen ergeben zusammen $48$. Wie heißen sie?

Die kleinste Zahl sei $x$. Die anderen sind dann $x + 1$ und $x + 2$:

$$x + (x + 1) + (x + 2) = 48 \quad\Rightarrow\quad 3x + 3 = 48 \quad\Rightarrow\quad 3x = 45 \quad\Rightarrow\quad x = 15$$

Die Zahlen sind $15$, $16$ und $17$.

## Formeln umstellen

Dieselben Schritte funktionieren, wenn statt Zahlen Buchstaben dastehen. Will man die Flächenformel des Rechtecks $A = a \cdot b$ nach $b$ auflösen, teilt man beide Seiten durch $a$: $b = \frac{A}{a}$.

## Typische Fehler

- Eine Umformung nur auf einer Seite oder nur bei einigen Gliedern ausführen.
- Ein Glied „auf die andere Seite bringen“, ohne das Vorzeichen zu ändern: Aus $x + 4 = 9$ wird $x = 9 - 4$, nicht $x = 9 + 4$.
- Beim Multiplizieren mit dem Hauptnenner die Glieder ohne Bruch vergessen.
- Vorzeichenfehler beim Auflösen einer Minusklammer: $-(x - 3) = -x + 3$.
- Falsch durch den Koeffizienten teilen: Aus $-3x = 12$ folgt $x = -4$, nicht $x = 4$.
- Die Probe weglassen – sie deckt die meisten dieser Fehler auf.

## Übungen

1. Löse $7x - 4 = 24$.

<details>
<summary>Lösung</summary>

Plus $4$: $7x = 28$. Geteilt durch $7$: $x = 4$.

</details>

2. Löse $3(x + 2) = x + 16$.

<details>
<summary>Lösung</summary>

$3x + 6 = x + 16$. Minus $x$ und minus $6$: $2x = 10$, also $x = 5$. Probe: $3 \cdot 7 = 21$ und $5 + 16 = 21$.

</details>

3. Löse $6 - 2(x - 1) = 4x - 10$.

<details>
<summary>Lösung</summary>

Klammer auflösen: $6 - 2x + 2 = 4x - 10$, also $8 - 2x = 4x - 10$. Plus $2x$ und plus $10$: $18 = 6x$, also $x = 3$.

</details>

4. Löse $\frac{x + 1}{4} = \frac{x - 2}{3}$.

<details>
<summary>Lösung</summary>

Mit $12$ multiplizieren: $3(x + 1) = 4(x - 2)$, also $3x + 3 = 4x - 8$. Minus $3x$ und plus $8$: $x = 11$.

</details>

5. Anna ist dreimal so alt wie Ben. In 10 Jahren ist sie doppelt so alt wie Ben. Wie alt sind beide heute?

<details>
<summary>Lösung</summary>

Ben sei $b$ Jahre alt, Anna $3b$. In 10 Jahren gilt: $3b + 10 = 2(b + 10)$, also $3b + 10 = 2b + 20$ und $b = 10$. Ben ist 10, Anna 30 Jahre alt. Probe: In 10 Jahren sind sie 20 und 40.

</details>
