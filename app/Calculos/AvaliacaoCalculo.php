<?php

namespace App\Calculos;

use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;
use App\Repositories\RegraPontuacaoAvaliacao\RegraPontuacaoAvaliacaoRepositoryInterface;
use App\Repositories\VinculoAvaliacao\VinculoAvaliacaoRepositoryInterface;

class AvaliacaoCalculo
{
    public function __construct(
        protected RegraPontuacaoAvaliacaoRepositoryInterface $regraPontuacaoAvaliacaoRepository,
        protected ConceitoAvaliacaoRepositoryInterface $conceitoAvaliacaoRepository,
        protected VinculoAvaliacaoRepositoryInterface $vinculoAvaliacaoRepository
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

        $vinculoAvaliacao = $this->vinculoAvaliacaoRepository->new($vinculoAvaliacaoStoreDTO);
        $vinculoAvaliacaoStoreDTO->uuid = $vinculoAvaliacao->uuid;

        return $vinculoAvaliacaoStoreDTO;
    }
}
