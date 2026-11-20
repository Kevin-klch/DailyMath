---
title: Modulare Arithmetik
category: advanced
order: 40
level: 3
summary: Rechnen mit Resten – Kongruenzen, Rechenregeln modulo n für Summen, Produkte und Potenzen, Endziffern, Wochentage, Teilbarkeitsregeln und modulare Inverse.
related: divisibility-rules, prime-numbers, gcd-and-lcm, proof-by-induction
---

Wenn es jetzt 9 Uhr ist – wie spät ist es in 100 Stunden? Dafür muss man nicht zählen, es kommt nur auf den **Rest** beim Teilen durch 12 an. Die **modulare Arithmetik** ist die Mathematik solcher Reste: Die Zahlen „laufen im Kreis“, sobald sie einen festen Wert erreichen, den **Modul**. Mit ihr lassen sich Teilbarkeitsregeln erklären und die Endziffern riesiger Potenzen bestimmen, und sie ist die Grundlage moderner Verschlüsselung sowie von Prüfziffern auf Barcodes und in der IBAN.

## Division mit Rest

Zu einer ganzen Zahl $a$ und einer natürlichen Zahl $n \ge 2$ gibt es eindeutig bestimmte ganze Zahlen $q$ und $r$ mit

$$a = q \cdot n + r \qquad \text{und} \qquad 0 \le r < n$$

Die Zahl $r$ ist der Rest, geschrieben $r = a \bmod n$. Zum Beispiel ist $47 = 9 \cdot 5 + 2$, also $47 \bmod 5 = 2$.

Vorsicht bei negativen Zahlen: Der Rest darf nicht negativ sein. Wegen $-7 = (-2) \cdot 5 + 3$ ist $-7 \bmod 5 = 3$ und nicht $-2$.

## Kongruenz

> **Merke:** $a \equiv b \pmod{n}$ („$a$ ist kongruent zu $b$ modulo $n$“) bedeutet, dass $a$ und $b$ beim Teilen durch $n$ denselben Rest lassen – gleichwertig: $n$ teilt die Differenz $a - b$.

Beispiele:

- $17 \equiv 5 \pmod{12}$, denn $17 - 5 = 12$. (17 Uhr ist 5 Uhr nachmittags.)
- $38 \equiv 2 \pmod{9}$, denn $38 - 2 = 36 = 4 \cdot 9$.
- $-1 \equiv 6 \pmod{7}$, denn $-1 - 6 = -7$.
- $a \equiv 0 \pmod{n}$ heißt einfach „$n$ teilt $a$“.

Modulo $n$ ist jede ganze Zahl zu genau einer der Zahlen $0, 1, \dots, n - 1$ kongruent. Diese $n$ Reste kann man sich wie die Positionen auf einem Zifferblatt mit $n$ Stunden vorstellen.

## Rechnen mit Kongruenzen

Der große Vorteil: Man darf jede Zahl schon **vor** dem Rechnen durch ihren Rest ersetzen.

> **Merke:** Gilt $a \equiv a'$ und $b \equiv b' \pmod{n}$, dann gilt auch $a + b \equiv a' + b'$, $a - b \equiv a' - b'$, $a \cdot b \equiv a' \cdot b'$ und $a^k \equiv a'^k \pmod{n}$.

Warum klappt das bei der Multiplikation? Schreibe $a = a' + sn$ und $b = b' + tn$. Dann ist $ab = a'b' + (a't + b's + stn) \cdot n$ – das unterscheidet sich von $a'b'$ nur um ein Vielfaches von $n$.

### Beispiel 1: Uhr und Kalender

Es ist 9 Uhr. In 100 Stunden: $9 + 100 = 109 = 9 \cdot 12 + 1$, es ist also 1 Uhr.

Heute ist Freitag. In 100 Tagen: $100 = 14 \cdot 7 + 2$, also Freitag plus 2 Tage – ein Sonntag.

### Beispiel 2: ein Produkt

Welchen Rest lässt $38 \cdot 47$ beim Teilen durch $9$? Statt auszumultiplizieren, reduziert man zuerst: $38 \equiv 2$ und $47 \equiv 2 \pmod{9}$, also

$$38 \cdot 47 \equiv 2 \cdot 2 = 4 \pmod{9}$$

Probe: $38 \cdot 47 = 1786 = 198 \cdot 9 + 4$.

## Große Potenzen

Bei Potenzen sucht man eine Potenz, die kongruent zu $1$ (oder einer anderen einfachen Zahl) ist, und nutzt dann die Potenzgesetze.

### Beispiel 3: die Endziffer

Die Endziffer einer Zahl ist ihr Rest modulo $10$. Welche Endziffer hat $7^{100}$?

$$7^1 \equiv 7, \quad 7^2 = 49 \equiv 9, \quad 7^3 \equiv 9 \cdot 7 = 63 \equiv 3, \quad 7^4 \equiv 3 \cdot 7 = 21 \equiv 1 \pmod{10}$$

