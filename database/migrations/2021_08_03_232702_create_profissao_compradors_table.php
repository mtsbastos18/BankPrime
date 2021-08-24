<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissaoCompradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissao_compradores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_comprador');
            $table->foreign('id_comprador')->references('id')->on('compradores');
            $table->string('nome_empresa');
            $table->integer('contratacao');
            $table->date('admissao');
            $table->string('cargo');
            $table->string('renda_mensal');
            $table->string('outra_renda_mensal');
            $table->string('origem_renda');
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
        Schema::dropIfExists('profissao_compradores');
    }
}
