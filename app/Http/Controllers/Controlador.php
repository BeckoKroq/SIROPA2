<?php

namespace Siropa\Http\Controllers;

use Illuminate\Http\Request;

class Controlador extends Controller
{
    function index()
    {
    	return view('home');
    }

    function usuarios()
    {
    	return view('menu.usuarios');
    }

    function ato()
    {
    	return view('menu.atolinga');
    }

    function florencia()
    {
        return view('menu.florencia');
    }

    function mmx()
    {
    	return view('menu.momax');
    }

    function santa_maria()
    {
    	return view('menu.santa_maria');
    }

    function tepechitlan()
    {
        return view('menu.tepechitlan');
    }

    function teul()
    {
    	return view('menu.teul');
    }

    function tgo()
    {
    	return view('menu.tlaltenango');
    }

    function garcia()
    {
        return view('menu.garcia');
    }

    function funcion_publica()
    {
    	return view('menu.funcion_publica');
    }
    function SIROPA()
    {
        return view('menu.siropa');
    }


}
