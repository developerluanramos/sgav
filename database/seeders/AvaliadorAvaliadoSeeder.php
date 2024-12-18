<?php

namespace Database\Seeders;

use App\Models\Avaliador;
use App\Models\AvaliadorAvaliado;
use App\Models\Vinculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AvaliadorAvaliadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $avaliadores = Avaliador::all();

        foreach($avaliadores as $avaliador)
        {
            $vinculos = Vinculo::where('avaliador', false)->get();

            foreach($vinculos as $vinculo) {
                AvaliadorAvaliado::create([
                    "avaliador_uuid" => $avaliador->uuid,
                    "avaliado_uuid" => $vinculo->uuid
                ]);
            }
        }
    }
}
