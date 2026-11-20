---
title: Extremwertaufgaben
category: calculus
order: 70
level: 3
summary: Größte Fläche, geringste Kosten, maximales Volumen – wie man aus einer Textaufgabe eine Zielfunktion macht und ihren besten Wert mit Ableitungen findet.
related: curve-sketching, differentiation-rules, quadratic-functions
---

Wie muss man eine Weide einzäunen, damit die Fläche möglichst groß wird? Wie faltet man eine Schachtel mit dem größten Volumen? **Extremwertaufgaben** (auch Optimierungsprobleme genannt) fragen nach dem bestmöglichen Wert einer Größe unter bestimmten Bedingungen. Mit Ableitungen lassen sie sich exakt lösen – der schwierigste Teil ist meist, die richtige Funktion aufzustellen.

## Das Lösungsschema

Fast jede Extremwertaufgabe lässt sich nach demselben Rezept lösen:

1. **Zielfunktion:** Welche Größe soll maximal oder minimal werden? Stelle eine Formel dafür auf – oft enthält sie zunächst zwei Variablen.
2. **Nebenbedingung:** Welche Bedingung verknüpft die Variablen? Schreibe sie als Gleichung.
3. **Eine Variable:** Löse die Nebenbedingung nach einer Variablen auf und setze sie in die Zielfunktion ein.
4. **Definitionsbereich:** Welche Werte sind in der Sachsituation sinnvoll (Längen müssen positiv sein usw.)?
5. **Extremstelle:** Ableitung gleich null setzen und mit der zweiten Ableitung prüfen.
6. **Randwerte und Antwortsatz:** Gegebenenfalls mit den Werten am Rand des Definitionsbereichs vergleichen und die eigentliche Frage mit Einheiten beantworten.

> **Merke:** Zielfunktion + Nebenbedingung → Funktion mit nur einer Variablen → Ableitung gleich null → prüfen, ob wirklich das gesuchte Maximum bzw. Minimum vorliegt.

## Beispiel 1: das größte Rechteck

Eine Landwirtin hat $40$ m Zaun und möchte damit eine möglichst große rechteckige Fläche einzäunen.

**Zielfunktion:** Flächeninhalt $A = a \cdot b$.

**Nebenbedingung:** Umfang $2a + 2b = 40$, also $b = 20 - a$.

**Eine Variable:** $A(a) = a(20 - a) = 20a - a^2$.

**Definitionsbereich:** $0 < a < 20$.

**Extremstelle:** $A'(a) = 20 - 2a = 0$ liefert $a = 10$. Wegen $A''(a) = -2 < 0$ liegt ein Maximum vor.

**Antwort:** $b = 20 - 10 = 10$. Am günstigsten ist ein Quadrat mit $10$ m Seitenlänge; die Fläche beträgt dann $100$ m².

## Beispiel 2: die offene Schachtel

Aus einem quadratischen Karton mit $12$ cm Seitenlänge werden an den Ecken gleich große Quadrate mit der Seitenlänge $x$ ausgeschnitten. Die Seiten werden hochgeklappt, sodass eine oben offene Schachtel entsteht. Für welches $x$ wird das Volumen maximal?

**Zielfunktion:** Die Grundfläche ist ein Quadrat mit der Seite $12 - 2x$, die Höhe ist $x$:

$$V(x) = x(12 - 2x)^2 = 4x^3 - 48x^2 + 144x$$

**Definitionsbereich:** $0 < x < 6$ (sonst bleibt keine Grundfläche übrig).

**Extremstelle:**

$$V'(x) = 12x^2 - 96x + 144 = 12(x^2 - 8x + 12) = 12(x - 2)(x - 6)$$

Die Nullstellen sind $x = 2$ und $x = 6$; nur $x = 2$ liegt im Definitionsbereich. Mit $V''(x) = 24x - 96$ ist $V''(2) = -48 < 0$: ein Maximum.

**Antwort:** Man schneidet Quadrate mit $2$ cm Seitenlänge aus. Die Schachtel hat dann das Volumen $V(2) = 2 \cdot 8^2 = 128$ cm³.

## Beispiel 3: ein Minimum

Zwei Zahlen haben die Summe $10$. Wann ist die Summe ihrer Quadrate am kleinsten?

