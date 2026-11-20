<?php

return [

    /*
    | Zeitzone, nach der die Daily-Challenge wechselt (00:00 Uhr).
    */
    'timezone' => env('DAILYMATH_TIMEZONE', 'Europe/Berlin'),

    /*
    | Name des Cookies mit der anonymen Besucher-ID.
    */
    'visitor_cookie' => 'dailymath_visitor',

    /*
    | Wie viele Tage `php artisan dailymath:plan` standardmäßig im Voraus plant.
    */
    'plan_days' => 14,

    /*
    | Verfügbare Sprachen (Code => Name in der jeweiligen Sprache). Standard ist app.locale (en).
    */
    'locales' => [
        'en' => 'English',
        'de' => 'Deutsch',
    ],

    /*
    | Name des Cookies mit der gewählten Sprache.
    */
    'locale_cookie' => 'dailymath_locale',

    /*
    | Passwort für die Aufgabenverwaltung unter /admin. Ohne Passwort ist der Bereich abgeschaltet (404).
    */
    'admin_password' => env('DAILYMATH_ADMIN_PASSWORD'),

    /*
    | Übergangsweise Entwicklerwerkzeuge (z. B. der Reset-Button im Header).
    | Standardmäßig nur lokal aktiv – in Produktion nie einschalten.
    */
    'dev_tools' => (bool) env('DAILYMATH_DEV_TOOLS', env('APP_ENV') === 'local'),

];
