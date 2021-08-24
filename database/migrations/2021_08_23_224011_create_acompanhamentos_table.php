<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcompanhamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acompanhamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_processo');
            $table->foreign('id_processo')->references('id')->on('processos');
            $table->unsignedBigInteger('id_tipo_acompanhamento');
            $table->foreign('id_tipo_acompanhamento')->references('id')->on('tipo_acompanhamentos');
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
        Schema::dropIfExists('acompanhamentos');
    }
}
