<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptosAdqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptos_adqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave')->nullable($value=true);
            $table->text('conceptos_de_trabajo')->nullable($value=true);
            $table->string('unidad_de_medida')->nullable($value=true);
            $table->string('cantidad_o_volumen')->nullable($value=true);
            $table->string('precio_unitario')->nullable($value=true);
            $table->string('importe')->nullable($value=true);
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
        Schema::dropIfExists('conceptos_adqs');
    }
}
