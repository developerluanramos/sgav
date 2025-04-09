<?php

namespace App\Repositories\RegraPontuacaoCiclo;

use App\DTO\RegraPontuacao\RegraPontuacaoStoreDTO;
use App\Models\RegraPontuacaoCiclo;
use Illuminate\Database\Eloquent\Collection;

class RegraPontuacaoCicloEloquentRepository implements RegraPontuacaoCicloRepositoryInterface
{
    protected $model;

    public function __construct(RegraPontuacaoCiclo $model)
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
