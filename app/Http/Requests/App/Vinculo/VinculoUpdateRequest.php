<?php

namespace App\Http\Requests\App\Vinculo;

use Illuminate\Foundation\Http\FormRequest;

class VinculoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "uuid" => [
                "uuid", "exists:vinculos,uuid"
            ],
            "email" => [
                "required", "min:5", "max:254", "email"
            ],
            "data_admissao" => [
                "required", "date", "notFutureDate"
            ],
            "matricula" => [
                "required", "min:5", "max:50"
            ],
            "cargo_uuid" => [
                "required", "exists:cargos,uuid"
            ],
            "equipe_uuid" => [
                "required", "exists:equipes,uuid"
            ],
            "servidor_uuid" => [
                "required", "exists:servidores,uuid"
            ],
            "departamentos_uuid" => [
                "required", "exists:departamentos,uuid"
            ],
            "setores_uuid" => [
                "required", "exists:setores,uuid"
            ],
            "postos_trabalho_uuid" => [
                "required", "exists:postos_trabalho,uuid"
            ],
        ];
    }
}
