<?php

namespace App\Repositories\VinculoAvaliacao;

use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Models\VinculoAvaliacao;

class VinculoAvaliacaoEloquentRepository implements VinculoAvaliacaoRepositoryInterface
{
    public function __construct(
        protected VinculoAvaliacao $model
    ){}

    public function detailsByVinculoUuidECiclosAvaliativosUuid(string $cicloAvaliativoUuid, string $vinculoUuid) : array
    {
        $avaliacoesConcluidas = VinculoAvaliacao::query()
            ->where('ciclos_avaliativos_uuid', $cicloAvaliativoUuid)
            ->where('vinculos_uuid', $vinculoUuid)->get();

        $details = [
            "ciclosConcluidos" => [],
            "avaliacoesConcluidas" => $avaliacoesConcluidas,
            "periodosConcluidos" => [],
            "uuids" => [
                "ciclosConcluidos" => [],
                "avaliacoesConcluidas" => $avaliacoesConcluidas->pluck('avaliacoes_uuid')->toArray(),
                "periodosConcluidos" => [],
            ]
        ];

        return $details;
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
}
