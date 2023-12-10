<?php

namespace Database\Factories;

use App\Models\ConceitoAvaliacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConceitoAvaliacaoFactory extends Factory
{
    protected $model = ConceitoAvaliacao::class;

    public function definition()
    {
        return [
            'uuid' => fake()->uuid(),
            'descricao' => fake()->text(50),
        ];
    }
}
