---
title: Teilbarkeitsregeln
category: arithmetic
order: 50
level: 1
summary: Schnelltests, mit denen du erkennst, ob eine Zahl durch 2, 3, 4, 5, 6, 8, 9, 10 oder 11 teilbar ist – ganz ohne zu dividieren.
related: prime-numbers, gcd-and-lcm, fractions-basics, modular-arithmetic
---

Ist 7416 durch 3 teilbar? Man könnte schriftlich dividieren – oder einfach die Ziffern addieren und hat die Antwort in zwei Sekunden. **Teilbarkeitsregeln** sind Abkürzungen, mit denen man erkennt, ob eine ganze Zahl ohne Rest durch eine andere teilbar ist. Man braucht sie ständig: beim Kürzen von Brüchen, bei der Primfaktorzerlegung und beim Kopfrechnen.

## Was „teilbar“ bedeutet

Eine ganze Zahl $a$ ist **durch $b$ teilbar**, wenn bei $a : b$ kein Rest bleibt, wenn also $a = b \cdot k$ für eine ganze Zahl $k$ gilt. Dann heißt $b$ ein **Teiler** von $a$, und $a$ ist ein **Vielfaches** von $b$. Man schreibt kurz $b \mid a$ und liest „$b$ teilt $a$“.

- $3 \mid 12$, denn $12 = 3 \cdot 4$.
- $5 \nmid 12$, denn $12 : 5 = 2$ Rest $2$.

## Endstellenregeln

Diese Regeln funktionieren, weil $10$, $100$ und $1000$ selbst durch bestimmte Zahlen teilbar sind. Deshalb kommt es nur auf das Ende der Zahl an.

- **Durch 2:** Die letzte Ziffer ist gerade ($0, 2, 4, 6, 8$).
- **Durch 5:** Die letzte Ziffer ist $0$ oder $5$.
- **Durch 10:** Die letzte Ziffer ist $0$.
- **Durch 4:** Die Zahl aus den letzten **zwei** Ziffern ist durch 4 teilbar.
- **Durch 8:** Die Zahl aus den letzten **drei** Ziffern ist durch 8 teilbar.

Warum klappt die Regel für 4? Jede Zahl lässt sich zerlegen in „Hunderterteil + letzte zwei Ziffern“, zum Beispiel $7316 = 7300 + 16$. Weil $100 = 4 \cdot 25$ ist, ist der Hunderterteil immer durch 4 teilbar. Es entscheiden also nur die letzten beiden Ziffern. Bei der 8 steckt dieselbe Idee mit $1000 = 8 \cdot 125$ dahinter.

### Beispiel 1

Ist $5732$ durch 4 teilbar? Die letzten zwei Ziffern ergeben $32 = 4 \cdot 8$. Ja.

Ist $91\,250$ durch 8 teilbar? Die letzten drei Ziffern ergeben $250$, und $250 : 8 = 31$ Rest $2$. Nein.

## Quersummenregeln

Die **Quersumme** einer Zahl ist die Summe ihrer Ziffern. Bei $7416$ ist sie $7 + 4 + 1 + 6 = 18$.

- **Durch 3:** Die Quersumme ist durch 3 teilbar.
- **Durch 9:** Die Quersumme ist durch 9 teilbar.

> **Merke:** Eine Zahl ist genau dann durch 3 (bzw. 9) teilbar, wenn ihre Quersumme durch 3 (bzw. 9) teilbar ist. Ist die Quersumme noch groß, bildet man einfach noch einmal die Quersumme.

### Warum die Quersumme funktioniert

Jede Zehnerpotenz ist um eins größer als ein Vielfaches von 9: $10 = 9 + 1$, $100 = 99 + 1$, $1000 = 999 + 1$. Also gilt

$$7416 = 7 \cdot 1000 + 4 \cdot 100 + 1 \cdot 10 + 6 = 7 \cdot 999 + 4 \cdot 99 + 1 \cdot 9 + (7 + 4 + 1 + 6)$$

Alles außer der Klammer ist ein Vielfaches von 9 (und damit auch von 3). Deshalb lässt $7416$ beim Teilen denselben Rest wie die Quersumme $18$. Da $18$ durch 9 und durch 3 teilbar ist, gilt das auch für $7416$.

## Zusammengesetzte Regeln

Ist eine Zahl durch zwei Zahlen teilbar, die keinen gemeinsamen Teiler haben, dann ist sie auch durch deren Produkt teilbar.

- **Durch 6:** teilbar durch 2 **und** durch 3.
- **Durch 12:** teilbar durch 3 **und** durch 4.
- **Durch 15:** teilbar durch 3 **und** durch 5.

