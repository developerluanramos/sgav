<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VinculoAvaliacao extends Model
{
    use HasFactory;

    protected $table = "vinculo_avaliacoes";

    protected $fillable = [
        'uuid',
        'ciclos_avaliativos_uuid',
        'ciclos_uuid',
        'periodos_uuid',
        'avaliacoes_uuid',
        'vinculos_uuid',
        'pontuacao_total',
        'status_vinculo_avaliacao',
        'status_avaliacao',
        'status_vinculo_ciclo',
        'status_ciclo',
        'status_vinculo_periodo',
        'status_periodo',
    ];
}
