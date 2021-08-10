<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compradores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->date('nascimento');
            $table->char('sexo');
            $table->string('estado_civil');
            $table->string('email');
            $table->string('nome_mae');
            $table->string('pais');
            $table->string('naturalidade');
            $table->string('tipo_documento');
            $table->string('num_documento');
            $table->string('estado_documento');
            $table->string('orgao_emissor');
            $table->date('data_emissao');
            $table->string('regime_bens')->nullable();
            $table->date('data_casamento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compradores');
    }
}
