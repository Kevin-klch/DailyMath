/**
 * Digitaler Schmierzettel auf Basis von <canvas> und Pointer Events.
 *
 * - Maus, Touch und Stylus (inkl. Druckstärke beim Stift)
 * - Handballen-Erkennung: Sobald ein Stift benutzt wurde, werden Touch-Eingaben zum Zeichnen ignoriert
 * - Striche werden als Vektordaten gespeichert → verlustfreies Undo/Redo, Resize, Zoom und Persistenz
 * - Zoomen und Verschieben: Strg/⌘ + Mausrad bzw. Trackpad-Pinch, zwei Finger, Hand-Werkzeug,
 *   mittlere Maustaste oder Leertaste + Ziehen
 * - Der Radiergummi radiert nur die Tinte, nicht den (per CSS gezeichneten) Papierhintergrund
 *
 * Koordinaten: Striche liegen in „Blatt-Koordinaten“. Bei 100 % und ohne Verschiebung entsprechen
 * sie den Pixeln der Zeichenfläche – ältere gespeicherte Notizen bleiben dadurch unverändert.
 */
export default class Notepad {
    static INK = '#1b1b24';
    static MAX_HISTORY = 100;
    static MIN_SCALE = 0.25;
    static MAX_SCALE = 4;
    static GRID = 24;
    static LINE = 32;

    constructor(canvas, { storageKey = null, onChange = () => {}, onViewChange = () => {} } = {}) {
        this.canvas = canvas;
        this.ctx = canvas.getContext('2d');
        this.storageKey = storageKey;
        this.onChange = onChange;
        this.onViewChange = onViewChange;

        this.strokes = [];
        this.undoStack = [];
        this.redoStack = [];
        this.current = null;
        this.activePointer = null;
        this.penSeen = false;

        this.view = { scale: 1, x: 0, y: 0 };
        this.touches = new Map(); // aktive Finger für Zwei-Finger-Gesten
        this.gesture = null; // laufendes Verschieben/Pinch-Zoomen
        this.spaceDown = false;

        this.tool = 'pen';
        this.width = 3;
        this.dpr = window.devicePixelRatio || 1;

        this.load();
        this.bindEvents();
        this.resize();
    }

    // ---------------------------------------------------------------- Öffentliche API

    setTool(tool) {
        this.tool = tool;
    }

    setWidth(width) {
        this.width = width;
    }

    get canUndo() {
        return this.undoStack.length > 0;
    }

    get canRedo() {
        return this.redoStack.length > 0;
    }

    get isEmpty() {
        return this.strokes.length === 0;
    }

    get scale() {
        return this.view.scale;
    }

    undo() {
        if (!this.canUndo) return;
        this.redoStack.push(this.strokes);
        this.strokes = this.undoStack.pop();
        this.commit();
    }

    redo() {
        if (!this.canRedo) return;
        this.undoStack.push(this.strokes);
        this.strokes = this.redoStack.pop();
        this.commit();
    }

    /**
     * Wechselt zu einem anderen Zettel (z. B. anderes Niveau). Der bisherige wird sofort gespeichert.
     */
    setStorageKey(key) {
        if (key === this.storageKey) return;

        this.flush();
        this.storageKey = key;
        this.strokes = [];
        this.undoStack = [];
        this.redoStack = [];
        this.current = null;
        this.activePointer = null;
        this.gesture = null;
        this.touches.clear();
        this.load();
        this.setView({ scale: 1, x: 0, y: 0 });
        this.onChange(this);
    }

    clear() {
        if (this.isEmpty) return;
        this.pushHistory();
        this.strokes = [];
        this.commit();
    }

