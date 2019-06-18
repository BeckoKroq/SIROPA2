<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaAdqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_adqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social');
            $table->string('domicilio');
            $table->string('telefono');
            $table->string('correo');
            $table->string('estado');
            $table->string('municipio');
            $table->string('rfc');
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
        Schema::dropIfExists('empresa_adqs');
    }
}
