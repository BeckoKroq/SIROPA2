<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->string('path_file_pdf')->nullable();
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
        Schema::dropIfExists('evidencia');
    }
}
