<?php

use App\Enums\CicloAvaliativoStatusEnum;
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
        Schema::create('ciclos_avaliativos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->datetime('iniciado_em');
            $table->datetime('finalizado_em');
            $table->enum('step', \App\Enums\CicloAvaliativoStepsEnum::getValues())
                ->default(\App\Enums\CicloAvaliativoStepsEnum::PERIODICIDADE);
            $table->enum('status', CicloAvaliativoStatusEnum::getValues())
                ->default(CicloAvaliativoStatusEnum::RASCUNHO);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciclos_avaliativos');
    }
};
