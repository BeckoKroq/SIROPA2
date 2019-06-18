<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class relation_fase_uno extends Model
{
    //
    protected $table = 'carga_file_op';

    protected $fillable =
        [
            'obras_publicas_id',
            'fase_uno_id',
            
        ];
}
