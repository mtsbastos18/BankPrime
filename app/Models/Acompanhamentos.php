<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompanhamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_processo',
        'id_tipo_acompanhamento',
        'id_usuario_criacao',
        'data'
    ];

    public function observacao()
    {
        return $this->hasMany(ObservacaoAcompanhamentos::class, 'id_acompanhamento', 'id');
    }
}