    /**
     * Zoomt um einen Faktor, wahlweise um einen Punkt der Zeichenfläche (Standard: Mitte).
     */
    zoomBy(factor, center = null) {
        const { width, height } = this.canvas.getBoundingClientRect();
        const [cx, cy] = center ?? [width / 2, height / 2];
        const scale = Math.min(Notepad.MAX_SCALE, Math.max(Notepad.MIN_SCALE, this.view.scale * factor));
        const k = scale / this.view.scale;

        this.setView({ scale, x: cx - (cx - this.view.x) * k, y: cy - (cy - this.view.y) * k });
    }

    resetView() {
        this.setView({ scale: 1, x: 0, y: 0 });
    }

    /**
     * Exportiert Papier + alle Notizen als PNG – unabhängig vom aktuellen Ausschnitt.
     */
    toBlob(paper = 'blank') {
        const rect = this.canvas.getBoundingClientRect();
        const pad = 24;
        let bounds = { minX: 0, minY: 0, maxX: rect.width, maxY: rect.height };

        if (!this.isEmpty) {
            bounds = { minX: Infinity, minY: Infinity, maxX: -Infinity, maxY: -Infinity };
            for (const stroke of this.strokes) {
                for (const [x, y] of stroke.points) {
                    bounds.minX = Math.min(bounds.minX, x - stroke.width);
                    bounds.minY = Math.min(bounds.minY, y - stroke.width);
                    bounds.maxX = Math.max(bounds.maxX, x + stroke.width);
                    bounds.maxY = Math.max(bounds.maxY, y + stroke.width);
                }
            }
            bounds = { minX: bounds.minX - pad, minY: bounds.minY - pad, maxX: bounds.maxX + pad, maxY: bounds.maxY + pad };
        }

        const width = bounds.maxX - bounds.minX;
        const height = bounds.maxY - bounds.minY;
        const scale = Math.min(2, 8000 / Math.max(width, height)); // Obergrenze für sehr große Zettel

        const ink = document.createElement('canvas');
        ink.width = Math.ceil(width * scale);
        ink.height = Math.ceil(height * scale);
        const inkCtx = ink.getContext('2d');
        inkCtx.setTransform(scale, 0, 0, scale, -bounds.minX * scale, -bounds.minY * scale);
        this.drawStrokes(inkCtx, this.strokes);

        const out = document.createElement('canvas');
        out.width = ink.width;
        out.height = ink.height;
        const ctx = out.getContext('2d');
        ctx.setTransform(scale, 0, 0, scale, -bounds.minX * scale, -bounds.minY * scale);
        this.drawPaper(ctx, bounds, paper);
        ctx.setTransform(1, 0, 0, 1, 0, 0);
        ctx.drawImage(ink, 0, 0);

        return new Promise((resolve) => out.toBlob(resolve, 'image/png'));
    }

    destroy() {
        this.resizeObserver?.disconnect();
        this.abort.abort();
    }

    // ---------------------------------------------------------------- Eingabe

    bindEvents() {
        this.abort = new AbortController();
        const opts = { signal: this.abort.signal };

        this.canvas.addEventListener('pointerdown', (e) => this.onPointerDown(e), opts);
        this.canvas.addEventListener('pointermove', (e) => this.onPointerMove(e), opts);
        this.canvas.addEventListener('pointerup', (e) => this.onPointerUp(e), opts);
        this.canvas.addEventListener('pointercancel', (e) => this.onPointerUp(e), opts);
        this.canvas.addEventListener('contextmenu', (e) => e.preventDefault(), opts);
        this.canvas.addEventListener('wheel', (e) => this.onWheel(e), { ...opts, passive: false });

        // Leertaste gedrückt halten = vorübergehend verschieben (wie in Grafikprogrammen)
        window.addEventListener('keydown', (e) => {
            if (e.code === 'Space' && !e.target.closest('input, textarea, select, button, [contenteditable]')) {
                if (this.canvas.matches(':hover')) e.preventDefault();
                this.spaceDown = true;
            }
        }, opts);
        window.addEventListener('keyup', (e) => {
            if (e.code === 'Space') this.spaceDown = false;
        }, opts);

        this.resizeObserver = new ResizeObserver(() => this.resize());
        this.resizeObserver.observe(this.canvas);
    }

