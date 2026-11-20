<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('prompt');                    // Aufgabenstellung, LaTeX in $…$ bzw. $$…$$
            $table->string('topic');                   // App\Enums\Topic
            $table->unsignedTinyInteger('difficulty'); // App\Enums\Difficulty
            $table->string('answer_type');             // App\Enums\AnswerType
            $table->json('answer');                    // erwartetes Ergebnis, Struktur je Antworttyp
            $table->json('answer_meta')->nullable();   // z. B. Optionen, Variablen, Eingabehinweis
            $table->text('solution');                  // ausführliche Musterlösung
            $table->text('background')->nullable();    // mathematischer Hintergrund
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
