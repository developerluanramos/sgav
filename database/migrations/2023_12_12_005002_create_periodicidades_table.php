<?php

use App\Enums\UnidadePeriodicidadeEnum;
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
        Schema::create('periodicidades', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid('ciclos_avaliativos_uuid')->constrained('ciclos_avaliativos', 'uuid');
            $table->date('iniciado_em');
            $table->integer('quantidade_ciclos');
            $table->integer('quantidade_unidade_ciclos');
            $table->enum('unidade_ciclos', UnidadePeriodicidadeEnum::getValues());
            $table->integer('quantidade_periodos');
            $table->integer('quantidade_unidade_periodos');
            $table->enum('unidade_periodos', UnidadePeriodicidadeEnum::getValues());
            $table->integer('tolerancia_abertura_ciclo');
            $table->integer('tolerancia_encerramento_ciclo');
            $table->integer('tolerancia_abertura_periodo');
            $table->integer('tolerancia_encerramento_periodo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodicidades');
    }
};