    onPointerDown(e) {
        if (e.pointerType === 'pen') this.penSeen = true;

        if (e.pointerType === 'touch') {
            this.touches.set(e.pointerId, this.localPoint(e));

            // Zweiter Finger: angefangenen Strich verwerfen und Zoom/Verschieben starten
            if (this.touches.size === 2) {
                e.preventDefault();
                if (this.current && this.activePointer !== null) {
                    this.current = null;
                    this.activePointer = null;
                    this.render();
                }
                this.startPinch();
                return;
            }
            if (this.penSeen) return; // Handballen ignorieren
        }

        if (this.activePointer !== null || this.gesture) return;

        const panning = this.tool === 'hand' || this.spaceDown || e.button === 1;
        if (!panning && e.button !== 0 && e.button !== 5 && e.pointerType === 'mouse') return;

        e.preventDefault();
        this.canvas.setPointerCapture(e.pointerId);
        this.activePointer = e.pointerId;

        if (panning) {
            this.gesture = { type: 'pan', start: this.localPoint(e), view: { ...this.view } };
            this.canvas.style.cursor = 'grabbing';
            return;
        }

        // Stift-Radierer (button 5) radiert direkt
        const tool = e.button === 5 ? 'eraser' : this.tool;
        const width = tool === 'eraser' ? this.width * 6 : this.width;

        this.current = {
            tool,
            width: Math.round((width / this.view.scale) * 100) / 100, // auf dem Bildschirm immer gleich dick
            pressure: e.pointerType === 'pen',
            points: [this.pointFrom(e)],
        };

        this.drawDot(this.ctx, this.current);
    }

    onPointerMove(e) {
        if (e.pointerType === 'touch' && this.touches.has(e.pointerId)) {
            this.touches.set(e.pointerId, this.localPoint(e));
            if (this.gesture?.type === 'pinch') {
                e.preventDefault();
                this.updatePinch();
                return;
            }
        }

        if (e.pointerId !== this.activePointer) return;
        e.preventDefault();

        if (this.gesture?.type === 'pan') {
            const [x, y] = this.localPoint(e);
            const { start, view } = this.gesture;
            this.setView({ scale: view.scale, x: view.x + x - start[0], y: view.y + y - start[1] });
            return;
        }

        if (!this.current) return;

        const events = e.getCoalescedEvents?.() ?? [e];
        const minDistance = 0.75 / this.view.scale;
        for (const ev of events) {
            const point = this.pointFrom(ev);
            const last = this.current.points.at(-1);
            if (Math.hypot(point[0] - last[0], point[1] - last[1]) < minDistance) continue;

            this.current.points.push(point);
            this.drawSegment(this.ctx, this.current, this.current.points.length - 1);
        }
    }

    onPointerUp(e) {
        if (e.pointerType === 'touch') {
            this.touches.delete(e.pointerId);
            if (this.gesture?.type === 'pinch') {
                if (this.touches.size < 2) this.gesture = null;
                return;
            }
        }

        if (e.pointerId !== this.activePointer) return;
        this.activePointer = null;

        if (this.gesture?.type === 'pan') {
            this.gesture = null;
            this.canvas.style.cursor = '';
            return;
        }

        if (this.current) {
            this.pushHistory();
            this.strokes = [...this.strokes, this.current];
            this.current = null;
            this.commit();
        }
    }

    onWheel(e) {
        // Nur mit Strg/⌘ (bzw. Trackpad-Pinch, der als Strg+Rad ankommt) – sonst scrollt die Seite normal.
        if (!e.ctrlKey && !e.metaKey) return;
        e.preventDefault();

        const delta = e.deltaMode === 1 ? e.deltaY * 16 : e.deltaY;
        this.zoomBy(Math.exp(-delta * 0.0025), this.localPoint(e));
    }

