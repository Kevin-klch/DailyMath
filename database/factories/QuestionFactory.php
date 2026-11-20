<?php

namespace Database\Factories;

use App\Enums\AnswerType;
use App\Enums\Difficulty;
use App\Enums\Topic;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Question>
 */
class QuestionFactory extends Factory
{
    public function definition(): array
    {
        $a = fake()->numberBetween(2, 20);
        $b = fake()->numberBetween(2, 20);

        return [
            'title' => fake()->unique()->sentence(3),
            'prompt' => "Berechne: \$\$ {$a} + {$b} \$\$",
            'topic' => Topic::Arithmetic,
            'difficulty' => Difficulty::Easy,
            'answer_type' => AnswerType::Numeric,
            'answer' => ['value' => (string) ($a + $b)],
            'answer_meta' => null,
            'solution' => "\$\$ {$a} + {$b} = ".($a + $b).' $$',
            'background' => null,
            'is_active' => true,
        ];
    }

    public function withHints(int $count = 3): static
    {
        return $this->afterCreating(function (Question $question) use ($count) {
            foreach (range(1, $count) as $position) {
                $question->hints()->create([
                    'position' => $position,
                    'label' => "Hinweis {$position}",
                    'content' => "Inhalt von Hinweis {$position}",
                ]);
            }
        });
    }

    public function inactive(): static
    {
        return $this->state(['is_active' => false]);
    }
}
