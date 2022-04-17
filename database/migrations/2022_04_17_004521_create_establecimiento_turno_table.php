<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientoTurnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimiento_turno', function (Blueprint $table) {
            $table->integer('establecimientoID');
            $table->integer('turnoID');
            
            $table->primary(['establecimientoID', 'turnoID']);
            $table->foreign('establecimientoID', 'establecimiento_turno_ibfk_1')->references('establecimientoID')->on('establecimiento');
            $table->foreign('turnoID', 'establecimiento_turno_ibfk_2')->references('turnoID')->on('turno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establecimiento_turno');
    }
}
