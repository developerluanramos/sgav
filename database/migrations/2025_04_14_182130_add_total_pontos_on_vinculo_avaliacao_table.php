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
        Schema::table('vinculo_avaliacoes', function (Blueprint $table) {
            $table->float('pontuacao_total')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vinculo_avaliacoes', function (Blueprint $table) {
            $table->dropColumn(columns: 'pontuacao_total');
        });
    }
};
