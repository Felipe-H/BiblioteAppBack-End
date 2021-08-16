<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genero_literario extends Model
{
    protected $fillable = [
        'nome',
        'descricao'

        
    ];
    public function rules()
    {
        return [
            'nome -> required',
            'descricao ->required',
            
        ];
    }
}
