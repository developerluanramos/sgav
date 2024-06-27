<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\Equipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servidor>
 */
class ServidorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'nome' => fake()->name(),
            'data_nascimento' => fake()->dateTimeBetween('1955-01-01', '1992-02-01'),
        ];
    }
}
