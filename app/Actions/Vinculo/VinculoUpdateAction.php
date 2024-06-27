<?php
namespace App\Actions\Vinculo;

use App\DTO\Vinculo\VinculoUpdateDTO;
use App\Models\Vinculo;
use App\Repositories\Vinculo\VinculoRepositoryInterface;

class VinculoUpdateAction
{
    public function __construct(
        protected VinculoRepositoryInterface $repository
    ) { }

    public function exec(VinculoUpdateDTO $dto): Vinculo
    {
        return $this->repository->update($dto);
    }
}
