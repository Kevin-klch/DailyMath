import Notepad from '../notepad/Notepad';

const PREFS_KEY = 'dailymath:notepad-prefs';
const NOTES_PREFIX = 'dailymath:notes:';

const storage = {
    get(key, fallback) {
        try {
            return JSON.parse(localStorage.getItem(key)) ?? fallback;
        } catch {
            return fallback;
        }
    },
    set(key, value) {
        try {
            localStorage.setItem(key, JSON.stringify(value));
        } catch {
            /* ignorieren */
        }
    },
};

/**
 * Alpine-Komponente für den Notizblock (Werkzeugleiste + Canvas).
 */
export default (storageKey, keepPrefix = storageKey) => ({
    pad: null,
    tool: 'pen',
    width: 3,
    paper: 'grid',
    canUndo: false,
    canRedo: false,
    isEmpty: true,
    sizes: [
        { value: 2, dot: 4, label: 'Fein' },
        { value: 3, dot: 6, label: 'Mittel' },
        { value: 6, dot: 9, label: 'Dick' },
    ],

    init() {
        this.removeOldNotes();

        const prefs = storage.get(PREFS_KEY, {});
        this.width = prefs.width ?? this.width;
        this.paper = prefs.paper ?? this.paper;

        // Die Notepad-Instanz bewusst nicht reaktiv machen (Performance beim Zeichnen).
        const pad = new Notepad(this.$refs.canvas, {
            storageKey,
            onChange: (p) => this.sync(p),
        });
        pad.setWidth(this.width);
        this.pad = () => pad;
        this.sync(pad);

        this.onKeydown = (e) => this.handleShortcut(e);
        window.addEventListener('keydown', this.onKeydown);

        // Jedes Niveau hat seinen eigenen Zettel.
        this.onLevelChanged = (e) => pad.setStorageKey(keepPrefix + e.detail.level);
        window.addEventListener('dailymath:level-changed', this.onLevelChanged);
    },

    destroy() {
        this.pad?.().destroy();
        window.removeEventListener('keydown', this.onKeydown);
        window.removeEventListener('dailymath:level-changed', this.onLevelChanged);
    },

    sync(pad) {
        this.canUndo = pad.canUndo;
        this.canRedo = pad.canRedo;
        this.isEmpty = pad.isEmpty;
    },

    setTool(tool) {
        this.tool = tool;
        this.pad().setTool(tool);
    },

    setWidth(width) {
        this.width = width;
        this.pad().setWidth(width);
        if (this.tool === 'eraser') this.setTool('pen');
        this.savePrefs();
    },

    savePrefs() {
        storage.set(PREFS_KEY, { width: this.width, paper: this.paper });
    },

    undo() {
        this.pad().undo();
    },

    redo() {
        this.pad().redo();
    },

    clear() {
        this.pad().clear();
    },

    async download() {
        const blob = await this.pad().toBlob(this.paper);
        if (!blob) return;
        const url = URL.createObjectURL(blob);
        const link = Object.assign(document.createElement('a'), {
            href: url,
            download: `dailymath-notizen-${new Date().toISOString().slice(0, 10)}.png`,
        });
        link.click();
        setTimeout(() => URL.revokeObjectURL(url), 1000);
    },

    handleShortcut(e) {
        if (e.target.closest('input, textarea, select, [contenteditable]')) return;
        const mod = e.ctrlKey || e.metaKey;

        if (mod && e.key.toLowerCase() === 'z' && !e.shiftKey) {
            e.preventDefault();
            this.undo();
        } else if (mod && (e.key.toLowerCase() === 'y' || (e.key.toLowerCase() === 'z' && e.shiftKey))) {
            e.preventDefault();
            this.redo();
        } else if (!mod && e.key.toLowerCase() === 'p') {
            this.setTool('pen');
        } else if (!mod && e.key.toLowerCase() === 'e') {
            this.setTool('eraser');
        }
    },

    /**
     * Notizen vergangener Tage aufräumen. Die Notizen der anderen Niveaus von heute bleiben erhalten.
     */
    removeOldNotes() {
        try {
            Object.keys(localStorage)
                .filter((key) => key.startsWith(NOTES_PREFIX) && !key.startsWith(keepPrefix))
                .forEach((key) => localStorage.removeItem(key));
        } catch {
            /* ignorieren */
        }
    },
});
