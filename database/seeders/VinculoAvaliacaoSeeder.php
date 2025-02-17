<?php

namespace Database\Seeders;

use App\Models\VinculoAvaliacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VinculoAvaliacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VinculoAvaliacao::factory()->create();
    }
}
