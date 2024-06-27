<?php

namespace App\Http\Requests\App\CicloAvaliativoIncidencia;

use Illuminate\Foundation\Http\FormRequest;

class IncidenciaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "cargo_uuid" => [
                "required", "exists:cargos,uuid"
            ],
            "equipe_uuid" => [
                "required", "exists:equipes,uuid"
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
