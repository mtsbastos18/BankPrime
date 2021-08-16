<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissaoUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('permissao');
            $table->timestamps();
        });

        DB::table('permissao_usuarios')->insert([
            ['permissao' => 'Master'],
            ['permissao' => 'Gerente'],
            ['permissao' => 'Corretor'],
            ['permissao' => 'Parceiro'],
            ['permissao' => 'Cliente'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissao_usuarios');
    }
}
