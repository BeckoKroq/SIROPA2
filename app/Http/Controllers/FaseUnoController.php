<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Filesystem;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Siropa\updata;

class FaseUnoController extends Controller
{
    public function edit($id)
    {
        if (auth()->user()->hasRoles(['Contralor']))
        {
            return view('fases.uno')->with('proyecto', $id);
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            return view('fases.unoDepObr')->with('proyecto', $id);
        }
    }
    public function boton1(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 1)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb']!=null)
                {
                    $chec=1;
                }if ($request['checkb']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion1']!=null)
                {
                    $nota=$request['descripcion1'];
                }if ($request['fecha1']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                  \Siropa\_fase_uno::create([
                      'numero' => 1,
                      'archivo'=>'Oficio de Aprobación con Anexos Técnicos',
                      'permiso_check' => $chec,
                      'aceptado' => 2,
                      'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                      'nota' => $nota,
                      'fecha_lim' => $request['fecha1'],
                      'obras_publicas_id' => $id
                  ]);
                  Alert::success('Ok', 'Agregado al proyecto');
                  return redirect()->route('faseuno.edit', [$id]);
                }

            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 1)->pluck('id');
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
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha1'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 1)->pluck('id');
            $archivo = $_FILES["archivo1"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo1"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo1"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo1"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo1"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo1"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo1"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
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
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 2)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb2']!=null)
                {
                    $chec=1;
                }if ($request['checkb2']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion2']!=null)
                {
                    $nota=$request['descripcion2'];
                }if ($request['fecha2']==null){
                  Alert::error('Error', 'Fecha de entrega vacia');
                 return redirect()->route('faseuno.edit', [$id]);
               }else{
                 \Siropa\_fase_uno::create([
                     'numero' => 2,
                     'archivo'=>'Cédula de Información Básica',
                     'permiso_check' => $chec,
                     'aceptado' => 2,
                     'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                     'nota' => $nota,
                     'fecha_lim' => $request['fecha2'],
                     'obras_publicas_id' => $id
                 ]);
                 Alert::success('Ok', 'Agregado al proyecto');
                 return redirect()->route('faseuno.edit', [$id]);
               }

            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 2)->pluck('id');
                if ($request['options2']!=null)
                {
                    $ace=$request['options2'];
                }
                $nota="None";
                if ($request['descripcion2']!=null)
                {
                    $nota=$request['descripcion2'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha2'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 2)->pluck('id');
            $archivo = $_FILES["archivo2"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo2"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo2"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo2"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo2"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo2"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo2"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
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
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 3)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb3']!=null)
                {
                    $chec=1;
                }if ($request['checkb3']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion3']!=null)
                {
                    $nota=$request['descripcion3'];
                }if ($request['fecha3']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                  \Siropa\_fase_uno::create([
                      'numero' => 3,
                      'archivo'=>'Catálogo de Conceptos Preliminares',
                      'permiso_check' => $chec,
                      'aceptado' => 2,
                      'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                      'nota' => $nota,
                      'fecha_lim' => $request['fecha3'],
                      'obras_publicas_id' => $id
                  ]);
                  Alert::success('Ok', 'Agregado al proyecto');
                  return redirect()->route('faseuno.edit', [$id]);
                }

            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 3)->pluck('id');
                if ($request['options3']!=null)
                {
                    $ace=$request['options3'];
                }
                $nota="None";
                if ($request['descripcion3']!=null)
                {
                    $nota=$request['descripcion3'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha3'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 3)->pluck('id');
            $archivo = $_FILES["archivo3"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo3"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo3"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                    $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo3"]["name"];
                    rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo3"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo3"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo3"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
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
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 4)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb4']!=null)
                {
                    $chec=1;
                }if ($request['checkb4']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion4']!=null)
                {
                    $nota=$request['descripcion4'];
                }if ($request['fecha4']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 4,
                    'archivo'=>'Calendarización Preliminar',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha4'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 4)->pluck('id');
                if ($request['options4']!=null)
                {
                    $ace=$request['options4'];
                }
                $nota="None";
                if ($request['descripcion4']!=null)
                {
                    $nota=$request['descripcion4'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha4'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 4)->pluck('id');
            $archivo = $_FILES["archivo4"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo4"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo4"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo4"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo4"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo4"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo4"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
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
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 5)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb5']!=null)
                {
                    $chec=1;
                }if ($request['checkb5']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion5']!=null)
                {
                    $nota=$request['descripcion5'];
                }if ($request['fecha5']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 5,
                    'archivo'=>'Validación y Dictamen de Factibilidad',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha5'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 5)->pluck('id');
                if ($request['options5']!=null)
                {
                    $ace=$request['options5'];
                }
                $nota="None";
                if ($request['descripcion5']!=null)
                {
                    $nota=$request['descripcion5'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha5'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 5)->pluck('id');
            $archivo = $_FILES["archivo5"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo5"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo5"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo5"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo5"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo5"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo5"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
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
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 6)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb6']!=null)
                {
                    $chec=1;
                }if ($request['checkb6']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion6']!=null)
                {
                    $nota=$request['descripcion6'];
                }if ($request['fecha6']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 6,
                    'archivo'=>'Croquis de Localización de la Obra',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha6'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 6)->pluck('id');
                if ($request['options6']!=null)
                {
                    $ace=$request['options6'];
                }
                $nota="None";
                if ($request['descripcion6']!=null)
                {
                    $nota=$request['descripcion6'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha6'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 6)->pluck('id');
            $archivo = $_FILES["archivo6"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo6"]["name"];
            if($_FILES["archivo6"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo6"]["name"];
                rename($destino,$destino2);
                $subido = (auth()->user()->nombre);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo6"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo6"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo6"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
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
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 7)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb7']!=null)
                {
                    $chec=1;
                }if ($request['checkb7']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion7']!=null)
                {
                    $nota=$request['descripcion7'];
                }if ($request['fecha7']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 7,
                    'archivo'=>'Proyecto de la Obra',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha7'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 7)->pluck('id');
                if ($request['options7']!=null)
                {
                    $ace=$request['options7'];
                }
                $nota="None";
                if ($request['descripcion7']!=null)
                {
                    $nota=$request['descripcion7'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha7'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 7)->pluck('id');
            $archivo = $_FILES["archivo7"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo7"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo7"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo7"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo7"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo7"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo7"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
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
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 8)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb8']!=null)
                {
                    $chec=1;
                }if ($request['checkb8']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion8']!=null)
                {
                    $nota=$request['descripcion8'];
                }if ($request['fecha8']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 8,
                    'archivo'=>'Permiso de la Obra',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha8'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 8)->pluck('id');
                if ($request['options8']!=null)
                {
                    $ace=$request['options8'];
                }
                $nota="None";
                if ($request['descripcion8']!=null)
                {
                    $nota=$request['descripcion8'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha8'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 8)->pluck('id');
            $archivo = $_FILES["archivo8"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo8"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo8"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo8"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo8"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo8"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo8"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
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
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 9)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb9']!=null)
                {
                    $chec=1;
                }if ($request['checkb9']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion9']!=null)
                {
                    $nota=$request['descripcion9'];
                }if ($request['fecha9']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 9,
                    'archivo'=>'Acta de Aceptación de Comunidad o Beneficiarios',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha9'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 9)->pluck('id');
                if ($request['options9']!=null)
                {
                    $ace=$request['options9'];
                }
                $nota="None";
                if ($request['descripcion9']!=null)
                {
                    $nota=$request['descripcion9'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha9'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 9)->pluck('id');
            $archivo = $_FILES["archivo9"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo9"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo9"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo9"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo9"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo9"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo9"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
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
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 10)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb10']!=null)
                {
                    $chec=1;
                }if ($request['checkb10']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion10']!=null)
                {
                    $nota=$request['descripcion10'];
                }if ($request['fecha10']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 10,
                    'archivo'=>'Acta Constitutiva de Comité',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha10'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 10)->pluck('id');
                if ($request['options10']!=null)
                {
                    $ace=$request['options10'];
                }
                $nota="None";
                if ($request['descripcion10']!=null)
                {
                    $nota=$request['descripcion10'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha10'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 10)->pluck('id');
            $archivo = $_FILES["archivo10"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo10"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo10"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo10"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo10"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo10"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo10"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
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
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 11)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb11']!=null)
                {
                    $chec=1;
                }if ($request['checkb11']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion11']!=null)
                {
                    $nota=$request['descripcion11'];
                }if ($request['fecha11']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 11,
                    'archivo'=>'Registro de Asistencia de Comité',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha11'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 11)->pluck('id');
                if ($request['options11']!=null)
                {
                    $ace=$request['options11'];
                }
                $nota="None";
                if ($request['descripcion11']!=null)
                {
                    $nota=$request['descripcion11'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha11'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 11)->pluck('id');
            $archivo = $_FILES["archivo11"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo11"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo11"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo11"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo11"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo11"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo11"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
            }
        }
    }

    public function boton12(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 12)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb12']!=null)
                {
                    $chec=1;
                }if ($request['checkb12']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion12']!=null)
                {
                    $nota=$request['descripcion12'];
                }if ($request['fecha12']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 12,
                    'archivo'=>'Acta de Aceptación de la Obra',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha12'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 12)->pluck('id');
                if ($request['options12']!=null)
                {
                    $ace=$request['options12'];
                }
                $nota="None";
                if ($request['descripcion12']!=null)
                {
                    $nota=$request['descripcion12'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha12'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 12)->pluck('id');
            $archivo = $_FILES["archivo12"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo12"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo12"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo12"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo12"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo12"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo12"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
            }
        }
    }

    public function boton13(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 13)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb13']!=null)
                {
                    $chec=1;
                }if ($request['checkb13']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion13']!=null)
                {
                    $nota=$request['descripcion13'];
                }if ($request['fecha13']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 13,
                    'archivo'=>'Proyecto Ejecutivo',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha13'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 13)->pluck('id');
                if ($request['options13']!=null)
                {
                    $ace=$request['options13'];
                }
                $nota="None";
                if ($request['descripcion13']!=null)
                {
                    $nota=$request['descripcion13'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha13'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 13)->pluck('id');
            $archivo = $_FILES["archivo13"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo13"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo13"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo13"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo13"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo13"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo13"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
            }
        }
    }

    public function boton14(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 14)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb14']!=null)
                {
                    $chec=1;
                }if ($request['checkb14']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion14']!=null)
                {
                    $nota=$request['descripcion14'];
                }if ($request['fecha14']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 14,
                    'archivo'=>'Presupuesto Base',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha14'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 14)->pluck('id');
                if ($request['options14']!=null)
                {
                    $ace=$request['options14'];
                }
                $nota="None";
                if ($request['descripcion14']!=null)
                {
                    $nota=$request['descripcion14'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha14'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 14)->pluck('id');
            $archivo = $_FILES["archivo14"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo14"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo14"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo14"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo14"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo14"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo14"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
            }
        }
    }

    public function boton15(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 15)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb15']!=null)
                {
                    $chec=1;
                }if ($request['checkb15']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion15']!=null)
                {
                    $nota=$request['descripcion15'];
                }if ($request['fecha15']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 15,
                    'archivo'=>'Estudios de Mecánica de Suelos',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha15'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 15)->pluck('id');
                if ($request['options15']!=null)
                {
                    $ace=$request['options15'];
                }
                $nota="None";
                if ($request['descripcion15']!=null)
                {
                    $nota=$request['descripcion15'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha15'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 15)->pluck('id');
            $archivo = $_FILES["archivo15"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo15"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo15"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo15"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo15"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo15"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo15"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
            }
        }
    }

    public function boton16(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 16)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb16']!=null)
                {
                    $chec=1;
                }if ($request['checkb16']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion16']!=null)
                {
                    $nota=$request['descripcion16'];
                }if ($request['fecha16']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 16,
                    'archivo'=>'Impacto Ambiental',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha16'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 16)->pluck('id');
                if ($request['options16']!=null)
                {
                    $ace=$request['options16'];
                }
                $nota="None";
                if ($request['descripcion16']!=null)
                {
                    $nota=$request['descripcion16'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha16'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 16)->pluck('id');
            $archivo = $_FILES["archivo16"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo16"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo16"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo16"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo16"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo16"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo16"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
            }
        }
    }

    public function boton17(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 17)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb17']!=null)
                {
                    $chec=1;
                }if ($request['checkb17']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion17']!=null)
                {
                    $nota=$request['descripcion17'];
                }if ($request['fecha17']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 17,
                    'archivo'=>'Uso de Suelo',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha17'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 17)->pluck('id');
                if ($request['options17']!=null)
                {
                    $ace=$request['options17'];
                }
                $nota="None";
                if ($request['descripcion17']!=null)
                {
                    $nota=$request['descripcion17'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha17'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 17)->pluck('id');
            $archivo = $_FILES["archivo17"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo17"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo17"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo17"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo17"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo17"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo17"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
            }
        }
    }

    public function boton18(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 18)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb18']!=null)
                {
                    $chec=1;
                }if ($request['checkb18']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion18']!=null)
                {
                    $nota=$request['descripcion18'];
                }if ($request['fecha18']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 18,
                    'archivo'=>'Permisos y Licencia',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha18'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 18)->pluck('id');
                if ($request['options18']!=null)
                {
                    $ace=$request['options18'];
                }
                $nota="None";
                if ($request['descripcion18']!=null)
                {
                    $nota=$request['descripcion18'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha18'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 18)->pluck('id');
            $archivo = $_FILES["archivo18"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo18"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo18"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo18"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo18"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo18"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo18"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
            }
        }
    }

    public function boton19(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 19)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb19']!=null)
                {
                    $chec=1;
                }if ($request['checkb19']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion19']!=null)
                {
                    $nota=$request['descripcion19'];
                }if ($request['fecha19']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 19,
                    'archivo'=>'Tenencia de la Tierra',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha19'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 19)->pluck('id');
                if ($request['options19']!=null)
                {
                    $ace=$request['options19'];
                }
                $nota="None";
                if ($request['descripcion19']!=null)
                {
                    $nota=$request['descripcion19'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha19'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 19)->pluck('id');
            $archivo = $_FILES["archivo19"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo19"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo19"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo19"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo19"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo19"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo19"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
            }
        }
    }

    public function boton20(Request $request,$id)
    {
        $municipio_id = DB::table('proyectos')->where('id', $id)->pluck('municipios_id');
        $municipio = DB::table('municipios')->where('id', $municipio_id)->pluck('municipio');
        $region_id = DB::table('proyectos')->where('id', $id)->pluck('region');
        $region = DB::table('regions')->where('id', $region_id)->pluck('region');
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->pluck('nombre_proyecto');
        $numero_proyecto = DB::table('proyectos')->where('id', $id)->pluck('numero_proyecto');
        $existe = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 20)->pluck('id');

        if (auth()->user()->hasRoles(['Contralor']))
        {
            if(count($existe)==0){
                $chec=0;
                if ($request['checkb20']!=null)
                {
                    $chec=1;
                }if ($request['checkb20']==null){
                  Alert::warning('Alto', 'No ha seleccionado el archivo');
                 return redirect()->route('faseuno.edit', [$id]);
                }

                $nota="None";
                if ($request['descripcion20']!=null)
                {
                    $nota=$request['descripcion20'];
                }if ($request['fecha20']==null){
                   Alert::error('Error', 'Fecha de entrega vacia');
                  return redirect()->route('faseuno.edit', [$id]);
                }else{
                \Siropa\_fase_uno::create([
                    'numero' => 20,
                    'archivo'=>'Convenio de Colaboración',
                    'permiso_check' => $chec,
                    'aceptado' => 2,
                    'primera_carga' => date("Y"). "-" . date("m")."-".date("d"),
                    'nota' => $nota,
                    'fecha_lim' => $request['fecha20'],
                    'obras_publicas_id' => $id
                ]);
                Alert::success('Ok', 'Agregado al proyecto');
                return redirect()->route('faseuno.edit', [$id]);
              }
            }else{
                $ace=2;
                $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 20)->pluck('id');
                if ($request['options20']!=null)
                {
                    $ace=$request['options20'];
                }
                $nota="None";
                if ($request['descripcion20']!=null)
                {
                    $nota=$request['descripcion20'];
                }
                $apro = updata::find($idn[0]);
                $apro->aceptado = $ace;
                $apro->nota = $nota;
                $apro->fecha_lim = $request['fecha20'];
                $apro->save();
                Alert::success('Ok', 'Datos guardados');
                return redirect()->route('faseuno.edit', [$id]);
            }
        }
        if (auth()->user()->hasRoles(['Obra Pública','Departamento de Economía']))
        {
            $idn = DB::table('_fase_uno')->where('obras_publicas_id', $id)->where('numero', 20)->pluck('id');
            $archivo = $_FILES["archivo20"]["tmp_name"];
            if ($region_id[0]<10){
                $reg='0'.$region_id[0];
            }else{
                $reg=$region_id[0];
            }
            $destino = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$_FILES["archivo20"]["name"];
            $subido = (auth()->user()->nombre);
            if($_FILES["archivo20"]["type"]=="application/pdf"){
                    move_uploaded_file($archivo,$destino);
                $fechaAct=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $destino2 = "Region"."/".$reg."/".$municipio[0]."/"."Obras Publicas"."/".$nombre_proyecto[0].$numero_proyecto[0]."/"."Fase1"."/".$fechaAct."-".$_FILES["archivo20"]["name"];
                rename($destino,$destino2);
                    $pahtPDF = updata::find($idn[0]);
                    $pahtPDF->nombre_archivo_sub=$fechaAct."-".$_FILES["archivo20"]["name"];
                    $pahtPDF->aceptado=2;
                    $pahtPDF->path_file_pdf = $destino2;
                    $pahtPDF->subidox = $subido;
                    $pahtPDF->save();
                    Alert::success('Ok', 'Archivo Subido');
                    return redirect()->route('faseuno.edit', [$id]);
            }if(($request["archivo20"])==null){
              Alert::warning('Alto', 'Debe seleccionar un archivo');
              return redirect()->route('faseuno.edit', [$id]);
            }elseif ($_FILES["archivo20"]["type"]!="application/pdf"){
              Alert::error('Error', 'Archivo erroneo');
              return redirect()->route('faseuno.edit', [$id]);
            }
        }
    }
}
