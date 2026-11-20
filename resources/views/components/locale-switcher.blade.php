@props(['compact' => false])

@php
    $locales = config('dailymath.locales');
    $current = app()->getLocale();
@endphp

{{-- Sprachauswahl: speichert die Wahl im Cookie und lädt die Seite neu --}}
<form method="POST" action="{{ route('locale.update') }}" {{ $attributes->class(['flex items-center']) }}>
    @csrf

    @if ($compact)
        <label class="relative flex items-center" title="{{ __('Language') }}">
            <span class="sr-only">{{ __('Language') }}</span>
            <svg viewBox="0 0 24 24" class="pointer-events-none absolute left-2.5 size-4 text-ink-400" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/></svg>
            <select name="locale" onchange="this.form.submit()"
                    class="h-10 cursor-pointer appearance-none rounded-full border border-white/20 bg-transparent pr-3.5 pl-8 text-sm font-semibold uppercase text-ink-300 transition hover:border-white/40 hover:text-white focus:border-accent-500 focus:outline-none">
                @foreach ($locales as $code => $name)
                    <option value="{{ $code }}" @selected($code === $current)>{{ $code }}</option>
                @endforeach
            </select>
        </label>
        <noscript><button type="submit" class="btn-ghost !px-2">OK</button></noscript>
    @else
        <div class="flex items-center gap-1 text-sm font-semibold" role="group" aria-label="{{ __('Language') }}">
            @foreach ($locales as $code => $name)
                <button type="submit" name="locale" value="{{ $code }}" lang="{{ $code }}"
                        @if ($code === $current) aria-current="true" @endif
                        @class([
                            'rounded-full px-3 py-1 transition',
                            'bg-white/10 text-white' => $code === $current,
                            'text-ink-400 hover:text-white' => $code !== $current,
                        ])>{{ $name }}</button>
            @endforeach
        </div>
    @endif
</form>
