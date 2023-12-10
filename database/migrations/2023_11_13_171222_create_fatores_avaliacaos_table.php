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
        Schema::create('fatores_avaliacaos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nome');
            $table->foreignUuid('conceito_avaliacao_uuid')->constrained('conceitos_avaliacao', 'uuid');
            $table->foreignUuid('modelo_avaliacao_uuid')->constrained('modelos_avaliacao', 'uuid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fatores_avaliacaos');
    }
};
