<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('challenge_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daily_challenge_id')->constrained()->cascadeOnDelete();
            $table->uuid('visitor_id');                // anonyme Besucher-ID aus dem Cookie
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // für spätere Konten
            $table->string('status');                  // App\Enums\AttemptStatus
            $table->unsignedSmallInteger('attempts')->default(0);
            $table->unsignedTinyInteger('hints_used')->default(0);
            $table->json('answers')->nullable();       // Verlauf der abgegebenen Antworten
            $table->timestamp('started_at');
            $table->timestamp('finished_at')->nullable();
            $table->timestamps();

            $table->unique(['daily_challenge_id', 'visitor_id']);
            $table->index('visitor_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('challenge_attempts');
    }
};
