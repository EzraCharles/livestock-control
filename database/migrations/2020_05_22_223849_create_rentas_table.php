<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_salida');
            $table->date('fecha_entrada');
            $table->integer('peso_salida');
            $table->integer('peso_entrada')->nullable();
            $table->string('destino');
            $table->float('precio');
            $table->float('merma')->nullable();
            $table->integer('dias')->nullable();
            $table->float('indemnizacion')->nullable();
            $table->integer('animal_id')->unsigned();
            $table->integer('embarque_id')->unsigned();
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
        Schema::dropIfExists('rentas');
    }
}
