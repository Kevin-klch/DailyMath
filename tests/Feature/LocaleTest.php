<?php

namespace Tests\Feature;

use App\Models\Question;
use Carbon\CarbonImmutable;
use Database\Seeders\QuestionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LocaleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->travelTo(CarbonImmutable::parse('2026-11-20 12:00', 'Europe/Berlin'));
        Question::factory()->create(['answer' => ['value' => '7/12']]);
    }

    #[Test]
    public function the_page_is_english_by_default(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('<html lang="en">', false)
            ->assertSee('Three new math puzzles every day')
            ->assertSee('Friday, November 20, 2026');
    }

    #[Test]
    public function the_language_can_be_switched_to_german(): void
    {
        $this->from('/mittel')
            ->post('/locale', ['locale' => 'de'])
            ->assertRedirect('/mittel')
            ->assertCookie(config('dailymath.locale_cookie'), 'de');

        $this->withCookie(config('dailymath.locale_cookie'), 'de')
            ->get('/')
            ->assertOk()
            ->assertSee('<html lang="de">', false)
            ->assertSee('Jeden Tag drei neue Matheaufgaben')
            ->assertSee('Freitag, 20. November 2026');
    }

    #[Test]
    public function answer_feedback_is_translated(): void
    {
        $this->postJson('/challenge/leicht/answer', ['answer' => 'no idea'])
            ->assertJsonPath('check.message', 'Please enter a simplified result, e.g. 3, -2.5, 7/12, 25π or 3√2 – no calculations.')
            ->assertJsonPath('challenge.difficulty.label', 'Easy');

        $this->withCredentials()->withCookie(config('dailymath.locale_cookie'), 'de')
            ->postJson('/challenge/leicht/answer', ['answer' => 'keine Ahnung'])
            ->assertJsonPath('check.message', 'Bitte gib ein vereinfachtes Ergebnis ein, z. B. 3, -2,5, 7/12, 25π oder 3√2 – keine Rechnung.')
            ->assertJsonPath('challenge.difficulty.label', 'Leicht');
    }

    #[Test]
    public function puzzle_content_is_translated_with_fallback_to_english(): void
    {
        $question = Question::first();
        $question->update([
            'title' => 'Two Fractions',
            'answer_meta' => ['placeholder' => 'e.g. 5/8', 'unit' => 'cm'],
            'translations' => ['de' => ['title' => 'Zwei Brüche', 'answer_meta' => ['placeholder' => 'z. B. 5/8']]],
        ]);
        $question->hints()->create(['position' => 1, 'label' => 'Nudge', 'content' => 'Think!', 'translations' => ['de' => ['label' => 'Denkanstoß', 'content' => 'Denk nach!']]]);

        $visitor = config('dailymath.visitor_cookie');
        $id = '0b6a8f2e-4c1d-4a7e-9f3b-2d5c8e1a7b40';

        $this->withCredentials()->withCookie($visitor, $id)
            ->postJson('/challenge/leicht/hint')
            ->assertJsonPath('challenge.title', 'Two Fractions')
            ->assertJsonPath('challenge.placeholder', 'e.g. 5/8')
            ->assertJsonPath('hints.0.label', 'Nudge');

        $this->withCredentials()->withCookie(config('dailymath.locale_cookie'), 'de')
            ->getJson('/challenge/leicht')
            ->assertJsonPath('challenge.title', 'Zwei Brüche')
            ->assertJsonPath('challenge.placeholder', 'z. B. 5/8')
            ->assertJsonPath('challenge.unit', 'cm') // nicht übersetzt → Grundsprache
            ->assertJsonPath('challenge.prompt', fn ($prompt) => $prompt !== '') // ohne Übersetzung → Englisch
            ->assertJsonPath('hints.0.label', 'Denkanstoß');
    }

    #[Test]
    public function the_seeder_provides_every_puzzle_in_both_languages(): void
    {
        Question::query()->delete();

        $this->seed(QuestionSeeder::class);
        $this->seed(QuestionSeeder::class); // idempotent

        $questions = Question::with('hints')->get();
        $this->assertCount(count((new QuestionSeeder)->all()), $questions);

        foreach ($questions as $question) {
            foreach (['title', 'prompt', 'solution', 'background'] as $field) {
                $this->assertNotEmpty($question->translations['de'][$field] ?? null, "{$question->slug}: {$field} fehlt auf Deutsch");
            }
            $this->assertNotSame($question->title, $question->translations['de']['title'], "{$question->slug}: Titel ist nicht übersetzt");

            foreach ($question->hints as $hint) {
                $this->assertNotEmpty($hint->translations['de']['content'] ?? null, "{$question->slug}: Hinweis {$hint->position} fehlt auf Deutsch");
            }
        }
    }

    #[Test]
    public function the_seeder_keeps_existing_german_puzzles_and_their_ids(): void
    {
        $old = Question::factory()->create(['title' => 'Die Hypotenuse', 'slug' => null]);

        $this->seed(QuestionSeeder::class);

        $old->refresh();
        $this->assertSame('the-hypotenuse', $old->slug);
        $this->assertSame('The Hypotenuse', $old->title);
        $this->assertSame('Die Hypotenuse', $old->translations['de']['title']);
    }

    #[Test]
    public function unknown_languages_are_rejected(): void
    {
        $this->post('/locale', ['locale' => 'xx'])->assertSessionHasErrors('locale');

        $this->withCookie(config('dailymath.locale_cookie'), 'xx')
            ->get('/')
            ->assertSee('<html lang="en">', false);
    }

    #[Test]
    public function every_translatable_string_has_a_german_translation(): void
    {
        $german = json_decode(File::get(lang_path('de.json')), true, flags: JSON_THROW_ON_ERROR);
        $missing = [];

        $files = [...File::allFiles(app_path()), ...File::allFiles(resource_path('views'))];
        foreach ($files as $file) {
            preg_match_all('/(?:__|trans_choice)\((\'|")((?:(?!\1)[^\\\\]|\\\\.)+)\1/', $file->getContents(), $matches);
            foreach ($matches[2] as $key) {
                $key = stripslashes($key);
                if (! array_key_exists($key, $german)) {
                    $missing[] = $key.' ('.$file->getFilename().')';
                }
            }
        }

        $this->assertSame([], array_values(array_unique($missing)));
    }
}
