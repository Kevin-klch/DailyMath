---
title: Kombinatorik
category: stochastics
order: 50
level: 2
summary: Die Kunst, zu zählen, ohne alles aufzuschreiben – Zählprinzip, Fakultät, Permutationen, Variationen und Kombinationen und wann man was verwendet.
related: probability-basics, binomial-distribution, tree-diagrams
---

Wie viele verschiedene PINs gibt es? Auf wie viele Arten kann eine Klasse Klassensprecher und Stellvertreterin wählen? Wie wahrscheinlich ist ein Sechser im Lotto? Bei solchen Fragen geht es ums **Abzählen von Möglichkeiten** – oft so vielen, dass man sie unmöglich alle aufschreiben kann. Die **Kombinatorik** liefert eine Handvoll Formeln, die das Zählen übernehmen, und ist die Grundlage für viele Wahrscheinlichkeitsrechnungen.

## Das Zählprinzip

Die gesamte Kombinatorik beruht auf einer einfachen Regel.

> **Merke:** **Produktregel der Kombinatorik:** Läuft eine Auswahl in mehreren Schritten ab, mit $n_1$ Möglichkeiten im ersten Schritt, $n_2$ im zweiten usw., dann gibt es insgesamt $n_1 \cdot n_2 \cdot \ldots \cdot n_k$ Möglichkeiten.

### Beispiel 1

Du hast 3 T-Shirts und 4 Hosen. Zu jedem T-Shirt kannst du jede der 4 Hosen wählen – das ergibt $3 \cdot 4 = 12$ verschiedene Outfits. Kommen noch 2 Paar Schuhe dazu, sind es $3 \cdot 4 \cdot 2 = 24$.

Man kann sich das als Baumdiagramm vorstellen: 3 Äste, die sich jeweils in 4 aufteilen – das macht 12 Pfade.

## Zwei entscheidende Fragen

Die meisten Zählaufgaben lassen sich als Ziehen von $k$ Kugeln aus einer Urne mit $n$ Kugeln beschreiben (**Urnenmodell**). Um die richtige Formel zu finden, stellt man zwei Fragen:

1. **Kommt es auf die Reihenfolge an?** (Ist „erst Anna, dann Ben“ etwas anderes als „erst Ben, dann Anna“?)
2. **Darf ein Element mehrfach vorkommen?** (Ziehen mit oder ohne Zurücklegen)

## Mit Reihenfolge, mit Zurücklegen

Jede der $k$ Stellen kann mit jedem der $n$ Elemente besetzt werden:

$$n \cdot n \cdot \ldots \cdot n = n^k$$

### Beispiel 2

Eine PIN besteht aus 4 Ziffern von 0 bis 9, Ziffern dürfen sich wiederholen. Es gibt $10^4 = 10000$ mögliche PINs.

## Mit Reihenfolge, ohne Zurücklegen

Darf jedes Element nur einmal verwendet werden, sinkt die Zahl der Möglichkeiten mit jedem Schritt um eins.

**Alle $n$ Elemente anordnen (Permutation):** $n$ Möglichkeiten für den ersten Platz, $n - 1$ für den zweiten und so weiter bis $1$. Dieses Produkt heißt **$n$ Fakultät**:

$$n! = n \cdot (n - 1) \cdot \ldots \cdot 2 \cdot 1$$

Man legt fest: $0! = 1$. Fakultäten wachsen rasend schnell: $5! = 120$, aber schon $10! = 3\,628\,800$.

**Nur $k$ der $n$ Elemente auswählen und anordnen (Variation):**

$$n \cdot (n - 1) \cdot \ldots \cdot (n - k + 1) = \frac{n!}{(n - k)!}$$

### Beispiel 3

Fünf Bücher lassen sich auf $5! = 120$ Arten nebeneinander ins Regal stellen.

### Beispiel 4

Bei einem Lauf starten acht Läuferinnen. Wie viele verschiedene Siegertreppchen (Gold, Silber, Bronze) sind möglich? Die Reihenfolge zählt, und niemand kann zwei Medaillen gewinnen:

$$8 \cdot 7 \cdot 6 = 336$$

## Ohne Reihenfolge, ohne Zurücklegen: Kombinationen

Spielt die Reihenfolge **keine** Rolle – man wählt eine Gruppe aus, keine Rangfolge –, wurde jede Gruppe aus $k$ Elementen bei der geordneten Zählung $k!$-mal gezählt (einmal für jede Anordnung). Also teilt man durch $k!$. Heraus kommt der **Binomialkoeffizient**, gesprochen „$n$ über $k$“:

$$\binom{n}{k} = \frac{n!}{k! \cdot (n - k)!}$$

> **Merke:** Geordnete Auswahl ohne Zurücklegen: $\frac{n!}{(n-k)!}$. Kommt es nicht auf die Reihenfolge an, teilt man zusätzlich durch $k!$ und erhält $\binom{n}{k}$.

