<?php

namespace App\Actions\ModeloAvaliacao;

use App\Enums\FinalidadeModeloAvaliacaoEnum;
use App\Models\ModeloAvaliacao;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;
use App\Repositories\ModeloAvaliacao\ModeloAvaliacaoRepositoryInterface;

class ModeloAvaliacaoCreateAction
{
    public function __construct(
        protected ConceitoAvaliacaoRepositoryInterface $conceitoRepository,
        protected ModeloAvaliacaoRepositoryInterface $modeloRepository
    ) { }

    public function exec(): array
    {
        $conceitos = $this->conceitoRepository->all();
        $modelos = $this->modeloRepository->all();

        return [
            "finalidade" => FinalidadeModeloAvaliacaoEnum::asArray(),
            "conceitos" => $conceitos,
            "modelos" => $modelos
        ];
    }
}
