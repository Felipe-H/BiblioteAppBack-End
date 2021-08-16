<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    protected $fillable = [
        'nome',
        'data_nasc',
        'sexo',
        'nacionalidade',
    ];
    
    public function rules()
    {
        return [
            'nome -> required',
            'data_nasc ->required',
            'sexo -> required',
            'nacionalidade -> required'
        ];
    }

}
