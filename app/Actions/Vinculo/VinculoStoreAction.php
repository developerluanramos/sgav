<?php

namespace App\Actions\Vinculo;

use App\DTO\Avaliador\AvaliadorStoreDTO;
use App\DTO\Vinculo\VinculoStoreDTO;
use App\Models\Vinculo;
use App\Repositories\Avaliador\AvaliadorRepositoryInterface;
use App\Repositories\Vinculo\VinculoRepositoryInterface;

class VinculoStoreAction
{
    public function __construct(
        protected VinculoRepositoryInterface $vinculoRepository,
        protected AvaliadorRepositoryInterface $avaliadorRepository
    ){}

    public function exec(VinculoStoreDTO $dto): Vinculo
    {
        $vinculo = $this->vinculoRepository->new($dto);

        if($dto->avaliador) {
            $this->avaliadorRepository->new(
                AvaliadorStoreDTO::makeFromVinculo($vinculo)
            );
        }
         
        return $vinculo;
    }
}
