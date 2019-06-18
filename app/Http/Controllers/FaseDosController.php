<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Filesystem;
use Session;
use Siropa\updataDos;
use RealRashid\SweetAlert\Facades\Alert;
use Siropa\Concepto;
use Excel;
use File;

class FaseDosController extends Controller
{
    public function edit($id)
    {
        if (auth()->user()->hasRoles(['Contralor']))
        {
            return view('fases.Dos')->with('proyecto', $id);
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            return view('fases.dosDepObr')->with('proyecto', $id);
        }
    }
   public function boton(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 1)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb']!=null)
                {
                    $chec=1;
                }if ($request['checkb']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('fasedos.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion1']!=null)
                {
                    $nota=$request['descripcion1'];
                }if ($request['fecha1']==null){
                  Alert::error('Error', 'Fecha de entrega vacia');
                 return redirect()->route('fasedos.edit', [$id]);
               }else{
                 \Siropa\FaseDos::create([
                     'numero' => 1,
                     'archivo'=>'Acuerdo Modalidad de Ejecución',
                     'permiso_check' => $chec,
                     'aceptado' => 2,
                     'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                     'nota' => $nota,
                     'fecha_lim' => $request['fecha1'],
                     'obras_publicas_id' => $id
                 ]);
                 Alert::success('Ok', 'Agregado al proyecto');
                 return redirect()->route('fasedos.edit', [$id]);
               }

            }else{
                $ace=2;
                $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 1)->pluck('id');
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
                $apro = updataDos::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha1'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasedos.edit', [$id]);
            }
            return redirect()->route('fasedos.edit', [$id]);
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 1)->pluck('id');
            $archivo = $_FILES["archivo1"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$_FILES["archivo1"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo1"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$fechaAct."-".$_FILES["archivo1"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updataDos::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo1"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('fasedos.edit', [$id]);
            }if(($request["archivo1"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('fasedos.edit', [$id]);
            }elseif ($_FILES["archivo1"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('fasedos.edit', [$id]);
            }
        }
    }

    public function boton2(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 2)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb2']!=null)
                {
                    $chec=1;
                }if ($request['checkb2']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('fasedos.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion2']!=null)
                {
                    $nota=$request['descripcion2'];
                }
                if ($request['fecha2']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('fasedos.edit', [$id]);
                }else{
                \Siropa\FaseDos::create([
                    'numero' => 2,
                    'archivo'=>'Bases de Licitación',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha2'],
                    'obras_publicas_id' => $id
                ]);
              }
            }else{
                $ace=2;
                $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 2)->pluck('id');
                if ($request['options2']!=null)
                {
                    $ace=$request['options2'];
                }
                $nota="None";
                if ($request['descripcion2']!=null)
                {
                    $nota=$request['descripcion2'];
                }
                $apro = updataDos::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha2'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasedos.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 2)->pluck('id');
            $archivo = $_FILES["archivo2"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$_FILES["archivo2"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo2"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$fechaAct."-".$_FILES["archivo2"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updataDos::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo2"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('fasedos.edit', [$id]);
            }if(($request["archivo2"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('fasedos.edit', [$id]);
            }elseif ($_FILES["archivo2"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('fasedos.edit', [$id]);
            }
        }
    }

    public function boton3(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 3)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb3']!=null)
                {
                    $chec=1;
                }if ($request['checkb3']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('fasedos.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion3']!=null)
                {
                    $nota=$request['descripcion3'];
                }if ($request['fecha3']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('fasedos.edit', [$id]);
                }else{
                \Siropa\FaseDos::create([
                    'numero' => 3,
                    'archivo'=>'Convocatoria',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha3'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('fasedos.edit', [$id]);
              }

            }else{
                $ace=2;
                $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 3)->pluck('id');
                if ($request['options3']!=null)
                {
                    $ace=$request['options3'];
                }
                $nota="None";
                if ($request['descripcion3']!=null)
                {
                    $nota=$request['descripcion3'];
                }
                $apro = updataDos::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha3'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasedos.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 3)->pluck('id');
            $archivo = $_FILES["archivo3"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$_FILES["archivo3"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo3"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$fechaAct."-".$_FILES["archivo3"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updataDos::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo3"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('fasedos.edit', [$id]);
            }if(($request["archivo3"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('fasedos.edit', [$id]);
            }elseif ($_FILES["archivo3"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('fasedos.edit', [$id]);
            }
        }
    }

   public function boton4(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 4)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb4']!=null)
                {
                    $chec=1;
                }if ($request['checkb4']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('fasedos.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion4']!=null)
                {
                    $nota=$request['descripcion4'];
                }if ($request['fecha4']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('fasedos.edit', [$id]);
                }else{
                \Siropa\FaseDos::create([
                    'numero' => 4,
                    'archivo'=>'	Junta de Aclaraciones',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha4'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('fasedos.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 4)->pluck('id');
                if ($request['options4']!=null)
                {
                    $ace=$request['options4'];
                }
                $nota="None";
                if ($request['descripcion4']!=null)
                {
                    $nota=$request['descripcion4'];
                }
                $apro = updataDos::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha4'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasedos.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 4)->pluck('id');
            $archivo = $_FILES["archivo4"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$_FILES["archivo4"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo4"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$fechaAct."-".$_FILES["archivo4"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updataDos::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo4"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('fasedos.edit', [$id]);
            }if(($request["archivo4"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('fasedos.edit', [$id]);
            }elseif ($_FILES["archivo4"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('fasedos.edit', [$id]);
            }
        }
    }

    public function boton5(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 5)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb5']!=null)
                {
                    $chec=1;
                }if ($request['checkb5']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('fasedos.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion5']!=null)
                {
                    $nota=$request['descripcion5'];
                }if ($request['fecha5']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('fasedos.edit', [$id]);
                }else{
                \Siropa\FaseDos::create([
                    'numero' => 5,
                    'archivo'=>'Oficio de Invitación',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha5'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('fasedos.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 5)->pluck('id');
                if ($request['options5']!=null)
                {
                    $ace=$request['options5'];
                }
                $nota="None";
                if ($request['descripcion5']!=null)
                {
                    $nota=$request['descripcion5'];
                }
                $apro = updataDos::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha5'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasedos.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 5)->pluck('id');
            $archivo = $_FILES["archivo5"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$_FILES["archivo5"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo5"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$fechaAct."-".$_FILES["archivo5"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updataDos::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo5"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('fasedos.edit', [$id]);
            }if(($request["archivo5"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('fasedos.edit', [$id]);
            }elseif ($_FILES["archivo5"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('fasedos.edit', [$id]);
            }
        }
    }

    public function boton6(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 6)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb6']!=null)
                {
                    $chec=1;
                }if ($request['checkb6']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('fasedos.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion6']!=null)
                {
                    $nota=$request['descripcion6'];
                }if ($request['fecha6']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('fasedos.edit', [$id]);
                }else{
                \Siropa\FaseDos::create([
                    'numero' => 6,
                    'archivo'=>'Acta de Apertura de Propuesta Económica y Técnica',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha6'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('fasedos.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 6)->pluck('id');
                if ($request['options6']!=null)
                {
                    $ace=$request['options6'];
                }
                $nota="None";
                if ($request['descripcion6']!=null)
                {
                    $nota=$request['descripcion6'];
                }
                $apro = updataDos::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha6'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasedos.edit', [$id]);
            }
            return redirect()->route('fasedos.edit', [$id]);
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 6)->pluck('id');
            $archivo = $_FILES["archivo6"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$_FILES["archivo6"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo6"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$fechaAct."-".$_FILES["archivo6"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updataDos::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo6"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('fasedos.edit', [$id]);
            }if(($request["archivo6"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('fasedos.edit', [$id]);
            }elseif ($_FILES["archivo6"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('fasedos.edit', [$id]);
            }
        }
    }

    public function boton7(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 7)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb7']!=null)
                {
                    $chec=1;
                }if ($request['checkb7']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('fasedos.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion7']!=null)
                {
                    $nota=$request['descripcion7'];
                }if ($request['fecha7']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('fasedos.edit', [$id]);
                }else{
                \Siropa\FaseDos::create([
                    'numero' => 7,
                    'archivo'=>'Dictamen y Fallo	',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha7'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('fasedos.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 7)->pluck('id');
                if ($request['options7']!=null)
                {
                    $ace=$request['options7'];
                }
                $nota="None";
                if ($request['descripcion7']!=null)
                {
                    $nota=$request['descripcion7'];
                }
                $apro = updataDos::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha7'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasedos.edit', [$id]);
            }
            return redirect()->route('fasedos.edit', [$id]);
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 7)->pluck('id');
            $archivo = $_FILES["archivo7"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$_FILES["archivo7"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo7"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$fechaAct."-".$_FILES["archivo7"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updataDos::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo7"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('fasedos.edit', [$id]);
            }if(($request["archivo7"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('fasedos.edit', [$id]);
            }elseif ($_FILES["archivo7"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('fasedos.edit', [$id]);
            }
        }
    }

    public function boton8(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 8)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb8']!=null)
                {
                    $chec=1;
                }if ($request['checkb8']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('fasedos.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion8']!=null)
                {
                    $nota=$request['descripcion8'];
                }if ($request['fecha8']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('fasedos.edit', [$id]);
                }else{
                \Siropa\FaseDos::create([
                    'numero' => 8,
                    'archivo'=>'Contrato',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha8'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('fasedos.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 8)->pluck('id');
                if ($request['options8']!=null)
                {
                    $ace=$request['options8'];
                }
                $nota="None";
                if ($request['descripcion8']!=null)
                {
                    $nota=$request['descripcion8'];
                }
                $apro = updataDos::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha8'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasedos.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 8)->pluck('id');
            $archivo = $_FILES["archivo8"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$_FILES["archivo8"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo8"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$fechaAct."-".$_FILES["archivo8"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updataDos::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo8"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('fasedos.edit', [$id]);
            }if(($request["archivo8"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('fasedos.edit', [$id]);
            }elseif ($_FILES["archivo8"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('fasedos.edit', [$id]);
            }
        }
    }

    public function boton9(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 9)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb9']!=null)
                {
                    $chec=1;
                }if ($request['checkb9']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('fasedos.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion9']!=null)
                {
                    $nota=$request['descripcion9'];
                }if ($request['fecha9']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('fasedos.edit', [$id]);
                }else{
                \Siropa\FaseDos::create([
                    'numero' => 9,
                    'archivo'=>'Catálogo de Conceptos Contratado',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha9'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('fasedos.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 9)->pluck('id');
                if ($request['options9']!=null)
                {
                    $ace=$request['options9'];
                }
                $nota="None";
                if ($request['descripcion9']!=null)
                {
                    $nota=$request['descripcion9'];
                }

                $apro = updataDos::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha9'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasedos.edit', [$id]);

            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 9)->pluck('id');
            if(($request["archivo9"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('fasedos.edit', [$id]);
            }else {
                $extension = File::extension($request->file('archivo9')->getClientOriginalName());
                if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                    $archivo = $_FILES["archivo9"]["tmp_name"];
                    if ($region_id[0]<10){
                        $reg='0'.$region_id[0];
                    }else{
                        $reg=$region_id[0];
                    }
                    $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$_FILES["archivo9"]["name"];
                    $subido = (auth()->user()->nombre);
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                        $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$fechaAct."-".$_FILES["archivo9"]["name"];
                        rename($destino,$destino2);
                        $pahtPDF = updataDos::find($idn[0]);
                        $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo9"]["name"];
                        $pahtPDF->aceptado=2;
                        $pahtPDF->path_file_pdf = $destino2;
                        $pahtPDF->subidox = $subido;
                        $pahtPDF->save();
                    //-------------------------------------
                    $data = Excel::load($destino2,function($reader){
                    })->get();
                    if (!empty($data)&&$data->count()){
                        $peli=DB::table('conceptos')->where('obras_publicas_id', $id)->delete();
                        foreach ($data->toArray() as $row) {
                            #dd($row);
                            $dataImported[] = [
                                'obras_publicas_id'=>$id,
                                'clave'=>$row['codigo_de_conceptos'],
                                'conceptos_de_trabajo'=>$row['conceptos_de_trabajo'],
                                'unidad_de_medida'=>$row['unidad_de_medida'],
                                'cantidad_o_volumen'=>$row['cantidad_o_volumen'],
                                'precio_unitario'=>$row['precio_unitario_pesos'],
                                'importe'=>$row['importe_pesos'],
                            ];
                        };
                    }
                    \Siropa\Concepto::insert($dataImported);
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('fasedos.edit', [$id]);
                }else{
                Alert::error('Error', 'Archivo erroneo');
                  return redirect()->route('fasedos.edit', [$id]);
                }
            }
        }
    }

    public function boton10(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 10)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb10']!=null)
                {
                    $chec=1;
                }if ($request['checkb10']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('fasedos.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion10']!=null)
                {
                    $nota=$request['descripcion10'];
                }if ($request['fecha10']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('fasedos.edit', [$id]);
                }else{
                    \Siropa\FaseDos::create([
                        'numero' => 10,
                        'archivo'=>'Programa de Ejecución de la Obra',
                        'permiso_check' => $chec,
                        'aceptado' => 2,
                        'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                        'nota' => $nota,
                        'fecha_lim' => $request['fecha10'],
                        'obras_publicas_id' => $id
                    ]);
                    Alert::success('Ok', 'Agregado al proyecto');
                    return redirect()->route('fasedos.edit', [$id]);
                }
            }else{
                $ace=2;
                $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 10)->pluck('id');
                if ($request['options10']!=null)
                {
                    $ace=$request['options10'];
                }
                $nota="None";
                if ($request['descripcion10']!=null)
                {
                    $nota=$request['descripcion10'];
                }
                $apro = updataDos::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha10'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasedos.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 10)->pluck('id');
            $archivo = $_FILES["archivo10"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$_FILES["archivo10"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo10"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$fechaAct."-".$_FILES["archivo10"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updataDos::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo10"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('fasedos.edit', [$id]);
            }if(($request["archivo10"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('fasedos.edit', [$id]);
            }elseif ($_FILES["archivo10"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('fasedos.edit', [$id]);
            }
        }
    }

    public function boton11(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 11)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb11']!=null)
                {
                    $chec=1;
                }if ($request['checkb11']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('fasedos.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion11']!=null)
                {
                    $nota=$request['descripcion11'];
                }if ($request['fecha11']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('fasedos.edit', [$id]);
                }else{
                \Siropa\FaseDos::create([
                    'numero' => 11,
                    'archivo'=>'Convenio de Apelación de Contrato',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha11'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('fasedos.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 11)->pluck('id');
                if ($request['options11']!=null)
                {
                    $ace=$request['options11'];
                }
                $nota="None";
                if ($request['descripcion11']!=null)
                {
                    $nota=$request['descripcion11'];
                }
                $apro = updataDos::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha11'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('fasedos.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('fase_dos')->where('obras_publicas_id', $id)->where('numero', 11)->pluck('id');
            $archivo = $_FILES["archivo11"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$_FILES["archivo11"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo11"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase2"."/".$fechaAct."-".$_FILES["archivo11"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updataDos::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo11"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('fasedos.edit', [$id]);
            }if(($request["archivo11"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('fasedos.edit', [$id]);
            }elseif ($_FILES["archivo11"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('fasedos.edit', [$id]);
            }
        }
    }
}
