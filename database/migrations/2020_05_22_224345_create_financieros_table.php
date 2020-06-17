<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancierosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financieros', function (Blueprint $table) {
            $table->increments('id');
            $table->float('precio_promedio_compra');
            $table->float('precio_promedio_venta');
            $table->float('sobre_precio_promedio');
            $table->float('ut_precio_total');
            $table->float('ut_peso_total');
            $table->float('costo_produccion');
            $table->float('ut_peso_neta');
            $table->float('ut_total');
            $table->integer('consumo_peso_vivo')->default(0);
            $table->float('inversion_total');
            $table->float('rendimiento_mensual');
            $table->string('comentarios')->nullable();
            $table->integer('embarque_id')->unsigned();
            $table->integer('formula_id')->unsigned();
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
        Schema::dropIfExists('financieros');
    }
}
