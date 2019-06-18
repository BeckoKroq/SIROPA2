<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;
use Siropa\Empresa;

class Proyecto extends Model
{
    //
    protected $table = 'proyectos';

    protected $fillable = ['nombre_proyecto','numero_proyecto','region','localidad','municipios_id','monto','modo_proyecto','path_proyecto','fecha_inicio','fecha_fin'];

    public function scopeSearch($query, $nombre_proyecto){
      return $query->where('nombre_proyecto', 'LIKE', "%$nombre_proyecto%");


    }
    public function asignacionconst()
    {
      return $this->belongsToMany(Empresa::class, 'relacion_proys');
    }
}
