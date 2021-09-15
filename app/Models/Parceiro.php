<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'cnpj',
        'cpf',
        'apelido',
        'nome_fantasia',
        'razao_social',
        'email',
        'email_financeiro',
        'telefone',
        'celular',
        'nome_contato',
        'telefone_contato',
        'banco',
        'agencia',
        'conta',
        'observacoes',
        'status'
    ];


}
