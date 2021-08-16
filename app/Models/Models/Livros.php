<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    protected $fillable = [
        'autor',
        'genero',
        'editora',
        'ano_lancamento',
        'titulo',
        
    ];

    public function rules(){
        
        return[
            'autor -> required',
            'genero -> required',
            'editora -> required',
            'ano_lancamento -> required',
            'titulo -> required'

        ];
    }
}
