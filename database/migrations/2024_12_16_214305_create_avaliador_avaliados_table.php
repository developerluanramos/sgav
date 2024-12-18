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
        Schema::create('avaliadores_avaliados', function (Blueprint $table) {
            $table->foreignUuid('avaliador_uuid')->references('uuid')->on( 'avaliadores');
            $table->foreignUuid('avaliado_uuid')->references('uuid')->on( 'vinculos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliadores_avaliados');
    }
};