Mit $x$ und $10 - x$ ergibt sich $S(x) = x^2 + (10 - x)^2$. Dann ist $S'(x) = 2x - 2(10 - x) = 4x - 20 = 0$ für $x = 5$. Wegen $S''(x) = 4 > 0$ ist das ein Minimum. Beide Zahlen sind $5$, die kleinste Quadratsumme ist $50$.

## Auf die Ränder achten

Die Ableitung findet nur Extremstellen *im Inneren* des Definitionsbereichs. Ist der Definitionsbereich ein abgeschlossenes Intervall, kann der größte oder kleinste Wert auch am Rand liegen. Darf eine Länge zum Beispiel höchstens $3$ m betragen und steigt die Zielfunktion bei $3$ noch, dann liegt das Maximum am Rand – dort, wo die Ableitung gar nicht null ist. Man spricht dann von einem **Randextremum**.

> **Merke:** Auf einem abgeschlossenen Intervall vergleicht man die Funktionswerte an den Extremstellen mit den Werten an den Rändern. Der größte davon ist das globale Maximum, der kleinste das globale Minimum.

## Typische Fehler

- Eine Funktion mit zwei Variablen ableiten – erst muss mit der Nebenbedingung eine Variable eliminiert werden.
- Den Definitionsbereich vergessen und eine Lösung wie $x = 6$ in Beispiel 2 akzeptieren, die eine Schachtel ohne Boden ergibt.
- Nicht prüfen, ob die gefundene Stelle ein Maximum oder ein Minimum ist.
- Nach dem Berechnen von $x$ aufhören – oft ist nach der Fläche, dem Volumen oder der zweiten Seitenlänge gefragt.

## Übungen

1. Zwei positive Zahlen haben die Summe $18$. Für welche Zahlen ist ihr Produkt am größten?

<details>
<summary>Lösung</summary>

$P(x) = x(18 - x) = 18x - x^2$. $P'(x) = 18 - 2x = 0$ liefert $x = 9$; wegen $P''(x) = -2 < 0$ ein Maximum. Beide Zahlen sind $9$, das Produkt ist $81$.

</details>

2. Ein Rechteck hat den Flächeninhalt $64$ m². Bei welchen Seitenlängen ist der Umfang am kleinsten?

<details>
<summary>Lösung</summary>

Aus $a \cdot b = 64$ folgt $b = \frac{64}{a}$. Umfang $U(a) = 2a + \frac{128}{a}$. $U'(a) = 2 - \frac{128}{a^2} = 0$ liefert $a^2 = 64$, also $a = 8$ (wegen $a > 0$). $U''(a) = \frac{256}{a^3} > 0$, also ein Minimum. Das Rechteck ist ein Quadrat mit $8$ m Seitenlänge und $32$ m Umfang.

</details>

3. Eine rechteckige Weide an einem geraden Fluss wird nur an drei Seiten eingezäunt (der Fluss bildet die vierte Seite). Es stehen $60$ m Zaun zur Verfügung. Wie groß kann die Weide höchstens werden?

<details>
<summary>Lösung</summary>

Sei $x$ die Länge der beiden Seiten senkrecht zum Fluss und $y$ die Seite parallel dazu: $2x + y = 60$, also $y = 60 - 2x$. $A(x) = x(60 - 2x) = 60x - 2x^2$. $A'(x) = 60 - 4x = 0$ liefert $x = 15$; $A''(x) = -4 < 0$. Dann ist $y = 30$ und die Fläche $15 \cdot 30 = 450$ m².

</details>

4. Ein Rechteck hat eine Ecke im Ursprung und die gegenüberliegende Ecke im ersten Quadranten auf der Geraden $y = -2x + 8$. Bestimme den größtmöglichen Flächeninhalt.

<details>
<summary>Lösung</summary>

Die Ecke ist $P(x \mid -2x + 8)$ mit $0 < x < 4$. $A(x) = x(-2x + 8) = -2x^2 + 8x$. $A'(x) = -4x + 8 = 0$ liefert $x = 2$; $A''(x) = -4 < 0$. Die Höhe ist $-4 + 8 = 4$, der Flächeninhalt $2 \cdot 4 = 8$.

</details>
