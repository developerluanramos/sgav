<?php

namespace App\Actions\Servidor;

use App\DTO\Servidor\ServidorEditDTO;
use App\Models\Servidor;
use App\Repositories\Servidor\ServidorRepositoryInterface;

class ServidorEditAction
{
    public function __construct(
        protected ServidorRepositoryInterface $repository
    ) { }

    public function exec(ServidorEditDTO $dto): Servidor
    {
        return $this->repository->find($dto->uuid);
    }
}
