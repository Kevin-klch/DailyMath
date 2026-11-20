<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#18191b">
        <meta name="description" content="{{ __('A small math challenge every day.') }}">

        <title>{{ $title ?? 'DailyMath – '.__('A math puzzle every day') }}</title>

        <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect x='2' y='2' width='28' height='28' rx='8' fill='%230d0d12' stroke='white' stroke-width='2'/%3E%3Cpath d='M8 17l3 0 3 6 5-14h5' fill='none' stroke='%23f7951d' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E">

        <script type="application/json" id="i18n">@json(\App\Support\JsTranslations::payload())</script>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-dvh">
        {{ $slot }}
    </body>
</html>
