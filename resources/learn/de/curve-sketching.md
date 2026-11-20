---
title: Kurvendiskussion
category: calculus
order: 60
level: 3
summary: Schritt für Schritt eine Funktion untersuchen – Nullstellen, Symmetrie, Verhalten im Unendlichen, Extrem- und Wendepunkte – und daraus den Graphen skizzieren.
related: derivatives, differentiation-rules, polynomial-functions, optimization
---

Bei einer **Kurvendiskussion** untersucht man eine Funktion so lange systematisch, bis man genau weiß, wie ihr Graph aussieht: wo er die Achsen schneidet, wo er steigt und fällt, wo er Hoch- und Tiefpunkte hat und wie er gekrümmt ist. Dabei kommt alles aus Algebra und Differentialrechnung zusammen – kein Wunder, dass die Kurvendiskussion zu den Klassikern jeder Klausur gehört.

## Der Fahrplan

Eine vollständige Kurvendiskussion folgt meist diesen Schritten:

1. **Definitionsmenge** – welche $x$-Werte sind erlaubt?
2. **Symmetrie** – ist der Graph achsensymmetrisch zur $y$-Achse oder punktsymmetrisch zum Ursprung?
3. **Achsenschnittpunkte** – $y$-Achsenabschnitt $f(0)$ und Nullstellen ($f(x) = 0$).
4. **Verhalten im Unendlichen** – was passiert für $x \to \pm\infty$?
5. **Extrempunkte** – Hoch- und Tiefpunkte mithilfe von $f'$ und $f''$.
6. **Wendepunkte** – wo sich das Krümmungsverhalten ändert, mithilfe von $f''$ und $f'''$.
7. **Skizze** – alles zu einem Graphen zusammenfügen.

## Symmetrie

- Gilt $f(-x) = f(x)$ für alle $x$, ist der Graph **achsensymmetrisch zur $y$-Achse**. Bei ganzrationalen Funktionen: nur gerade Exponenten, etwa $x^4 - 2x^2 + 1$.
- Gilt $f(-x) = -f(x)$ für alle $x$, ist der Graph **punktsymmetrisch zum Ursprung**. Bei ganzrationalen Funktionen: nur ungerade Exponenten, etwa $x^3 - 3x$.

## Extrempunkte

In einem Hoch- oder Tiefpunkt ist die Tangente waagrecht, also ist $f'(x) = 0$ die **notwendige Bedingung**. Hinreichend ist sie nicht – der Graph könnte auch nur kurz flach werden. Die Entscheidung bringt die zweite Ableitung:

> **Merke:** Gilt $f'(x_0) = 0$ und $f''(x_0) < 0$, liegt bei $x_0$ ein **Hochpunkt** vor (Rechtskrümmung). Gilt $f'(x_0) = 0$ und $f''(x_0) > 0$, liegt ein **Tiefpunkt** vor (Linkskrümmung).

Ist $f''(x_0) = 0$, hilft dieses Kriterium nicht weiter. Dann prüft man den **Vorzeichenwechsel** von $f'$: Wechsel von $+$ nach $-$ bedeutet Hochpunkt, von $-$ nach $+$ Tiefpunkt. Ohne Vorzeichenwechsel liegt ein **Sattelpunkt** vor (ein Wendepunkt mit waagrechter Tangente), wie bei $f(x) = x^3$ an der Stelle $x = 0$.

## Monotonie und Krümmung

- Wo $f'(x) > 0$ ist, ist $f$ streng monoton steigend; wo $f'(x) < 0$ ist, streng monoton fallend.
- Wo $f''(x) > 0$ ist, ist der Graph **linksgekrümmt** (wie eine nach oben offene Schale); wo $f''(x) < 0$ ist, ist er **rechtsgekrümmt**.

## Wendepunkte

Ein **Wendepunkt** ist ein Punkt, in dem der Graph von einer Links- in eine Rechtskrümmung übergeht oder umgekehrt.

> **Merke:** Gilt $f''(x_0) = 0$ und $f'''(x_0) \ne 0$, dann hat $f$ an der Stelle $x_0$ einen Wendepunkt.

## Vollständiges Beispiel

Untersuche $f(x) = x^3 - 3x$.

**Ableitungen:** $f'(x) = 3x^2 - 3$, $f''(x) = 6x$, $f'''(x) = 6$.

**Definitionsmenge:** $\mathbb{R}$ (ganzrationale Funktion).

**Symmetrie:** Nur ungerade Exponenten, also $f(-x) = -f(x)$: punktsymmetrisch zum Ursprung.

**Achsenschnittpunkte:** $f(0) = 0$. Nullstellen: $x^3 - 3x = x(x^2 - 3) = 0$ liefert $x = 0$ und $x = \pm\sqrt{3} \approx \pm 1{,}73$.

