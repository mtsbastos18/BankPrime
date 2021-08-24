<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfissaoComprador extends Model
{
    use HasFactory;

    protected $table = "profissao_compradores";

    protected $fillable = [
        'id_comprador',
        'nome_empresa',
        'contratacao',
        'admissao',
        'cargo',
        'renda_mensal',
        'outra_renda_mensal',
        'origem_renda',
    ];
}
