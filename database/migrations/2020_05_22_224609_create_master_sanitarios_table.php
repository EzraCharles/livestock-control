<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterSanitariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_sanitarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diagnosticos_total');
            $table->integer('animales_tratados_total');
            $table->string('comentarios');
            $table->integer('usuario_id')->unsigned();
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
        Schema::dropIfExists('master_sanitarios');
    }
}
