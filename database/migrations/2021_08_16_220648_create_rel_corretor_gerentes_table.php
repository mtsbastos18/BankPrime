<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelCorretorGerentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_corretor_gerentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_corretor');
            $table->foreign('id_corretor')->references('id')->on('users');
            $table->unsignedBigInteger('id_gerente');
            $table->foreign('id_gerente')->references('id')->on('users');
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
        Schema::dropIfExists('rel_corretor_gerentes');
    }
}
