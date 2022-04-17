<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivo', function (Blueprint $table) {
            $table->integer('dispositivoID')->autoIncrement();
            $table->string('nro_serie', 300);
            $table->integer('programaID');
            $table->integer('tipoDispositivoID');
            
            $table->foreign('programaID', 'dispositivo_ibfk_1')->references('programaID')->on('programa');
            $table->foreign('tipoDispositivoID', 'dispositivo_ibfk_2')->references('tipoDispositivoID')->on('tipodispositivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispositivo');
    }
}
