<?php

namespace App\Http\Requests\App\Servidor;

use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\map;

class ServidorStoreRequest extends FormRequest
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
            "nome" => [
                "required", "min:5", "max:254"
            ],
            "email" => [
                "required", "min:5", "max:254", "email"
            ],
            "data_nascimento" => [
                "required", "date"
            ],
            "data_admissao" => [
                "required", "date"
            ],
            "cargo_uuid" => [
                "required", "exists:cargos,uuid"
            ],
            "equipe_uuid" => [
                "required", "exists:equipes,uuid"
            ],
            "matricula" => [
                "required", "min:5", "max:50"
            ],
        ];
    }
}
