---
title: Mittelwert, Median und Modus
category: stochastics
order: 10
level: 1
summary: Drei Möglichkeiten, den „typischen“ Wert einer Datenreihe zu beschreiben – wie man Mittelwert, Median und Modus berechnet und wann man welchen nimmt.
related: spread, probability-basics, percentages
---

Wer Daten sammelt – Noten, Temperaturen, Körpergrößen –, möchte sie oft mit einer einzigen Zahl zusammenfassen, die zeigt, was ein „typischer“ Wert ist. Solche Zahlen heißen **Lagemaße** oder umgangssprachlich Durchschnittswerte. Die drei wichtigsten sind das **arithmetische Mittel**, der **Median** und der **Modus** – und jedes davon erzählt etwas anderes über die Daten.

## Das arithmetische Mittel

Das **arithmetische Mittel** (kurz: Mittelwert) ist das, was man im Alltag „den Durchschnitt“ nennt: Man addiert alle Werte und teilt durch ihre Anzahl.

$$\bar{x} = \frac{x_1 + x_2 + \dots + x_n}{n} = \frac{1}{n}\sum_{i=1}^{n} x_i$$

Dabei sind $x_1, \dots, x_n$ die Werte der Datenreihe und $n$ ist die Anzahl der Werte. $\bar{x}$ spricht man „x quer“.

Anschaulich ist der Mittelwert ein Schwerpunkt: Legt man auf einem Zahlenstrahl an jeden Datenwert ein gleich schweres Gewicht, liegt der Strahl genau bei $\bar{x}$ im Gleichgewicht. Daraus folgt auch: Die Abweichungen vom Mittelwert ergeben zusammen immer null.

### Beispiel 1

Sieben Schülerinnen und Schüler haben in einer Woche $4, 7, 2, 9, 7, 5, 8$ Rätsel gelöst.

$$\bar{x} = \frac{4 + 7 + 2 + 9 + 7 + 5 + 8}{7} = \frac{42}{7} = 6$$

Im Schnitt hat also jede Person 6 Rätsel gelöst.

## Der Median

Der **Median** (auch Zentralwert) ist der Wert in der Mitte, wenn man die Daten der **Größe nach ordnet**. Die Hälfte der Werte liegt darunter, die andere Hälfte darüber.

- Ist $n$ **ungerade**, ist der Median genau der mittlere Wert.
- Ist $n$ **gerade**, gibt es zwei mittlere Werte; der Median ist ihr Mittelwert.

### Beispiel 2: ungerade Anzahl

Die Daten aus Beispiel 1, geordnet: $2, 4, 5, 7, 7, 8, 9$. Bei 7 Werten steht der 4. Wert in der Mitte. Der Median ist $7$.

### Beispiel 3: gerade Anzahl

Daten: $10, 3, 16, 6, 8, 5$. Geordnet: $3, 5, 6, 8, 10, 16$. Die beiden mittleren Werte sind $6$ und $8$, also

$$\text{Median} = \frac{6 + 8}{2} = 7$$

Zum Vergleich: Der Mittelwert beträgt $\frac{48}{6} = 8$.

> **Merke:** Vor dem Bestimmen des Medians die Daten immer erst der Größe nach ordnen. Bei einer geraden Anzahl nimmt man den Mittelwert der beiden mittleren Werte.

## Der Modus

Der **Modus** (auch Modalwert) ist der Wert, der **am häufigsten** vorkommt. In Beispiel 1 tritt die $7$ zweimal auf, alle anderen Werte nur einmal – der Modus ist also $7$.

Eine Datenreihe kann einen Modus haben, mehrere (wenn sich zwei Werte die größte Häufigkeit teilen) oder gar keinen sinnvollen (wenn jeder Wert genau einmal vorkommt). Als einziges der drei Lagemaße funktioniert der Modus auch bei nicht-zahlenmäßigen Daten: Die beliebteste Lieblingsfarbe einer Klasse ist ein Modus – eine „durchschnittliche Farbe“ kann man dagegen nicht ausrechnen.

## Häufigkeitstabellen

Kommen Werte oft mehrfach vor, gibt man die Daten meist als Häufigkeitstabelle an. Dann multipliziert man jeden Wert mit seiner Häufigkeit.

### Beispiel 4

Die Noten einer Klassenarbeit mit 20 Teilnehmenden:

| Note | 1 | 2 | 3 | 4 | 5 |
|---|---|---|---|---|---|
| Anzahl | 2 | 5 | 8 | 4 | 1 |

Mittelwert (Notendurchschnitt):

