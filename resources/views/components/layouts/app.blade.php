<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#0d0d12">
        <meta name="description" content="Jeden Tag eine kleine mathematische Herausforderung.">

        <title>{{ $title ?? 'DailyMath – Jeden Tag eine Matheaufgabe' }}</title>

        <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect x='2' y='2' width='28' height='28' rx='8' fill='%230d0d12' stroke='white' stroke-width='2'/%3E%3Cpath d='M8 17l3 0 3 6 5-14h5' fill='none' stroke='%23f7951d' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E">

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-dvh">
        <div class="pointer-events-none fixed inset-0 -z-10 bg-[radial-gradient(ellipse_at_top,rgba(247,149,29,0.07),transparent_55%)]"></div>

        {{ $slot }}
    </body>
</html>
