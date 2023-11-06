<?php
namespace App\Actions\Servidor;

use App\DTO\Servidor\ServidorUpdateDTO;
use App\Models\Servidor;
use App\Repositories\Servidor\ServidorRepositoryInterface;

class ServidorUpdateAction
{
    public function __construct(
        protected ServidorRepositoryInterface $repository
    ) { }

    public function exec(ServidorUpdateDTO $dto): Servidor
    {
        return $this->repository->update($dto);
    }
}
