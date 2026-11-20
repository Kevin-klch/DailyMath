---
title: ggT und kgV
category: arithmetic
order: 70
level: 1
summary: Wie man den größten gemeinsamen Teiler und das kleinste gemeinsame Vielfache findet – mit Teilermengen, Primfaktoren oder dem euklidischen Algorithmus.
related: prime-numbers, divisibility-rules, fractions-basics, adding-fractions
---

Der **größte gemeinsame Teiler (ggT)** zweier Zahlen ist die größte Zahl, die beide teilt. Das **kleinste gemeinsame Vielfache (kgV)** ist die kleinste Zahl, die von beiden geteilt wird. Mit dem ggT kürzt man einen Bruch in einem einzigen Schritt vollständig, das kgV liefert beim Addieren von Brüchen den Hauptnenner. Außerdem stecken beide in vielen Alltagsaufgaben über Fliesen, Fahrpläne oder Zahnräder.

## Der größte gemeinsame Teiler

Den ggT von $a$ und $b$ schreibt man $\text{ggT}(a, b)$.

### Verfahren 1: Teilermengen vergleichen

Bei kleinen Zahlen schreibt man einfach alle Teiler auf und sucht den größten gemeinsamen.

- $T_{18} = \{1, 2, 3, 6, 9, 18\}$
- $T_{24} = \{1, 2, 3, 4, 6, 8, 12, 24\}$

Gemeinsame Teiler: $1, 2, 3, 6$. Also ist $\text{ggT}(18, 24) = 6$.

### Verfahren 2: Primfaktorzerlegung

Man zerlegt beide Zahlen in Primfaktoren. Der ggT ist das Produkt der **gemeinsamen** Primfaktoren, jeweils mit dem **kleineren** Exponenten.

$$84 = 2^2 \cdot 3 \cdot 7 \qquad 90 = 2 \cdot 3^2 \cdot 5$$

Gemeinsame Primfaktoren: $2$ (kleinerer Exponent 1) und $3$ (kleinerer Exponent 1). Also

$$\text{ggT}(84, 90) = 2 \cdot 3 = 6$$

Haben zwei Zahlen keinen gemeinsamen Primfaktor, ist ihr ggT gleich $1$. Man nennt sie dann **teilerfremd**, zum Beispiel $\text{ggT}(8, 15) = 1$.

## Das kleinste gemeinsame Vielfache

Das kgV von $a$ und $b$ schreibt man $\text{kgV}(a, b)$.

### Verfahren 1: Vielfachenmengen vergleichen

- $V_6 = \{6, 12, 18, 24, 30, 36, \dots\}$
- $V_8 = \{8, 16, 24, 32, 40, \dots\}$

Die erste Zahl, die in beiden Mengen vorkommt, ist $24$. Also ist $\text{kgV}(6, 8) = 24$.

Tipp: Schreibe die Vielfachen der **größeren** Zahl auf und höre beim ersten auf, das auch durch die kleinere Zahl teilbar ist.

### Verfahren 2: Primfaktorzerlegung

Das kgV ist das Produkt **aller** Primfaktoren, die in einer der Zahlen vorkommen, jeweils mit dem **größeren** Exponenten.

$$84 = 2^2 \cdot 3 \cdot 7 \qquad 90 = 2 \cdot 3^2 \cdot 5$$

$$\text{kgV}(84, 90) = 2^2 \cdot 3^2 \cdot 5 \cdot 7 = 4 \cdot 9 \cdot 5 \cdot 7 = 1260$$

> **Merke:** ggT: gemeinsame Primfaktoren, kleinerer Exponent. kgV: alle Primfaktoren, größerer Exponent.

## Zusammenhang zwischen ggT und kgV

Für zwei natürliche Zahlen gilt immer:

$$\text{ggT}(a, b) \cdot \text{kgV}(a, b) = a \cdot b$$

Probe am Beispiel: $6 \cdot 1260 = 7560$ und $84 \cdot 90 = 7560$. ✓

Kennt man den ggT, bekommt man das kgV also ganz schnell:

$$\text{kgV}(a, b) = \frac{a \cdot b}{\text{ggT}(a, b)}$$

> **Merke:** Das Produkt aus ggT und kgV ist gleich dem Produkt der beiden Zahlen.

## Der euklidische Algorithmus

Bei großen Zahlen ist die Primfaktorzerlegung mühsam. Der **euklidische Algorithmus** findet den ggT mit wenigen Divisionen. Er beruht darauf, dass der ggT von $a$ und $b$ gleich dem ggT von $b$ und dem Rest von $a : b$ ist.

