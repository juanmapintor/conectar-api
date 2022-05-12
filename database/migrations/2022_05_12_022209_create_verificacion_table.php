<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verificacion', function (Blueprint $table) {
            $table->integer('verificacionID')->primary();
            $table->dateTime('fecha_hora')->default('current_timestamp()');
            $table->text('observacion');
            $table->integer('apto');
            $table->integer('dispositivoID');
            
            $table->foreign('dispositivoID', 'verificacion_ibfk_1')->references('dispositivoID')->on('dispositivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verificacion');
    }
}
