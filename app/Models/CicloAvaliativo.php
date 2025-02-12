<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicloAvaliativo extends Model
{
    use HasFactory;

    protected $table = "ciclos_avaliativos";

    protected $fillable = [
        "uuid",
        "descricao",
        "status",
        "iniciado_em",
        "finalizado_em"
    ];

    public function incidencia()
    {
        return $this->hasOne(Incidencia::class, 'ciclos_avaliativos_uuid', 'uuid');
    }

    public function templates()
    {
        return $this->hasMany(Template::class, 'ciclos_avaliativos_uuid', 'uuid');
    }

    public function modelos()
    {
        return $this->belongsToMany(
            ModeloAvaliacao::class,
            'ciclos_avaliativos_modelos', 
            'ciclos_avaliativos_uuid', 
            'modelos_avaliacao_uuid',
            'uuid',
            'uuid'
        );
    }

    public function dependencias()
    {
        return $this->hasMany(Dependencia::class, 'ciclos_avaliativos_uuid', 'uuid');
    }
}
