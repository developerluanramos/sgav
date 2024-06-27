<?php

namespace App\Actions\CicloAvaliativoIncidencia;

use App\Repositories\Cargo\CargoRepositoryInterface;
use App\Repositories\Departamento\DepartamentoRepositoryInterface;
use App\Repositories\Equipe\EquipeRepositoryInterface;
use App\Repositories\PostoTrabalho\PostoTrabalhoRepositoryInterface;
use App\Repositories\Servidor\ServidorRepositoryInterface;
use App\Repositories\Setor\SetorRepositoryInterface;

class IncidenciaCreateAction
{
    public function __construct(
        protected CargoRepositoryInterface $cargoRepository,
        protected EquipeRepositoryInterface $equipeRepository,
        protected DepartamentoRepositoryInterface $departamentoRepository,
        protected SetorRepositoryInterface $setorRepository,
        protected PostoTrabalhoRepositoryInterface $postoTrabalhoRepository,
    ) { }

    public function exec(): array
    {
        $cargos = $this->cargoRepository->Ativos();
        $equipes = $this->equipeRepository->Ativos();

        return [
            "cargos" => $cargos,
            "equipes" => $equipes,
        ];
    }
}
