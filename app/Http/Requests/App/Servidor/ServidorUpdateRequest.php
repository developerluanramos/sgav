<?php

namespace App\Http\Requests\App\Servidor;

use Illuminate\Foundation\Http\FormRequest;

class ServidorUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "uuid" => [
                "uuid", "exists:servidores,uuid"
            ],
            "nome" => [
                "required", "min:5", "max:254",
            ],
            "email" => [
                "required", "email", "min:5", "max:254",
            ],
            "data_nascimento" => [
                "required", "date", "before_or_equal:today -16 years",
            ],
            "data_admissao" => [
                "required", "date", "validarIdadeAdmissao", "notFutureDate"
            ],
            "cargo_uuid" => [
                "required", "exists:cargos", "uuid",
            ],
            "equipe_uuid" => [
                "required", "exists:equipes,uuid",
            ],
            "matricula" => [
                "required", "min:5", "max:50",
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            "data_nascimento.before_or_equal" => "A idade mínima permitida é de 16 anos.",
            "data_admissao.validar_idade_admissao" => "A diferença entre data de nascimento e admissão deve ser de pelo menos 16 anos.",
            "data_admissao.not_future_date" => "A data de admissão não pode ser uma data futura.",
        ];
    }
}
