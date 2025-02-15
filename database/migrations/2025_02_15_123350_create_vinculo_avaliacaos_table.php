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
        Schema::create('vinculo_avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignUuid('ciclos_avaliativos_uuid')->references('uuid')->on('ciclos_avaliativos');
            $table->foreignUuid('ciclos_uuid')->references('uuid')->on('ciclos');
            $table->foreignUuid('periodos_uuid')->references('uuid')->on('periodos');
            $table->foreignUuid('avaliacoes_uuid')->references('uuid')->on('avaliacoes');
            $table->foreignUuid('vinculos_uuid')->references('uuid')->on('vinculos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vinculo_avaliacoes');
    }
};
