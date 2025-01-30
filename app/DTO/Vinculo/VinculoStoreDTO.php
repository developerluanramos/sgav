<?php

namespace App\DTO\Vinculo;

use App\Http\Requests\App\Vinculo\VinculoStoreRequest;
use Faker\Factory;
use stdClass;

class VinculoStoreDTO extends Factory
{
    public function __construct(
        public string $nome,
        public string $condicao,
        public string $nome_orgao,
        public string $nome_funcao,
        public string $codigo_orgao,
        public string $codigo_funcao,
        public string $data_rescisao,
        public string $nome_local_trabalho,
        public string $codigo_local_trabalho,
        public string $data_admissao,
        public string $email,
        public string $matricula,
        public string|null $avaliador,
    ){}

    public static function makeFromRequest(VinculoStoreRequest $request)
    {
        return new self(
            $request->nome,
            $request->condicao,
            $request->nome_orgao,
            $request->nome_funcao,
            $request->codigo_orgao,
            $request->codigo_funcao,
            $request->data_rescisao,
            $request->nome_local_trabalho,
            $request->codigo_local_trabalho,
            $request->data_admissao,
            $request->email,
            $request->matricula,
            $request->avaliador == "true" ? 1 : 0 
        );
    }

    public static function makeFromImportacao(stdClass $stdClass)
    {
        return [
            "nome" => $stdClass->nome,
            "condicao" => $stdClass->condicao,
            "nome_orgao" => $stdClass->nome_orgao,
            "nome_funcao" => $stdClass->nome_funcao,
            "codigo_orgao" => $stdClass->codigo_orgao,
            "codigo_funcao" => $stdClass->codigo_funcao,
            "data_rescisao" => $stdClass->data_rescisao,
            "nome_local_trabalho" => $stdClass->nome_local_trabalho,
            "codigo_local_trabalho" => $stdClass->codigo_local_trabalho,
            "data_admissao" => $stdClass->data_admissao,
            "email" => 'luan.developer@gmail.com',
            "matricula" => $stdClass->matricula,
            "avaliador" => $stdClass->avaliador ?? 0 
        ];
    }
}
