<?php

namespace App\Actions\CicloAvaliativoModeloAvaliacao;

use App\Repositories\Cargo\CargoRepositoryInterface;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\Departamento\DepartamentoRepositoryInterface;
use App\Repositories\Equipe\EquipeRepositoryInterface;
use App\Repositories\ModeloAvaliacao\ModeloAvaliacaoRepositoryInterface;
use App\Repositories\PostoTrabalho\PostoTrabalhoRepositoryInterface;
use App\Repositories\Setor\SetorRepositoryInterface;

class ModeloAvaliacaoCreateAction
{
    public function __construct(
        protected CargoRepositoryInterface $cargoRepository,
        protected EquipeRepositoryInterface $equipeRepository,
        protected DepartamentoRepositoryInterface $departamentoRepository,
        protected SetorRepositoryInterface $setorRepository,
        protected PostoTrabalhoRepositoryInterface $postoTrabalhoRepository,
        protected ModeloAvaliacaoRepositoryInterface $modeloAvaliacaoRepository,
        protected CicloAvaliativoRepositoryInterface $cicloAvaliativoRepository
    ) { }

    public function exec(string $cicloAvaliativoUuid): array
    {
        $modelos = $this->modeloAvaliacaoRepository->ativos();
        $cicloAvaliativo = $this->cicloAvaliativoRepository->show($cicloAvaliativoUuid);
        return [
            "modelos" => $modelos,
            "cicloAvaliativo" => $cicloAvaliativo
        ];
    }
}
