<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmbarquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embarques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->string('tipo_embarque');
            $table->string('comentarios')->nullable();
            $table->date('fecha');
            $table->softDeletes();
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
        Schema::dropIfExists('embarques');
    }
}
