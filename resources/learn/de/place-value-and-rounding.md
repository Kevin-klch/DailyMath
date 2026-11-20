---
title: Stellenwerte und Runden
category: arithmetic
order: 20
level: 1
summary: Was jede Ziffer in einer Zahl wert ist und wie man auf Zehner, Hunderter, Nachkommastellen oder geltende Ziffern rundet.
related: number-sets, decimals, scientific-notation, units-and-conversions
---

In der Zahl 3527 ist die Ziffer 5 nicht fünf wert, sondern fünf**hundert**. Unser Zahlensystem ist ein **Stellenwertsystem**: Was eine Ziffer bedeutet, hängt davon ab, an welcher Stelle sie steht. Wer Stellenwerte verstanden hat, kann auch sicher runden – und gerundet wird ständig, beim Schätzen von Preisen, Entfernungen oder Messwerten.

## Das Zehnersystem

Wir verwenden zehn Ziffern von $0$ bis $9$. Jede Stelle ist zehnmal so viel wert wie die Stelle rechts daneben. Von rechts nach links heißen die Stellen einer ganzen Zahl Einer (E), Zehner (Z), Hunderter (H), Tausender (T), Zehntausender (ZT) und so weiter.

$$3527 = 3 \cdot 1000 + 5 \cdot 100 + 2 \cdot 10 + 7 \cdot 1$$

Diese Zerlegung nennt man auch **Stellenwertschreibweise**. Mit Zehnerpotenzen geschrieben sind die Stellenwerte $10^0 = 1$, $10^1 = 10$, $10^2 = 100$, $10^3 = 1000$, …

Die Ziffer $0$ ist ein Platzhalter: In $4070$ zeigt sie, dass es keine Hunderter und keine Einer gibt. Ohne sie sähen $4070$ und $47$ gleich aus.

> **Merke:** Jede Stelle ist zehnmal so viel wert wie die Stelle rechts daneben. Wert einer Ziffer = Ziffer mal Stellenwert.

## Nachkommastellen

Rechts vom Komma geht das Muster weiter: Jede Stelle ist ein Zehntel der Stelle links daneben.

| Stelle | Zehntel (z) | Hundertstel (h) | Tausendstel (t) |
|---|---|---|---|
| Wert | $\frac{1}{10} = 0{,}1$ | $\frac{1}{100} = 0{,}01$ | $\frac{1}{1000} = 0{,}001$ |

Also gilt

$$6{,}348 = 6 + \frac{3}{10} + \frac{4}{100} + \frac{8}{1000}$$

In $6{,}348$ steht die $4$ an der Hundertstelstelle und ist $0{,}04$ wert.

Große Zahlen gliedert man zur besseren Lesbarkeit in Dreiergruppen: $12\,450\,000$ sind zwölf Millionen vierhundertfünfzigtausend.

## Runden

Beim Runden ersetzt man eine Zahl durch eine einfachere Zahl in der Nähe. Man rundet immer auf eine bestimmte Stelle – die **Rundungsstelle**.

1. Bestimme die Rundungsstelle (die letzte Stelle, die stehen bleiben soll).
2. Sieh dir die Ziffer direkt **rechts** daneben an.
3. Ist sie $0, 1, 2, 3$ oder $4$, bleibt die Rundungsstelle unverändert (**abrunden**).
4. Ist sie $5, 6, 7, 8$ oder $9$, wird die Rundungsstelle um eins erhöht (**aufrunden**).
5. Alle Stellen rechts davon werden bei ganzen Zahlen durch Nullen ersetzt, bei Nachkommastellen weggelassen.

> **Merke:** Es entscheidet nur die Ziffer direkt rechts von der Rundungsstelle. Bei 0 bis 4 wird abgerundet, bei 5 bis 9 aufgerundet.

Das Zeichen $\approx$ bedeutet „ungefähr gleich“. Man schreibt $3527 \approx 3500$, aber niemals $3527 = 3500$.

### Beispiel 1: ganze Zahlen runden

Runde $48\,763$ auf Hunderter.

Die Hunderterziffer ist $7$. Rechts daneben steht eine $6$, also wird aufgerundet: Aus der $7$ wird eine $8$, alles dahinter wird zu null.

$$48\,763 \approx 48\,800$$

Auf Tausender gerundet entscheidet die Hunderterziffer $7$, also $48\,763 \approx 49\,000$.

