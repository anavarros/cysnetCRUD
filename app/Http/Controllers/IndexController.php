<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function inicio():view {
        return view('index');
    }

    //Devuelve la vista general para elegir una opcion de vista
    function empleados() : view {
        return view('empleados/empleados');
    }

    //Devuelve la vista general para elegir una opcion de vista
    function departamentos() : view {
        return view('departamentos/departamentos');
    }

    //Devuelve la vista general para elegir una opcion de vista
    function departamentos_empleados() : view {
        return view('departamentos_empleados/departamentos_empleados');
    }
}
