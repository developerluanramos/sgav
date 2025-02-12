<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicloAvaliativoIncidencia extends Model
{
    use HasFactory;

    protected $table = "incidencias";

    protected $fillable = [
        "cargo_uuid",
        "equipe_uuid",
        "departamentos_uuid",
        "setores_uuid",
        "postos_trabalho_uuid",
        "ciclos_avaliativos_uuid"
    ];
}
