<?php

namespace App\Admin;

use App\Enums\AnswerType;
use App\Enums\HintStage;
use App\Models\Question;

/**
 * Übersetzt zwischen dem Formular der Aufgabenverwaltung und der Speicherstruktur einer Aufgabe.
 *
 * Im Formular werden die Antworten bewusst als einfacher Text gepflegt:
 * - Zahl / Bruch:     "7/12", "25pi", "e^2" (+ optional Toleranz)
 * - Lösungsmenge:     "2; 3"
 * - Mehrere Werte:    eine Zeile je Variable, z. B. "x = 3"
 * - Multiple Choice:  eine Zeile je Option, z. B. "a | $a^2 + b^2$", dazu der Schlüssel der richtigen Option
 */
final class QuestionFormData
{
    public const TEXT_FIELDS = ['title', 'prompt', 'solution', 'background'];

    /**
     * Formularwerte für eine bestehende (oder neue) Aufgabe.
     *
     * @return array<string, mixed>
     */
    public static function fromQuestion(?Question $question): array
    {
        if (! $question) {
            return [
                'slug' => '',
                'topic' => 'arithmetic',
                'difficulty' => 1,
                'answer_type' => AnswerType::Numeric->value,
                'is_active' => true,
                'en' => ['title' => '', 'prompt' => '', 'solution' => '', 'background' => '', 'placeholder' => ''],
                'de' => ['title' => '', 'prompt' => '', 'solution' => '', 'background' => '', 'placeholder' => ''],
                'answer' => ['value' => '', 'tolerance' => '', 'values' => '', 'pairs' => '', 'options' => '', 'choice' => ''],
                'unit' => '',
                'hints' => [
                    ['stage' => 'nudge', 'en' => '', 'de' => ''],
                    ['stage' => 'approach', 'en' => '', 'de' => ''],
                    ['stage' => 'help', 'en' => '', 'de' => ''],
                    ['stage' => 'almost', 'en' => '', 'de' => ''],
                ],
            ];
        }

        $answer = $question->answer ?? [];
        $meta = $question->answer_meta ?? [];
        $de = $question->translations['de'] ?? [];

        $content = fn (array $source, array $metaSource) => [
            ...array_map(fn () => '', array_flip(self::TEXT_FIELDS)),
            ...array_intersect_key($source, array_flip(self::TEXT_FIELDS)),
            'placeholder' => $metaSource['placeholder'] ?? '',
        ];

        return [
            'slug' => $question->slug ?? '',
            'topic' => $question->topic->value,
            'difficulty' => $question->difficulty->value,
            'answer_type' => $question->answer_type->value,
            'is_active' => $question->is_active,
            'en' => $content($question->only(self::TEXT_FIELDS), $meta),
            'de' => $content($de, $de['answer_meta'] ?? []),
            'answer' => [
                'value' => (string) ($answer['value'] ?? ''),
                'tolerance' => isset($answer['tolerance']) ? (string) $answer['tolerance'] : '',
                'values' => $question->answer_type === AnswerType::SolutionSet ? implode('; ', $answer['values'] ?? []) : '',
                'pairs' => $question->answer_type === AnswerType::MultiValue
                    ? collect($answer['values'] ?? [])->map(fn ($v, $k) => "{$k} = {$v}")->implode("\n")
                    : '',
                'options' => collect($meta['options'] ?? [])->map(fn ($label, $key) => "{$key} | {$label}")->implode("\n"),
                'choice' => (string) ($answer['choice'] ?? ''),
            ],
            'unit' => $meta['unit'] ?? '',
            'hints' => $question->hints->map(fn ($hint) => [
                'stage' => (HintStage::fromLabel($hint->label) ?? HintStage::Nudge)->value,
                'en' => $hint->content,
                'de' => $hint->translations['de']['content'] ?? '',
            ])->values()->all(),
        ];
    }

