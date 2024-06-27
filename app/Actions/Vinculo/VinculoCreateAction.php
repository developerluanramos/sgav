<?php

namespace App\Actions\Vinculo;

use App\Repositories\Cargo\CargoRepositoryInterface;
use App\Repositories\Departamento\DepartamentoRepositoryInterface;
use App\Repositories\Equipe\EquipeRepositoryInterface;
use App\Repositories\PostoTrabalho\PostoTrabalhoRepositoryInterface;
use App\Repositories\Servidor\ServidorRepositoryInterface;
use App\Repositories\Setor\SetorRepositoryInterface;

class VinculoCreateAction
{
    public function __construct(
        protected CargoRepositoryInterface $cargoRepository,
        protected EquipeRepositoryInterface $equipeRepository,
        protected DepartamentoRepositoryInterface $departamentoRepository,
        protected SetorRepositoryInterface $setorRepository,
        protected PostoTrabalhoRepositoryInterface $postoTrabalhoRepository,
        protected ServidorRepositoryInterface $servidorRepository
    ) { }

    public function exec(): array
    {
        $cargos = $this->cargoRepository->Ativos();
        $equipes = $this->equipeRepository->Ativos();
        $servidores = $this->servidorRepository->all();

        return [
            "cargos" => $cargos,
            "equipes" => $equipes,
            "servidores" => $servidores
        ];
    }
}


