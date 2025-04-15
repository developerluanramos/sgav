<?php

namespace App\Calculos;

use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Models\VinculoAvaliacao;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;
use App\Repositories\RegraPontuacaoPeriodo\RegraPontuacaoPeriodoRepositoryInterface;
use App\Repositories\VinculoAvaliacao\VinculoAvaliacaoRepositoryInterface;

class PeriodoCalculo
{
    public function __construct(
        protected ConceitoAvaliacaoRepositoryInterface $conceitoAvaliacaoRepository,
        protected RegraPontuacaoPeriodoRepositoryInterface $regraPontuacaoPeriodoRepository,
        protected VinculoAvaliacaoRepositoryInterface $vinculoAvaliacaoRepository
    ){}

    public function exec(VinculoAvaliacaoStoreDTO $vinculoAvaliacaoStoreDTO) : void
    {
        // -- é a ultima avaliação do periodo? TODO
        if (false === true)
        {
            $totalPontosPeriodo = $this->vinculoAvaliacaoRepository->totalPontosPorPeridoEVinculoUuid(
                $vinculoAvaliacaoStoreDTO->periodos_uuid,
                $vinculoAvaliacaoStoreDTO->vinculos_uuid
            );

            $regraPontuacao = $this->regraPontuacaoPeriodoRepository->porCicloAvaliativoETotalPontos(
                $vinculoAvaliacaoStoreDTO->ciclos_avaliativos_uuid, $totalPontosPeriodo
            );

            $vinculoAvaliacaoStoreDTO->status_vinculo_periodo = $regraPontuacao->status_vinculo_periodo;
            $vinculoAvaliacaoStoreDTO->status_periodo = $regraPontuacao->status_periodo;
        }

        $this->vinculoAvaliacaoRepository->update($vinculoAvaliacaoStoreDTO);
    }
}
