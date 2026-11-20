<x-layouts.app>
    <div class="mx-auto flex min-h-dvh max-w-md flex-col items-center justify-center gap-6 px-6 text-center">
        <x-logo />
        <div class="card p-8">
            <x-topic-icon topic="analysis" class="mx-auto mb-4 size-16" />
            <h1 class="text-xl font-extrabold">Heute noch keine Aufgabe</h1>
            <p class="mt-2 text-ink-400">Es sind noch keine Aufgaben hinterlegt. Lege mit <code class="text-accent-400">php artisan db:seed</code> den Startbestand an.</p>
        </div>
    </div>
</x-layouts.app>
