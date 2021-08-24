<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConjugeComprador extends Model
{
    use HasFactory;

    protected $table = 'conjuge_compradores';

    protected $fillable = [
        'id_comprador',
        'nome',
        'cpf',
        'data_nascimento',
        'sexo',
        'email',
        'nome_mae',
        'pais',
        'naturalidade',
        'tipo_documento',
        'num_documento',
        'estado_documento',
        'orgao_emissor',
        'data_emissao',
        'telefone',
        'celular',
        'nome_empresa',
        'contratacao',
        'admissao',
        'cargo',
        'renda_mensal',
        'outra_renda_mensal',
        'origem_renda',
    ];
}
