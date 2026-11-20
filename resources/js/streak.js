/**
 * Stellt die Serie (Streak) als kleine Rechnung dar – z. B. 4 als √16 oder 12 als 3 · 4.
 *
 * Es werden nur einfache, allgemein bekannte Operationen benutzt (Wurzeln aus Quadratzahlen,
 * Quadrate, kleine Potenzen, 3! und 4!, kleines Einmaleins, Plus/Minus mit Zehnern).
 * Jede Zahl hat immer denselben Ausdruck; die Art wechselt aber von Zahl zu Zahl.
 * Über 100 (und bei 0) wird einfach die Zahl angezeigt.
 */
const SUPERSCRIPT = { 0: '⁰', 1: '¹', 2: '²', 3: '³', 4: '⁴', 5: '⁵', 6: '⁶', 7: '⁷', 8: '⁸', 9: '⁹' };
const sup = (n) => String(n).split('').map((d) => SUPERSCRIPT[d]).join('');

export const STREAK_LIMIT = 100;

/**
 * Alle passenden Darstellungen für n – die „schönsten“ zuerst.
 *
 * @returns {string[]}
 */
export function streakCandidates(n) {
    const candidates = [];

    // Quadrate, Kubikzahlen, Zweierpotenzen
    const root = Math.round(Math.sqrt(n));
    if (root >= 2 && root * root === n) candidates.push(`${root}²`);

    const cube = Math.round(Math.cbrt(n));
    if (cube >= 2 && cube * cube * cube === n) candidates.push(`${cube}³`);

    const log2 = Math.log2(n);
    if (Number.isInteger(log2) && log2 >= 4) candidates.push(`2${sup(log2)}`);

    // Fakultäten, die man kennt
    if (n === 6) candidates.push('3!');
    if (n === 24) candidates.push('4!');

    // Wurzel aus einer Quadratzahl (bis √144)
    if (n <= 12) candidates.push(`√${n * n}`);

    // Einmaleins (verschiedene Faktoren, beide höchstens 12) – das „ausgewogenste“ Paar
    for (let a = Math.floor(Math.sqrt(n)); a >= 2; a--) {
        const b = n / a;
        if (Number.isInteger(b) && a !== b && b <= 12) {
            candidates.push(`${a} · ${b}`);
            break;
        }
    }

    // Knapp neben einer Quadrat- oder Kubikzahl, z. B. 50 = 7² + 1 oder 63 = 4³ − 1
    if (root >= 3 && root * root !== n && Math.abs(n - root * root) <= 3) {
        const d = n - root * root;
        candidates.push(d > 0 ? `${root}² + ${d}` : `${root}² − ${-d}`);
    }
    if (cube >= 2 && Math.abs(n - cube ** 3) === 1) {
        candidates.push(n > cube ** 3 ? `${cube}³ + 1` : `${cube}³ − 1`);
    }

    // Halbieren (z. B. 18 : 2, bei Fünferzahlen auch größer: 150 : 2)
    if ((n >= 3 && n <= 50) || n % 5 === 0) candidates.push(`${n * 2} : 2`);

    // Verdoppeln (z. B. 2 · 37)
    if (n > 50 && n % 2 === 0) candidates.push(`2 · ${n / 2}`);

    // Zehner und Einer, z. B. 7 · 10 + 3
    if (n > 20 && n % 10 !== 0) candidates.push(`${Math.floor(n / 10)} · 10 + ${n % 10}`);

    // Von 100 abziehen (ab 80)
    if (n >= 80 && n < 100 && n % 10 !== 0) candidates.push(`100 − ${100 - n}`);

    // Plus/Minus mit vollen Zehnern bzw. mit 100
    if (n > 10 && n % 10 === 0) {
        candidates.push(`${n / 10} · 10`);
    } else if (n > 10) {
        const tens = Math.floor(n / 10) * 10;
        const rest = n - tens;
        candidates.push(rest >= 7 ? `${tens + 10} − ${10 - rest}` : `${tens} + ${rest}`);
    } else if (n >= 2) {
        candidates.push(`${n + 1} − 1`);
    }

    return candidates;
}

/**
 * Darstellung der Serie als Rechnung.
 */
export function streakExpression(n) {
    if (!Number.isInteger(n) || n < 1 || n > STREAK_LIMIT) return String(n ?? 0);
    if (n === 1) return '√1';

    let candidates = streakCandidates(n);

    // Besondere Zahlen (Quadrat-, Kubikzahlen, Zweierpotenzen, Fakultäten) immer mit ihrer schönsten Form zeigen.
    if (isSpecial(n)) return candidates[0];

    // Zahlen aus dem (großen) Einmaleins lieber als Produkt oder knapp neben einer Quadratzahl zeigen
    // als mit Zehnern zu rechnen – das ist interessanter.
    const timesTable = candidates.find((c) => /^\d+ · (1[0-2]|[2-9])$/.test(c) && !c.endsWith('· 10'));
    if (timesTable && n > 12) {
        candidates = candidates.filter((c) => c === timesTable || /[²³]/.test(c) || c.includes(':'));
    }

    // Sonst abwechselnd – deterministisch, damit dieselbe Serie immer gleich aussieht.
    // Goldener Schnitt als Streuung: benachbarte Zahlen landen bei unterschiedlichen Darstellungen.
    return candidates[Math.floor(((n * 0.6180339887) % 1) * candidates.length)];
}

function isSpecial(n) {
    const root = Math.round(Math.sqrt(n));
    const cube = Math.round(Math.cbrt(n));
    const log2 = Math.log2(n);

    return (root >= 2 && root * root === n)
        || (cube >= 2 && cube ** 3 === n)
        || (Number.isInteger(log2) && log2 >= 4)
        || n === 6
        || n === 24;
}
