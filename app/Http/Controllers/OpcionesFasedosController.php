<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OpcionesFasedosController extends Controller
{
    function show($id)
    {
    	$existe = DB::table('fasedos_option')->where('obras_publicas_id', $id)->pluck('id');
    	
    	if (count($existe) != 0)
    	{
            return \view('index', compact('id'))->with('proyecto', $id);
    	}
    	else
    	{
   	    	return view('index')->with('id',$id);
    	}

    	
    }
    function opcion(Request $request,$id)
    {

        return \view('fases.Dos', compact('id'))->with('proyecto', $id);

    }

}
