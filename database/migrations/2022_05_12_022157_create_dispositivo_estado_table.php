<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositivoEstadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivo_estado', function (Blueprint $table) {
            $table->integer('dispositivoEstadoID')->primary();
            $table->dateTime('fecha_hora')->default('current_timestamp()');
            $table->text('observacion');
            $table->integer('estadoID');
            $table->integer('dispositivoID');
            
            $table->foreign('dispositivoID', 'dispositivo_estado_ibfk_1')->references('dispositivoID')->on('dispositivo');
            $table->foreign('estadoID', 'dispositivo_estado_ibfk_2')->references('estadoID')->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispositivo_estado');
    }
}
