@php
    use App\Admin\QuestionFormData;
    use App\Enums\AnswerType;
    use App\Enums\Difficulty;
    use App\Enums\Topic;

    // Nach einem Validierungsfehler die Eingaben wiederherstellen (fehlende Felder mit Standardwerten auffüllen)
    if (session()->hasOldInput()) {
        $defaults = QuestionFormData::fromQuestion(null);
        $old = old();
        $form = array_replace_recursive(array_diff_key($defaults, ['hints' => 1]), array_diff_key($old, ['hints' => 1, '_token' => 1, '_method' => 1]));
        $form['hints'] = array_values(array_map(fn ($h) => ['stage' => $h['stage'] ?? 'nudge', 'en' => $h['en'] ?? '', 'de' => $h['de'] ?? ''], $old['hints'] ?? []));
        $form['is_active'] = (bool) ($old['is_active'] ?? false);
    }

    // Für Alpine: null → '' (damit x-model überall mit Text arbeitet)
    array_walk_recursive($form, function (&$value) { $value ??= ''; });

    $answerTypes = [
        'numeric' => 'Zahl (mathematischer Vergleich, z. B. 0,5 = 1/2, 25π)',
        'fraction' => 'Exakter Bruch (gerundete Dezimalzahlen zählen nicht)',
        'solution_set' => 'Lösungsmenge (Reihenfolge egal, z. B. 2; 3)',
        'multi_value' => 'Mehrere benannte Werte (z. B. x und y)',
        'multiple_choice' => 'Multiple Choice',
    ];
@endphp

