<?php

use App\Enums\StatusAvaliacaoEnum;
use App\Enums\StatusCicloEnum;
use App\Enums\StatusPeriodoEnum;
use App\Enums\StatusVinculoAvaliacaoEnum;
use App\Enums\StatusVinculoCicloEnum;
use App\Enums\StatusVinculoPeriodoEnum;
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
        Schema::create('regra_pontuacao_avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignUuid('ciclos_avaliativos_uuid')->references('uuid')->on('ciclos_avaliativos');
            $table->integer('de');
            $table->integer('ate');
            $table->enum('status_vinculo_ciclo', StatusVinculoCicloEnum::asArray());
            $table->enum('status_ciclo', StatusCicloEnum::asArray());
            $table->enum('status_vinculo_periodo', StatusVinculoPeriodoEnum::asArray());
            $table->enum('status_periodo', StatusPeriodoEnum::asArray());
            $table->enum('status_vinculo_avaliacao', StatusVinculoAvaliacaoEnum::asArray());
            $table->enum('status_avaliacao', StatusAvaliacaoEnum::asArray());
            $table->boolean('aplicar_todos')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regra_pontuacao_avaliacoes');
    }
};
