<?php

namespace App\Actions\Servidor;

use App\DTO\Servidor\ServidorStoreDTO;
use App\Models\Servidor;
use App\Repositories\Servidor\ServidorRepositoryInterface;

class ServidorStoreAction
{
    public function __construct(
        protected ServidorRepositoryInterface $repository
    ) { }

    public function exec(ServidorStoreDTO $dto): Servidor
    {
        return $this->repository->new($dto);
    }
}
