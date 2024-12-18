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
        Schema::create('vinculos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('email')->unique();
            $table->date('data_admissao');
            $table->string('matricula')->unique();
            $table->foreignUuid('cargo_uuid')->constrained('cargos', 'uuid');
            $table->foreignUuid('equipe_uuid')->constrained('equipes', 'uuid');
            $table->foreignUuid('servidor_uuid')->constrained('servidores', 'uuid');
            $table->foreignUuid('postos_trabalho_uuid')->constrained('postos_trabalho', 'uuid');
            $table->foreignUuid('setores_uuid')->constrained('setores', 'uuid');
            $table->foreignUuid('departamentos_uuid')->constrained('departamentos', 'uuid');
            $table->boolean('avaliador')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vinculos');
    }
};
