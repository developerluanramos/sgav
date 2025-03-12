<?php

namespace App\Http\Requests\App\Calculo;

use Illuminate\Foundation\Http\FormRequest;

class CalculoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        if (is_string($this->regrasPontuacaoCiclo)) {
            $this->merge([
                'regrasPontuacaoCiclo' => json_decode($this->regrasPontuacaoCiclo, true)
            ]);
        }
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "regrasPontuacaoCiclo.*.de" => [
                "required", "numeric"
            ],
            "regrasPontuacaoCiclo.*.ate" => [
                "required", "numeric"
            ],
            "regrasPontuacaoCiclo.*.status_vinculo_ciclo" => [
                "required"
            ],
            "regrasPontuacaoCiclo.*.status_ciclo" => [
                "required"
            ]
        ];
    }

    public function messages(): array
    {
        return [
            "regrasPontuacaoCiclo.*.de.required" => "O campo 'De' é obrigatório.",
            "regrasPontuacaoCiclo.*.de.numeric" => "O campo 'De' deve ser um número.",

            "regrasPontuacaoCiclo.*.ate.required" => "O campo 'Até' é obrigatório.",
            "regrasPontuacaoCiclo.*.ate.numeric" => "O campo 'Até' deve ser um número.",

            "regrasPontuacaoCiclo.*.status_vinculo_ciclo.required" => "O campo 'Status do Vínculo' é obrigatório.",

            "regrasPontuacaoCiclo.*.status_ciclo.required" => "O campo 'Status do Ciclo' é obrigatório."
        ];
    }
}