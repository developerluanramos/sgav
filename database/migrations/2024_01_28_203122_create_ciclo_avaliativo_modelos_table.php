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
        Schema::create('ciclos_avaliativos_modelos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignUuid('ciclos_avaliativos_uuid')->constrained('ciclos_avaliativos', 'uuid');
            $table->foreignUuid('modelos_avaliacao_uuid')->constrained('modelos_avaliacao', 'uuid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciclos_avaliativos_modelos');
    }
};
