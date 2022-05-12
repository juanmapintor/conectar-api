<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega', function (Blueprint $table) {
            $table->integer('entregaID')->primary();
            $table->date('fecha');
            $table->text('observaciones');
            $table->integer('comodanteID');
            $table->integer('dispositivoID')->unique('dispositivoID');
            
            $table->foreign('comodanteID', 'entrega_ibfk_1')->references('comodanteID')->on('comodante');
            $table->foreign('dispositivoID', 'entrega_ibfk_2')->references('dispositivoID')->on('dispositivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega');
    }
}
