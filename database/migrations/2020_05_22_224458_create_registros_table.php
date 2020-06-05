<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peso')->nullable();
            $table->integer('dias_estancia')->nullable();
            $table->float('gpt')->nullable();
            $table->float('gpd')->nullable();
            $table->float('merma')->nullable();
            $table->float('factor_eficiencia')->nullable();
            $table->boolean('alimentacion')->default(0);
            //$table->string('etapa_alimentacion')->nullable(); //default
            $table->boolean('reproduccion')->default(0);
            $table->string('comentarios')->nullable();
            $table->integer('animal_id')->unsigned();
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
        Schema::dropIfExists('registros');
    }
}
