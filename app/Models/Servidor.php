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
        'data_nascimento',
    ];

    protected $appends = ['formatted_data_nascimento'];

    public function getFormattedDataNascimentoAttribute()
    {
        return Carbon::parse($this->attributes['data_nascimento'])->format('d-m-Y');
    }
}
