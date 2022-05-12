<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamo', function (Blueprint $table) {
            $table->integer('reclamoID')->primary();
            $table->date('fecha');
            $table->text('observaciones');
            $table->integer('comodanteID');
            $table->integer('dispositivoID');
            
            $table->foreign('comodanteID', 'reclamo_ibfk_1')->references('comodanteID')->on('comodante');
            $table->foreign('dispositivoID', 'reclamo_ibfk_2')->references('dispositivoID')->on('dispositivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamo');
    }
}
