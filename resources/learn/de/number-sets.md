---
title: Zahlenmengen
category: arithmetic
order: 10
level: 1
summary: Natürliche, ganze, rationale und reelle Zahlen – wie die wichtigsten Zahlenmengen aufgebaut sind und wie sie ineinanderstecken.
related: negative-numbers, decimals, powers-and-roots, sets-and-logic
---

Zahl ist nicht gleich Zahl. Beim Zählen reichen $1, 2, 3, \dots$, für Schulden braucht man negative Zahlen, zum Teilen einer Pizza Brüche – und für die Diagonale eines Quadrats sogar noch etwas Besonderes. Deshalb ordnet man Zahlen in **Zahlenmengen** ein. Jede neue Menge erweitert die vorige, damit mehr Rechnungen möglich werden.

## Die natürlichen Zahlen $\mathbb{N}$

Die **natürlichen Zahlen** sind die Zahlen, mit denen man zählt:

$$\mathbb{N} = \{1, 2, 3, 4, \dots\}$$

Ob die $0$ dazugehört, ist nicht einheitlich geregelt. Will man sie ausdrücklich mitnehmen, schreibt man $\mathbb{N}_0 = \{0, 1, 2, 3, \dots\}$.

Addiert oder multipliziert man zwei natürliche Zahlen, kommt immer wieder eine natürliche Zahl heraus. Man sagt: $\mathbb{N}$ ist **abgeschlossen** bezüglich Addition und Multiplikation. Bei der Subtraktion klappt das nicht mehr: $3 - 5$ hat in $\mathbb{N}$ kein Ergebnis.

## Die ganzen Zahlen $\mathbb{Z}$

Damit jede Subtraktion lösbar ist, nimmt man die negativen ganzen Zahlen hinzu. So entstehen die **ganzen Zahlen**:

$$\mathbb{Z} = \{\dots, -3, -2, -1, 0, 1, 2, 3, \dots\}$$

Jetzt geht $3 - 5 = -2$. Die Division bleibt aber ein Problem: $7 : 2$ ist keine ganze Zahl.

## Die rationalen Zahlen $\mathbb{Q}$

Eine **rationale Zahl** ist jede Zahl, die sich als Bruch zweier ganzer Zahlen schreiben lässt:

$$\mathbb{Q} = \left\{ \frac{p}{q} \;\middle|\; p, q \in \mathbb{Z},\ q \neq 0 \right\}$$

Das $\mathbb{Q}$ steht für *Quotient*. Jede ganze Zahl ist auch rational, denn $5 = \frac{5}{1}$. In $\mathbb{Q}$ kann man addieren, subtrahieren, multiplizieren und dividieren (außer durch null), ohne die Menge zu verlassen.

Als Dezimalzahl geschrieben sind rationale Zahlen genau die **abbrechenden** oder **periodischen** Dezimalzahlen:

- $\frac{3}{4} = 0{,}75$ (abbrechend)
- $\frac{1}{3} = 0{,}333\dots = 0{,}\overline{3}$ (periodisch)
- $\frac{5}{11} = 0{,}\overline{45}$ (Periode mit zwei Ziffern)

## Die irrationalen Zahlen

Manche Zahlen lassen sich überhaupt nicht als Bruch schreiben. Ihre Dezimaldarstellung bricht nie ab und wird **nie** periodisch. Das sind die **irrationalen Zahlen**. Bekannte Beispiele:

- $\sqrt{2} = 1{,}41421356\dots$ – die Diagonale eines Quadrats mit Seitenlänge 1
- $\pi = 3{,}14159265\dots$ – das Verhältnis von Kreisumfang zu Durchmesser
- $e = 2{,}71828182\dots$ – die Eulersche Zahl

Die Wurzel aus einer natürlichen Zahl ist entweder selbst eine natürliche Zahl (wie $\sqrt{49} = 7$) oder irrational (wie $\sqrt{5}$). Etwas dazwischen gibt es nicht.

## Die reellen Zahlen $\mathbb{R}$

Rationale und irrationale Zahlen bilden zusammen die **reellen Zahlen** $\mathbb{R}$. Sie füllen den Zahlenstrahl lückenlos aus: Zu jedem Punkt auf der Zahlengeraden gehört genau eine reelle Zahl und umgekehrt.

> **Merke:** Die Zahlenmengen stecken ineinander: $\mathbb{N} \subset \mathbb{Z} \subset \mathbb{Q} \subset \mathbb{R}$. Jede neue Menge wurde eingeführt, damit eine vorher unmögliche Rechnung lösbar wird.

Man kann sich das wie ineinandergestellte Schachteln vorstellen: Jede natürliche Zahl ist auch eine ganze Zahl, jede ganze Zahl auch rational und jede rationale Zahl auch reell. Die irrationalen Zahlen sind der Teil von $\mathbb{R}$, der nicht in $\mathbb{Q}$ liegt, kurz $\mathbb{R} \setminus \mathbb{Q}$.

## Schreibweisen

