---
title: Prozentuale Änderung und Zinsen
category: fractions
order: 70
level: 2
summary: Mit dem Wachstumsfaktor Werte prozentual erhöhen und senken, Änderungen rückgängig machen und verketten sowie Zinsen und Zinseszinsen berechnen.
related: percentages, decimals, exponential-functions, sequences-and-series
---

Preise steigen, Einwohnerzahlen sinken, Erspartes bringt Zinsen – all das sind prozentuale Änderungen. Das wichtigste Werkzeug dafür ist der **Wachstumsfaktor**: Statt erst die Änderung auszurechnen und sie dann zu addieren oder abzuziehen, multipliziert man mit einer einzigen Zahl. Damit lassen sich Änderungen leicht rückgängig machen, mehrere Änderungen verketten und schließlich auch Zinseszinsen verstehen.

## Absolute und relative Änderung

Steigt ein Preis von 250 € auf 300 €, beträgt die **absolute Änderung** 50 €. Die **relative Änderung** setzt das ins Verhältnis zum Ausgangswert:

$$\text{relative Änderung} = \frac{\text{neu} - \text{alt}}{\text{alt}} = \frac{300 - 250}{250} = \frac{50}{250} = 0{,}2 = 20\,\%$$

Der Grundwert ist immer der **alte** Wert. Geht der Preis von 300 € zurück auf 250 €, ist das eine Änderung um $\frac{-50}{300} \approx -16{,}7\,\%$ – nicht um $-20\,\%$, denn jetzt ist der Grundwert größer.

## Der Wachstumsfaktor

Erhöht man einen Wert um $p\,\%$, behält man die ursprünglichen $100\,\%$ und legt $p\,\%$ obendrauf – man erhält also $(100 + p)\,\%$ davon:

$$\text{neu} = \text{alt} \cdot \left(1 + \frac{p}{100}\right)$$

Bei einer Abnahme um $p\,\%$ bleiben $(100 - p)\,\%$ übrig:

$$\text{neu} = \text{alt} \cdot \left(1 - \frac{p}{100}\right)$$

Die Zahl in der Klammer heißt **Wachstumsfaktor** (bei einer Abnahme auch **Abnahmefaktor**). Eine Erhöhung um $15\,\%$ hat den Faktor $1{,}15$, eine Senkung um $15\,\%$ den Faktor $0{,}85$.

> **Merke:** Erhöhen um $p\,\%$ heißt Multiplizieren mit $1 + \frac{p}{100}$, Senken um $p\,\%$ heißt Multiplizieren mit $1 - \frac{p}{100}$. Ein Faktor größer als $1$ bedeutet Zunahme, ein Faktor kleiner als $1$ Abnahme.

### Beispiel 1

Ein Fahrrad kostet 80 €, der Preis steigt um $15\,\%$:

$$80 \cdot 1{,}15 = 92$$

Der neue Preis beträgt 92 €.

## Änderungen rückgängig machen

Um zum Ausgangswert zurückzukommen, **teilt** man durch den Wachstumsfaktor – man zieht nicht einfach denselben Prozentsatz ab.

### Beispiel 2

Ein Preis inklusive $19\,\%$ Mehrwertsteuer beträgt 119 €. Wie hoch ist der Nettopreis?

$$\text{alt} = \frac{119}{1{,}19} = 100$$

Der Nettopreis ist also 100 €. Wer $19\,\%$ von 119 € abzieht, erhält fälschlich $96{,}39$ €, denn die $19\,\%$ beziehen sich auf den Netto-, nicht auf den Bruttopreis.

## Mehrere Änderungen nacheinander

Aufeinanderfolgende Änderungen fasst man zusammen, indem man ihre Faktoren **multipliziert**.

### Beispiel 3

Eine Aktie steigt um $20\,\%$ und fällt danach um $20\,\%$. Steht sie wieder beim Anfangswert?

$$1{,}2 \cdot 0{,}8 = 0{,}96$$

Nein – insgesamt hat sie $4\,\%$ verloren. Prozentsätze aufeinanderfolgender Änderungen darf man nicht einfach addieren, weil sich jede Änderung auf einen anderen Grundwert bezieht.

