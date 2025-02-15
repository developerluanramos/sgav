<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FatorAvaliacao extends Model
{
    use HasFactory;

    protected $table = "fatores_avaliacaos";

    protected $fillable = [
        'uuid',
        'nome',
        'conceito_avaliacao_uuid',
        'modelo_avaliacao_uuid'
    ];

    function conceito() {
        return $this->belongsTo(ConceitoAvaliacao::class, 'conceito_avaliacao_uuid', 'uuid');
    }

    function modelo() {
        return $this->belongsTo(ModeloAvaliacao::class, 'modelo_avaliacao_uuid', 'uuid');
    }

    function indicadores() {
        return $this->hasMany(IndicadorDesempenho::class, 'fator_avaliacao_uuid', 'uuid');
    }
}
