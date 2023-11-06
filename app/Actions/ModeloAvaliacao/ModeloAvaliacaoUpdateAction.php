<?php

namespace App\Actions\ModeloAvaliacao;

use App\DTO\ModeloAvaliacao\ModeloAvaliacaoUpdateDTO;
use App\Models\ModeloAvaliacao;
use App\Repositories\ModeloAvaliacao\ModeloAvaliacaoRepositoryInterface;

class ModeloAvaliacaoUpdateAction {

    public function __construct(
        protected ModeloAvaliacaoRepositoryInterface $repository
    )
    { }

    public function exec(ModeloAvaliacaoUpdateDTO $dto): ModeloAvaliacao 
    {
        return $this->repository->update($dto);
    }

}