### Beispiel 2: Dezimalzahlen runden

Runde $2{,}6849$ auf zwei Nachkommastellen.

Die zweite Nachkommastelle ist $8$. Danach kommt eine $4$, also wird abgerundet:

$$2{,}6849 \approx 2{,}68$$

Achtung: Wer erst auf drei Stellen rundet ($2{,}685$) und dann auf zwei ($2{,}69$), erhält ein **anderes, falsches** Ergebnis. Runde immer in einem Schritt von der ursprünglichen Zahl aus.

### Beispiel 3: Überträge

Runde $3{,}996$ auf zwei Nachkommastellen. Nach der zweiten Stelle steht eine $6$, also muss die $9$ erhöht werden. Sie wird zu $10$, und der Übertrag wandert weiter nach links:

$$3{,}996 \approx 4{,}00$$

Die Nullen bleiben stehen: $4{,}00$ zeigt, dass auf Hundertstel genau gerundet wurde – das sieht man der $4$ allein nicht an.

## Geltende Ziffern

Manchmal rundet man nicht auf eine feste Stelle, sondern auf eine Anzahl **geltender Ziffern** (auch: signifikante Stellen). Gezählt wird ab der ersten Ziffer, die nicht null ist.

- $0{,}004\,072$: Die erste geltende Ziffer ist die $4$. Auf zwei geltende Ziffern: $0{,}0041$.
- $58\,390$ auf zwei geltende Ziffern: $58\,000$.
- $7{,}0362$ auf drei geltende Ziffern: $7{,}04$.

Führende Nullen zählen nie mit, Nullen zwischen anderen Ziffern dagegen immer.

## Überschlagen

Gerundete Zahlen eignen sich hervorragend zum **Überschlagen**. Für $612 \cdot 49$ rechnet man grob $600 \cdot 50 = 30\,000$. Das genaue Ergebnis ist $29\,988$ – sehr nah dran. Zeigt der Taschenrechner dagegen $2998{,}8$, weiß man sofort, dass etwas schiefgelaufen ist.

## Typische Fehler

- Auf die falsche Ziffer schauen: Beim Runden auf Hunderter entscheidet die **Zehner**ziffer, nicht die Einerziffer.
- In mehreren Schritten runden ($2{,}6849 \to 2{,}685 \to 2{,}69$) statt in einem.
- Wichtige Endnullen weglassen: $4{,}00$ und $4$ sagen nicht dasselbe über die Genauigkeit aus.
- Den Übertrag vergessen: $1971$ auf Zehner gerundet ist $1970$, aber $1996$ auf Zehner gerundet ist $2000$.
- Nach dem Runden $=$ statt $\approx$ schreiben.

## Übungen

1. Welchen Wert hat die Ziffer $6$ in $46\,215$ und in $0{,}068$?

<details>
<summary>Lösung</summary>

In $46\,215$ steht die $6$ an der Tausenderstelle, sie ist also $6000$ wert. In $0{,}068$ steht sie an der Hundertstelstelle und ist $0{,}06$ wert.

</details>

2. Runde $7451$ auf Zehner, Hunderter und Tausender.

<details>
<summary>Lösung</summary>

Auf Zehner: Die Einerziffer ist $1$, also $7450$. Auf Hunderter: Die Zehnerziffer ist $5$, also aufrunden auf $7500$. Auf Tausender: Die Hunderterziffer ist $4$, also $7000$.

</details>

3. Runde $12{,}3956$ auf eine, zwei und drei Nachkommastellen.

<details>
<summary>Lösung</summary>

Eine Stelle: Danach folgt $9$, also $12{,}4$. Zwei Stellen: Danach folgt $5$, also $12{,}40$. Drei Stellen: Danach folgt $6$, also $12{,}396$.

</details>

4. Runde $0{,}050\,73$ auf zwei geltende Ziffern.

<details>
<summary>Lösung</summary>

Die erste geltende Ziffer ist $5$, die zweite $0$. Danach kommt eine $7$, also wird aufgerundet: $0{,}051$.

</details>

5. Überschlage $398 \cdot 21$ und vergleiche mit dem genauen Ergebnis.

<details>
<summary>Lösung</summary>

Überschlag: $400 \cdot 20 = 8000$. Genau: $398 \cdot 21 = 8358$. Der Überschlag liegt in der richtigen Größenordnung.

</details>
