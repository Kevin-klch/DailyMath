---
title: Vollständige Induktion
category: advanced
order: 30
level: 3
summary: Wie man eine Aussage für alle natürlichen Zahlen auf einmal beweist – Induktionsanfang, Induktionsvoraussetzung und Induktionsschritt an Summenformeln, Teilbarkeit und Ungleichungen.
related: sets-and-logic, sequences-and-series, divisibility-rules, modular-arithmetic
---

Viele mathematische Aussagen behaupten etwas für **jede** natürliche Zahl: „Die Summe der ersten $n$ ungeraden Zahlen ist $n^2$“ oder „$4^n - 1$ ist immer durch 3 teilbar“. Ein paar Fälle nachzurechnen reicht nicht – es gibt unendlich viele. Die **vollständige Induktion** erledigt alle Fälle in nur zwei Schritten und ist eines der wichtigsten Beweisverfahren der Mathematik.

## Das Dominoprinzip

Stell dir eine unendlich lange Reihe von Dominosteinen vor. Damit sicher alle umfallen, muss man zwei Dinge wissen:

1. Der **erste** Stein fällt.
2. **Immer wenn** ein Stein fällt, reißt er den nächsten mit.

Dann stößt der erste den zweiten um, der zweite den dritten und so weiter – jeder Stein fällt irgendwann. Genauso funktioniert die Induktion.

> **Merke:** Um eine Aussage $A(n)$ für alle natürlichen Zahlen $n \ge n_0$ zu beweisen, zeigt man: **(1) Induktionsanfang** – $A(n_0)$ ist wahr; **(2) Induktionsschritt** – wenn $A(n)$ für ein $n \ge n_0$ gilt, dann gilt auch $A(n + 1)$.

Die Annahme „$A(n)$ ist wahr“ heißt **Induktionsvoraussetzung** (oder Induktionsannahme), das zu zeigende $A(n + 1)$ die **Induktionsbehauptung**. Die Voraussetzung wird nicht bewiesen, sondern als Werkzeug benutzt. Die Kunst besteht immer darin, $A(n)$ in $A(n + 1)$ wiederzufinden.

## Beispiel 1: eine Summenformel

Zu zeigen ist für alle $n \ge 1$:

$$1 + 2 + 3 + \dots + n = \frac{n(n + 1)}{2}$$

**Induktionsanfang** ($n = 1$): Links steht $1$, rechts $\frac{1 \cdot 2}{2} = 1$. Stimmt.

**Induktionsvoraussetzung:** Für ein $n \ge 1$ gilt $1 + 2 + \dots + n = \frac{n(n + 1)}{2}$.

**Induktionsschritt:** Zu zeigen ist $1 + 2 + \dots + n + (n + 1) = \frac{(n + 1)(n + 2)}{2}$. Die ersten $n$ Summanden sind genau die Summe aus der Voraussetzung:

$$1 + 2 + \dots + n + (n + 1) = \frac{n(n + 1)}{2} + (n + 1) = \frac{n(n + 1) + 2(n + 1)}{2} = \frac{(n + 1)(n + 2)}{2}$$

Das ist genau die Formel für $n + 1$. Nach dem Prinzip der vollständigen Induktion gilt die Formel für alle $n \ge 1$ (die **Gaußsche Summenformel**).

Mit dem Summenzeichen lautet die Aussage $\sum_{k=1}^{n} k = \frac{n(n + 1)}{2}$. Der entscheidende Trick im Schritt ist immer derselbe: den letzten Summanden abspalten, $\sum_{k=1}^{n+1} k = \sum_{k=1}^{n} k + (n + 1)$.

## Beispiel 2: Teilbarkeit

Zu zeigen ist: $4^n - 1$ ist für alle $n \ge 1$ durch $3$ teilbar.

**Induktionsanfang** ($n = 1$): $4^1 - 1 = 3$ ist durch $3$ teilbar. Stimmt.

**Induktionsvoraussetzung:** $4^n - 1 = 3m$ mit einer ganzen Zahl $m$.

**Induktionsschritt:** Man formt $4^{n+1} - 1$ so um, dass $4^n - 1$ auftaucht:

$$4^{n+1} - 1 = 4 \cdot 4^n - 1 = 4 \cdot (4^n - 1) + 4 - 1 = 4 \cdot 3m + 3 = 3(4m + 1)$$

Das ist ein Vielfaches von $3$ – die Aussage gilt also auch für $n + 1$.

> **Merke:** Bei Teilbarkeitsbeweisen geschickt ergänzen und wieder abziehen, sodass der Term aus der Induktionsvoraussetzung entsteht – dann sind beide Teile sichtbar teilbar.

## Beispiel 3: eine Ungleichung

Zu zeigen ist $2^n > 2n + 1$ für alle $n \ge 3$.

**Induktionsanfang** ($n = 3$): $2^3 = 8 > 7 = 2 \cdot 3 + 1$. Stimmt. (Für $n = 2$ wäre es falsch: $4 > 5$ gilt nicht – deshalb beginnt man bei $3$.)

