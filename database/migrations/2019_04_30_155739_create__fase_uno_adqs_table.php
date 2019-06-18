<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaseUnoAdqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_fase_uno_adq', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_archivo_sub')->nullable();
            $table->string('subidox')->nullable();
            $table->string('archivo');
            $table->integer('numero');
            $table->string('permiso_check',3);
            $table->integer('aceptado');
            $table->string('path_file_pdf')->nullable();
            $table->date('primera_carga');
            $table->string('nota',100)->nullable();
            $table->date('fecha_lim');
            $table->integer('adquisicion_id')->unsigned();
            $table->foreign('adquisicion_id')->references('id')->on('adquisicions');
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
        Schema::dropIfExists('_fase_uno_adq');
    }
}
