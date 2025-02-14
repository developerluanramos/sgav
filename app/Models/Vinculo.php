<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vinculo extends Model
{
    use HasFactory;

    protected $table = "vinculos";

    protected $fillable = [
        'uuid',
        'nome',
        'email',
        'data_admissao',
        'matricula',
        'avaliador',
        'condicao',
        'nome_orgao',
        'nome_funcao',
        'codigo_orgao',
        'codigo_funcao',
        'data_rescisao',
        'nome_local_trabalho',
        'codigo_local_trabalho'
    ];

    // protected $appends = ['formatted_data_admissao'];

    public function getFormattedDataAdmissaoAttribute()
    {
        return Carbon::parse($this->attributes['data_admissao'])->format('d-m-Y');
    }
}
