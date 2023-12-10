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
        Schema::create('itens_conceitos_avaliacao', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('nome');
            $table->integer('pontuacao');
            $table->foreignUuid('conceito_avaliacao_uuid')->constrained('conceitos_avaliacao', 'uuid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_conceitos_avaliacao');
    }
};
