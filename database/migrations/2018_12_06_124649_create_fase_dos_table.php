<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaseDosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fase_dos', function (Blueprint $table) {
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
            $table->integer('obras_publicas_id')->unsigned();
            $table->foreign('obras_publicas_id')->references('id')->on('proyectos');
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
        Schema::dropIfExists('fase_dos');
    }
}
