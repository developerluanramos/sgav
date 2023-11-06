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
            'email' => fake()->email(),
            'data_nascimento' => fake()->date(),
            'data_admissao' => fake()->date(),
            'cargo_uuid' => Cargo::inRandomOrder()->first()->uuid,
            'equipe_uuid' => Equipe::inRandomOrder()->first()->uuid,
            'matricula' => fake()->numberBetween(1147483647, 2147483647),
        ];
    }
}
