/**
 * Kleiner, abhängigkeitsfreier Konfetti-Effekt für richtige Antworten.
 * Die Teilchen starten am übergebenen Element und fallen dann über die ganze Seite.
 */
const COLORS = ['#f7951d', '#ffad42', '#ffc679', '#ffffff', '#5fd59a'];

export default function confetti(origin, { count = 120, duration = 1800 } = {}) {
    if (matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const canvas = document.createElement('canvas');
    canvas.setAttribute('aria-hidden', 'true');
    Object.assign(canvas.style, { position: 'fixed', inset: '0', width: '100%', height: '100%', pointerEvents: 'none', zIndex: '60' });
    document.body.appendChild(canvas);

    const dpr = window.devicePixelRatio || 1;
    canvas.width = innerWidth * dpr;
    canvas.height = innerHeight * dpr;
    const ctx = canvas.getContext('2d');
    ctx.scale(dpr, dpr);

    const rect = origin?.getBoundingClientRect() ?? { left: innerWidth / 2, top: innerHeight / 2, width: 0, height: 0 };
    const cx = rect.left + rect.width / 2;
    const cy = rect.top + rect.height / 3;

    const particles = Array.from({ length: count }, () => {
        const angle = -Math.PI / 2 + (Math.random() - 0.5) * Math.PI * 1.1;
        const speed = 7 + Math.random() * 9;
        return {
            x: cx + (Math.random() - 0.5) * rect.width * 0.6,
            y: cy,
            vx: Math.cos(angle) * speed,
            vy: Math.sin(angle) * speed,
            size: 5 + Math.random() * 6,
            rotation: Math.random() * Math.PI,
            spin: (Math.random() - 0.5) * 0.4,
            color: COLORS[Math.floor(Math.random() * COLORS.length)],
            round: Math.random() < 0.3,
        };
    });

    const start = performance.now();

    const frame = (now) => {
        const t = now - start;
        ctx.clearRect(0, 0, innerWidth, innerHeight);
        ctx.globalAlpha = Math.max(0, 1 - Math.max(0, t - duration * 0.6) / (duration * 0.4));

        for (const p of particles) {
            p.vx *= 0.985;
            p.vy = p.vy * 0.985 + 0.32;
            p.x += p.vx;
            p.y += p.vy;
            p.rotation += p.spin;

            ctx.save();
            ctx.translate(p.x, p.y);
            ctx.rotate(p.rotation);
            ctx.fillStyle = p.color;
            if (p.round) {
                ctx.beginPath();
                ctx.arc(0, 0, p.size / 2.4, 0, Math.PI * 2);
                ctx.fill();
            } else {
                ctx.fillRect(-p.size / 2, -p.size / 4, p.size, p.size / 2);
            }
            ctx.restore();
        }

        if (t < duration) requestAnimationFrame(frame);
        else canvas.remove();
    };

    requestAnimationFrame(frame);
}
