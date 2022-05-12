<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomicilioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilio', function (Blueprint $table) {
            $table->integer('domicilioID')->primary();
            $table->string('provincia', 300);
            $table->string('departamento', 300);
            $table->string('cod_postal', 10);
            $table->string('localidad', 300)->nullable();
            $table->string('barrio', 300)->nullable();
            $table->string('calle', 300);
            $table->string('numero', 10)->nullable();
            $table->string('cardinalidad', 10)->nullable();
            $table->float('lat')->default(-31.5375);
            $table->float('lng')->default(-68.5364);
            $table->string('observacion', 300)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domicilio');
    }
}
