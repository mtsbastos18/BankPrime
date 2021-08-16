<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoComprador extends Model
{
    use HasFactory;

    protected $table = "endereco_comprador";

    protected $fillable = [
        'id_comprador',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'uf',
        'cidade',
        'bairro',
        'telefone',
        'celular',
    ];
}
