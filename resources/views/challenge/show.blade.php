<x-layouts.app :title="'DailyMath #'.$state['challenge']['number'].' · '.$state['challenge']['difficulty']['label'].' – '.$state['challenge']['title']">
    <script type="application/json" id="initial-state">@json($state)</script>

    <div x-data="dailyChallenge(@js($intro))" class="flex min-h-dvh flex-col">
        {{-- Startbildschirm --}}
        @if ($intro)
            <div x-show="intro" x-trap.noscroll="intro"
                 x-transition:leave="transition duration-300 ease-out" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 scale-[1.02]"
                 class="intro-screen fixed inset-0 z-40 grid place-items-center overflow-y-auto bg-ink-950 px-4 py-10" aria-labelledby="intro-title">
                <div class="flex w-full max-w-md flex-col items-center text-center">
                    <svg viewBox="0 0 32 32" class="size-20 sm:size-24" fill="none" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="2" y="2" width="28" height="28" rx="8" stroke="white" stroke-width="1.5" />
                        <path d="M8 17h3l3 6 5-14h5" stroke="var(--color-accent-500)" stroke-width="2" />
                    </svg>

                    <h1 id="intro-title" class="mt-6 font-serif text-6xl font-semibold tracking-tight sm:text-7xl">Daily<span class="text-accent-500 italic">Math</span></h1>

                    <p class="mt-4 font-serif text-xl leading-snug text-ink-300 italic sm:text-2xl">
                        {{ __('Three new math puzzles every day –') }}<br class="hidden sm:inline"> {{ __('easy, medium and hard.') }}
                    </p>

                    <div class="mt-9 grid w-full max-w-xs grid-cols-2 gap-3">
                        <button type="button" class="btn-outline !rounded-full !py-3" @click="statsOpen = true">{{ __('Statistics') }}</button>
                        <button type="button" class="btn-primary !rounded-full !py-3" autofocus @click="startPlaying()" x-text="introPlayLabel">{{ __('Play') }}</button>
                    </div>

                    <div class="mt-9 text-sm">
                        <p class="font-bold text-white" x-text="state.challenge.date">{{ $state['challenge']['date'] }}</p>
                        <p class="mt-0.5 text-ink-400">{{ __('No.') }} <span x-text="state.challenge.number">{{ $state['challenge']['number'] }}</span></p>
                    </div>

                    <x-locale-switcher class="mt-8" />
                </div>
            </div>
        @endif

        {{-- Header: Schriftzug in der Mitte, Serie links, Statistik und Sprache rechts --}}
        <header class="mx-auto grid w-full max-w-5xl grid-cols-[1fr_auto_1fr] items-center gap-3 px-4 pt-5 sm:px-6 sm:pt-7">
            <div class="flex items-center">
                <span class="inline-flex items-center gap-1.5 text-ink-300" :title="@js(__('Current streak')) + ': ' + state.stats.current_streak">
                    <svg viewBox="0 0 24 24" class="size-[1.1rem] text-accent-500" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3c1 4 5 5.5 5 10a5 5 0 0 1-10 0c0-2 1-3.5 2-4.5.3 1.5 1 2.5 2 2.5 0-3-1-5 1-8z"/></svg>
                    {{-- Die Serie als kleine Rechnung, z. B. √16 statt 4 – für Screenreader die echte Zahl --}}
                    <span class="font-serif text-lg leading-none" aria-hidden="true" x-text="streak(state.stats.current_streak)"></span>
                    <span class="sr-only"><span x-text="state.stats.current_streak"></span> {{ __('day streak') }}</span>
                </span>
            </div>

            <div class="text-center">
                <a href="{{ route('challenge.show') }}" class="font-serif text-4xl leading-none font-semibold tracking-tight sm:text-5xl" aria-label="DailyMath – {{ __('Home') }}">Daily<span class="text-accent-500 italic">Math</span></a>
                <p class="label mt-2 hidden sm:block">{{ __('No.') }} <span x-text="state.challenge.number"></span> · <span x-text="state.challenge.date"></span></p>
            </div>

            <nav class="flex items-center justify-end gap-2">
                @if (config('dailymath.dev_tools'))
                    {{-- Übergangsweise: heutige Aufgaben für diesen Browser zurücksetzen --}}
                    <form method="POST" action="{{ route('dev.reset') }}">
                        @csrf
                        <button type="submit" class="icon-btn !border-dashed !border-accent-500/50 !text-accent-400 hover:!border-accent-500"
                                title="{{ __("Reset today's puzzles (dev)") }}" aria-label="{{ __("Reset today's puzzles (dev)") }}">
                            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12a8 8 0 1 0 2.4-5.7L4 8.7"/><path d="M4 4v4.7h4.7"/></svg>
                        </button>
                    </form>
                @endif
                <button type="button" class="icon-btn" @click="statsOpen = true" aria-label="{{ __('Show statistics') }}" title="{{ __('Statistics') }}">
                    <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 20V11M12 20V5M19 20v-6"/></svg>
                </button>
                <x-locale-switcher compact />
            </nav>
        </header>

        <main class="mx-auto flex w-full max-w-5xl flex-1 flex-col gap-5 px-4 pt-5 pb-10 sm:px-6">
            {{-- 1. Niveau und Aufgabe – immer oben und über die volle Breite --}}
            {{-- Niveau-Auswahl: drei Dailys pro Tag (Segment-Umschalter) --}}
            <nav class="mx-auto flex gap-1 rounded-full border border-white/8 bg-ink-900 p-1" aria-label="{{ __('Choose difficulty') }}">
                <template x-for="lvl in state.levels" :key="lvl.slug">
                    <a :href="lvl.url" :aria-current="lvl.current ? 'page' : null"
                       @click.prevent="switchLevel(lvl)" @pointerenter="prefetchLevel(lvl)" @focus="prefetchLevel(lvl)"
                       class="flex w-26 items-center justify-center gap-2 rounded-full py-1.5 text-sm font-medium transition sm:w-32"
                       :class="lvl.current ? 'bg-accent-500 text-ink-950' : 'text-ink-400 hover:text-white'"
                       :title="levelStatusLabel(lvl.status)">
                        <span x-text="lvl.label"></span>
                        <template x-if="lvl.status === 'solved'">
                            <svg viewBox="0 0 24 24" class="size-3.5" :class="lvl.current ? 'text-ink-950' : 'text-accent-500'" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-label="{{ __('Solved') }}"><path d="M5 12l5 5 9-10"/></svg>
                        </template>
                        <template x-if="lvl.status === 'given_up'">
                            <span class="size-1.5 rounded-full bg-current opacity-50" aria-label="{{ __('Gave up') }}"></span>
                        </template>
                    </a>
                </template>
            </nav>

            {{-- Daily-Challenge --}}
            <article class="card px-5 py-6 sm:px-10 sm:py-8" aria-label="{{ __('Puzzle') }}">
                <p class="label flex flex-wrap items-center gap-x-2 gap-y-1">
                    <span class="text-accent-500">{{ __('Problem') }} № <span x-text="state.challenge.number"></span></span>
                    <span aria-hidden="true">/</span>
                    <span x-text="state.challenge.topic"></span>
                    <span aria-hidden="true">/</span>
                    <span class="inline-flex items-center gap-1.5" :title="@js(__('Difficulty')) + ': ' + state.challenge.difficulty.label">
                        <span class="flex gap-0.5" aria-hidden="true">
                            <template x-for="i in 3" :key="i">
                                <span class="size-1.5 rounded-full" :class="i <= state.challenge.difficulty.level ? 'bg-accent-500' : 'bg-white/15'"></span>
                            </template>
                        </span>
                        <span x-text="state.challenge.difficulty.label"></span>
                    </span>
                </p>

                <h1 class="mt-3 font-serif text-2xl font-semibold sm:text-[2rem]" x-text="state.challenge.title"></h1>

                <div class="math-content task-prompt mt-4 text-xl leading-relaxed text-ink-300 sm:text-[1.35rem]" x-math="state.challenge.prompt"></div>
            </article>

            {{-- Umschalter Antwort/Notizblock (nur mobil) --}}
            <div x-ref="viewTabs" class="grid grid-cols-2 gap-1 rounded-full border border-white/8 bg-ink-900 p-1 text-sm font-medium lg:hidden" role="tablist">
                <button type="button" role="tab" :aria-selected="view === 'task'" @click="view = 'task'"
                        class="rounded-full py-1.5 transition" :class="view === 'task' ? 'bg-white/10 text-white' : 'text-ink-400'">{{ __('Answer') }}</button>
                <button type="button" role="tab" :aria-selected="view === 'notes'" @click="view = 'notes'"
                        class="rounded-full py-1.5 transition" :class="view === 'notes' ? 'bg-white/10 text-white' : 'text-ink-400'">{{ __('Notepad') }}</button>
            </div>

            {{-- 2. Darunter: Notizblock (links, groß) und Antwort/Hinweise/Ergebnis (rechts) --}}
            <div class="grid grid-cols-[minmax(0,1fr)] items-start gap-4 lg:grid-cols-[minmax(0,1fr)_360px]">
                <section class="vt-notepad lg:col-start-1 lg:row-start-1" :class="[view === 'notes' ? '' : 'max-lg:hidden', notesWide && 'lg:col-span-2']" aria-label="{{ __('Notepad') }}">
                    @include('challenge.partials.notepad', [
                        'storageKey' => 'dailymath:notes:'.$state['challenge']['number'].':'.$state['challenge']['level'],
                        'keepPrefix' => 'dailymath:notes:'.$state['challenge']['number'].':',
                    ])
                </section>

                {{-- Bei breitem Notizblock rutschen Taschenrechner und Hinweise darunter (nebeneinander) --}}
                <section class="vt-answer flex flex-col gap-4" aria-label="{{ __('Answer') }}"
                         :class="[view === 'task' ? '' : 'max-lg:hidden', notesWide ? 'lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:grid lg:grid-cols-2 lg:items-start' : 'lg:col-start-2 lg:row-start-1']">
                    {{-- Lösungsbereich im Taschenrechner-Look --}}
                    <section class="calc" x-ref="calculator" x-show="!finished" aria-label="{{ __('Answer') }}"
                             :class="{ 'calc-correct': celebrating, 'calc-wrong': shaking }">
                        <form @submit.prevent="submitAnswer" class="flex flex-col gap-3">
                            {{-- Display --}}
                            <div class="calc-display relative overflow-hidden">
                                {{-- Jubel nach richtiger Antwort --}}
                                <div x-show="celebrating" x-cloak x-transition.opacity.duration.150ms
                                     class="absolute inset-0 z-10 flex items-center justify-center gap-3 bg-ink-950 text-success-400 shadow-[inset_0_0_32px_rgb(95_213_154/0.3)]" role="status">
                                    <svg viewBox="0 0 24 24" class="calc-pop size-9" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12l5 5 9-10"/></svg>
                                    <span class="calc-pop font-mono text-3xl font-bold tracking-wider sm:text-4xl">{{ __('CORRECT!') }}</span>
                                </div>
                                <div class="label flex items-center justify-between">
                                    <label for="answer-input">{{ __('Your answer') }}</label>
                                    <span><span x-text="state.attempt.attempts"></span> <span x-text="state.attempt.attempts === 1 ? @js(__('try')) : @js(__('tries'))"></span></span>
                                </div>

                                {{-- Zahl / Bruch / Lösungsmenge --}}
                                <template x-if="hasKeypad">
                                    <div class="mt-1 flex items-baseline gap-2">
                                        <input id="answer-input" x-ref="answerInput" type="text" class="calc-input" x-model="answer"
                                               :inputmode="touch ? 'none' : 'text'" autocomplete="off" autocapitalize="off" spellcheck="false"
                                               :placeholder="state.challenge.placeholder || '0'" :readonly="busy">
                                        <span class="shrink-0 text-xl font-semibold text-ink-400" x-show="state.challenge.unit" x-text="state.challenge.unit"></span>
                                    </div>
                                </template>

                                {{-- Mehrere benannte Werte --}}
                                <template x-if="type === 'multi_value'">
                                    <div class="mt-2 grid gap-2 sm:grid-cols-2">
                                        <template x-for="(variable, index) in state.challenge.variables" :key="variable">
                                            <label class="flex items-baseline gap-2">
                                                <span class="text-xl font-extrabold text-accent-400"><span x-text="variable"></span>&nbsp;=</span>
                                                <input type="text" class="calc-input !text-2xl" x-model="values[variable]" autocomplete="off" placeholder="0"
                                                       :id="index === 0 ? 'answer-input' : null" :readonly="busy">
                                            </label>
                                        </template>
                                    </div>
                                </template>

                                {{-- Multiple Choice: gewählte Option im Display --}}
                                <template x-if="type === 'multiple_choice'">
                                    <p class="calc-input mt-1" :class="answer ? '' : '!text-ink-500'" x-text="choiceDisplay"></p>
                                </template>
                            </div>

                            {{-- Tastenfeld --}}
                            <template x-if="hasKeypad">
                                <div class="grid grid-cols-5 gap-2" aria-label="{{ __('Keypad') }}">
                                    <template x-for="key in keypad" :key="key.label">
                                        <button :type="key.action === 'submit' ? 'submit' : 'button'" class="calc-key"
                                                :class="{ 'calc-key-op': key.kind === 'op', 'calc-key-fn': key.kind === 'fn', 'calc-key-eq': key.action === 'submit' }"
                                                :disabled="key.action === 'submit' ? (busy || !canSubmit) : busy"
                                                :aria-label="key.aria || key.label" :title="key.aria || null"
                                                @click="key.action !== 'submit' && pressKey(key)">
                                            <span x-text="key.label"></span>
                                        </button>
                                    </template>
                                </div>
                            </template>

                            {{-- Multiple Choice --}}
                            <template x-if="type === 'multiple_choice'">
                                <div class="grid gap-2 sm:grid-cols-2" role="radiogroup">
                                    <template x-for="(option, index) in state.challenge.options" :key="option.key">
                                        <button type="button" role="radio" :aria-checked="answer === option.key" @click="answer = option.key"
                                                class="calc-key !h-auto !justify-start gap-3 !px-4 !py-3 text-left"
                                                :class="answer === option.key ? '!border-accent-500 !bg-accent-500/15' : ''">
                                            <span class="grid size-7 shrink-0 place-items-center rounded-lg border text-sm font-extrabold"
                                                  :class="answer === option.key ? 'border-accent-500 bg-accent-500 text-ink-950' : 'border-white/20 text-ink-300'"
                                                  x-text="String.fromCharCode(65 + index)"></span>
                                            <span class="math-content text-lg font-semibold" x-math="option.label"></span>
                                        </button>
                                    </template>
                                </div>
                            </template>

                            {{-- Rückmeldung --}}
                            <div x-show="feedback" x-cloak x-transition.opacity
                                 class="flex items-start gap-3 rounded-md border px-4 py-3 text-sm font-semibold"
                                 :class="{
                                    'border-danger-400/40 bg-danger-400/10 text-danger-400': feedback?.status === 'incorrect',
                                    'border-accent-500/40 bg-accent-500/10 text-accent-300': feedback?.status === 'invalid',
                                 }"
                                 role="status" aria-live="polite">
                                <span x-text="feedback?.text"></span>
                            </div>

                            {{-- Prüfen-Taste für Antworttypen ohne Tastenfeld --}}
                            <button type="submit" x-show="!hasKeypad" class="calc-key calc-key-eq !text-base" :disabled="busy || !canSubmit">
                                {{ __('Check answer') }}
                            </button>
                        </form>
                    </section>

                    {{-- Hinweise – gestaltet wie Fußnoten --}}
                    <section class="card p-4 sm:p-5" aria-label="{{ __('Hints') }}" x-show="state.attempt.hints_total > 0">
                        <div class="flex items-center justify-between gap-3">
                            <h2 class="label">{{ __('Hints') }}</h2>
                            <span class="font-mono text-xs text-ink-500"><span x-text="state.hints.length"></span>/<span x-text="state.attempt.hints_total"></span></span>
                        </div>

                        <ol class="mt-3 flex flex-col divide-y divide-white/6" x-show="state.hints.length">
                            <template x-for="hint in state.hints" :key="hint.position">
                                <li class="flex gap-3 py-3 first:pt-1" x-transition>
                                    <span class="font-serif text-lg leading-6 text-accent-500 italic" x-text="hint.position"></span>
                                    <div class="min-w-0">
                                        <p class="label !text-ink-400" x-text="hint.label"></p>
                                        <div class="math-content mt-1 text-[1.05rem] leading-relaxed text-ink-300" x-math="hint.content"></div>
                                    </div>
                                </li>
                            </template>
                        </ol>

                        <div class="mt-4 flex flex-wrap items-center gap-3" x-show="!finished">
                            <button type="button" class="btn-outline" @click="revealHint" :disabled="busy || state.hints.length >= state.attempt.hints_total">
                                <span x-text="state.hints.length === 0 ? @js(__('Reveal first hint')) : @js(__('Reveal next hint'))"></span>
                            </button>
                        </div>
                        <p class="mt-3 text-xs text-ink-500" x-show="!finished">{{ __('Hints you use will show up in your daily result.') }}</p>
                    </section>

                </section>

                {{-- Ergebnis: erscheint nach dem Lösen über die volle Breite unter Notizblock und Antwort (mobil unabhängig vom Reiter) --}}
                <template x-if="state.result">
                    <section class="vt-result card scroll-mt-20 overflow-hidden lg:col-span-2" :class="notesWide ? 'lg:row-start-3' : 'lg:row-start-2'" aria-label="{{ __('Result') }}" x-init="justFinished && $el.scrollIntoView({ behavior: 'smooth', block: 'start' })">
                        <div class="border-b border-white/10 p-5 sm:p-6">
                            <div class="flex items-center gap-4">
                                <span class="font-serif text-5xl leading-none" :class="[state.result.solved ? 'text-accent-500' : 'text-ink-500', justFinished && 'result-pop']" aria-hidden="true">∎</span>
                                <div>
                                    <p class="label" :class="state.result.solved && '!text-accent-500'"
                                       x-text="state.result.solved ? @js(__('q.e.d. – correct!')) : @js(__('Gave up'))"></p>
                                    <h2 class="mt-1 font-serif text-2xl font-semibold" x-text="state.result.solved ? solvedHeadline : @js(__('You\'ll get it tomorrow.'))"></h2>
                                </div>
                            </div>

                            <dl                            </div>

                            <dl class="mt-6 grid grid-cols-2 gap-3 sm:grid-cols-4" :class="justFinished && state.result.solved && 'result-stagger'">
                                <div class="rounded-lg border border-white/6 bg-ink-950 p-3">
                                    <dt class="label">{{ __('Tries') }}</dt>
                                    <dd class="mt-1 font-mono text-2xl font-medium" x-text="state.attempt.attempts"></dd>
                                </div>
                                <div class="rounded-lg border border-white/6 bg-ink-950 p-3">
                                    <dt class="label">{{ __('Hints') }}</dt>
                                    <dd class="mt-1 font-mono text-2xl font-medium"><span x-text="state.attempt.hints_used"></span><span class="text-base text-ink-500">/<span x-text="state.attempt.hints_total"></span></span></dd>
                                </div>
                                <div class="rounded-lg border border-white/6 bg-ink-950 p-3">
                                    <dt class="label">{{ __('Time') }}</dt>
                                    <dd class="mt-1 font-mono text-2xl font-medium" x-text="formatDuration(state.result.duration)"></dd>
                                </div>
                                <div class="rounded-lg border border-white/6 bg-ink-950 p-3">
                                    <dt class="label">{{ __('Streak') }}</dt>
                                    <dd class="mt-1 font-serif text-2xl font-medium text-accent-400" :title="state.stats.current_streak" x-text="streak(state.stats.current_streak)"></dd>
                                </div>
                            </dl>

                            <div class="mt-6 flex flex-wrap items-center gap-3">
                                <button type="button" class="btn-primary" @click="share">
                                    <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12v7a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-7M16 6l-4-4-4 4M12 2v13"/></svg>
                                    <span x-text="copied ? @js(__('Copied!')) : @js(__('Share result'))"></span>
                                </button>
                                <template x-if="nextOpenLevel">
                                    <a :href="nextOpenLevel.url" class="btn-outline">
                                        {{ __('Continue with') }} <span x-text="nextOpenLevel.label"></span>
                                        <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                                    </a>
                                </template>
                                <p class="text-sm text-ink-400" x-show="!nextOpenLevel">{{ __('New puzzles in') }} <span class="font-bold tabular-nums text-white" x-text="countdown"></span></p>
                            </div>
                        </div>

                        <div class="p-5 sm:p-6">
                            <h3 class="label">{{ __('Solution') }}</h3>
                            <div class="math-content mt-3 text-xl leading-relaxed text-ink-300" x-math="state.result.solution"></div>
                            <p class="mt-2 text-right font-serif text-xl text-ink-500" aria-hidden="true">∎</p>

                            <template x-if="state.result.background">
                                <div class="mt-4 border-l-2 border-accent-500/60 pl-4">
                                    <p class="font-serif text-[1.05rem] font-semibold text-white italic">{{ __('Remark.') }}</p>
                                    <div class="math-content mt-1 text-[1.05rem] leading-relaxed text-ink-300" x-math="state.result.background"></div>
                                </div>
                            </template>
                        </div>
                    </section>
                </template>
            </div>
        </main>

        <footer class="label py-8 text-center">
            {{ __('A small math challenge every day.') }}
        </footer>

        {{-- Statistik-Dialog --}}
        <div x-show="statsOpen" x-cloak class="fixed inset-0 z-50 grid place-items-center p-4" role="dialog" aria-modal="true" aria-labelledby="stats-title"
             @keydown.escape.window="statsOpen = false">
            <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" @click="statsOpen = false" x-show="statsOpen" x-transition.opacity></div>
            <div class="card relative w-full max-w-md bg-ink-950 p-6 sm:p-8" x-show="statsOpen" x-transition x-trap.noscroll="statsOpen">
                <div class="flex items-center justify-between">
                    <h2 id="stats-title" class="text-xl font-extrabold">{{ __('Your statistics') }}</h2>
                    <button type="button" class="tool-btn" @click="statsOpen = false" aria-label="{{ __('Close') }}">
                        <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
                    </button>
                </div>

                <dl class="mt-6 grid grid-cols-3 gap-3 text-center">
                    <template x-for="tile in statTiles" :key="tile.label">
                        <div class="rounded-md bg-ink-900 px-2 py-4">
                            <dd class="text-2xl font-extrabold" :class="[tile.accent ? 'text-accent-400' : '', tile.math && 'font-serif !text-xl !font-medium whitespace-nowrap']" :title="tile.title ?? null" x-text="tile.value"></dd>
                            <dt class="mt-1 text-xs font-semibold text-ink-400" x-text="tile.label"></dt>
                        </div>
                    </template>
                </dl>

                <p class="mt-6 text-sm text-ink-400">
                    {{ __('No account needed: your streak and results are stored anonymously in this browser. In another browser, on another device or after clearing your cookies, you start from scratch.') }}
                </p>
            </div>
        </div>
    </div>
</x-layouts.app>
