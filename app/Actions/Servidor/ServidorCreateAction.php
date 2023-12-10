<?php

namespace App\Actions\Servidor;

use App\Repositories\Cargo\CargoRepositoryInterface;
use App\Repositories\Equipe\EquipeRepositoryInterface;

class ServidorCreateAction
{
    public function __construct(
        protected CargoRepositoryInterface $cargoRepository,
        protected EquipeRepositoryInterface $equipeRepository
    ) { }

    public function exec(): array
    {
        $cargos = $this->cargoRepository->Ativos();
        $equipes = $this->equipeRepository->Ativos();
        
        return [
            "cargos" => $cargos,
            "equipes" => $equipes
        ];
    }
}


