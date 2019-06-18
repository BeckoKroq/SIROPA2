<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;
use Zipper;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Siropa\Proyecto;


class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        ini_set('max_execution_time', 3000);
        $Path=public_path('Proyecto.zip');
        //dd($Path);
        \Zipper::make($Path)->extractTo('Downloads');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $path = DB::table('proyectos')->where('id','=',$id)->pluck('path_proyecto');
        //dd($path);
        $varpath=$path[0];
        $nombre = DB::table('proyectos')->where('id','=',$id)->pluck('nombre_proyecto');
        //return ($nombre);
        $nombreproy=$nombre[0];

        ini_set('max_execution_time', 3000);

        $files1 = glob(public_path($varpath.'/Fase1/*'));
        $files2 = glob(public_path($varpath.'/Fase2/*'));
        $files3 = glob(public_path($varpath.'/Fase3/*'));
        //dd($files1);
        if($files1==null){
            Alert::error('Error', 'El proyecto '.$nombre[0].' esta vacio');
            return redirect()->route('proyecto.show', [$id]);
        }

        \Zipper::make(public_path($nombreproy.'.zip'))->folder($nombreproy);
        \Zipper::make(public_path($nombreproy.'.zip'))->folder('/Fase1')->add($files1);
        \Zipper::make(public_path($nombreproy.'.zip'))->folder('/Fase2')->add($files2);
        \Zipper::make(public_path($nombreproy.'.zip'))->folder('/Fase3')->add($files3)->close();
        return response()->download(public_path($nombreproy.'.zip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $path = DB::table('adquisicions')->where('id','=',$id)->pluck('path_adquisicion');
        //dd($path);
        $varpath=$path[0];

        //return ($varpath);
        $nombre = DB::table('adquisicions')->where('id','=',$id)->pluck('nombre_adquisicion');
        //return ($nombre);
        $nombreproy=$nombre[0];

        ini_set('max_execution_time', 3000);

        $files1 = glob(public_path($varpath.'/Fase1/*'));
        $files2 = glob(public_path($varpath.'/Fase2/*'));
        $files3 = glob(public_path($varpath.'/Fase3/*'));
        //dd($files1);
        if($files1==null){
            Alert::error('Error', 'El proyecto '.$nombre[0].' esta vacio');
            return redirect()->route('adquisicion.show', [$id]);
        }

        \Zipper::make(public_path($nombreproy.'.zip'))->folder($nombreproy);
        \Zipper::make(public_path($nombreproy.'.zip'))->folder('/Fase1')->add($files1);
        \Zipper::make(public_path($nombreproy.'.zip'))->folder('/Fase2')->add($files2);
        \Zipper::make(public_path($nombreproy.'.zip'))->folder('/Fase3')->add($files3)->close();
        return response()->download(public_path($nombreproy.'.zip'));
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
