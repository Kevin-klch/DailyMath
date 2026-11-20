<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daily_challenges', function (Blueprint $table) {
            $table->id();
            $table->date('challenge_date');
            $table->unsignedTinyInteger('difficulty'); // App\Enums\Difficulty – je Tag eine Aufgabe pro Niveau
            $table->unsignedInteger('number');         // fortlaufende Tagesnummer (#1, #2 …), gleich für alle Niveaus
            $table->foreignId('question_id')->constrained()->restrictOnDelete();
            $table->timestamps();

            $table->unique(['challenge_date', 'difficulty']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_challenges');
    }
};
