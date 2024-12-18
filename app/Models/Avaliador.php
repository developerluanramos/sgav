<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliador extends Model
{
    use HasFactory;

    protected $table = "avaliadores";

    protected $fillable = [
        "uuid",
        "vinculo_uuid",
    ];

    public function vinculo() 
    {
        return $this->belongsTo(Vinculo::class, 'vinculo_uuid', 'uuid');
    }
    
    public function avaliados()
    {
        return $this->belongsToMany(
            Vinculo::class, 
            'avaliadores_avaliados', 
            'avaliador_uuid', 
            'avaliado_uuid', 
            'uuid', 
            'uuid');
    }
}