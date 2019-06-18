<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_proyecto',50);
            $table->string('numero_proyecto');
            $table->integer('region');
            $table->string('localidad',60);
            $table->string('fecha_inicio',10);
            $table->string('fecha_fin',10);
            $table->integer('monto');
            $table->string('modo_proyecto');
            $table->string('path_proyecto');
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
        Schema::dropIfExists('proyectos');
    }
}
