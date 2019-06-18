<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;
use Siropa\Http\Requests\UserCreateRequest;
use Siropa\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\DB;
use Session;
use Siropa\Region;
use Siropa\Municipio;
use Siropa\User;
use RealRashid\SweetAlert\Facades\Alert;


class UsuarioController extends Controller
{
  function __construct(){
    $this->middleware(['auth', 'roles:Función Pública']);
  }

  public function getMunicipios(Request $request, $id){

    if($request->ajax()){
      $municipios=Municipio::muni($id);
      #dd($municipios);
      return response()->json($municipios);
    }
  }

    public function listing(){
        $municipios= \Siropa\Municipio::all();

        return response()->json(
            $municipios->toArray()
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return "estoy en el index";
        $users = User::search($request->nombre)->paginate(10);
        return view('usuario.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$municipios = \Siropa\Municipio::pluck('municipio','id');
        $regiones = Region::pluck('region','id');
        return view('usuario.create',compact('regiones'));
        //return view('usuario.create');
        //return "estoy en el create";
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
      $a=$request['region'];
      $b=$request['municipio'];
      echo $a.$b;

        \Siropa\User::create([
            'nombre'=>$request['nombre'],
            'clave_fun'=>$request['clave_fun'],
            'email'=>$request['email'],
            'password'=>bcrypt($request['password']),
            'telefono'=>$request['telefono'],
            'direccion'=>$request['direccion'],
            'region'=>$request['region'],
            'municipio'=>$request['municipio'],
            'puesto'=>$request['puesto'],
        ]);
        Session::flash('message','Usuario Creado Correctamente');
        return redirect('/usuario');
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
        $regiones = Region::pluck('region','id');
        $municipios = Municipio::pluck('municipio','id');
        $user = \Siropa\User::find($id);
        return view('usuario.edit',['user'=>$user],compact('regiones','municipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        //
        $user = \Siropa\User::find($id);
        $user -> fill($request->all());
        $user -> save();

        Session::flash('message','Usuario Modificado Correctamente');
        return Redirect('/usuario');

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
        \Siropa\User::destroy($id);

        Session::flash('message','Usuario Eliminado Correctamente');
        return Redirect('/usuario');
    }
}
