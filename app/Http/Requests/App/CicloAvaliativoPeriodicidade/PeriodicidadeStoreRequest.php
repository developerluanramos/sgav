<?php

namespace App\Http\Requests\App\CicloAvaliativoPeriodicidade;

use Illuminate\Foundation\Http\FormRequest;

class PeriodicidadeStoreRequest extends FormRequest
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
           'iniciado_em' => ['required', 'date'],
           'quantidade_ciclos' => ['required', 'integer'],
           'quantidade_unidade_ciclos' => ['required', 'integer'],
           'unidade_ciclos' => ['required'],
           'quantidade_periodos' => ['required', 'integer'],
           'quantidade_unidade_periodos' => ['required', 'integer'],
           'unidade_periodos' => ['required'],
           'tolerancia_abertura_ciclo' => ['required', 'integer'],
           'tolerancia_encerramento_ciclo' => ['required', 'integer'],
           'tolerancia_abertura_periodo' => ['required', 'integer'],
           'tolerancia_encerramento_periodo' => ['required', 'integer']
        ];
    }
}
