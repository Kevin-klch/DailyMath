<x-layouts.learn :title="$article['title']">
    {{-- Brotkrumen --}}
    <nav class="label flex flex-wrap items-center gap-2" aria-label="{{ __('Breadcrumb') }}">
        <a href="{{ route('learn.index') }}" class="hover:text-white">{{ __('Learn') }}</a>
        <span aria-hidden="true">/</span>
        <a href="{{ route('learn.index') }}#{{ $category->value }}" class="hover:text-white">{{ $category->label() }}</a>
    </nav>

    <div class="mt-4 grid items-start gap-10 lg:grid-cols-[minmax(0,1fr)_260px]">
        <article class="min-w-0">
            <header>
                <h1 class="font-serif text-4xl font-semibold sm:text-5xl">{{ $article['title'] }}</h1>
                <p class="mt-3 font-serif text-xl text-ink-300 italic">{{ $article['summary'] }}</p>
                <p class="label mt-4 flex items-center gap-2">
                    <span class="flex gap-0.5" aria-hidden="true">
                        @foreach (range(1, 3) as $i)
                            <span @class(['size-1.5 rounded-full', 'bg-accent-500' => $i <= $article['level'], 'bg-white/15' => $i > $article['level']])></span>
                        @endforeach
                    </span>
                    {{ [1 => __('Basics'), 2 => __('Intermediate'), 3 => __('Advanced')][$article['level']] }}
                </p>

                @if ($article['locale'] !== app()->getLocale())
                    <p class="mt-4 rounded-md border border-white/10 bg-ink-900 px-4 py-3 text-sm text-ink-400">{{ __('This article is not yet available in your language, so it is shown in English.') }}</p>
                @endif
            </header>

            <div class="learn-prose mt-8" data-katex>
                {!! $article['html'] !!}
            </div>

            {{-- Verwandte Themen --}}
            @if ($related->isNotEmpty())
                <section class="mt-14" aria-labelledby="related-title">
                    <h2 id="related-title" class="label">{{ __('Related topics') }}</h2>
                    <div class="mt-3 grid gap-3 sm:grid-cols-2">
                        @foreach ($related as $item)
                            <a href="{{ route('learn.show', $item['slug']) }}" class="group card p-4 transition hover:border-accent-500/40">
                                <span class="font-serif text-lg font-semibold group-hover:text-accent-400">{{ $item['title'] }}</span>
                                <span class="mt-1 block text-sm text-ink-400">{{ $item['summary'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

            {{-- Vor/Zurück --}}
            <nav class="mt-10 grid gap-3 border-t border-white/8 pt-6 sm:grid-cols-2" aria-label="{{ __('More topics') }}">
                @if ($previous)
                    <a href="{{ route('learn.show', $previous['slug']) }}" class="group rounded-lg p-3 transition hover:bg-white/5">
                        <span class="label">← {{ __('Previous') }}</span>
                        <span class="mt-1 block font-serif text-lg group-hover:text-accent-400">{{ $previous['title'] }}</span>
                    </a>
                @else
                    <span></span>
                @endif
                @if ($next)
                    <a href="{{ route('learn.show', $next['slug']) }}" class="group rounded-lg p-3 text-right transition hover:bg-white/5">
                        <span class="label">{{ __('Next') }} →</span>
                        <span class="mt-1 block font-serif text-lg group-hover:text-accent-400">{{ $next['title'] }}</span>
                    </a>
                @endif
            </nav>
        </article>

        {{-- Seitenleiste: Inhalt dieser Seite + weitere Themen der Kategorie --}}
        <aside class="flex flex-col gap-8 lg:sticky lg:top-6">
            @if (count($article['headings']) > 1)
                <nav aria-labelledby="toc-title">
                    <h2 id="toc-title" class="label">{{ __('On this page') }}</h2>
                    <ol class="mt-3 flex flex-col gap-1.5 border-l border-white/10 text-sm">
                        @foreach ($article['headings'] as $heading)
                            <li><a href="#{{ $heading['id'] }}" class="-ml-px block border-l border-transparent pl-3 text-ink-400 transition hover:border-accent-500 hover:text-white">{{ $heading['title'] }}</a></li>
                        @endforeach
                    </ol>
                </nav>
            @endif

            <nav aria-labelledby="siblings-title">
                <h2 id="siblings-title" class="label">{{ $category->label() }}</h2>
                <ol class="mt-3 flex flex-col gap-1 text-sm">
                    @foreach ($siblings as $item)
                        <li>
                            <a href="{{ route('learn.show', $item['slug']) }}" @class([
                                'block rounded-md px-3 py-1.5 transition',
                                'bg-accent-500/10 text-accent-400' => $item['slug'] === $article['slug'],
                                'text-ink-400 hover:bg-white/5 hover:text-white' => $item['slug'] !== $article['slug'],
                            ]) @if ($item['slug'] === $article['slug']) aria-current="page" @endif>{{ $item['title'] }}</a>
                        </li>
                    @endforeach
                </ol>
            </nav>
        </aside>
    </div>
</x-layouts.learn>
