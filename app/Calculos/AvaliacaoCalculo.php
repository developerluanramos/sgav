<?php

namespace App\Calculos;

use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;
use App\Repositories\RegraPontuacaoAvaliacao\RegraPontuacaoAvaliacaoRepositoryInterface;

class AvaliacaoCalculo
{
    public function __construct(
        protected RegraPontuacaoAvaliacaoRepositoryInterface $regraPontuacaoAvaliacaoRepository,
        protected ConceitoAvaliacaoRepositoryInterface $conceitoAvaliacaoRepository,
    ){}

    public function exec(VinculoAvaliacaoStoreDTO $vinculoAvaliacaoStoreDTO) : VinculoAvaliacaoStoreDTO
    {
        $vinculoAvaliacaoStoreDTO->pontuacao_total = $this->conceitoAvaliacaoRepository->totalPontosPorItensUuid(
            array_merge(...array_values($vinculoAvaliacaoStoreDTO->conceitos_uuid))
        );

        $regraPontuacaoAvaliacao = $this->regraPontuacaoAvaliacaoRepository->porCicloAvaliativoETotalPontos(
            $vinculoAvaliacaoStoreDTO->ciclos_avaliativos_uuid, $vinculoAvaliacaoStoreDTO->pontuacao_total
        );

        $vinculoAvaliacaoStoreDTO->status_vinculo_avaliacao = $regraPontuacaoAvaliacao->status_vinculo_avaliacao;
        $vinculoAvaliacaoStoreDTO->status_avaliacao = $regraPontuacaoAvaliacao->status_avaliacao;

        return $vinculoAvaliacaoStoreDTO;
    }
}
