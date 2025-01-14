<?php

namespace App\Actions\Avaliacao;

use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\Vinculo\VinculoRepositoryInterface;

class AvaliacaoCreateAction
{
    public function __construct(
        protected CicloAvaliativoRepositoryInterface $cicloAvaliativoRepository,
        protected VinculoRepositoryInterface $vinculoRepository
    ) { }
    
    public function exec(string $cicloAvaliativoUuid, string $vinculoUuid): array
    { 
        $cicloAvaliativo = $this->cicloAvaliativoRepository->find($cicloAvaliativoUuid);
        $vinculo = $this->vinculoRepository->find($vinculoUuid);
        
        return [
            "cicloAvaliativo" => $cicloAvaliativo,
            "vinculo" => $vinculo
        ];
    }
}


