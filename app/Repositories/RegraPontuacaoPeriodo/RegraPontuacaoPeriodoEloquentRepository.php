<?php

namespace App\Repositories\RegraPontuacaoPeriodo;

use App\DTO\RegraPontuacao\RegraPontuacaoStoreDTO;
use App\Models\RegraPontuacaoPeriodo;
use Illuminate\Database\Eloquent\Collection;

class RegraPontuacaoPeriodoEloquentRepository implements RegraPontuacaoPeriodoRepositoryInterface
{
    protected $model;

    public function __construct(RegraPontuacaoPeriodo $model)
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

    public function new(RegraPontuacaoStoreDTO $calculoStoreDTO): bool
    {
        foreach($calculoStoreDTO->regras_pontuacao_periodo as $regraPontuacaoPeriodo)
        {
            $regraPontuacaoPeriodo['ciclos_avaliativos_uuid'] = $calculoStoreDTO->ciclos_avaliativos_uuid;
            $this->model->create($regraPontuacaoPeriodo);
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
