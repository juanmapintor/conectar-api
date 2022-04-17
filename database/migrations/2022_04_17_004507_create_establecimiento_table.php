<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimiento', function (Blueprint $table) {
            $table->integer('establecimientoID')->autoIncrement();
            $table->string('cue', 9)->default('000000000')->unique('cue');
            $table->string('nombre', 300)->nullable();
            $table->integer('matricula')->default(0);
            $table->string('mail', 300);
            $table->string('horario', 300);
            $table->integer('sectorID');
            $table->integer('modalidadID');
            $table->integer('ambitoID');
            $table->integer('nivelID');
            $table->integer('zonaID');
            $table->integer('domicilioID')->unique('domicilioID');
            
            $table->foreign('modalidadID', 'establecimiento_ibfk_10')->references('modalidadID')->on('modalidad');
            $table->foreign('domicilioID', 'establecimiento_ibfk_5')->references('domicilioID')->on('domicilio');
            $table->foreign('zonaID', 'establecimiento_ibfk_6')->references('zonaID')->on('zona');
            $table->foreign('nivelID', 'establecimiento_ibfk_7')->references('nivelID')->on('nivel');
            $table->foreign('ambitoID', 'establecimiento_ibfk_8')->references('ambitoID')->on('ambito');
            $table->foreign('sectorID', 'establecimiento_ibfk_9')->references('sectorID')->on('sector');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establecimiento');
    }
}
