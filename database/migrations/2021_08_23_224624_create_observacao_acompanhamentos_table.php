<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservacaoAcompanhamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observacao_acompanhamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_acompanhamento');
            $table->foreign('id_acompanhamento')->references('id')->on('acompanhamentos');
            $table->string('observacao');
            $table->unsignedBigInteger('id_usuario_criacao');
            $table->foreign('id_usuario_criacao')->references('id')->on('users');
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
        Schema::dropIfExists('observacao_acompanhamentos');
    }
}
