<x-layouts.app :title="'DailyMath #'.$state['challenge']['number'].' · '.$state['challenge']['difficulty']['label'].' – '.$state['challenge']['title']">
    <script type="application/json" id="initial-state">@json($state)</script>

    <div x-data="dailyChallenge(@js($intro))" class="flex min-h-dvh flex-col">
        {{-- Startbildschirm --}}
        @if ($intro)
            <div x-show="intro" x-trap.noscroll="intro"
                 x-transition:leave="transition duration-300 ease-out" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 scale-[1.02]"
                 class="fixed inset-0 z-40 grid place-items-center overflow-y-auto bg-ink-950 px-4 py-10" aria-labelledby="intro-title">
                <div class="flex w-full max-w-md flex-col items-center text-center">
                    <svg viewBox="0 0 32 32" class="size-20 sm:size-24" fill="none" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="2" y="2" width="28" height="28" rx="8" stroke="white" stroke-width="1.5" />
                        <path d="M8 17h3l3 6 5-14h5" stroke="var(--color-accent-500)" stroke-width="2" />
                    </svg>

                    <h1 id="intro-title" class="mt-5 text-5xl font-black tracking-tight sm:text-6xl">Daily<span class="text-accent-500">Math</span></h1>

                    <p class="mt-4 text-xl leading-snug text-ink-300 sm:text-2xl">
                        Jeden Tag drei neue Matheaufgaben –<br class="hidden sm:inline"> leicht, mittel und schwer.
                    </p>

                    <div class="mt-9 grid w-full max-w-xs grid-cols-2 gap-3">
                        <button type="button" class="btn-outline !rounded-full !py-3" @click="statsOpen = true">Statistik</button>
                        <button type="button" class="btn-primary !rounded-full !py-3" autofocus @click="startPlaying()" x-text="introPlayLabel">Spielen</button>
                    </div>

                    <div class="mt-9 text-sm">
                        <p class="font-bold text-white" x-text="state.challenge.date">{{ $state['challenge']['date'] }}</p>
                        <p class="mt-0.5 text-ink-400">Nr. <span x-text="state.challenge.number">{{ $state['challenge']['number'] }}</span></p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Header --}}
        <header class="sticky top-0 z-30 border-b border-white/8 bg-ink-950/85 backdrop-blur">
            <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6">
                <x-logo />

                <nav class="flex items-center gap-1 sm:gap-2">
                    <div class="chip !border-accent-500/30 !text-accent-300" title="Aktuelle Serie">
                        <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3c1 4 5 5.5 5 10a5 5 0 0 1-10 0c0-2 1-3.5 2-4.5.3 1.5 1 2.5 2 2.5 0-3-1-5 1-8z"/></svg>
                        <span x-text="state.stats.current_streak"></span>
                        <span class="sr-only">Tage Serie</span>
                    </div>
                    <button type="button" class="btn-ghost !px-2.5" @click="statsOpen = true" aria-label="Statistik anzeigen">
                        <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20V4M4 20h16"/><rect x="7" y="12" width="3" height="5" rx=".5"/><rect x="12" y="8" width="3" height="9" rx=".5"/><rect x="17" y="5" width="3" height="12" rx=".5"/></svg>
                        <span class="hidden sm:inline">Statistik</span>
                    </button>
                </nav>
            </div>
        </header>

        {{-- Umschalter Aufgabe/Notizblock (nur mobil) --}}
        <div class="sticky top-16 z-20 border-b border-white/8 bg-ink-950/85 px-4 py-2 backdrop-blur lg:hidden">
            <div class="grid grid-cols-2 gap-1 rounded-xl border border-white/10 bg-ink-900 p-1 text-sm font-bold" role="tablist">
                <button type="button" role="tab" :aria-selected="view === 'task'" @click="view = 'task'"
                        class="rounded-lg py-2 transition" :class="view === 'task' ? 'bg-accent-500 text-ink-950' : 'text-ink-300'">Aufgabe</button>
                <button type="button" role="tab" :aria-selected="view === 'notes'" @click="view = 'notes'"
                        class="rounded-lg py-2 transition" :class="view === 'notes' ? 'bg-accent-500 text-ink-950' : 'text-ink-300'">Notizblock</button>
            </div>
        </div>

        <main class="mx-auto grid w-full max-w-7xl flex-1 grid-cols-[minmax(0,1fr)] gap-6 px-4 py-6 sm:px-6 lg:grid-cols-[minmax(0,1fr)_minmax(0,1.15fr)] lg:py-10">
            {{-- Linke Spalte: Aufgabe, Antwort, Hinweise, Ergebnis --}}
            <section class="flex flex-col gap-5" :class="view === 'task' ? '' : 'max-lg:hidden'" aria-label="Aufgabe">
                {{-- Niveau-Auswahl: drei Dailys pro Tag --}}
                <nav class="grid grid-cols-3 gap-2" aria-label="Schwierigkeitsgrad wählen">
                    <template x-for="lvl in state.levels" :key="lvl.slug">
                        <a :href="lvl.url" :aria-current="lvl.current ? 'page' : null"
                           @click.prevent="switchLevel(lvl)" @pointerenter="prefetchLevel(lvl)" @focus="prefetchLevel(lvl)"
                           class="group flex flex-col items-center gap-1.5 rounded-2xl border px-2 py-3 transition"
                           :class="lvl.current ? 'border-accent-500/70 bg-accent-500/10' : 'border-white/10 bg-ink-900 hover:border-white/25'">
                            <span class="flex items-center gap-2">
                                <span class="flex gap-0.5" aria-hidden="true">
                                    <template x-for="i in 3" :key="i">
                                        <span class="size-1.5 rounded-full" :class="i <= lvl.level ? 'bg-accent-500' : 'bg-white/20'"></span>
                                    </template>
                                </span>
                                <span class="text-sm font-extrabold" :class="lvl.current ? 'text-white' : 'text-ink-300 group-hover:text-white'" x-text="lvl.label"></span>
                            </span>
                            <span class="flex h-4 items-center gap-1 text-xs font-semibold"
                                  :class="{ 'text-accent-400': lvl.status === 'solved', 'text-ink-400': lvl.status !== 'solved' }">
                                <template x-if="lvl.status === 'solved'">
                                    <svg viewBox="0 0 24 24" class="size-3.5" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12l5 5 9-10"/></svg>
                                </template>
                                <span x-text="levelStatusLabel(lvl.status)"></span>
                            </span>
                        </a>
                    </template>
                </nav>

                {{-- Daily-Challenge --}}
                <article class="card relative overflow-hidden p-6 sm:p-8">
                    @foreach (\App\Enums\Topic::cases() as $topic)
                        <x-topic-icon :topic="$topic->value" x-show="state.challenge.topic_key === '{{ $topic->value }}'"
                                      :style="$topic->value === $state['challenge']['topic_key'] ? null : 'display: none'"
                                      class="absolute -top-1 right-4 size-24 opacity-15 sm:right-6 sm:size-28" />
                    @endforeach

                    <p class="text-sm font-semibold text-ink-400">
                        <span class="text-accent-400">#<span x-text="state.challenge.number"></span></span>
                        · <span x-text="state.challenge.date"></span>
                    </p>
                    <h1 class="mt-2 pr-20 text-2xl font-extrabold tracking-tight sm:text-3xl" x-text="state.challenge.title"></h1>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="chip" x-text="state.challenge.topic"></span>
                        <span class="chip" :title="'Schwierigkeit: ' + state.challenge.difficulty.label">
                            <span class="flex gap-0.5" aria-hidden="true">
                                <template x-for="i in 3" :key="i">
                                    <span class="size-1.5 rounded-full" :class="i <= state.challenge.difficulty.level ? 'bg-accent-500' : 'bg-white/20'"></span>
                                </template>
                            </span>
                            <span x-text="state.challenge.difficulty.label"></span>
                        </span>
                    </div>

                    <div class="math-content mt-6 text-lg leading-relaxed text-ink-300" x-math="state.challenge.prompt"></div>
                </article>

                {{-- Lösungsbereich --}}
                <section class="card p-6 sm:p-8" x-show="!finished" aria-label="Antwort">
                    <form @submit.prevent="submitAnswer" class="flex flex-col gap-4">
                        <label class="text-sm font-bold uppercase tracking-wider text-ink-400" for="answer-input">Deine Antwort</label>

                        {{-- Zahl / Bruch / Lösungsmenge --}}
                        <template x-if="['numeric', 'fraction', 'solution_set'].includes(type)">
                            <div>
                                <div class="flex items-center gap-3">
                                    <input id="answer-input" x-ref="answerInput" type="text" class="input" x-model="answer"
                                           inputmode="text" autocomplete="off" autocapitalize="off" spellcheck="false"
                                           :placeholder="state.challenge.placeholder || 'Ergebnis eingeben'" :readonly="busy">
                                    <span class="shrink-0 text-lg font-semibold text-ink-400" x-show="state.challenge.unit" x-text="state.challenge.unit"></span>
                                </div>
                                <div class="mt-3 flex flex-wrap gap-2" aria-label="Sonderzeichen einfügen">
                                    <template x-for="key in ['/', '−', ',', '√', 'π', ';']" :key="key">
                                        <button type="button" class="btn-outline !px-3 !py-1.5 font-mono" @click="insert(key)" x-text="key"></button>
                                    </template>
                                </div>
                            </div>
                        </template>

                        {{-- Mehrere benannte Werte --}}
                        <template x-if="type === 'multi_value'">
                            <div class="grid gap-3 sm:grid-cols-2">
                                <template x-for="(variable, index) in state.challenge.variables" :key="variable">
                                    <label class="flex items-center gap-3">
                                        <span class="w-8 text-right text-xl font-extrabold text-accent-400"><span x-text="variable"></span> =</span>
                                        <input type="text" class="input" x-model="values[variable]" autocomplete="off" :id="index === 0 ? 'answer-input' : null" :readonly="busy">
                                    </label>
                                </template>
                            </div>
                        </template>

                        {{-- Multiple Choice --}}
                        <template x-if="type === 'multiple_choice'">
                            <div class="grid gap-3 sm:grid-cols-2" role="radiogroup">
                                <template x-for="(option, index) in state.challenge.options" :key="option.key">
                                    <button type="button" role="radio" :aria-checked="answer === option.key" @click="answer = option.key"
                                            class="flex items-center gap-3 rounded-xl border px-4 py-3 text-left transition"
                                            :class="answer === option.key ? 'border-accent-500 bg-accent-500/10' : 'border-white/15 hover:border-white/30'">
                                        <span class="grid size-7 shrink-0 place-items-center rounded-lg border text-sm font-extrabold"
                                              :class="answer === option.key ? 'border-accent-500 bg-accent-500 text-ink-950' : 'border-white/20 text-ink-300'"
                                              x-text="String.fromCharCode(65 + index)"></span>
                                        <span class="math-content text-lg" x-math="option.label"></span>
                                    </button>
                                </template>
                            </div>
                        </template>

                        {{-- Rückmeldung --}}
                        <div x-show="feedback" x-cloak x-transition.opacity
                             class="flex items-start gap-3 rounded-xl border px-4 py-3 text-sm font-semibold"
                             :class="{
                                'border-danger-400/40 bg-danger-400/10 text-danger-400': feedback?.status === 'incorrect',
                                'border-accent-500/40 bg-accent-500/10 text-accent-300': feedback?.status === 'invalid',
                             }"
                             role="status" aria-live="polite">
                            <span x-text="feedback?.text"></span>
                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-3">
                            <p class="text-sm text-ink-400">
                                <span x-text="state.attempt.attempts"></span>
                                <span x-text="state.attempt.attempts === 1 ? 'Versuch' : 'Versuche'"></span>
                            </p>
                            <button type="submit" class="btn-primary min-w-40 !py-3 !text-base" :disabled="busy || !canSubmit">
                                Antwort prüfen
                                <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </button>
                        </div>
                    </form>
                </section>

                {{-- Hinweise --}}
                <section class="card p-6 sm:p-8" aria-label="Hinweise" x-show="state.attempt.hints_total > 0">
                    <div class="flex items-center justify-between gap-3">
                        <h2 class="flex items-center gap-2 text-sm font-bold uppercase tracking-wider text-ink-400">
                            <svg viewBox="0 0 24 24" class="size-5 text-accent-500" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18h6M10 21h4M12 3a6 6 0 0 0-3.5 10.9c.6.5 1 1.2 1 2V16h5v-.1c0-.8.4-1.5 1-2A6 6 0 0 0 12 3z"/></svg>
                            Hinweise
                        </h2>
                        <span class="text-sm font-semibold text-ink-400"><span x-text="state.hints.length"></span> / <span x-text="state.attempt.hints_total"></span></span>
                    </div>

                    <ol class="mt-4 flex flex-col gap-3" x-show="state.hints.length">
                        <template x-for="hint in state.hints" :key="hint.position">
                            <li class="rounded-2xl border border-white/10 bg-ink-850 p-4" x-transition>
                                <p class="text-xs font-bold uppercase tracking-wider text-accent-400">
                                    Hinweis <span x-text="hint.position"></span> · <span x-text="hint.label"></span>
                                </p>
                                <div class="math-content mt-2 leading-relaxed text-ink-300" x-math="hint.content"></div>
                            </li>
                        </template>
                    </ol>

                    <div class="mt-4 flex flex-wrap items-center gap-3" x-show="!finished">
                        <button type="button" class="btn-outline" @click="revealHint" :disabled="busy || state.hints.length >= state.attempt.hints_total">
                            <span x-text="state.hints.length === 0 ? 'Ersten Hinweis aufdecken' : 'Nächsten Hinweis aufdecken'"></span>
                        </button>

                        <template x-if="!confirmGiveUp">
                            <button type="button" class="btn-ghost" @click="confirmGiveUp = true" :disabled="busy">Lösung anzeigen</button>
                        </template>
                        <template x-if="confirmGiveUp">
                            <div class="flex flex-wrap items-center gap-2 text-sm">
                                <span class="text-ink-400">Wirklich aufgeben?</span>
                                <button type="button" class="btn-outline !border-danger-400/40 !py-1.5 !text-danger-400" @click="giveUp" :disabled="busy">Ja, Lösung zeigen</button>
                                <button type="button" class="btn-ghost !py-1.5" @click="confirmGiveUp = false">Abbrechen</button>
                            </div>
                        </template>
                    </div>
                    <p class="mt-3 text-xs text-ink-500" x-show="!finished">Genutzte Hinweise erscheinen in deinem Tagesergebnis.</p>
                </section>

                {{-- Ergebnisbereich --}}
                <template x-if="state.result">
                    <section class="card overflow-hidden" aria-label="Ergebnis" x-init="justFinished && $el.scrollIntoView({ behavior: 'smooth', block: 'start' })">
                        <div class="border-b border-white/10 p-6 sm:p-8" :class="state.result.solved ? 'bg-accent-500/8' : ''">
                            <p class="text-sm font-bold uppercase tracking-wider" :class="state.result.solved ? 'text-accent-400' : 'text-ink-400'"
                               x-text="state.result.solved ? 'Geschafft!' : 'Aufgegeben'"></p>
                            <h2 class="mt-1 text-2xl font-extrabold" x-text="state.result.solved ? solvedHeadline : 'Morgen klappt es bestimmt.'"></h2>

                            <dl class="mt-6 grid grid-cols-2 gap-3 sm:grid-cols-4">
                                <div class="rounded-2xl border border-white/10 bg-ink-950/60 p-3">
                                    <dt class="text-xs font-semibold text-ink-400">Versuche</dt>
                                    <dd class="mt-1 text-2xl font-extrabold" x-text="state.attempt.attempts"></dd>
                                </div>
                                <div class="rounded-2xl border border-white/10 bg-ink-950/60 p-3">
                                    <dt class="text-xs font-semibold text-ink-400">Hinweise</dt>
                                    <dd class="mt-1 text-2xl font-extrabold"><span x-text="state.attempt.hints_used"></span><span class="text-base text-ink-500">/<span x-text="state.attempt.hints_total"></span></span></dd>
                                </div>
                                <div class="rounded-2xl border border-white/10 bg-ink-950/60 p-3">
                                    <dt class="text-xs font-semibold text-ink-400">Zeit</dt>
                                    <dd class="mt-1 text-2xl font-extrabold" x-text="formatDuration(state.result.duration)"></dd>
                                </div>
                                <div class="rounded-2xl border border-white/10 bg-ink-950/60 p-3">
                                    <dt class="text-xs font-semibold text-ink-400">Serie</dt>
                                    <dd class="mt-1 text-2xl font-extrabold text-accent-400" x-text="state.stats.current_streak"></dd>
                                </div>
                            </dl>

                            <div class="mt-6 flex flex-wrap items-center gap-3">
                                <button type="button" class="btn-primary" @click="share">
                                    <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12v7a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-7M16 6l-4-4-4 4M12 2v13"/></svg>
                                    <span x-text="copied ? 'Kopiert!' : 'Ergebnis teilen'"></span>
                                </button>
                                <template x-if="nextOpenLevel">
                                    <a :href="nextOpenLevel.url" class="btn-outline">
                                        Weiter mit <span x-text="nextOpenLevel.label"></span>
                                        <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                                    </a>
                                </template>
                                <p class="text-sm text-ink-400" x-show="!nextOpenLevel">Neue Aufgaben in <span class="font-bold tabular-nums text-white" x-text="countdown"></span></p>
                            </div>
                        </div>

                        <div class="p-6 sm:p-8">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-ink-400">Lösungsweg</h3>
                            <div class="math-content mt-3 text-lg leading-relaxed text-ink-300" x-math="state.result.solution"></div>

                            <template x-if="state.result.background">
                                <div class="mt-6 rounded-2xl border border-white/10 bg-ink-850 p-4">
                                    <h3 class="text-xs font-bold uppercase tracking-wider text-accent-400">Hintergrund</h3>
                                    <div class="math-content mt-2 leading-relaxed text-ink-300" x-math="state.result.background"></div>
                                </div>
                            </template>
                        </div>
                    </section>
                </template>
            </section>

            {{-- Rechte Spalte: Schreibbereich --}}
            <section class="lg:sticky lg:top-24 lg:self-start" :class="view === 'notes' ? '' : 'max-lg:hidden'" aria-label="Notizblock">
                @include('challenge.partials.notepad', [
                    'storageKey' => 'dailymath:notes:'.$state['challenge']['number'].':'.$state['challenge']['level'],
                    'keepPrefix' => 'dailymath:notes:'.$state['challenge']['number'].':',
                ])
            </section>
        </main>

        <footer class="border-t border-white/8 py-6 text-center text-sm text-ink-500">
            Jeden Tag eine kleine mathematische Herausforderung.
        </footer>

        {{-- Statistik-Dialog --}}
        <div x-show="statsOpen" x-cloak class="fixed inset-0 z-50 grid place-items-center p-4" role="dialog" aria-modal="true" aria-labelledby="stats-title"
             @keydown.escape.window="statsOpen = false">
            <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" @click="statsOpen = false" x-show="statsOpen" x-transition.opacity></div>
            <div class="card relative w-full max-w-md p-6 sm:p-8" x-show="statsOpen" x-transition x-trap.noscroll="statsOpen">
                <div class="flex items-center justify-between">
                    <h2 id="stats-title" class="text-xl font-extrabold">Deine Statistik</h2>
                    <button type="button" class="tool-btn" @click="statsOpen = false" aria-label="Schließen">
                        <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
                    </button>
                </div>

                <dl class="mt-6 grid grid-cols-3 gap-3 text-center">
                    <template x-for="tile in statTiles" :key="tile.label">
                        <div class="rounded-2xl border border-white/10 bg-ink-850 px-2 py-4">
                            <dd class="text-2xl font-extrabold" :class="tile.accent ? 'text-accent-400' : ''" x-text="tile.value"></dd>
                            <dt class="mt-1 text-xs font-semibold text-ink-400" x-text="tile.label"></dt>
                        </div>
                    </template>
                </dl>

                <p class="mt-6 text-sm text-ink-400">
                    Kein Konto nötig: Deine Serie und Ergebnisse werden anonym an diesen Browser gebunden. In einem anderen Browser, auf einem anderen Gerät oder nach dem Löschen der Cookies startest du von vorn.
                </p>
            </div>
        </div>
    </div>
</x-layouts.app>
