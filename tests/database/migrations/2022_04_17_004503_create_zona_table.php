<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zona', function (Blueprint $table) {
            $table->integer('zonaID')->autoIncrement();
            $table->string('nombre_zona', 300);
            $table->string('apellido_supervisor', 300);
            $table->string('nombre_supervisor', 300);
            $table->string('mail_supervisor', 300)->nullable();
            $table->string('telefono_supervisor', 300)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zona');
    }
}
