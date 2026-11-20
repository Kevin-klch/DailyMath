<x-layouts.admin title="Übersicht">
    <h1 class="font-serif text-3xl font-semibold">Übersicht</h1>

    {{-- Vorrat: reicht es noch ohne Wiederholungen? --}}
    <section class="mt-6 grid gap-4 sm:grid-cols-3" aria-label="Aufgabenvorrat">
        @foreach ($pool as $row)
            @php($low = $row['fresh_days'] < 7)
            <div @class(['card p-5', '!border-danger-400/40' => $low])>
                <p class="label">{{ $row['difficulty']->label() }}</p>
                <p class="mt-2 font-mono text-3xl">{{ $row['active'] }} <span class="text-base text-ink-500">aktiv</span></p>
                <p class="mt-2 text-sm text-ink-300">
                    {{ $row['unused'] }} noch nie gestellt · {{ $row['planned_ahead'] }} ab morgen geplant
                </p>
                <p @class(['mt-1 text-sm', 'text-danger-400' => $low, 'text-success-400' => ! $low])>
                    @if ($low)
                        Nur noch ca. {{ $row['fresh_days'] }} {{ $row['fresh_days'] === 1 ? 'Tag' : 'Tage' }} ohne Wiederholung – neue Aufgaben anlegen!
                    @else
                        Reicht für ca. {{ $row['fresh_days'] }} Tage ohne Wiederholung.
                    @endif
                </p>
            </div>
        @endforeach
    </section>

    {{-- Planung der nächsten Tage --}}
    <section class="mt-10" aria-labelledby="schedule-title">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <div>
                <h2 id="schedule-title" class="font-serif text-2xl font-semibold">Planung</h2>
                <p class="mt-1 text-sm text-ink-400">Die nächsten {{ \App\Http\Controllers\Admin\DashboardController::SCHEDULE_DAYS }} Tage. Heute ist fest; zukünftige Tage kannst du umplanen oder freigeben (werden dann neu belegt).</p>
            </div>
            <form method="POST" action="{{ route('admin.schedule.plan') }}">
                @csrf
                <button class="btn-outline">Fehlende Tage einplanen</button>
            </form>
        </div>

        <div class="mt-4 overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="label">
                    <tr class="border-b border-white/10">
                        <th class="py-2 pr-4 font-medium">Datum</th>
                        @foreach (\App\Enums\Difficulty::cases() as $difficulty)
                            <th class="px-2 py-2 font-medium">{{ $difficulty->label() }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($days as $day)
                        <tr class="border-b border-white/6 align-top">
                            <td class="py-3 pr-4 whitespace-nowrap">
                                <span class="font-mono">{{ $day['date']->locale('de')->isoFormat('dd, DD.MM.') }}</span>
                                @if ($day['is_today'])
                                    <span class="ml-1 rounded bg-accent-500/15 px-1.5 py-0.5 text-xs text-accent-400">heute</span>
                                @endif
                            </td>
                            @foreach (\App\Enums\Difficulty::cases() as $difficulty)
                                @php($challenge = $day['challenges'][$difficulty->value] ?? null)
                                <td class="px-2 py-3">
                                    @if (! $challenge)
                                        <span class="text-ink-500">– noch nicht geplant</span>
                                    @elseif ($day['is_today'])
                                        <a href="{{ route('admin.questions.edit', $challenge->question) }}" class="hover:text-accent-400">{{ $challenge->question->title }}</a>
                                    @else
                                        <div class="flex items-center gap-1">
                                            <form method="POST" action="{{ route('admin.schedule.update', $challenge) }}" class="min-w-0 flex-1">
                                                @csrf
                                                @method('PATCH')
                                                <select name="question_id" onchange="this.form.submit()" aria-label="Aufgabe für {{ $day['date']->format('d.m.') }} ({{ $difficulty->label() }})"
                                                        class="w-full truncate rounded-md border border-white/10 bg-ink-900 px-2 py-1.5 text-sm text-white focus:border-accent-500 focus:outline-none">
                                                    @foreach ($choices[$difficulty->value] ?? [] as $choice)
                                                        <option value="{{ $choice->id }}" @selected($choice->id === $challenge->question_id)>
                                                            {{ $choice->title }}{{ $choice->last_used ? ' · zuletzt '.\Illuminate\Support\Carbon::parse($choice->last_used)->format('d.m.') : ' · neu' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                            <form method="POST" action="{{ route('admin.schedule.destroy', $challenge) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="tool-btn !size-8 hover:!text-danger-400" title="Tag freigeben (wird neu belegt)" aria-label="Tag freigeben">
                                                    <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-layouts.admin>
