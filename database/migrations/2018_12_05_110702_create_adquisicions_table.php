<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdquisicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adquisicions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_adquisicion',50);
            $table->string('numero_adquisicion',50);
            $table->integer('region');
            $table->string('localidad',60);
            $table->string('fecha_inicio',10);
            $table->string('fecha_fin',10);
            $table->integer('monto');
            $table->string('modo_adquisicion')->nullable();
            $table->string('path_adquisicion');
            $table->integer('municipios_id')->unsigned();
            $table->foreign('municipios_id')->references('id')->on('municipios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adquisicions');
    }
}
