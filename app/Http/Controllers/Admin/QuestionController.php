<?php

namespace App\Http\Controllers\Admin;

use App\Admin\QuestionFormData;
use App\Enums\Difficulty;
use App\Enums\Topic;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionRequest;
use App\Models\Question;
use App\Services\DailyChallengeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class QuestionController extends Controller
{
    public function index(Request $request, DailyChallengeService $daily): View
    {
        $filters = $request->validate([
            'difficulty' => ['nullable', Rule::enum(Difficulty::class)],
            'topic' => ['nullable', Rule::enum(Topic::class)],
            'q' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', Rule::in(['active', 'inactive', 'unused'])],
        ]);

        $today = $daily->today()->toDateString();

        $questions = Question::query()
            ->withCount(['dailyChallenges as times_used' => fn ($q) => $q->whereDate('challenge_date', '<=', $today)])
            ->withMax(['dailyChallenges as last_used' => fn ($q) => $q->whereDate('challenge_date', '<=', $today)], 'challenge_date')
            ->withMin(['dailyChallenges as next_planned' => fn ($q) => $q->whereDate('challenge_date', '>', $today)], 'challenge_date')
            ->withCount('hints')
            ->when($filters['difficulty'] ?? null, fn ($q, $d) => $q->where('difficulty', $d))
            ->when($filters['topic'] ?? null, fn ($q, $t) => $q->where('topic', $t))
            ->when($filters['q'] ?? null, fn ($q, $s) => $q->where(fn ($q) => $q
                ->where('title', 'like', "%{$s}%")
                ->orWhere('slug', 'like', "%{$s}%")
                ->orWhere('translations', 'like', "%{$s}%")))
            ->when(($filters['status'] ?? null) === 'active', fn ($q) => $q->where('is_active', true))
            ->when(($filters['status'] ?? null) === 'inactive', fn ($q) => $q->where('is_active', false))
            ->when(($filters['status'] ?? null) === 'unused', fn ($q) => $q->doesntHave('dailyChallenges'))
            ->orderBy('difficulty')
            ->orderBy('title')
            ->get();

        return view('admin.questions.index', ['questions' => $questions, 'filters' => $filters]);
    }

    public function create(Request $request): View
    {
        $question = null;

        // „Duplizieren“: Formular mit einer bestehenden Aufgabe als Vorlage füllen
        if ($request->filled('from')) {
            $question = Question::with('hints')->find($request->integer('from'));
        }

        $form = QuestionFormData::fromQuestion($question);
        if ($question) {
            $form['slug'] = '';
            $form['en']['title'] .= ' (copy)';
        }

        return view('admin.questions.form', ['question' => null, 'form' => $form]);
    }

    public function store(QuestionRequest $request): RedirectResponse
    {
        $question = DB::transaction(function () use ($request) {
            $question = Question::create(QuestionFormData::attributes($request->validated()));
            $question->hints()->createMany(QuestionFormData::hints($request->validated('hints', [])));

            return $question;
        });

        return redirect()->route('admin.questions.edit', $question)->with('status', 'Aufgabe angelegt.');
    }

    public function edit(Question $question): View
    {
        $question->load('hints');

        return view('admin.questions.form', [
            'question' => $question,
            'form' => QuestionFormData::fromQuestion($question),
            'usage' => $question->dailyChallenges()->orderBy('challenge_date')->get(['challenge_date', 'difficulty', 'number']),
        ]);
    }

    public function update(QuestionRequest $request, Question $question): RedirectResponse
    {
        DB::transaction(function () use ($request, $question) {
            $question->update(QuestionFormData::attributes($request->validated()));
            $question->hints()->delete();
            $question->hints()->createMany(QuestionFormData::hints($request->validated('hints', [])));
        });

        return redirect()->route('admin.questions.edit', $question)->with('status', 'Änderungen gespeichert.');
    }

    public function toggle(Question $question): RedirectResponse
    {
        $question->update(['is_active' => ! $question->is_active]);

        return back()->with('status', $question->is_active ? 'Aufgabe aktiviert.' : 'Aufgabe deaktiviert – sie wird nicht mehr neu eingeplant.');
    }

    /**
     * Löschen ist nur für Aufgaben möglich, die noch nie eingeplant wurden – sonst würden Ergebnisse verloren gehen.
     */
    public function destroy(Question $question): RedirectResponse
    {
        if ($question->dailyChallenges()->exists()) {
            return back()->with('error', 'Diese Aufgabe wurde schon eingeplant und kann nur deaktiviert werden.');
        }

        $question->delete();

        return redirect()->route('admin.questions.index')->with('status', 'Aufgabe gelöscht.');
    }
}
