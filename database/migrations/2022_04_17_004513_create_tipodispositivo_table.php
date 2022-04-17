<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipodispositivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipodispositivo', function (Blueprint $table) {
            $table->integer('tipoDispositivoID')->autoIncrement();
            $table->string('tipo', 300);
            $table->text('descripcion');
            $table->string('modelo', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipodispositivo');
    }
}
