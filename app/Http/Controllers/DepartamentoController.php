<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\View\View;

class DepartamentoController extends Controller
{
    
    /*
     * Funciones de vistas de empleados 
     */

    //Devuelve la vista general para elegir una opcion de vista
    function departamentos() : view {
        return view('departamentos/departamentos');
    }

    //Devuelve la vista para poder ver todos los empleados
    function ver_departamentos() : view {
        return view('departamentos/ver_departamentos');
    }
    //Devuelve la vista para poder ver todos los empleados
    function ver_departamento() : view {
        return view('departamentos/ver_departamento');
    }
    //Devuelve la vista para poder ver todos los empleados
    function crear_departamento() : view {
        return view('departamentos/crear_departamento');
    }
    //Devuelve la vista para poder ver todos los empleados
    function editar_departamento() : view {
        return view('departamentos/editar_departamento');
    }
    //Devuelve la vista para poder ver todos los empleados
    function eliminar_departamento() : view {
        return view('departamentos/eliminar_departamento');
    }

    //Metodo que devuelve todos los empleados
    static function  getDepartamentos() {
        $client = new Client();
        $request = $client->get('http://20.111.13.103:52773/dhForms/form/objects/cysnet.demoHis.data.Departamento/all', ['auth' => ['APIRest','2akhwm8LK9fyyCx6LhEk']]);
        $response = $request->getBody();
        return $response;
    }

    //Metodo que devuelve un empleado, exactamente el 14 debido a que node.js no funciona
    function getDepartamento($id) {
        $client = new Client();
        $url = 'http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.Departamento/'.$id;
        $request = $client->get($url, ['auth' => ['APIRest','2akhwm8LK9fyyCx6LhEk']]);
        $response = $request->getBody();
        return $response;
    }

    //Funcion para crear un empleado
    function setDepartamento($nombre, $codCentro = "", $fechaInicio, $fechaFin = "") {

        $response = Http::withBasicAuth('APIRest','2akhwm8LK9fyyCx6LhEk')->post("http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.Departamento",
            [
                'nombre' => $nombre,
                'codCentro' => (int)$codCentro,
                'fechaInicio' => $fechaInicio,
                'fechaFin' => $fechaFin
            ]
        ); 

        if(strpos($response->getBody(),'KeyNotUnique') == true) {
            return "El departamento no se ha podido crear ya que la clave unica ya esta en uso";
        }
        return "El departamento ".$response->getBody()." se ha creado correctamente";
    }

    function updateDepartamento($nombre, $codCentro, $fechaInicio, $fechaFin) {

        $url = "http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.Departamento/".$id;
        $response = Http::withBasicAuth('APIRest','2akhwm8LK9fyyCx6LhEk')->put($url,
            [
                'nombre' => $nombre,
                'codCentro' => (int)$codCentro,
                'fechaInicio' => $fechaInicio,
                'fechaFin' => $fechaFin
            ]
        ); 

        if(strpos($response->getBody(),'KeyNotUnique') == true) {
            return "El departamento no se ha podido actualizar";
        }
        return "El departamento se ha actualizado correctamente".$response->getBody();
    }

    //Funcion encargada de eliminar un empleado
    function deleteDepartamento($id) {
        $url = 'http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.Departamento/'.$id;
        $request = Http::delete($url, ['auth' => ['APIRest','2akhwm8LK9fyyCx6LhEk']]);
        $response = $request->getBody();
        return $response;
    }
}
