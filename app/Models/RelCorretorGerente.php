<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelCorretorGerente extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_corretor",
        "id_gerente"
    ];
}