> **Merke:** Mehrere Änderungen verkettet man durch Multiplizieren der Wachstumsfaktoren. Die Gesamtänderung in Prozent ist das Produkt minus $1$.

## Einfache Zinsen

Geld auf einem Sparkonto bringt **Zinsen**. Bei der einfachen Verzinsung werden die Zinsen immer vom ursprünglichen **Kapital** $K$ berechnet. Beim Zinssatz $p\,\%$ pro Jahr und einer Laufzeit von $t$ Jahren gilt:

$$Z = K \cdot \frac{p}{100} \cdot t$$

### Beispiel 4

1000 € bringen bei $3\,\%$ einfacher Verzinsung in $5$ Jahren $1000 \cdot 0{,}03 \cdot 5 = 150$, also 150 € Zinsen. Für Teile eines Jahres ist $t$ ein Bruch: Bei $6$ Monaten ist $t = \frac{6}{12} = \frac{1}{2}$. Für Tageszinsen rechnet man in Deutschland häufig mit $t = \frac{\text{Tage}}{360}$.

## Zinseszins

Meist werden die Zinsen am Jahresende dem Konto gutgeschrieben und im nächsten Jahr mitverzinst. Das nennt man **Zinseszins**. Jedes Jahr wird das Kapital mit demselben Faktor multipliziert, nach $n$ Jahren also:

$$K_n = K_0 \cdot \left(1 + \frac{p}{100}\right)^n$$

### Beispiel 5

1000 € werden $5$ Jahre lang mit $3\,\%$ verzinst, mit Zinseszins:

$$K_5 = 1000 \cdot 1{,}03^5 \approx 1000 \cdot 1{,}159274 \approx 1159{,}27$$

Das sind 1159,27 € – etwas mehr als die 1150 € bei einfacher Verzinsung, weil auch die Zinsen Zinsen bringen. Über lange Zeiträume wird der Unterschied riesig: Das ist exponentielles Wachstum.

Eine praktische Faustregel (die **72er-Regel**): Ein Kapital verdoppelt sich nach ungefähr $\frac{72}{p}$ Jahren. Bei $6\,\%$ sind das etwa $12$ Jahre, und tatsächlich ist $1{,}06^{12} \approx 2{,}01$.

## Typische Fehler

- Bei der prozentualen Änderung den neuen Wert als Grundwert nehmen.
- Eine Änderung rückgängig machen, indem man denselben Prozentsatz abzieht, statt durch den Faktor zu teilen.
- Prozentsätze nacheinander folgender Änderungen addieren: $+20\,\%$ und $-20\,\%$ heben sich nicht auf.
- Den Faktor für eine Erhöhung um $5\,\%$ als $1{,}5$ statt $1{,}05$ schreiben.
- Mit der Formel für einfache Zinsen rechnen, obwohl Zinseszinsen anfallen.

## Übungen

1. Erhöhe $250$ um $12\,\%$.

<details>
<summary>Lösung</summary>

$250 \cdot 1{,}12 = 280$.

</details>

2. Ein Preis sinkt von 80 € auf 68 €. Um wie viel Prozent ist er gesunken?

<details>
<summary>Lösung</summary>

$\frac{68 - 80}{80} = \frac{-12}{80} = -0{,}15$, er ist also um $15\,\%$ gesunken.

</details>

3. Nach $25\,\%$ Rabatt kostet ein Spiel 45 €. Wie hoch war der ursprüngliche Preis?

<details>
<summary>Lösung</summary>

Der Faktor ist $0{,}75$, also war der Preis $\frac{45}{0{,}75} = 60$, das heißt 60 €.

</details>

4. Eine Stadt wächst in einem Jahr um $10\,\%$ und im nächsten Jahr noch einmal um $10\,\%$. Wie groß ist das Wachstum insgesamt?

<details>
<summary>Lösung</summary>

$1{,}1 \cdot 1{,}1 = 1{,}21$, das Wachstum beträgt also $21\,\%$ – nicht $20\,\%$.

</details>

5. Du legst 2000 € zu $2{,}5\,\%$ mit Zinseszins an. Wie viel hast du nach $3$ Jahren?

<details>
<summary>Lösung</summary>

$2000 \cdot 1{,}025^3 = 2000 \cdot 1{,}076890625 \approx 2153{,}78$, also etwa 2153,78 €.

</details>
