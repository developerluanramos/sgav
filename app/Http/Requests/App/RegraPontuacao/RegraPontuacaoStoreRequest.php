<?php

namespace App\Http\Requests\App\RegraPontuacao;

use Illuminate\Foundation\Http\FormRequest;

class RegraPontuacaoStoreRequest extends FormRequest
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
        if (is_string($this->regras_pontuacao_ciclo)) {
            $this->merge([
//                'regras_pontuacao_ciclo' => json_decode($this->regras_pontuacao_ciclo, true)
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
//            "regras_pontuacao_ciclo.*.de" => [
//                "required", "numeric"
//            ],
//            "regras_pontuacao_ciclo.*.ate" => [
//                "required", "numeric"
//            ],
//            "regras_pontuacao_ciclo.*.status_vinculo_ciclo" => [
//                "required"
//            ],
//            "regras_pontuacao_ciclo.*.status_ciclo" => [
//                "required"
//            ]
        ];
    }

    public function messages(): array
    {
        return [
            "regras_pontuacao_ciclo.*.de.required" => "O campo 'De' é obrigatório.",
            "regras_pontuacao_ciclo.*.de.numeric" => "O campo 'De' deve ser um número.",

            "regras_pontuacao_ciclo.*.ate.required" => "O campo 'Até' é obrigatório.",
            "regras_pontuacao_ciclo.*.ate.numeric" => "O campo 'Até' deve ser um número.",

            "regras_pontuacao_ciclo.*.status_vinculo_ciclo.required" => "O campo 'Status do Vínculo' é obrigatório.",

            "regras_pontuacao_ciclo.*.status_ciclo.required" => "O campo 'Status do Ciclo' é obrigatório."
        ];
    }
}
