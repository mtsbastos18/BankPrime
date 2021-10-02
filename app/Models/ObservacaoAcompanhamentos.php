<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObservacaoAcompanhamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_acompanhamento',
        'observacao',
        'id_usuario_criacao',
        'data'
    ];
}
