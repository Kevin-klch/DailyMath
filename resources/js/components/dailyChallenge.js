import confetti from '../effects/confetti';
import { locale, t } from '../i18n';
import { streakExpression } from '../streak';

/**
 * Alpine-Komponente für die Daily-Challenge: Antworten, Hinweise, Ergebnis, Statistik.
 * Der komplette Zustand kommt vom Server (siehe ChallengeStatePresenter).
 */
export default (intro = false) => ({
    intro,
    state: JSON.parse(document.getElementById('initial-state').textContent),
    view: 'task',
    answer: '',
    values: {},
    busy: false,
    feedback: null,
    statsOpen: false,
    copied: false,
    secondsLeft: 0,
    justFinished: false,
    notesWide: false, // Notizblock über die volle Breite (wird im Browser gemerkt)
    celebrating: false, // kurzer Jubel im Taschenrechner-Display nach richtiger Antwort
    shaking: false, // Wackeln bei falscher Antwort
    switching: false,
    prefetched: {}, // slug → Promise<state>
    drafts: {}, // slug → angefangene Eingabe, damit sie beim Hin- und Herwechseln erhalten bleibt

    init() {
        try {
            this.notesWide = localStorage.getItem('dailymath:notes-wide') === '1';
        } catch {
            /* ohne Speicher eben schmal */
        }
        this.$watch('notesWide', (wide) => {
            try {
                localStorage.setItem('dailymath:notes-wide', wide ? '1' : '0');
            } catch {
                /* ignorieren */
            }
        });

        // Mobil: Liegt der Umschalter Antwort/Notizblock beim Wechsel schon oberhalb des Bildschirms,
        // dorthin zurückspringen – so bleibt z. B. die Werkzeugleiste des Notizblocks sichtbar.
        this.$watch('view', () => {
            const top = this.$refs.viewTabs?.getBoundingClientRect().top ?? 0;
            if (top < 72) window.scrollTo({ top: window.scrollY + top - 80 });
        });

        // Niveauwechsel ohne Neuladen: Browser-Zurück/Vor unterstützen.
        history.replaceState({ level: this.state.challenge.level }, '');
        window.addEventListener('popstate', (e) => {
            const level = this.state.levels.find((l) => l.slug === e.state?.level);
            if (level) this.switchLevel(level, { push: false });
        });

        this.secondsLeft = this.state.next_challenge_in;
        const startedAt = Date.now();
        const total = this.secondsLeft;

        this.timer = setInterval(() => {
            this.secondsLeft = Math.max(0, total - Math.floor((Date.now() - startedAt) / 1000));
            if (this.secondsLeft === 0) {
                clearInterval(this.timer);
                window.location.reload(); // neue Aufgabe laden
            }
        }, 1000);
    },

    destroy() {
        clearInterval(this.timer);
    },

    /**
     * Notizblock breit/schmal umschalten – mit weicher Animation, wo der Browser View Transitions kann.
     */
    toggleNotesWide() {
        const toggle = () => {
            this.notesWide = !this.notesWide;
            return this.$nextTick(); // DOM ist aktualisiert, sobald das Promise erfüllt ist
        };

        if (!document.startViewTransition || matchMedia('(prefers-reduced-motion: reduce)').matches) {
            toggle();
            return;
        }

        document.startViewTransition(toggle);
    },

    /**
     * Beschriftung des Play-Buttons auf dem Startbildschirm, je nach Fortschritt des Tages.
     */
    get introPlayLabel() {
        const statuses = this.state.levels.map((l) => l.status);
        if (statuses.every((s) => ['solved', 'given_up'].includes(s))) return t('Results');
        if (statuses.some((s) => s !== null)) return t('Continue');
        return t('Play');
    },

    startPlaying() {
        this.intro = false;
        const current = this.state.levels.find((l) => l.current);
        history.replaceState({ level: current.slug }, '', current.url);
        window.scrollTo({ top: 0 });
    },

    get type() {
        return this.state.challenge.answer_type;
    },

    get finished() {
        return this.state.result !== null;
    },

    get canSubmit() {
        if (this.type === 'multi_value') {
            return this.state.challenge.variables.every((v) => (this.values[v] ?? '').trim() !== '');
        }
        return this.answer.trim() !== '';
    },

    get solvedHeadline() {
        const attempts = this.state.attempt.attempts;
        const hints = this.state.attempt.hints_used;
        if (attempts === 1 && hints === 0) return t('First try, no hints at all!');
        if (attempts === 1) return t('Solved on the first try.');
        return t('Solved after :count tries.', { count: attempts });
    },

    /**
     * Nächstes noch nicht abgeschlossenes Niveau des Tages (für "Weiter mit …").
     */
    get nextOpenLevel() {
        const open = this.state.levels.filter((l) => !l.current && !['solved', 'given_up'].includes(l.status));
        return open.find((l) => l.level > this.state.challenge.difficulty.level) ?? open[0] ?? null;
    },

    /**
     * Lädt den Zustand eines Niveaus vorab (beim Hovern/Fokussieren eines Reiters).
     */
    prefetchLevel(level) {
        if (level.current || this.prefetched[level.slug]) return this.prefetched[level.slug];

        const request = fetch(`/challenge/${level.slug}`, { headers: { Accept: 'application/json' } })
            .then((r) => (r.ok ? r.json() : Promise.reject(r)));
        request.catch(() => delete this.prefetched[level.slug]);
        this.prefetched[level.slug] = request;

        return request;
    },

    /**
     * Wechselt das Niveau, ohne die Seite neu zu laden.
     */
    async switchLevel(level, { push = true } = {}) {
        if (level.current || this.switching) return;

        const from = this.state.challenge.level;
        this.drafts[from] = { answer: this.answer, values: { ...this.values }, feedback: this.feedback };
        this.switching = true;

        try {
            const state = await this.prefetchLevel(level);
            delete this.prefetched[level.slug]; // beim nächsten Mal frische Daten holen

            const draft = this.drafts[level.slug] ?? {};
            this.state = state;
            this.answer = draft.answer ?? '';
            this.values = draft.values ?? {};
            this.feedback = draft.feedback ?? null;
            this.justFinished = false;

            if (push) history.pushState({ level: level.slug }, '', level.url);
            document.title = `DailyMath #${state.challenge.number} · ${state.challenge.difficulty.label} – ${state.challenge.title}`;
            window.dispatchEvent(new CustomEvent('dailymath:level-changed', { detail: { level: level.slug } }));
        } catch {
            window.location.href = level.url; // Fallback: klassisch navigieren
        } finally {
            this.switching = false;
        }
    },

    /**
     * Serie als kleine Rechnung (z. B. 4 → √16), bis 100 – siehe resources/js/streak.js.
     */
    streak(n) {
        return streakExpression(n);
    },

    levelStatusLabel(status) {
        return { solved: t('Solved'), given_up: t('Gave up'), in_progress: t('Started') }[status] ?? t('Open');
    },

    get countdown() {
        const h = Math.floor(this.secondsLeft / 3600);
        const m = Math.floor((this.secondsLeft % 3600) / 60);
        const s = this.secondsLeft % 60;
        return [h, m, s].map((n) => String(n).padStart(2, '0')).join(':');
    },

    get statTiles() {
        const s = this.state.stats;
        return [
            { label: t('Played'), value: s.played },
            { label: t('Solved'), value: s.solved },
            { label: t('Success rate'), value: `${s.success_rate} %` },
            { label: t('Current streak'), value: streakExpression(s.current_streak), title: s.current_streak, math: true, accent: true },
            { label: t('Best streak'), value: streakExpression(s.best_streak), title: s.best_streak, math: true },
            { label: t('Avg. solve time'), value: this.formatDuration(s.average_seconds) },
        ];
    },

    formatDuration(seconds) {
        if (seconds === null || seconds === undefined) return '–';
        if (seconds < 60) return `${seconds}s`;
        const m = Math.floor(seconds / 60);
        if (m < 60) return `${m}:${String(seconds % 60).padStart(2, '0')}`;
        return `${Math.floor(m / 60)}h ${m % 60}m`;
    },

    /**
     * Antworttypen, die über das Taschenrechner-Tastenfeld eingegeben werden.
     */
    get hasKeypad() {
        return ['numeric', 'fraction', 'solution_set'].includes(this.type);
    },

    get choiceDisplay() {
        const index = this.state.challenge.options?.findIndex((o) => o.key === this.answer) ?? -1;
        return index < 0 ? '–' : t('Answer :letter', { letter: String.fromCharCode(65 + index) });
    },

    // Dezimaltrennzeichen je nach Sprache (Deutsch: Komma, Englisch: Punkt) – der Server versteht beides.
    keypad: [
        { label: '7' }, { label: '8' }, { label: '9' }, { label: '/', kind: 'op', aria: t('Fraction bar') }, { label: '⌫', kind: 'fn', action: 'backspace', aria: t('Delete character') },
        { label: '4' }, { label: '5' }, { label: '6' }, { label: '−', kind: 'op', insert: '-', aria: t('Minus') }, { label: 'C', kind: 'fn', action: 'clear', aria: t('Clear input') },
        { label: '1' }, { label: '2' }, { label: '3' }, { label: '√', kind: 'op', aria: t('Square root') }, { label: 'π', kind: 'op', aria: t('Pi') },
        { label: '0' }, { label: locale === 'de' ? ',' : '.', kind: 'op', aria: t('Decimal point') }, { label: '␣', kind: 'fn', insert: ' ', aria: t('Space (mixed number like 1 1/2)') }, { label: ';', kind: 'op', insert: '; ', aria: t('Separator for multiple solutions') }, { label: '=', action: 'submit', aria: t('Check answer') },
    ],

    // Auf Touch-Geräten ersetzt das Tastenfeld die Bildschirmtastatur.
    touch: matchMedia('(pointer: coarse)').matches,

    pressKey(key) {
        const input = this.$refs.answerInput;
        if (!input) return;

        const start = input.selectionStart ?? this.answer.length;
        const end = input.selectionEnd ?? this.answer.length;
        let caret = start;

        if (key.action === 'clear') {
            this.answer = '';
            caret = 0;
        } else if (key.action === 'backspace') {
            const from = start === end ? Math.max(0, start - 1) : start;
            this.answer = this.answer.slice(0, from) + this.answer.slice(end);
            caret = from;
        } else {
            const text = key.insert ?? key.label;
            this.answer = this.answer.slice(0, start) + text + this.answer.slice(end);
            caret = start + text.length;
        }

        this.$nextTick(() => {
            input.focus();
            input.setSelectionRange(caret, caret);
        });
    },

    async submitAnswer() {
        if (!this.canSubmit || this.busy) return;
        const answer = this.type === 'multi_value' ? { ...this.values } : this.answer;

        const data = await this.post(`/challenge/${this.state.challenge.level}/answer`, { answer });
        if (!data) return;

        const check = data.check;
        if (check?.status === 'incorrect') {
            this.feedback = { status: 'incorrect', text: check.message || t('Wrong, sorry. Try again – or take a hint.') };
        } else if (check?.status === 'invalid') {
            this.feedback = { status: 'invalid', text: check.message };
        } else {
            this.feedback = null;
        }
    },

    /**
     * Richtige Antwort: Display leuchtet grün, Konfetti fliegt – erst danach erscheint das Ergebnis.
     */
    async celebrate() {
        this.celebrating = true;
        navigator.vibrate?.([30, 40, 60]);
        confetti(this.$refs.calculator);
        await new Promise((resolve) => setTimeout(resolve, matchMedia('(prefers-reduced-motion: reduce)').matches ? 400 : 1100));
        this.celebrating = false;
    },

    shake() {
        this.shaking = false;
        navigator.vibrate?.(80);
        this.$nextTick(() => {
            this.shaking = true;
            setTimeout(() => (this.shaking = false), 600);
        });
    },

    async revealHint() {
        await this.post(`/challenge/${this.state.challenge.level}/hint`);
    },

    async share() {
        const text = this.state.result.share_text;
        try {
            if (navigator.share && matchMedia('(pointer: coarse)').matches) {
                await navigator.share({ text });
                return;
            }
            await navigator.clipboard.writeText(text);
            this.copied = true;
            setTimeout(() => (this.copied = false), 2000);
        } catch {
            /* Teilen abgebrochen */
        }
    },

    async post(url, body = {}) {
        this.busy = true;
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(body),
            });

            if (response.status === 419) {
                window.location.reload(); // Sitzung abgelaufen
                return null;
            }

            if (!response.ok) {
                const message = response.status === 429
                    ? t('Too many requests – please wait a moment.')
                    : t('Something went wrong. Please try again.');
                this.feedback = { status: 'invalid', text: message };
                return null;
            }

            const data = await response.json();

            if (data.check?.status === 'correct') {
                await this.celebrate();
            } else if (data.check?.status === 'incorrect') {
                this.shake();
            }

            this.justFinished = this.state.result === null && data.result !== null;
            this.state = data;
            this.prefetched = {}; // Status/Statistik der anderen Niveaus hat sich evtl. geändert
            return data;
        } catch {
            this.feedback = { status: 'invalid', text: t('No connection to the server.') };
            return null;
        } finally {
            this.busy = false;
        }
    },
});
