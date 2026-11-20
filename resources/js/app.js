import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import renderMathInElement from 'katex/contrib/auto-render';

import dailyChallenge from './components/dailyChallenge';
import notepad from './components/notepad';
import questionForm from './components/questionForm';

const KATEX_OPTIONS = {
    delimiters: [
        { left: '$$', right: '$$', display: true },
        { left: '$', right: '$', display: false },
    ],
    throwOnError: false,
};

/**
 * x-math="html": setzt (serverseitig escaptes) HTML und rendert enthaltenes LaTeX mit KaTeX.
 */
Alpine.directive('math', (el, { expression }, { evaluateLater, effect }) => {
    const getHtml = evaluateLater(expression);

    effect(() => {
        getHtml((html) => {
            el.innerHTML = html ?? '';
            renderMathInElement(el, KATEX_OPTIONS);
        });
    });
});

Alpine.plugin(focus);
Alpine.data('dailyChallenge', dailyChallenge);
Alpine.data('notepad', notepad);
Alpine.data('questionForm', questionForm);

window.Alpine = Alpine;
Alpine.start();
