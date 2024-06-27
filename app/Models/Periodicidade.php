<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodicidade extends Model
{
    use HasFactory;

    protected $table = "periodicidades";

    protected $fillable = [
        "uuid",
        "ciclos_avaliativos_uuid",
        "iniciado_em",
        "quantidade_ciclos",
        "quantidade_unidade_ciclos",
        "unidade_ciclos",
        "quantidade_periodos",
        "quantidade_unidade_periodos",
        "unidade_periodos",
        "tolerancia_abertura_ciclo",
        "tolerancia_encerramento_ciclo",
        "tolerancia_abertura_periodo",
        "tolerancia_encerramento_periodo",
    ];
}
