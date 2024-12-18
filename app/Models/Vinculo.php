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
        'email',
        'data_admissao',
        'matricula',
        'avaliador',
        'cargo_uuid',
        'equipe_uuid',
        'servidor_uuid',
        'postos_trabalho_uuid',
        'setores_uuid',
        'departamentos_uuid',
    ];

    protected $appends = ['formatted_data_admissao'];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_uuid', 'uuid');
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'equipe_uuid', 'uuid');
    }

    public function servidor()
    {
        return $this->belongsTo(Servidor::class, 'servidor_uuid', 'uuid');
    }

    public function postoTrabalho()
    {
        return $this->belongsTo(PostoTrabalho::class, 'postos_trabalho_uuid', 'uuid');
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'setores_uuid', 'uuid');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamentos_uuid', 'uuid');
    }

    public function getFormattedDataAdmissaoAttribute()
    {
        return Carbon::parse($this->attributes['data_admissao'])->format('d-m-Y');
    }
}
