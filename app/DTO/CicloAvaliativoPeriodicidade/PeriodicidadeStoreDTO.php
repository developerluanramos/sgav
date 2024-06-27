<?php

namespace App\DTO\CicloAvaliativoPeriodicidade;

use App\Http\Requests\App\CicloAvaliativoPeriodicidade\PeriodicidadeStoreRequest;

class PeriodicidadeStoreDTO {
    public function __construct(
        public string $iniciado_em,
        public int $quantidade_ciclos,
        public int $quantidade_unidade_ciclos,
        public string $unidade_ciclos,
        public int $quantidade_periodos,
        public int $quantidade_unidade_periodos,
        public string $unidade_periodos,
        public int $tolerancia_abertura_ciclo,
        public int $tolerancia_encerramento_ciclo,
        public int $tolerancia_abertura_periodo,
        public int $tolerancia_encerramento_periodo,


    ) {}

    public static function makeFromRequest(PeriodicidadeStoreRequest $request): self
    {
        return new self(
            $request->iniciado_em,
            $request->quantidade_ciclos,
            $request->quantidade_unidade_ciclos,
            $request->unidade_ciclos,
            $request->quantidade_periodos,
            $request->quantidade_unidade_periodos,
            $request->unidade_periodos,
            $request->tolerancia_abertura_ciclo,
            $request->tolerancia_encerramento_ciclo,
            $request->tolerancia_abertura_periodo,
            $request->tolerancia_encerramento_periodo
        );
    }
}