### Beispiel 5

Aus 10 Personen wird ein Ausschuss mit 3 Mitgliedern gewählt. Die Reihenfolge spielt keine Rolle:

$$\binom{10}{3} = \frac{10 \cdot 9 \cdot 8}{3 \cdot 2 \cdot 1} = \frac{720}{6} = 120$$

Tipp: Vor dem Ausmultiplizieren kürzen. $10!$ muss man nie vollständig ausrechnen.

### Beispiel 6: Lotto „6 aus 49“

Beim Lotto werden 6 von 49 Zahlen gezogen, die Reihenfolge ist egal. Die Anzahl der möglichen Tipps ist

$$\binom{49}{6} = \frac{49 \cdot 48 \cdot 47 \cdot 46 \cdot 45 \cdot 44}{6!} = 13\,983\,816$$

Die Wahrscheinlichkeit für einen Sechser mit einem Tipp beträgt also $\frac{1}{13\,983\,816}$ – etwa 1 zu 14 Millionen.

Nützliche Eigenschaften: $\binom{n}{0} = \binom{n}{n} = 1$, $\binom{n}{1} = n$ und $\binom{n}{k} = \binom{n}{n - k}$ (auszuwählen, wer in der Gruppe ist, ist dasselbe, wie auszuwählen, wer draußen bleibt).

## Ohne Reihenfolge, mit Zurücklegen

Dieser Fall kommt seltener vor. Wählt man $k$ Elemente aus $n$ Sorten, wobei Wiederholungen erlaubt sind und die Reihenfolge egal ist, gibt es $\binom{n + k - 1}{k}$ Möglichkeiten. Zum Beispiel lassen sich 3 Kugeln Eis aus 5 Sorten (dieselbe Sorte darf mehrfach vorkommen) auf $\binom{7}{3} = 35$ Arten zusammenstellen.

## Überblick

| | mit Zurücklegen | ohne Zurücklegen |
|---|---|---|
| mit Reihenfolge | $n^k$ | $\frac{n!}{(n-k)!}$ |
| ohne Reihenfolge | $\binom{n+k-1}{k}$ | $\binom{n}{k}$ |

## Anordnungen mit gleichen Elementen

Sind manche Elemente gleich, entsteht durch ihr Vertauschen keine neue Anordnung. Das Wort ANNA hat 4 Buchstaben, aber die beiden A und die beiden N sind jeweils gleich. Statt $4! = 24$ gibt es deshalb nur

$$\frac{4!}{2! \cdot 2!} = \frac{24}{4} = 6$$

verschiedene Anordnungen: AANN, ANAN, ANNA, NAAN, NANA, NNAA.

## Typische Fehler

- Kombination und Variation verwechseln. Prüffrage: Ergibt das Vertauschen zweier ausgewählter Elemente ein anderes Ergebnis?
- Die Möglichkeiten der einzelnen Schritte addieren statt multiplizieren.
- Vergessen, dass $0! = 1$ ist.
- Riesige Fakultäten komplett ausrechnen, statt vorher zu kürzen.
- Gleiche Elemente übersehen und dadurch dieselbe Anordnung mehrfach zählen.

## Übungen

1. Auf wie viele Arten lassen sich die Buchstaben des Wortes MATHE anordnen?

<details>
<summary>Lösung</summary>

Fünf verschiedene Buchstaben, jeder genau einmal: $5! = 5 \cdot 4 \cdot 3 \cdot 2 \cdot 1 = 120$.

</details>

2. Wie viele Codes aus drei Buchstaben (A bis Z, Wiederholungen erlaubt) gibt es?

<details>
<summary>Lösung</summary>

Mit Reihenfolge, mit Zurücklegen: $26^3 = 17\,576$.

</details>

3. Ein Verein mit 12 Mitgliedern wählt Vorsitz, Stellvertretung und Kassenwart. Niemand darf zwei Ämter übernehmen. Wie viele Ergebnisse sind möglich?

<details>
<summary>Lösung</summary>

Die Reihenfolge zählt (die Ämter sind verschieden), ohne Zurücklegen: $12 \cdot 11 \cdot 10 = 1320$.

</details>

4. Auf einer Party gibt jeder der 10 Gäste jedem anderen genau einmal die Hand. Wie oft werden Hände geschüttelt?

<details>
<summary>Lösung</summary>

Ein Händedruck ist ein Paar von Personen, die Reihenfolge spielt keine Rolle: $\binom{10}{2} = \frac{10 \cdot 9}{2} = 45$.

</details>

5. Aus 6 Mädchen und 4 Jungen soll ein Team aus 2 Mädchen und 2 Jungen gebildet werden. Wie viele verschiedene Teams sind möglich?

<details>
<summary>Lösung</summary>

Mädchen und Jungen getrennt auswählen und multiplizieren: $\binom{6}{2} \cdot \binom{4}{2} = 15 \cdot 6 = 90$.

</details>
