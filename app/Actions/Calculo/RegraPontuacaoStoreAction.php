<?php

namespace App\Actions\Calculo;

use App\DTO\RegraPontuacao\RegraPontuacaoStoreDTO;
use App\Repositories\RegraPontuacaoAvaliacao\RegraPontuacaoAvaliacaoRepositoryInterface;
use App\Repositories\RegraPontuacaoCiclo\RegraPontuacaoCicloRepositoryInterface;
use App\Repositories\RegraPontuacaoPeriodo\RegraPontuacaoPeriodoRepositoryInterface;

class RegraPontuacaoStoreAction
{
    public function __construct(
        protected RegraPontuacaoCicloRepositoryInterface $regraPontuacaoCicloRepository,
        protected RegraPontuacaoPeriodoRepositoryInterface $regraPontuacaoPeriodoRepository,
        protected RegraPontuacaoAvaliacaoRepositoryInterface $regraPontuacaoAvaliacaoRepository,
    ) { }

    public function exec(RegraPontuacaoStoreDTO $regraPontuacaoStoreDTO): bool
    {
        $this->regraPontuacaoCicloRepository->new($regraPontuacaoStoreDTO);

        $this->regraPontuacaoPeriodoRepository->new($regraPontuacaoStoreDTO);

        $this->regraPontuacaoAvaliacaoRepository->new($regraPontuacaoStoreDTO);

        return true;
    }
}
