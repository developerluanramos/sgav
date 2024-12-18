<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliadorAvaliado extends Model
{
    use HasFactory;

    protected $table = "avaliadores_avaliados";

    protected $fillable = [
        "avaliador_uuid", "avaliado_uuid"
    ];
}
