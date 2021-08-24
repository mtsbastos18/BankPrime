<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';

    protected $fillable = [
        'tipo',
        'nome',
        'cpf',
        'nascimento',
        'estado_civil',
        'cnpj',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'uf',
        'cidade',
        'bairro',
        'telefone',
        'correntista_bradesco',
        'profissao',
    ];
}
