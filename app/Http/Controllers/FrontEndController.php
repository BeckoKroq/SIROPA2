<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //controlador principal
    public function index()
    {
    	return view('web.index');
    }

    public function admin()
    {
    	return view('admin.index');
    }
}
