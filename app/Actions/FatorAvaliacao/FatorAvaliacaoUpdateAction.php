<?php

namespace App\Actions\FatorAvaliacao;

use App\DTO\FatorAvaliacao\FatorAvaliacaoUpdateDTO;
use App\Models\FatorAvaliacao;
use App\Repositories\FatorAvaliacao\FatorAvaliacaoRepositoryInterface;

class FatorAvaliacaoUpdateAction {

    public function __construct(
        protected FatorAvaliacaoRepositoryInterface $fatorAvaliacaoRepository
    )
    { }

    public function exec(FatorAvaliacaoUpdateDTO $dto): array
    {
        $fatorAvaliacao = $this->fatorAvaliacaoRepository->update($dto);

        return [
            "fatorAvaliacao" => $fatorAvaliacao,
        ];
    }
}
