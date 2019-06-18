<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class Adquisicion extends Model
{
    //
    protected $table = 'adquisicions';

    protected $fillable =['nombre_adquisicion','numero_adquisicion','region','localidad','fecha_inicio','fecha_fin','monto','modo_adquisicion','path_adquisicion','municipios_id'];

    public function scopeSearch($query, $nombre_adquisicion){
      return $query->where('nombre_adquisicion', 'LIKE', "%$nombre_adquisicion%");

    }
}
