<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;

class ControllerAdmin extends Controller
{
  function __construct(){
    $this->middleware('auth',['except'=>['Admin']]);
  }
    public function Admin(){
        return view('usuario.admin');
    }
}
