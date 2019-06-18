<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class RelacionProy extends Model
{
    //
    protected $table = 'RelacionProy';

    protected $fillable = ['proyecto_id','empresa_id'];

}
