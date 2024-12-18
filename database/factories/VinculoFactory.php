<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Equipe;
use App\Models\PostoTrabalho;
use App\Models\Servidor;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vinculo>
 */
class VinculoFactory extends Factory
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
            'email' => fake()->unique()->email(),
            'data_admissao' => fake()->date(),
            'matricula' => fake()->unique()->numerify('#########'),
            'avaliador' => fake()->boolean(),
            'cargo_uuid' => Cargo::inRandomOrder()->first()->uuid,
            'equipe_uuid' => Equipe::inRandomOrder()->first()->uuid,
            'servidor_uuid' => Servidor::inRandomOrder()->first()->uuid,
            'postos_trabalho_uuid' => PostoTrabalho::inRandomOrder()->first()->uuid,
            'setores_uuid' => Setor::inRandomOrder()->first()->uuid,
            'departamentos_uuid' => Departamento::inRandomOrder()->first()->uuid,
        ];
    }
}
