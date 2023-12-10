<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConceitoAvaliacao extends Model
{
    use HasFactory;

    protected $table = 'conceitos_avaliacao';

    protected $fillable = [
        'uuid',
        'descricao',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $appends = ['created_at_for_humans', 'updated_at_for_humans'];


    public function itensConceitosAvaliacao() 
    {
        return $this->hasMany(ItemConceitoAvaliacao::class, 'conceito_avaliacao_uuid', 'uuid');
    }

    public function getCreatedAtForHumansAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }

    public function getUpdatedAtForHumansAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->attributes['updated_at']) )->diffForHumans();
    }
        
    public function fatoresAvaliacao() 
    {
        return $this->hasMany(FatorAvaliacao::class, 'conceito_avaliacao_uuid', 'uuid');
    }

}
