<?php

namespace App\Actions\ModeloAvaliacao;

use App\Enums\FinalidadeModeloAvaliacaoEnum;

class ModeloAvaliacaoCreateAction
{
    public function __construct(
    ) { }

    public function exec(): array
    {
        return [
            "finalidade" => FinalidadeModeloAvaliacaoEnum::asArray()
        ];
    }
}
