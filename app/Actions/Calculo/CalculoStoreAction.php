<?php

namespace App\Actions\Calculo;

use App\DTO\Calculo\CalculoStoreDTO;
use App\Models\Calculo;
use App\Repositories\CalculoPontuacaoCiclo\CalculoPontuacaoCicloRepositoryInterface;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;

class CalculoStoreAction
{
    public function __construct(
        protected CalculoPontuacaoCicloRepositoryInterface $calculoPontuacaoCicloRepository
    ) { }

    public function exec(CalculoStoreDTO $calculoStoreDto): bool
    {
        $this->calculoPontuacaoCicloRepository->new($calculoStoreDto);
        
        return true;
    }
}
