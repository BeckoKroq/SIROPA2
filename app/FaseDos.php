<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class FaseDos extends Model
{
    protected $table = 'fase_dos';

    protected $fillable =
        [
            'nombre_archivo_sub',
            'subidox',
            'archivo',
            'numero',
            'permiso_check',
            'aceptado',
            'path_file_pdf',
            'primera_carga',
            'nota',
            'fecha_lim',
            'obras_publicas_id'
        ];
}
