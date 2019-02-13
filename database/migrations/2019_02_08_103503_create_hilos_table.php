<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHilosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hilos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->integer('id_categoria');
            $table->integer('id_user');
//            $table->foreign('id_categoria')->references('id')->on('categorias');
//            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('hilos');
    }
}
