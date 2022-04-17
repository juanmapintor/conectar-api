<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directivo', function (Blueprint $table) {
            $table->integer('directivoID')->primary();
            $table->integer('comodanteID');
            
            $table->foreign('comodanteID', 'directivo_ibfk_1')->references('comodanteID')->on('comodante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directivo');
    }
}
