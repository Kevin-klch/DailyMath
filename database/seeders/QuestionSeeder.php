<?php

namespace Database\Seeders;

use App\Enums\AnswerType;
use App\Enums\Difficulty;
use App\Enums\HintStage;
use App\Enums\Topic;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;

/**
 * Startbestand an geprüften Aufgaben – zweisprachig (Englisch = Grundsprache, Deutsch = Übersetzung).
 *
 * Konventionen: LaTeX in $…$ (inline) bzw. $$…$$ (abgesetzt, immer in einer Zeile),
 * Hinweise bauen didaktisch aufeinander auf, der letzte Hinweis darf fast die Lösung sein.
 * Titel dürfen weder Lösungsweg noch Methode verraten (also nicht „Punkt vor Strich“ oder „Partielle Integration“) –
 * das ist Aufgabe der Hinweise.
 * Der Seeder ist idempotent (Abgleich über den Slug, für Altbestände auch über den Titel).
 */
class QuestionSeeder extends Seeder
{
    private const TEXT_FIELDS = ['title', 'prompt', 'solution', 'background'];

    public function run(): void
    {
        DB::transaction(function () {
            foreach ($this->all() as $data) {
                $this->store($data);
            }
        });
    }

    /**
     * Startbestand plus die Aufgaben aus database/seeders/data/*.php.
     *
     * @return list<array<string, mixed>>
     */
    public function all(): array
    {
        $questions = $this->questions();

        foreach (glob(__DIR__.'/data/questions-*.php') as $file) {
            array_push($questions, ...require $file);
        }

        // Passende Lernartikel ergänzen (database/seeders/data/learn-links.php)
        $links = require __DIR__.'/data/learn-links.php';

        return array_map(fn (array $q) => [...$q, 'learn' => $q['learn'] ?? $links[$q['slug']] ?? []], $questions);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function store(array $data): void
    {
        $en = $data['en'];
        $de = $data['de'];

        $attributes = [
            'slug' => $data['slug'],
            'topic' => $data['topic'],
            'difficulty' => $data['difficulty'],
            'answer_type' => $data['answer_type'],
            'answer' => $data['answer'],
            'answer_meta' => array_filter([...($data['answer_meta'] ?? []), 'placeholder' => $en['placeholder'] ?? null]) ?: null,
            'learn_topics' => ($data['learn'] ?? []) ?: null,
            'translations' => ['de' => array_filter([
                ...array_intersect_key($de, array_flip(self::TEXT_FIELDS)),
                'answer_meta' => isset($de['placeholder']) ? ['placeholder' => $de['placeholder']] : null,
            ])],
            ...array_intersect_key($en, array_flip(self::TEXT_FIELDS)),
        ];

        // Bestehende Aufgabe wiederfinden (auch ältere Einträge ohne Slug mit deutschem Titel),
        // damit bereits geplante Daily-Challenges ihre Aufgabe behalten.
        $question = Question::where('slug', $data['slug'])->first()
            ?? Question::whereNull('slug')->whereIn('title', [$en['title'], $de['title']])->first()
            ?? new Question;

        $question->fill($attributes)->save();

        $question->hints()->delete();
        foreach (array_values($data['hints']) as $i => [$stage, $enContent, $deContent]) {
            $hintStage = HintStage::tryFrom($stage) ?? throw new RuntimeException("Unbekannte Hinweisstufe: {$stage}");
            [$enLabel, $deLabel] = [$hintStage->label('en'), $hintStage->label('de')];

            $question->hints()->create([
                'position' => $i + 1,
                'label' => $enLabel,
                'content' => $enContent,
                'translations' => ['de' => ['label' => $deLabel, 'content' => $deContent]],
            ]);
        }
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function questions(): array
    {
        return [
            [
                'slug' => 'two-fractions',
                'topic' => Topic::Fractions,
                'difficulty' => Difficulty::Easy,
                'answer_type' => AnswerType::Fraction,
                'answer' => ['value' => '7/12'],
                'en' => [
                    'title' => 'Two Fractions, One Result',
                    'prompt' => 'Calculate and give the result as a fully reduced fraction:'."\n\n".'$$\frac{1}{3} + \frac{1}{4}$$',
                    'placeholder' => 'e.g. 5/8',
                    'solution' => '$$\frac{1}{3} + \frac{1}{4} = \frac{4}{12} + \frac{3}{12} = \frac{7}{12}$$'."\n\n".'Since 7 is a prime number and does not divide 12, $\frac{7}{12}$ is already fully reduced.',
                    'background' => 'Fractions with different denominators are first expanded to a common denominator – easiest is the least common multiple (LCM) of the denominators.',
                ],
                'de' => [
                    'title' => 'Zwei Brüche, ein Ergebnis',
                    'prompt' => 'Berechne und gib das Ergebnis als vollständig gekürzten Bruch an:'."\n\n".'$$\frac{1}{3} + \frac{1}{4}$$',
                    'placeholder' => 'z. B. 5/8',
                    'solution' => '$$\frac{1}{3} + \frac{1}{4} = \frac{4}{12} + \frac{3}{12} = \frac{7}{12}$$'."\n\n".'Da 7 eine Primzahl ist und 12 nicht teilt, ist $\frac{7}{12}$ bereits vollständig gekürzt.',
                    'background' => 'Brüche mit verschiedenen Nennern werden zuerst auf einen gemeinsamen Nenner erweitert – am einfachsten auf das kleinste gemeinsame Vielfache (kgV) der Nenner.',
                ],
                'hints' => [
                    ['nudge', 'You can\'t add fractions by adding the numerators and the denominators separately.', 'Brüche kannst du nicht addieren, indem du Zähler und Nenner jeweils einzeln zusammenrechnest.'],
                    ['approach', 'To add fractions, you need a **common denominator**.', 'Um Brüche zu addieren, brauchst du einen **gemeinsamen Nenner**.'],
                    ['help', 'The least common denominator of 3 and 4 is 12. Expand both fractions to the denominator 12.', 'Der kleinste gemeinsame Nenner von 3 und 4 ist 12. Erweitere beide Brüche auf den Nenner 12.'],
                    ['almost', '$\frac{1}{3} = \frac{4}{12}$ and $\frac{1}{4} = \frac{3}{12}$. Now you just need to add the numerators.', '$\frac{1}{3} = \frac{4}{12}$ und $\frac{1}{4} = \frac{3}{12}$. Jetzt musst du nur noch die Zähler addieren.'],
                ],
            ],
            [
                'slug' => 'order-of-operations',
                'topic' => Topic::Arithmetic,
                'difficulty' => Difficulty::Easy,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '9'],
                'en' => [
                    'title' => 'One Line, Four Operations',
                    'prompt' => 'Calculate without a calculator:'."\n\n".'$$18 - 4 \cdot 3 + 12 : 4$$',
                    'solution' => '$$18 - 4 \cdot 3 + 12 : 4 = 18 - 12 + 3 = 9$$',
                    'background' => 'The order is: parentheses, exponents, multiplication and division, addition and subtraction. Operations of equal rank are carried out from left to right.',
                ],
                'de' => [
                    'title' => 'Eine Zeile, vier Rechenarten',
                    'prompt' => 'Berechne ohne Taschenrechner:'."\n\n".'$$18 - 4 \cdot 3 + 12 : 4$$',
                    'solution' => '$$18 - 4 \cdot 3 + 12 : 4 = 18 - 12 + 3 = 9$$',
                    'background' => 'Die Reihenfolge lautet: Klammern, Potenzen, Punktrechnung, Strichrechnung. Gleichrangige Operationen werden von links nach rechts ausgeführt.',
                ],
                'hints' => [
                    ['nudge', 'Don\'t simply calculate from left to right – there is a fixed order of operations.', 'Nicht einfach von links nach rechts rechnen – es gibt eine feste Reihenfolge der Rechenarten.'],
                    ['approach', 'Multiplication and division ($\cdot$ and $:$) come before addition and subtraction ($+$ and $-$).', 'Punktrechnung ($\cdot$ und $:$) kommt vor Strichrechnung ($+$ und $-$).'],
                    ['help', 'First calculate $4 \cdot 3$ and $12 : 4$.', 'Berechne zuerst $4 \cdot 3$ und $12 : 4$.'],
                    ['almost', '$4 \cdot 3 = 12$ and $12 : 4 = 3$. What remains is $18 - 12 + 3$.', '$4 \cdot 3 = 12$ und $12 : 4 = 3$. Übrig bleibt $18 - 12 + 3$.'],
                ],
            ],
            [
                'slug' => 'the-hypotenuse',
                'topic' => Topic::Geometry,
                'difficulty' => Difficulty::Easy,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '15'],
                'answer_meta' => ['unit' => 'cm'],
                'en' => [
                    'title' => 'The Hypotenuse',
                    'prompt' => 'In a right triangle, the two legs are $a = 9\,\text{cm}$ and $b = 12\,\text{cm}$ long.'."\n\n".'How long is the hypotenuse $c$ (in cm)?',
                    'solution' => '$$c = \sqrt{a^2 + b^2} = \sqrt{81 + 144} = \sqrt{225} = 15$$'."\n\n".'The hypotenuse is **15 cm** long.',
                    'background' => 'The triangle 9–12–15 is a multiple of the well-known Pythagorean triple 3–4–5 (factor 3).',
                ],
                'de' => [
                    'title' => 'Die Hypotenuse',
                    'prompt' => 'In einem rechtwinkligen Dreieck sind die beiden Katheten $a = 9\,\text{cm}$ und $b = 12\,\text{cm}$ lang.'."\n\n".'Wie lang ist die Hypotenuse $c$ (in cm)?',
                    'solution' => '$$c = \sqrt{a^2 + b^2} = \sqrt{81 + 144} = \sqrt{225} = 15$$'."\n\n".'Die Hypotenuse ist **15 cm** lang.',
                    'background' => 'Das Dreieck 9–12–15 ist ein Vielfaches des bekannten pythagoreischen Tripels 3–4–5 (Faktor 3).',
                ],
                'hints' => [
                    ['nudge', 'For right triangles there is a famous relationship between the three sides.', 'Für rechtwinklige Dreiecke gibt es einen berühmten Zusammenhang zwischen den drei Seiten.'],
                    ['approach', 'Pythagorean theorem: $a^2 + b^2 = c^2$.', 'Satz des Pythagoras: $a^2 + b^2 = c^2$.'],
                    ['help', '$9^2 + 12^2 = 81 + 144$. Then you still have to take the square root.', '$9^2 + 12^2 = 81 + 144$. Danach musst du noch die Wurzel ziehen.'],
                    ['almost', '$c^2 = 225$, so $c = \sqrt{225}$.', '$c^2 = 225$, also $c = \sqrt{225}$.'],
                ],
            ],
            [
                'slug' => 'balanced-equation',
                'topic' => Topic::Algebra,
                'difficulty' => Difficulty::Easy,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '12'],
                'en' => [
                    'title' => 'x on Both Sides',
                    'prompt' => 'Solve the equation for $x$:'."\n\n".'$$3x - 7 = 2x + 5$$',
                    'placeholder' => 'x = …',
                    'solution' => '$$3x - 7 = 2x + 5 \quad | -2x$$'."\n".'$$x - 7 = 5 \quad | +7$$'."\n".'$$x = 12$$'."\n\n".'Check: $3 \cdot 12 - 7 = 29$ and $2 \cdot 12 + 5 = 29$. ✓',
                    'background' => 'Equivalence transformations do not change the solution set of an equation.',
                ],
                'de' => [
                    'title' => 'x auf beiden Seiten',
                    'prompt' => 'Löse die Gleichung nach $x$ auf:'."\n\n".'$$3x - 7 = 2x + 5$$',
                    'placeholder' => 'x = …',
                    'solution' => '$$3x - 7 = 2x + 5 \quad | -2x$$'."\n".'$$x - 7 = 5 \quad | +7$$'."\n".'$$x = 12$$'."\n\n".'Probe: $3 \cdot 12 - 7 = 29$ und $2 \cdot 12 + 5 = 29$. ✓',
                    'background' => 'Äquivalenzumformungen verändern die Lösungsmenge einer Gleichung nicht.',
                ],
                'hints' => [
                    ['nudge', 'An equation is like a balance scale: whatever you do on one side, you have to do on the other.', 'Eine Gleichung ist wie eine Waage: Was du auf einer Seite tust, musst du auch auf der anderen tun.'],
                    ['approach', 'Bring all terms with $x$ to one side and all numbers to the other.', 'Bringe alle Terme mit $x$ auf eine Seite und alle Zahlen auf die andere.'],
                    ['help', 'Subtract $2x$ on both sides.', 'Subtrahiere auf beiden Seiten $2x$.'],
                    ['almost', 'You get $x - 7 = 5$. Now add $7$ on both sides.', 'Du erhältst $x - 7 = 5$. Jetzt noch $+7$ auf beiden Seiten.'],
                ],
            ],
            [
                'slug' => 'two-roots',
                'topic' => Topic::Algebra,
                'difficulty' => Difficulty::Medium,
                'answer_type' => AnswerType::SolutionSet,
                'answer' => ['values' => ['2', '3']],
                'en' => [
                    'title' => 'Two Roots',
                    'prompt' => 'Find all solutions of the quadratic equation:'."\n\n".'$$x^2 - 5x + 6 = 0$$'."\n\n".'Enter both solutions separated by a semicolon.',
                    'placeholder' => 'e.g. 1; 4',
                    'solution' => '$$x^2 - 5x + 6 = (x - 2)(x - 3) = 0$$'."\n\n".'So $x_1 = 2$ and $x_2 = 3$.'."\n\n".'With the quadratic formula for $x^2 + px + q = 0$ ($p = -5$, $q = 6$): $x_{1,2} = \frac{5}{2} \pm \sqrt{\frac{25}{4} - 6} = \frac{5}{2} \pm \frac{1}{2}$.',
                    'background' => 'Vieta\'s formulas: for $x^2 + px + q = 0$ with solutions $x_1, x_2$ we have $x_1 + x_2 = -p$ and $x_1 \cdot x_2 = q$.',
                ],
                'de' => [
                    'title' => 'Zwei Nullstellen',
                    'prompt' => 'Bestimme alle Lösungen der quadratischen Gleichung:'."\n\n".'$$x^2 - 5x + 6 = 0$$'."\n\n".'Gib beide Lösungen getrennt durch ein Semikolon an.',
                    'placeholder' => 'z. B. 1; 4',
                    'solution' => '$$x^2 - 5x + 6 = (x - 2)(x - 3) = 0$$'."\n\n".'Also $x_1 = 2$ und $x_2 = 3$.'."\n\n".'Mit der p-q-Formel ($p = -5$, $q = 6$): $x_{1,2} = \frac{5}{2} \pm \sqrt{\frac{25}{4} - 6} = \frac{5}{2} \pm \frac{1}{2}$.',
                    'background' => 'Satz von Vieta: Für $x^2 + px + q = 0$ mit Lösungen $x_1, x_2$ gilt $x_1 + x_2 = -p$ und $x_1 \cdot x_2 = q$.',
                ],
                'hints' => [
                    ['nudge', 'A quadratic equation can have up to two solutions.', 'Eine quadratische Gleichung kann bis zu zwei Lösungen haben.'],
                    ['approach', 'You can use the quadratic formula or try to factor the expression.', 'Du kannst die p-q-Formel verwenden oder versuchen, den Term zu faktorisieren.'],
                    ['help', 'Look for two numbers whose product is $6$ and whose sum is $5$ (Vieta\'s formulas).', 'Suche zwei Zahlen, deren Produkt $6$ und deren Summe $5$ ist (Satz von Vieta).'],
                    ['almost', '$x^2 - 5x + 6 = (x - 2)(x - 3)$. A product is zero if one of its factors is zero.', '$x^2 - 5x + 6 = (x - 2)(x - 3)$. Ein Produkt ist null, wenn einer der Faktoren null ist.'],
                ],
            ],
            [
                'slug' => 'small-linear-system',
                'topic' => Topic::Algebra,
                'difficulty' => Difficulty::Medium,
                'answer_type' => AnswerType::MultiValue,
                'answer' => ['values' => ['x' => '3', 'y' => '1']],
                'answer_meta' => ['variables' => ['x', 'y']],
                'en' => [
                    'title' => 'A Small System of Equations',
                    'prompt' => 'Solve the system of linear equations:'."\n\n".'$$2x + y = 7$$'."\n".'$$x - y = 2$$',
                    'solution' => 'Adding both equations:'."\n\n".'$$(2x + y) + (x - y) = 7 + 2 \;\Rightarrow\; 3x = 9 \;\Rightarrow\; x = 3$$'."\n\n".'Substituting into $x - y = 2$: $3 - y = 2$, so $y = 1$.',
                    'background' => 'Besides the elimination method there are the substitution and the equating method – all lead to the same result.',
                ],
                'de' => [
                    'title' => 'Ein kleines Gleichungssystem',
                    'prompt' => 'Löse das lineare Gleichungssystem:'."\n\n".'$$2x + y = 7$$'."\n".'$$x - y = 2$$',
                    'solution' => 'Addition beider Gleichungen:'."\n\n".'$$(2x + y) + (x - y) = 7 + 2 \;\Rightarrow\; 3x = 9 \;\Rightarrow\; x = 3$$'."\n\n".'Einsetzen in $x - y = 2$: $3 - y = 2$, also $y = 1$.',
                    'background' => 'Neben dem Additionsverfahren gibt es das Einsetzungs- und das Gleichsetzungsverfahren – alle führen zum selben Ergebnis.',
                ],
                'hints' => [
                    ['nudge', 'Two equations, two unknowns – try to get rid of one unknown.', 'Zwei Gleichungen, zwei Unbekannte – versuche, eine Unbekannte loszuwerden.'],
                    ['approach', 'With the elimination method, one variable drops out right away here.', 'Mit dem Additionsverfahren fällt hier eine Variable sofort weg.'],
                    ['help', 'Add both equations: the $y$ cancels out.', 'Addiere beide Gleichungen: Das $y$ hebt sich auf.'],
                    ['almost', 'You get $3x = 9$, so $x = 3$. Substitute that into the second equation.', 'Du erhältst $3x = 9$, also $x = 3$. Setze das in die zweite Gleichung ein.'],
                ],
            ],
            [
                'slug' => 'slope-at-a-point',
                'topic' => Topic::Analysis,
                'difficulty' => Difficulty::Medium,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '14'],
                'en' => [
                    'title' => 'Slope at a Point',
                    'prompt' => 'Consider the function'."\n\n".'$$f(x) = 3x^2 + 2x$$'."\n\n".'Calculate the slope of the graph at $x = 2$, i.e. $f\'(2)$.',
                    'solution' => '$$f\'(x) = 6x + 2$$'."\n".'$$f\'(2) = 6 \cdot 2 + 2 = 14$$',
                    'background' => 'The derivative $f\'(x_0)$ is the slope of the tangent to the graph at the point $(x_0 \mid f(x_0))$.',
                ],
                'de' => [
                    'title' => 'Steigung in einem Punkt',
                    'prompt' => 'Gegeben ist die Funktion'."\n\n".'$$f(x) = 3x^2 + 2x$$'."\n\n".'Berechne die Steigung des Graphen an der Stelle $x = 2$, also $f\'(2)$.',
                    'solution' => '$$f\'(x) = 6x + 2$$'."\n".'$$f\'(2) = 6 \cdot 2 + 2 = 14$$',
                    'background' => 'Die Ableitung $f\'(x_0)$ ist die Steigung der Tangente an den Graphen im Punkt $(x_0 \mid f(x_0))$.',
                ],
                'hints' => [
                    ['nudge', 'The slope of a graph at a point is given by the first derivative.', 'Die Steigung eines Graphen in einem Punkt liefert die erste Ableitung.'],
                    ['approach', 'Power rule: $(x^n)\' = n \cdot x^{n-1}$. Constant factors are kept.', 'Potenzregel: $(x^n)\' = n \cdot x^{n-1}$. Konstante Faktoren bleiben erhalten.'],
                    ['help', 'Differentiate term by term: $(3x^2)\' = 6x$ and $(2x)\' = 2$.', 'Leite summandenweise ab: $(3x^2)\' = 6x$ und $(2x)\' = 2$.'],
                    ['almost', '$f\'(x) = 6x + 2$. Now plug in $x = 2$.', '$f\'(x) = 6x + 2$. Setze jetzt $x = 2$ ein.'],
                ],
            ],
            [
                'slug' => 'area-under-the-parabola',
                'topic' => Topic::Analysis,
                'difficulty' => Difficulty::Medium,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '9'],
                'en' => [
                    'title' => 'Area Under the Parabola',
                    'prompt' => 'Calculate the definite integral:'."\n\n".'$$\int_0^3 x^2 \, dx$$',
                    'solution' => '$$\int_0^3 x^2 \, dx = \left[\frac{x^3}{3}\right]_0^3 = \frac{27}{3} - 0 = 9$$',
                    'background' => 'Fundamental theorem of calculus: $\int_a^b f(x)\,dx = F(b) - F(a)$, where $F$ is an antiderivative of $f$.',
                ],
                'de' => [
                    'title' => 'Fläche unter der Parabel',
                    'prompt' => 'Berechne das bestimmte Integral:'."\n\n".'$$\int_0^3 x^2 \, dx$$',
                    'solution' => '$$\int_0^3 x^2 \, dx = \left[\frac{x^3}{3}\right]_0^3 = \frac{27}{3} - 0 = 9$$',
                    'background' => 'Hauptsatz der Differential- und Integralrechnung: $\int_a^b f(x)\,dx = F(b) - F(a)$, wobei $F$ eine Stammfunktion von $f$ ist.',
                ],
                'hints' => [
                    ['nudge', 'You calculate a definite integral using an antiderivative.', 'Ein bestimmtes Integral berechnest du über eine Stammfunktion.'],
                    ['approach', 'An antiderivative of $x^n$ is $\frac{x^{n+1}}{n+1}$.', 'Eine Stammfunktion von $x^n$ ist $\frac{x^{n+1}}{n+1}$.'],
                    ['help', 'An antiderivative of $x^2$ is $F(x) = \frac{x^3}{3}$. Calculate $F(3) - F(0)$.', 'Eine Stammfunktion von $x^2$ ist $F(x) = \frac{x^3}{3}$. Berechne $F(3) - F(0)$.'],
                    ['almost', '$F(3) = \frac{27}{3}$ and $F(0) = 0$.', '$F(3) = \frac{27}{3}$ und $F(0) = 0$.'],
                ],
            ],
            [
                'slug' => 'determinant-2x2',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Medium,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '10'],
                'en' => [
                    'title' => 'Determinant of a 2×2 Matrix',
                    'prompt' => 'Calculate the determinant of the matrix'."\n\n".'$$A = \begin{pmatrix} 3 & 2 \\\\ 1 & 4 \end{pmatrix}$$',
                    'solution' => '$$\det A = 3 \cdot 4 - 2 \cdot 1 = 12 - 2 = 10$$',
                    'background' => 'If the determinant is non-zero, the matrix is invertible. Geometrically, $|\det A|$ is the factor by which the matrix scales areas.',
                ],
                'de' => [
                    'title' => 'Determinante einer 2×2-Matrix',
                    'prompt' => 'Berechne die Determinante der Matrix'."\n\n".'$$A = \begin{pmatrix} 3 & 2 \\\\ 1 & 4 \end{pmatrix}$$',
                    'solution' => '$$\det A = 3 \cdot 4 - 2 \cdot 1 = 12 - 2 = 10$$',
                    'background' => 'Ist die Determinante ungleich null, ist die Matrix invertierbar. Geometrisch gibt $|\det A|$ an, um welchen Faktor die Matrix Flächen streckt.',
                ],
                'hints' => [
                    ['nudge', 'For 2×2 matrices there is a simple formula using the two diagonals.', 'Für 2×2-Matrizen gibt es eine einfache Formel mit den beiden Diagonalen.'],
                    ['approach', '$\det\begin{pmatrix} a & b \\\\ c & d \end{pmatrix} = a \cdot d - b \cdot c$', '$\det\begin{pmatrix} a & b \\\\ c & d \end{pmatrix} = a \cdot d - b \cdot c$'],
                    ['help', 'Main diagonal: $3 \cdot 4$. Anti-diagonal: $2 \cdot 1$.', 'Hauptdiagonale: $3 \cdot 4$. Nebendiagonale: $2 \cdot 1$.'],
                    ['almost', '$\det A = 12 - 2$.', '$\det A = 12 - 2$.'],
                ],
            ],
            [
                'slug' => 'binary-logarithm',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Easy,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '6'],
                'en' => [
                    'title' => 'Binary Logarithm',
                    'prompt' => 'Calculate:'."\n\n".'$$\log_2(64)$$',
                    'solution' => '$$2^6 = 64 \;\Rightarrow\; \log_2(64) = 6$$',
                    'background' => 'Logarithms and powers are inverse operations: $\log_b(b^x) = x$.',
                ],
                'de' => [
                    'title' => 'Zweierlogarithmus',
                    'prompt' => 'Berechne:'."\n\n".'$$\log_2(64)$$',
                    'solution' => '$$2^6 = 64 \;\Rightarrow\; \log_2(64) = 6$$',
                    'background' => 'Logarithmus und Potenz sind Umkehroperationen: $\log_b(b^x) = x$.',
                ],
                'hints' => [
                    ['nudge', 'The logarithm answers the question: “To which power do I have to raise the base?”', 'Der Logarithmus beantwortet die Frage: „Mit welcher Zahl muss ich die Basis potenzieren?“'],
                    ['approach', 'You are looking for $x$ with $2^x = 64$.', 'Gesucht ist $x$ mit $2^x = 64$.'],
                    ['help', 'Starting at 1, keep doubling until you reach 64: 2, 4, 8, …', 'Verdopple ab 1 so lange, bis du 64 erreichst: 2, 4, 8, …'],
                    ['almost', '$2^5 = 32$. Double it one more time.', '$2^5 = 32$. Einmal noch verdoppeln.'],
                ],
            ],
            [
                'slug' => 'lucky-dice',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Medium,
                'answer_type' => AnswerType::Fraction,
                'answer' => ['value' => '1/6'],
                'en' => [
                    'title' => 'Lucky Dice',
                    'prompt' => 'You roll two fair six-sided dice at the same time.'."\n\n".'What is the probability that the sum is exactly **7**? Give the result as a reduced fraction.',
                    'placeholder' => 'e.g. 1/4',
                    'solution' => '$$P(\text{sum} = 7) = \frac{6}{36} = \frac{1}{6}$$',
                    'background' => '7 is the most likely sum with two dice – for every number on the first die there is exactly one matching number on the second.',
                ],
                'de' => [
                    'title' => 'Würfelglück',
                    'prompt' => 'Du wirfst zwei faire sechsseitige Würfel gleichzeitig.'."\n\n".'Wie groß ist die Wahrscheinlichkeit, dass die Augensumme genau **7** beträgt? Gib das Ergebnis als gekürzten Bruch an.',
                    'placeholder' => 'z. B. 1/4',
                    'solution' => '$$P(\text{Summe} = 7) = \frac{6}{36} = \frac{1}{6}$$',
                    'background' => 'Die 7 ist die wahrscheinlichste Augensumme bei zwei Würfeln – für jede Augenzahl des ersten Würfels gibt es genau eine passende des zweiten.',
                ],
                'hints' => [
                    ['nudge', 'How many possible outcomes are there in total if you tell the two dice apart?', 'Wie viele mögliche Ergebnisse gibt es insgesamt, wenn man beide Würfel unterscheidet?'],
                    ['approach', 'Laplace probability: $P = \frac{\text{favorable outcomes}}{\text{possible outcomes}}$; in total there are $6 \cdot 6 = 36$ outcomes.', 'Laplace-Wahrscheinlichkeit: $P = \frac{\text{günstige Ergebnisse}}{\text{mögliche Ergebnisse}}$, insgesamt gibt es $6 \cdot 6 = 36$ Ergebnisse.'],
                    ['help', 'List all pairs with sum 7: $(1,6), (2,5), \ldots$', 'Zähle alle Paare mit Summe 7 auf: $(1,6), (2,5), \ldots$'],
                    ['almost', 'There are 6 favorable pairs: $(1,6), (2,5), (3,4), (4,3), (5,2), (6,1)$.', 'Es gibt 6 günstige Paare: $(1,6), (2,5), (3,4), (4,3), (5,2), (6,1)$.'],
                ],
            ],
            [
                'slug' => 'area-of-a-circle',
                'topic' => Topic::Geometry,
                'difficulty' => Difficulty::Easy,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '25pi', 'tolerance' => 0.01],
                'answer_meta' => ['unit' => 'cm²'],
                'en' => [
                    'title' => 'Area of a Circle',
                    'prompt' => 'A circle has the radius $r = 5\,\text{cm}$.'."\n\n".'Calculate its area in $\text{cm}^2$. You can answer exactly (e.g. with π) or rounded to two decimal places.',
                    'placeholder' => 'e.g. 12π or 37.70',
                    'solution' => '$$A = \pi r^2 = \pi \cdot 5^2 = 25\pi \approx 78.54\,\text{cm}^2$$',
                    'background' => 'π is irrational – an exact result like $25\pi$ is often more meaningful than any rounded value.',
                ],
                'de' => [
                    'title' => 'Die Kreisfläche',
                    'prompt' => 'Ein Kreis hat den Radius $r = 5\,\text{cm}$.'."\n\n".'Berechne seinen Flächeninhalt in $\text{cm}^2$. Du kannst exakt (z. B. mit π) oder auf zwei Nachkommastellen gerundet antworten.',
                    'placeholder' => 'z. B. 12π oder 37,70',
                    'solution' => '$$A = \pi r^2 = \pi \cdot 5^2 = 25\pi \approx 78{,}54\,\text{cm}^2$$',
                    'background' => 'π ist irrational – ein exaktes Ergebnis wie $25\pi$ ist oft aussagekräftiger als jeder gerundete Wert.',
                ],
                'hints' => [
                    ['nudge', 'For the area of a circle you need the number π.', 'Für die Kreisfläche brauchst du die Kreiszahl π.'],
                    ['approach', 'Area of a circle: $A = \pi \cdot r^2$.', 'Flächeninhalt eines Kreises: $A = \pi \cdot r^2$.'],
                    ['almost', '$r^2 = 25$, so $A = 25\pi$. For an approximate value, multiply by $\pi \approx 3.14159$.', '$r^2 = 25$, also $A = 25\pi$. Für einen Näherungswert multiplizierst du mit $\pi \approx 3{,}14159$.'],
                ],
            ],
            [
                'slug' => 'which-binomial-formula',
                'topic' => Topic::Algebra,
                'difficulty' => Difficulty::Easy,
                'answer_type' => AnswerType::MultipleChoice,
                'answer' => ['choice' => 'b'],
                'answer_meta' => ['options' => [
                    'a' => '$a^2 + b^2$',
                    'b' => '$a^2 + 2ab + b^2$',
                    'c' => '$2a + 2b$',
                    'd' => '$a^2 + ab + b^2$',
                ]],
                'en' => [
                    'title' => 'Squaring a Sum',
                    'prompt' => 'Which expression equals $(a + b)^2$ for all numbers $a$ and $b$?',
                    'solution' => '$$(a + b)^2 = (a + b)(a + b) = a^2 + ab + ba + b^2 = a^2 + 2ab + b^2$$'."\n\n".'Counter-check with $a = b = 1$: $(1 + 1)^2 = 4$, but $1^2 + 1^2 = 2$ – so answer A is wrong.',
                    'background' => 'The three binomial formulas: $(a+b)^2 = a^2 + 2ab + b^2$, $(a-b)^2 = a^2 - 2ab + b^2$ and $(a+b)(a-b) = a^2 - b^2$.',
                ],
                'de' => [
                    'title' => 'Eine Summe zum Quadrat',
                    'prompt' => 'Welcher Term ist für alle Zahlen $a$ und $b$ gleich $(a + b)^2$?',
                    'solution' => '$$(a + b)^2 = (a + b)(a + b) = a^2 + ab + ba + b^2 = a^2 + 2ab + b^2$$'."\n\n".'Gegenprobe mit $a = b = 1$: $(1 + 1)^2 = 4$, aber $1^2 + 1^2 = 2$ – Antwort A ist also falsch.',
                    'background' => 'Die drei binomischen Formeln: $(a+b)^2 = a^2 + 2ab + b^2$, $(a-b)^2 = a^2 - 2ab + b^2$ und $(a+b)(a-b) = a^2 - b^2$.',
                ],
                'hints' => [
                    ['nudge', 'Squaring means: the expression is multiplied by itself.', 'Ein Quadrat bedeutet: Der Term wird mit sich selbst multipliziert.'],
                    ['approach', 'Write $(a + b)^2 = (a + b)(a + b)$ and multiply every term by every other term.', 'Schreibe $(a + b)^2 = (a + b)(a + b)$ und multipliziere jeden Summanden mit jedem.'],
                    ['help', '$(a + b)(a + b) = a \cdot a + a \cdot b + b \cdot a + b \cdot b$', '$(a + b)(a + b) = a \cdot a + a \cdot b + b \cdot a + b \cdot b$'],
                ],
            ],
            [
                'slug' => 'laws-of-exponents',
                'topic' => Topic::Arithmetic,
                'difficulty' => Difficulty::Medium,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '4'],
                'en' => [
                    'title' => 'Powers of Two',
                    'prompt' => 'Calculate as cleverly as possible:'."\n\n".'$$\frac{2^5 \cdot 2^3}{2^6}$$',
                    'solution' => '$$\frac{2^5 \cdot 2^3}{2^6} = \frac{2^8}{2^6} = 2^{8-6} = 2^2 = 4$$',
                    'background' => 'The laws of exponents only apply to equal bases (multiplication/division) or equal exponents.',
                ],
                'de' => [
                    'title' => 'Zweierpotenzen',
                    'prompt' => 'Berechne möglichst geschickt:'."\n\n".'$$\frac{2^5 \cdot 2^3}{2^6}$$',
                    'solution' => '$$\frac{2^5 \cdot 2^3}{2^6} = \frac{2^8}{2^6} = 2^{8-6} = 2^2 = 4$$',
                    'background' => 'Potenzgesetze gelten nur bei gleicher Basis (Multiplikation/Division) bzw. gleichem Exponenten.',
                ],
                'hints' => [
                    ['nudge', 'You don\'t have to work out the powers one by one – they all have the same base.', 'Du musst die Potenzen nicht einzeln ausrechnen – alle haben dieselbe Basis.'],
                    ['approach', 'With the same base: $a^m \cdot a^n = a^{m+n}$ and $\frac{a^m}{a^n} = a^{m-n}$.', 'Bei gleicher Basis gilt: $a^m \cdot a^n = a^{m+n}$ und $\frac{a^m}{a^n} = a^{m-n}$.'],
                    ['almost', 'The numerator is $2^{5+3} = 2^8$. Divide by $2^6$.', 'Im Zähler steht $2^{5+3} = 2^8$. Teile durch $2^6$.'],
                ],
            ],
            [
                'slug' => 'infinitely-many-halves',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Hard,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '2'],
                'en' => [
                    'title' => 'Infinitely Many Halves',
                    'prompt' => 'Calculate the value of the infinite series:'."\n\n".'$$1 + \frac{1}{2} + \frac{1}{4} + \frac{1}{8} + \frac{1}{16} + \ldots$$',
                    'solution' => '$$\sum_{k=0}^{\infty} \left(\frac{1}{2}\right)^k = \frac{1}{1 - \frac{1}{2}} = 2$$'."\n\n".'Intuitively: the partial sums $1;\ 1.5;\ 1.75;\ 1.875;\ \ldots$ get arbitrarily close to 2.',
                    'background' => 'A geometric series converges if and only if $|q| < 1$.',
                ],
                'de' => [
                    'title' => 'Unendlich viele Hälften',
                    'prompt' => 'Berechne den Wert der unendlichen Reihe:'."\n\n".'$$1 + \frac{1}{2} + \frac{1}{4} + \frac{1}{8} + \frac{1}{16} + \ldots$$',
                    'solution' => '$$\sum_{k=0}^{\infty} \left(\frac{1}{2}\right)^k = \frac{1}{1 - \frac{1}{2}} = 2$$'."\n\n".'Anschaulich: Die Teilsummen $1;\ 1{,}5;\ 1{,}75;\ 1{,}875;\ \ldots$ kommen der 2 beliebig nahe.',
                    'background' => 'Eine geometrische Reihe konvergiert genau dann, wenn $|q| < 1$ ist.',
                ],
                'hints' => [
                    ['nudge', 'Each term is half as large as the previous one. What is such a series called?', 'Jeder Summand ist halb so groß wie der vorherige. Wie nennt man eine solche Reihe?'],
                    ['approach', 'It is a geometric series with first term $a = 1$ and ratio $q = \frac{1}{2}$.', 'Es ist eine geometrische Reihe mit dem ersten Glied $a = 1$ und dem Faktor $q = \frac{1}{2}$.'],
                    ['help', 'For $|q| < 1$: $\sum_{k=0}^{\infty} a q^k = \frac{a}{1 - q}$.', 'Für $|q| < 1$ gilt: $\sum_{k=0}^{\infty} a q^k = \frac{a}{1 - q}$.'],
                    ['almost', 'Plug in: $\frac{1}{1 - \frac{1}{2}} = \frac{1}{\frac{1}{2}}$.', 'Setze ein: $\frac{1}{1 - \frac{1}{2}} = \frac{1}{\frac{1}{2}}$.'],
                ],
            ],
            [
                'slug' => 'line-through-two-points',
                'topic' => Topic::Analysis,
                'difficulty' => Difficulty::Medium,
                'answer_type' => AnswerType::MultiValue,
                'answer' => ['values' => ['m' => '2', 'b' => '1']],
                'answer_meta' => ['variables' => ['m', 'b']],
                'en' => [
                    'title' => 'A Line Through Two Points',
                    'prompt' => 'A line $g(x) = mx + b$ passes through the points $P(1 \mid 3)$ and $Q(3 \mid 7)$.'."\n\n".'Find the slope $m$ and the y-intercept $b$.',
                    'solution' => '$$m = \frac{7 - 3}{3 - 1} = \frac{4}{2} = 2$$'."\n".'$$3 = 2 \cdot 1 + b \;\Rightarrow\; b = 1$$'."\n\n".'The line is $g(x) = 2x + 1$. Check with $Q$: $2 \cdot 3 + 1 = 7$. ✓',
                    'background' => 'Two distinct points uniquely determine a line.',
                ],
                'de' => [
                    'title' => 'Gerade durch zwei Punkte',
                    'prompt' => 'Eine Gerade $g(x) = mx + b$ verläuft durch die Punkte $P(1 \mid 3)$ und $Q(3 \mid 7)$.'."\n\n".'Bestimme die Steigung $m$ und den y-Achsenabschnitt $b$.',
                    'solution' => '$$m = \frac{7 - 3}{3 - 1} = \frac{4}{2} = 2$$'."\n".'$$3 = 2 \cdot 1 + b \;\Rightarrow\; b = 1$$'."\n\n".'Die Gerade lautet $g(x) = 2x + 1$. Probe mit $Q$: $2 \cdot 3 + 1 = 7$. ✓',
                    'background' => 'Zwei verschiedene Punkte legen eine Gerade eindeutig fest.',
                ],
                'hints' => [
                    ['nudge', 'The slope tells you how much $y$ changes when $x$ increases by 1.', 'Die Steigung gibt an, um wie viel sich $y$ ändert, wenn $x$ um 1 zunimmt.'],
                    ['approach', 'Slope triangle: $m = \frac{y_2 - y_1}{x_2 - x_1}$.', 'Steigungsdreieck: $m = \frac{y_2 - y_1}{x_2 - x_1}$.'],
                    ['help', '$m = \frac{7 - 3}{3 - 1} = 2$. Now plug one point into $y = 2x + b$.', '$m = \frac{7 - 3}{3 - 1} = 2$. Setze nun einen Punkt in $y = 2x + b$ ein.'],
                    ['almost', 'With $P(1 \mid 3)$: $3 = 2 \cdot 1 + b$.', 'Mit $P(1 \mid 3)$: $3 = 2 \cdot 1 + b$.'],
                ],
            ],
            [
                'slug' => 'integration-by-parts',
                'topic' => Topic::Analysis,
                'difficulty' => Difficulty::Hard,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '1'],
                'en' => [
                    'title' => 'A Product Under the Integral',
                    'prompt' => 'Calculate the definite integral:'."\n\n".'$$\int_0^1 x \cdot e^x \, dx$$',
                    'solution' => '$$\int_0^1 x e^x \, dx = \left[x e^x\right]_0^1 - \int_0^1 e^x \, dx = \left[x e^x - e^x\right]_0^1$$'."\n".'$$= (e - e) - (0 - 1) = 1$$',
                    'background' => 'Integration by parts is the reverse of the product rule. Rule of thumb: choose as $u$ the factor that gets simpler when differentiated.',
                ],
                'de' => [
                    'title' => 'Ein Produkt im Integral',
                    'prompt' => 'Berechne das bestimmte Integral:'."\n\n".'$$\int_0^1 x \cdot e^x \, dx$$',
                    'solution' => '$$\int_0^1 x e^x \, dx = \left[x e^x\right]_0^1 - \int_0^1 e^x \, dx = \left[x e^x - e^x\right]_0^1$$'."\n".'$$= (e - e) - (0 - 1) = 1$$',
                    'background' => 'Partielle Integration ist die Umkehrung der Produktregel. Faustregel: Als $u$ wählt man den Faktor, der durch Ableiten einfacher wird.',
                ],
                'hints' => [
                    ['nudge', 'The integrand is a product of two functions – you won\'t see a simple antiderivative right away.', 'Der Integrand ist ein Produkt zweier Funktionen – eine einfache Stammfunktion siehst du nicht direkt.'],
                    ['approach', 'Integration by parts: $\int u \cdot v\' \, dx = u \cdot v - \int u\' \cdot v \, dx$.', 'Partielle Integration: $\int u \cdot v\' \, dx = u \cdot v - \int u\' \cdot v \, dx$.'],
                    ['help', 'Choose $u = x$ (gets simpler when differentiated) and $v\' = e^x$. Then $u\' = 1$ and $v = e^x$.', 'Wähle $u = x$ (wird beim Ableiten einfacher) und $v\' = e^x$. Dann ist $u\' = 1$ und $v = e^x$.'],
                    ['almost', 'You get the antiderivative $F(x) = x e^x - e^x$. Calculate $F(1) - F(0)$.', 'Du erhältst die Stammfunktion $F(x) = x e^x - e^x$. Berechne $F(1) - F(0)$.'],
                ],
            ],
            [
                'slug' => 'largest-rectangle',
                'topic' => Topic::Analysis,
                'difficulty' => Difficulty::Hard,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '25'],
                'answer_meta' => ['unit' => 'cm²'],
                'en' => [
                    'title' => 'The Largest Rectangle',
                    'prompt' => 'A rectangle has a perimeter of exactly $20\,\text{cm}$.'."\n\n".'What is the **largest possible** area of this rectangle (in $\text{cm}^2$)?',
                    'solution' => '$$A(a) = a(10 - a) = 10a - a^2, \qquad A\'(a) = 10 - 2a = 0 \;\Rightarrow\; a = 5$$'."\n\n".'Since $A\'\'(a) = -2 < 0$, this is a maximum. With $b = 10 - 5 = 5$ the rectangle is a square:'."\n\n".'$$A_{\max} = 5 \cdot 5 = 25\,\text{cm}^2$$',
                    'background' => 'Among all rectangles with the same perimeter, the square has the largest area.',
                ],
                'de' => [
                    'title' => 'Das größte Rechteck',
                    'prompt' => 'Ein Rechteck hat einen Umfang von genau $20\,\text{cm}$.'."\n\n".'Wie groß ist der **größtmögliche** Flächeninhalt dieses Rechtecks (in $\text{cm}^2$)?',
                    'solution' => '$$A(a) = a(10 - a) = 10a - a^2, \qquad A\'(a) = 10 - 2a = 0 \;\Rightarrow\; a = 5$$'."\n\n".'Da $A\'\'(a) = -2 < 0$, liegt ein Maximum vor. Mit $b = 10 - 5 = 5$ ist das Rechteck ein Quadrat:'."\n\n".'$$A_{\max} = 5 \cdot 5 = 25\,\text{cm}^2$$',
                    'background' => 'Unter allen Rechtecken mit gleichem Umfang hat das Quadrat den größten Flächeninhalt.',
                ],
                'hints' => [
                    ['nudge', 'This is an optimization problem: you are looking for the maximum of a function under a constraint.', 'Es ist eine Extremwertaufgabe: Du suchst das Maximum einer Funktion unter einer Nebenbedingung.'],
                    ['approach', 'Call the sides $a$ and $b$. Constraint: $2a + 2b = 20$, objective function: $A = a \cdot b$.', 'Nenne die Seiten $a$ und $b$. Nebenbedingung: $2a + 2b = 20$, Zielfunktion: $A = a \cdot b$.'],
                    ['help', 'From the constraint, $b = 10 - a$, so $A(a) = a(10 - a) = 10a - a^2$.', 'Aus der Nebenbedingung folgt $b = 10 - a$, also $A(a) = a(10 - a) = 10a - a^2$.'],
                    ['almost', '$A\'(a) = 10 - 2a = 0$ gives $a = 5$. What is $b$ then – and the area?', '$A\'(a) = 10 - 2a = 0$ liefert $a = 5$. Wie groß ist dann $b$ – und die Fläche?'],
                ],
            ],
            [
                'slug' => 'determinant-3x3',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Hard,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => '8'],
                'en' => [
                    'title' => 'Determinant of a 3×3 Matrix',
                    'prompt' => 'Calculate the determinant of the matrix'."\n\n".'$$B = \begin{pmatrix} 2 & 1 & 0 \\\\ 1 & 3 & 1 \\\\ 0 & 1 & 2 \end{pmatrix}$$',
                    'solution' => 'Using the rule of Sarrus:'."\n\n".'$$\det B = (2 \cdot 3 \cdot 2 + 1 \cdot 1 \cdot 0 + 0 \cdot 1 \cdot 1) - (0 \cdot 3 \cdot 0 + 2 \cdot 1 \cdot 1 + 1 \cdot 1 \cdot 2) = 12 - 4 = 8$$',
                    'background' => 'Alternatively, you can expand along a row or column (Laplace expansion). The rule of Sarrus only works for 3×3 matrices.',
                ],
                'de' => [
                    'title' => 'Determinante einer 3×3-Matrix',
                    'prompt' => 'Berechne die Determinante der Matrix'."\n\n".'$$B = \begin{pmatrix} 2 & 1 & 0 \\\\ 1 & 3 & 1 \\\\ 0 & 1 & 2 \end{pmatrix}$$',
                    'solution' => 'Mit der Regel von Sarrus:'."\n\n".'$$\det B = (2 \cdot 3 \cdot 2 + 1 \cdot 1 \cdot 0 + 0 \cdot 1 \cdot 1) - (0 \cdot 3 \cdot 0 + 2 \cdot 1 \cdot 1 + 1 \cdot 1 \cdot 2) = 12 - 4 = 8$$',
                    'background' => 'Alternativ kann man nach einer Zeile oder Spalte entwickeln (Laplace). Die Regel von Sarrus gilt nur für 3×3-Matrizen.',
                ],
                'hints' => [
                    ['nudge', 'For 3×3 matrices there is a handy mnemonic using diagonals.', 'Für 3×3-Matrizen gibt es eine handliche Merkregel mit Diagonalen.'],
                    ['approach', 'Rule of Sarrus: sum of the three products along the main diagonals minus the sum of the three products along the anti-diagonals.', 'Regel von Sarrus: Summe der drei Produkte entlang der Hauptdiagonalen minus Summe der drei Produkte entlang der Nebendiagonalen.'],
                    ['help', 'Main diagonals: $2 \cdot 3 \cdot 2 + 1 \cdot 1 \cdot 0 + 0 \cdot 1 \cdot 1$. Anti-diagonals: $0 \cdot 3 \cdot 0 + 2 \cdot 1 \cdot 1 + 1 \cdot 1 \cdot 2$.', 'Hauptdiagonalen: $2 \cdot 3 \cdot 2 + 1 \cdot 1 \cdot 0 + 0 \cdot 1 \cdot 1$. Nebendiagonalen: $0 \cdot 3 \cdot 0 + 2 \cdot 1 \cdot 1 + 1 \cdot 1 \cdot 2$.'],
                    ['almost', 'The main diagonals give $12$, the anti-diagonals $4$.', 'Die Hauptdiagonalen ergeben $12$, die Nebendiagonalen $4$.'],
                ],
            ],
            [
                'slug' => 'three-heads',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Hard,
                'answer_type' => AnswerType::Fraction,
                'answer' => ['value' => '5/16'],
                'en' => [
                    'title' => 'Three Heads',
                    'prompt' => 'A fair coin is tossed five times.'."\n\n".'What is the probability of getting heads **exactly three times**? Give the result as a reduced fraction.',
                    'placeholder' => 'e.g. 3/8',
                    'solution' => '$$P(X = 3) = \binom{5}{3} \cdot \left(\frac{1}{2}\right)^3 \cdot \left(\frac{1}{2}\right)^2 = 10 \cdot \frac{1}{32} = \frac{5}{16}$$',
                    'background' => 'The binomial coefficient $\binom{n}{k} = \frac{n!}{k!\,(n-k)!}$ counts the number of ways to distribute $k$ successes among $n$ trials.',
                ],
                'de' => [
                    'title' => 'Dreimal Kopf',
                    'prompt' => 'Eine faire Münze wird fünfmal geworfen.'."\n\n".'Wie groß ist die Wahrscheinlichkeit, dass **genau dreimal** Kopf fällt? Gib das Ergebnis als gekürzten Bruch an.',
                    'placeholder' => 'z. B. 3/8',
                    'solution' => '$$P(X = 3) = \binom{5}{3} \cdot \left(\frac{1}{2}\right)^3 \cdot \left(\frac{1}{2}\right)^2 = 10 \cdot \frac{1}{32} = \frac{5}{16}$$',
                    'background' => 'Der Binomialkoeffizient $\binom{n}{k} = \frac{n!}{k!\,(n-k)!}$ zählt, auf wie viele Arten man $k$ Treffer auf $n$ Versuche verteilen kann.',
                ],
                'hints' => [
                    ['nudge', 'The order of the tosses doesn\'t matter – only how often heads comes up.', 'Die Reihenfolge der Würfe spielt keine Rolle – es zählt nur, wie oft Kopf fällt.'],
                    ['approach', 'Binomial distribution: $P(X = k) = \binom{n}{k} p^k (1 - p)^{n - k}$ with $n = 5$, $k = 3$, $p = \frac{1}{2}$.', 'Binomialverteilung: $P(X = k) = \binom{n}{k} p^k (1 - p)^{n - k}$ mit $n = 5$, $k = 3$, $p = \frac{1}{2}$.'],
                    ['help', 'There are $\binom{5}{3} = 10$ ways to distribute the three heads, and $2^5 = 32$ equally likely outcomes in total.', 'Es gibt $\binom{5}{3} = 10$ Möglichkeiten, die drei Kopf-Würfe zu verteilen, und insgesamt $2^5 = 32$ gleich wahrscheinliche Ausgänge.'],
                    ['almost', '$P = \frac{10}{32}$ – now reduce it.', '$P = \frac{10}{32}$ – jetzt noch kürzen.'],
                ],
            ],
            [
                'slug' => 'a-famous-limit',
                'topic' => Topic::Advanced,
                'difficulty' => Difficulty::Hard,
                'answer_type' => AnswerType::Numeric,
                'answer' => ['value' => 'e^2', 'tolerance' => 0.01],
                'en' => [
                    'title' => 'Growing Without End',
                    'prompt' => 'Find the limit'."\n\n".'$$\lim_{n \to \infty} \left(1 + \frac{2}{n}\right)^n$$'."\n\n".'Give the value rounded to two decimal places.',
                    'placeholder' => 'e.g. 2.72',
                    'solution' => '$$\lim_{n \to \infty} \left(1 + \frac{2}{n}\right)^n = e^2 \approx 7.39$$'."\n\n".'Reasoning: with $m = \frac{n}{2}$ we get $\left(1 + \frac{2}{n}\right)^n = \left[\left(1 + \frac{1}{m}\right)^m\right]^2 \to e^2$.',
                    'background' => 'This limit describes continuous growth, e.g. interest that is credited infinitely often per year.',
                ],
                'de' => [
                    'title' => 'Wachstum ohne Ende',
                    'prompt' => 'Bestimme den Grenzwert'."\n\n".'$$\lim_{n \to \infty} \left(1 + \frac{2}{n}\right)^n$$'."\n\n".'Gib den Wert auf zwei Nachkommastellen gerundet an.',
                    'placeholder' => 'z. B. 2,72',
                    'solution' => '$$\lim_{n \to \infty} \left(1 + \frac{2}{n}\right)^n = e^2 \approx 7{,}39$$'."\n\n".'Begründung: Mit $m = \frac{n}{2}$ ist $\left(1 + \frac{2}{n}\right)^n = \left[\left(1 + \frac{1}{m}\right)^m\right]^2 \to e^2$.',
                    'background' => 'Dieser Grenzwert beschreibt stetiges Wachstum, z. B. Zinsen, die unendlich oft im Jahr gutgeschrieben werden.',
                ],
                'hints' => [
                    ['nudge', 'The expression is reminiscent of the definition of a very important constant.', 'Der Ausdruck erinnert an die Definition einer sehr wichtigen Konstante.'],
                    ['approach', 'We know $\lim_{n \to \infty} \left(1 + \frac{1}{n}\right)^n = e \approx 2.71828$.', 'Es gilt $\lim_{n \to \infty} \left(1 + \frac{1}{n}\right)^n = e \approx 2{,}71828$.'],
                    ['help', 'More generally, $\lim_{n \to \infty} \left(1 + \frac{x}{n}\right)^n = e^x$.', 'Allgemeiner gilt $\lim_{n \to \infty} \left(1 + \frac{x}{n}\right)^n = e^x$.'],
                    ['almost', 'With $x = 2$, the limit is $e^2 = e \cdot e$.', 'Mit $x = 2$ ist der Grenzwert $e^2 = e \cdot e$.'],
                ],
            ],
        ];
    }
}
