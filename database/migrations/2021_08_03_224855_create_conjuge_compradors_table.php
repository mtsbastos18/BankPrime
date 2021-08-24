<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConjugeCompradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conjuge_compradores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_comprador');
            $table->foreign('id_comprador')->references('id')->on('compradores');
            $table->string('cpf')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('nome')->nullable();
            $table->char('sexo')->nullable();
            $table->string('email')->nullable();
            $table->string('nome_mae')->nullable();
            $table->string('pais')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('num_documento')->nullable();
            $table->string('estado_documento')->nullable();
            $table->string('orgao_emissor')->nullable();
            $table->date('data_emissao')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
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
        Schema::dropIfExists('conjuge_compradores');
    }
}
