<?php

namespace App\Enums;

enum Difficulty: int
{
    case Easy = 1;
    case Medium = 2;
    case Hard = 3;

    public function label(): string
    {
        return match ($this) {
            self::Easy => __('Easy'),
            self::Medium => __('Medium'),
            self::Hard => __('Hard'),
        };
    }

    /**
     * URL-Segment des Niveaus, z. B. /mittel.
     */
    public function slug(): string
    {
        return match ($this) {
            self::Easy => 'leicht',
            self::Medium => 'mittel',
            self::Hard => 'schwer',
        };
    }

    public function shareIcon(): string
    {
        return match ($this) {
            self::Easy => '🟢',
            self::Medium => '🟡',
            self::Hard => '🔴',
        };
    }

    public static function fromSlug(string $slug): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->slug() === $slug) {
                return $case;
            }
        }

        return null;
    }

    /**
     * @return list<string>
     */
    public static function slugs(): array
    {
        return array_map(fn (self $d) => $d->slug(), self::cases());
    }
}
