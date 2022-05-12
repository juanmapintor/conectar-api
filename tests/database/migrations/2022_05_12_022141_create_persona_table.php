<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->integer('personaID')->primary();
            $table->string('apellido', 300);
            $table->string('nombre', 300);
            $table->enum('sexo', ['m', 'f', 'x']);
            $table->string('dni', 100);
            $table->date('fecha_nacimiento');
            $table->string('cuil', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
