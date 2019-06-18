<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Siropa\Http\Requests\ProyectoCreateRequest;
use Filesystem;
use Session;
use Alert;
use Siropa\Region;
use Siropa\Municipio;
use Siropa\Proyecto;
use Siropa\Empresa;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
  function __construct(){
    $this->middleware(['auth', 'roles:Función Pública,Departamento de Economía,Obra Pública,Contralor']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->hasRoles(['Función Pública'])){
          $selection=Proyecto::search($request->nombre_proyecto)->paginate(10);
          //dd($selection);
        }
        else{
          $selection=Proyecto::search($request->nombre_proyecto)->paginate(10);
          //dd($selection);
          $selection=DB::table('proyectos')->where('municipios_id',auth()->user()->municipio)->paginate(10);
          //dd($selection);
        }


        return view('proyecto.index', compact('selection'));
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
        return view('proyecto.create',compact('municipios','regiones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyectoCreateRequest $request)
    {
        //
        $municipio = DB::table('municipios')->where('id',$request['municipio_id'])->pluck('municipio');
        $muni=$municipio[0];
        //dd($muni);

        $region = DB::table('regions')->where('id',$request['region'])->pluck('region');
        $reg=$region[0];
        //dd($reg);

        $PATH=public_path('Region'.'/'.$reg.'/'.$muni.'/'.'Obras Publicas');
        $path_proy=('Region'.'/'.$reg.'/'.$muni.'/'.'Obras Publicas');



        \Siropa\Proyecto::create([
            'nombre_proyecto'=>$request['nombre_proyecto'],
            'numero_proyecto'=>$request['numero_proyecto'],
            'region'=>$request['region'],
            'localidad'=>$request['localidad'],
            'direccion'=>$PATH,
            'municipios_id'=>$request['municipio_id'],
            'monto'=>$request['monto'],
            'modo_proyecto'=>$request['modalidad'],
            'path_proyecto'=>$path_proy.'/'.$request['nombre_proyecto'].$request['numero_proyecto'],
            'fecha_inicio'=>$request['fecha_inicio'],
            'fecha_fin'=>$request['fecha_fin'],

        ]);

        $municipio = DB::table('municipios')->where('id',$request['municipio_id'])->pluck('municipio');
        $muni=$municipio[0];

        $region = DB::table('regions')->where('id',$request['region'])->pluck('region');
        $reg=$region[0];

        $PATH=public_path('Region'.'/'.$reg.'/'.$muni.'/'.'Obras Publicas');
        $path1=$PATH.'/'.$request['nombre_proyecto'].$request['numero_proyecto'].'/'.'Fase1';
        $path2=$PATH.'/'.$request['nombre_proyecto'].$request['numero_proyecto'].'/'.'Fase2';
        $path3=$PATH.'/'.$request['nombre_proyecto'].$request['numero_proyecto'].'/'.'Fase3';
        $path4=$PATH.'/'.$request['nombre_proyecto'].$request['numero_proyecto'].'/'.'Fase3'.'/'.'Fotos';

        if (!File::exists($path1 )) {
            $resultado = File::makeDirectory($path1 , 0777, true);
        }
        if (!File::exists($path2 )) {
            $resultado = File::makeDirectory($path2 , 0777, true);
        }
        if (!File::exists($path3 )) {
            $resultado = File::makeDirectory($path3 , 0777, true);
        }
        if (!File::exists($path4 )) {
            $resultado = File::makeDirectory($path4 , 0777, true);
        }




        Session::flash('message','Proyecto Creado Correctamente');
        return redirect('/proyecto');
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
        $empresas=Empresa::pluck('razon_social','id');
        $municipios = \Siropa\Municipio::pluck('municipio','id');
        $proyecto = \Siropa\Proyecto::find($id);
        //dd($proyecto);
        return view('proyecto.show',['proyecto'=>$proyecto],compact('municipios','empresas'));
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
        $proyecto = \Siropa\Proyecto::find($id);
        $empresas=Empresa::pluck('razon_social','id');

        return view('proyecto.edit',['proyecto'=>$proyecto],compact('municipios','empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //return $request->all();
        $proyecto = Proyecto::find($id);
        $proyecto -> fill($request->all());
        $proyecto -> save();
        $proyecto->asignacionconst()->sync($request->empresas);
        //dd($proyecto);


        //Session::flash('message','Proyecto Modificado Correctamente');
        Alert::success('Success Message', 'Optional Title');
        return Redirect('/proyecto');
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
        \Siropa\Proyecto::destroy($id);

        Session::flash('message','Proyecto Eliminado Correctamente');
        return Redirect('/proyecto');
    }
}