1. Teile die größere Zahl durch die kleinere.
2. Ersetze die größere Zahl durch den Rest.
3. Wiederhole das, bis der Rest $0$ ist. Der letzte Rest ungleich null ist der ggT.

### Beispiel 1

Bestimme $\text{ggT}(252, 198)$.

- $252 = 1 \cdot 198 + 54$
- $198 = 3 \cdot 54 + 36$
- $54 = 1 \cdot 36 + 18$
- $36 = 2 \cdot 18 + 0$

Der letzte Rest ungleich null ist $18$, also $\text{ggT}(252, 198) = 18$.

Damit ist $\text{kgV}(252, 198) = \frac{252 \cdot 198}{18} = 14 \cdot 198 = 2772$.

## Anwendungen

### Beispiel 2: Bruch vollständig kürzen

Kürze $\frac{84}{90}$. Da $\text{ggT}(84, 90) = 6$ ist:

$$\frac{84}{90} = \frac{84 : 6}{90 : 6} = \frac{14}{15}$$

Ein einziger Schritt, und der Bruch ist vollständig gekürzt.

### Beispiel 3: Fahrplanaufgabe

Ein Bus fährt alle 12 Minuten, ein anderer alle 18 Minuten. Um 8:00 Uhr fahren beide gleichzeitig ab. Wann fahren sie das nächste Mal zusammen los?

Gesucht ist $\text{kgV}(12, 18)$. Mit $12 = 2^2 \cdot 3$ und $18 = 2 \cdot 3^2$ gilt:

$$\text{kgV}(12, 18) = 2^2 \cdot 3^2 = 36$$

Nach 36 Minuten, also um 8:36 Uhr, fahren sie wieder gemeinsam ab.

Faustregel für Textaufgaben: „möglichst große gleiche Stücke“ oder „gerecht aufteilen“ deutet auf den ggT hin, „wann treffen sie sich wieder“ auf das kgV.

## Typische Fehler

- Die Regeln vertauschen: beim ggT den größeren oder beim kgV den kleineren Exponenten nehmen.
- Beim kgV Primfaktoren vergessen, die nur in einer der Zahlen vorkommen.
- Glauben, das kgV sei immer $a \cdot b$. Das stimmt nur bei teilerfremden Zahlen: $\text{kgV}(6, 8) = 24$, nicht $48$.
- Den euklidischen Algorithmus zu früh abbrechen oder den Rest $0$ als ggT angeben.
- Den ggT verwenden, obwohl gefragt ist, wann sich etwas wiederholt.

## Übungen

1. Bestimme $\text{ggT}(36, 48)$ und $\text{kgV}(36, 48)$.

<details>
<summary>Lösung</summary>

$36 = 2^2 \cdot 3^2$ und $48 = 2^4 \cdot 3$. ggT: $2^2 \cdot 3 = 12$. kgV: $2^4 \cdot 3^2 = 144$. Probe: $12 \cdot 144 = 1728 = 36 \cdot 48$.

</details>

2. Bestimme $\text{ggT}(391, 299)$ mit dem euklidischen Algorithmus.

<details>
<summary>Lösung</summary>

$391 = 1 \cdot 299 + 92$, $299 = 3 \cdot 92 + 23$, $92 = 4 \cdot 23 + 0$. Also ist $\text{ggT}(391, 299) = 23$.

</details>

3. Kürze $\frac{72}{120}$ in einem Schritt vollständig.

<details>
<summary>Lösung</summary>

$\text{ggT}(72, 120) = 24$ (denn $72 = 2^3 \cdot 3^2$ und $120 = 2^3 \cdot 3 \cdot 5$). Also $\frac{72}{120} = \frac{3}{5}$.

</details>

4. Bestimme $\text{kgV}(4, 6, 10)$.

<details>
<summary>Lösung</summary>

$4 = 2^2$, $6 = 2 \cdot 3$, $10 = 2 \cdot 5$. Alle Primfaktoren mit dem größten Exponenten: $2^2 \cdot 3 \cdot 5 = 60$.

</details>

5. Ein Boden von 240 cm mal 180 cm soll mit gleich großen quadratischen Fliesen ausgelegt werden, ohne dass Fliesen zerschnitten werden. Wie groß dürfen die Fliesen höchstens sein, und wie viele braucht man?

<details>
<summary>Lösung</summary>

Die Seitenlänge muss 240 und 180 teilen und möglichst groß sein: $\text{ggT}(240, 180) = 60$. Die Fliesen sind also 60 cm mal 60 cm groß. Es passen $240 : 60 = 4$ und $180 : 60 = 3$ Fliesen nebeneinander, insgesamt also $4 \cdot 3 = 12$ Fliesen.

</details>
