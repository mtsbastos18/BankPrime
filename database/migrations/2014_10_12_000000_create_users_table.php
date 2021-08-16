<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('login')->unique();
            $table->string('cpf')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('cep')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('id_permissao');
            $table->foreign('id_permissao')->references('id')->on('permissao_usuarios');
            $table->unsignedBigInteger('id_parceiro');
            $table->foreign('id_parceiro')->references('id')->on('parceiros');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name' => "Administrador do sistema",
            'email' =>"admin@admin.com.br",
            'login' =>"admin",
            'id_permissao' => 1,
            'password' => Hash::make('bankprimeadmin'),
            'id_parceiro' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
