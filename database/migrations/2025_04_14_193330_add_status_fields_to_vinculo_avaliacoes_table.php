<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vinculo_avaliacoes', function (Blueprint $table) {
            $table->enum('status_vinculo_ciclo', \App\Enums\StatusVinculoCicloEnum::asArray())->nullable();
            $table->enum('status_ciclo', \App\Enums\StatusCicloEnum::asArray())->nullable();
            $table->enum('status_vinculo_periodo', \App\Enums\StatusVinculoPeriodoEnum::asArray())->nullable();
            $table->enum('status_periodo', \App\Enums\StatusPeriodoEnum::asArray())->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vinculo_avaliacoes', function (Blueprint $table) {
            $table->dropColumn([
                'status_vinculo_ciclo',
                'status_ciclo',
                'status_vinculo_periodo',
                'status_periodo',
            ]);
        });
    }
};