Die Endziffern wiederholen sich mit der Periode 4. Wegen $100 = 4 \cdot 25$ gilt

$$7^{100} = (7^4)^{25} \equiv 1^{25} = 1 \pmod{10}$$

Die Endziffer ist $1$.

### Beispiel 4

$2^{50} \bmod 7$: Wegen $2^3 = 8 \equiv 1 \pmod{7}$ und $50 = 3 \cdot 16 + 2$ ist

$$2^{50} = (2^3)^{16} \cdot 2^2 \equiv 1 \cdot 4 = 4 \pmod{7}$$

## Teilbarkeitsregeln erklärt

Wegen $10 \equiv 1 \pmod{9}$ ist auch jede Zehnerpotenz $10^k \equiv 1 \pmod{9}$. Eine Zahl wie $4725 = 4 \cdot 10^3 + 7 \cdot 10^2 + 2 \cdot 10 + 5$ ist daher modulo $9$ kongruent zu $4 + 7 + 2 + 5 = 18$. Eine Zahl und ihre Quersumme lassen modulo $9$ (und modulo $3$) denselben Rest – genau deshalb funktionieren die Quersummenregeln. Hier ist $18$ durch $9$ teilbar, also auch $4725$.

## Division und Inverse

Das Dividieren ist die eine Rechenart, die sich nicht direkt übertragen lässt. Stattdessen multipliziert man mit einem **Inversen**: einer Zahl $a^{-1}$ mit $a \cdot a^{-1} \equiv 1 \pmod{n}$. Ein solches Inverses gibt es genau dann, wenn $\operatorname{ggT}(a, n) = 1$ ist, $a$ und $n$ also teilerfremd sind. Zum Beispiel hat $2$ modulo $6$ kein Inverses, denn $2x$ ist immer gerade und kann beim Teilen durch $6$ nie den Rest $1$ lassen.

### Beispiel 5: eine lineare Kongruenz

Löse $3x \equiv 4 \pmod{7}$.

1. Das Inverse von $3$ modulo $7$ suchen: $3 \cdot 5 = 15 = 2 \cdot 7 + 1$, also $3^{-1} \equiv 5$.
2. Beide Seiten mit $5$ multiplizieren: $x \equiv 4 \cdot 5 = 20 \equiv 6 \pmod{7}$.

Probe: $3 \cdot 6 = 18 = 2 \cdot 7 + 4$. Alle Lösungen sind $x = 6 + 7k$ mit ganzem $k$.

## Typische Fehler

- Negative Reste angeben: $-13 \bmod 4$ ist $3$, nicht $-1$.
- Den Exponenten modulo $n$ reduzieren: $7^{12} \bmod 10$ ist **nicht** $7^2 \bmod 10$ – Exponenten richten sich nach der Periode der Potenzen, nicht nach dem Modul.
- Eine Kongruenz durch eine Zahl teilen, die nicht teilerfremd zum Modul ist: $2 \cdot 3 \equiv 2 \cdot 0 \pmod{6}$, aber $3 \not\equiv 0 \pmod{6}$.
- $\equiv$ und $=$ verwechseln: $17 \equiv 5 \pmod{12}$, aber natürlich $17 \neq 5$.

## Übungen

1. Berechne $47 \bmod 5$ und $-13 \bmod 4$.

<details>
<summary>Lösung</summary>

$47 = 9 \cdot 5 + 2$, also $47 \bmod 5 = 2$. $-13 = (-4) \cdot 4 + 3$, also $-13 \bmod 4 = 3$.

</details>

2. Welcher Wochentag ist 1000 Tage nach einem Montag?

<details>
<summary>Lösung</summary>

$1000 = 142 \cdot 7 + 6$, also Montag plus 6 Tage: ein Sonntag.

</details>

3. Welchen Rest lässt $123 \cdot 456$ beim Teilen durch $7$?

<details>
<summary>Lösung</summary>

$123 = 17 \cdot 7 + 4$, also $123 \equiv 4$; $456 = 65 \cdot 7 + 1$, also $456 \equiv 1$. Damit $123 \cdot 456 \equiv 4 \cdot 1 = 4 \pmod{7}$.

</details>

4. Welche Endziffer hat $3^{2026}$?

<details>
<summary>Lösung</summary>

Modulo $10$: $3^1 \equiv 3$, $3^2 \equiv 9$, $3^3 \equiv 7$, $3^4 \equiv 1$. Wegen $2026 = 4 \cdot 506 + 2$ ist $3^{2026} \equiv 3^2 \equiv 9$. Die Endziffer ist $9$.

</details>

5. Löse $5x \equiv 3 \pmod{8}$.

<details>
<summary>Lösung</summary>

$5 \cdot 5 = 25 = 3 \cdot 8 + 1$, also $5^{-1} \equiv 5 \pmod{8}$. Damit $x \equiv 3 \cdot 5 = 15 \equiv 7 \pmod{8}$. Probe: $5 \cdot 7 = 35 = 4 \cdot 8 + 3$.

</details>
