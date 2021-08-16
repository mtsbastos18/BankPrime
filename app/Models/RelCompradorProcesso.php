<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelCompradorProcesso extends Model
{
    use HasFactory;

    protected $table = "rel_comprador_imovel";
    protected $fillable = [
        'id_processo',
        'id_comprador'
    ];
}
