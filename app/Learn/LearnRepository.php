<?php

namespace App\Learn;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use RuntimeException;

/**
 * Liest die Lernartikel aus resources/learn/{locale}/*.md.
 *
 * Aufbau einer Datei:
 *
 *     ---
 *     title: Order of Operations
 *     category: arithmetic
 *     order: 20
 *     level: 1
 *     summary: Ein Satz, worum es geht.
 *     related: negative-numbers, powers-and-roots
 *     ---
 *     Markdown mit LaTeX in $…$ bzw. $$…$$
 *
 * Fehlt ein Artikel in der gewünschten Sprache, wird die englische Fassung verwendet.
 */
class LearnRepository
{
    public const FALLBACK_LOCALE = 'en';

    public const REQUIRED_KEYS = ['title', 'category', 'order', 'level', 'summary'];

    public function path(?string $locale = null, ?string $slug = null): string
    {
        $path = resource_path('learn'.($locale ? '/'.$locale : ''));

        return $slug ? "{$path}/{$slug}.md" : $path;
    }

    /**
     * Alle Artikel (nur Metadaten) in der gewünschten Sprache, sortiert nach Kategorie und Reihenfolge.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function all(?string $locale = null): Collection
    {
        $locale ??= app()->getLocale();

        return collect(Cache::remember('learn:index:'.$locale.':'.$this->version(), now()->addDay(), function () use ($locale) {
            return collect(glob($this->path(self::FALLBACK_LOCALE).'/*.md'))
                ->map(fn (string $file) => basename($file, '.md'))
                ->map(fn (string $slug) => $this->meta($slug, $locale))
                ->filter()
                ->sortBy([
                    fn ($a, $b) => $this->categoryIndex($a['category']) <=> $this->categoryIndex($b['category']),
                    fn ($a, $b) => $a['order'] <=> $b['order'],
                ])
                ->values()
                ->all();
        }));
    }

    /**
     * Artikel nach Kategorie gruppiert (Reihenfolge der Kategorien wie im Enum).
     *
     * @return Collection<string, Collection<int, array<string, mixed>>>
     */
    public function byCategory(?string $locale = null): Collection
    {
        $articles = $this->all($locale);

        return collect(LearnCategory::cases())
            ->mapWithKeys(fn (LearnCategory $c) => [$c->value => $articles->where('category', $c->value)->values()])
            ->filter(fn (Collection $items) => $items->isNotEmpty());
    }

    /**
     * Ein vollständiger Artikel inkl. gerendertem HTML und Inhaltsverzeichnis.
     *
     * @return array<string, mixed>|null
     */
    public function find(string $slug, ?string $locale = null): ?array
    {
        if (! preg_match('/^[a-z0-9-]+$/', $slug)) {
            return null;
        }

        $locale ??= app()->getLocale();
        $file = $this->fileFor($slug, $locale);

        if (! $file) {
            return null;
        }

        return Cache::remember("learn:article:{$locale}:{$slug}:".filemtime($file), now()->addDay(), function () use ($file, $slug, $locale) {
            [$meta, $body] = $this->parse((string) file_get_contents($file));
            [$html, $headings] = $this->render($body);

            return [
                ...$this->normalizeMeta($meta, $slug),
                'locale' => str_contains($file, '/'.$locale.'/') ? $locale : self::FALLBACK_LOCALE,
                'html' => $html,
                'headings' => $headings,
            ];
        });
    }

    /**
     * @return array<string, mixed>|null
     */
    public function meta(string $slug, ?string $locale = null): ?array
    {
        $file = $this->fileFor($slug, $locale ?? app()->getLocale());

        if (! $file) {
            return null;
        }

        [$meta] = $this->parse((string) file_get_contents($file));

        return $this->normalizeMeta($meta, $slug);
    }

