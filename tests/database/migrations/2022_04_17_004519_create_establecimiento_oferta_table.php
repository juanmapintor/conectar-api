<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientoOfertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimiento_oferta', function (Blueprint $table) {
            $table->integer('establecimientoID');
            $table->integer('ofertaID');
            
            $table->primary(['establecimientoID', 'ofertaID']);
            $table->foreign('establecimientoID', 'establecimiento_oferta_ibfk_1')->references('establecimientoID')->on('establecimiento');
            $table->foreign('ofertaID', 'establecimiento_oferta_ibfk_2')->references('ofertaID')->on('oferta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establecimiento_oferta');
    }
}
