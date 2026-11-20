---
title: Bedingte Wahrscheinlichkeit
category: stochastics
order: 60
level: 3
summary: Wie sich Wahrscheinlichkeiten ändern, wenn man schon etwas weiß – bedingte Wahrscheinlichkeit, Vierfeldertafel, Unabhängigkeit und der Satz von Bayes.
related: tree-diagrams, probability-basics, binomial-distribution
---

Wahrscheinlichkeiten hängen davon ab, was man weiß. Dass eine zufällig ausgewählte Person größer als 1,90 m ist, ist eher unwahrscheinlich – weiß man aber, dass sie Profi-Basketballerin ist, sieht es ganz anders aus. Genau das beschreibt die **bedingte Wahrscheinlichkeit**: die Wahrscheinlichkeit eines Ereignisses **unter der Bedingung**, dass ein anderes bereits eingetreten ist. Sie ist der Schlüssel zum Verständnis von medizinischen Tests, Spamfiltern und vielen verblüffenden Paradoxien.

## Definition

Die Wahrscheinlichkeit von $B$ unter der Bedingung $A$ schreibt man $P_A(B)$ oder $P(B \mid A)$ und liest „Wahrscheinlichkeit von $B$ unter der Bedingung $A$“. Weiß man, dass $A$ eingetreten ist, betrachtet man nur noch die Ergebnisse in $A$ – $A$ wird zur neuen Ergebnismenge. Günstig sind davon diejenigen, die auch zu $B$ gehören:

$$P_A(B) = \frac{P(A \cap B)}{P(A)} \qquad \text{für } P(A) > 0$$

> **Merke:** $P_A(B)$ ist der Anteil von $B$ innerhalb von $A$: Man teilt die Wahrscheinlichkeit von „beides“ durch die Wahrscheinlichkeit der Bedingung.

### Beispiel 1

Ein idealer Würfel wird geworfen. Man erfährt, dass die Augenzahl gerade ist. Wie wahrscheinlich ist es eine 6?

$A = \{2, 4, 6\}$ und $A \cap B = \{6\}$, also

$$P_A(B) = \frac{1/6}{3/6} = \frac{1}{3}$$

Ohne die Zusatzinformation wäre die Wahrscheinlichkeit $\frac{1}{6}$. Das Wissen „gerade“ verdoppelt sie.

## Die Vierfeldertafel

Werden Daten nach zwei Merkmalen eingeteilt, lassen sich bedingte Wahrscheinlichkeiten besonders gut aus einer **Vierfeldertafel** ablesen.

### Beispiel 2

In einer Klasse sind 30 Kinder, 18 Mädchen und 12 Jungen. 6 der Mädchen und 2 der Jungen tragen eine Brille.

| | Brille | keine Brille | gesamt |
|---|---|---|---|
| Mädchen | 6 | 12 | 18 |
| Junge | 2 | 10 | 12 |
| gesamt | 8 | 22 | 30 |

Ein Kind wird zufällig ausgewählt.

- Unter der Bedingung „Mädchen“ ist die Wahrscheinlichkeit für eine Brille $P_{\text{Mädchen}}(\text{Brille}) = \frac{6}{18} = \frac{1}{3}$. Man schaut nur auf die Zeile „Mädchen“.
- Unter der Bedingung „Brille“ ist die Wahrscheinlichkeit für ein Mädchen $P_{\text{Brille}}(\text{Mädchen}) = \frac{6}{8} = \frac{3}{4}$. Jetzt schaut man nur auf die Spalte „Brille“.

Die Ergebnisse sind verschieden: $P_A(B)$ und $P_B(A)$ sind im Allgemeinen **nicht** gleich.

## Der Multiplikationssatz

Stellt man die Definition um, erhält man

$$P(A \cap B) = P(A) \cdot P_A(B)$$

Das ist genau die 1. Pfadregel im Baumdiagramm: Die Wahrscheinlichkeiten auf der zweiten Stufe eines Baums sind bedingte Wahrscheinlichkeiten. Beim Ziehen ohne Zurücklegen hängt zum Beispiel die Wahrscheinlichkeit für „rot im zweiten Zug“ davon ab, was im ersten Zug passiert ist.

## Stochastische Unabhängigkeit

Zwei Ereignisse heißen **stochastisch unabhängig**, wenn das Eintreten des einen die Wahrscheinlichkeit des anderen nicht verändert: $P_A(B) = P(B)$. Gleichwertig dazu ist:

$$P(A \cap B) = P(A) \cdot P(B)$$

> **Merke:** $A$ und $B$ sind genau dann unabhängig, wenn $P(A \cap B) = P(A) \cdot P(B)$ gilt. Nur dann darf man die einfachen Wahrscheinlichkeiten miteinander multiplizieren.

### Beispiel 3

Ein Würfel wird geworfen. $A$: „gerade“ $= \{2, 4, 6\}$, $B$: „höchstens 2“ $= \{1, 2\}$. Dann ist $A \cap B = \{2\}$ und

$$P(A \cap B) = \frac{1}{6}, \qquad P(A) \cdot P(B) = \frac{1}{2} \cdot \frac{1}{3} = \frac{1}{6}$$

