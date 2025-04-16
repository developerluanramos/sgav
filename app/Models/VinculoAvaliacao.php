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
        'pontuacao_total',
        'status_vinculo_avaliacao',
        'status_avaliacao',
        'status_vinculo_ciclo',
        'status_ciclo',
        'status_vinculo_periodo',
        'status_periodo',
    ];

    public function ciclo_avaliativo()
    {
        return $this->belongsTo(CicloAvaliativo::class, "ciclos_avaliativos_uuid", "uuid");
    }

    public function scopeComStatusCalculado($query)
    {
        $avaliacoes = $query->get();
        return self::calcularStatusPeriodoParaCollection($avaliacoes);
    }

    static function calcularStatusPeriodoParaCollection($avaliacoes)
    {
        $avaliacoes->groupBy(['periodos_uuid'])->map(function ($grupo) {
            $pontuacaoTotal = $grupo->sum('pontuacao_total');
            $grupo->each(function ($avaliacao) use ($pontuacaoTotal) {
                $avaliacao->status_periodo = $pontuacaoTotal;
            });
        });
        dd($avaliacoes);
        return $avaliacoes;
    }
}
