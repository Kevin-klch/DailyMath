<?php

namespace Tests\Feature;

use App\Enums\AnswerType;
use App\Enums\Difficulty;
use App\Http\Middleware\EnsureAdmin;
use App\Models\DailyChallenge;
use App\Models\Question;
use App\Services\DailyChallengeService;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config(['dailymath.admin_password' => 'geheim-123']);
        $this->travelTo(CarbonImmutable::parse('2026-11-20 12:00', 'Europe/Berlin'));
    }

    private function admin(): static
    {
        return $this->withSession([EnsureAdmin::SESSION_KEY => true]);
    }

    /**
     * @return array<string, mixed>
     */
    private function validForm(array $overrides = []): array
    {
        return array_replace_recursive([
            'slug' => '',
            'topic' => 'fractions',
            'difficulty' => 1,
            'answer_type' => 'fraction',
            'is_active' => '1',
            'en' => ['title' => 'Half of a Third', 'prompt' => 'Calculate $$\frac12 \cdot \frac13$$', 'solution' => '$\frac16$', 'background' => '', 'placeholder' => 'e.g. 1/4'],
            'de' => ['title' => 'Die Hälfte eines Drittels', 'prompt' => 'Berechne $$\frac12 \cdot \frac13$$', 'solution' => '$\frac16$', 'background' => '', 'placeholder' => 'z. B. 1/4'],
            'answer' => ['value' => '1/6', 'tolerance' => '', 'values' => '', 'pairs' => '', 'options' => '', 'choice' => ''],
            'unit' => '',
            'learn' => ['multiplying-fractions', 'fractions-basics'],
            'hints' => [
                ['stage' => 'nudge', 'en' => 'Multiply numerators and denominators.', 'de' => 'Zähler mal Zähler, Nenner mal Nenner.'],
                ['stage' => 'almost', 'en' => '$\frac{1 \cdot 1}{2 \cdot 3}$', 'de' => ''],
                ['stage' => 'help', 'en' => '', 'de' => ''], // leere Zeile wird ignoriert
            ],
        ], $overrides);
    }

    #[Test]
    public function the_admin_area_is_disabled_without_a_password(): void
    {
        config(['dailymath.admin_password' => null]);

        $this->get('/admin/login')->assertNotFound();
        $this->admin()->get('/admin')->assertNotFound();
    }

    #[Test]
    public function guests_are_sent_to_the_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
        $this->post('/admin/questions', $this->validForm())->assertRedirect('/admin/login');
        $this->assertSame(0, Question::count());
    }

    #[Test]
    public function the_correct_password_logs_in(): void
    {
        $this->post('/admin/login', ['password' => 'falsch'])->assertSessionHasErrors('password');

        $this->post('/admin/login', ['password' => 'geheim-123'])
            ->assertRedirect('/admin')
            ->assertSessionHas(EnsureAdmin::SESSION_KEY, true);

        $this->get('/admin')->assertOk()->assertSee('Übersicht');
    }

    #[Test]
    public function a_question_can_be_created_with_translations_and_hints(): void
    {
        $this->admin()->post('/admin/questions', $this->validForm())->assertSessionHasNoErrors()->assertRedirect();

        $question = Question::with('hints')->sole();
        $this->assertSame('half-of-a-third', $question->slug);
        $this->assertSame('Half of a Third', $question->title);
        $this->assertSame(AnswerType::Fraction, $question->answer_type);
        $this->assertSame(['value' => '1/6'], $question->answer);
        $this->assertSame(['placeholder' => 'e.g. 1/4'], $question->answer_meta);
        $this->assertSame('Die Hälfte eines Drittels', $question->translations['de']['title']);
        $this->assertSame(['placeholder' => 'z. B. 1/4'], $question->translations['de']['answer_meta']);

        $this->assertSame(['multiplying-fractions', 'fractions-basics'], $question->learn_topics);

        $this->assertCount(2, $question->hints);
        $this->assertSame('Nudge', $question->hints[0]->label);
        $this->assertSame('Denkanstoß', $question->hints[0]->translations['de']['label']);
        $this->assertSame('Almost the full solution', $question->hints[1]->label);
        $this->assertArrayNotHasKey('content', $question->hints[1]->translations['de']); // ohne Übersetzung → Englisch
    }

    #[Test]
    public function unreadable_or_inconsistent_answers_are_rejected(): void
    {
        $this->admin()->post('/admin/questions', $this->validForm(['answer' => ['value' => 'ein Sechstel']]))
            ->assertSessionHasErrors('answer.value');

        $this->admin()->post('/admin/questions', $this->validForm(['answer' => ['value' => 'pi']]))
            ->assertSessionHasErrors('answer.value'); // Bruch muss exakt rational sein

        $this->admin()->post('/admin/questions', $this->validForm([
            'answer_type' => 'multiple_choice',
            'answer' => ['options' => "a | eins\nb | zwei", 'choice' => 'c'],
        ]))->assertSessionHasErrors('answer.choice');

        $this->admin()->post('/admin/questions', $this->validForm(['en' => ['title' => '']]))
            ->assertSessionHasErrors('en.title');

        $this->admin()->post('/admin/questions', $this->validForm(['learn' => ['no-such-article']]))
            ->assertSessionHasErrors('learn.0');

        $this->assertSame(0, Question::count());
    }

    #[Test]
    public function every_answer_type_is_stored_in_the_format_the_checkers_expect(): void
    {
        $this->admin()->post('/admin/questions', $this->validForm([
            'slug' => 'roots', 'answer_type' => 'solution_set', 'answer' => ['values' => '2; 3'],
        ]))->assertSessionHasNoErrors();
        $this->admin()->post('/admin/questions', $this->validForm([
            'slug' => 'system', 'answer_type' => 'multi_value', 'answer' => ['pairs' => "x = 3\ny = 1"],
        ]))->assertSessionHasNoErrors();
        $this->admin()->post('/admin/questions', $this->validForm([
            'slug' => 'circle', 'answer_type' => 'numeric', 'answer' => ['value' => '25pi', 'tolerance' => '0,01'], 'unit' => 'cm²',
        ]))->assertSessionHasNoErrors();

        $this->assertSame(['values' => ['2', '3']], Question::firstWhere('slug', 'roots')->answer);

        $system = Question::firstWhere('slug', 'system');
        $this->assertSame(['values' => ['x' => '3', 'y' => '1']], $system->answer);
        $this->assertSame(['x', 'y'], $system->answer_meta['variables']);
        $this->assertTrue($system->check(['x' => '3', 'y' => '1'])->status->value === 'correct');

        $circle = Question::firstWhere('slug', 'circle');
        $this->assertSame(['value' => '25pi', 'tolerance' => 0.01], $circle->answer);
        $this->assertSame('cm²', $circle->answer_meta['unit']);
        $this->assertSame('correct', $circle->check('78,54')->status->value);
    }

    #[Test]
    public function the_edit_form_round_trips_an_existing_question(): void
    {
        $this->admin()->post('/admin/questions', $this->validForm());
        $question = Question::sole();

        $this->admin()->get("/admin/questions/{$question->id}/edit")
            ->assertOk()
            ->assertViewHas('form', fn (array $form) => $form['de']['title'] === 'Die Hälfte eines Drittels'
                && $form['answer']['value'] === '1/6'
                && $form['hints'][0]['stage'] === 'nudge'
                && $form['de']['placeholder'] === 'z. B. 1/4');

        $form = $this->validForm(['slug' => 'half-of-a-third', 'en' => ['title' => 'Half a Third']]);
        $form['hints'] = [['stage' => 'approach', 'en' => 'Only one hint now', 'de' => 'Nur noch ein Hinweis']];

        $this->admin()->put("/admin/questions/{$question->id}", $form)->assertSessionHasNoErrors();

        $question->refresh()->load('hints');
        $this->assertSame('Half a Third', $question->title);
        $this->assertCount(1, $question->hints);
        $this->assertSame('Approach', $question->hints[0]->label);
    }

    #[Test]
    public function the_answer_can_be_tested_and_texts_previewed(): void
    {
        $this->admin()->postJson('/admin/tools/check', ['answer_type' => 'fraction', 'answer' => ['value' => '7/12'], 'input' => '14/24'])
            ->assertJsonPath('status', 'correct');
        $this->admin()->postJson('/admin/tools/check', ['answer_type' => 'fraction', 'answer' => ['value' => '7/12'], 'input' => '0,58'])
            ->assertJsonPath('status', 'incorrect');

        $this->admin()->postJson('/admin/tools/preview', ['texts' => ["Berechne **schnell**\n\n\$x^2\$", null]])
            ->assertJsonPath('html.0', "<p>Berechne <strong>schnell</strong></p>\n<p>\$x^2\$</p>")
            ->assertJsonPath('html.1', '');
    }

    #[Test]
    public function only_future_days_can_be_rescheduled(): void
    {
        $daily = app(DailyChallengeService::class);
        [$a, $b] = Question::factory()->count(2)->create(['difficulty' => Difficulty::Easy]);
        $hard = Question::factory()->create(['difficulty' => Difficulty::Hard]);

        $today = $daily->current(Difficulty::Easy);
        $tomorrow = $daily->forDate($daily->today()->addDay(), Difficulty::Easy);
        $other = $tomorrow->question_id === $a->id ? $b : $a;

        $this->admin()->patch("/admin/schedule/{$today->id}", ['question_id' => $other->id])->assertSessionHas('error');
        $this->admin()->patch("/admin/schedule/{$tomorrow->id}", ['question_id' => $hard->id])->assertSessionHas('error');

        $this->admin()->patch("/admin/schedule/{$tomorrow->id}", ['question_id' => $other->id])->assertSessionHas('status');
        $this->assertSame($other->id, $tomorrow->refresh()->question_id);

        $this->admin()->delete("/admin/schedule/{$tomorrow->id}")->assertSessionHas('status');
        $this->assertNull(DailyChallenge::find($tomorrow->id));
        $this->assertNotNull(DailyChallenge::find($today->id));
    }

    #[Test]
    public function used_questions_can_only_be_deactivated_not_deleted(): void
    {
        $used = Question::factory()->create();
        $unused = Question::factory()->create();
        app(DailyChallengeService::class)->current(Difficulty::Easy); // plant eine der beiden ein
        $used = DailyChallenge::sole()->question;
        $unused = Question::whereKeyNot($used->id)->sole();

        $this->admin()->delete("/admin/questions/{$used->id}")->assertSessionHas('error');
        $this->assertModelExists($used);

        $this->admin()->patch("/admin/questions/{$used->id}/toggle");
        $this->assertFalse($used->refresh()->is_active);

        $this->admin()->delete("/admin/questions/{$unused->id}")->assertRedirect('/admin/questions');
        $this->assertModelMissing($unused);
    }

    #[Test]
    public function the_overview_and_list_pages_render(): void
    {
        Question::factory()->withHints(2)->create(['title' => 'Listed Question']);
        app(DailyChallengeService::class)->plan(3);

        $this->admin()->get('/admin')->assertOk()->assertSee('Planung')->assertSee('Listed Question');
        $this->admin()->get('/admin/questions')->assertOk()->assertSee('Listed Question');
        $this->admin()->get('/admin/questions?difficulty=3')->assertOk()->assertDontSee('Listed Question');
        $this->admin()->get('/admin/questions/create')->assertOk();
    }
}
