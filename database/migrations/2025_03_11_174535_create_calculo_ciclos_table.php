<?php

use App\Enums\StatusCicloEnum;
use App\Enums\StatusVinculoCicloEnum;
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
        Schema::create('calculo_pontuacao_ciclos', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignUuid('ciclos_avaliativos_uuid')->references('uuid')->on('ciclos_avaliativos');
            $table->integer('de');
            $table->integer('ate');
            $table->enum('status_vinculo_ciclo', StatusVinculoCicloEnum::asArray());
            $table->enum('status_ciclo', StatusCicloEnum::asArray());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculo_ciclos');
    }
};
