<?php

use App\Enums\StatusAvaliacaoEnum;
use App\Enums\StatusVinculoAvaliacaoEnum;
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
        Schema::table('vinculo_avaliacoes', function(Blueprint $table) {
            $table->enum('status_vinculo_avaliacao', StatusVinculoAvaliacaoEnum::asArray())->nullable();
            $table->enum('status_avaliacao', StatusAvaliacaoEnum::asArray())->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vinculo_avaliacoes', function(Blueprint $table) {
            $table->dropColumn('status_vinculo_avaliacao');
            $table->dropColumn('status_avaliacao');
        });
    }
};
