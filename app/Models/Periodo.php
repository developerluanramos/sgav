<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $table = "periodos";

    protected $fillable = [
        "uuid",
        "ciclos_avaliativos_uuid",
        "ciclos_uuid",
        "iniciado_em",
        "finalizado_em"
    ];

    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class, 'ciclos_avaliativos_uuid', 'uuid');
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class, 'periodos_uuid', 'uuid');
    }

    public function getQuantidadeAvaliacoesAttribute()
    {
        return $this->avaliacoes()->count();
    }
}
