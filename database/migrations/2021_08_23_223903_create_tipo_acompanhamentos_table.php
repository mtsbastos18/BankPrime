<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoAcompanhamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_acompanhamentos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->timestamps();
        });

        DB::table('tipo_acompanhamentos')->insert([
            ['descricao' => 'Pré-Análise'],
            ['descricao' => 'Carta de crédito'],
            ['descricao' => 'Vistoria'],
            ['descricao' => 'Contratação'],
            ['descricao' => 'Assinatura de contrato'],
            ['descricao' => 'Registro e liberação de recursos'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_acompanhamentos');
    }
}
