<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonoestablecimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonoestablecimiento', function (Blueprint $table) {
            $table->integer('telefonoEstablecimientoID')->autoIncrement();
            $table->string('telefono', 300)->nullable();
            $table->enum('tipo', ['fijo', 'movil'])->default('fijo');
            $table->integer('establecimientoID');
            
            $table->foreign('establecimientoID', 'telefonoestablecimiento_ibfk_1')->references('establecimientoID')->on('establecimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefonoestablecimiento');
    }
}
