---
title: Stetigkeit
category: calculus
order: 30
level: 3
summary: Wann lässt sich ein Graph ohne Absetzen zeichnen? Die genaue Definition der Stetigkeit, Arten von Unstetigkeitsstellen und der Zwischenwertsatz.
related: limits, derivatives, functions-basics
---

Anschaulich heißt eine Funktion **stetig**, wenn man ihren Graphen in einem Zug zeichnen kann, ohne den Stift abzusetzen. Stetigkeit ist aber mehr als eine schöne Eigenschaft: Viele wichtige Sätze – etwa dass eine Funktion, die von negativen zu positiven Werten wechselt, eine Nullstelle haben muss – gelten nur für stetige Funktionen. Hier wird aus dem Bild mit dem Stift eine genaue Definition mithilfe von Grenzwerten.

## Die Definition

Eine Funktion $f$ heißt **stetig an der Stelle** $x = a$, wenn drei Bedingungen erfüllt sind:

1. $f(a)$ ist definiert,
2. der Grenzwert $\lim_{x \to a} f(x)$ existiert (links- und rechtsseitiger Grenzwert stimmen überein),
3. der Grenzwert stimmt mit dem Funktionswert überein.

> **Merke:** $f$ ist stetig an der Stelle $a$, wenn $\lim_{x \to a} f(x) = f(a)$ gilt. Mit Worten: Kommt $x$ nahe an $a$ heran, dann kommt $f(x)$ nahe an $f(a)$ heran – es gibt keine Sprünge.

Eine Funktion heißt stetig (auf einem Intervall), wenn sie an jeder Stelle dieses Intervalls stetig ist.

## Welche Funktionen sind stetig?

Die gute Nachricht: Fast alle Funktionen aus der Schule sind auf ihrer Definitionsmenge stetig:

- ganzrationale Funktionen wie $x^3 - 2x + 1$,
- Exponentialfunktionen wie $e^x$ sowie Logarithmusfunktionen für $x > 0$,
- $\sin x$ und $\cos x$,
- gebrochenrationale Funktionen wie $\frac{1}{x}$ an allen Stellen, an denen der Nenner nicht null ist.

Summen, Differenzen, Produkte, Quotienten (mit Nenner ungleich null) und Verkettungen stetiger Funktionen sind wieder stetig. Prüfen muss man deshalb meist nur besondere Stellen – dort, wo eine abschnittsweise definierte Funktion die Vorschrift wechselt, oder wo ein Nenner null wird.

## Arten von Unstetigkeitsstellen

### Sprungstelle

Links- und rechtsseitiger Grenzwert existieren, sind aber verschieden. Beispiel:

$$f(x) = \begin{cases} 1 & \text{für } x < 0 \\ 2 & \text{für } x \ge 0 \end{cases}$$

Bei $x = 0$ springt der Graph von der Höhe $1$ auf die Höhe $2$.

### Hebbare Definitionslücke

Der Grenzwert existiert, aber $f(a)$ ist nicht definiert oder hat den „falschen“ Wert. Beispiel: $f(x) = \frac{x^2 - 1}{x - 1}$ ist bei $x = 1$ nicht definiert. Für $x \ne 1$ gilt $f(x) = x + 1$, also ist $\lim_{x \to 1} f(x) = 2$. Der Graph ist eine Gerade, in der genau ein Punkt fehlt. Setzt man $f(1) = 2$, ist die Lücke geschlossen und die Funktion stetig – man spricht von einer **stetigen Fortsetzung**.

### Polstelle

Die Funktionswerte wachsen über jede Grenze, wie bei $\frac{1}{x}$ in der Nähe von $x = 0$. Streng genommen ist $\frac{1}{x}$ auf ihrer Definitionsmenge stetig – die Stelle $0$ gehört einfach nicht dazu. Über $x = 0$ hinweg lässt sich der Graph aber nicht in einem Zug zeichnen.

## Abschnittsweise definierte Funktionen prüfen

### Beispiel 1

Ist $f(x) = \begin{cases} x^2 & \text{für } x \le 1 \\ 2x - 1 & \text{für } x > 1 \end{cases}$ an der Stelle $x = 1$ stetig?

- Funktionswert: $f(1) = 1^2 = 1$.
- Linksseitiger Grenzwert: $\lim_{x \to 1^-} x^2 = 1$.
- Rechtsseitiger Grenzwert: $\lim_{x \to 1^+} (2x - 1) = 1$.

