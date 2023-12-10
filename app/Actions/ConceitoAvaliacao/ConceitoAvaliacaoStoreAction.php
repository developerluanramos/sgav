<?php

namespace App\Actions\ConceitoAvaliacao;

use App\DTO\ConceitoAvaliacao\ConceitoAvaliacaoStoreDTO;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;
use App\Repositories\ItemConceitoAvaliacao\ItemConceitoAvaliacaoRepositoryInterface;

class ConceitoAvaliacaoStoreAction
{
    public function __construct(
        protected ConceitoAvaliacaoRepositoryInterface $conceitoAvaliacaoRepository,
        protected ItemConceitoAvaliacaoRepositoryInterface $itemConceitoAvaliacaoRepository
    ) { }

    public function exec(ConceitoAvaliacaoStoreDTO $dto): array
    {
        // Cadastrar Conceito de Avaliação
        $conceitoAvaliacao = $this->conceitoAvaliacaoRepository->new($dto);
        $this->itemConceitoAvaliacaoRepository->new($conceitoAvaliacao->uuid, $dto->itens_conceitos_avaliacao);

        return [
            "conceitoAvaliacao" => $conceitoAvaliacao,
        ];
    }
}
