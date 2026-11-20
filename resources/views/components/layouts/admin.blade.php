@props(['title' => 'Verwaltung'])

<x-layouts.app :title="$title.' · DailyMath Admin'">
    <div class="flex min-h-dvh flex-col">
        <header class="border-b border-white/8 bg-ink-950/80 backdrop-blur">
            <div class="mx-auto flex h-14 max-w-6xl items-center gap-6 px-4 sm:px-6">
                <a href="{{ route('admin.dashboard') }}" class="font-serif text-xl font-semibold">Daily<span class="text-accent-500 italic">Math</span> <span class="label ml-1">Admin</span></a>

                @if (session(\App\Http\Middleware\EnsureAdmin::SESSION_KEY))
                    <nav class="flex items-center gap-1 text-sm">
                        @foreach (['admin.dashboard' => 'Übersicht', 'admin.questions.index' => 'Aufgaben', 'admin.questions.create' => 'Neue Aufgabe'] as $route => $label)
                            <a href="{{ route($route) }}" @class([
                                'rounded-md px-3 py-1.5 transition',
                                'bg-white/10 text-white' => request()->routeIs($route),
                                'text-ink-400 hover:text-white' => ! request()->routeIs($route),
                            ])>{{ $label }}</a>
                        @endforeach
                    </nav>

                    <div class="ml-auto flex items-center gap-2 text-sm">
                        <a href="{{ route('challenge.show') }}" class="text-ink-400 hover:text-white" target="_blank">Zur Seite ↗</a>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button class="btn-ghost !py-1.5">Abmelden</button>
                        </form>
                    </div>
                @endif
            </div>
        </header>

        <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8 sm:px-6">
            @if (session('status'))
                <div class="mb-6 rounded-md border border-success-400/30 bg-success-400/10 px-4 py-3 text-sm text-success-400" role="status">{{ session('status') }}</div>
            @endif
            @if (session('error'))
                <div class="mb-6 rounded-md border border-danger-400/30 bg-danger-400/10 px-4 py-3 text-sm text-danger-400" role="alert">{{ session('error') }}</div>
            @endif

            {{ $slot }}
        </main>
    </div>
</x-layouts.app>
