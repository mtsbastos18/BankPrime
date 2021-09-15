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
        'telefone',
        'profissao',
        'banco',
        'conta',
        'agencia',
        'procurador',
        'nome_procurador',
        'cpf_procurador',
        'email_procurador',
        'telefone_procurador',
    ];
}
