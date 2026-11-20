---
title: Ausmultiplizieren und Ausklammern
category: algebra
order: 20
level: 1
summary: Wie man Klammern mit dem Distributivgesetz auflöst und umgekehrt gemeinsame Faktoren ausklammert.
related: variables-and-terms, binomial-formulas, quadratic-equations
---

Ausmultiplizieren und Ausklammern sind zwei Richtungen derselben Regel, des **Distributivgesetzes**. Beim Ausmultiplizieren löst man Klammern auf, beim Ausklammern (auch Faktorisieren genannt) setzt man sie wieder, indem man einen gemeinsamen Faktor nach vorne zieht. Beides braucht man ständig: das eine zum Vereinfachen von Termen und Lösen von Gleichungen, das andere zum Kürzen von Bruchtermen und zum Finden von Nullstellen.

## Das Distributivgesetz

Für alle Zahlen $a$, $b$ und $c$ gilt:

$$a(b + c) = ab + ac$$

Eine kurze Probe mit Zahlen: $3 \cdot (4 + 5) = 3 \cdot 9 = 27$ und $3 \cdot 4 + 3 \cdot 5 = 12 + 15 = 27$. Von links nach rechts gelesen beschreibt das Gesetz das **Ausmultiplizieren**, von rechts nach links das **Ausklammern**.

> **Merke:** Wird eine Klammer mit einem Faktor multipliziert, so wird **jedes** Glied in der Klammer mit diesem Faktor multipliziert – samt Vorzeichen.

## Eine Klammer auflösen

### Beispiel 1

$$3(x + 4) = 3x + 12$$

### Beispiel 2

$$-2(a - 5) = -2a + 10$$

Der Faktor $-2$ wird mit beiden Gliedern multipliziert: $(-2) \cdot a = -2a$ und $(-2) \cdot (-5) = +10$.

### Beispiel 3: Minus vor der Klammer

Ein Minuszeichen vor der Klammer bedeutet „mal $-1$“ – deshalb drehen sich beim Weglassen der Klammer alle Vorzeichen darin um:

$$7 - (2x - 3) = 7 - 2x + 3 = 10 - 2x$$

Ein Pluszeichen vor der Klammer ändert dagegen nichts: $5 + (x - 2) = 5 + x - 2 = x + 3$.

## Zwei Klammern multiplizieren

Bei zwei Klammern wird **jedes Glied der ersten Klammer mit jedem Glied der zweiten** multipliziert. Danach fasst man gleichartige Glieder zusammen:

$$(a + b)(c + d) = ac + ad + bc + bd$$

### Beispiel 4

$$(x + 3)(x - 5) = x^2 - 5x + 3x - 15 = x^2 - 2x - 15$$

### Beispiel 5

$$(2a - 1)(a + 4) = 2a^2 + 8a - a - 4 = 2a^2 + 7a - 4$$

Bei längeren Klammern funktioniert es genauso, es entstehen nur mehr Produkte. Eine Klammer mit 2 Gliedern mal eine Klammer mit 3 Gliedern ergibt zunächst $2 \cdot 3 = 6$ Produkte.

## Ausklammern

Beim Ausklammern geht man umgekehrt vor: Man sucht einen Faktor, der in **jedem** Glied steckt, und schreibt ihn vor eine Klammer.

1. Den größten gemeinsamen Teiler (ggT) der Koeffizienten bestimmen.
2. Die Variablen suchen, die in jedem Glied vorkommen – jeweils mit dem kleinsten Exponenten.
3. Jedes Glied durch diesen Faktor teilen und die Ergebnisse in die Klammer schreiben.

### Beispiel 6

$$6x + 9 = 3(2x + 3)$$

### Beispiel 7

$$4x^2 - 10x = 2x(2x - 5)$$

Beide Glieder enthalten $2$ und $x$. Probe: $2x \cdot 2x = 4x^2$ und $2x \cdot (-5) = -10x$.

### Beispiel 8

$$12a^2b - 18ab^2 = 6ab(2a - 3b)$$

> **Merke:** Ob richtig ausgeklammert wurde, prüft man durch Ausmultiplizieren. Kommt der ursprüngliche Term heraus, stimmt es.

Ist der ausgeklammerte Faktor ein ganzes Glied, bleibt an dessen Stelle eine $1$ stehen: $5x + 5 = 5(x + 1)$ und nicht $5x$.

## Ausklammern in Gruppen

Manchmal gibt es keinen Faktor, der in allen Gliedern steckt, aber je zwei Glieder haben einen gemeinsamen. Dann klammert man paarweise aus:

$$ax + ay + bx + by = a(x + y) + b(x + y) = (a + b)(x + y)$$

Jetzt ist die Klammer $(x + y)$ selbst der gemeinsame Faktor.

### Beispiel 9

$$x^3 + 2x^2 + 3x + 6 = x^2(x + 2) + 3(x + 2) = (x^2 + 3)(x + 2)$$

## Einfache quadratische Terme zerlegen

Einen Term wie $x^2 + 7x + 12$ kann man oft als $(x + p)(x + q)$ schreiben. Ausmultiplizieren zeigt $(x + p)(x + q) = x^2 + (p + q)x + pq$. Man sucht also zwei Zahlen mit der **Summe** $7$ und dem **Produkt** $12$ – das sind $3$ und $4$:

$$x^2 + 7x + 12 = (x + 3)(x + 4)$$

Besondere Muster wie $x^2 - 9 = (x + 3)(x - 3)$ gehören zu den binomischen Formeln.

## Typische Fehler

- Nur das erste Glied multiplizieren: $3(x + 4) = 3x + 4$ ist falsch.
- Nach einem Minus vor der Klammer nicht alle Vorzeichen umdrehen: $-(2x - 3)$ ergibt $-2x + 3$, nicht $-2x - 3$.
- Beim Multiplizieren zweier Klammern Produkte vergessen – jedes Glied muss mit jedem multipliziert werden.
- Beim Ausklammern die $1$ vergessen: $3x + 3 = 3(x + 1)$.
- Nicht den *größten* gemeinsamen Faktor ausklammern: $8x + 12 = 2(4x + 6)$ ist zwar richtig, aber erst $4(2x + 3)$ ist fertig.

## Übungen

1. Multipliziere aus: $-3(2x - 4)$.

<details>
<summary>Lösung</summary>

$(-3) \cdot 2x = -6x$ und $(-3) \cdot (-4) = 12$, also $-6x + 12$.

</details>

2. Multipliziere aus und vereinfache: $(x - 4)(x + 6)$.

<details>
<summary>Lösung</summary>

$x^2 + 6x - 4x - 24 = x^2 + 2x - 24$.

</details>

3. Vereinfache $4(x + 2) - 2(3x - 1)$.

<details>
<summary>Lösung</summary>

$4x + 8 - 6x + 2 = -2x + 10$.

</details>

4. Klammere aus: $15a^2 - 10a$.

<details>
<summary>Lösung</summary>

Der gemeinsame Faktor ist $5a$: $15a^2 - 10a = 5a(3a - 2)$.

</details>

5. Klammere in Gruppen aus: $2xy + 6x + y + 3$.

<details>
<summary>Lösung</summary>

$2x(y + 3) + 1 \cdot (y + 3) = (2x + 1)(y + 3)$.

</details>
