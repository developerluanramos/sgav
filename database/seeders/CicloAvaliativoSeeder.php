<?php

namespace Database\Seeders;

use App\Models\CicloAvaliativo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CicloAvaliativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CicloAvaliativo::factory(1)->create();
    }
}
