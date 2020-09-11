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
            $table->string('folio_factura')->nullable();    //->nullable()
            $table->string('factura_fiscal')->nullable();   //->nullable()
            $table->string('reemo')->nullable();            //->nullable()
            $table->integer('peso');
            $table->integer('dieta')->default(0);
            $table->integer('peso_neto')->nullable();
            $table->float('importe')->nullable();
            $table->string('comentarios')->nullable();
            /* $table->boolean('acopio')->default(0); */
            $table->integer('embarque_id')->unsigned();
            $table->float('precio_registro')->unsigned()->nullable(); // tmp
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
