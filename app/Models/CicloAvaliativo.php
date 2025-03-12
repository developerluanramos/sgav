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

    // protected $appends = [
    //     "quantidade_ciclos",
    //     "quantidade_periodos",
    //     "quantidade_avaliacoes"
    // ];

    public function ciclos()
    {
        return $this->hasMany(Ciclo::class, 'ciclos_avaliativos_uuid', 'uuid');
    }

    public function periodos() 
    {
        return $this->hasMany(Periodo::class, 'ciclos_avaliativos_uuid', 'uuid');
    }

    public function avaliacoes() 
    {
        return $this->hasMany(Avaliacao::class, 'ciclos_avaliativos_uuid', 'uuid');
    }

    public function incidencias()
    {
        return $this->hasMany(CicloAvaliativoIncidencia::class, 'ciclos_avaliativos_uuid', 'uuid');
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

    public function calculosPontuacaoCiclo() 
    {
        return $this->hasMany(CalculoPontuacaoCiclo::class, 'ciclos_avaliativos_uuid', 'uuid');
    }

    public function getQuantidadeCiclosAttribute()
    {
        return $this->ciclos()->count();
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
