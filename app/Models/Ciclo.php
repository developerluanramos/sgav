<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    use HasFactory;

    protected $table = "ciclos";

    protected $fillable = [
        "uuid",
        "ciclos_avaliativos_uuid",
        "iniciado_em",
        "finalizado_em"
    ];

    public function periodos()
    {
        return $this->hasMany(Periodo::class, 'ciclos_uuid', 'uuid');
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class, 'ciclos_uuid', 'uuid');
    }

    public function getQuantidadePeriodosAttribute()
    {
        return $this->periodos()->count();
    }

    public function getQuantidadeAvaliacoesAttribute()
    {
        return $this->avaliacoes()->count();
    }
}
