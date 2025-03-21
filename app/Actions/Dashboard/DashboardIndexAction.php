<?php

namespace App\Actions\Dashboard;

use App\Repositories\Cargo\CargoRepositoryInterface;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\Fornecedor\FornecedorRepositoryInterface;
use App\Repositories\Servidor\ServidorRepositoryInterface;
use App\Repositories\Usuario\UsuarioRepositoryInterface;

class DashboardIndexAction
{
    public function __construct(
        protected CargoRepositoryInterface $cargoRepositoryInterface,
        protected ServidorRepositoryInterface $servidorRepositoryInterface,
        protected UsuarioRepositoryInterface $usuarioRepositoryInterface,
        protected FornecedorRepositoryInterface $fornecedorRepositoryInterface,
        protected CicloAvaliativoRepositoryInterface $cicloAvaliativoRepository
    ) { }

    public function exec(): array
    {
        return [
            'quantitativos' => [
                'fornecedores' => $this->fornecedorRepositoryInterface->totalQuantity(),
                'servidores' => $this->servidorRepositoryInterface->totalQuantity(),
                'usuarios' => $this->usuarioRepositoryInterface->totalQuantity(),
                'cargos' => $this->cargoRepositoryInterface->totalQuantity(),
            ],
            'ciclos_avaliativos' => $this->cicloAvaliativoRepository->all(),
        ];
    }
}
