<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimentaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comentarios')->nullable();
            $table->integer('tipo_alimentacion_id')->unsigned();
            $table->integer('registro_id')->unsigned();
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
        Schema::dropIfExists('alimentaciones');
    }
}
