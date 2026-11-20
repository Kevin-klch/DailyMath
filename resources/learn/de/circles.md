---
title: Kreise
category: geometry
order: 50
level: 1
summary: Radius, Durchmesser und die Kreiszahl π – so berechnest du Umfang, Flächeninhalt, Kreisbogen und Kreisausschnitt, dazu die wichtigsten Winkelsätze am Kreis.
related: angles, unit-circle, solids
---

Ein **Kreis** ist die Menge aller Punkte einer Ebene, die von einem festen Punkt – dem **Mittelpunkt** – denselben Abstand haben. Räder, Uhren, Pizzen und Umlaufbahnen sind kreisförmig, und der Kreis ist der Einstieg in die Trigonometrie. Hier lernst du die Fachbegriffe, die Formeln für Umfang und Fläche und die wichtigsten Winkelsätze.

## Begriffe

- **Radius** $r$: der Abstand vom Mittelpunkt zu einem Punkt auf der Kreislinie.
- **Durchmesser** $d$: eine Strecke durch den Mittelpunkt von einer Seite zur anderen, also $d = 2r$.
- **Sehne**: eine Strecke zwischen zwei Punkten der Kreislinie. Der Durchmesser ist die längste Sehne.
- **Kreisbogen**: ein Stück der Kreislinie zwischen zwei Punkten.
- **Kreisausschnitt** (Sektor): ein „Tortenstück“, begrenzt von zwei Radien und einem Bogen. Der Winkel zwischen den Radien ist der **Mittelpunktswinkel** $\alpha$.
- **Tangente**: eine Gerade, die den Kreis in genau einem Punkt berührt. **Sekante**: eine Gerade, die den Kreis in zwei Punkten schneidet. **Passante**: eine Gerade ohne gemeinsamen Punkt.

## Die Kreiszahl π

Teilt man den Umfang *irgendeines* Kreises durch seinen Durchmesser, kommt immer dieselbe Zahl heraus, die **Kreiszahl** Pi:

$$\pi = \frac{u}{d} \approx 3{,}14159$$

$\pi$ ist irrational – die Dezimaldarstellung bricht nie ab und wird nie periodisch. Rechne mit der $\pi$-Taste des Taschenrechners oder gib exakte Ergebnisse wie $25\pi$ an.

## Umfang und Flächeninhalt

> **Merke:** Für einen Kreis mit Radius $r$ gilt: Umfang $u = 2\pi r = \pi d$ und Flächeninhalt $A = \pi r^2$.

Warum ist die Fläche $\pi r^2$? Zerlege den Kreis in viele schmale Sektoren und lege sie abwechselnd mit der Spitze nach oben und nach unten nebeneinander. Es entsteht fast ein Rechteck: Seine Höhe ist der Radius $r$, seine Länge der halbe Umfang $\pi r$. Die Fläche ist also $\pi r \cdot r = \pi r^2$ – und je mehr Stücke, desto genauer stimmt das.

### Beispiel 1

Ein Kreis hat den Radius $r = 5\text{ cm}$:

$$u = 2\pi \cdot 5 = 10\pi \approx 31{,}42\text{ cm} \qquad A = \pi \cdot 5^2 = 25\pi \approx 78{,}54\text{ cm}^2$$

### Beispiel 2: rückwärts rechnen

Ein Kreis hat den Umfang $12\pi\text{ cm}$. Aus $2\pi r = 12\pi$ folgt $r = 6\text{ cm}$, und die Fläche ist $A = 36\pi \approx 113{,}10\text{ cm}^2$.

## Kreisbogen und Kreisausschnitt

Ein Kreisausschnitt mit Mittelpunktswinkel $\alpha$ ist der Anteil $\frac{\alpha}{360^\circ}$ des ganzen Kreises. Man nimmt also diesen Anteil vom Umfang bzw. von der Fläche:

$$b = \frac{\alpha}{360^\circ} \cdot 2\pi r \qquad\qquad A_{\text{Sektor}} = \frac{\alpha}{360^\circ} \cdot \pi r^2$$

Praktischer Zusammenhang: $A_{\text{Sektor}} = \frac{1}{2} \cdot b \cdot r$.

### Beispiel 3

