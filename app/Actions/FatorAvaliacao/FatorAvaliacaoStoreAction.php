<?php

namespace App\Actions\FatorAvaliacao;

use App\DTO\FatorAvaliacao\FatorAvaliacaoStoreDTO;
use App\Repositories\FatorAvaliacao\FatorAvaliacaoRepositoryInterface;

class FatorAvaliacaoStoreAction
{
    public function __construct(
        protected FatorAvaliacaoRepositoryInterface $fatorAvaliacaoRepository,
    ) { }

    public function exec(FatorAvaliacaoStoreDTO $dto): array
    {
        $fatorAvaliacao = $this->fatorAvaliacaoRepository->new($dto);

        return [
            "fatorAvaliacao" => $fatorAvaliacao,
        ];
    }
}
