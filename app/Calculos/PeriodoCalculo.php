<?php

namespace App\Calculos;

use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
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

    public function exec(VinculoAvaliacaoStoreDTO $vinculoAvaliacaoStoreDTO) : VinculoAvaliacaoStoreDTO
    {
        // -- é a ultima avaliação do periodo? TODO
        if (true === false)
        {
            $totalPontosPeriodo = $this->vinculoAvaliacaoRepository->totalPontosPorPeridoEVinculoUuid(
                $vinculoAvaliacaoStoreDTO->periodos_uuid,
                $vinculoAvaliacaoStoreDTO->vinculos_uuid
            );

            $regraPontuacao = $this->regraPontuacaoPeriodoRepository->porCicloAvaliativoETotalPontos(
                $vinculoAvaliacaoStoreDTO->ciclos_avaliativos_uuid, $totalPontosPeriodo
            );
            dd($regraPontuacao, $totalPontosPeriodo);
            $vinculoAvaliacaoStoreDTO->status_vinculo_periodo = $regraPontuacaoAvaliacao->status_vinculo_avaliacao;
            $vinculoAvaliacaoStoreDTO->status_avaliacao_periodo = $regraPontuacaoAvaliacao->status_avaliacao;
        }

        return $vinculoAvaliacaoStoreDTO;
    }
}
