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

];
