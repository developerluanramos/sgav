<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegraPontuacaoCiclo extends Model
{
    use HasFactory;

    protected $table = 'regra_pontuacao_ciclos';

    protected $fillable = [
        "ciclos_avaliativos_uuid",
        "de",
        "ate",
        "status_vinculo_ciclo",
        "status_ciclo",
        "aplicar_todos"
    ];
}
