<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->float('kilogramos');
            $table->float('porcentaje');
            $table->float('importe');
            $table->integer('formula_id')->unsigned();
            $table->integer('precio_id')->unsigned();
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
        Schema::dropIfExists('formulaciones');
    }
}