- $a \in \mathbb{Z}$ heißt „$a$ ist Element von $\mathbb{Z}$“, z. B. $-4 \in \mathbb{Z}$.
- $a \notin \mathbb{N}$ heißt „$a$ ist kein Element von $\mathbb{N}$“, z. B. $-4 \notin \mathbb{N}$.
- Mit $\mathbb{Z}^+$ oder $\mathbb{R}^+$ meint man oft nur die positiven Elemente.

## Beispiele

### Beispiel 1: Zahlen einordnen

Gib jeweils die kleinste Zahlenmenge an, in der die Zahl liegt.

| Zahl | Kleinste Menge | Begründung |
|---|---|---|
| $12$ | $\mathbb{N}$ | Zählzahl |
| $-7$ | $\mathbb{Z}$ | negative ganze Zahl |
| $0{,}25$ | $\mathbb{Q}$ | gleich $\frac{1}{4}$ |
| $\sqrt{36}$ | $\mathbb{N}$ | gleich $6$ |
| $\sqrt{10}$ | irrational, also $\mathbb{R}$ | $10$ ist keine Quadratzahl |
| $-\frac{8}{2}$ | $\mathbb{Z}$ | gleich $-4$ |

Immer zuerst vereinfachen: $\sqrt{36}$ und $-\frac{8}{2}$ sehen kompliziert aus, sind aber ganze Zahlen.

### Beispiel 2: periodische Dezimalzahl in einen Bruch umwandeln

Zeige, dass $0{,}\overline{7}$ rational ist. Setze $x = 0{,}777\dots$. Dann gilt

$$10x = 7{,}777\dots$$

Zieht man die erste Gleichung von der zweiten ab, fällt die unendliche Periode weg:

$$10x - x = 7 \quad\Rightarrow\quad 9x = 7 \quad\Rightarrow\quad x = \frac{7}{9}$$

Also ist $0{,}\overline{7} = \frac{7}{9} \in \mathbb{Q}$.

### Beispiel 3: Welche Rechnungen bleiben in der Menge?

Ist $\mathbb{Z}$ abgeschlossen bezüglich der Division? Nein: $1 : 2 = 0{,}5$, und $0{,}5 \notin \mathbb{Z}$. Ein einziges Gegenbeispiel genügt, um zu zeigen, dass eine Menge *nicht* abgeschlossen ist.

> **Merke:** Abbrechende und periodische Dezimalzahlen sind rational. Dezimalzahlen, die nie abbrechen und nie periodisch werden, sind irrational.

## Typische Fehler

- $\sqrt{16}$ für irrational halten, nur weil ein Wurzelzeichen dasteht – es ist einfach $4$.
- Glauben, $\pi$ sei genau $3{,}14$ oder genau $\frac{22}{7}$. Das sind nur Näherungswerte, $\pi$ ist irrational.
- Vergessen, dass ganze Zahlen auch rationale Zahlen sind (und natürliche Zahlen auch ganze Zahlen).
- Annehmen, eine lange Dezimalzahl müsse irrational sein – $\frac{1}{7} = 0{,}\overline{142857}$ ist lang, aber periodisch und damit rational.
- Die $0$ für negativ halten. Null ist weder positiv noch negativ.

## Übungen

1. Welche dieser Zahlen sind ganze Zahlen: $-3$, $\frac{1}{2}$, $0$, $\sqrt{25}$, $2{,}5$?

<details>
<summary>Lösung</summary>

$-3$, $0$ und $\sqrt{25} = 5$ sind ganze Zahlen. $\frac{1}{2}$ und $2{,}5$ sind rational, aber nicht ganz.

</details>

2. Entscheide, ob die Zahl rational oder irrational ist: $\sqrt{3}$, $0{,}\overline{12}$, $\frac{22}{7}$, $\pi$.

<details>
<summary>Lösung</summary>

$\sqrt{3}$ ist irrational ($3$ ist keine Quadratzahl). $0{,}\overline{12}$ ist rational (periodisch). $\frac{22}{7}$ ist rational (Bruch aus ganzen Zahlen). $\pi$ ist irrational.

</details>

3. Schreibe $0{,}\overline{4}$ als Bruch.

<details>
<summary>Lösung</summary>

Setze $x = 0{,}444\dots$. Dann ist $10x = 4{,}444\dots$, also $10x - x = 4$. Daraus folgt $9x = 4$ und $x = \frac{4}{9}$.

</details>

4. Gib ein Gegenbeispiel an, das zeigt: $\mathbb{N}$ ist nicht abgeschlossen bezüglich der Subtraktion.

<details>
<summary>Lösung</summary>

Zum Beispiel $2 - 5 = -3$. Sowohl $2$ als auch $5$ sind natürliche Zahlen, aber $-3 \notin \mathbb{N}$.

</details>

5. Wahr oder falsch: Jede reelle Zahl ist rational.

<details>
<summary>Lösung</summary>

Falsch. Zum Beispiel ist $\sqrt{2}$ reell, lässt sich aber nicht als Bruch ganzer Zahlen schreiben – sie ist irrational.

</details>
