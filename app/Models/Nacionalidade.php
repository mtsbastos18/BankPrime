<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidade extends Model
{
    use HasFactory;

    public static function getNacionalidades() {
        $dados = [
            "Brasileira",
            "Brasileiro naturalizado",
            "Brasileiro nascido no exterior",
            "Estrangeira"
        ];

        return $dados;
    }

}
