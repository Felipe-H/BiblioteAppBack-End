<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    
    protected $fillable = [
        'nome',
        'url',
        'telefone'
    ];
    public function rules()
    {
        return [
            'nome -> required',
            'url ->required',
            'telefone -> required'
        ];
    }
}
