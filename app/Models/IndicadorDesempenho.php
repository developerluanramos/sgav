<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicadorDesempenho extends Model
{
    use HasFactory;

    protected $table = "indicadores_desempenho";

    protected $fillable = [
        'uuid',
        'descricao',
        'conceito_avaliacao_uuid',
        'modelo_avaliacao_uuid',
        'fator_avaliacao_uuid'
    ];

    function conceitoAvaliacao()
    {
        return $this->belongsTo(ConceitoAvaliacao::class, 'conceito_avaliacao_uuid', 'uuid');
    }

    function modeloAvaliacao()
    {
        return $this->belongsTo(ModeloAvaliacao::class, 'modelo_avaliacao_uuid', 'uuid');
    }

    function fatorAvaliacao()
    {
        return $this->belongsTo(FatorAvaliacao::class, 'fator_avaliacao_uuid', 'uuid');
    }
}
