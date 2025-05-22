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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institution_id')->constrained();
            $table->foreignId('study_field_id')->constrained();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('degree', ['college', 'bachelor', 'master', 'training']);
            $table->enum('study_form', ['full-time', 'part-time', 'distance'])->default('distance');
            $table->integer('duration_months');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
