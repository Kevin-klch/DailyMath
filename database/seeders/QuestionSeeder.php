<?php

namespace Database\Seeders;

use App\Enums\AnswerType;
use App\Enums\Difficulty;
use App\Enums\Topic;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Startbestand an geprüften Aufgaben.
 *
 * Konventionen: LaTeX in $…$ (inline) bzw. $$…$$ (abgesetzt, immer in einer Zeile),
 * Hinweise bauen didaktisch aufeinander auf, der letzte Hinweis darf fast die Lösung sein.
 * Der Seeder ist idempotent (Abgleich über den Titel).
 */
class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            foreach ($this->questions() as $data) {
                $hints = $data['hints'];
                unset($data['hints']);

                $question = Question::updateOrCreate(['title' => $data['title']], $data);

                $question->hints()->delete();
                foreach (array_values($hints) as $i => [$label, $content]) {
                    $question->hints()->create(['position' => $i + 1, 'label' => $label, 'content' => $content]);
                }
            }
        });
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function questions(): array
    {
        return [
            [
                'title' => 'Zwei Brüche, ein Ergebnis',
                'topic' => Topic::Fractions,
                'difficulty' => Difficulty::Easy,
                'prompt' => 'Berechne und gib das Ergebnis als vollständig gekürzten Bruch an:'."\n\n".'$$\frac{1}{3} + \frac{1}{4}$$',
                'answer_type' => AnswerType::Fraction,
                'answer' => ['value' => '7/12'],
                'answer_meta' => ['placeholder' => 'z. B. 5/8'],
                'hints' => [
                    ['Denkanstoß', 'Brüche kannst du nicht addieren, indem du Zähler und Nenner jeweils einzeln zusammenrechnest.'],
                    ['Lösungsansatz', 'Um Brüche zu addieren, brauchst du einen **gemeinsamen Nenner**.'],
                    ['Konkrete Hilfestellung', 'Der kleinste gemeinsame Nenner von 3 und 4 ist 12. Erweitere beide Brüche auf den Nenner 12.'],
                    ['Fast vollständige Lösung', '$\frac{1}{3} = \frac{4}{12}$ und $\frac{1}{4} = \frac{3}{12}$. Jetzt musst du nur noch die Zähler addieren.'],
                ],
                'solution' => '$$\frac{1}{3} + \frac{1}{4} = \frac{4}{12} + \frac{3}{12} = \frac{7}{12}$$'."\n\n".'Da 7 eine Primzahl ist und 12 nicht teilt, ist $\frac{7}{12}$ bereits vollständig gekürzt.',
                'background' => 'Brüche mit verschiedenen Nennern werden zuerst auf einen gemeinsamen Nenner erweitert – am einfachsten auf das kleinste gemeinsame Vielfache (kgV) der Nenner.',
            ],
            [
                'title' => 'Punkt vor Strich',
                'topic' => Topic::Arithmetic,
                'difficulty' => Difficulty::Easy,
                'prompt' => 'Berechne ohne Taschenrechner:'."\n\n".'$$18 - 4 \cdot 3 + 12 : 4$$',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '9'],
                'hints' => [
                    ['Denkanstoß', 'Nicht einfach von links nach rechts rechnen – es gibt eine feste Reihenfolge der Rechenarten.'],
                    ['Lösungsansatz', 'Punktrechnung ($\cdot$ und $:$) kommt vor Strichrechnung ($+$ und $-$).'],
                    ['Konkrete Hilfestellung', 'Berechne zuerst $4 \cdot 3$ und $12 : 4$.'],
                    ['Fast vollständige Lösung', '$4 \cdot 3 = 12$ und $12 : 4 = 3$. Übrig bleibt $18 - 12 + 3$.'],
                ],
                'solution' => '$$18 - 4 \cdot 3 + 12 : 4 = 18 - 12 + 3 = 9$$',
                'background' => 'Die Reihenfolge lautet: Klammern, Potenzen, Punktrechnung, Strichrechnung. Gleichrangige Operationen werden von links nach rechts ausgeführt.',
            ],
            [
                'title' => 'Die Hypotenuse',
                'topic' => Topic::Geometry,
                'difficulty' => Difficulty::Easy,
                'prompt' => 'In einem rechtwinkligen Dreieck sind die beiden Katheten $a = 9\,\text{cm}$ und $b = 12\,\text{cm}$ lang.'."\n\n".'Wie lang ist die Hypotenuse $c$ (in cm)?',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '15'],
                'answer_meta' => ['unit' => 'cm'],
                'hints' => [
                    ['Denkanstoß', 'Für rechtwinklige Dreiecke gibt es einen berühmten Zusammenhang zwischen den drei Seiten.'],
                    ['Lösungsansatz', 'Satz des Pythagoras: $a^2 + b^2 = c^2$.'],
                    ['Konkrete Hilfestellung', '$9^2 + 12^2 = 81 + 144$. Danach musst du noch die Wurzel ziehen.'],
                    ['Fast vollständige Lösung', '$c^2 = 225$, also $c = \sqrt{225}$.'],
                ],
                'solution' => '$$c = \sqrt{a^2 + b^2} = \sqrt{81 + 144} = \sqrt{225} = 15$$'."\n\n".'Die Hypotenuse ist **15 cm** lang.',
                'background' => 'Das Dreieck 9–12–15 ist ein Vielfaches des bekannten pythagoreischen Tripels 3–4–5 (Faktor 3).',
            ],
            [
                'title' => 'Gleichung mit Gleichgewicht',
                'topic' => Topic::Algebra,
                'difficulty' => Difficulty::Easy,
                'prompt' => 'Löse die Gleichung nach $x$ auf:'."\n\n".'$$3x - 7 = 2x + 5$$',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '12'],
                'answer_meta' => ['placeholder' => 'x = …'],
                'hints' => [
                    ['Denkanstoß', 'Eine Gleichung ist wie eine Waage: Was du auf einer Seite tust, musst du auch auf der anderen tun.'],
                    ['Lösungsansatz', 'Bringe alle Terme mit $x$ auf eine Seite und alle Zahlen auf die andere.'],
                    ['Konkrete Hilfestellung', 'Subtrahiere auf beiden Seiten $2x$.'],
                    ['Fast vollständige Lösung', 'Du erhältst $x - 7 = 5$. Jetzt noch $+7$ auf beiden Seiten.'],
                ],
                'solution' => '$$3x - 7 = 2x + 5 \quad | -2x$$'."\n".'$$x - 7 = 5 \quad | +7$$'."\n".'$$x = 12$$'."\n\n".'Probe: $3 \cdot 12 - 7 = 29$ und $2 \cdot 12 + 5 = 29$. ✓',
                'background' => 'Äquivalenzumformungen verändern die Lösungsmenge einer Gleichung nicht.',
            ],
            [
                'title' => 'Zwei Nullstellen',
                'topic' => Topic::Algebra,
                'difficulty' => Difficulty::Medium,
                'prompt' => 'Bestimme alle Lösungen der quadratischen Gleichung:'."\n\n".'$$x^2 - 5x + 6 = 0$$'."\n\n".'Gib beide Lösungen getrennt durch ein Semikolon an.',
                'answer_type' => AnswerType::SolutionSet,
                'answer' => ['values' => ['2', '3']],
                'answer_meta' => ['placeholder' => 'z. B. 1; 4'],
                'hints' => [
                    ['Denkanstoß', 'Eine quadratische Gleichung kann bis zu zwei Lösungen haben.'],
                    ['Lösungsansatz', 'Du kannst die p-q-Formel verwenden oder versuchen, den Term zu faktorisieren.'],
                    ['Konkrete Hilfestellung', 'Suche zwei Zahlen, deren Produkt $6$ und deren Summe $5$ ist (Satz von Vieta).'],
                    ['Fast vollständige Lösung', '$x^2 - 5x + 6 = (x - 2)(x - 3)$. Ein Produkt ist null, wenn einer der Faktoren null ist.'],
                ],
                'solution' => '$$x^2 - 5x + 6 = (x - 2)(x - 3) = 0$$'."\n\n".'Also $x_1 = 2$ und $x_2 = 3$.'."\n\n".'Mit der p-q-Formel ($p = -5$, $q = 6$): $x_{1,2} = \frac{5}{2} \pm \sqrt{\frac{25}{4} - 6} = \frac{5}{2} \pm \frac{1}{2}$.',
                'background' => 'Satz von Vieta: Für $x^2 + px + q = 0$ mit Lösungen $x_1, x_2$ gilt $x_1 + x_2 = -p$ und $x_1 \cdot x_2 = q$.',
            ],
            [
                'title' => 'Ein kleines Gleichungssystem',
                'topic' => Topic::Algebra,
                'difficulty' => Difficulty::Medium,
                'prompt' => 'Löse das lineare Gleichungssystem:'."\n\n".'$$2x + y = 7$$'."\n".'$$x - y = 2$$',
                'answer_type' => AnswerType::MultiValue,
                'answer' => ['values' => ['x' => '3', 'y' => '1']],
                'answer_meta' => ['variables' => ['x', 'y']],
                'hints' => [
                    ['Denkanstoß', 'Zwei Gleichungen, zwei Unbekannte – versuche, eine Unbekannte loszuwerden.'],
                    ['Lösungsansatz', 'Mit dem Additionsverfahren fällt hier eine Variable sofort weg.'],
                    ['Konkrete Hilfestellung', 'Addiere beide Gleichungen: Das $y$ hebt sich auf.'],
                    ['Fast vollständige Lösung', 'Du erhältst $3x = 9$, also $x = 3$. Setze das in die zweite Gleichung ein.'],
                ],
                'solution' => 'Addition beider Gleichungen:'."\n\n".'$$(2x + y) + (x - y) = 7 + 2 \;\Rightarrow\; 3x = 9 \;\Rightarrow\; x = 3$$'."\n\n".'Einsetzen in $x - y = 2$: $3 - y = 2$, also $y = 1$.',
                'background' => 'Neben dem Additionsverfahren gibt es das Einsetzungs- und das Gleichsetzungsverfahren – alle führen zum selben Ergebnis.',
            ],
            [
                'title' => 'Steigung in einem Punkt',
                'topic' => Topic::Analysis,
                'difficulty' => Difficulty::Medium,
                'prompt' => 'Gegeben ist die Funktion'."\n\n".'$$f(x) = 3x^2 + 2x$$'."\n\n".'Berechne die Steigung des Graphen an der Stelle $x = 2$, also $f\'(2)$.',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '14'],
                'hints' => [
                    ['Denkanstoß', 'Die Steigung eines Graphen in einem Punkt liefert die erste Ableitung.'],
                    ['Lösungsansatz', 'Potenzregel: $(x^n)\' = n \cdot x^{n-1}$. Konstante Faktoren bleiben erhalten.'],
                    ['Konkrete Hilfestellung', 'Leite summandenweise ab: $(3x^2)\' = 6x$ und $(2x)\' = 2$.'],
                    ['Fast vollständige Lösung', '$f\'(x) = 6x + 2$. Setze jetzt $x = 2$ ein.'],
                ],
                'solution' => '$$f\'(x) = 6x + 2$$'."\n".'$$f\'(2) = 6 \cdot 2 + 2 = 14$$',
                'background' => 'Die Ableitung $f\'(x_0)$ ist die Steigung der Tangente an den Graphen im Punkt $(x_0 \mid f(x_0))$.',
            ],
            [
                'title' => 'Fläche unter der Parabel',
                'topic' => Topic::Analysis,
                'difficulty' => Difficulty::Medium,
                'prompt' => 'Berechne das bestimmte Integral:'."\n\n".'$$\int_0^3 x^2 \, dx$$',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '9'],
                'hints' => [
                    ['Denkanstoß', 'Ein bestimmtes Integral berechnest du über eine Stammfunktion.'],
                    ['Lösungsansatz', 'Eine Stammfunktion von $x^n$ ist $\frac{x^{n+1}}{n+1}$.'],
                    ['Konkrete Hilfestellung', 'Eine Stammfunktion von $x^2$ ist $F(x) = \frac{x^3}{3}$. Berechne $F(3) - F(0)$.'],
                    ['Fast vollständige Lösung', '$F(3) = \frac{27}{3}$ und $F(0) = 0$.'],
                ],
                'solution' => '$$\int_0^3 x^2 \, dx = \left[\frac{x^3}{3}\right]_0^3 = \frac{27}{3} - 0 = 9$$',
                'background' => 'Hauptsatz der Differential- und Integralrechnung: $\int_a^b f(x)\,dx = F(b) - F(a)$, wobei $F$ eine Stammfunktion von $f$ ist.',
            ],
            [
                'title' => 'Determinante einer 2×2-Matrix',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Medium,
                'prompt' => 'Berechne die Determinante der Matrix'."\n\n".'$$A = \begin{pmatrix} 3 & 2 \\\\ 1 & 4 \end{pmatrix}$$',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '10'],
                'hints' => [
                    ['Denkanstoß', 'Für 2×2-Matrizen gibt es eine einfache Formel mit den beiden Diagonalen.'],
                    ['Lösungsansatz', '$\det\begin{pmatrix} a & b \\\\ c & d \end{pmatrix} = a \cdot d - b \cdot c$'],
                    ['Konkrete Hilfestellung', 'Hauptdiagonale: $3 \cdot 4$. Nebendiagonale: $2 \cdot 1$.'],
                    ['Fast vollständige Lösung', '$\det A = 12 - 2$.'],
                ],
                'solution' => '$$\det A = 3 \cdot 4 - 2 \cdot 1 = 12 - 2 = 10$$',
                'background' => 'Ist die Determinante ungleich null, ist die Matrix invertierbar. Geometrisch gibt $|\det A|$ an, um welchen Faktor die Matrix Flächen streckt.',
            ],
            [
                'title' => 'Zweierlogarithmus',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Easy,
                'prompt' => 'Berechne:'."\n\n".'$$\log_2(64)$$',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '6'],
                'hints' => [
                    ['Denkanstoß', 'Der Logarithmus beantwortet die Frage: „Mit welcher Zahl muss ich die Basis potenzieren?“'],
                    ['Lösungsansatz', 'Gesucht ist $x$ mit $2^x = 64$.'],
                    ['Konkrete Hilfestellung', 'Verdopple ab 1 so lange, bis du 64 erreichst: 2, 4, 8, …'],
                    ['Fast vollständige Lösung', '$2^5 = 32$. Einmal noch verdoppeln.'],
                ],
                'solution' => '$$2^6 = 64 \;\Rightarrow\; \log_2(64) = 6$$',
                'background' => 'Logarithmus und Potenz sind Umkehroperationen: $\log_b(b^x) = x$.',
            ],
            [
                'title' => 'Würfelglück',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Medium,
                'prompt' => 'Du wirfst zwei faire sechsseitige Würfel gleichzeitig.'."\n\n".'Wie groß ist die Wahrscheinlichkeit, dass die Augensumme genau **7** beträgt? Gib das Ergebnis als gekürzten Bruch an.',
                'answer_type' => AnswerType::Fraction,
                'answer' => ['value' => '1/6'],
                'answer_meta' => ['placeholder' => 'z. B. 1/4'],
                'hints' => [
                    ['Denkanstoß', 'Wie viele mögliche Ergebnisse gibt es insgesamt, wenn man beide Würfel unterscheidet?'],
                    ['Lösungsansatz', 'Laplace-Wahrscheinlichkeit: $P = \frac{\text{günstige Ergebnisse}}{\text{mögliche Ergebnisse}}$, insgesamt gibt es $6 \cdot 6 = 36$ Ergebnisse.'],
                    ['Konkrete Hilfestellung', 'Zähle alle Paare mit Summe 7 auf: $(1,6), (2,5), \ldots$'],
                    ['Fast vollständige Lösung', 'Es gibt 6 günstige Paare: $(1,6), (2,5), (3,4), (4,3), (5,2), (6,1)$.'],
                ],
                'solution' => '$$P(\text{Summe} = 7) = \frac{6}{36} = \frac{1}{6}$$',
                'background' => 'Die 7 ist die wahrscheinlichste Augensumme bei zwei Würfeln – für jede Augenzahl des ersten Würfels gibt es genau eine passende des zweiten.',
            ],
            [
                'title' => 'Die Kreisfläche',
                'topic' => Topic::Geometry,
                'difficulty' => Difficulty::Easy,
                'prompt' => 'Ein Kreis hat den Radius $r = 5\,\text{cm}$.'."\n\n".'Berechne seinen Flächeninhalt in $\text{cm}^2$. Du kannst exakt (z. B. mit π) oder auf zwei Nachkommastellen gerundet antworten.',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '25pi', 'tolerance' => 0.01],
                'answer_meta' => ['unit' => 'cm²', 'placeholder' => 'z. B. 12π oder 37,70'],
                'hints' => [
                    ['Denkanstoß', 'Für die Kreisfläche brauchst du die Kreiszahl π.'],
                    ['Lösungsansatz', 'Flächeninhalt eines Kreises: $A = \pi \cdot r^2$.'],
                    ['Fast vollständige Lösung', '$r^2 = 25$, also $A = 25\pi$. Für einen Näherungswert multiplizierst du mit $\pi \approx 3{,}14159$.'],
                ],
                'solution' => '$$A = \pi r^2 = \pi \cdot 5^2 = 25\pi \approx 78{,}54\,\text{cm}^2$$',
                'background' => 'π ist irrational – ein exaktes Ergebnis wie $25\pi$ ist oft aussagekräftiger als jeder gerundete Wert.',
            ],
            [
                'title' => 'Welche binomische Formel?',
                'topic' => Topic::Algebra,
                'difficulty' => Difficulty::Easy,
                'prompt' => 'Welcher Term ist für alle Zahlen $a$ und $b$ gleich $(a + b)^2$?',
                'answer_type' => AnswerType::MultipleChoice,
                'answer' => ['choice' => 'b'],
                'answer_meta' => ['options' => [
                    'a' => '$a^2 + b^2$',
                    'b' => '$a^2 + 2ab + b^2$',
                    'c' => '$2a + 2b$',
                    'd' => '$a^2 + ab + b^2$',
                ]],
                'hints' => [
                    ['Denkanstoß', 'Ein Quadrat bedeutet: Der Term wird mit sich selbst multipliziert.'],
                    ['Lösungsansatz', 'Schreibe $(a + b)^2 = (a + b)(a + b)$ und multipliziere jeden Summanden mit jedem.'],
                    ['Konkrete Hilfestellung', '$(a + b)(a + b) = a \cdot a + a \cdot b + b \cdot a + b \cdot b$'],
                ],
                'solution' => '$$(a + b)^2 = (a + b)(a + b) = a^2 + ab + ba + b^2 = a^2 + 2ab + b^2$$'."\n\n".'Gegenprobe mit $a = b = 1$: $(1 + 1)^2 = 4$, aber $1^2 + 1^2 = 2$ – Antwort A ist also falsch.',
                'background' => 'Die drei binomischen Formeln: $(a+b)^2 = a^2 + 2ab + b^2$, $(a-b)^2 = a^2 - 2ab + b^2$ und $(a+b)(a-b) = a^2 - b^2$.',
            ],
            [
                'title' => 'Potenzgesetze',
                'topic' => Topic::Arithmetic,
                'difficulty' => Difficulty::Medium,
                'prompt' => 'Berechne möglichst geschickt:'."\n\n".'$$\frac{2^5 \cdot 2^3}{2^6}$$',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '4'],
                'hints' => [
                    ['Denkanstoß', 'Du musst die Potenzen nicht einzeln ausrechnen – alle haben dieselbe Basis.'],
                    ['Lösungsansatz', 'Bei gleicher Basis gilt: $a^m \cdot a^n = a^{m+n}$ und $\frac{a^m}{a^n} = a^{m-n}$.'],
                    ['Fast vollständige Lösung', 'Im Zähler steht $2^{5+3} = 2^8$. Teile durch $2^6$.'],
                ],
                'solution' => '$$\frac{2^5 \cdot 2^3}{2^6} = \frac{2^8}{2^6} = 2^{8-6} = 2^2 = 4$$',
                'background' => 'Potenzgesetze gelten nur bei gleicher Basis (Multiplikation/Division) bzw. gleichem Exponenten.',
            ],
            [
                'title' => 'Unendlich viele Hälften',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Hard,
                'prompt' => 'Berechne den Wert der unendlichen Reihe:'."\n\n".'$$1 + \frac{1}{2} + \frac{1}{4} + \frac{1}{8} + \frac{1}{16} + \ldots$$',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '2'],
                'hints' => [
                    ['Denkanstoß', 'Jeder Summand ist halb so groß wie der vorherige. Wie nennt man eine solche Reihe?'],
                    ['Lösungsansatz', 'Es ist eine geometrische Reihe mit dem ersten Glied $a = 1$ und dem Faktor $q = \frac{1}{2}$.'],
                    ['Konkrete Hilfestellung', 'Für $|q| < 1$ gilt: $\sum_{k=0}^{\infty} a q^k = \frac{a}{1 - q}$.'],
                    ['Fast vollständige Lösung', 'Setze ein: $\frac{1}{1 - \frac{1}{2}} = \frac{1}{\frac{1}{2}}$.'],
                ],
                'solution' => '$$\sum_{k=0}^{\infty} \left(\frac{1}{2}\right)^k = \frac{1}{1 - \frac{1}{2}} = 2$$'."\n\n".'Anschaulich: Die Teilsummen $1;\ 1{,}5;\ 1{,}75;\ 1{,}875;\ \ldots$ kommen der 2 beliebig nahe.',
                'background' => 'Eine geometrische Reihe konvergiert genau dann, wenn $|q| < 1$ ist.',
            ],
            [
                'title' => 'Gerade durch zwei Punkte',
                'topic' => Topic::Analysis,
                'difficulty' => Difficulty::Medium,
                'prompt' => 'Eine Gerade $g(x) = mx + b$ verläuft durch die Punkte $P(1 \mid 3)$ und $Q(3 \mid 7)$.'."\n\n".'Bestimme die Steigung $m$ und den y-Achsenabschnitt $b$.',
                'answer_type' => AnswerType::MultiValue,
                'answer' => ['values' => ['m' => '2', 'b' => '1']],
                'answer_meta' => ['variables' => ['m', 'b']],
                'hints' => [
                    ['Denkanstoß', 'Die Steigung gibt an, um wie viel sich $y$ ändert, wenn $x$ um 1 zunimmt.'],
                    ['Lösungsansatz', 'Steigungsdreieck: $m = \frac{y_2 - y_1}{x_2 - x_1}$.'],
                    ['Konkrete Hilfestellung', '$m = \frac{7 - 3}{3 - 1} = 2$. Setze nun einen Punkt in $y = 2x + b$ ein.'],
                    ['Fast vollständige Lösung', 'Mit $P(1 \mid 3)$: $3 = 2 \cdot 1 + b$.'],
                ],
                'solution' => '$$m = \frac{7 - 3}{3 - 1} = \frac{4}{2} = 2$$'."\n".'$$3 = 2 \cdot 1 + b \;\Rightarrow\; b = 1$$'."\n\n".'Die Gerade lautet $g(x) = 2x + 1$. Probe mit $Q$: $2 \cdot 3 + 1 = 7$. ✓',
                'background' => 'Zwei verschiedene Punkte legen eine Gerade eindeutig fest.',
            ],
            [
                'title' => 'Partielle Integration',
                'topic' => Topic::Analysis,
                'difficulty' => Difficulty::Hard,
                'prompt' => 'Berechne das bestimmte Integral:'."\n\n".'$$\int_0^1 x \cdot e^x \, dx$$',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '1'],
                'hints' => [
                    ['Denkanstoß', 'Der Integrand ist ein Produkt zweier Funktionen – eine einfache Stammfunktion siehst du nicht direkt.'],
                    ['Lösungsansatz', 'Partielle Integration: $\int u \cdot v\' \, dx = u \cdot v - \int u\' \cdot v \, dx$.'],
                    ['Konkrete Hilfestellung', 'Wähle $u = x$ (wird beim Ableiten einfacher) und $v\' = e^x$. Dann ist $u\' = 1$ und $v = e^x$.'],
                    ['Fast vollständige Lösung', 'Du erhältst die Stammfunktion $F(x) = x e^x - e^x$. Berechne $F(1) - F(0)$.'],
                ],
                'solution' => '$$\int_0^1 x e^x \, dx = \left[x e^x\right]_0^1 - \int_0^1 e^x \, dx = \left[x e^x - e^x\right]_0^1$$'."\n".'$$= (e - e) - (0 - 1) = 1$$',
                'background' => 'Partielle Integration ist die Umkehrung der Produktregel. Faustregel: Als $u$ wählt man den Faktor, der durch Ableiten einfacher wird.',
            ],
            [
                'title' => 'Das größte Rechteck',
                'topic' => Topic::Analysis,
                'difficulty' => Difficulty::Hard,
                'prompt' => 'Ein Rechteck hat einen Umfang von genau $20\,\text{cm}$.'."\n\n".'Wie groß ist der **größtmögliche** Flächeninhalt dieses Rechtecks (in $\text{cm}^2$)?',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '25'],
                'answer_meta' => ['unit' => 'cm²'],
                'hints' => [
                    ['Denkanstoß', 'Es ist eine Extremwertaufgabe: Du suchst das Maximum einer Funktion unter einer Nebenbedingung.'],
                    ['Lösungsansatz', 'Nenne die Seiten $a$ und $b$. Nebenbedingung: $2a + 2b = 20$, Zielfunktion: $A = a \cdot b$.'],
                    ['Konkrete Hilfestellung', 'Aus der Nebenbedingung folgt $b = 10 - a$, also $A(a) = a(10 - a) = 10a - a^2$.'],
                    ['Fast vollständige Lösung', '$A\'(a) = 10 - 2a = 0$ liefert $a = 5$. Wie groß ist dann $b$ – und die Fläche?'],
                ],
                'solution' => '$$A(a) = a(10 - a) = 10a - a^2, \qquad A\'(a) = 10 - 2a = 0 \;\Rightarrow\; a = 5$$'."\n\n".'Da $A\'\'(a) = -2 < 0$, liegt ein Maximum vor. Mit $b = 10 - 5 = 5$ ist das Rechteck ein Quadrat:'."\n\n".'$$A_{\max} = 5 \cdot 5 = 25\,\text{cm}^2$$',
                'background' => 'Unter allen Rechtecken mit gleichem Umfang hat das Quadrat den größten Flächeninhalt.',
            ],
            [
                'title' => 'Determinante einer 3×3-Matrix',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Hard,
                'prompt' => 'Berechne die Determinante der Matrix'."\n\n".'$$B = \begin{pmatrix} 2 & 1 & 0 \\\\ 1 & 3 & 1 \\\\ 0 & 1 & 2 \end{pmatrix}$$',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '8'],
                'hints' => [
                    ['Denkanstoß', 'Für 3×3-Matrizen gibt es eine handliche Merkregel mit Diagonalen.'],
                    ['Lösungsansatz', 'Regel von Sarrus: Summe der drei Produkte entlang der Hauptdiagonalen minus Summe der drei Produkte entlang der Nebendiagonalen.'],
                    ['Konkrete Hilfestellung', 'Hauptdiagonalen: $2 \cdot 3 \cdot 2 + 1 \cdot 1 \cdot 0 + 0 \cdot 1 \cdot 1$. Nebendiagonalen: $0 \cdot 3 \cdot 0 + 2 \cdot 1 \cdot 1 + 1 \cdot 1 \cdot 2$.'],
                    ['Fast vollständige Lösung', 'Die Hauptdiagonalen ergeben $12$, die Nebendiagonalen $4$.'],
                ],
                'solution' => 'Mit der Regel von Sarrus:'."\n\n".'$$\det B = (2 \cdot 3 \cdot 2 + 1 \cdot 1 \cdot 0 + 0 \cdot 1 \cdot 1) - (0 \cdot 3 \cdot 0 + 2 \cdot 1 \cdot 1 + 1 \cdot 1 \cdot 2) = 12 - 4 = 8$$',
                'background' => 'Alternativ kann man nach einer Zeile oder Spalte entwickeln (Laplace). Die Regel von Sarrus gilt nur für 3×3-Matrizen.',
            ],
            [
                'title' => 'Dreimal Kopf',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Hard,
                'prompt' => 'Eine faire Münze wird fünfmal geworfen.'."\n\n".'Wie groß ist die Wahrscheinlichkeit, dass **genau dreimal** Kopf fällt? Gib das Ergebnis als gekürzten Bruch an.',
                'answer_type' => AnswerType::Fraction,
                'answer' => ['value' => '5/16'],
                'answer_meta' => ['placeholder' => 'z. B. 3/8'],
                'hints' => [
                    ['Denkanstoß', 'Die Reihenfolge der Würfe spielt keine Rolle – es zählt nur, wie oft Kopf fällt.'],
                    ['Lösungsansatz', 'Binomialverteilung: $P(X = k) = \binom{n}{k} p^k (1 - p)^{n - k}$ mit $n = 5$, $k = 3$, $p = \frac{1}{2}$.'],
                    ['Konkrete Hilfestellung', 'Es gibt $\binom{5}{3} = 10$ Möglichkeiten, die drei Kopf-Würfe zu verteilen, und insgesamt $2^5 = 32$ gleich wahrscheinliche Ausgänge.'],
                    ['Fast vollständige Lösung', '$P = \frac{10}{32}$ – jetzt noch kürzen.'],
                ],
                'solution' => '$$P(X = 3) = \binom{5}{3} \cdot \left(\frac{1}{2}\right)^3 \cdot \left(\frac{1}{2}\right)^2 = 10 \cdot \frac{1}{32} = \frac{5}{16}$$',
                'background' => 'Der Binomialkoeffizient $\binom{n}{k} = \frac{n!}{k!\,(n-k)!}$ zählt, auf wie viele Arten man $k$ Treffer auf $n$ Versuche verteilen kann.',
            ],
            [
                'title' => 'Ein berühmter Grenzwert',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Hard,
                'prompt' => 'Bestimme den Grenzwert'."\n\n".'$$\lim_{n \to \infty} \left(1 + \frac{2}{n}\right)^n$$'."\n\n".'Gib den Wert auf zwei Nachkommastellen gerundet an.',
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => 'e^2', 'tolerance' => 0.01],
                'answer_meta' => ['placeholder' => 'z. B. 2,72'],
                'hints' => [
                    ['Denkanstoß', 'Der Ausdruck erinnert an die Definition einer sehr wichtigen Konstante.'],
                    ['Lösungsansatz', 'Es gilt $\lim_{n \to \infty} \left(1 + \frac{1}{n}\right)^n = e \approx 2{,}71828$.'],
                    ['Konkrete Hilfestellung', 'Allgemeiner gilt $\lim_{n \to \infty} \left(1 + \frac{x}{n}\right)^n = e^x$.'],
                    ['Fast vollständige Lösung', 'Mit $x = 2$ ist der Grenzwert $e^2 = e \cdot e$.'],
                ],
                'solution' => '$$\lim_{n \to \infty} \left(1 + \frac{2}{n}\right)^n = e^2 \approx 7{,}39$$'."\n\n".'Begründung: Mit $m = \frac{n}{2}$ ist $\left(1 + \frac{2}{n}\right)^n = \left[\left(1 + \frac{1}{m}\right)^m\right]^2 \to e^2$.',
                'background' => 'Dieser Grenzwert beschreibt stetiges Wachstum, z. B. Zinsen, die unendlich oft im Jahr gutgeschrieben werden.',
            ],
        ];
    }
}
