<?php

namespace App\Http\Requests\App\Vinculo;

use Illuminate\Foundation\Http\FormRequest;

class VinculoEditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
