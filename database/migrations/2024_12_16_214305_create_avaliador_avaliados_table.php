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
            $table->string('avaliador_matricula');
            $table->string('avaliado_matricula');
            $table->timestamps();

            $table->primary(['avaliador_matricula', 'avaliado_matricula']);

            $table->foreign('avaliador_matricula')
                ->references('matricula')
                ->on('vinculos')
                ->onDelete('cascade');

            $table->foreign('avaliado_matricula')
                ->references('matricula')
                ->on('vinculos')
                ->onDelete('cascade');
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
