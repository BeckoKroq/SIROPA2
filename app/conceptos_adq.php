<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class conceptos_adq extends Model
{
    protected $table = 'conceptos_adqs';

    protected $fillable =
        [
            'adquisicion_id',
            'clave',
            'conceptos_de_trabajo',
            'unidad_de_medida',
            'cantidad_o_volumen',
            'precio_unitario',
            'importe',
        ];
}
