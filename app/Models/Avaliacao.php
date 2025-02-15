<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = "avaliacoes";

    protected $fillable = [
        "uuid",
        "ciclos_avaliativos_uuid",
        "ciclos_uuid",
        "periodos_uuid",
        "iniciado_em",
        "finalizado_em"
    ];
}