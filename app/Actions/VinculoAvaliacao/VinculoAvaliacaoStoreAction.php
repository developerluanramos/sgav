<?php

namespace App\Actions\VinculoAvaliacao;

use App\Calculos\AvaliacaoCalculo;
use App\Calculos\CicloCalculo;
use App\Calculos\PeriodoCalculo;
use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Repositories\VinculoAvaliacao\VinculoAvaliacaoRepositoryInterface;

class VinculoAvaliacaoStoreAction
{
    public function __construct(
        protected AvaliacaoCalculo $avaliacaoCalculo,
        protected PeriodoCalculo $periodoCalculo,
        protected CicloCalculo $cicloCalculo,
        protected VinculoAvaliacaoRepositoryInterface $vinculoAvaliacaoRepository,
    ) { }

    public function exec(VinculoAvaliacaoStoreDTO $vinculoAvaliacaoStoreDTO): void
    {
        $vinculoAvaliacaoStoreDTO = $this->avaliacaoCalculo->exec($vinculoAvaliacaoStoreDTO);

        $this->periodoCalculo->exec($vinculoAvaliacaoStoreDTO);

        $this->cicloCalculo->exec($vinculoAvaliacaoStoreDTO);
    }
}
