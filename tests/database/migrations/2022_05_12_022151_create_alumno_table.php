<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->integer('alumnoID')->primary();
            $table->string('seccion_curso', 10);
            $table->integer('responsableID');
            $table->integer('comodanteID');
            
            $table->foreign('comodanteID', 'alumno_ibfk_1')->references('comodanteID')->on('comodante');
            $table->foreign('responsableID', 'alumno_ibfk_2')->references('responsableID')->on('responsable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno');
    }
}
