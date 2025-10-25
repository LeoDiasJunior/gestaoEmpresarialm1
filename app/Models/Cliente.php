<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Certifique-se que o nome está correto
    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'cpf',
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'uf'
    ];
}
