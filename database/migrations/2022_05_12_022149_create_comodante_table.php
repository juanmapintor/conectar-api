<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComodanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comodante', function (Blueprint $table) {
            $table->integer('comodanteID')->primary();
            $table->string('mail', 300);
            $table->integer('establecimientoID');
            $table->integer('personaID');
            
            $table->foreign('personaID', 'comodante_ibfk_1')->references('personaID')->on('persona');
            $table->foreign('establecimientoID', 'comodante_ibfk_2')->references('establecimientoID')->on('establecimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comodante');
    }
}
