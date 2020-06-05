<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peso');
            $table->integer('dieta')->default(0);
            $table->integer('peso_neto');
            $table->float('importe');
            $table->integer('dias');
            $table->float('gpt');
            $table->float('gpd');
            $table->float('factor_eficiencia');
            $table->float('sobre_precio');
            $table->float('ut_precio');
            $table->float('ut_peso');
            $table->float('rendimiento_inversion');
            $table->float('precio'); // temp
            $table->integer('embarque_id')->unsigned();
            $table->integer('animal_id')->unsigned();
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
        Schema::dropIfExists('ventas');
    }
}
