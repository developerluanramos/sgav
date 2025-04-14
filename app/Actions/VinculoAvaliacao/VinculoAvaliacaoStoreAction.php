<?php

namespace App\Actions\VinculoAvaliacao;

use App\Calculos\AvaliacaoCalculo;
use App\Calculos\CicloCalculo;
use App\Calculos\PeriodoCalculo;
use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Models\VinculoAvaliacao;
use App\Repositories\VinculoAvaliacao\VinculoAvaliacaoRepositoryInterface;

class VinculoAvaliacaoStoreAction
{
    public function __construct(
        protected AvaliacaoCalculo $avaliacaoCalculo,
        protected PeriodoCalculo $periodoCalculo,
        protected CicloCalculo $cicloCalculo,
        protected VinculoAvaliacaoRepositoryInterface $vinculoAvaliacaoRepository,
    ) { }

    public function exec(VinculoAvaliacaoStoreDTO $dto): VinculoAvaliacao
    {
        $dto = $this->avaliacaoCalculo->exec($dto);

        $vinculoAvaliacao = $this->vinculoAvaliacaoRepository->new($dto);

        $this->periodoCalculo->exec($dto);

//        $this->cicloCalculo->exec($dto);

        return $vinculoAvaliacao;
    }
}
