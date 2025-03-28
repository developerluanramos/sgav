<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('integracoes', function (Blueprint $table) {
            $table->id();
            $table->enum('objeto', ['Vinculo', 'Ocorrencia']);
            $table->string('url');
            $table->text('descricao')->nullable();
            $table->uuid('uuid')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('integracoes');
    }
};