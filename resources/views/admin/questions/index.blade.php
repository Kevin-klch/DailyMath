<x-layouts.admin title="Aufgaben">
    <div class="flex flex-wrap items-end justify-between gap-3">
        <div>
            <h1 class="font-serif text-3xl font-semibold">Aufgaben</h1>
            <p class="mt-1 text-sm text-ink-400">{{ $questions->count() }} {{ $questions->count() === 1 ? 'Aufgabe' : 'Aufgaben' }}</p>
        </div>
        <a href="{{ route('admin.questions.create') }}" class="btn-primary">+ Neue Aufgabe</a>
    </div>

    {{-- Filter --}}
    <form method="GET" class="mt-6 flex flex-wrap items-center gap-2">
        <input type="search" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Suchen (Titel, Slug, deutscher Text) …" class="input !w-72 !py-2 !text-sm">
        <select name="difficulty" class="input !w-auto !py-2 !text-sm" onchange="this.form.submit()">
            <option value="">Alle Niveaus</option>
            @foreach (\App\Enums\Difficulty::cases() as $difficulty)
                <option value="{{ $difficulty->value }}" @selected(($filters['difficulty'] ?? '') == $difficulty->value)>{{ $difficulty->label() }}</option>
            @endforeach
        </select>
        <select name="topic" class="input !w-auto !py-2 !text-sm" onchange="this.form.submit()">
            <option value="">Alle Themen</option>
            @foreach (\App\Enums\Topic::cases() as $topic)
                <option value="{{ $topic->value }}" @selected(($filters['topic'] ?? '') === $topic->value)>{{ $topic->label() }}</option>
            @endforeach
        </select>
        <select name="status" class="input !w-auto !py-2 !text-sm" onchange="this.form.submit()">
            <option value="">Alle</option>
            <option value="active" @selected(($filters['status'] ?? '') === 'active')>Aktiv</option>
            <option value="inactive" @selected(($filters['status'] ?? '') === 'inactive')>Deaktiviert</option>
            <option value="unused" @selected(($filters['status'] ?? '') === 'unused')>Noch nie eingeplant</option>
        </select>
        <button class="btn-outline !py-2">Filtern</button>
        @if (array_filter($filters))
            <a href="{{ route('admin.questions.index') }}" class="text-sm text-ink-400 hover:text-white">zurücksetzen</a>
        @endif
    </form>

    <div class="mt-4 overflow-x-auto">
        <table class="w-full min-w-[860px] text-left text-sm">
            <thead class="label">
                <tr class="border-b border-white/10">
                    <th class="py-2 pr-3 font-medium">Aufgabe</th>
                    <th class="px-3 py-2 font-medium">Niveau</th>
                    <th class="px-3 py-2 font-medium">Thema</th>
                    <th class="px-3 py-2 font-medium">Typ</th>
                    <th class="px-3 py-2 font-medium">Hinweise</th>
                    <th class="px-3 py-2 font-medium">Gestellt</th>
                    <th class="px-3 py-2 font-medium">Geplant</th>
                    <th class="py-2 pl-3 font-medium"><span class="sr-only">Aktionen</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($questions as $question)
                    <tr @class(['border-b border-white/6', 'opacity-50' => ! $question->is_active])>
                        <td class="py-3 pr-3">
                            <a href="{{ route('admin.questions.edit', $question) }}" class="font-medium text-white hover:text-accent-400">{{ $question->title }}</a>
                            <div class="mt-0.5 text-xs text-ink-500">
                                {{ $question->translations['de']['title'] ?? '– keine deutsche Übersetzung' }}
                                @unless ($question->is_active) · <span class="text-danger-400">deaktiviert</span> @endunless
                            </div>
                        </td>
                        <td class="px-3 py-3">{{ $question->difficulty->label() }}</td>
                        <td class="px-3 py-3 text-ink-300">{{ $question->topic->label() }}</td>
                        <td class="px-3 py-3 font-mono text-xs text-ink-400">{{ $question->answer_type->value }}</td>
                        <td class="px-3 py-3 font-mono">{{ $question->hints_count }}</td>
                        <td class="px-3 py-3">
                            @if ($question->times_used)
                                <span class="font-mono">{{ $question->times_used }}×</span>
                                <span class="text-xs text-ink-500">zuletzt {{ \Illuminate\Support\Carbon::parse($question->last_used)->format('d.m.y') }}</span>
                            @else
                                <span class="text-success-400">neu</span>
                            @endif
                        </td>
                        <td class="px-3 py-3 font-mono text-xs">{{ $question->next_planned ? \Illuminate\Support\Carbon::parse($question->next_planned)->format('d.m.y') : '–' }}</td>
                        <td class="py-3 pl-3 text-right whitespace-nowrap">
                            <a href="{{ route('admin.questions.create', ['from' => $question->id]) }}" class="text-xs text-ink-400 hover:text-white">duplizieren</a>
                            <form method="POST" action="{{ route('admin.questions.toggle', $question) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <button class="ml-3 text-xs text-ink-400 hover:text-white">{{ $question->is_active ? 'deaktivieren' : 'aktivieren' }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="py-10 text-center text-ink-400">Keine Aufgaben gefunden.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
