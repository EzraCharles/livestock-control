<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TratamientoSanitarioDiagnostico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamiento_sanitario_diagnostico', function (Blueprint $table) {
            $table->integer('tratamiento_sanitario_id')->unsigned();
            $table->integer('diagnostico_id')->unsigned();
            /*$table->foreign('diagnostico_id')->references('id')->on('diagnostico')
                ->onDelete('cascade');
            $table->foreign('tratamiento_sanitario_id')->references('id')->on('tratamiento_sanitarios')
                ->onDelete('cascade');
            $table->timestamps();*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamiento_sanitario_diagnostico');
    }
}
