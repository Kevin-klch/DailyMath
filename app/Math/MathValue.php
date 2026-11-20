<?php

namespace App\Math;

use InvalidArgumentException;

/**
 * Ein Zahlenwert, der – solange möglich – exakt als Bruch geführt wird
 * und erst bei irrationalen Operationen (√2, π …) auf float zurückfällt.
 */
final readonly class MathValue
{
    private function __construct(
        public ?Rational $exact,
        public float $approx,
    ) {}

    public static function exact(Rational $value): self
    {
        return new self($value, $value->toFloat());
    }

    public static function approx(float $value): self
    {
        if (is_nan($value) || is_infinite($value)) {
            throw new InvalidArgumentException('Ungültiger Zahlenwert.');
        }

        return new self(null, $value);
    }

    public function isExact(): bool
    {
        return $this->exact !== null;
    }

    public function add(self $o): self
    {
        return $this->combine($o, fn (Rational $a, Rational $b) => $a->add($b), fn ($a, $b) => $a + $b);
    }

    public function sub(self $o): self
    {
        return $this->combine($o, fn (Rational $a, Rational $b) => $a->sub($b), fn ($a, $b) => $a - $b);
    }

    public function mul(self $o): self
    {
        return $this->combine($o, fn (Rational $a, Rational $b) => $a->mul($b), fn ($a, $b) => $a * $b);
    }

    public function div(self $o): self
    {
        if ($o->approx == 0.0) {
            throw new InvalidArgumentException('Division durch null.');
        }

        return $this->combine($o, fn (Rational $a, Rational $b) => $a->div($b), fn ($a, $b) => $a / $b);
    }

    public function pow(self $o): self
    {
        if ($this->exact && $o->exact?->isInteger() && abs($o->exact->numerator) <= 64) {
            if ($this->exact->numerator === 0 && $o->exact->numerator < 0) {
                throw new InvalidArgumentException('Division durch null.');
            }

            $result = $this->exact->pow($o->exact->numerator);
            if ($result !== null) {
                return self::exact($result);
            }
        }

        if ($this->approx < 0 && ! ($o->exact?->isInteger())) {
            throw new InvalidArgumentException('Gebrochene Potenz einer negativen Zahl.');
        }

        return self::approx($this->approx ** $o->approx);
    }

    public function sqrt(): self
    {
        if ($this->approx < 0) {
            throw new InvalidArgumentException('Wurzel aus negativer Zahl.');
        }

        if ($this->exact) {
            $n = self::perfectSquareRoot($this->exact->numerator);
            $d = self::perfectSquareRoot($this->exact->denominator);

            if ($n !== null && $d !== null) {
                return self::exact(new Rational($n, $d));
            }
        }

        return self::approx(sqrt($this->approx));
    }

    public function negate(): self
    {
        return $this->exact ? self::exact($this->exact->negate()) : self::approx(-$this->approx);
    }

    /**
     * Mathematische Gleichheit: exakt bei Brüchen, sonst mit Toleranz.
     */
    public function equals(self $other, float $tolerance = 0.0): bool
    {
        if ($this->exact && $other->exact && $tolerance === 0.0) {
            return $this->exact->equals($other->exact);
        }

        $epsilon = max($tolerance, 1e-9 * max(1.0, abs($other->approx)));

        return abs($this->approx - $other->approx) <= $epsilon;
    }

    public function __toString(): string
    {
        return $this->exact ? (string) $this->exact : rtrim(rtrim(number_format($this->approx, 6, '.', ''), '0'), '.');
    }

    private function combine(self $o, callable $exactOp, callable $floatOp): self
    {
        if ($this->exact && $o->exact) {
            $result = $exactOp($this->exact, $o->exact);
            if ($result !== null) {
                return self::exact($result);
            }
        }

        return self::approx($floatOp($this->approx, $o->approx));
    }

    private static function perfectSquareRoot(int $n): ?int
    {
        if ($n < 0) {
            return null;
        }

        $root = (int) round(sqrt($n));

        return $root * $root === $n ? $root : null;
    }
}
