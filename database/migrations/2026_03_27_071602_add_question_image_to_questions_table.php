<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('questions', function (Blueprint $table) {
        $table->string('question_image')->nullable()->after('question_text');
        // nullable() → opsional, tidak wajib diisi
        // after('question_text') → posisi kolom setelah kolom question_text
    });
}

public function down(): void
{
    Schema::table('questions', function (Blueprint $table) {
        $table->dropColumn('question_image');
    });
}
};
