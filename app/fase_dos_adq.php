<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class fase_dos_adq extends Model
{
    protected $table = 'fase_dos_adq';

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
            'adquisicion_id'
        ];
}
