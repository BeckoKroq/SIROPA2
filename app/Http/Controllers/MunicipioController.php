<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;

use Siropa\Http\Requests;
use Siropa\Http\Requests\MunicipioCreateRequest;
use Siropa\Http\Controllers\Controller;
use Siropa\Municipio;
use Illuminate\Routing\Route;
use Session;
use Illuminate\Support\Facades\File;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing(){
        $municipios= \Siropa\Municipio::all();

        return response()->json(
            $municipios->toArray()
        );
    }

    public function index()
    {
        //return('a webo puto');
        $municipios=\Siropa\Municipio::paginate(5);
        return view('municipio.index',compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('municipio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicipioCreateRequest $request)
    {
        //
            \Siropa\Municipio::create([
            'municipio'=>$request['municipio'],
            ]);
            Session::flash('message','Municipio Creado Correctamente');
            $path=public_path($request['municipio']);
            File::makeDirectory($path, $mode =007,true);
            return redirect('/municipio');
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
        $municipio = \Siropa\Municipio::find($id);
        return view('municipio.edit',['municipio'=>$municipio]);
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
        $municipio = \Siropa\Municipio::find($id);
        $municipio -> fill($request->all());
        $municipio -> save();

        Session::flash('message','Municipio Modificado Correctamente');
        return Redirect('/municipio');
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
        \Siropa\Municipio::destroy($id);

        Session::flash('message','Municipio Eliminado Correctamente');
        return Redirect('/municipio');
    }
}
