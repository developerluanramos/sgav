<?php

namespace App\Actions\Vinculo;

use App\DTO\Vinculo\VinculoStoreDTO;
use App\Models\Vinculo;
use App\Repositories\Vinculo\VinculoRepositoryInterface;

class VinculoStoreAction
{
    public function __construct(
        protected VinculoRepositoryInterface $repository
    ){}

    public function exec(VinculoStoreDTO $dto): Vinculo
    {
        return $this->repository->new($dto);
    }
}
