<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratamientoSanitariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamiento_sanitarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('calificacion')->nullable();
            $table->string('temperatura')->nullable();
            $table->string('comentarios')->nullable();
            $table->integer('master_sanitario_id')->unsigned();
            $table->integer('corral_id')->unsigned()->nullable();
            $table->integer('animal_id')->unsigned();
            $table->boolean('borrado')->default(0);
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
        Schema::dropIfExists('tratamiento_sanitarios');
    }
}
