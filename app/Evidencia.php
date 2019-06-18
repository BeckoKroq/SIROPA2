<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    protected $table = 'evidencia';

    protected $fillable =
        [
            'numero',
            'path_file_pdf',
            'obras_publicas_id' 
        ];
}
