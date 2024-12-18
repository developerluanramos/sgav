<?php

namespace App\Actions\Avaliador;

use App\Repositories\Avaliador\AvaliadorRepositoryInterface;

class AvaliadorCreateAction
{
    public function __construct(
        // protected AvaliadorRepositoryInterface $avaliadorRepository
    ) { }
    
    public function exec(): array
    { 
        // $avaliadores = $this->avaliadorRepository->all();
        
        return [
            // "avaliadores" => $avaliadores,
        ];
    }
}


