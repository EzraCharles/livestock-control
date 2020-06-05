<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productivos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cabezas');
            $table->integer('cabezas_analizadas');
            $table->integer('peso_total_compra');
            $table->integer('peso_promedio_compra');
            $table->integer('peso_total_venta');
            $table->integer('peso_promedio_venta');
            $table->integer('peso_promedio_estancia');
            $table->integer('dias_promedio_estancia');
            $table->float('gpd_promedio');
            $table->float('factor_eficiencia');
            $table->string('comentarios')->nullable();
            $table->integer('embarque_id');
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
        Schema::dropIfExists('productivos');
    }
}
