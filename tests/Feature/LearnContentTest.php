<?php

namespace Tests\Feature;

use App\Learn\LearnCategory;
use App\Learn\LearnRepository;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Qualitätsprüfung aller Lernartikel in resources/learn/{en,de}/*.md.
 */
class LearnContentTest extends TestCase
{
    private const LOCALES = ['en', 'de'];

    private function repo(): LearnRepository
    {
        return app(LearnRepository::class);
    }

    /**
     * @return array<string, string> slug => Pfad
     */
    private function files(string $locale): array
    {
        $files = [];
        foreach (glob($this->repo()->path($locale).'/*.md') as $file) {
            $files[basename($file, '.md')] = $file;
        }

        return $files;
    }

    #[Test]
    public function every_article_exists_in_both_languages(): void
    {
        $en = array_keys($this->files('en'));
        $de = array_keys($this->files('de'));

        $this->assertNotEmpty($en);
        $this->assertSame([], array_values(array_diff($en, $de)), 'Ohne deutsche Fassung');
        $this->assertSame([], array_values(array_diff($de, $en)), 'Ohne englische Fassung');
    }

    #[Test]
    public function frontmatter_is_complete_and_consistent_across_languages(): void
    {
        $slugs = array_keys($this->files('en'));
        $orders = [];

        foreach ($this->files('en') as $slug => $file) {
            $this->assertMatchesRegularExpression('/^[a-z0-9]+(-[a-z0-9]+)*$/', $slug);

            $metas = [];
            foreach (self::LOCALES as $locale) {
                $path = $this->repo()->path($locale, $slug);
                if (! is_file($path)) {
                    continue;
                }

                [$meta] = $this->repo()->parse(file_get_contents($path));
                foreach (LearnRepository::REQUIRED_KEYS as $key) {
                    $this->assertNotEmpty($meta[$key] ?? null, "{$locale}/{$slug}: „{$key}“ fehlt");
                }
                $this->assertNotNull(LearnCategory::tryFrom($meta['category']), "{$locale}/{$slug}: unbekannte Kategorie {$meta['category']}");
                $this->assertContains((int) $meta['level'], [1, 2, 3], "{$locale}/{$slug}: level muss 1–3 sein");
                $this->assertLessThanOrEqual(220, mb_strlen($meta['summary']), "{$locale}/{$slug}: summary zu lang");

                foreach (array_filter(array_map('trim', explode(',', $meta['related'] ?? ''))) as $related) {
                    $this->assertContains($related, $slugs, "{$locale}/{$slug}: Verweis auf unbekanntes Thema „{$related}“");
                    $this->assertNotSame($slug, $related, "{$locale}/{$slug}: verweist auf sich selbst");
                }

                $metas[$locale] = $meta;
            }

            if (isset($metas['en'], $metas['de'])) {
                foreach (['category', 'order', 'level', 'related'] as $key) {
                    $this->assertSame($metas['en'][$key] ?? '', $metas['de'][$key] ?? '', "{$slug}: „{$key}“ unterscheidet sich zwischen EN und DE");
                }
            }

            $orders[$metas['en']['category'].'#'.$metas['en']['order']][] = $slug;
        }

        $clashes = array_filter($orders, fn ($list) => count($list) > 1);
        $this->assertSame([], $clashes, 'Gleiche order innerhalb einer Kategorie');
    }

