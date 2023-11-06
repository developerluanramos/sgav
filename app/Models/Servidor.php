<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Servidor extends Model
{
    use HasFactory;

    protected $table = 'servidores';

    protected $fillable = [
        'uuid',
        'nome',
        'email',
        'data_nascimento',
        'data_admissao',
        'cargo_uuid',
        'equipe_uuid',
        'matricula',
    ];

    protected $appends = ['formatted_data_nascimento', 'formatted_data_admissao'];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_uuid', 'uuid');
    }

    function equipe() {
        return $this->belongsTo(Equipe::class, 'equipe_uuid', 'uuid');
    }

    public function getFormattedDataNascimentoAttribute()
    {
        return Carbon::parse($this->attributes['data_nascimento'])->format('d-m-Y');
    }

    public function getFormattedDataAdmissaoAttribute()
    {
        return Carbon::parse($this->attributes['data_admissao'])->format('d-m-Y');
    }
}
