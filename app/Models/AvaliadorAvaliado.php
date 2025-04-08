<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliadorAvaliado extends Model
{
    use HasFactory;

    protected $table = "avaliadores_avaliados";

    protected $fillable = [
        "avaliador_matricula",
        "avaliado_matricula",
    ];

    public function avaliador()
    {
        return $this->belongsTo(Vinculo::class, 'avaliador_matricula', 'matricula');
    }

    public function avaliado()
    {
        return $this->belongsTo(Vinculo::class, 'avaliado_matricula', 'matricula');
    }
}
