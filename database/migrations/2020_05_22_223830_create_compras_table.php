<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folio_factura');    //->nullable()
            $table->string('factura_fiscal');   //->nullable()
            $table->string('reemo');            //->nullable()
            $table->integer('peso');
            $table->integer('dieta')->default(0);
            $table->integer('peso_neto');
            $table->float('importe');
            $table->string('comentarios')->nullable();
            $table->boolean('acopio')->nullable();
            $table->integer('embarque_id')->unsigned();
            $table->float('precio'); // tmp
            $table->integer('precio_id')->unsigned()->nullable();
            $table->integer('animal_id')->unsigned();
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
        Schema::dropIfExists('compras');
    }
}
