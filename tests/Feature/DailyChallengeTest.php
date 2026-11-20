<?php

namespace Tests\Feature;

use App\Enums\Difficulty;
use App\Models\DailyChallenge;
use App\Models\Question;
use App\Services\DailyChallengeService;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DailyChallengeTest extends TestCase
{
    use RefreshDatabase;

    private DailyChallengeService $daily;

    protected function setUp(): void
    {
        parent::setUp();
        $this->daily = app(DailyChallengeService::class);
    }

    private function createPool(int $perDifficulty = 3): void
    {
        foreach (Difficulty::cases() as $difficulty) {
            Question::factory()->count($perDifficulty)->create(['difficulty' => $difficulty]);
        }
    }

    #[Test]
    public function every_day_has_one_challenge_per_difficulty(): void
    {
        $this->createPool();

        $day = $this->daily->currentDay();

        $this->assertSame([1, 2, 3], array_keys($day));
        foreach ($day as $level => $challenge) {
            $this->assertSame($level, $challenge->difficulty->value);
            $this->assertSame($level, $challenge->question->difficulty->value);
            $this->assertSame(1, $challenge->number);
        }
    }

    #[Test]
    public function the_challenges_stay_the_same_throughout_the_day(): void
    {
        $this->createPool();
        $this->travelTo(CarbonImmutable::parse('2026-11-20 08:00', 'Europe/Berlin'));

        $first = $this->daily->current(Difficulty::Medium);
        $this->travelTo(CarbonImmutable::parse('2026-11-20 23:59', 'Europe/Berlin'));
        $second = $this->daily->current(Difficulty::Medium);

        $this->assertTrue($first->is($second));
        $this->assertSame(1, DailyChallenge::count());
    }

    #[Test]
    public function the_challenges_change_at_midnight_german_time(): void
    {
        $this->createPool();

        // 23:30 UTC ist in Berlin (MEZ) bereits 00:30 des Folgetags.
        $this->travelTo(CarbonImmutable::parse('2026-11-20 22:30', 'UTC'));
        $today = $this->daily->current(Difficulty::Easy);
        $this->travelTo(CarbonImmutable::parse('2026-11-20 23:30', 'UTC'));
        $tomorrow = $this->daily->current(Difficulty::Easy);

        $this->assertSame('2026-11-20', $today->challenge_date->toDateString());
        $this->assertSame('2026-11-21', $tomorrow->challenge_date->toDateString());
        $this->assertSame(2, $tomorrow->number);
        $this->assertNotSame($today->question_id, $tomorrow->question_id);
    }

    #[Test]
    public function unused_questions_are_preferred_and_inactive_ones_are_skipped(): void
    {
        Question::factory()->count(3)->create(['difficulty' => Difficulty::Easy]);
        Question::factory()->inactive()->create(['difficulty' => Difficulty::Easy]);

        $planned = collect($this->daily->plan(3));

        $this->assertCount(3, $planned->pluck('question_id')->unique());
        $this->assertTrue($planned->every(fn ($c) => $c->question->is_active));
    }

    #[Test]
    public function it_reuses_questions_when_the_pool_is_exhausted(): void
    {
        $this->createPool(perDifficulty: 2);

        $planned = collect($this->daily->plan(4));

        $this->assertCount(12, $planned);
        $this->assertSame([1, 2, 3, 4], $planned->pluck('number')->unique()->values()->all());
    }

    #[Test]
    public function difficulties_without_questions_are_left_out(): void
    {
        Question::factory()->create(['difficulty' => Difficulty::Hard]);

        $this->assertSame([3], array_keys($this->daily->currentDay()));
        $this->assertNull($this->daily->current(Difficulty::Easy));
    }

    #[Test]
    public function there_is_no_challenge_without_questions(): void
    {
        $this->assertSame([], $this->daily->currentDay());
        $this->get('/')->assertOk()->assertSee('No challenge yet today');
    }

    #[Test]
    public function the_plan_command_schedules_upcoming_days(): void
    {
        $this->createPool();

        $this->artisan('dailymath:plan', ['--days' => 5])->assertSuccessful();

        $this->assertSame(15, DailyChallenge::count());
    }
}