    startPinch() {
        const [a, b] = [...this.touches.values()];
        this.gesture = {
            type: 'pinch',
            distance: Math.hypot(a[0] - b[0], a[1] - b[1]) || 1,
            mid: [(a[0] + b[0]) / 2, (a[1] + b[1]) / 2],
            view: { ...this.view },
        };
    }

    updatePinch() {
        const [a, b] = [...this.touches.values()];
        const { distance, mid, view } = this.gesture;
        const now = [(a[0] + b[0]) / 2, (a[1] + b[1]) / 2];
        const scale = Math.min(Notepad.MAX_SCALE, Math.max(Notepad.MIN_SCALE, view.scale * (Math.hypot(a[0] - b[0], a[1] - b[1]) / distance)));

        // Der Blattpunkt unter der ursprünglichen Fingermitte folgt der aktuellen Fingermitte.
        const worldX = (mid[0] - view.x) / view.scale;
        const worldY = (mid[1] - view.y) / view.scale;
        this.setView({ scale, x: now[0] - worldX * scale, y: now[1] - worldY * scale });
    }

    /** Position relativ zur Zeichenfläche in Bildschirmpixeln. */
    localPoint(e) {
        const rect = this.canvas.getBoundingClientRect();
        return [e.clientX - rect.left, e.clientY - rect.top];
    }

    /** Position in Blatt-Koordinaten inkl. Druckstärke. */
    pointFrom(e) {
        const [x, y] = this.localPoint(e);
        const pressure = e.pointerType === 'pen' ? e.pressure || 0.5 : 0.5;

        return [
            Math.round(((x - this.view.x) / this.view.scale) * 10) / 10,
            Math.round(((y - this.view.y) / this.view.scale) * 10) / 10,
            Math.round(pressure * 100) / 100,
        ];
    }

    // ---------------------------------------------------------------- Ansicht

    setView(view) {
        this.view = view;
        this.render();
        this.syncPaper();
        this.onViewChange(this);
    }

    /** Das Papierraster (CSS-Hintergrund) zoomt und wandert mit. */
    syncPaper() {
        const style = this.canvas.parentElement?.style;
        if (!style) return;
        style.setProperty('--paper-grid', `${Notepad.GRID * this.view.scale}px`);
        style.setProperty('--paper-line', `${Notepad.LINE * this.view.scale}px`);
        style.setProperty('--paper-x', `${this.view.x}px`);
        style.setProperty('--paper-y', `${this.view.y}px`);
    }

    // ---------------------------------------------------------------- Zeichnen

    resize() {
        const { width, height } = this.canvas.getBoundingClientRect();
        if (!width || !height) return; // z. B. mobil im ausgeblendeten Tab

        this.dpr = window.devicePixelRatio || 1;
        this.canvas.width = Math.round(width * this.dpr);
        this.canvas.height = Math.round(height * this.dpr);
        this.render();
        this.syncPaper();
    }

    render() {
        const { scale, x, y } = this.view;
        this.ctx.setTransform(1, 0, 0, 1, 0, 0);
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.ctx.setTransform(this.dpr * scale, 0, 0, this.dpr * scale, this.dpr * x, this.dpr * y);
        this.drawStrokes(this.ctx, this.strokes);
        if (this.current) this.drawStrokes(this.ctx, [this.current]);
    }

    drawStrokes(ctx, strokes) {
        for (const stroke of strokes) {
            this.drawDot(ctx, stroke);
            for (let i = 1; i < stroke.points.length; i++) {
                this.drawSegment(ctx, stroke, i);
            }
        }
    }

    prepare(ctx, stroke) {
        ctx.globalCompositeOperation = stroke.tool === 'eraser' ? 'destination-out' : 'source-over';
        ctx.strokeStyle = Notepad.INK;
        ctx.fillStyle = Notepad.INK;
        ctx.lineCap = 'round';
        ctx.lineJoin = 'round';
    }

