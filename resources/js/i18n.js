/**
 * Übersetzungen fürs Frontend. Die Texte kommen vom Server (App\Support\JsTranslations)
 * und werden im Layout als JSON eingebettet. Der englische Text ist zugleich der Schlüssel.
 */
let data = { locale: 'en', messages: {} };

try {
    data = JSON.parse(document.getElementById('i18n')?.textContent ?? '') ?? data;
} catch {
    /* ohne Übersetzungen gilt Englisch */
}

export const locale = data.locale;

export function t(key, replacements = {}) {
    let text = data.messages[key] ?? key;
    for (const [name, value] of Object.entries(replacements)) {
        text = text.replaceAll(`:${name}`, value);
    }
    return text;
}
