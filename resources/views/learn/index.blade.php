<x-layouts.learn>
    @php
        // Suchtext je Artikel (Titel + Zusammenfassung + Kategorie) für die Filterung im Browser
        $search = $categories->flatten(1)->mapWithKeys(fn ($a) => [
            $a['slug'] => mb_strtolower($a['title'].' '.$a['summary'].' '.\App\Learn\LearnCategory::from($a['category'])->label()),
        ]);
    @endphp

    <div x-data="{
            query: '',
            texts: @js($search),
            match(slug) { const q = this.query.trim().toLowerCase(); return !q || q.split(/\s+/).every((w) => this.texts[slug].includes(w)); },
            any(slugs) { return slugs.some((s) => this.match(s)); },
         }">
        {{-- Einstieg --}}
        <section class="mx-auto max-w-2xl text-center">
            <h1 class="font-serif text-4xl font-semibold sm:text-5xl">{{ __('Learn maths') }}</h1>
            <p class="mt-4 font-serif text-xl text-ink-300 italic">
                {{ trans_choice(':count topic, from order of operations to limits – explained step by step.|:count topics, from order of operations to limits – explained step by step.', $total) }}
            </p>

            <label class="relative mx-auto mt-8 block max-w-md">
                <span class="sr-only">{{ __('Search topics') }}</span>
                <svg viewBox="0 0 24 24" class="pointer-events-none absolute top-1/2 left-4 size-5 -translate-y-1/2 text-ink-500" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="6.5"/><path d="M16 16l4 4"/></svg>
                <input type="search" x-model="query" class="input !rounded-full !py-3 !pl-12 !text-base !font-normal" placeholder="{{ __('Search, e.g. fractions, derivative, matrix …') }}" autocomplete="off">
            </label>

            {{-- Sprungmarken zu den Kategorien --}}
            <nav class="mt-6 flex flex-wrap justify-center gap-2" aria-label="{{ __('Categories') }}" x-show="!query">
                @foreach ($categories as $key => $articles)
                    @php($category = \App\Learn\LearnCategory::from($key))
                    <a href="#{{ $key }}" class="rounded-full border border-white/10 px-3 py-1 text-sm text-ink-300 transition hover:border-white/30 hover:text-white">{{ $category->label() }}</a>
                @endforeach
            </nav>
        </section>

        {{-- Kategorien --}}
        <div class="mt-14 flex flex-col gap-14">
            @foreach ($categories as $key => $articles)
                @php($category = \App\Learn\LearnCategory::from($key))
                <section id="{{ $key }}" class="scroll-mt-6" x-show="any(@js($articles->pluck('slug')))" aria-labelledby="cat-{{ $key }}">
                    <div class="flex items-start gap-4">
                        <span class="grid h-12 min-w-12 shrink-0 place-items-center rounded-xl border border-white/10 bg-ink-900 px-2 font-serif text-xl text-accent-500 italic" aria-hidden="true">{{ $category->symbol() }}</span>
                        <div>
                            <h2 id="cat-{{ $key }}" class="font-serif text-2xl font-semibold sm:text-3xl">{{ $category->label() }}</h2>
                            <p class="mt-1 text-ink-400">{{ $category->description() }}</p>
                        </div>
                    </div>

                    <div class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($articles as $article)
                            <a href="{{ route('learn.show', $article['slug']) }}" x-show="match(@js($article['slug']))"
                               class="group card flex flex-col p-4 transition hover:border-accent-500/40">
                                <span class="flex items-start justify-between gap-3">
                                    <span class="font-serif text-lg font-semibold text-white group-hover:text-accent-400">{{ $article['title'] }}</span>
                                    <span class="mt-2 flex shrink-0 gap-0.5" title="{{ __('Level') }} {{ $article['level'] }}/3" aria-label="{{ __('Level') }} {{ $article['level'] }}/3">
                                        @foreach (range(1, 3) as $i)
                                            <span @class(['size-1.5 rounded-full', 'bg-accent-500' => $i <= $article['level'], 'bg-white/15' => $i > $article['level']])></span>
                                        @endforeach
                                    </span>
                                </span>
                                <span class="mt-1.5 text-sm leading-relaxed text-ink-400">{{ $article['summary'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endforeach

            <p x-show="query && !any(Object.keys(texts))" x-cloak class="text-center text-ink-400">{{ __('No topic found. Try a different word.') }}</p>
        </div>
    </div>
</x-layouts.learn>
