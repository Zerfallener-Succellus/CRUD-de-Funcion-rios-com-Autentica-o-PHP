<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt; 
use Illuminate\Database\Eloquent\Casts\Attribute;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'telefone',
        'genero',
    ];

    
     
    protected function cpf(): Attribute
    {
        return Attribute::make(
           
            get: fn ($value) => Crypt::decryptString($value),
            
            
            set: fn ($value) => Crypt::encryptString($value)
        );
    }
}