<?php

use App\Enums\StatusCicloEnum;
use App\Enums\StatusPeriodoEnum;
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
        Schema::create('calculo_periodos', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignUuid('ciclos_avaliativos_uuid')->references('uuid')->on('ciclos_avaliativos');
            $table->integer('de');
            $table->integer('ate');
            $table->enum('status_vinculo_ciclo', StatusVinculoCicloEnum::asArray());
            $table->enum('status_ciclo', StatusCicloEnum::asArray());
            $table->enum('status_vinculo_periodo', StatusVinculoPeriodoEnum::asArray());
            $table->enum('status_periodo', StatusPeriodoEnum::asArray());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculo_periodos');
    }
};
