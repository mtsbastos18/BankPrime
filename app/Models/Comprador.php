<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    use HasFactory;
    protected $table = 'compradores';
    
    protected $fillable = [
        'nome',
        'cpf',
        'nascimento',
        'sexo',
        'estado_civil',
        'email',
        'pais',
        'naturalidade',
        'tipo_documento',
        'num_documento',
        'estado_documento',
        'orgao_emissor',
        'data_emissao',
        'regime_bens',
        'data_casamento',
    ];
}



// $table->string('nome');
//             $table->string('cpf');
//             $table->date('nascimento');
//             $table->char('sexo');
//             $table->string('estado_civil');
//             $table->string('email');
//             $table->string('nome_mae');
//             $table->string('pais');
//             $table->string('naturalidade');
//             $table->string('tipo_documento');
//             $table->string('num_documento');
//             $table->string('estado_documento');
//             $table->string('orgao_emissor');
//             $table->date('data_emissao');
//             $table->string('regime_bens')->nullable();
//             $table->date('data_casamento')->nullable();