Vorsicht: „Teilbar durch 2 und durch 4“ heißt **nicht** teilbar durch 8 – die $4$ selbst ist ein Gegenbeispiel. Die beiden Zahlen dürfen keinen gemeinsamen Teiler haben.

## Die Regel für 11

Bilde die **alternierende Quersumme**: Beginne bei der letzten Ziffer und addiere und subtrahiere die Ziffern abwechselnd. Ist das Ergebnis durch 11 teilbar (auch $0$ zählt), dann ist es die Zahl auch.

### Beispiel 2

$8294$: Die alternierende Quersumme von rechts ist $4 - 9 + 2 - 8 = -11$. Da $-11$ durch 11 teilbar ist, ist es auch $8294$. Probe: $8294 = 11 \cdot 754$.

## Überblick

| Teiler | Test |
|---|---|
| 2 | letzte Ziffer gerade |
| 3 | Quersumme durch 3 teilbar |
| 4 | letzte zwei Ziffern durch 4 teilbar |
| 5 | letzte Ziffer 0 oder 5 |
| 6 | durch 2 und durch 3 teilbar |
| 8 | letzte drei Ziffern durch 8 teilbar |
| 9 | Quersumme durch 9 teilbar |
| 10 | letzte Ziffer 0 |
| 11 | alternierende Quersumme durch 11 teilbar |

Für die 7 gibt es keine handliche Regel – da ist Dividieren meist am schnellsten.

### Beispiel 3: mehrere Teiler auf einmal prüfen

Welche der Zahlen 2, 3, 4, 5, 6, 9 teilen $1620$?

- Letzte Ziffer $0$: teilbar durch 2 und 5 (und 10).
- Letzte zwei Ziffern $20 = 4 \cdot 5$: teilbar durch 4.
- Quersumme $1 + 6 + 2 + 0 = 9$: teilbar durch 3 und 9.
- Teilbar durch 2 und 3, also auch durch 6.

Alle sechs Zahlen sind Teiler von $1620$.

> **Merke:** Einen zusammengesetzten Teiler zerlegt man in Faktoren ohne gemeinsamen Teiler und prüft jeden einzeln: $6 = 2 \cdot 3$, $12 = 3 \cdot 4$, $18 = 2 \cdot 9$.

## Typische Fehler

- Die Quersumme für 4 oder 8 benutzen. Die Quersummenregel gilt nur für 3 und 9.
- Bei der 4 nur die letzte Ziffer prüfen: $34$ endet auf eine gerade Ziffer, ist aber nicht durch 4 teilbar.
- Faktoren kombinieren, die sich überschneiden: Aus „teilbar durch 2 und 4“ folgt nicht „teilbar durch 8“.
- Bei der alternierenden Quersumme aus dem Takt kommen – es muss streng abwechselnd addiert und subtrahiert werden.
- Vergessen, dass $0$ durch jede Zahl außer null teilbar ist.

## Übungen

1. Ist $43\,218$ durch 3 teilbar? Durch 9? Durch 6?

<details>
<summary>Lösung</summary>

Quersumme: $4 + 3 + 2 + 1 + 8 = 18$. Teilbar durch 3 und durch 9. Die letzte Ziffer $8$ ist gerade, also ist die Zahl auch durch 2 und damit durch 6 teilbar.

</details>

2. Ist $7124$ durch 4 teilbar? Ist $3016$ durch 8 teilbar?

<details>
<summary>Lösung</summary>

$7124$: Die letzten zwei Ziffern ergeben $24 = 4 \cdot 6$, also ja. $3016$: Die letzten drei Ziffern ergeben $016 = 16 = 8 \cdot 2$, also ja.

</details>

3. Ergänze die fehlende Ziffer so, dass $52\square 4$ durch 9 teilbar ist.

<details>
<summary>Lösung</summary>

Quersumme ohne die fehlende Ziffer: $5 + 2 + 4 = 11$. Das nächste Vielfache von 9 ist $18$, also fehlt die $7$. Die Zahl lautet $5274 = 9 \cdot 586$.

</details>

4. Ist $9163$ durch 11 teilbar?

<details>
<summary>Lösung</summary>

Alternierende Quersumme von rechts: $3 - 6 + 1 - 9 = -11$. Durch 11 teilbar, also ja: $9163 = 11 \cdot 833$.

</details>

5. Ist $2340$ durch 12 teilbar?

<details>
<summary>Lösung</summary>

$12 = 3 \cdot 4$. Quersumme $2 + 3 + 4 + 0 = 9$, also teilbar durch 3. Letzte zwei Ziffern $40 = 4 \cdot 10$, also teilbar durch 4. Damit ja: $2340 = 12 \cdot 195$.

</details>
