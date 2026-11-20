@props(['topic'])

{{-- Line-Icons im Stil der Designvorlage: weiße Linien, orange Akzente --}}
<svg viewBox="0 0 48 48" {{ $attributes->merge(['class' => 'size-12']) }} fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    @switch($topic)
        @case('arithmetic')
            <rect x="12" y="6" width="24" height="36" rx="4" stroke="white" />
            <rect x="17" y="11" width="14" height="7" rx="1.5" stroke="var(--color-accent-500)" />
            <path d="M18 26h2M28 26h2M18 32h2M28 32h2M18 37h2M23 37h7" stroke="white" />
            <path d="M24 25v3M22.5 26.5h3" stroke="var(--color-accent-500)" />
            @break
        @case('fractions')
            <circle cx="24" cy="24" r="15" stroke="white" />
            <path d="M24 9v30M9 24h30" stroke="white" />
            <path d="M24 12a12 12 0 0 1 12 12H24z" stroke="var(--color-accent-500)" />
            @break
        @case('geometry')
            <circle cx="24" cy="24" r="17" stroke="white" />
            <path d="M24 7v34M7 24h34" stroke="white" stroke-dasharray="2 3" />
            <path d="M24 13l11 19H13z" stroke="var(--color-accent-500)" />
            @break
        @case('algebra')
            <path d="M15 10c-4 0-4 3-4 7s-2 6-4 7c2 1 4 3 4 7s0 7 4 7M33 10c4 0 4 3 4 7s2 6 4 7c-2 1-4 3-4 7s0 7-4 7" stroke="white" />
            <path d="M18 18l12 12M30 18L18 30" stroke="var(--color-accent-500)" />
            @break
        @case('analysis')
            <path d="M10 6v32h32" stroke="white" />
            <path d="M6 10l4-4 4 4M38 34l4 4-4 4" stroke="white" />
            <path d="M14 34c6 0 8-20 14-20s8 12 12 12" stroke="var(--color-accent-500)" />
            @break
        @default
            <path d="M8 38h34M10 38V8" stroke="white" />
            <rect x="26" y="26" width="13" height="6" rx="1.5" stroke="white" />
            <rect x="31" y="17" width="8" height="6" rx="1.5" stroke="white" />
            <path d="M14 34c10-2 18-10 22-24M32 10h4v4" stroke="var(--color-accent-500)" />
            <path d="M22 9h-6l4 5-4 5h6" stroke="white" />
    @endswitch
</svg>