<x-layouts.admin :title="$question ? 'Aufgabe bearbeiten' : 'Neue Aufgabe'">
    <div x-data="questionForm(@js($form), @js(['preview' => route('admin.tools.preview'), 'check' => route('admin.tools.check')]))">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <div>
                <a href="{{ route('admin.questions.index') }}" class="text-sm text-ink-400 hover:text-white">← Alle Aufgaben</a>
                <h1 class="mt-1 font-serif text-3xl font-semibold">{{ $question ? 'Aufgabe bearbeiten' : 'Neue Aufgabe' }}</h1>
            </div>
            @if ($question)
                <div class="flex items-center gap-3 text-sm">
                    <a href="{{ route('admin.questions.create', ['from' => $question->id]) }}" class="text-ink-400 hover:text-white">Duplizieren</a>
                    @if ($usage->isEmpty())
                        <form method="POST" action="{{ route('admin.questions.destroy', $question) }}" onsubmit="return confirm('Aufgabe endgültig löschen?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-danger-400 hover:underline">Löschen</button>
                        </form>
                    @endif
                </div>
            @endif
        </div>

        @if ($errors->any())
            <div class="mt-6 rounded-md border border-danger-400/30 bg-danger-400/10 px-4 py-3 text-sm text-danger-400" role="alert">
                <p class="font-semibold">Bitte prüfen:</p>
                <ul class="mt-1 list-inside list-disc">
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-6 grid items-start gap-6 lg:grid-cols-[minmax(0,1fr)_400px]">
            {{-- ============================================================ Formular --}}
            <form method="POST" action="{{ $question ? route('admin.questions.update', $question) : route('admin.questions.store') }}" class="flex flex-col gap-6">
                @csrf
                @if ($question)
                    @method('PUT')
                @endif

                {{-- Grunddaten --}}
                <section class="card p-5">
                    <h2 class="label">Grunddaten</h2>
                    <div class="mt-4 grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="text-sm text-ink-300">Niveau</span>
                            <select name="difficulty" x-model="form.difficulty" class="input mt-1 !py-2 !text-base">
                                @foreach (Difficulty::cases() as $difficulty)
                                    <option value="{{ $difficulty->value }}">{{ $difficulty->label() }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label class="block">
                            <span class="text-sm text-ink-300">Thema</span>
                            <select name="topic" x-model="form.topic" class="input mt-1 !py-2 !text-base">
                                @foreach (Topic::cases() as $topic)
                                    <option value="{{ $topic->value }}">{{ $topic->label() }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label class="block">
                            <span class="text-sm text-ink-300">Slug <span class="text-ink-500">(interner Schlüssel, leer = aus dem englischen Titel)</span></span>
                            <input name="slug" x-model="form.slug" class="input mt-1 !py-2 !text-base font-mono" placeholder="z. B. largest-rectangle">
                        </label>
                        <label class="flex items-center gap-3 self-end pb-2">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" x-model="form.is_active" class="size-5 accent-accent-500">
                            <span class="text-sm">Aktiv <span class="text-ink-500">(wird für neue Tage eingeplant)</span></span>
                        </label>
                    </div>
                </section>

                {{-- Inhalt: Englisch (Grundsprache) und Deutsch --}}
                <section class="card p-5">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <h2 class="label">Inhalt</h2>
                        <div class="flex rounded-full border border-white/10 p-0.5 text-sm" role="tablist">
                            <button type="button" role="tab" @click="lang = 'en'" :aria-selected="lang === 'en'" class="rounded-full px-4 py-1 transition" :class="lang === 'en' ? 'bg-accent-500 text-ink-950' : 'text-ink-400 hover:text-white'">English</button>
                            <button type="button" role="tab" @click="lang = 'de'" :aria-selected="lang === 'de'" class="rounded-full px-4 py-1 transition" :class="lang === 'de' ? 'bg-accent-500 text-ink-950' : 'text-ink-400 hover:text-white'">
                                Deutsch <span x-show="missingGerman" class="ml-1 rounded-full bg-danger-400/20 px-1.5 text-xs text-danger-400" x-text="missingGerman" title="fehlende Übersetzungen"></span>
                            </button>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-ink-500">LaTeX in <code>$…$</code> (im Text) bzw. <code>$$…$$</code> (abgesetzt, in einer Zeile). Leerzeile = neuer Absatz, <code>**fett**</code>. Der Titel darf den Lösungsweg nicht verraten. Fehlt eine deutsche Übersetzung, wird Englisch angezeigt.</p>

                    @foreach (['en' => 'English', 'de' => 'Deutsch'] as $code => $language)
                        <div x-show="lang === '{{ $code }}'" @if ($code === 'de') x-cloak @endif class="mt-4 flex flex-col gap-4">
                            <label class="block">
                                <span class="text-sm text-ink-300">Titel ({{ $language }}) @if ($code === 'en') <span class="text-danger-400">*</span>@endif</span>
                                <input name="{{ $code }}[title]" x-model="form.{{ $code }}.title" class="input mt-1 !py-2 font-serif !text-xl" maxlength="120">
                            </label>
                            <label class="block">
                                <span class="text-sm text-ink-300">Aufgabentext @if ($code === 'en') <span class="text-danger-400">*</span>@endif</span>
                                <textarea name="{{ $code }}[prompt]" x-model="form.{{ $code }}.prompt" rows="5" class="input mt-1 font-mono !text-sm !font-normal"></textarea>
                            </label>
                            <label class="block">
                                <span class="text-sm text-ink-300">Lösungsweg @if ($code === 'en') <span class="text-danger-400">*</span>@endif</span>
                                <textarea name="{{ $code }}[solution]" x-model="form.{{ $code }}.solution" rows="4" class="input mt-1 font-mono !text-sm !font-normal"></textarea>
                            </label>
                            <label class="block">
                                <span class="text-sm text-ink-300">Bemerkung / Hintergrund <span class="text-ink-500">(optional)</span></span>
                                <textarea name="{{ $code }}[background]" x-model="form.{{ $code }}.background" rows="2" class="input mt-1 font-mono !text-sm !font-normal"></textarea>
                            </label>
                            <label class="block">
                                <span class="text-sm text-ink-300">Platzhalter im Antwortfeld <span class="text-ink-500">(optional, z. B. „{{ $code === 'de' ? 'z. B. 5/8' : 'e.g. 5/8' }}“)</span></span>
                                <input name="{{ $code }}[placeholder]" x-model="form.{{ $code }}.placeholder" class="input mt-1 !py-2 !text-base" maxlength="40">
                            </label>
                        </div>
                    @endforeach
                </section>

                {{-- Antwort --}}
                <section class="card p-5">
                    <h2 class="label">Richtige Antwort</h2>
                    <label class="mt-4 block">
                        <span class="text-sm text-ink-300">Antworttyp</span>
                        <select name="answer_type" x-model="form.answer_type" class="input mt-1 !py-2 !text-base">
                            @foreach ($answerTypes as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </label>

                    <div class="mt-4 grid gap-4 sm:grid-cols-[minmax(0,1fr)_10rem]">
                        <div>
                            <label x-show="['numeric', 'fraction'].includes(form.answer_type)" class="block">
                                <span class="text-sm text-ink-300">Lösung <span class="text-ink-500">(z. B. 7/12, 2.5, 25pi, 3sqrt(2), e^2)</span></span>
                                <input name="answer[value]" x-model="form.answer.value" class="input mt-1 !py-2 font-mono !text-base">
                            </label>
                            <label x-show="form.answer_type === 'solution_set'" x-cloak class="block">
                                <span class="text-sm text-ink-300">Alle Lösungen, getrennt durch Semikolon</span>
                                <input name="answer[values]" x-model="form.answer.values" class="input mt-1 !py-2 font-mono !text-base" placeholder="2; 3">
                            </label>
                            <label x-show="form.answer_type === 'multi_value'" x-cloak class="block">
                                <span class="text-sm text-ink-300">Eine Zeile je Variable</span>
                                <textarea name="answer[pairs]" x-model="form.answer.pairs" rows="3" class="input mt-1 font-mono !text-base" placeholder="x = 3&#10;y = 1"></textarea>
                            </label>
                            <div x-show="form.answer_type === 'multiple_choice'" x-cloak>
                                <label class="block">
                                    <span class="text-sm text-ink-300">Optionen – eine je Zeile: <code>Schlüssel | Text</code></span>
                                    <textarea name="answer[options]" x-model="form.answer.options" rows="4" class="input mt-1 font-mono !text-sm" placeholder="a | $a^2 + b^2$&#10;b | $a^2 + 2ab + b^2$"></textarea>
                                </label>
                                <label class="mt-3 block">
                                    <span class="text-sm text-ink-300">Richtige Option</span>
                                    <select name="answer[choice]" x-model="form.answer.choice" class="input mt-1 !w-auto !py-2 !text-base">
                                        <option value="">– wählen –</option>
                                        <template x-for="option in options" :key="option.key">
                                            <option :value="option.key" x-text="option.key + ' – ' + option.label" :selected="option.key === form.answer.choice"></option>
                                        </template>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <label x-show="form.answer_type === 'numeric'" class="block">
                                <span class="text-sm text-ink-300">Toleranz <span class="text-ink-500">(optional)</span></span>
                                <input name="answer[tolerance]" x-model="form.answer.tolerance" class="input mt-1 !py-2 font-mono !text-base" placeholder="0.01">
                            </label>
                            <label class="block">
                                <span class="text-sm text-ink-300">Einheit <span class="text-ink-500">(optional)</span></span>
                                <input name="unit" x-model="form.unit" class="input mt-1 !py-2 !text-base" placeholder="cm²" maxlength="12">
                            </label>
                        </div>
                    </div>
                </section>

                {{-- Hinweise --}}
                <section class="card p-5">
                    <div class="flex items-center justify-between">
                        <h2 class="label">Hinweise <span class="normal-case tracking-normal" x-text="'(' + form.hints.length + '/4)'"></span></h2>
                        <button type="button" class="btn-outline !py-1.5" @click="addHint" x-show="form.hints.length < 4">+ Hinweis</button>
                    </div>
                    <p class="mt-2 text-xs text-ink-500">Vom Denkanstoß bis zur fast vollständigen Lösung – jeder Hinweis verrät etwas mehr.</p>

                    <ol class="mt-4 flex flex-col gap-4">
                        <template x-for="(hint, index) in form.hints" :key="index">
                            <li class="rounded-lg border border-white/8 bg-ink-950 p-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-serif text-lg text-accent-500 italic" x-text="index + 1"></span>
                                    <select :name="`hints[${index}][stage]`" x-model="hint.stage" class="input !w-auto !py-1.5 !text-sm">
                                        <template x-for="stage in stages" :key="stage.value">
                                            <option :value="stage.value" x-text="stage.label" :selected="stage.value === hint.stage"></option>
                                        </template>
                                    </select>
                                    <div class="ml-auto flex items-center">
                                        <button type="button" class="tool-btn !size-8" @click="moveHint(index, -1)" :disabled="index === 0" aria-label="Nach oben">↑</button>
                                        <button type="button" class="tool-btn !size-8" @click="moveHint(index, 1)" :disabled="index === form.hints.length - 1" aria-label="Nach unten">↓</button>
                                        <button type="button" class="tool-btn !size-8 hover:!text-danger-400" @click="removeHint(index)" aria-label="Hinweis entfernen">✕</button>
                                    </div>
                                </div>
                                <div class="mt-3 grid gap-3 md:grid-cols-2">
                                    <label class="block">
                                        <span class="text-xs text-ink-400">English <span class="text-danger-400">*</span></span>
                                        <textarea :name="`hints[${index}][en]`" x-model="hint.en" rows="3" class="input mt-1 font-mono !text-sm !font-normal"></textarea>
                                    </label>
                                    <label class="block">
                                        <span class="text-xs text-ink-400">Deutsch</span>
                                        <textarea :name="`hints[${index}][de]`" x-model="hint.de" rows="3" class="input mt-1 font-mono !text-sm !font-normal"></textarea>
                                    </label>
                                </div>
                            </li>
                        </template>
                    </ol>
                </section>

                <div class="flex items-center gap-3">
                    <button class="btn-primary !px-6">{{ $question ? 'Speichern' : 'Aufgabe anlegen' }}</button>
                    <a href="{{ route('admin.questions.index') }}" class="btn-ghost">Abbrechen</a>
                </div>
            </form>

            {{-- ============================================================ Vorschau + Test --}}
            <aside class="flex flex-col gap-4 lg:sticky lg:top-6">
                <div class="card p-5">
                    <div class="flex items-center justify-between">
                        <h2 class="label">Vorschau</h2>
                        <div class="flex rounded-full border border-white/10 p-0.5 text-xs">
                            <button type="button" @click="previewLang = 'en'" class="rounded-full px-3 py-0.5" :class="previewLang === 'en' ? 'bg-white/10 text-white' : 'text-ink-400'">EN</button>
                            <button type="button" @click="previewLang = 'de'" class="rounded-full px-3 py-0.5" :class="previewLang === 'de' ? 'bg-white/10 text-white' : 'text-ink-400'">DE</button>
                        </div>
                    </div>

                    <div class="mt-3 flex gap-1 border-b border-white/8 text-xs">
                        @foreach (['prompt' => 'Aufgabe', 'hints' => 'Hinweise', 'solution' => 'Lösung'] as $tab => $label)
                            <button type="button" @click="previewTab = '{{ $tab }}'" class="-mb-px border-b-2 px-2 py-1.5" :class="previewTab === '{{ $tab }}' ? 'border-accent-500 text-white' : 'border-transparent text-ink-400'">{{ $label }}</button>
                        @endforeach
                    </div>

                    <div x-show="previewTab === 'prompt'" class="mt-4">
                        <p class="font-serif text-xl font-semibold" x-text="previewTitle"></p>
                        <div class="math-content task-prompt mt-2 leading-relaxed text-ink-300" x-math="preview.prompt"></div>
                        <p x-show="form.answer_type === 'multiple_choice'" class="mt-3 text-xs text-ink-500">Optionen: <span x-text="options.map(o => o.key).join(', ') || '–'"></span></p>
                    </div>
                    <ol x-show="previewTab === 'hints'" x-cloak class="mt-4 flex flex-col divide-y divide-white/6">
                        <template x-for="(html, index) in preview.hints" :key="index">
                            <li class="flex gap-3 py-2">
                                <span class="font-serif text-accent-500 italic" x-text="index + 1"></span>
                                <div class="math-content text-sm leading-relaxed text-ink-300" x-math="html"></div>
                            </li>
                        </template>
                    </ol>
                    <div x-show="previewTab === 'solution'" x-cloak class="mt-4">
                        <div class="math-content leading-relaxed text-ink-300" x-math="preview.solution"></div>
                        <div x-show="preview.background" class="mt-3 border-l-2 border-accent-500/60 pl-3">
                            <div class="math-content text-sm leading-relaxed text-ink-400" x-math="preview.background"></div>
                        </div>
                    </div>
                </div>

                {{-- Antwort testen --}}
                <div class="card p-5">
                    <h2 class="label">Antwort testen</h2>
                    <p class="mt-1 text-xs text-ink-500">Prüft eine Eingabe genau wie auf der Seite – auch mit den aktuellen, noch nicht gespeicherten Werten.</p>
                    <form @submit.prevent="testAnswer" class="mt-3 flex flex-col gap-2">
                        <template x-if="form.answer_type === 'multi_value'">
                            <div class="grid grid-cols-2 gap-2">
                                <template x-for="variable in variables" :key="variable">
                                    <label class="flex items-center gap-2 text-sm"><span class="font-mono" x-text="variable + ' ='"></span><input x-model="testValues[variable]" class="input !py-1.5 font-mono !text-sm"></label>
                                </template>
                            </div>
                        </template>
                        <template x-if="form.answer_type !== 'multi_value'">
                            <input x-model="testInput" class="input !py-2 font-mono !text-base" placeholder="z. B. 14/24 oder 0,5">
                        </template>
                        <button class="btn-outline !py-2">Testen</button>
                    </form>
                    <p x-show="testResult" x-cloak class="mt-3 text-sm"
                       :class="{ 'text-success-400': testResult?.status === 'correct', 'text-danger-400': testResult?.status === 'incorrect', 'text-accent-400': ['invalid', 'error'].includes(testResult?.status) }">
                        <span class="font-semibold" x-text="testLabel"></span>
                        <span x-show="testResult?.message" x-text="' – ' + (testResult?.message ?? '')"></span>
                    </p>
                </div>

                @if ($question)
                    <div class="card p-5 text-sm">
                        <h2 class="label">Einsatz</h2>
                        @forelse ($usage as $use)
                            <p class="mt-2 font-mono text-xs text-ink-300">{{ $use->challenge_date->format('d.m.Y') }} · #{{ $use->number }}</p>
                        @empty
                            <p class="mt-2 text-ink-400">Noch nie eingeplant.</p>
                        @endforelse
                    </div>
                @endif
            </aside>
        </div>
    </div>
</x-layouts.admin>
