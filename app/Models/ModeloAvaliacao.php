<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloAvaliacao extends Model
{
    use HasFactory;

    protected $table = 'modelos_avaliacao';

    protected $fillable = [
        'uuid',
        'nome',
        'situacao',
        'finalidade',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'situacao' => 'integer',
    ];

    function fatoresAvaliacao() {
        return $this->hasMany(FatorAvaliacao::class, 'modelo_avaliacao_uuid', 'uuid');
    }
}
