<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable', function (Blueprint $table) {
            $table->integer('responsableID')->primary();
            $table->integer('personaID')->unique('personaID');
            
            $table->foreign('personaID', 'responsable_ibfk_1')->references('personaID')->on('persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsable');
    }
}
