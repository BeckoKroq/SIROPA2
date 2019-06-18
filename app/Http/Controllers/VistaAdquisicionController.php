<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;

class VistaAdquisicionController extends Controller
{
    public function index()
    {
        //

    }

    public function pdf( $request,$id){
        return 'ok';
    }
    public function edit($id)
    {
        //
        $municipios = \Siropa\Municipio::pluck('municipio','id');
        $adquisicion = \Siropa\Adquisicion::find($id);
        return view('VistaAdquisicion.edit',['adquisicion'=>$adquisicion],compact('municipios'));
    }
}
