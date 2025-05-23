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
    Schema::table('applications', function (Blueprint $table) {
        $table->foreign('program_id')
              ->references('id')
              ->on('programs')
              ->onDelete('cascade');
    });

    // Добавляем agree_terms, если его нет
    if (!Schema::hasColumn('applications', 'agree_terms')) {
        Schema::table('applications', function (Blueprint $table) {
            $table->boolean('agree_terms')->default(false)->after('status');
        });
    }
}

public function down(): void
{
    Schema::table('applications', function (Blueprint $table) {
        $table->dropForeign(['program_id']);
        $table->dropColumn('agree_terms');
    });
}
};
