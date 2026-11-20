<div class="card flex flex-col overflow-hidden" x-data="notepad(@js($storageKey), @js($keepPrefix))">
    {{-- Werkzeugleiste --}}
    <div class="flex flex-wrap items-center gap-1 border-b border-white/10 px-3 py-2" role="toolbar" aria-label="Zeichenwerkzeuge">
        <button type="button" class="tool-btn" :aria-pressed="tool === 'pen'" @click="setTool('pen')" title="Stift (P)" aria-label="Stift">
            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20l1-4L16 5a2.1 2.1 0 0 1 3 3L8 19z"/><path d="M14 7l3 3"/></svg>
        </button>
        <button type="button" class="tool-btn" :aria-pressed="tool === 'eraser'" @click="setTool('eraser')" title="Radiergummi (E)" aria-label="Radiergummi">
            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 20h13M5.5 14.5l7-7a2 2 0 0 1 2.8 0l2.2 2.2a2 2 0 0 1 0 2.8L11 19H8z"/><path d="M9 11l5 5"/></svg>
        </button>

        <span class="mx-1 h-6 w-px bg-white/10" aria-hidden="true"></span>

        <template x-for="size in sizes" :key="size.value">
            <button type="button" class="tool-btn" :aria-pressed="width === size.value" @click="setWidth(size.value)" :title="size.label" :aria-label="'Stiftstärke ' + size.label">
                <span class="rounded-full bg-current" :style="`width:${size.dot}px;height:${size.dot}px`"></span>
            </button>
        </template>

        <span class="mx-1 h-6 w-px bg-white/10" aria-hidden="true"></span>

        <button type="button" class="tool-btn" @click="undo" :disabled="!canUndo" title="Rückgängig (Strg+Z)" aria-label="Rückgängig">
            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 14L4 9l5-5"/><path d="M4 9h10.5a5.5 5.5 0 0 1 0 11H11"/></svg>
        </button>
        <button type="button" class="tool-btn" @click="redo" :disabled="!canRedo" title="Wiederholen (Strg+Y)" aria-label="Wiederholen">
            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 14l5-5-5-5"/><path d="M20 9H9.5a5.5 5.5 0 0 0 0 11H13"/></svg>
        </button>

        <div class="ml-auto flex items-center gap-1">
            <label class="sr-only" for="paper-select">Papier</label>
            <select id="paper-select" x-model="paper" @change="savePrefs"
                    class="h-9 rounded-lg border border-white/10 bg-ink-900 px-2 text-sm font-semibold text-ink-300 focus:border-accent-500 focus:outline-none">
                <option value="grid">Kariert</option>
                <option value="lined">Liniert</option>
                <option value="blank">Weiß</option>
            </select>
            <button type="button" class="tool-btn" @click="download" title="Als Bild herunterladen" aria-label="Als Bild herunterladen">
                <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 4v11M7 10l5 5 5-5M5 20h14"/></svg>
            </button>
            <button type="button" class="tool-btn hover:!text-danger-400" @click="clear" :disabled="isEmpty" title="Alles löschen" aria-label="Alles löschen">
                <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7h16M10 11v6M14 11v6M6 7l1 12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2l1-12M9 7V4h6v3"/></svg>
            </button>
        </div>
    </div>

    {{-- Zeichenfläche --}}
    <div class="relative h-[calc(100dvh-14rem)] min-h-[420px] lg:h-[calc(100dvh-10rem)] lg:max-h-[860px]" :class="'paper-' + paper">
        <canvas x-ref="canvas" class="absolute inset-0 size-full touch-none select-none"
                :class="tool === 'eraser' ? 'cursor-cell' : 'cursor-crosshair'"
                aria-label="Notizblock zum Rechnen – mit Maus, Finger oder Stift schreiben"></canvas>
        <p x-show="isEmpty" x-transition.opacity class="pointer-events-none absolute inset-x-0 top-1/2 -translate-y-1/2 text-center text-sm font-semibold text-slate-400">
            Dein Schmierzettel – rechne hier mit Maus, Finger oder Stift.
        </p>
    </div>
</div>
