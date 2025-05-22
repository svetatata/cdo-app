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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained();
            $table->string('name'); // Например: "ВМ-211", "ПИ-321"
            $table->date('start_date'); // Дата начала обучения
            $table->date('end_date'); // Дата окончания
            $table->integer('max_students')->nullable(); // Макс. количество студентов
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
