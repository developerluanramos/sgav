<?php

namespace App\Actions\VinculoAvaliacao;

use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\Vinculo\VinculoRepositoryInterface;
use Carbon\Carbon;

class VinculoAvaliacaoCreateAction
{
    public function __construct(
        protected CicloAvaliativoRepositoryInterface $cicloAvaliativoRepository,
        protected VinculoRepositoryInterface $vinculoRepository
    ) { }
    
    public function exec(string $cicloAvaliativoUuid, string $vinculoUuid): array
    { 
        $cicloAvaliativo = $this->cicloAvaliativoRepository->show($cicloAvaliativoUuid);
        $cicloAvaliativoDetails = $this->cicloAvaliativoRepository->details($cicloAvaliativoUuid);
        $vinculo = $this->vinculoRepository->find($vinculoUuid);

        return [
            "cicloAvaliativo" => $cicloAvaliativo,
            "vinculo" => $vinculo,
            "cicloAvaliativoDetails" => $cicloAvaliativoDetails,
        ];
    }
}


