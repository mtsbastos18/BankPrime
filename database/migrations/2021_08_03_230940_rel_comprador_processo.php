<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelCompradorProcesso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_comprador_imovel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_processo');
            $table->foreign('id_processo')->references('id')->on('processos');
            $table->unsignedBigInteger('id_comprador');
            $table->foreign('id_comprador')->references('id')->on('id_comprador');
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
        Schema::dropIfExists('rel_comprador_imovel');
    }
}
