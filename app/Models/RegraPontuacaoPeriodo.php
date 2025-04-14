<?php

namespace App\Models;

use App\Enums\StatusCicloEnum;
use App\Enums\StatusPeriodoEnum;
use App\Enums\StatusVinculoCicloEnum;
use App\Enums\StatusVinculoPeriodoEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegraPontuacaoPeriodo extends Model
{
    use HasFactory;

    protected $table = 'regra_pontuacao_periodos';

    protected $fillable = [
        'uuid',
        'ciclos_avaliativos_uuid',
        'de',
        'ate',
        'status_vinculo_ciclo',
        'status_ciclo',
        'status_vinculo_periodo',
        'status_periodo',
        'aplicar_todos'
    ];

//    protected $casts = [
//        'status_vinculo_ciclo' => StatusVinculoCicloEnum::class,
//        'status_ciclo' => StatusCicloEnum::class,
//        'status_vinculo_periodo' => StatusVinculoPeriodoEnum::class,
//        'status_periodo' => StatusPeriodoEnum::class,
//        'aplicar_todos' => 'boolean',
//    ];
}
