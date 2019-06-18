<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $table = 'empresas';

    protected $fillable =['razon_social','domicilio','telefono','correo','estado','municipio','rfc'];

}
