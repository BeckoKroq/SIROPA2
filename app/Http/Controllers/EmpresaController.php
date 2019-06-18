<?php

namespace Siropa\Http\Controllers;
use Siropa\Http\Requests\CreateConstructoraRequest;
use Siropa\Empresa;
use Session;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empresas = Empresa::paginate(10);
        return view('empresa.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateConstructoraRequest $request)
    {
        //
        Empresa::create($request->all());

        Session::flash('message','Empresa Guardada');

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
        $empresa = Empresa::find($id);
        //dd($empresa);
        return view('empresa.edit',['empresa'=>$empresa]);
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
        $empresa = Empresa::find($id);
        $empresa -> fill($request->all());
        $empresa -> save();

        Session::flash('message','Empresa Modificada Correctamente');
        return Redirect('/constructora');
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
    }
}