    /**
     * Erwartete Antwort und Antwort-Metadaten aus den Formularfeldern.
     *
     * @param  array<string, mixed>  $answer
     * @return array{0: array<string, mixed>, 1: array<string, mixed>}
     */
    public static function answer(AnswerType $type, array $answer, ?string $unit = null): array
    {
        $meta = [];

        $expected = match ($type) {
            AnswerType::Numeric => array_filter([
                'value' => trim((string) ($answer['value'] ?? '')),
                'tolerance' => is_numeric(str_replace(',', '.', (string) ($answer['tolerance'] ?? '')))
                    ? (float) str_replace(',', '.', (string) $answer['tolerance'])
                    : null,
            ], fn ($v) => $v !== null && $v !== '' && $v !== 0.0),
            AnswerType::Fraction => ['value' => trim((string) ($answer['value'] ?? ''))],
            AnswerType::SolutionSet => ['values' => self::splitList((string) ($answer['values'] ?? ''))],
            AnswerType::MultiValue => ['values' => self::pairs((string) ($answer['pairs'] ?? ''))],
            AnswerType::MultipleChoice => ['choice' => trim((string) ($answer['choice'] ?? ''))],
        };

        if ($type === AnswerType::MultiValue) {
            $meta['variables'] = array_keys($expected['values']);
        }

        if ($type === AnswerType::MultipleChoice) {
            $meta['options'] = self::options((string) ($answer['options'] ?? ''));
        }

        if (filled($unit)) {
            $meta['unit'] = trim($unit);
        }

        return [$expected, $meta];
    }

    /**
     * Alle Attribute einer Aufgabe aus den (validierten) Formulardaten.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public static function attributes(array $data): array
    {
        $type = AnswerType::from($data['answer_type']);
        [$answer, $meta] = self::answer($type, $data['answer'] ?? [], $data['unit'] ?? null);

        if (filled($data['en']['placeholder'] ?? null)) {
            $meta['placeholder'] = trim($data['en']['placeholder']);
        }

        $german = array_filter(array_map(fn ($v) => is_string($v) ? trim($v) : $v, array_intersect_key($data['de'] ?? [], array_flip(self::TEXT_FIELDS))), 'filled');
        if (filled($data['de']['placeholder'] ?? null)) {
            $german['answer_meta'] = ['placeholder' => trim($data['de']['placeholder'])];
        }

        return [
            'slug' => $data['slug'],
            'topic' => $data['topic'],
            'difficulty' => (int) $data['difficulty'],
            'answer_type' => $type,
            'answer' => $answer,
            'answer_meta' => $meta ?: null,
            'is_active' => (bool) ($data['is_active'] ?? false),
            'translations' => $german ? ['de' => $german] : null,
            ...array_map(fn ($v) => is_string($v) ? trim($v) : $v, array_intersect_key($data['en'], array_flip(self::TEXT_FIELDS))),
        ];
    }

    /**
     * Hinweise in Speicherform (Position, Bezeichnung, Inhalt, Übersetzung).
     *
     * @param  list<array<string, string|null>>  $hints
     * @return list<array<string, mixed>>
     */
    public static function hints(array $hints): array
    {
        return collect($hints)
            ->filter(fn ($hint) => filled($hint['en'] ?? null))
            ->values()
            ->map(function (array $hint, int $i) {
                $stage = HintStage::from($hint['stage']);

                return [
                    'position' => $i + 1,
                    'label' => $stage->label('en'),
                    'content' => trim($hint['en']),
                    'translations' => ['de' => array_filter([
                        'label' => $stage->label('de'),
                        'content' => filled($hint['de'] ?? null) ? trim($hint['de']) : null,
                    ])],
                ];
            })
            ->all();
    }

    /**
     * @return list<string>
     */
    public static function splitList(string $text): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/[;\n]/', $text)), fn ($v) => $v !== ''));
    }

    /**
     * "x = 3" je Zeile → ['x' => '3'].
     *
     * @return array<string, string>
     */
    public static function pairs(string $text): array
    {
        $pairs = [];
        foreach (preg_split('/[;\n]/', $text) as $line) {
            if (preg_match('/^\s*([A-Za-z][A-Za-z0-9_]*)\s*=\s*(.+?)\s*$/', $line, $m)) {
                $pairs[$m[1]] = $m[2];
            }
        }

        return $pairs;
    }

    /**
     * "a | $a^2$" je Zeile → ['a' => '$a^2$'].
     *
     * @return array<string, string>
     */
    public static function options(string $text): array
    {
        $options = [];
        foreach (preg_split('/\R/', $text) as $line) {
            if (preg_match('/^\s*([a-z])\s*\|\s*(.+?)\s*$/', $line, $m)) {
                $options[$m[1]] = $m[2];
            }
        }

        return $options;
    }
}
