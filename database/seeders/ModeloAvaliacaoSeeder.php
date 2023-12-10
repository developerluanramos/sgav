<?php

namespace Database\Seeders;

use App\Models\ModeloAvaliacao;
use Illuminate\Database\Seeder;

class ModeloAvaliacaoSeeder extends Seeder
{
    public function run()
    {
        ModeloAvaliacao::factory(20)->create();
    }
}
