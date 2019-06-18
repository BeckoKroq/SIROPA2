<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Siropa\Evidencia;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    	$images=Evidencia::all();
        //dd($images);
    	return view('fases.viewsImg')->with('images',$images)->with('proyecto', $id);
    }

}
