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
    confirmGiveUp: false,
    statsOpen: false,
    copied: false,
    secondsLeft: 0,
    justFinished: false,
    switching: false,
    prefetched: {}, // slug → Promise<state>
    drafts: {}, // slug → angefangene Eingabe, damit sie beim Hin- und Herwechseln erhalten bleibt

    init() {
        // Mobil: beim Wechsel Aufgabe/Notizblock oben beginnen, damit die Werkzeugleiste sichtbar ist.
        this.$watch('view', () => window.scrollTo({ top: 0 }));

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
     * Beschriftung des Play-Buttons auf dem Startbildschirm, je nach Fortschritt des Tages.
     */
    get introPlayLabel() {
        const statuses = this.state.levels.map((l) => l.status);
        if (statuses.every((s) => ['solved', 'given_up'].includes(s))) return 'Ergebnis';
        if (statuses.some((s) => s !== null)) return 'Weiter';
        return 'Spielen';
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
        if (attempts === 1 && hints === 0) return 'Im ersten Versuch, ganz ohne Hinweise!';
        if (attempts === 1) return 'Im ersten Versuch gelöst.';
        return `Gelöst nach ${attempts} Versuchen.`;
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
            this.confirmGiveUp = false;
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

    levelStatusLabel(status) {
        return { solved: 'Gelöst', given_up: 'Aufgegeben', in_progress: 'Begonnen' }[status] ?? 'Offen';
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
            { label: 'Gespielt', value: s.played },
            { label: 'Gelöst', value: s.solved },
            { label: 'Erfolgsquote', value: `${s.success_rate} %` },
            { label: 'Aktuelle Serie', value: s.current_streak, accent: true },
            { label: 'Beste Serie', value: s.best_streak },
            { label: 'Ø Lösungszeit', value: this.formatDuration(s.average_seconds) },
        ];
    },

    formatDuration(seconds) {
        if (seconds === null || seconds === undefined) return '–';
        if (seconds < 60) return `${seconds}s`;
        const m = Math.floor(seconds / 60);
        if (m < 60) return `${m}:${String(seconds % 60).padStart(2, '0')}`;
        return `${Math.floor(m / 60)}h ${m % 60}m`;
    },

    insert(text) {
        const input = this.$refs.answerInput;
        if (!input) return;
        const char = text === '−' ? '-' : text === ';' ? '; ' : text;
        const start = input.selectionStart ?? this.answer.length;
        const end = input.selectionEnd ?? this.answer.length;
        this.answer = this.answer.slice(0, start) + char + this.answer.slice(end);
        this.$nextTick(() => {
            input.focus();
            input.setSelectionRange(start + char.length, start + char.length);
        });
    },

    async submitAnswer() {
        if (!this.canSubmit || this.busy) return;
        const answer = this.type === 'multi_value' ? { ...this.values } : this.answer;

        const data = await this.post(`/challenge/${this.state.challenge.level}/answer`, { answer });
        if (!data) return;

        const check = data.check;
        if (check?.status === 'incorrect') {
            this.feedback = { status: 'incorrect', text: check.message || 'Leider falsch. Versuch es noch einmal – oder nimm einen Hinweis.' };
        } else if (check?.status === 'invalid') {
            this.feedback = { status: 'invalid', text: check.message };
        } else {
            this.feedback = null;
        }
    },

    async revealHint() {
        await this.post(`/challenge/${this.state.challenge.level}/hint`);
    },

    async giveUp() {
        await this.post(`/challenge/${this.state.challenge.level}/give-up`);
        this.confirmGiveUp = false;
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
                    ? 'Zu viele Anfragen – bitte warte einen Moment.'
                    : 'Da ist etwas schiefgelaufen. Bitte versuche es erneut.';
                this.feedback = { status: 'invalid', text: message };
                return null;
            }

            const data = await response.json();
            this.justFinished = this.state.result === null && data.result !== null;
            this.state = data;
            this.prefetched = {}; // Status/Statistik der anderen Niveaus hat sich evtl. geändert
            return data;
        } catch {
            this.feedback = { status: 'invalid', text: 'Keine Verbindung zum Server.' };
            return null;
        } finally {
            this.busy = false;
        }
    },
});
