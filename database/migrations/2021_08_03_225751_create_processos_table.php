<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_operacao');
            $table->decimal('valor_financiar');
            $table->boolean('utiliza_fgts')->default(false);
            $table->boolean('financiar_despesas')->default(false);
            $table->boolean('financiar_avaliacao')->default(false);
            $table->decimal('recursos_proprios');
            $table->decimal('fgts');
            $table->decimal('valor_total_financiado');
            $table->decimal('valor_total_entrada');
            $table->double('ltv');
            $table->smallInteger('tipo_imovel');
            $table->integer('meses_financiamento');
            $table->string('estado');
            $table->integer('id_vendedor')->nullable();
            $table->unsignedBigInteger('id_imovel');
            $table->foreign('id_imovel')->references('id')->on('imoveis');
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
        Schema::dropIfExists('processos');
    }
}
