<?php

namespace Siropa;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //
    protected $table = 'Municipios';
    protected $fillable = ['municipio','region_id'];

    public static function muni($id){
      #return 'negro joto';
      return Municipio::where('region_id','=',$id)->get();
    }
}
