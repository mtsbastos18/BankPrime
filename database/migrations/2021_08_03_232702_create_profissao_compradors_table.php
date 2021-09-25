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
            $table->string('nome_empresa')->nullable();
            $table->integer('contratacao')->nullable();
            $table->date('admissao')->nullable();
            $table->string('cargo')->nullable();
            $table->string('renda_mensal')->nullable();
            $table->string('outra_renda_mensal')->nullable();
            $table->string('origem_renda')->nullable();
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
