---
title: Ähnlichkeit und Strahlensätze
category: geometry
order: 70
level: 2
summary: Gleiche Form, andere Größe – Streckfaktor, ähnliche Dreiecke, wie sich Flächen und Volumen ändern, und die Strahlensätze an Parallelen.
related: triangles, ratios-and-proportions, trigonometry, solids
---

Zwei Figuren heißen **ähnlich**, wenn die eine eine vergrößerte oder verkleinerte Kopie der anderen ist – gleiche Form, eventuell andere Größe. Landkarten, Modelleisenbahnen, Fotos auf verschiedenen Bildschirmen und Schatten auf dem Boden beruhen auf Ähnlichkeit. Mit den **Strahlensätzen** wird daraus ein praktisches Werkzeug, um Längen zu berechnen, die man nicht direkt messen kann.

## Der Streckfaktor

Beim Vergrößern oder Verkleinern wird jede Länge mit derselben Zahl $k$ multipliziert, dem **Streckfaktor** (Ähnlichkeitsfaktor):

- $k > 1$: Vergrößerung,
- $0 < k < 1$: Verkleinerung,
- $k = 1$: kongruent (gleich groß).

> **Merke:** In ähnlichen Figuren sind einander entsprechende Winkel gleich groß, und entsprechende Strecken stehen im selben Verhältnis: $\frac{a'}{a} = \frac{b'}{b} = \frac{c'}{c} = k$.

Eine Karte im Maßstab $1 : 25\,000$ ist eine Verkleinerung mit $k = \frac{1}{25\,000}$: $8\text{ cm}$ auf der Karte entsprechen $8 \cdot 25\,000 = 200\,000\text{ cm} = 2\text{ km}$ in Wirklichkeit.

## Ähnliche Dreiecke

Bei Dreiecken muss man nicht alles prüfen. Zwei Dreiecke sind ähnlich, wenn einer der **Ähnlichkeitssätze** erfüllt ist:

- **WW**: Zwei Winkel stimmen überein (dann wegen der Winkelsumme auch der dritte).
- **SSS**: Alle drei Seitenpaare stehen im gleichen Verhältnis.
- **SWS**: Zwei Seitenpaare stehen im gleichen Verhältnis, und die eingeschlossenen Winkel sind gleich.

Am häufigsten braucht man den Satz WW: Sobald man zwei passende Winkel gefunden hat, sind die Dreiecke ähnlich und man darf Verhältnisgleichungen aufstellen.

Dabei kommt es darauf an, einander entsprechende Seiten zu vergleichen – also Seiten, die gleich großen Winkeln gegenüberliegen.

## Flächen und Volumen

Werden alle Längen mit $k$ multipliziert, dann gilt

$$\text{Fläche} \to k^2 \cdot \text{Fläche} \qquad\qquad \text{Volumen} \to k^3 \cdot \text{Volumen}$$

Der Grund: Eine Fläche ist „Länge mal Länge“, der Faktor $k$ kommt also zweimal vor; beim Volumen dreimal. Vergrößert man ein Foto auf doppelte Breite und Höhe ($k = 2$), braucht man viermal so viel Papier.

## Die Strahlensätze

Stell dir zwei Strahlen vor, die im selben Punkt $S$ beginnen – wie eine geöffnete Schere. Zwei parallele Geraden schneiden beide Strahlen. Die erste Parallele trifft die Strahlen in $A$ (auf dem ersten Strahl) und $B$ (auf dem zweiten), die zweite, weiter von $S$ entfernte Parallele in $A'$ und $B'$. So liegt ein kleines Dreieck $SAB$ in einem großen Dreieck $SA'B'$, und beide sind ähnlich: Sie haben den Winkel bei $S$ gemeinsam, und an den Parallelen entstehen gleich große Stufenwinkel.

> **Merke:** **1. Strahlensatz:** Die Abschnitte auf dem einen Strahl stehen im selben Verhältnis wie die entsprechenden Abschnitte auf dem anderen: $\frac{SA}{SA'} = \frac{SB}{SB'}$ und ebenso $\frac{SA}{AA'} = \frac{SB}{BB'}$. **2. Strahlensatz:** Die Parallelenabschnitte stehen im selben Verhältnis wie die von $S$ ausgehenden Strecken: $\frac{AB}{A'B'} = \frac{SA}{SA'}$.

Wichtig: Beim 2. Strahlensatz muss man die Parallelenabschnitte mit Strecken vergleichen, die **in $S$ beginnen** – nicht mit $AA'$.

Dieselben Sätze gelten für die **X-Figur**: Zwei Geraden schneiden sich in $S$, und die Parallelen liegen auf verschiedenen Seiten von $S$. Das kleine und das große Dreieck berühren sich dann mit ihren Spitzen.

Auch die **Umkehrung** des 1. Strahlensatzes gilt: Sind die Verhältnisse auf den Strahlen gleich, so sind die Geraden parallel.

## Beispiele

### Beispiel 1: Strahlensätze

Gegeben: $SA = 4$, $AA' = 6$, $SB = 5$ und $AB = 3$, wobei $AB \parallel A'B'$. Gesucht sind $SB'$ und $A'B'$.

Zuerst ist $SA' = 4 + 6 = 10$, der Faktor vom kleinen zum großen Dreieck also $k = \frac{10}{4} = 2{,}5$.

$$SB' = 2{,}5 \cdot 5 = 12{,}5 \qquad\qquad A'B' = 2{,}5 \cdot 3 = 7{,}5$$

### Beispiel 2: Schatten

Ein $1{,}5\text{ m}$ langer Stab wirft einen $2\text{ m}$ langen Schatten. Zur gleichen Zeit wirft ein Baum einen $12\text{ m}$ langen Schatten. Wie hoch ist der Baum?

Die Sonnenstrahlen verlaufen parallel, also sind Stab mit Schatten und Baum mit Schatten ähnliche Dreiecke:

$$\frac{h}{12} = \frac{1{,}5}{2} \quad\Rightarrow\quad h = 12 \cdot 0{,}75 = 9\text{ m}$$

### Beispiel 3: Fläche

Zwei ähnliche Dreiecke haben den Streckfaktor $k = 3$. Das kleine hat den Flächeninhalt $5\text{ cm}^2$, das große also $3^2 \cdot 5 = 45\text{ cm}^2$.

## Typische Fehler

- Die falschen Seiten einander zuordnen – immer die Seiten vergleichen, die gleich großen Winkeln gegenüberliegen.
- Beim 2. Strahlensatz $AA'$ statt $SA'$ verwenden.
- Flächen mit $k$ statt mit $k^2$ multiplizieren (oder Volumen mit $k$ statt mit $k^3$).
- Die Strahlensätze anwenden, obwohl die Geraden nicht parallel sind.
- $k$ und $\frac{1}{k}$ verwechseln – prüfen, ob man vom kleinen zum großen geht oder umgekehrt.

## Übungen

1. Ein Dreieck mit den Seiten $3$, $4$, $5$ wird so vergrößert, dass die längste Seite $15$ lang ist. Bestimme die anderen Seiten.

<details>
<summary>Lösung</summary>

$k = \frac{15}{5} = 3$, die Seiten sind also $9$, $12$ und $15$ lang.

</details>

2. In einer Strahlensatzfigur gilt $SA = 2$, $SA' = 5$ und $AB = 3$, wobei $AB \parallel A'B'$. Berechne $A'B'$.

<details>
<summary>Lösung</summary>

$\frac{A'B'}{AB} = \frac{SA'}{SA} = \frac{5}{2}$, also $A'B' = 3 \cdot 2{,}5 = 7{,}5$.

</details>

3. Eine $1{,}8\text{ m}$ große Person wirft einen $2{,}4\text{ m}$ langen Schatten. Ein Gebäude wirft zur selben Zeit einen $20\text{ m}$ langen Schatten. Wie hoch ist das Gebäude?

<details>
<summary>Lösung</summary>

$\frac{h}{20} = \frac{1{,}8}{2{,}4} = 0{,}75$, also $h = 15\text{ m}$.

</details>

4. Zwei ähnliche Figuren haben die Flächeninhalte $16\text{ cm}^2$ und $36\text{ cm}^2$. Wie groß ist der Streckfaktor für die Längen?

<details>
<summary>Lösung</summary>

$k^2 = \frac{36}{16} = \frac{9}{4}$, also $k = \frac{3}{2} = 1{,}5$.

</details>

5. Auf einer Karte im Maßstab $1 : 50\,000$ liegen zwei Orte $7\text{ cm}$ auseinander. Wie groß ist die wirkliche Entfernung?

<details>
<summary>Lösung</summary>

$7 \cdot 50\,000 = 350\,000\text{ cm} = 3{,}5\text{ km}$.

</details>
