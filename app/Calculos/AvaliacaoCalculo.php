<?php

namespace App\Calculos;

use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;
use App\Repositories\RegraPontuacaoAvaliacao\RegraPontuacaoAvaliacaoRepositoryInterface;

class AvaliacaoCalculo
{
    protected $totalPontuacao = 0;

    public function __construct(
        protected RegraPontuacaoAvaliacaoRepositoryInterface $regraPontuacaoAvaliacaoRepository,
        protected ConceitoAvaliacaoRepositoryInterface $conceitoAvaliacaoRepository,
    ){}

    public function exec(VinculoAvaliacaoStoreDTO $vinculoAvaliacaoStoreDTO)
    {
        $this->totalPontuacao = $this->conceitoAvaliacaoRepository->totalPontosPorItensUuid(
            array_merge(...array_values($vinculoAvaliacaoStoreDTO->conceitos_uuid))
        );

        $regraPontuacaoAvaliacao = $this->regraPontuacaoAvaliacaoRepository->porCicloAvaliativoETotalPontos(
            $vinculoAvaliacaoStoreDTO->ciclos_avaliativos_uuid, $this->totalPontuacao
        );

        dd($this->totalPontuacao, $regraPontuacaoAvaliacao);

        return $this->totalPontuacao;
    }
}