**Verhalten im Unendlichen:** Der Summand mit der höchsten Potenz, $x^3$, bestimmt das Verhalten: $f(x) \to \infty$ für $x \to \infty$ und $f(x) \to -\infty$ für $x \to -\infty$.

**Extrempunkte:** $3x^2 - 3 = 0$ liefert $x = 1$ und $x = -1$.

- $f''(1) = 6 > 0$: Tiefpunkt. Mit $f(1) = 1 - 3 = -2$ ist das $T(1 \mid -2)$.
- $f''(-1) = -6 < 0$: Hochpunkt. Mit $f(-1) = -1 + 3 = 2$ ist das $H(-1 \mid 2)$.

**Monotonie:** steigend für $x < -1$, fallend für $-1 < x < 1$, steigend für $x > 1$.

**Wendepunkt:** $6x = 0$ liefert $x = 0$, und $f'''(0) = 6 \ne 0$. Der Wendepunkt ist $W(0 \mid 0)$; dort wechselt der Graph von einer Rechts- in eine Linkskrümmung.

**Skizze:** Von links unten kommend steigt der Graph bis zum Hochpunkt $H(-1 \mid 2)$, fällt durch den Ursprung zum Tiefpunkt $T(1 \mid -2)$ und steigt dann nach rechts oben. Die $x$-Achse schneidet er bei $-\sqrt{3}$, $0$ und $\sqrt{3}$.

## Gebrochenrationale Funktionen

Bei Brüchen wie $f(x) = \frac{1}{x - 2}$ kommen zwei Punkte zum Fahrplan hinzu: **Polstellen** (senkrechte Asymptoten, wo der Nenner null wird) und **waagrechte oder schiefe Asymptoten** (aus dem Verhalten im Unendlichen). Wie man sie bestimmt, steht im Artikel über Grenzwerte.

## Typische Fehler

- $f'(x_0) = 0$ schon als Nachweis für einen Extrempunkt nehmen, ohne $f''$ oder den Vorzeichenwechsel zu prüfen.
- Nur die Stelle angeben – ein Punkt braucht beide Koordinaten, also $x_0$ in $f$ einsetzen (nicht in $f'$).
- Für die hinreichende Bedingung die Stelle in $f'$ statt in $f''$ einsetzen.
- Aus $f'''(x_0) = 0$ schließen, dass kein Wendepunkt vorliegt – dann muss man den Vorzeichenwechsel von $f''$ prüfen.

## Übungen

1. Bestimme den Extrempunkt von $f(x) = x^2 - 4x + 1$.

<details>
<summary>Lösung</summary>

$f'(x) = 2x - 4 = 0$ liefert $x = 2$. Wegen $f''(x) = 2 > 0$ ist es ein Tiefpunkt. $f(2) = 4 - 8 + 1 = -3$, also $T(2 \mid -3)$.

</details>

2. Bestimme alle Extrempunkte und den Wendepunkt von $f(x) = x^3 - 6x^2 + 9x$.

<details>
<summary>Lösung</summary>

$f'(x) = 3x^2 - 12x + 9 = 3(x - 1)(x - 3)$ mit den Nullstellen $x = 1$ und $x = 3$. $f''(x) = 6x - 12$.

$f''(1) = -6 < 0$: Hochpunkt $H(1 \mid 4)$, denn $f(1) = 1 - 6 + 9 = 4$. $f''(3) = 6 > 0$: Tiefpunkt $T(3 \mid 0)$, denn $f(3) = 27 - 54 + 27 = 0$.

$f''(x) = 0$ liefert $x = 2$, und $f'''(x) = 6 \ne 0$. Wendepunkt $W(2 \mid 2)$, denn $f(2) = 8 - 24 + 18 = 2$.

</details>

3. Untersuche $f(x) = x^4 - 2x^2$ auf Symmetrie und bestimme die Extrempunkte.

<details>
<summary>Lösung</summary>

Nur gerade Exponenten, also achsensymmetrisch zur $y$-Achse. $f'(x) = 4x^3 - 4x = 4x(x^2 - 1)$ mit den Nullstellen $x = 0$, $x = 1$, $x = -1$. $f''(x) = 12x^2 - 4$.

$f''(0) = -4 < 0$: Hochpunkt $H(0 \mid 0)$. $f''(\pm 1) = 8 > 0$: Tiefpunkte $T_1(1 \mid -1)$ und $T_2(-1 \mid -1)$.

</details>

4. Beschreibe das Verhalten von $f(x) = -2x^3 + x$ im Unendlichen.

<details>
<summary>Lösung</summary>

Entscheidend ist der Summand $-2x^3$. Für $x \to \infty$ gilt $f(x) \to -\infty$, für $x \to -\infty$ gilt $f(x) \to \infty$. Der Graph verläuft von links oben nach rechts unten.

</details>
