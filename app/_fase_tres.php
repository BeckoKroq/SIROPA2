<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class _fase_tres extends Model
{
    protected $table = '_fase_tres';

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
