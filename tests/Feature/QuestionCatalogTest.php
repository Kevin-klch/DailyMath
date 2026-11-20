<?php

namespace Tests\Feature;

use App\Enums\AnswerType;
use App\Enums\CheckStatus;
use App\Enums\Difficulty;
use App\Enums\HintStage;
use App\Math\ExpressionParser;
use Database\Seeders\QuestionSeeder;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Qualitätsprüfung des Aufgabenbestands im Seeder – ohne Datenbank.
 */
class QuestionCatalogTest extends TestCase
{
    /**
     * @return list<array<string, mixed>>
     */
    private function catalog(): array
    {
        return (new QuestionSeeder)->all();
    }

    #[Test]
    public function every_level_has_enough_puzzles(): void
    {
        $counts = collect($this->catalog())->countBy(fn ($q) => $q['difficulty']->value);

        foreach (Difficulty::cases() as $difficulty) {
            $this->assertGreaterThanOrEqual(20, $counts[$difficulty->value] ?? 0, "Zu wenige Aufgaben für {$difficulty->name}");
        }
    }

    #[Test]
    public function slugs_and_titles_are_unique(): void
    {
        $catalog = collect($this->catalog());

        foreach (['slug' => fn ($q) => $q['slug'], 'en' => fn ($q) => $q['en']['title'], 'de' => fn ($q) => $q['de']['title']] as $what => $key) {
            $duplicates = $catalog->map($key)->duplicates();
            $this->assertTrue($duplicates->isEmpty(), "Doppelt ({$what}): ".$duplicates->implode(', '));
        }
    }

    #[Test]
    public function every_puzzle_is_complete_in_both_languages(): void
    {
        foreach ($this->catalog() as $q) {
            foreach (['en', 'de'] as $locale) {
                foreach (['title', 'prompt', 'solution'] as $field) {
                    $this->assertNotEmpty($q[$locale][$field] ?? null, "{$q['slug']}: {$locale}.{$field} fehlt");
                }
                $this->assertSame(substr_count($q[$locale]['prompt'], '$') % 2, 0, "{$q['slug']}: ungerade Anzahl \$ im {$locale}-Text");
            }

            $this->assertGreaterThanOrEqual(3, count($q['hints']), "{$q['slug']}: zu wenige Hinweise");
            $this->assertLessThanOrEqual(4, count($q['hints']));
            foreach ($q['hints'] as [$stage, $en, $de]) {
                $this->assertNotNull(HintStage::tryFrom($stage), "{$q['slug']}: unbekannte Hinweisstufe {$stage}");
                $this->assertNotEmpty($en);
                $this->assertNotEmpty($de, "{$q['slug']}: Hinweis ohne deutsche Übersetzung");
            }
        }
    }

    #[Test]
    public function the_stored_solution_is_accepted_when_typed_in_like_a_player(): void
    {
        $parser = app(ExpressionParser::class);

        foreach ($this->catalog() as $q) {
            $type = $q['answer_type'];
            $answer = $q['answer'];
            $meta = $q['answer_meta'] ?? [];

            $input = match ($type) {
                AnswerType::Numeric, AnswerType::Fraction => $answer['value'],
                AnswerType::SolutionSet => implode('; ', array_reverse($answer['values'])), // Reihenfolge egal
                AnswerType::MultiValue => $answer['values'],
                AnswerType::MultipleChoice => $answer['choice'],
            };

            $result = $type->checker()->check($input, $answer, $meta);

            // Ausdrücke wie „16-4pi“ oder „e^2“ darf ein Spieler nicht eintippen – dann gerundet als Dezimalzahl
            if ($result->status === CheckStatus::Invalid && isset($answer['tolerance'])) {
                $input = number_format((float) (string) $parser->parse($answer['value']), 2, '.', '');
                $result = $type->checker()->check($input, $answer, $meta);
            }

            $this->assertSame(CheckStatus::Correct, $result->status, "{$q['slug']}: Eingabe ".json_encode($input).' wird nicht akzeptiert ('.$result->message.')');
        }
    }

    #[Test]
    public function every_puzzle_links_to_existing_learn_articles(): void
    {
        $articles = glob(resource_path('learn/en').'/*.md');
        $slugs = array_map(fn ($f) => basename($f, '.md'), $articles);

        foreach ($this->catalog() as $q) {
            $this->assertNotEmpty($q['learn'], "{$q['slug']}: keine Lernartikel verknüpft");
            foreach ($q['learn'] as $article) {
                $this->assertContains($article, $slugs, "{$q['slug']}: Lernartikel „{$article}“ existiert nicht");
            }
        }
    }

    #[Test]
    public function multiple_choice_answers_point_to_an_existing_option(): void
    {
        foreach ($this->catalog() as $q) {
            if ($q['answer_type'] === AnswerType::MultipleChoice) {
                $this->assertArrayHasKey($q['answer']['choice'], $q['answer_meta']['options'], $q['slug']);
            }
        }
    }
}
