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
        'status_vinculo_avaliacao', // este atributo possui a palavra avaliação até que seja discutido com o evandro sobre as regas de calculo, pois ele é pra ser apenas status_vinculo
        'status_avaliacao'
    ];
}
