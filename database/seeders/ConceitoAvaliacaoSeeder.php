<?php

namespace Database\Seeders;

use App\Models\ConceitoAvaliacao;
use Illuminate\Database\Seeder;

class ConceitoAvaliacaoSeeder extends Seeder
{
    public function run()
    {
        ConceitoAvaliacao::factory(10)->create();
    }
}
