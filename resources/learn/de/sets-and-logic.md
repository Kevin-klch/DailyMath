---
title: Mengen und Logik
category: advanced
order: 10
level: 2
summary: Die Sprache der Mathematik – Mengen und Mengenoperationen, Venn-Diagramme, logische Verknüpfungen, Wahrheitstafeln, Implikationen und das Verneinen mit Quantoren.
related: number-sets, functions-basics, proof-by-induction, probability-basics
---

Mengen und Logik sind die Grammatik der Mathematik. Mit Mengen fasst man Objekte zusammen – Zahlen, Punkte, Ergebnisse eines Zufallsexperiments – und kann präzise über sie sprechen. Die Logik regelt, wie man Aussagen verknüpft und wann eine Folgerung wirklich gilt. Wer Definitionen lesen, Beweise verstehen oder mit Wahrscheinlichkeiten rechnen will, braucht dieses Handwerkszeug.

## Mengen und Elemente

Eine **Menge** ist eine Zusammenfassung verschiedener Objekte, ihrer **Elemente**. Man schreibt $a \in A$ für „$a$ ist Element von $A$“ und $a \notin A$ für das Gegenteil. Mengen lassen sich auf zwei Arten angeben:

- **aufzählend**: $A = \{1; 2; 3; 4\}$. Reihenfolge und Wiederholungen spielen keine Rolle: $\{1; 2\} = \{2; 1; 1\}$.
- **beschreibend** über eine Eigenschaft: $\{x \in \mathbb{Z} \mid -2 \le x < 2\} = \{-2; -1; 0; 1\}$. Gelesen: „die Menge aller ganzen Zahlen $x$, für die $-2 \le x < 2$ gilt“.

Die **leere Menge** $\emptyset = \{\}$ enthält gar kein Element. Die Anzahl der Elemente einer endlichen Menge heißt **Mächtigkeit** $|A|$; zum Beispiel ist $|\{1; 2; 3; 4\}| = 4$.

$A$ ist eine **Teilmenge** von $B$, geschrieben $A \subseteq B$, wenn jedes Element von $A$ auch in $B$ liegt. Zum Beispiel ist $\{2; 4\} \subseteq \{1; 2; 3; 4\}$, und es gilt $\mathbb{N} \subseteq \mathbb{Z} \subseteq \mathbb{Q} \subseteq \mathbb{R}$. Zwei Mengen sind gleich, wenn jede Teilmenge der anderen ist.

## Mengenoperationen

| Operation | Schreibweise | Enthält alle Elemente, die … |
|---|---|---|
| Schnittmenge | $A \cap B$ | in $A$ **und** in $B$ liegen |
| Vereinigungsmenge | $A \cup B$ | in $A$ **oder** in $B$ (oder in beiden) liegen |
| Differenzmenge | $A \setminus B$ | in $A$, aber **nicht** in $B$ liegen |
| Komplement | $\overline{A}$ | in der Grundmenge $G$, aber nicht in $A$ liegen |

Ein **Venn-Diagramm** stellt Mengen als sich überlappende Kreise in einem Rechteck (der Grundmenge) dar. Die Schnittmenge ist der linsenförmige Bereich, in dem sich die Kreise überlappen, die Vereinigung ist alles, was von mindestens einem Kreis bedeckt wird, und das Komplement von $A$ ist alles außerhalb des Kreises $A$. Gilt $A \cap B = \emptyset$, heißen die Mengen **disjunkt** (elementfremd) – ihre Kreise überlappen sich nicht.

### Beispiel 1

$A = \{1; 2; 3; 4\}$ und $B = \{3; 4; 5\}$:

$$A \cap B = \{3; 4\}, \quad A \cup B = \{1; 2; 3; 4; 5\}, \quad A \setminus B = \{1; 2\}, \quad B \setminus A = \{5\}$$

## Zählen mit zwei Mengen

Zählt man die Elemente von $A$ und von $B$ zusammen, werden die Elemente der Schnittmenge doppelt gezählt. Deshalb gilt:

> **Merke:** $|A \cup B| = |A| + |B| - |A \cap B|$ (Siebformel / Ein- und Ausschluss).

### Beispiel 2

In einer Klasse mit 30 Schülerinnen und Schülern spielen 18 Fußball, 12 Tennis und 5 beides. Mindestens eine der beiden Sportarten betreiben $18 + 12 - 5 = 25$, also betreiben $30 - 25 = 5$ keine von beiden. Im Venn-Diagramm: 13 nur Fußball, 7 nur Tennis, 5 im Überlappungsbereich und 5 außerhalb.

## Aussagen und Verknüpfungen

Eine **Aussage** ist ein Satz, der entweder wahr oder falsch ist – „7 ist eine Primzahl“ (wahr), „$2 + 2 = 5$“ (falsch). „Regnet es?“ oder „$x > 3$“ ohne Kenntnis von $x$ sind keine Aussagen.

Aussagen lassen sich verknüpfen:

| Name | Zeichen | Bedeutung |
|---|---|---|
| Negation | $\neg A$ | nicht $A$ |
| Konjunktion | $A \land B$ | $A$ und $B$ – nur wahr, wenn beide wahr sind |
| Disjunktion | $A \lor B$ | $A$ oder $B$ – wahr, wenn mindestens eine wahr ist |
| Implikation | $A \Rightarrow B$ | wenn $A$, dann $B$ |
| Äquivalenz | $A \Leftrightarrow B$ | $A$ genau dann, wenn $B$ |

