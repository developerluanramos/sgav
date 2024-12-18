<?php

namespace Database\Seeders;

use App\Models\Avaliador;
use App\Models\Vinculo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AvaliadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vinculos = Vinculo::all();

        foreach($vinculos as $vinculo)
        {
            if($vinculo->avaliador)
            {
                Avaliador::create([
                    "uuid" => Str::uuid(),
                    "vinculo_uuid" => $vinculo->uuid
                ]);
            }
        }
    }
}
