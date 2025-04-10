<?php

namespace App\Repositories\RegraPontuacaoAvaliacao;

use App\DTO\RegraPontuacao\RegraPontuacaoStoreDTO;
use App\Models\RegraPontuacaoAvaliacao;
use Illuminate\Database\Eloquent\Collection;

class RegraPontuacaoAvaliacaoEloquentRepository implements RegraPontuacaoAvaliacaoRepositoryInterface
{
    protected $model;

    public function __construct(RegraPontuacaoAvaliacao $model)
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
        foreach($calculoStoreDTO->regras_pontuacao_avaliacao as $regraPontuacaoAvaliacao)
        {
            $regraPontuacaoAvaliacao['ciclos_avaliativos_uuid'] = $calculoStoreDTO->ciclos_avaliativos_uuid;
            $this->model->create($regraPontuacaoAvaliacao);
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
