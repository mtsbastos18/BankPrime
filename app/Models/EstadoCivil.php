<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    use HasFactory;

    public static function getEstadoCivil() {
        $estados = [
            1 => "Solteiro(a",
            2 => "Casado(a)",
            3 => "União estável",
            4 => "Divorciado(a)",
            5 => "Viúvo(a)",
        ];

        return $estados;
    }
}
