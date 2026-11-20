# DailyMath

Jeden Tag eine kleine mathematische Herausforderung – eine Daily-Challenge-Plattform auf Basis von Laravel.

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed      # legt die Tabellen und den Startbestand an Aufgaben an
npm install && npm run build
php artisan serve
```

## Aufgaben planen

Jeder Kalendertag (Wechsel um 00:00 Uhr deutscher Zeit) hat genau eine Aufgabe. Ist für einen Tag nichts geplant,
wird beim ersten Aufruf automatisch eine noch ungenutzte Aufgabe gewählt und festgeschrieben.

```bash
php artisan dailymath:plan --days=14   # nächste 14 Tage im Voraus planen
php artisan schedule:work              # plant täglich automatisch nach (lokal)
```

Neue Aufgaben werden derzeit in `database/seeders/QuestionSeeder.php` gepflegt (idempotent, `php artisan db:seed`).

## Architektur

| Bereich | Ort |
| --- | --- |
| Aufgabenverwaltung & Tageswechsel | `app/Services/DailyChallengeService.php` |
| Spielablauf (Hinweise, Antworten, Aufgeben) | `app/Services/ChallengePlayService.php` |
| Antworttypen & Prüfregeln | `app/Questions/AnswerTypes/`, `app/Enums/AnswerType.php` |
| Mathematische Auswertung (exakte Brüche, sicherer Parser) | `app/Math/` |
| Statistik & Streak | `app/Services/StatisticsService.php` |
| Frontend (Blade, Alpine.js, KaTeX) | `resources/views/challenge/`, `resources/js/` |
| Notizblock (Canvas) | `resources/js/notepad/Notepad.js` |

Ohne Benutzerkonto wird jeder Besucher über eine anonyme ID im Cookie wiedererkannt.

## Tests

```bash
php artisan test
```
