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
            $table->decimal('valor_operacao')->nullable();
            $table->decimal('valor_financiar')->nullable();
            $table->integer('banco')->nullable();
            $table->boolean('utiliza_fgts')->default(false);
            $table->boolean('financiar_despesas')->default(false);
            $table->boolean('financiar_avaliacao')->default(false);
            $table->decimal('recursos_proprios')->nullable();
            $table->decimal('fgts')->nullable();
            $table->decimal('valor_despesas')->nullable();
            $table->decimal('valor_total_financiado')->nullable();
            $table->decimal('valor_total_entrada')->nullable();
            $table->smallInteger('tipo_imovel')->nullable();
            $table->integer('meses_financiamento')->nullable();
            $table->integer('id_vendedor')->nullable();
            $table->unsignedBigInteger('id_imovel');
            $table->foreign('id_imovel')->references('id')->on('imoveis');
            $table->unsignedBigInteger('id_usuario_criacao');
            $table->foreign('id_usuario_criacao')->references('id')->on('users');
            $table->integer('status')->default(1);
            $table->unsignedBigInteger('id_parceiro');
            $table->foreign('id_parceiro')->references('id')->on('parceiros');
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
