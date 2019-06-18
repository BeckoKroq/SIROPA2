<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class fasedos_opcion extends Model
{
    protected $table = 'fasedos_option';

    protected $fillable =
        [
            'obras_publicas_id',
            'opcion',
            'monto'
        ];
}