Alle drei stimmen überein, also ist $f$ bei $x = 1$ stetig.

### Beispiel 2: Parameter bestimmen

Für welches $a$ ist $f(x) = \begin{cases} x + a & \text{für } x < 2 \\ x^2 & \text{für } x \ge 2 \end{cases}$ stetig?

Beide Teilfunktionen sind für sich stetig, es kommt also nur auf $x = 2$ an. Der linksseitige Grenzwert ist $2 + a$, rechtsseitiger Grenzwert und Funktionswert sind $2^2 = 4$. Stetigkeit verlangt $2 + a = 4$, also $a = 2$.

## Der Zwischenwertsatz

> **Merke:** Ist $f$ auf $[a; b]$ stetig, dann nimmt $f$ jeden Wert zwischen $f(a)$ und $f(b)$ an. Insbesondere gilt: Haben $f(a)$ und $f(b)$ verschiedene Vorzeichen, besitzt $f$ zwischen $a$ und $b$ mindestens eine Nullstelle.

### Beispiel 3

Hat $f(x) = x^3 + x - 1$ eine Nullstelle zwischen $0$ und $1$?

$f(0) = -1 < 0$ und $f(1) = 1 > 0$. Da $f$ ganzrational und damit stetig ist, muss dazwischen eine Nullstelle liegen – auch wenn wir sie nicht einfach exakt ausrechnen können. Näherungsverfahren wie die Intervallhalbierung beruhen genau auf dieser Idee.

Ein verwandter Satz, der **Satz vom Maximum und Minimum**, besagt: Eine auf einem abgeschlossenen Intervall $[a; b]$ stetige Funktion hat dort immer einen größten und einen kleinsten Wert.

## Stetigkeit und Differenzierbarkeit

Jede differenzierbare Funktion ist stetig, aber nicht umgekehrt. Die Betragsfunktion $f(x) = |x|$ ist bei $0$ stetig, ihr Graph hat dort aber einen Knick. Deshalb besitzt sie an der Stelle $0$ keine Ableitung.

## Typische Fehler

- Nur den Funktionswert oder nur eine Seite prüfen – alle drei Bedingungen müssen erfüllt sein.
- $\frac{1}{x}$ „bei $0$ unstetig“ nennen, ohne zu bemerken, dass $0$ gar nicht zur Definitionsmenge gehört.
- An der Nahtstelle einer abschnittsweise definierten Funktion für eine Seite die falsche Vorschrift einsetzen.
- Den Zwischenwertsatz auf Funktionen anwenden, die nicht auf dem ganzen Intervall stetig sind.

## Übungen

1. Ist $f(x) = \begin{cases} 3x - 1 & \text{für } x < 2 \\ x^2 + 1 & \text{für } x \ge 2 \end{cases}$ an der Stelle $x = 2$ stetig?

<details>
<summary>Lösung</summary>

Linksseitiger Grenzwert: $3 \cdot 2 - 1 = 5$. Rechtsseitiger Grenzwert und Funktionswert: $2^2 + 1 = 5$. Alles stimmt überein, also ist $f$ bei $x = 2$ stetig.

</details>

2. Bestimme $k$ so, dass $f(x) = \begin{cases} kx & \text{für } x \le 3 \\ x^2 - 3 & \text{für } x > 3 \end{cases}$ stetig ist.

<details>
<summary>Lösung</summary>

Bei $x = 3$: links $3k$, rechts $9 - 3 = 6$. Aus $3k = 6$ folgt $k = 2$.

</details>

3. $g(x) = \frac{x^2 - 4}{x + 2}$ ist bei $x = -2$ nicht definiert. Welchen Wert muss man $g(-2)$ geben, damit $g$ stetig wird?

<details>
<summary>Lösung</summary>

Für $x \ne -2$ gilt $\frac{(x-2)(x+2)}{x+2} = x - 2$. Der Grenzwert bei $-2$ ist $-2 - 2 = -4$, also setzt man $g(-2) = -4$. Es handelt sich um eine hebbare Definitionslücke.

</details>

4. Zeige, dass $f(x) = x^3 - 3x + 1$ zwischen $0$ und $1$ eine Nullstelle hat.

<details>
<summary>Lösung</summary>

$f(0) = 1 > 0$ und $f(1) = 1 - 3 + 1 = -1 < 0$. Als ganzrationale Funktion ist $f$ stetig, nach dem Zwischenwertsatz liegt also im Intervall $]0; 1[$ eine Nullstelle.

</details>
