<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemConceitoAvaliacao extends Model
{
    use HasFactory;

    protected $table = 'itens_conceitos_avaliacao';

    protected $fillable = [
        'uuid',
        'nome',
        'pontuacao',
        'conceito_avaliacao_uuid'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

     public function conceitosAvaliacao()
     {
         return $this->belongsTo(ConceitoAvaliacao::class, 'uuid', 'conceito_avaliacao_uuid');
     }
}
