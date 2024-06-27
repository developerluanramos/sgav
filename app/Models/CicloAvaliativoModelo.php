<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicloAvaliativoModelo extends Model
{
    use HasFactory;

    protected $table = "ciclos_avaliativos_modelos";

    protected $fillable = [
        "uuid", "ciclos_avaliativos_uuid", "modelos_avaliacao_uuid"
    ];
}
