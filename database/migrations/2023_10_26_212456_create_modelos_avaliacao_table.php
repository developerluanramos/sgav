<?php

use App\Enums\FinalidadeModeloAvaliacaoEnum;
use App\Enums\SituacaoModeloAvaliacaoEnum;
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
        Schema::create('modelos_avaliacao', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nome');
            $table->enum('situacao', SituacaoModeloAvaliacaoEnum::getValues())
                ->default(SituacaoModeloAvaliacaoEnum::ATIVO());
            $table->enum('finalidade', FinalidadeModeloAvaliacaoEnum::getValues())
                ->default(FinalidadeModeloAvaliacaoEnum::EVOLUCAO_FUNCIONAL());;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelos_avaliacao');
    }
};
