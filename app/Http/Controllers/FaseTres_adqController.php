<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Filesystem;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Siropa\updatatresadq;
use Siropa\updataEdit;

class fasetres_adqController extends Controller
{
    function __construct(){
        $this->middleware(['auth', 'roles:Contralor,Obra Pública,Departamento de Economía']);
    }
    public function edit($id)
    {
        $items=\Siropa\conceptos_adq::all();
        if (auth()->user()->hasRoles(['Contralor']))
        {
            return view('fases_adq.tres', compact('items'))->with('adquisicion', $id);
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            return view('fases_adq.tresDepObr', compact('items'))->with('adquisicion', $id);
        }
    }

    public function _boto1(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 1)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb']!=null)
                {
                    $chec=1;
                }if ($request['checkb']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion1']!=null)
                {
                    $nota=$request['descripcion1'];
                }if ($request['fecha1']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 1,
                        'archivo'=>'Auxiliar de Obra Contable',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha1'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 1)->pluck('id');
                //dd($idn);
                if ($request['options1']!=null)
                {
                    $ace=$request['options1'];
                }
                $nota="None";
                if ($request['descripcion1']!=null)
                {
                    $nota=$request['descripcion1'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha1'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 1)->pluck('id');
            $archivo = $_FILES["archivo1"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo1"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo1"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo1"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo1"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo1"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo1"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto2(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 2)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb2']!=null)
                {
                    $chec=1;
                }if ($request['checkb2']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion2']!=null)
                {
                    $nota=$request['descripcion2'];
                }if ($request['fecha2']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 2,
                        'archivo'=>'Fianza de Cumplimiento',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha2'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 2)->pluck('id');
                if ($request['options2']!=null)
                {
                    $ace=$request['options2'];
                }
                $nota="None";
                if ($request['descripcion2']!=null)
                {
                    $nota=$request['descripcion2'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha2'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 2)->pluck('id');
            $archivo = $_FILES["archivo2"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo2"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo2"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo2"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo2"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo2"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo2"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto3(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 3)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb3']!=null)
                {
                    $chec=1;
                }if ($request['checkb3']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion3']!=null)
                {
                    $nota=$request['descripcion3'];
                }if ($request['fecha3']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 3,
                        'archivo'=>'Pólizas',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha3'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 3)->pluck('id');
                if ($request['options3']!=null)
                {
                    $ace=$request['options3'];
                }
                $nota="None";
                if ($request['descripcion3']!=null)
                {
                    $nota=$request['descripcion3'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha3'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 3)->pluck('id');
            $archivo = $_FILES["archivo3"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo3"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo3"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo3"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo3"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo3"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo3"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto4(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 4)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb4']!=null)
                {
                    $chec=1;
                }if ($request['checkb4']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion4']!=null)
                {
                    $nota=$request['descripcion4'];
                }if ($request['fecha4']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 4,
                        'archivo'=>'Facturas Listas de Raya Recibos Oficiales',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha4'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 4)->pluck('id');
                if ($request['options4']!=null)
                {
                    $ace=$request['options4'];
                }
                $nota="None";
                if ($request['descripcion4']!=null)
                {
                    $nota=$request['descripcion4'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha4'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 4)->pluck('id');
            $archivo = $_FILES["archivo4"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo4"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo4"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo4"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo4"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo4"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo4"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto5(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 5)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb5']!=null)
                {
                    $chec=1;
                }if ($request['checkb5']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion5']!=null)
                {
                    $nota=$request['descripcion5'];
                }if ($request['fecha5']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 5,
                        'archivo'=>'Estimaciones',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha5'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 5)->pluck('id');
                if ($request['options5']!=null)
                {
                    $ace=$request['options5'];
                }
                $nota="None";
                if ($request['descripcion5']!=null)
                {
                    $nota=$request['descripcion5'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha5'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 5)->pluck('id');
            $archivo = $_FILES["archivo5"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo5"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo5"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo5"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo5"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo5"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo5"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto6(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 6)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb6']!=null)
                {
                    $chec=1;
                }if ($request['checkb6']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion6']!=null)
                {
                    $nota=$request['descripcion6'];
                }if ($request['fecha6']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 6,
                        'archivo'=>'Generadores',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha6'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 6)->pluck('id');
                if ($request['options6']!=null)
                {
                    $ace=$request['options6'];
                }
                $nota="None";
                if ($request['descripcion6']!=null)
                {
                    $nota=$request['descripcion6'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha6'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 6)->pluck('id');
            $archivo = $_FILES["archivo6"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo6"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo6"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo6"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo6"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo6"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo6"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto7(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 7)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb7']!=null)
                {
                    $chec=1;
                }if ($request['checkb7']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion7']!=null)
                {
                    $nota=$request['descripcion7'];
                }if ($request['fecha7']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 7,
                        'archivo'=>'Bitácora de la Obra',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha7'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 7)->pluck('id');
                if ($request['options7']!=null)
                {
                    $ace=$request['options7'];
                }
                $nota="None";
                if ($request['descripcion7']!=null)
                {
                    $nota=$request['descripcion7'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha7'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 7)->pluck('id');
            $archivo = $_FILES["archivo7"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo7"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo7"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo7"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo7"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo7"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo7"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto8(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 8)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb8']!=null)
                {
                    $chec=1;
                }if ($request['checkb8']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion8']!=null)
                {
                    $nota=$request['descripcion8'];
                }if ($request['fecha8']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 8,
                        'archivo'=>'Reporte Fotográfico de Obra',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha8'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 8)->pluck('id');
                if ($request['options8']!=null)
                {
                    $ace=$request['options8'];
                }
                $nota="None";
                if ($request['descripcion8']!=null)
                {
                    $nota=$request['descripcion8'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha8'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 8)->pluck('id');
            $archivo = $_FILES["archivo8"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo8"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo8"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo8"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo8"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo8"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo8"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto9(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 9)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb9']!=null)
                {
                    $chec=1;
                }if ($request['checkb9']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion9']!=null)
                {
                    $nota=$request['descripcion9'];
                }if ($request['fecha9']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 9,
                        'archivo'=>'Pruebas de Laboratorio',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha9'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 9)->pluck('id');
                if ($request['options9']!=null)
                {
                    $ace=$request['options9'];
                }
                $nota="None";
                if ($request['descripcion9']!=null)
                {
                    $nota=$request['descripcion9'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha9'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 9)->pluck('id');
            $archivo = $_FILES["archivo9"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo9"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo9"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo9"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo9"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo9"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo9"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto10(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 10)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb10']!=null)
                {
                    $chec=1;
                }if ($request['checkb10']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion10']!=null)
                {
                    $nota=$request['descripcion10'];
                }if ($request['fecha10']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 10,
                        'archivo'=>'Acta Entrega Recepción',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha10'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 10)->pluck('id');
                if ($request['options10']!=null)
                {
                    $ace=$request['options10'];
                }
                $nota="None";
                if ($request['descripcion10']!=null)
                {
                    $nota=$request['descripcion10'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha10'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 10)->pluck('id');
            $archivo = $_FILES["archivo10"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo10"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo10"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo10"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo10"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo10"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo10"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto11(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 11)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb11']!=null)
                {
                    $chec=1;
                }if ($request['checkb11']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion11']!=null)
                {
                    $nota=$request['descripcion11'];
                }if ($request['fecha11']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 11,
                        'archivo'=>'Fianza de Vicios Ocultos',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha11'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 11)->pluck('id');
                if ($request['options11']!=null)
                {
                    $ace=$request['options11'];
                }
                $nota="None";
                if ($request['descripcion11']!=null)
                {
                    $nota=$request['descripcion11'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha11'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 11)->pluck('id');
            $archivo = $_FILES["archivo11"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo11"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo11"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo11"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo11"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo11"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo11"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto12(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 12)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb12']!=null)
                {
                    $chec=1;
                }if ($request['checkb12']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion12']!=null)
                {
                    $nota=$request['descripcion12'];
                }
                if ($request['fecha12']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 12,
                        'archivo'=>'Finiquito',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha12'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 12)->pluck('id');
                if ($request['options12']!=null)
                {
                    $ace=$request['options12'];
                }
                $nota="None";
                if ($request['descripcion12']!=null)
                {
                    $nota=$request['descripcion12'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha12'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 12)->pluck('id');
            $archivo = $_FILES["archivo12"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo12"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo12"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo12"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo12"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo12"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo12"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto13(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 13)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb13']!=null)
                {
                    $chec=1;
                }if ($request['checkb13']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion13']!=null)
                {
                    $nota=$request['descripcion13'];
                }if ($request['fecha13']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 13,
                        'archivo'=>'Documentos de Resición Administrativa del Contrato',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha13'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 13)->pluck('id');
                if ($request['options13']!=null)
                {
                    $ace=$request['options13'];
                }
                $nota="None";
                if ($request['descripcion13']!=null)
                {
                    $nota=$request['descripcion13'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha13'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 13)->pluck('id');
            $archivo = $_FILES["archivo13"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo13"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo13"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo13"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo13"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo13"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo13"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto14(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 14)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb14']!=null)
                {
                    $chec=1;
                }if ($request['checkb14']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion14']!=null)
                {
                    $nota=$request['descripcion14'];
                }if ($request['fecha14']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 14,
                        'archivo'=>'Tarjetas de Precio',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha14'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 14)->pluck('id');
                if ($request['options14']!=null)
                {
                    $ace=$request['options14'];
                }
                $nota="None";
                if ($request['descripcion14']!=null)
                {
                    $nota=$request['descripcion14'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha14'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 14)->pluck('id');
            $archivo = $_FILES["archivo14"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo14"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo14"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo14"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo14"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo14"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo14"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }

    public function _boto15(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        $existe = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 15)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb15']!=null)
                {
                    $chec=1;
                }if ($request['checkb15']==null){
                    Alert::warning('Alto', 'No ha seleccionado el archivo');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion15']!=null)
                {
                    $nota=$request['descripcion15'];
                }if ($request['fecha15']==null){
                    Alert::error('Error', 'Fecha de entrega vacia');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }else{
                    \Siropa\_fase_tres_adq::create([
                        'numero' => 15,
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha15'],
                        'adquisicion_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al adquisicion');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 15)->pluck('id');
                if ($request['options15']!=null)
                {
                    $ace=$request['options15'];
                }
                $nota="None";
                if ($request['descripcion15']!=null)
                {
                    $nota=$request['descripcion15'];
                }
                $apro = updatatresadq::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha15'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_tres_adq')->where('adquisicion_id', $id)->where('numero', 15)->pluck('id');
            $archivo = $_FILES["archivo15"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo15"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo15"]["type"]=="application/pdf"){
                move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo15"]["name"];
                rename($destino,$destino2);
                $pahtPDF = updatatresadq::find($idn[0]);
                $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo15"]["name"];
                $pahtPDF->aceptado=2;
                $pahtPDF->path_file_pdf = $destino2;
                $pahtPDF->subidox = $subido;
                $pahtPDF->save();
                Alert::success('Ok', 'Archivo Subido');
                return redirect()->route('fasetres_adq.edit', [$id]);
            }if(($request["archivo15"])==null){
            Alert::warning('Alto', 'Debe seleccionar un archivo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }elseif ($_FILES["archivo15"]["type"]!="application/pdf"){
            Alert::error('Error', 'Archivo erroneo');
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
        }
    }
    public function arch18($id){
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        if ($region_id[0]<10){
            $reg='0'.$region_id[0];
        }else{
            $reg=$region_id[0];
        }
        //archivo18
        $archivo = $_FILES["archivo18"]["tmp_name"];
        $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo18"]["name"];
        \Siropa\Evidencia::create([
                'numero' => 3,
                'path_file_pdf' => $destino,
                'adquisicion_id' => $id]
        );
        move_uploaded_file($archivo,$destino);
        $idn = DB::table('evidencia')->where('adquisicion_id', $id)->where('numero', 3)->pluck('id');
        $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
        $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo18"]["name"];
        rename($destino,$destino2);
        $pahtPDF = updataEdit::find($idn[0]);
        $pahtPDF->path_file_pdf = $destino2;
        $pahtPDF->save();
    }

    public function arch19($id){
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        if ($region_id[0]<10){
            $reg='0'.$region_id[0];
        }else{
            $reg=$region_id[0];
        }
        $archivo = $_FILES["archivo19"]["tmp_name"];
        $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo19"]["name"];
        \Siropa\Evidencia::create([
                'numero' => 4,
                'path_file_pdf' => $destino,
                'adquisicion_id' => $id]
        );
        move_uploaded_file($archivo,$destino);
        $idn = DB::table('evidencia')->where('adquisicion_id', $id)->where('numero', 4)->pluck('id');
        $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
        $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo19"]["name"];
        rename($destino,$destino2);
        $pahtPDF = updataEdit::find($idn[0]);
        $pahtPDF->path_file_pdf = $destino2;
        $pahtPDF->save();
    }

    public function arch21($id){
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');
        if ($region_id[0]<10){
            $reg='0'.$region_id[0];
        }else{
            $reg=$region_id[0];
        }
        $archivo = $_FILES["archivo21"]["tmp_name"];
        $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$_FILES["archivo21"]["name"];
        \Siropa\Evidencia::create([
                'numero' => 5,
                'path_file_pdf' => $destino,
                'adquisicion_id' => $id]
        );
        move_uploaded_file($archivo,$destino);
        $idn = DB::table('evidencia')->where('adquisicion_id', $id)->where('numero', 5)->pluck('id');
        //dd($idn);
        $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
        $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/".$fechaAct."-".$_FILES["archivo21"]["name"];
        rename($destino,$destino2);
        $pahtPDF = updataEdit::find($idn[0]);
        $pahtPDF->path_file_pdf = $destino2;
        $pahtPDF->save();
    }

    public function _boto16(Request $request,$id)
    {
        $municipio_id = DB::table('adquisicions')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('adquisicions')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('nombre_adquisicion');
        $numero_adquisicion = DB::table('adquisicions')->where('id', $id)->pluck('numero_adquisicion');

        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $num_archivo=count($_FILES["archivo16"]["name"]);
            $num_archivo2=count($_FILES["archivo17"]["name"]);
            if ($_FILES["archivo16"]["tmp_name"][0]!=""){
                if(($_FILES["archivo17"]["tmp_name"][0]!="") and ($num_archivo2==1)){
                    if($_FILES["archivo18"]["type"]=="application/pdf"){
                        if($_FILES["archivo19"]["type"]=="application/pdf"){
                            if($_FILES["archivo21"]["type"]=="application/pdf"){

                                $a21=$this->arch21($id);
                                $a19=$this->arch19($id);
                                $a18=$this->arch18($id);
                                //Archivo 17
                                for($i=0;$i<$num_archivo2;$i++){
                                    $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/"."Fotos"."/".$_FILES["archivo17"]["name"][$i];
                                    $archivo=$_FILES["archivo17"]["tmp_name"][$i];
                                    \Siropa\Evidencia::create([
                                            'numero' => 2,
                                            'path_file_pdf' => $destino,
                                            'adquisicion_id' => $id]
                                    );
                                    move_uploaded_file($archivo,$destino);
                                }

                                //evidencia de fotos
                                for($i=0;$i<$num_archivo;$i++){
                                    $destino = "Region"."/".$reg."/".$municipio[0]."/"."Adquisiciones"."/".$nombre_adquisicion[0].$numero_adquisicion[0]."/"."Fase3"."/"."Fotos"."/".$_FILES["archivo16"]["name"][$i];
                                    $archivo=$_FILES["archivo16"]["tmp_name"][$i];
                                    \Siropa\Evidencia::create([
                                            'numero' => 1,
                                            'path_file_pdf' => $destino,
                                            'adquisicion_id' => $id]
                                    );
                                    move_uploaded_file($archivo,$destino);
                                }
                                Alert::success('Ok', 'Evidencia Subida Correctamente');
                            }else{
                                Alert::error('Error', 'Formato Erroneo o seleccionar un PDF en Avance Fisico y Financiero');
                                return redirect()->route('fasetres_adq.edit', [$id]);
                            }
                        }else{
                            Alert::error('Error', 'Formato Erroneo o seleccionar un PDF en Generadores');
                            return redirect()->route('fasetres_adq.edit', [$id]);
                        }
                    }else{
                        Alert::error('Error', 'Formato Erroneo o seleccionar un PDF en Estimaciones');
                        return redirect()->route('fasetres_adq.edit', [$id]);
                    }
                }else {
                    Alert::warning('Alto', 'Debe seleccionar un Foto en Cheques ');
                    return redirect()->route('fasetres_adq.edit', [$id]);
                }
            }else{
                Alert::warning('Alto', 'Debe seleccionar unas Fotos en Reporte Fotográfico de Obra');
            }
            return redirect()->route('fasetres_adq.edit', [$id]);
        }
    }

    public function _boto20(Request $request,$id)
    {
        if (auth()->user()->hasRoles(['Contralor']))
        {
            return view('fases.Evidencia')->with('adquisicion', $id);
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            return view('fases.EvidenciaDepObr')->with('adquisicion', $id);
        }
    }
}