Beide Werte stimmen überein, $A$ und $B$ sind also unabhängig. In Beispiel 2 dagegen ist $P_{\text{Mädchen}}(\text{Brille}) = \frac{1}{3}$, aber $P(\text{Brille}) = \frac{8}{30} \approx 0{,}27$ – Geschlecht und Brille sind in dieser Klasse abhängig.

Unabhängig ist nicht dasselbe wie unvereinbar: Schließen sich $A$ und $B$ aus und haben beide eine positive Wahrscheinlichkeit, dann weiß man bei Eintreten von $A$ sicher, dass $B$ **nicht** eingetreten ist – die Ereignisse sind also stark abhängig.

## Totale Wahrscheinlichkeit und Satz von Bayes

Oft sind die bedingten Wahrscheinlichkeiten „in der falschen Richtung“ gegeben. Dann hilft ein Baumdiagramm – oder eine Vierfeldertafel.

**Satz von der totalen Wahrscheinlichkeit:** Tritt $A$ entweder ein oder nicht, gilt

$$P(B) = P(A) \cdot P_A(B) + P(\overline{A}) \cdot P_{\overline{A}}(B)$$

Der **Satz von Bayes** kehrt die Bedingung um:

$$P_B(A) = \frac{P(A) \cdot P_A(B)}{P(B)}$$

### Beispiel 4: ein medizinischer Test

Eine Krankheit betrifft $1\,\%$ der Bevölkerung. Ein Test erkennt sie bei $90\,\%$ der Erkrankten, fällt aber auch bei $5\,\%$ der Gesunden (fälschlich) positiv aus. Eine Person wird positiv getestet. Wie wahrscheinlich ist sie tatsächlich krank?

Sei $K$ = „krank“ und $T$ = „Test positiv“. Totale Wahrscheinlichkeit für einen positiven Test:

$$P(T) = 0{,}01 \cdot 0{,}9 + 0{,}99 \cdot 0{,}05 = 0{,}009 + 0{,}0495 = 0{,}0585$$

Satz von Bayes:

$$P_T(K) = \frac{0{,}009}{0{,}0585} \approx 0{,}154$$

Nur etwa $15\,\%$! Der Grund: Die Krankheit ist selten, deshalb erzeugen die vielen Gesunden mehr falsch-positive Ergebnisse als die wenigen Kranken richtig-positive. Stell dir 10000 Personen vor: 100 sind krank, davon werden 90 positiv getestet; von den 9900 Gesunden werden 495 positiv getestet. Von den 585 positiv Getesteten sind also nur 90 wirklich krank.

## Typische Fehler

- $P_A(B)$ und $P_B(A)$ verwechseln – etwa „Test positiv, wenn krank“ mit „krank, wenn Test positiv“.
- Durch die Gesamtzahl teilen statt durch die Wahrscheinlichkeit der Bedingung.
- $P(A) \cdot P(B)$ rechnen, obwohl die Ereignisse nicht unabhängig sind.
- Unvereinbare Ereignisse für unabhängig halten.
- Außer Acht lassen, wie selten ein Ereignis von vornherein ist (die Basisrate).

## Übungen

1. Zwei Würfel werden geworfen. Die Augensumme ist 8. Wie wahrscheinlich zeigen beide Würfel dieselbe Zahl?

<details>
<summary>Lösung</summary>

Augensumme 8: $(2,6), (3,5), (4,4), (5,3), (6,2)$ – fünf gleich wahrscheinliche Paare. Nur $(4,4)$ ist ein Pasch. Also $P = \frac{1}{5}$.

</details>

2. Es gilt $P(A) = 0{,}6$ und $P(A \cap B) = 0{,}15$. Berechne $P_A(B)$.

<details>
<summary>Lösung</summary>

$P_A(B) = \frac{0{,}15}{0{,}6} = 0{,}25$.

</details>

3. Es gilt $P(A) = 0{,}5$, $P(B) = 0{,}4$ und $P(A \cap B) = 0{,}2$. Sind $A$ und $B$ unabhängig?

<details>
<summary>Lösung</summary>

$P(A) \cdot P(B) = 0{,}5 \cdot 0{,}4 = 0{,}2 = P(A \cap B)$. Ja, sie sind unabhängig.

</details>

4. In einer Fabrik stellt Maschine X $60\,\%$ aller Teile her, Maschine Y $40\,\%$. Von den Teilen aus X sind $2\,\%$ defekt, von denen aus Y $5\,\%$. (a) Wie viel Prozent aller Teile sind defekt? (b) Ein defektes Teil wird gefunden. Mit welcher Wahrscheinlichkeit stammt es von Y?

<details>
<summary>Lösung</summary>

(a) $P(D) = 0{,}6 \cdot 0{,}02 + 0{,}4 \cdot 0{,}05 = 0{,}012 + 0{,}02 = 0{,}032$, also $3{,}2\,\%$. (b) $P_D(Y) = \frac{0{,}4 \cdot 0{,}05}{0{,}032} = \frac{0{,}02}{0{,}032} = 0{,}625$, also $62{,}5\,\%$.

</details>
