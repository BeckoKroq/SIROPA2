<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    //
    protected $table = 'Conceptos';

    protected $fillable =
        [
            'obras_publicas_id',
            'clave',
            'conceptos_de_trabajo',
            'unidad_de_medida',
            'cantidad_o_volumen',
            'precio_unitario',
            'importe',
        ];
}
