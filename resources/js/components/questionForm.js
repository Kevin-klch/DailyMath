/**
 * Alpine-Komponente für das Aufgabenformular der Verwaltung:
 * Sprach-Reiter, Hinweise hinzufügen/entfernen, Live-Vorschau (KaTeX) und „Antwort testen“.
 */
const csrf = () => document.querySelector('meta[name="csrf-token"]').content;

const postJson = async (url, body) => {
    const response = await fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', Accept: 'application/json', 'X-CSRF-TOKEN': csrf() },
        body: JSON.stringify(body),
    });
    if (!response.ok) throw new Error(`HTTP ${response.status}`);
    return response.json();
};

export default (initial, urls) => ({
    form: initial,
    lang: 'en', // Reiter im Formular
    previewLang: 'en',
    preview: { prompt: '', solution: '', background: '', hints: [] },
    previewTab: 'prompt',
    testInput: '',
    testValues: {},
    testResult: null,
    stages: [
        { value: 'nudge', label: 'Denkanstoß' },
        { value: 'approach', label: 'Lösungsansatz' },
        { value: 'help', label: 'Konkrete Hilfestellung' },
        { value: 'almost', label: 'Fast vollständige Lösung' },
    ],

    init() {
        let timer;
        // Vorschau neu rendern, sobald sich Texte ändern (leicht verzögert)
        this.$watch(() => JSON.stringify([this.form.en, this.form.de, this.form.hints, this.previewLang]), () => {
            clearTimeout(timer);
            timer = setTimeout(() => this.renderPreview(), 300);
        });
        this.renderPreview();
    },

    get variables() {
        return this.form.answer.pairs
            .split(/[;\n]/)
            .map((line) => line.match(/^\s*([A-Za-z][A-Za-z0-9_]*)\s*=/)?.[1])
            .filter(Boolean);
    },

    get options() {
        return this.form.answer.options
            .split('\n')
            .map((line) => line.match(/^\s*([a-z])\s*\|\s*(.+?)\s*$/))
            .filter(Boolean)
            .map((m) => ({ key: m[1], label: m[2] }));
    },

    /** Text in der Vorschau-Sprache – ohne deutsche Übersetzung wie auf der Seite mit Englisch als Rückfall. */
    text(field) {
        const de = this.form.de[field];
        return this.previewLang === 'de' && de?.trim() ? de : this.form.en[field];
    },

    get previewTitle() {
        return this.text('title') || 'Ohne Titel';
    },

    get missingGerman() {
        return ['title', 'prompt', 'solution'].filter((f) => !this.form.de[f]?.trim()).length
            + this.form.hints.filter((h) => h.en.trim() && !h.de.trim()).length;
    },

    async renderPreview() {
        const hints = this.form.hints.map((h) => (this.previewLang === 'de' && h.de.trim() ? h.de : h.en));
        try {
            const { html } = await postJson(urls.preview, {
                texts: [this.text('prompt'), this.text('solution'), this.text('background'), ...hints],
            });
            const [prompt, solution, background, ...hintHtml] = html;
            this.preview = { prompt, solution, background, hints: hintHtml };
        } catch {
            /* Vorschau ist nur ein Komfort – Fehler ignorieren */
        }
    },

    addHint() {
        if (this.form.hints.length >= 4) return;
        const used = this.form.hints.map((h) => h.stage);
        const next = this.stages.find((s) => !used.includes(s.value))?.value ?? 'almost';
        this.form.hints.push({ stage: next, en: '', de: '' });
    },

    removeHint(index) {
        this.form.hints.splice(index, 1);
    },

    moveHint(index, delta) {
        const target = index + delta;
        if (target < 0 || target >= this.form.hints.length) return;
        const hints = [...this.form.hints];
        [hints[index], hints[target]] = [hints[target], hints[index]];
        this.form.hints = hints;
    },

    async testAnswer() {
        const input = this.form.answer_type === 'multi_value' ? { ...this.testValues } : this.testInput;
        try {
            this.testResult = await postJson(urls.check, { answer_type: this.form.answer_type, answer: this.form.answer, input });
        } catch {
            this.testResult = { status: 'error', message: 'Test fehlgeschlagen – sind alle Felder ausgefüllt?' };
        }
    },

    get testLabel() {
        return { correct: '✓ Richtig', incorrect: '✗ Falsch', invalid: '⚠ Ungültige Eingabe', error: '⚠ Fehler' }[this.testResult?.status] ?? '';
    },
});
