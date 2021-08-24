<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo');
            $table->string('nome');
            $table->string('cpf')->nullable();
            $table->date('nascimento')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('uf');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('telefone')->nullable();
            $table->boolean('correntista_bradesco');
            $table->string('profissao')->nullable();
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
        Schema::dropIfExists('vendedores');
    }
}
