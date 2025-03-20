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
        Schema::table('calculo_pontuacao_ciclos', function (Blueprint $table) {
            $table->boolean('aplicar_todos')->default(false)->after('status_ciclo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calculo_pontuacao_ciclos', function (Blueprint $table) {
            $table->dropColumn(columns: 'aplicar_todos');
        });
    }
};
