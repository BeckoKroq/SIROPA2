<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Siropa\Http\Requests\AdquisicionCreateRequest;
use Filesystem;
use Session;
use Siropa\Region;
use Siropa\Adquisicion;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AdquisicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if (auth()->user()->hasRoles(['Función Pública'])){
        $selection=Adquisicion::search($request->nombre_adquisicion)->paginate(10);
      }
      else{
        $adquisicion = Adquisicion::paginate(10);
        $selection = DB::table('adquisicions')->where('municipios_id',auth()->user()->municipio)->paginate(10);
      }
        return view('adquisicion.index', compact('selection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        //
        $municipios = \Siropa\Municipio::pluck('municipio','id');
        $regiones = \Siropa\Region::pluck('region','id');
        return view('adquisicion.create',compact('municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdquisicionCreateRequest $request)
    {
        //
        $municipio = DB::table('municipios')->where('id',$request['municipio_id'])->pluck('municipio');
        $muni=$municipio[0];
        //dd($muni);

        $region = DB::table('regions')->where('id',$request['region'])->pluck('region');
        $reg=$region[0];
        //dd($reg);

        $PATH=public_path('Region'.'/'.$reg.'/'.$muni.'/'.'Adquisiciones');
        $path_proy=('Region'.'/'.$reg.'/'.$muni.'/'.'Adquisiciones');

        \Siropa\Adquisicion::create([
            'nombre_adquisicion'=>$request['nombre_adquisicion'],
            'numero_adquisicion'=>$request['numero_adquisicion'],
            'region'=>$request['region'],
            'localidad'=>$request['localidad'],
            'municipios_id'=>$request['municipio_id'],
            'fecha_inicio'=>$request['fecha_inicio'],
            'fecha_fin'=>$request['fecha_fin'],
            'monto'=>$request['monto'],
            'modo_adquisicion'=>$request['modalidad'],
            'path_adquisicion'=>$path_proy.'/'.$request['nombre_adquisicion'].$request['numero_adquisicion'],

        ]);
        $municipio = DB::table('municipios')->where('id',$request['municipio_id'])->pluck('municipio');
        $muni=$municipio[0];

        $region = DB::table('regions')->where('id',$request['region'])->pluck('region');
        $reg=$region[0];

        $PATH=public_path('Region'.'/'.$reg.'/'.$muni.'/'.'Adquisiciones');
        $path1=$PATH.'/'.$request['nombre_adquisicion'].$request['numero_adquisicion'].'/'.'Fase1';
        $path2=$PATH.'/'.$request['nombre_adquisicion'].$request['numero_adquisicion'].'/'.'Fase2';
        $path3=$PATH.'/'.$request['nombre_adquisicion'].$request['numero_adquisicion'].'/'.'Fase3';

        if (!File::exists($path1 )) {
            $resultado = File::makeDirectory($path1 , 0777, true);
        }
        if (!File::exists($path2 )) {
            $resultado = File::makeDirectory($path2 , 0777, true);
        }
        if (!File::exists($path3 )) {
            $resultado = File::makeDirectory($path3 , 0777, true);
        }
        Session::flash('message','Adquisición Creada Correctamente');
        return redirect('/adquisicion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $municipios = \Siropa\Municipio::pluck('municipio','id');
        $adquisicion = \Siropa\Adquisicion::find($id);
        return view('adquisicion.show',['adquisicion'=>$adquisicion],compact('municipios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $adquisicion = \Siropa\Adquisicion::find($id);
        return view('adquisicion.edit',['adquisicion'=>$adquisicion],compact('municipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdquisicionCreateRequest $request, $id)
    {
        //
        $adquisicion = \Siropa\Adquisicion::find($id);
        $adquisicion -> fill($request->all());
        $adquisicion -> save();

        Session::flash('message','Adquisicion Modificada Correctamente');
        return Redirect('/adquisicion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        \Siropa\Adquisicion::destroy($id);

        Session::flash('message','Adquisicion Eliminada Correctamente');
        return Redirect('/adquisicion');
    }
}
