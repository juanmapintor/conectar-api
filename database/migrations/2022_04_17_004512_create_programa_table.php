<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa', function (Blueprint $table) {
            $table->integer('programaID')->autoIncrement();
            $table->string('nombre', 300);
            $table->text('detalle');
            $table->string('resolucion_nro', 300);
            $table->string('destino', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programa');
    }
}
