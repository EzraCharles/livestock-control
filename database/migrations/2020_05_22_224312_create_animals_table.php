<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('arete')->nullable();
            $table->string('arete_10')->nullable();
            $table->string('arete_4')->nullable();
            $table->string('arete_res')->nullable();
            $table->string('comentarios')->nullable();
            $table->integer('persona_id')->unsigned();
            $table->integer('tipo_animal_id')->unsigned();
            $table->boolean('defuncion')->default(0);
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
        Schema::dropIfExists('animales');
    }
}