Das mathematische „oder“ ist **einschließend**: $A \lor B$ ist auch dann wahr, wenn beide wahr sind – es ist kein „entweder … oder“.

### Die Implikation

Die Wahrheitstafel von $A \Rightarrow B$ (w = wahr, f = falsch):

| $A$ | $B$ | $A \Rightarrow B$ |
|---|---|---|
| w | w | w |
| w | f | f |
| f | w | w |
| f | f | w |

Eine Implikation ist nur dann falsch, wenn die Voraussetzung wahr und die Folgerung falsch ist. „Wenn $n$ durch 4 teilbar ist, dann ist $n$ gerade“ ist wahr – obwohl $6$ gerade und nicht durch 4 teilbar ist. Das zeigt nur, dass die **Umkehrung** $B \Rightarrow A$ falsch ist.

> **Merke:** $A \Rightarrow B$ ist gleichwertig zur **Kontraposition** $\neg B \Rightarrow \neg A$, aber **nicht** zur Umkehrung $B \Rightarrow A$.

Auf der Kontraposition beruhen viele Beweise: Statt „ist $n^2$ gerade, dann ist $n$ gerade“ zeigt man „ist $n$ ungerade, dann ist $n^2$ ungerade“.

## Quantoren und Verneinung

Aussagen über viele Objekte verwenden **Quantoren**:

- **Allquantor** $\forall x$: „für alle $x$“ – z. B. $\forall x \in \mathbb{R}: x^2 \ge 0$ (wahr).
- **Existenzquantor** $\exists x$: „es gibt ein $x$“ – z. B. $\exists x \in \mathbb{N}: x^2 = 49$ (wahr, $x = 7$).

Beim Verneinen tauscht man den Quantor und verneint die innere Aussage: Die Negation von „$\forall x: P(x)$“ ist „$\exists x: \neg P(x)$“ und umgekehrt.

### Beispiel 3

„Alle Primzahlen sind ungerade.“ Verneinung: „Es gibt eine Primzahl, die nicht ungerade ist.“ Die Verneinung ist wahr ($2$ ist eine gerade Primzahl), also ist die ursprüngliche Aussage falsch. Um eine Allaussage zu widerlegen, genügt ein einziges **Gegenbeispiel**.

### Die Regeln von De Morgan

Dasselbe Muster gilt in der Logik und bei Mengen:

$$\neg(A \land B) = \neg A \lor \neg B, \qquad \neg(A \lor B) = \neg A \land \neg B$$

$$\overline{A \cap B} = \overline{A} \cup \overline{B}, \qquad \overline{A \cup B} = \overline{A} \cap \overline{B}$$

„Nicht (sonnig und warm)“ bedeutet „nicht sonnig oder nicht warm“.

## Typische Fehler

- $\in$ (Element) und $\subseteq$ (Teilmenge) verwechseln: $2 \in \{1; 2\}$, aber $\{2\} \subseteq \{1; 2\}$.
- Bei der Vereinigung einfach $|A| + |B|$ rechnen und die Schnittmenge nicht abziehen.
- „Oder“ als „entweder … oder“ verstehen – in der Mathematik dürfen beide wahr sein.
- Aus $A \Rightarrow B$ auf $B \Rightarrow A$ schließen.
- „Alle sind …“ mit „keiner ist …“ verneinen – richtig ist „mindestens einer ist nicht …“.

## Übungen

1. Gegeben sind $A = \{2; 4; 6; 8\}$ und $B = \{1; 2; 3; 4\}$. Bestimme $A \cap B$, $A \cup B$ und $B \setminus A$.

<details>
<summary>Lösung</summary>

$A \cap B = \{2; 4\}$, $A \cup B = \{1; 2; 3; 4; 6; 8\}$, $B \setminus A = \{1; 3\}$.

</details>

2. Von 40 Schülerinnen und Schülern lernen 25 Englisch, 20 Französisch und 10 beides. Wie viele lernen keine der beiden Sprachen?

<details>
<summary>Lösung</summary>

Mindestens eine Sprache: $25 + 20 - 10 = 35$. Keine: $40 - 35 = 5$.

</details>

3. Verneine die Aussage „Jeder in der Klasse hat ein Handy.“

<details>
<summary>Lösung</summary>

„Mindestens einer in der Klasse hat kein Handy.“ (Nicht: „Niemand hat ein Handy.“)

</details>

4. Ist „Wenn $n$ durch 6 teilbar ist, dann ist $n$ durch 3 teilbar“ wahr? Gilt die Umkehrung? Formuliere die Kontraposition.

<details>
<summary>Lösung</summary>

Wahr, denn $6 = 2 \cdot 3$. Die Umkehrung „ist $n$ durch 3 teilbar, dann auch durch 6“ ist falsch – Gegenbeispiel $n = 3$. Kontraposition: „Ist $n$ nicht durch 3 teilbar, dann ist $n$ nicht durch 6 teilbar.“

</details>

5. $A$ ist falsch und $B$ ist wahr. Bestimme den Wahrheitswert von $(A \lor B) \land \neg A$ und von $A \Rightarrow \neg B$.

<details>
<summary>Lösung</summary>

$A \lor B$ ist wahr und $\neg A$ ist wahr, also ist $(A \lor B) \land \neg A$ wahr. $A \Rightarrow \neg B$ hat eine falsche Voraussetzung und ist daher wahr.

</details>
