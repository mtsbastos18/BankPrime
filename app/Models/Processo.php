<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor_operacao',
        'valor_financiar',
        'banco',
        'utiliza_fgts',
        'financiar_despesas',
        'financiar_avaliacao',
        'recursos_proprios',
        'fgts',
        'valor_despesas',
        'valor_total_financiado',
        'valor_total_entrada',
        'ltv',
        'tipo_imovel',
        'meses_financiamento',
        'estado',
        'id_vendedor',
        'id_imovel',
        'id_usuario_criacao',
        'status',
        'id_parceiro',
        'dia_prestacao',
        'amortizacao',
        'indexador',
        'id_corretor',
        'id_vendedor2',
        'updated_at',
        'observacoes'
    ];
}
