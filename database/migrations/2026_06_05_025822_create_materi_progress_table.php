<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materi_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('materi_key');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
            $table->unique(['user_id', 'materi_key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materi_progress');
    }
};