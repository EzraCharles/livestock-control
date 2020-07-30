<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concepto');
            $table->string('tipo');
            $table->float('precio');
            $table->integer('factor')->default(1); // unidad (precio se divide entre factor para cada aplicacion o uso)
            // Animales
            $table->boolean('rango')->default(false);
            $table->integer('rango_alto')->nullable();
            $table->integer('rango_bajo')->nullable();
            // Alimentacion / Formula
            $table->boolean('alimento')->default(false);
            $table->float('materia_seca')->nullable();
            $table->float('porcion_comestible')->nullable();
            $table->float('grasa')->nullable();
            $table->float('fibra')->nullable();
            $table->float('ceniza')->nullable();

            $table->string('comentarios')->nullable();
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
        Schema::dropIfExists('precios');
    }
}
