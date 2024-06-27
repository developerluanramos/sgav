<?php

namespace App\Actions\Vinculo;

use App\DTO\Vinculo\VinculoEditDTO;
use App\Models\Vinculo;
use App\Repositories\Vinculo\VinculoRepositoryInterface;

class VinculoEditAction
{
    public function __construct(
        protected VinculoRepositoryInterface $repository
    ) { }

    public function exec(VinculoEditDTO $dto): Vinculo
    {
        return $this->repository->find($dto->uuid);
    }
}