    #[Test]
    public function articles_follow_the_structure_and_math_conventions(): void
    {
        foreach (self::LOCALES as $locale) {
            $solution = $locale === 'de' ? 'Lösung' : 'Solution';

            foreach ($this->files($locale) as $slug => $file) {
                [, $body] = $this->repo()->parse(file_get_contents($file));
                $where = "{$locale}/{$slug}";

                $this->assertGreaterThanOrEqual(3, preg_match_all('/^## /m', $body), "{$where}: mindestens drei Abschnitte (##)");
                $this->assertMatchesRegularExpression('/^> \*\*/m', $body, "{$where}: Merksatz (> **…**) fehlt");
                $this->assertGreaterThanOrEqual(300, str_word_count(strip_tags(preg_replace('/\$[^$]*\$/', ' ', $body))), "{$where}: zu kurz");

                // Übungen mit aufklappbaren Lösungen
                $open = substr_count($body, '<details>');
                $this->assertGreaterThanOrEqual(3, $open, "{$where}: mindestens drei Übungen mit Lösung");
                $this->assertSame($open, substr_count($body, '</details>'), "{$where}: <details> nicht geschlossen");
                $this->assertSame($open, substr_count($body, "<summary>{$solution}</summary>"), "{$where}: <summary>{$solution}</summary> fehlt");
                $this->assertDoesNotMatchRegularExpression('/<summary>[^\n]*<\/summary>\n(?!\n)/', $body, "{$where}: nach </summary> muss eine Leerzeile folgen");

                // Formeln: nur $…$ / $$…$$, ausgeglichen, KaTeX-kompatibel
                $dollars = preg_match_all('/(?<!\\\\)\$/', $body);
                $this->assertSame(0, $dollars % 2, "{$where}: ungerade Anzahl \$-Zeichen");
                $this->assertDoesNotMatchRegularExpression('/\\\\\(|\\\\\[/', $body, "{$where}: bitte \$…\$ statt \\( oder \\[ verwenden");
                $this->assertDoesNotMatchRegularExpression('/\\\\(begin\{(align|equation)\*?\}|newcommand|def\b)/', $body, "{$where}: nicht unterstützte LaTeX-Umgebung");

                if ($locale === 'de') {
                    // Nur innerhalb von Formeln prüfen (nicht im Text zwischen zwei Formeln)
                    preg_match_all('/\$\$.+?\$\$|(?<![\\\\$])\$[^$\n]+?\$/s', $body, $formulas);
                    $withPoint = array_filter($formulas[0], fn ($f) => preg_match('/\d\.\d/', $f));
                    $this->assertSame([], array_values($withPoint), "{$where}: im Deutschen Dezimalkomma ({,}) statt Punkt in Formeln");
                }
            }
        }
    }

    #[Test]
    public function every_page_renders_in_both_languages(): void
    {
        $this->get('/learn')->assertOk();
        $this->withCookie(config('dailymath.locale_cookie'), 'de')->get('/learn')->assertOk()->assertSee('Mathe lernen');

        foreach (array_keys($this->files('en')) as $slug) {
            foreach (self::LOCALES as $locale) {
                $html = $this->withCookie(config('dailymath.locale_cookie'), $locale)->get("/learn/{$slug}")->assertOk()->getContent();
                $prose = str($html)->after('class="learn-prose')->before('</article>')->toString();

                $this->assertStringNotContainsString('This article is not yet available', $html, "{$locale}/{$slug}");
                $this->assertStringNotContainsString('MATHTOKEN', $prose, "{$locale}/{$slug}: Formel-Platzhalter übrig");
                $this->assertStringNotContainsString('&lt;details', $prose, "{$locale}/{$slug}: <details> wurde maskiert");
                $this->assertDoesNotMatchRegularExpression('/(^|>)\s*#{2,3} /m', $prose, "{$locale}/{$slug}: nicht umgewandelte Überschrift");
                $this->assertSame(substr_count($prose, '<details>'), substr_count($prose, '<summary>'), "{$locale}/{$slug}");
            }
        }

        $this->get('/learn/does-not-exist')->assertNotFound();
    }

    #[Test]
    public function math_survives_markdown_rendering(): void
    {
        [$html] = $this->repo()->render("Text with \$a_1 + a_2\$ and **bold**.\n\n\$\$x_{1,2} = \\frac{-b \\pm \\sqrt{b^2-4ac}}{2a}\$\$");

        $this->assertStringContainsString('$a_1 + a_2$', $html);
        $this->assertStringContainsString('<strong>bold</strong>', $html);
        $this->assertStringContainsString('$$x_{1,2} = \frac{-b \pm \sqrt{b^2-4ac}}{2a}$$', $html);
    }
}
