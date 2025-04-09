<?php

namespace App\Models;

use App\Enums\StatusAvaliacaoEnum;
use App\Enums\StatusCicloEnum;
use App\Enums\StatusPeriodoEnum;
use App\Enums\StatusVinculoAvaliacaoEnum;
use App\Enums\StatusVinculoCicloEnum;
use App\Enums\StatusVinculoPeriodoEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegraPontuacaoAvaliacao extends Model
{
    use HasFactory;

    protected $table = 'regra_pontuacao_avaliacoes';

    protected $fillable = [
        'uuid',
        'ciclos_avaliativos_uuid',
        'de',
        'ate',
        'status_vinculo_ciclo',
        'status_ciclo',
        'status_vinculo_periodo',
        'status_periodo',
        'status_vinculo_avaliacao',
        'status_avaliacao',
        'aplicar_todos'
    ];

    protected $casts = [
        'status_vinculo_ciclo' => StatusVinculoCicloEnum::class,
        'status_ciclo' => StatusCicloEnum::class,
        'status_vinculo_periodo' => StatusVinculoPeriodoEnum::class,
        'status_periodo' => StatusPeriodoEnum::class,
        'status_vinculo_avaliacao' => StatusVinculoAvaliacaoEnum::class,
        'status_avaliacao' => StatusAvaliacaoEnum::class,
        'aplicar_todos' => 'boolean',
    ];
}
