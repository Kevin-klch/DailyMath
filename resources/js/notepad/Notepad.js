/**
 * Digitaler Schmierzettel auf Basis von <canvas> und Pointer Events.
 *
 * - Maus, Touch und Stylus (inkl. Druckstärke beim Stift)
 * - Handballen-Erkennung: Sobald ein Stift benutzt wurde, werden Touch-Eingaben ignoriert
 * - Striche werden als Vektordaten gespeichert → verlustfreies Undo/Redo, Resize und Persistenz
 * - Der Radiergummi radiert nur die Tinte, nicht den (per CSS gezeichneten) Papierhintergrund
 */
export default class Notepad {
    static INK = '#1b1b24';
    static MAX_HISTORY = 100;

    constructor(canvas, { storageKey = null, onChange = () => {} } = {}) {
        this.canvas = canvas;
        this.ctx = canvas.getContext('2d');
        this.storageKey = storageKey;
        this.onChange = onChange;

        this.strokes = [];
        this.undoStack = [];
        this.redoStack = [];
        this.current = null;
        this.activePointer = null;
        this.penSeen = false;

        this.tool = 'pen';
        this.width = 3;

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
        this.load();
        this.render();
        this.onChange(this);
    }

    clear() {
        if (this.isEmpty) return;
        this.pushHistory();
        this.strokes = [];
        this.commit();
    }

    /**
     * Exportiert Papier + Notizen als PNG.
     */
    toBlob(paper = 'blank') {
        const { width, height } = this.canvas.getBoundingClientRect();
        const scale = 2;

        const ink = document.createElement('canvas');
        ink.width = width * scale;
        ink.height = height * scale;
        const inkCtx = ink.getContext('2d');
        inkCtx.scale(scale, scale);
        this.drawStrokes(inkCtx, this.strokes);

        const out = document.createElement('canvas');
        out.width = ink.width;
        out.height = ink.height;
        const ctx = out.getContext('2d');
        ctx.scale(scale, scale);
        this.drawPaper(ctx, width, height, paper);
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

        this.resizeObserver = new ResizeObserver(() => this.resize());
        this.resizeObserver.observe(this.canvas);
    }

    onPointerDown(e) {
        if (e.pointerType === 'pen') this.penSeen = true;
        if (e.pointerType === 'touch' && this.penSeen) return; // Handballen ignorieren
        if (e.button !== 0 && e.pointerType === 'mouse') return;
        if (this.activePointer !== null) return;

        e.preventDefault();
        this.canvas.setPointerCapture(e.pointerId);
        this.activePointer = e.pointerId;

        // Rechte Maustaste/Stift-Radierer (button 5) radieren direkt
        const tool = e.button === 5 ? 'eraser' : this.tool;

        this.current = {
            tool,
            width: tool === 'eraser' ? this.width * 6 : this.width,
            pressure: e.pointerType === 'pen',
            points: [this.pointFrom(e)],
        };

        this.drawDot(this.ctx, this.current);
    }

    onPointerMove(e) {
        if (e.pointerId !== this.activePointer || !this.current) return;
        e.preventDefault();

        const events = e.getCoalescedEvents?.() ?? [e];
        for (const ev of events) {
            const point = this.pointFrom(ev);
            const last = this.current.points.at(-1);
            if (Math.hypot(point[0] - last[0], point[1] - last[1]) < 0.75) continue;

            this.current.points.push(point);
            this.drawSegment(this.ctx, this.current, this.current.points.length - 1);
        }
    }

    onPointerUp(e) {
        if (e.pointerId !== this.activePointer) return;
        this.activePointer = null;

        if (this.current) {
            this.pushHistory();
            this.strokes = [...this.strokes, this.current];
            this.current = null;
            this.commit();
        }
    }

    pointFrom(e) {
        const rect = this.canvas.getBoundingClientRect();
        const pressure = e.pointerType === 'pen' ? e.pressure || 0.5 : 0.5;

        return [
            Math.round((e.clientX - rect.left) * 10) / 10,
            Math.round((e.clientY - rect.top) * 10) / 10,
            Math.round(pressure * 100) / 100,
        ];
    }

    // ---------------------------------------------------------------- Zeichnen

    resize() {
        const { width, height } = this.canvas.getBoundingClientRect();
        if (!width || !height) return; // z. B. mobil im ausgeblendeten Tab

        const dpr = window.devicePixelRatio || 1;
        this.canvas.width = Math.round(width * dpr);
        this.canvas.height = Math.round(height * dpr);
        this.ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        this.render();
    }

    render() {
        const { width, height } = this.canvas.getBoundingClientRect();
        this.ctx.clearRect(0, 0, width, height);
        this.drawStrokes(this.ctx, this.strokes);
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

    drawPaper(ctx, width, height, paper) {
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, width, height);
        ctx.strokeStyle = '#dfe6f0';
        ctx.lineWidth = 1;

        if (paper === 'grid') {
            for (let x = 24; x < width; x += 24) this.line(ctx, x, 0, x, height);
            for (let y = 24; y < height; y += 24) this.line(ctx, 0, y, width, y);
        } else if (paper === 'lined') {
            for (let y = 32; y < height; y += 32) this.line(ctx, 0, y, width, y);
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
