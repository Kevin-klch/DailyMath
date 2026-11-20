<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('id'); // stabiler Schlüssel für den Seeder
            $table->json('translations')->nullable()->after('background'); // {"de": {"title": …, "prompt": …}}
        });

        Schema::table('question_hints', function (Blueprint $table) {
            $table->json('translations')->nullable()->after('content'); // {"de": {"label": …, "content": …}}
        });
    }

    public function down(): void
    {
        Schema::table('question_hints', function (Blueprint $table) {
            $table->dropColumn('translations');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn(['slug', 'translations']);
        });
    }
};
