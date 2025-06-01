<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('instructor_name')->nullable();
            $table->enum('status', ['beschikbaar', 'niet beschikbaar']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
