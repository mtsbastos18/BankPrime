<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Parceiro;

class CreateParceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parceiros', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo');
            $table->string('cnpj')->nullable();
            $table->string('cpf')->nullable();
            $table->string('apelido')->nullable();
            $table->string('nome_fantasia')->nullable();
            $table->string('razao_social')->nullable();
            $table->string('email')->nullable();
            $table->string('email_financeiro')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('nome_contato')->nullable();
            $table->string('cep')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });


        Parceiro::create([
            'tipo' => 2,
            'apelido' => "BankPrime"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parceiros');
    }
}
