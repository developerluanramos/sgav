<?php

namespace App\DTO\VinculoAvaliacao;

use App\Http\Requests\App\VinculoAvaliacao\VinculoAvaliacaoStoreRequest;

class VinculoAvaliacaoStoreDTO {
    public function __construct(
        public string|null $uuid,
        public string $ciclos_avaliativos_uuid,
        public string $ciclos_uuid,
        public string $periodos_uuid,
        public string $avaliacoes_uuid,
        public string $vinculos_uuid,
        public array $conceitos_uuid, // respostas avaliação
        public float|null $pontuacao_total,
        public string|null $status_vinculo_avaliacao,
        public string|null $status_avaliacao,
        public string|null $status_vinculo_ciclo,
        public string|null $status_ciclo,
        public string|null $status_vinculo_periodo,
        public string|null $status_periodo
    ) {}

    public static function makeFromRequest(VinculoAvaliacaoStoreRequest $request): self
    {
        return new self(
            $request->uuid,
            $request->ciclos_avaliativos_uuid,
            $request->ciclos_uuid,
            $request->periodos_uuid,
            $request->avaliacoes_uuid,
            $request->vinculos_uuid,
            $request->conceitos_uuid,
            $request->pontuacao_total,
            $request->status_vinculo_avaliacao,
            $request->status_avaliacao,
            $request->status_vinculo_ciclo,
            $request->status_ciclo,
            $request->status_vinculo_periodo,
            $request->status_periodo
        );
    }

    public static function makeToUpdate(VinculoAvaliacaoStoreDTO $request): array
    {
        return [
            "uuid" => $request->uuid,
            "ciclos_avaliativos_uuid" => $request->ciclos_avaliativos_uuid,
            "ciclos_uuid" => $request->ciclos_uuid,
            "periodos_uuid" => $request->periodos_uuid,
            "avaliacoes_uuid" => $request->avaliacoes_uuid,
            "vinculos_uuid" => $request->vinculos_uuid,
            "pontuacao_total" => $request->pontuacao_total,
            "status_vinculo_avaliacao" => $request->status_vinculo_avaliacao,
            "status_avaliacao" => $request->status_avaliacao,
            "status_vinculo_ciclo" => $request->status_vinculo_ciclo,
            "status_ciclo" => $request->status_ciclo,
            "status_vinculo_periodo" => $request->status_vinculo_periodo,
            "status_periodo" => $request->status_periodo
        ];
    }
}
