<?php

namespace Tests\Feature;

use App\Enums\AttemptStatus;
use App\Enums\Difficulty;
use App\Models\ChallengeAttempt;
use App\Models\DailyChallenge;
use App\Models\Question;
use App\Services\DailyChallengeService;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PlayChallengeTest extends TestCase
{
    use RefreshDatabase;

    private const VISITOR = '0b6a8f2e-4c1d-4a7e-9f3b-2d5c8e1a7b40';

    protected function setUp(): void
    {
        parent::setUp();

        $this->travelTo(CarbonImmutable::parse('2026-11-20 12:00', 'Europe/Berlin'));
        Question::factory()->withHints(3)->create([
            'prompt' => 'Berechne $$ 1/3 + 1/4 $$',
            'answer' => ['value' => '7/12'],
            'solution' => 'GEHEIME-MUSTERLOESUNG',
        ]);
    }

    private function visitor(): static
    {
        return $this->withCredentials()->withCookie(config('dailymath.visitor_cookie'), self::VISITOR);
    }

    #[Test]
    public function the_page_shows_the_challenge_without_leaking_the_solution(): void
    {
        $this->visitor()->get('/')
            ->assertOk()
            ->assertSee('#1')
            ->assertDontSee('GEHEIME-MUSTERLOESUNG')
            ->assertDontSee('Inhalt von Hinweis 1');
    }

    #[Test]
    public function only_the_start_page_shows_the_intro_screen(): void
    {
        $this->visitor()->get('/')->assertOk()->assertSee('intro-title');
        $this->visitor()->get('/leicht')->assertOk()->assertDontSee('intro-title');
    }

    #[Test]
    public function a_visitor_id_cookie_is_issued(): void
    {
        $this->get('/')->assertCookie(config('dailymath.visitor_cookie'));
    }

    #[Test]
    public function hints_are_revealed_one_by_one(): void
    {
        $this->visitor()->postJson('/challenge/leicht/hint')
            ->assertOk()
            ->assertJsonCount(1, 'hints')
            ->assertJsonPath('hints.0.label', 'Hinweis 1');

        $this->visitor()->postJson('/challenge/leicht/hint');
        $this->visitor()->postJson('/challenge/leicht/hint');

        // Mehr als vorhanden geht nicht
        $this->visitor()->postJson('/challenge/leicht/hint')
            ->assertJsonCount(3, 'hints')
            ->assertJsonPath('attempt.hints_used', 3)
            ->assertJsonPath('result', null);
    }

    #[Test]
    public function wrong_answers_count_as_attempts_but_invalid_input_does_not(): void
    {
        $this->visitor()->postJson('/challenge/leicht/answer', ['answer' => 'keine Ahnung'])
            ->assertJsonPath('check.status', 'invalid')
            ->assertJsonPath('attempt.attempts', 0);

        $this->visitor()->postJson('/challenge/leicht/answer', ['answer' => '2/7'])
            ->assertJsonPath('check.status', 'incorrect')
            ->assertJsonPath('attempt.attempts', 1)
            ->assertJsonPath('result', null)
            ->assertJsonMissingPath('result.solution');
    }

    #[Test]
    public function a_correct_answer_finishes_the_challenge_and_reveals_the_solution(): void
    {
        $this->visitor()->postJson('/challenge/leicht/hint');

        $response = $this->visitor()->postJson('/challenge/leicht/answer', ['answer' => '14/24'])
            ->assertJsonPath('check.status', 'correct')
            ->assertJsonPath('attempt.status', 'solved')
            ->assertJsonPath('result.solved', true)
            ->assertJsonPath('stats.current_streak', 1)
            ->assertJsonCount(3, 'hints'); // nach Abschluss alle sichtbar

        $this->assertStringContainsString('GEHEIME-MUSTERLOESUNG', $response->json('result.solution'));
        $this->assertStringContainsString('DailyMath #1', $response->json('result.share_text'));
        $this->assertStringNotContainsString('7/12', $response->json('result.share_text'));

        // Weitere Antworten ändern nichts mehr
        $this->visitor()->postJson('/challenge/leicht/answer', ['answer' => '1'])
            ->assertJsonPath('attempt.attempts', 1)
            ->assertJsonPath('attempt.status', 'solved');
    }

    #[Test]
    public function giving_up_reveals_the_solution_without_counting_as_solved(): void
    {
        $this->visitor()->postJson('/challenge/leicht/give-up')
            ->assertJsonPath('attempt.status', 'given_up')
            ->assertJsonPath('result.solved', false)
            ->assertJsonPath('stats.current_streak', 0);
    }

    #[Test]
    public function visitors_do_not_share_progress(): void
    {
        $this->visitor()->postJson('/challenge/leicht/answer', ['answer' => '7/12']);

        $this->withCredentials()->withCookie(config('dailymath.visitor_cookie'), 'ffffffff-4c1d-4a7e-9f3b-2d5c8e1a7b40')
            ->postJson('/challenge/leicht/hint')
            ->assertJsonPath('attempt.status', 'in_progress');
    }

    #[Test]
    public function the_streak_counts_consecutive_solved_days(): void
    {
        $daily = app(DailyChallengeService::class);
        Question::factory()->count(4)->create();

        // Gelöst am 16., 18. und 19. November; heute (20.) noch offen
        foreach (['2026-11-16', '2026-11-18', '2026-11-19'] as $date) {
            $challenge = $daily->forDate(CarbonImmutable::parse($date), Difficulty::Easy);
            ChallengeAttempt::create([
                'daily_challenge_id' => $challenge->id,
                'visitor_id' => self::VISITOR,
                'status' => AttemptStatus::Solved,
                'attempts' => 1,
                'started_at' => now()->subMinutes(3),
                'finished_at' => now(),
            ]);
        }

        $this->visitor()->postJson('/challenge/leicht/hint')
            ->assertJsonPath('stats.current_streak', 2)
            ->assertJsonPath('stats.best_streak', 2)
            ->assertJsonPath('stats.solved', 3)
            ->assertJsonPath('stats.average_seconds', 180);

        $this->assertSame(4, DailyChallenge::count());
    }

    private function createMediumAndHard(): void
    {
        Question::factory()->create(['difficulty' => Difficulty::Medium, 'title' => 'Mittlere Aufgabe', 'answer' => ['value' => '20']]);
        Question::factory()->create(['difficulty' => Difficulty::Hard, 'title' => 'Schwere Aufgabe', 'answer' => ['value' => '30']]);
    }

    #[Test]
    public function each_level_has_its_own_page(): void
    {
        $this->createMediumAndHard();

        $this->visitor()->get('/mittel')->assertOk()->assertSee('Mittlere Aufgabe');
        $this->visitor()->get('/schwer')->assertOk()->assertSee('Schwere Aufgabe');
        $this->visitor()->get('/unbekannt')->assertNotFound();
    }

    #[Test]
    public function the_state_of_a_level_can_be_loaded_as_json(): void
    {
        $this->createMediumAndHard();

        $this->visitor()->getJson('/challenge/schwer')
            ->assertOk()
            ->assertJsonPath('challenge.title', 'Schwere Aufgabe')
            ->assertJsonPath('challenge.level', 'schwer')
            ->assertJsonPath('levels.2.current', true)
            ->assertJsonPath('result', null);
    }

    #[Test]
    public function levels_are_played_independently(): void
    {
        $this->createMediumAndHard();

        $this->visitor()->postJson('/challenge/leicht/answer', ['answer' => '7/12'])
            ->assertJsonPath('attempt.status', 'solved')
            ->assertJsonPath('levels.0.status', 'solved')
            ->assertJsonPath('levels.1.status', null);

        $this->visitor()->postJson('/challenge/mittel/answer', ['answer' => '7/12'])
            ->assertJsonPath('check.status', 'incorrect')
            ->assertJsonPath('attempt.status', 'in_progress')
            ->assertJsonPath('levels.1.current', true);
    }

    #[Test]
    public function the_start_page_opens_the_first_unfinished_level(): void
    {
        $this->createMediumAndHard();
        $this->visitor()->postJson('/challenge/leicht/answer', ['answer' => '7/12']);

        $this->visitor()->get('/')->assertOk()->assertSee('Mittlere Aufgabe');
    }

    #[Test]
    public function the_share_text_summarizes_all_levels_of_the_day(): void
    {
        $this->createMediumAndHard();
        $this->visitor()->postJson('/challenge/mittel/answer', ['answer' => '1']);
        $this->visitor()->postJson('/challenge/mittel/answer', ['answer' => '20']);

        $share = $this->visitor()->postJson('/challenge/leicht/give-up')->json('result.share_text');

        $this->assertStringContainsString('🟢 Leicht', $share);
        $this->assertStringContainsString('🟡 Mittel 🟥🟧', $share);
        $this->assertStringContainsString('🔴 Schwer ⬜ offen', $share);
        $this->assertStringContainsString('🔥 1 Tag Serie', $share); // ein gelöstes Niveau reicht für die Serie
    }
}
