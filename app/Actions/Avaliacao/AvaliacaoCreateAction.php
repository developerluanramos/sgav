<?php

namespace App\Actions\Avaliacao;

use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\Vinculo\VinculoRepositoryInterface;
use Carbon\Carbon;

class AvaliacaoCreateAction
{
    public function __construct(
        protected CicloAvaliativoRepositoryInterface $cicloAvaliativoRepository,
        protected VinculoRepositoryInterface $vinculoRepository
    ) { }
    
    public function exec(string $cicloAvaliativoUuid, string $vinculoUuid): array
    { 
        $cicloAvaliativo = $this->cicloAvaliativoRepository->show($cicloAvaliativoUuid);
        $vinculo = $this->vinculoRepository->find($vinculoUuid);
        
        // $cicloAtual = $this->cicloAvaliativoRepository->findByDate(Carbon::now()->toDateString());
        // dd($cicloAtual); 
        // dd($cicloAvaliativo->modelos);
        return [
            "cicloAvaliativo" => $cicloAvaliativo,
            "vinculo" => $vinculo
        ];
    }
}


