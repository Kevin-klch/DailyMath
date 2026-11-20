<div class="card flex flex-col overflow-hidden" x-data="notepad(@js($storageKey), @js($keepPrefix))">
    {{-- Werkzeugleiste --}}
    <div class="flex flex-wrap items-center gap-1 border-b border-white/10 px-3 py-2" role="toolbar" aria-label="{{ __('Drawing tools') }}">
        <button type="button" class="tool-btn" :aria-pressed="tool === 'pen'" @click="setTool('pen')" title="{{ __('Pen') }} (P)" aria-label="{{ __('Pen') }}">
            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20l1-4L16 5a2.1 2.1 0 0 1 3 3L8 19z"/><path d="M14 7l3 3"/></svg>
        </button>
        <button type="button" class="tool-btn" :aria-pressed="tool === 'eraser'" @click="setTool('eraser')" title="{{ __('Eraser') }} (E)" aria-label="{{ __('Eraser') }}">
            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 20h13M5.5 14.5l7-7a2 2 0 0 1 2.8 0l2.2 2.2a2 2 0 0 1 0 2.8L11 19H8z"/><path d="M9 11l5 5"/></svg>
        </button>

        <button type="button" class="tool-btn" :aria-pressed="tool === 'hand'" @click="setTool('hand')" title="{{ __('Move sheet') }} (H, {{ __('or hold Space') }})" aria-label="{{ __('Move sheet') }}">
            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 13V5.5a1.5 1.5 0 0 1 3 0V12M11 11.5v-8a1.5 1.5 0 0 1 3 0V12M14 6.5a1.5 1.5 0 0 1 3 0V12M17 8.5a1.5 1.5 0 0 1 3 0V15a6 6 0 0 1-6 6h-1.6a6 6 0 0 1-4.6-2.2L4.4 14.6a1.6 1.6 0 0 1 2.4-2.1L8 14"/></svg>
        </button>

        <span class="mx-1 h-6 w-px bg-white/10" aria-hidden="true"></span>

        <template x-for="size in sizes" :key="size.value">
            <button type="button" class="tool-btn" :aria-pressed="width === size.value" @click="setWidth(size.value)" :title="size.label" :aria-label="@js(__('Pen size')) + ' ' + size.label">
                <span class="rounded-full bg-current" :style="`width:${size.dot}px;height:${size.dot}px`"></span>
            </button>
        </template>

        <span class="mx-1 h-6 w-px bg-white/10" aria-hidden="true"></span>

        <button type="button" class="tool-btn" @click="undo" :disabled="!canUndo" title="{{ __('Undo') }} ({{ __('Ctrl') }}+Z)" aria-label="{{ __('Undo') }}">
            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 14L4 9l5-5"/><path d="M4 9h10.5a5.5 5.5 0 0 1 0 11H11"/></svg>
        </button>
        <button type="button" class="tool-btn" @click="redo" :disabled="!canRedo" title="{{ __('Redo') }} ({{ __('Ctrl') }}+Y)" aria-label="{{ __('Redo') }}">
            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 14l5-5-5-5"/><path d="M20 9H9.5a5.5 5.5 0 0 0 0 11H13"/></svg>
        </button>

        <div class="ml-auto flex items-center gap-1">
            <label class="sr-only" for="paper-select">{{ __('Paper') }}</label>
            <select id="paper-select" x-model="paper" @change="savePrefs"
                    class="h-9 rounded-md border border-white/10 bg-ink-950 px-2 text-sm font-semibold text-ink-300 focus:border-accent-500 focus:outline-none">
                <option value="grid">{{ __('Grid') }}</option>
                <option value="lined">{{ __('Lined') }}</option>
                <option value="blank">{{ __('Blank') }}</option>
            </select>
            <button type="button" class="tool-btn" @click="download" title="{{ __('Download as image') }}" aria-label="{{ __('Download as image') }}">
                <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 4v11M7 10l5 5 5-5M5 20h14"/></svg>
            </button>
            <button type="button" class="tool-btn hover:!text-danger-400" @click="clear" :disabled="isEmpty" title="{{ __('Clear all') }}" aria-label="{{ __('Clear all') }}">
                <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7h16M10 11v6M14 11v6M6 7l1 12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2l1-12M9 7V4h6v3"/></svg>
            </button>

            {{-- Volle Breite (nur Desktop – mobil ist der Notizblock ohnehin so breit wie die Seite) --}}
            <button type="button" class="tool-btn max-lg:!hidden" :aria-pressed="notesWide" @click="toggleNotesWide()"
                    :title="(notesWide ? @js(__('Normal width')) : @js(__('Full width'))) + ' (F)'" :aria-label="notesWide ? @js(__('Normal width')) : @js(__('Full width'))">
                <svg x-show="!notesWide" viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 9V4h5M20 9V4h-5M4 15v5h5M20 15v5h-5"/></svg>
                <svg x-show="notesWide" x-cloak viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 4v5H4M15 4v5h5M9 20v-5H4M15 20v-5h5"/></svg>
            </button>
        </div>
    </div>

    {{-- Zeichenfläche --}}
    <div class="relative h-[calc(100dvh-16rem)] min-h-[360px] lg:h-[calc(100dvh-19rem)] lg:min-h-[380px] lg:max-h-[640px]" :class="'paper-' + paper">
        <canvas x-ref="canvas" class="absolute inset-0 size-full touch-none select-none"
                :class="tool === 'hand' ? 'cursor-grab' : (tool === 'eraser' ? 'cursor-cell' : 'cursor-crosshair')"
                aria-label="{{ __('Notepad for calculations – write with mouse, finger or pen') }}"></canvas>
        <p x-show="isEmpty" x-transition.opacity class="pointer-events-none absolute inset-x-0 top-1/2 -translate-y-1/2 text-center text-sm font-semibold text-slate-400">
            {{ __('Your scratch paper – work it out here with mouse, finger or pen.') }}
        </p>
        {{-- Zoom: schwebend unten rechts auf dem Blatt (Strg/⌘ + Mausrad oder zwei Finger gehen auch) --}}
        <div class="absolute right-3 bottom-3 flex items-center rounded-lg border border-white/10 bg-ink-900/90 p-0.5 shadow-lg backdrop-blur" role="group" aria-label="{{ __('Zoom') }}">
            <button type="button" class="tool-btn !size-8" @click="zoomOut" :disabled="zoom <= 25" title="{{ __('Zoom out') }} (−)" aria-label="{{ __('Zoom out') }}">
                <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 12h12"/></svg>
            </button>
            <button type="button" class="h-8 min-w-12 rounded-md px-1 font-mono text-xs text-ink-300 transition hover:bg-white/8 hover:text-white" @click="resetZoom"
                    title="{{ __('Reset zoom') }} (0)" :aria-label="@js(__('Reset zoom')) + ' (' + zoom + ' %)'" x-text="zoom + '%'">100%</button>
            <button type="button" class="tool-btn !size-8" @click="zoomIn" :disabled="zoom >= 400" title="{{ __('Zoom in') }} (+)" aria-label="{{ __('Zoom in') }}">
                <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 12h12M12 6v12"/></svg>
            </button>
        </div>
    </div>
</div>
