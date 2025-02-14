<?php

namespace App\Actions\CicloAvaliativoIncidencia;

use App\Repositories\Cargo\CargoRepositoryInterface;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\Departamento\DepartamentoRepositoryInterface;
use App\Repositories\Equipe\EquipeRepositoryInterface;
use App\Repositories\PostoTrabalho\PostoTrabalhoRepositoryInterface;
use App\Repositories\Setor\SetorRepositoryInterface;

class IncidenciaCreateAction
{
    public function __construct(
        protected CargoRepositoryInterface $cargoRepository,
        protected EquipeRepositoryInterface $equipeRepository,
        protected DepartamentoRepositoryInterface $departamentoRepository,
        protected SetorRepositoryInterface $setorRepository,
        protected PostoTrabalhoRepositoryInterface $postoTrabalhoRepository,
        protected CicloAvaliativoRepositoryInterface $cicloAvaliativoRepository
    ) { }

    public function exec(string $cicloAvaliativoUuid): array
    {
        $cargos = $this->cargoRepository->Ativos();
        $equipes = $this->equipeRepository->Ativos();
        $cicloAvaliativo = $this->cicloAvaliativoRepository->show($cicloAvaliativoUuid);
        
        return [
            "cargos" => $cargos,
            "equipes" => $equipes,
            "cicloAvaliativo" => $cicloAvaliativo
        ];
    }
}
