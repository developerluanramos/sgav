<?php

namespace App\Actions\Vinculo;

use App\DTO\Vinculo\VinculoDeleteDTO;
use App\Repositories\Vinculo\VinculoRepositoryInterface;

class VinculoDeleteAction {
    public function __construct(
        protected VinculoRepositoryInterface $repository
    ) {}

    public function exec(VinculoDeleteDTO $dto): void
    {
        $this->repository->delete($dto->uuid);
    }
}
