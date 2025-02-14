<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicloAvaliativoIncidencia extends Model
{
    use HasFactory;

    protected $table = "ciclos_avaliativos_incidencias";

    protected $fillable = [
        "locais_trabalho",
        "orgaos",
        "funcoes",
        "ciclos_avaliativos_uuid"
    ];
}