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
        Schema::table('avaliacoes', function (Blueprint $table) {
            $table->uuid()->unique();
            $table->foreignUuid('ciclos_avaliativos_uuid')->references('uuid')->on('ciclos_avaliativos');
            $table->foreignUuid('ciclos_uuid')->references('uuid')->on('ciclos');
            $table->foreignUuid('periodos_uuid')->references('uuid')->on('periodos');
            $table->datetime('iniciado_em');
            $table->datetime('finalizado_em');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avaliacoes', function (Blueprint $table) {
            $table->dropColumn('uuid');
            $table->dropColumn('ciclos_avaliativos_uuid');
            $table->dropColumn('ciclos_uuid');
            $table->dropColumn('periodos_uuid');
            $table->dropColumn('iniciado_em');
            $table->dropColumn('finalizado_em');
        });
    }
};
