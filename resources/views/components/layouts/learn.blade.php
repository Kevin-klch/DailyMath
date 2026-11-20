@props(['title' => null, 'description' => null])

<x-layouts.app :title="($title ? $title.' · ' : '').'DailyMath – '.__('Learn')">
    <div class="flex min-h-dvh flex-col">
        <header class="mx-auto grid w-full max-w-6xl grid-cols-[1fr_auto_1fr] items-center gap-3 px-4 pt-5 sm:px-6 sm:pt-7">
            <div class="flex items-center">
                <a href="{{ route('challenge.show') }}" class="inline-flex items-center gap-2 text-sm text-ink-400 transition hover:text-white">
                    <svg viewBox="0 0 24 24" class="size-5 text-accent-500" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="3"/><path d="M8 12h8M12 8v8"/></svg>
                    <span class="hidden sm:inline">{{ __('Daily puzzles') }}</span>
                </a>
            </div>

            <div class="text-center">
                <a href="{{ route('learn.index') }}" class="font-serif text-3xl leading-none font-semibold tracking-tight sm:text-4xl">Daily<span class="text-accent-500 italic">Math</span></a>
                <p class="label mt-2">{{ __('Learn') }}</p>
            </div>

            <nav class="flex items-center justify-end gap-2">
                <x-locale-switcher compact />
            </nav>
        </header>

        <main class="mx-auto w-full max-w-6xl flex-1 px-4 pt-8 pb-16 sm:px-6">
            {{ $slot }}
        </main>

        <footer class="label py-8 text-center">{{ __('A small math challenge every day.') }}</footer>
    </div>
</x-layouts.app>