$$\bar{x} = \frac{1 \cdot 2 + 2 \cdot 5 + 3 \cdot 8 + 4 \cdot 4 + 5 \cdot 1}{20} = \frac{57}{20} = 2{,}85$$

Median: Bei 20 Werten ist der Median der Mittelwert aus dem 10. und 11. Wert. Die ersten $2 + 5 = 7$ Werte sind Einsen und Zweien, die Werte Nummer 8 bis 15 sind alles Dreien. Der 10. und der 11. Wert sind also beide $3$, der Median ist $3$. Auch der Modus ist $3$, weil diese Note am häufigsten vorkommt.

## Welcher Durchschnitt passt?

Der Mittelwert berücksichtigt jeden einzelnen Wert – das ist seine Stärke, aber auch seine Schwäche. Ein einziger extremer Wert (ein **Ausreißer**) kann ihn weit vom Großteil der Daten wegziehen. Der Median hängt nur von der Reihenfolge ab und wird von Ausreißern kaum beeinflusst.

### Beispiel 5: ein Ausreißer

Fünf Angestellte einer kleinen Firma verdienen im Monat 2000 €, 2200 €, 2400 €, 2600 € und 10800 €.

$$\bar{x} = \frac{20000}{5} = 4000 \qquad \text{Median} = 2400$$

Der Mittelwert von 4000 € liegt über dem Gehalt von vier der fünf Personen. Der Median von 2400 € beschreibt das typische Gehalt viel besser. Deshalb wird bei Einkommen oder Immobilienpreisen meist der Median angegeben.

> **Merke:** Der Mittelwert ist empfindlich gegenüber Ausreißern, der Median ist robust. Den Modus nimmt man bei Kategorien oder wenn der häufigste Wert gefragt ist.

Ein Lagemaß allein verrät nie alles: Zwei Datenreihen können denselben Mittelwert haben und trotzdem ganz unterschiedlich aussehen. Wie stark die Werte streuen, beschreiben die Streuungsmaße.

## Typische Fehler

- Den Median ablesen, ohne die Daten vorher zu ordnen.
- Bei gerader Anzahl einfach einen der beiden mittleren Werte nehmen statt ihres Mittelwerts.
- Durch die Anzahl der *verschiedenen* Werte teilen statt durch die Gesamtzahl – besonders bei Häufigkeitstabellen.
- Glauben, der Mittelwert müsse selbst in der Datenreihe vorkommen – $2{,}85$ ist ein völlig normaler Notendurchschnitt.
- Bei starken Ausreißern den Mittelwert verwenden, obwohl der Median aussagekräftiger wäre.

## Übungen

1. Bestimme Mittelwert, Median und Modus von $6, 2, 9, 4, 6, 3$.

<details>
<summary>Lösung</summary>

Mittelwert: $\frac{6 + 2 + 9 + 4 + 6 + 3}{6} = \frac{30}{6} = 5$. Geordnet: $2, 3, 4, 6, 6, 9$, also ist der Median $\frac{4 + 6}{2} = 5$. Die $6$ kommt zweimal vor, der Modus ist $6$.

</details>

2. Nach vier Tests hat Mia im Schnitt 78 Punkte. Wie viele Punkte braucht sie im fünften Test, damit ihr Durchschnitt auf 80 steigt?

<details>
<summary>Lösung</summary>

Für einen Schnitt von 80 bei fünf Tests braucht sie insgesamt $5 \cdot 80 = 400$ Punkte. Bisher hat sie $4 \cdot 78 = 312$ Punkte. Sie braucht also $400 - 312 = 88$ Punkte.

</details>

3. Berechne Mittelwert und Median von $1, 2, 2, 3, 100$. Welcher Wert beschreibt die Daten besser?

<details>
<summary>Lösung</summary>

Mittelwert: $\frac{108}{5} = 21{,}6$. Median: Der mittlere Wert der geordneten Liste ist $2$. Die $100$ ist ein Ausreißer, der den Mittelwert nach oben zieht – der Median beschreibt den typischen Wert deutlich besser.

</details>

4. In einer Umfrage gaben 20 Kinder ihre Anzahl an Geschwistern an: 4 haben keine, 7 haben eins, 6 haben zwei und 3 haben drei. Bestimme Mittelwert, Median und Modus.

<details>
<summary>Lösung</summary>

Mittelwert: $\frac{0 \cdot 4 + 1 \cdot 7 + 2 \cdot 6 + 3 \cdot 3}{20} = \frac{28}{20} = 1{,}4$. Median: Der 10. und 11. Wert liegen bei den Werten Nummer 5 bis 11, die alle $1$ sind – der Median ist $1$. Der Modus ist ebenfalls $1$ (7 Kinder).

</details>
