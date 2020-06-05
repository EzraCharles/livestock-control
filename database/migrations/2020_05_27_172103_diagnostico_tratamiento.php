<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiagnosticoTratamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico_tratamiento', function (Blueprint $table) {
            $table->integer('diagnostico_id')->unsigned();
            $table->integer('tratamiento_id')->unsigned();
            /* $table->foreign('diagnostico_id')->references('id')->on('diagnosticos')
                ->onDelete('cascade');
            $table->foreign('tratamiento_id')->references('id')->on('tratamients')
                ->onDelete('cascade');
            $table->timestamps(); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnostico_tratamiento');

    }
}
