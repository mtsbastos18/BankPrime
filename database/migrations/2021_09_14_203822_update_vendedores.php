<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVendedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendedores', function (Blueprint $table) {
            $table->string('banco')->nullable();
            $table->string('conta')->nullable();
            $table->string('agencia')->nullable();
            $table->integer('procurador')->nullable();
            $table->string('nome_procurador')->nullable();
            $table->string('cpf_procurador')->nullable();
            $table->string('email_procurador')->nullable();
            $table->string('telefone_procurador')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
