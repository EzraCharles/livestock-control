<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReproduccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reproducciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comentarios')->nullable();
            $table->integer('animal_id')->unsigned()->nullable(); // Hijo
            //$table->integer('animal_hijo_id')->unsigned()->nullable();
            $table->integer('tipo_reproduccion_id')->unsigned();
            $table->integer('registro_id')->unsigned();
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
        Schema::dropIfExists('reproducciones');
    }
}
