<?php

namespace App\Repositories\VinculoAvaliacao;

use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Models\CicloAvaliativo;
use App\Models\VinculoAvaliacao;

class VinculoAvaliacaoEloquentRepository implements VinculoAvaliacaoRepositoryInterface
{
    public function __construct(
        protected VinculoAvaliacao $model,
        protected CicloAvaliativo $modelCicloAvaliativo
    ){}

    public function detailsByVinculoUuidECiclosAvaliativosUuid(string $cicloAvaliativoUuid, string $vinculoUuid) : array
    {
        $avaliacoesConcluidas = $this->model::query()
            ->with('ciclo_avaliativo')
            ->where('ciclos_avaliativos_uuid', $cicloAvaliativoUuid)
            ->where('vinculos_uuid', $vinculoUuid)->comStatusCalculado()->get();

        return [
            "ciclosConcluidos" => [],
            "avaliacoesConcluidas" => $avaliacoesConcluidas,
            "periodosConcluidos" => [],
            "uuids" => [
                "ciclosConcluidos" => [],
                "avaliacoesConcluidas" => $avaliacoesConcluidas->pluck('avaliacoes_uuid')->toArray(),
                "periodosConcluidos" => [],
            ]
        ];
    }

    public function new(VinculoAvaliacaoStoreDTO $dto) : VinculoAvaliacao
    {
        return $this->model->create((array)$dto);
    }

    public function totalPontosPorPeridoEVinculoUuid(string $periodoUuid, string $vinculosUuid) : float
    {
        return $this->model->where(
            "periodos_uuid", $periodoUuid)->where("vinculos_uuid", $vinculosUuid)
            ->sum('pontuacao_total');
    }

    public function update(VinculoAvaliacaoStoreDTO $dto) : bool
    {
        return $this->model->where("uuid", $dto->uuid)->update($dto::makeToUpdate($dto));
    }
}
