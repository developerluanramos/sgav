<?php

namespace App\DTO\ConceitoAvaliacao;

use App\DTO\BaseDTO;
use App\Http\Requests\App\ConceitoAvaliacao\ConceitoAvaliacaoUpdateRequest;

class ConceitoAvaliacaoUpdateDTO extends BaseDTO
{
    public function __construct(
        public string $uuid,
        public string $descricao,
        public array $itens_conceitos_avaliacao,
    ){ }

    public static function makeFromRequest(ConceitoAvaliacaoUpdateRequest $request)
    {
        return new self(
            $request->uuid,
            $request->descricao,
            $request->itens_conceitos_avaliacao
        );
    }
}