**Induktionsvoraussetzung:** $2^n > 2n + 1$ für ein $n \ge 3$.

**Induktionsschritt:** Zu zeigen ist $2^{n+1} > 2(n + 1) + 1 = 2n + 3$.

$$2^{n+1} = 2 \cdot 2^n > 2(2n + 1) = 4n + 2 = 2n + 3 + (2n - 1) > 2n + 3$$

Der letzte Schritt gilt, weil $2n - 1 > 0$ ist. Fertig.

Bei Ungleichungen braucht man am Ende oft eine solche Abschätzung – schreibe genau dazu, welche Tatsache du benutzt.

## Warum der Induktionsanfang so wichtig ist

Ohne Induktionsanfang lassen sich falsche Aussagen „beweisen“. Nimm die Behauptung „$n^2 + n + 1$ ist gerade“. Angenommen, sie gilt für $n$. Dann ist

$$(n + 1)^2 + (n + 1) + 1 = (n^2 + n + 1) + 2(n + 1)$$

gerade plus gerade, also gerade – der Induktionsschritt klappt! Für $n = 1$ ergibt sich aber $3$, eine ungerade Zahl. Tatsächlich ist $n^2 + n + 1$ **nie** gerade. Ohne ersten Dominostein fällt eben gar nichts.

## Typische Fehler

- Den Induktionsanfang weglassen oder nur flüchtig prüfen.
- Das Ziel als Voraussetzung benutzen: Im Schritt ist $A(n + 1)$ das, was man erreichen muss, nicht das, was man verwenden darf.
- Die Induktionsvoraussetzung gar nicht benutzen – dann ist es meist kein Induktionsbeweis (oder etwas ist schiefgelaufen).
- Fehler beim Ersetzen von $n$ durch $n + 1$: Aus $\frac{n(n + 1)}{2}$ wird $\frac{(n + 1)(n + 2)}{2}$, nicht $\frac{n(n + 1)}{2} + 1$.
- Einen falschen Startwert wählen, wenn die Aussage erst ab einem bestimmten $n_0$ gilt.

## Übungen

1. Beweise $1 + 3 + 5 + \dots + (2n - 1) = n^2$ für alle $n \ge 1$.

<details>
<summary>Lösung</summary>

Induktionsanfang $n = 1$: $1 = 1^2$. Induktionsschritt: Gilt die Formel für $n$, dann ist $1 + 3 + \dots + (2n - 1) + (2n + 1) = n^2 + 2n + 1 = (n + 1)^2$ – das ist die Formel für $n + 1$.

</details>

2. Beweise $2 + 4 + 6 + \dots + 2n = n(n + 1)$ für alle $n \ge 1$.

<details>
<summary>Lösung</summary>

Induktionsanfang $n = 1$: $2 = 1 \cdot 2$. Induktionsschritt: $2 + 4 + \dots + 2n + 2(n + 1) = n(n + 1) + 2(n + 1) = (n + 1)(n + 2)$ – die Formel für $n + 1$.

</details>

3. Beweise, dass $6^n - 1$ für alle $n \ge 1$ durch $5$ teilbar ist.

<details>
<summary>Lösung</summary>

Induktionsanfang: $6 - 1 = 5$. Induktionsschritt: Es gelte $6^n - 1 = 5m$. Dann ist $6^{n+1} - 1 = 6(6^n - 1) + 6 - 1 = 6 \cdot 5m + 5 = 5(6m + 1)$, also ein Vielfaches von $5$.

</details>

4. Beweise $1^2 + 2^2 + \dots + n^2 = \frac{n(n + 1)(2n + 1)}{6}$ für alle $n \ge 1$.

<details>
<summary>Lösung</summary>

Induktionsanfang: $1 = \frac{1 \cdot 2 \cdot 3}{6}$. Induktionsschritt: $\frac{n(n + 1)(2n + 1)}{6} + (n + 1)^2 = \frac{(n + 1)\big(n(2n + 1) + 6(n + 1)\big)}{6} = \frac{(n + 1)(2n^2 + 7n + 6)}{6}$. Wegen $2n^2 + 7n + 6 = (n + 2)(2n + 3)$ ist das $\frac{(n + 1)(n + 2)(2(n + 1) + 1)}{6}$ – die Formel für $n + 1$.

</details>

5. Jemand „beweist“, dass $5^n + 1$ durch $4$ teilbar ist: Aus $5^n + 1 = 4m$ folgt $5^{n+1} + 1 = 5(5^n + 1) - 4 = 20m - 4 = 4(5m - 1)$. Wo liegt der Fehler?

<details>
<summary>Lösung</summary>

Der Induktionsschritt ist richtig, aber der Induktionsanfang scheitert: $5^1 + 1 = 6$ ist nicht durch $4$ teilbar. Tatsächlich lässt $5^n + 1$ beim Teilen durch $4$ immer den Rest $2$ – die Aussage ist falsch.

</details>