    /**
     * Zerlegt eine Datei in Frontmatter (einfache „Schlüssel: Wert“-Zeilen) und Markdown.
     *
     * @return array{0: array<string, string>, 1: string}
     */
    public function parse(string $contents): array
    {
        $contents = str_replace("\r\n", "\n", $contents);

        if (! preg_match('/^---\n(.*?)\n---\n(.*)$/s', $contents, $m)) {
            throw new RuntimeException('Lernartikel ohne Frontmatter.');
        }

        $meta = [];
        foreach (explode("\n", $m[1]) as $line) {
            if (preg_match('/^([a-z_]+):\s*(.*)$/', trim($line), $kv)) {
                $meta[$kv[1]] = trim($kv[2], " \t\"'");
            }
        }

        return [$meta, $m[2]];
    }

    /**
     * Markdown → HTML. Formeln werden vorher herausgelöst, damit Markdown sie nicht verändert
     * (z. B. Unterstriche als Kursivschrift); KaTeX rendert sie anschließend im Browser.
     *
     * @return array{0: string, 1: list<array{id: string, title: string}>}
     */
    public function render(string $markdown): array
    {
        $math = [];
        $protect = function (array $m) use (&$math) {
            $math[] = $m[0];

            return 'MATHTOKEN'.(count($math) - 1).'X';
        };

        $markdown = preg_replace_callback('/\$\$.+?\$\$/s', $protect, $markdown);
        $markdown = preg_replace_callback('/(?<![\\\\$])\$(?!\s)[^$\n]+?(?<!\s)\$/', $protect, $markdown);

        $html = (string) (new GithubFlavoredMarkdownConverter([
            'html_input' => 'allow', // Inhalte stammen aus dem Repository (z. B. <details> für Lösungen)
            'allow_unsafe_links' => false,
        ]))->convert($markdown);

        $html = preg_replace_callback('/MATHTOKEN(\d+)X/', fn ($m) => e($math[(int) $m[1]]), $html);

        // Zwischenüberschriften verlinkbar machen und für das Inhaltsverzeichnis sammeln
        $headings = [];
        $html = preg_replace_callback('/<h2>(.*?)<\/h2>/s', function ($m) use (&$headings) {
            $title = trim(strip_tags(html_entity_decode($m[1])));
            $id = Str::slug($title) ?: 'section-'.(count($headings) + 1);
            $headings[] = ['id' => $id, 'title' => $title];

            return '<h2 id="'.$id.'">'.$m[1].'</h2>';
        }, $html);

        // Tabellen horizontal scrollbar machen (schmale Bildschirme)
        $html = str_replace(['<table>', '</table>'], ['<div class="table-scroll"><table>', '</table></div>'], $html);

        return [$html, $headings];
    }

    private function fileFor(string $slug, string $locale): ?string
    {
        foreach (array_unique([$locale, self::FALLBACK_LOCALE]) as $candidate) {
            $file = $this->path($candidate, $slug);
            if (is_file($file)) {
                return $file;
            }
        }

        return null;
    }

    /**
     * @param  array<string, string>  $meta
     * @return array<string, mixed>
     */
    private function normalizeMeta(array $meta, string $slug): array
    {
        return [
            'slug' => $slug,
            'title' => $meta['title'] ?? Str::headline($slug),
            'category' => $meta['category'] ?? LearnCategory::Advanced->value,
            'order' => (int) ($meta['order'] ?? 999),
            'level' => max(1, min(3, (int) ($meta['level'] ?? 1))),
            'summary' => $meta['summary'] ?? '',
            'related' => array_values(array_filter(array_map('trim', explode(',', $meta['related'] ?? '')))),
        ];
    }

    private function categoryIndex(string $category): int
    {
        $index = array_search(LearnCategory::tryFrom($category), LearnCategory::cases(), true);

        return $index === false ? 99 : $index;
    }

    /**
     * Ändert sich, sobald irgendein Artikel geändert wird – dann wird der Cache neu aufgebaut.
     */
    private function version(): string
    {
        $files = glob($this->path().'/*/*.md') ?: [];

        return md5(count($files).':'.max(array_map('filemtime', $files) ?: [0]));
    }
}
