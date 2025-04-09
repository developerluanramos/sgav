<?php

namespace App\Actions\Calculo;

use App\DTO\RegraPontuacao\RegraPontuacaoStoreDTO;
use App\Repositories\RegraPontuacaoCiclo\RegraPontuacaoCicloRepositoryInterface;

class RegraPontuacaoStoreAction
{
    public function __construct(
        protected RegraPontuacaoCicloRepositoryInterface $calculoPontuacaoCicloRepository
    ) { }

    public function exec(RegraPontuacaoStoreDTO $calculoStoreDto): bool
    {
        $this->calculoPontuacaoCicloRepository->new($calculoStoreDto);

        return true;
    }
}
