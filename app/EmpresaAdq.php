<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class EmpresaAdq extends Model
{
    //
    protected $table = 'empresa_adqs';

    protected $fillable =['razon_social','domicilio','telefono','correo','estado','municipio','rfc'];
}