    lineWidth(stroke, point) {
        return stroke.pressure ? stroke.width * (0.35 + point[2] * 1.3) : stroke.width;
    }

    drawDot(ctx, stroke) {
        const p = stroke.points[0];
        this.prepare(ctx, stroke);
        ctx.beginPath();
        ctx.arc(p[0], p[1], this.lineWidth(stroke, p) / 2, 0, Math.PI * 2);
        ctx.fill();
        ctx.globalCompositeOperation = 'source-over';
    }

    /**
     * Zeichnet das Segment zum Punkt i als geglättete Kurve über die Mittelpunkte.
     */
    drawSegment(ctx, stroke, i) {
        const pts = stroke.points;
        const p0 = pts[Math.max(i - 2, 0)];
        const p1 = pts[i - 1];
        const p2 = pts[i];

        const start = [(p0[0] + p1[0]) / 2, (p0[1] + p1[1]) / 2];
        const end = [(p1[0] + p2[0]) / 2, (p1[1] + p2[1]) / 2];

        this.prepare(ctx, stroke);
        ctx.lineWidth = this.lineWidth(stroke, p2);
        ctx.beginPath();
        ctx.moveTo(i === 1 ? p1[0] : start[0], i === 1 ? p1[1] : start[1]);
        ctx.quadraticCurveTo(p1[0], p1[1], end[0], end[1]);
        ctx.lineTo(p2[0], p2[1]);
        ctx.stroke();
        ctx.globalCompositeOperation = 'source-over';
    }

    /** Papier für den Export – das Raster liegt wie auf dem Bildschirm auf Vielfachen von GRID/LINE. */
    drawPaper(ctx, { minX, minY, maxX, maxY }, paper) {
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(minX, minY, maxX - minX, maxY - minY);
        ctx.strokeStyle = '#dfe6f0';
        ctx.lineWidth = 1;

        if (paper === 'grid') {
            for (let x = Math.ceil(minX / Notepad.GRID) * Notepad.GRID; x < maxX; x += Notepad.GRID) this.line(ctx, x, minY, x, maxY);
            for (let y = Math.ceil(minY / Notepad.GRID) * Notepad.GRID; y < maxY; y += Notepad.GRID) this.line(ctx, minX, y, maxX, y);
        } else if (paper === 'lined') {
            for (let y = Math.ceil(minY / Notepad.LINE) * Notepad.LINE; y < maxY; y += Notepad.LINE) this.line(ctx, minX, y, maxX, y);
        }
    }

    line(ctx, x1, y1, x2, y2) {
        ctx.beginPath();
        ctx.moveTo(x1 + 0.5, y1 + 0.5);
        ctx.lineTo(x2 + 0.5, y2 + 0.5);
        ctx.stroke();
    }

    // ---------------------------------------------------------------- Zustand

    pushHistory() {
        this.undoStack.push(this.strokes);
        if (this.undoStack.length > Notepad.MAX_HISTORY) this.undoStack.shift();
        this.redoStack = [];
    }

    commit() {
        this.render();
        this.save();
        this.onChange(this);
    }

    save() {
        if (!this.storageKey) return;
        clearTimeout(this.saveTimer);
        this.saveTimer = setTimeout(() => this.flush(), 300);
    }

    flush() {
        clearTimeout(this.saveTimer);
        if (!this.storageKey) return;
        try {
            localStorage.setItem(this.storageKey, JSON.stringify(this.strokes));
        } catch {
            // Speicher voll oder deaktiviert – Notizen bleiben nur bis zum Neuladen erhalten.
        }
    }

    load() {
        if (!this.storageKey) return;
        try {
            const data = JSON.parse(localStorage.getItem(this.storageKey) ?? '[]');
            if (Array.isArray(data)) this.strokes = data;
        } catch {
            this.strokes = [];
        }
    }
}
