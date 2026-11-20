<?php

namespace App\Http\Controllers;

use App\Learn\LearnCategory;
use App\Learn\LearnRepository;
use Illuminate\View\View;

/**
 * Lernbereich: frei lesbare Erklärungen zu Mathe-Themen, von Punkt vor Strich bis zu Grenzwerten.
 */
class LearnController extends Controller
{
    public function __construct(private LearnRepository $learn) {}

    public function index(): View
    {
        return view('learn.index', [
            'categories' => $this->learn->byCategory(),
            'total' => $this->learn->all()->count(),
        ]);
    }

    public function show(string $slug): View
    {
        $article = $this->learn->find($slug) ?? abort(404);
        $all = $this->learn->all();

        $siblings = $all->where('category', $article['category'])->values();
        $position = $all->search(fn ($a) => $a['slug'] === $slug);

        return view('learn.show', [
            'article' => $article,
            'category' => LearnCategory::tryFrom($article['category']) ?? LearnCategory::Advanced,
            'siblings' => $siblings,
            'related' => collect($article['related'])->map(fn ($s) => $all->firstWhere('slug', $s))->filter()->values(),
            'previous' => $position > 0 ? $all[$position - 1] : null,
            'next' => $all[$position + 1] ?? null,
        ]);
    }
}
