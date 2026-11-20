<?php

namespace App\Http\Controllers\Admin;

use App\Admin\QuestionFormData;
use App\Enums\AnswerType;
use App\Http\Controllers\Controller;
use App\Support\MathText;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Helfer für das Aufgabenformular: Live-Vorschau und „Antwort testen“.
 */
class ToolsController extends Controller
{
    /**
     * Rendert mehrere Texte (Aufgabe, Lösung, Hinweise …) genau so, wie sie auf der Seite erscheinen.
     */
    public function preview(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'texts' => ['array', 'max:20'],
            'texts.*' => ['nullable', 'string', 'max:10000'],
        ]);

        return response()->json([
            'html' => array_map(fn ($text) => MathText::toHtml($text), $validated['texts'] ?? []),
        ]);
    }

    public function check(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'answer_type' => ['required', Rule::enum(AnswerType::class)],
            'answer' => ['array'],
            'answer.*' => ['nullable', 'string', 'max:2000'],
            'input' => ['required'],
            'input.*' => ['nullable', 'string', 'max:200'],
        ]);

        $type = AnswerType::from($validated['answer_type']);
        [$expected, $meta] = QuestionFormData::answer($type, $validated['answer'] ?? []);

        try {
            $result = $type->checker()->check($validated['input'], $expected, $meta);
        } catch (\Throwable) {
            return response()->json(['status' => 'error', 'message' => 'Die hinterlegte Lösung ist (noch) nicht lesbar.']);
        }

        return response()->json(['status' => $result->status->value, 'message' => $result->message]);
    }
}
