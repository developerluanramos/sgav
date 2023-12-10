<?php

namespace Database\Seeders;

use App\Models\ItemConceitoAvaliacao;
use Illuminate\Database\Seeder;

class ItemConceitoAvaliacaoSeeder extends Seeder
{
    public function run()
    {
        ItemConceitoAvaliacao::factory(100)->create();
    }
}
