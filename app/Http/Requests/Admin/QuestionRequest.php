<?php

namespace App\Http\Requests\Admin;

use App\Admin\QuestionFormData;
use App\Enums\AnswerType;
use App\Enums\Difficulty;
use App\Enums\HintStage;
use App\Enums\Topic;
use App\Math\ExpressionParser;
use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

/**
 * Validiert eine Aufgabe aus der Aufgabenverwaltung – inkl. der Frage,
 * ob die hinterlegte Lösung überhaupt mathematisch lesbar ist.
 */
class QuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Zugriff regelt die Admin-Middleware
    }

    protected function prepareForValidation(): void
    {
        $slug = Str::slug((string) ($this->input('slug') ?: $this->input('en.title')));

        $this->merge([
            'slug' => $slug !== '' ? $slug : null,
            'is_active' => $this->boolean('is_active'),
            'hints' => array_values(array_filter(
                (array) $this->input('hints', []),
                fn ($hint) => is_array($hint) && (filled($hint['en'] ?? null) || filled($hint['de'] ?? null)),
            )),
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        /** @var Question|null $question */
        $question = $this->route('question');

        return [
            'slug' => ['required', 'alpha_dash', 'max:80', Rule::unique('questions', 'slug')->ignore($question?->id)],
            'topic' => ['required', Rule::enum(Topic::class)],
            'difficulty' => ['required', Rule::enum(Difficulty::class)],
            'answer_type' => ['required', Rule::enum(AnswerType::class)],
            'is_active' => ['boolean'],

            'en.title' => ['required', 'string', 'max:120'],
            'en.prompt' => ['required', 'string', 'max:5000'],
            'en.solution' => ['required', 'string', 'max:5000'],
            'en.background' => ['nullable', 'string', 'max:2000'],
            'en.placeholder' => ['nullable', 'string', 'max:40'],

            'de.title' => ['nullable', 'string', 'max:120'],
            'de.prompt' => ['nullable', 'string', 'max:5000'],
            'de.solution' => ['nullable', 'string', 'max:5000'],
            'de.background' => ['nullable', 'string', 'max:2000'],
            'de.placeholder' => ['nullable', 'string', 'max:40'],

            'answer' => ['array'],
            'answer.*' => ['nullable', 'string', 'max:2000'],
            'unit' => ['nullable', 'string', 'max:12'],

            'hints' => ['array', 'max:4'],
            'hints.*.stage' => ['required', Rule::enum(HintStage::class)],
            'hints.*.en' => ['required', 'string', 'max:2000'],
            'hints.*.de' => ['nullable', 'string', 'max:2000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'en.title' => 'Titel (EN)',
            'en.prompt' => 'Aufgabentext (EN)',
            'en.solution' => 'Lösungsweg (EN)',
            'hints.*.en' => 'Hinweis (EN)',
        ];
    }

    public function after(): array
    {
        return [function (Validator $validator) {
            if ($validator->errors()->isNotEmpty()) {
                return;
            }

            $type = AnswerType::from($this->input('answer_type'));
            [$expected, $meta] = QuestionFormData::answer($type, (array) $this->input('answer', []));

            foreach ($this->answerProblems($type, $expected, $meta) as $field => $message) {
                $validator->errors()->add($field, $message);
            }
        }];
    }

    /**
     * Prüft, ob die hinterlegte Lösung zum Antworttyp passt und mathematisch lesbar ist.
     *
     * @param  array<string, mixed>  $expected
     * @param  array<string, mixed>  $meta
     * @return array<string, string>
     */
    private function answerProblems(AnswerType $type, array $expected, array $meta): array
    {
        $parser = app(ExpressionParser::class);
        $unreadable = fn (string $value) => $parser->tryParse($value) === null;

        return match ($type) {
            AnswerType::Numeric, AnswerType::Fraction => match (true) {
                ($expected['value'] ?? '') === '' => ['answer.value' => 'Bitte die richtige Lösung angeben.'],
                $unreadable($expected['value']) => ['answer.value' => "„{$expected['value']}“ ist kein lesbarer Zahlenwert (erlaubt z. B. 7/12, 2.5, 25pi, 3sqrt(2), e^2)."],
                $type === AnswerType::Fraction && ! $parser->parse($expected['value'])->isExact() => ['answer.value' => 'Ein Bruch-Ergebnis muss exakt rational sein (z. B. 5/16).'],
                default => [],
            },
            AnswerType::SolutionSet => match (true) {
                $expected['values'] === [] => ['answer.values' => 'Bitte mindestens eine Lösung angeben (getrennt durch Semikolon).'],
                ($bad = array_filter($expected['values'], $unreadable)) !== [] => ['answer.values' => 'Nicht lesbar: '.implode(', ', $bad)],
                default => [],
            },
            AnswerType::MultiValue => match (true) {
                $expected['values'] === [] => ['answer.pairs' => 'Bitte die Werte zeilenweise angeben, z. B. „x = 3“.'],
                ($bad = array_filter($expected['values'], $unreadable)) !== [] => ['answer.pairs' => 'Nicht lesbar: '.implode(', ', array_keys($bad))],
                default => [],
            },
            AnswerType::MultipleChoice => match (true) {
                count($meta['options']) < 2 => ['answer.options' => 'Bitte mindestens zwei Optionen angeben, z. B. „a | $x^2$“.'],
                ! array_key_exists($expected['choice'], $meta['options']) => ['answer.choice' => 'Die richtige Option muss einer der Schlüssel sein ('.implode(', ', array_keys($meta['options'])).').'],
                default => [],
            },
        };
    }
}
