<?php

namespace App\Repositories\CalculoPontuacaoCiclo;

use App\DTO\Calculo\CalculoStoreDTO;
use App\Models\CalculoPontuacaoCiclo;
use Illuminate\Database\Eloquent\Collection;

class CalculoPontuacaoCicloEloquentRepository implements CalculoPontuacaoCicloRepositoryInterface
{
    protected $model;

    public function __construct(CalculoPontuacaoCiclo $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function byCicloAvaliativoUuid(string $cicloAvaliativoUuid): Collection 
    {
        return new Collection;
    }

    public function new(CalculoStoreDTO $calculoStoreDTO): bool
    {
        foreach($calculoStoreDTO->regras_pontuacao_ciclo as $regraPontuacaoCiclo)
        {
            $regraPontuacaoCiclo['ciclos_avaliativos_uuid'] = $calculoStoreDTO->ciclos_avaliativos_uuid;
            $this->model->create($regraPontuacaoCiclo);
        }
        
        return true;
    }

    public function porCicloAvaliativoETotalPontos(string $cicloAvaliativoUuid, float $totalPontos)
    {
        return $this->model->where('ciclos_avaliativos_uuid', $cicloAvaliativoUuid)
            ->where('de', '<=', $totalPontos)
            ->where('ate', '>=', $totalPontos)->first();
    }
}
