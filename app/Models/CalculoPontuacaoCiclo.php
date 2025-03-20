<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculoPontuacaoCiclo extends Model
{
    use HasFactory;

    protected $fillable = [
        "ciclos_avaliativos_uuid",
        "de", 
        "ate",
        "status_vinculo_ciclo",
        "status_ciclo",
        "aplicar_todos"
    ];
}
