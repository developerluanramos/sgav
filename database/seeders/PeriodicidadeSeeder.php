<?php

namespace Database\Seeders;

use App\Models\Periodicidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodicidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Periodicidade::factory(1)->create();
    }
}