Kreisausschnitt mit $r = 6\text{ cm}$ und $\alpha = 60^\circ$. Wegen $\frac{60^\circ}{360^\circ} = \frac{1}{6}$ gilt:

$$b = \frac{1}{6} \cdot 12\pi = 2\pi \approx 6{,}28\text{ cm} \qquad A = \frac{1}{6} \cdot 36\pi = 6\pi \approx 18{,}85\text{ cm}^2$$

## Kreisring

Die Fläche zwischen zwei Kreisen mit gemeinsamem Mittelpunkt und den Radien $R > r$ ist

$$A = \pi R^2 - \pi r^2 = \pi (R^2 - r^2)$$

## Winkelsätze am Kreis

**Tangente und Radius**: Die Tangente steht im Berührpunkt senkrecht auf dem Radius.

**Umfangswinkelsatz**: Wähle zwei Punkte $A$ und $B$ auf dem Kreis. Ein **Umfangswinkel** (Peripheriewinkel) hat seinen Scheitel in einem dritten Punkt $P$ auf der Kreislinie, seine Schenkel gehen durch $A$ und $B$. Der Mittelpunktswinkel hat seinen Scheitel im Mittelpunkt $M$ und Schenkel durch $A$ und $B$. Liegen $P$ und $M$ auf derselben Seite der Sehne $AB$, gilt

$$\text{Umfangswinkel} = \frac{1}{2} \cdot \text{Mittelpunktswinkel}$$

Insbesondere sind alle Umfangswinkel über demselben Bogen gleich groß.

Der **Satz des Thales** ist der Sonderfall, dass $AB$ ein Durchmesser ist: Der Mittelpunktswinkel beträgt dann $180^\circ$, jeder Umfangswinkel also $90^\circ$. Jedes Dreieck, dessen eine Seite ein Durchmesser ist und dessen dritte Ecke auf dem Kreis liegt, ist rechtwinklig.

> **Merke:** Ein Umfangswinkel ist halb so groß wie der Mittelpunktswinkel über demselben Bogen. Der Winkel im Halbkreis ist immer ein rechter (Thales).

## Typische Fehler

- Radius und Durchmesser verwechseln – ist der Durchmesser gegeben, zuerst halbieren.
- Das Falsche quadrieren: $\pi r^2$ bedeutet $\pi \cdot (r^2)$, nicht $(\pi r)^2$.
- Umfang (eine Länge, in cm) und Flächeninhalt (in cm²) verwechseln.
- Beim Kreisbogen oder Kreisausschnitt den Anteil $\frac{\alpha}{360^\circ}$ vergessen.
- Den Satz des Thales anwenden, obwohl die Strecke kein Durchmesser ist.

## Übungen

1. Ein Kreis hat den Durchmesser $10\text{ cm}$. Berechne seinen Flächeninhalt.

<details>
<summary>Lösung</summary>

$r = 5\text{ cm}$, also $A = 25\pi \approx 78{,}54\text{ cm}^2$.

</details>

2. Ein Kreis hat den Flächeninhalt $49\pi\text{ cm}^2$. Bestimme Radius und Umfang.

<details>
<summary>Lösung</summary>

Aus $\pi r^2 = 49\pi$ folgt $r = 7\text{ cm}$. Dann ist $u = 14\pi \approx 43{,}98\text{ cm}$.

</details>

3. Berechne die Länge des Kreisbogens mit Radius $9\text{ cm}$ und Mittelpunktswinkel $40^\circ$.

<details>
<summary>Lösung</summary>

$b = \frac{40^\circ}{360^\circ} \cdot 2\pi \cdot 9 = \frac{1}{9} \cdot 18\pi = 2\pi \approx 6{,}28\text{ cm}$.

</details>

4. Ein Kreisring hat den äußeren Radius $5\text{ cm}$ und den inneren Radius $3\text{ cm}$. Berechne seine Fläche.

<details>
<summary>Lösung</summary>

$A = \pi(25 - 9) = 16\pi \approx 50{,}27\text{ cm}^2$.

</details>

5. Ein Mittelpunktswinkel misst $100^\circ$. Wie groß ist ein Umfangswinkel über demselben Bogen (auf der Seite des Mittelpunkts)?

<details>
<summary>Lösung</summary>

Halb so groß wie der Mittelpunktswinkel: $50^\circ$.

</details>
