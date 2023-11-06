<?php

namespace App\Actions\Servidor;

use App\DTO\Servidor\ServidorShowDTO;
use App\Models\Servidor;
use App\Repositories\Servidor\ServidorRepositoryInterface;

class ServidorShowAction
{
    public function __construct(
        protected ServidorRepositoryInterface $repository
    ) { }

    public function exec(ServidorShowDTO $dto): Servidor
    {
        return $this->repository->find($dto->uuid);
    }
}
