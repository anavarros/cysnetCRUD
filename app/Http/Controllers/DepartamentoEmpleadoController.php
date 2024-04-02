<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp;
use Illuminate\View\View;

class DepartamentoEmpleadoController extends Controller
{
    /*
     * Funciones de vistas de empleados 
     */

    //Devuelve la vista general para elegir una opcion de vista
    function departamentos() : view {
        return view('/');
    }

    //Devuelve la vista para poder ver todos los empleados que pertenezcan a un departamento
    function ver_empleados_departamentos() : view {
        return view('departamentos_empleados/ver_empleados_departamentos');
    }
    //Devuelve la vista para poder ver un empleado que pertenezca a un departamento
    function ver_empleado_departamento() : view {
        return view('departamentos_empleados/ver_empleado_departamento');
    }
    //Devuelve la vista para poder crear un empleado que pertenezca a un departamento
    function crear_empleado_departamento() : view {
        return view('departamentos_empleados/crear_empleado_departamento');
    }
    //Devuelve la vista para poder editar un empleado que pertenezca a un departamento
    function editar_empleado_departamento() : view {
        return view('departamentos_empleados/editar_empleado_departamento');
    }
    //Devuelve la vista para poder eliminar un empleado que pertenezca a un departamento
    function eliminar_empleado_departamento() : view {
        return view('departamentos_empleados/eliminar_empleado_departamento');
    }

    //Metodo que devuelve todos los empleados
    static function  getDepartamentosEmpleados() {
        $client = new Client();
        $request = $client->get('http://20.111.13.103:52773/dhForms/form/objects/cysnet.demoHis.data.DepartamentoEmpleado/all', ['auth' => ['APIRest','2akhwm8LK9fyyCx6LhEk']]);
        $response = $request->getBody()->getContents();
        return $response;
    }

    //Metodo que devuelve un empleado, exactamente el 14 debido a que node.js no funciona
    function getEmpleadoDepartamento($id) {
        $client = new Client();
        $url = 'http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.DepartamentoEmpleado/'.$id;
        $request = $client->get($url, ['auth' => ['APIRest','2akhwm8LK9fyyCx6LhEk']]);
        $response = $request->getBody();
        return $response;
    }

    //Funcion para crear un empleado
    function setEmpleadoDepartamento($codCentro, $codEmpleado, $fechaFin = "", $fechaInicio, $dptPrincipal = 0) {
        $response = Http::withBasicAuth('APIRest','2akhwm8LK9fyyCx6LhEk')->post("http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.DepartamentoEmpleado",
        [
            'codDpto' =>  (int)$codCentro,
            'codEmpleado' => $codEmpleado,
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
            'esDptoPrincipal' => $dptPrincipal,
        ]); 

        if(strpos($response->getBody(),'KeyNotUnique') == true) {
            return "El departamento no se ha podido crear ya que la clave unica ya esta en uso";
        }
        return "El departamento ".$response->getBody()." se ha creado correctamente";
    }

    function updateEmpleadoDepartamento($codCentro, $codEmpleado, $fechaFin, $fechaInicio, $dptPrincipal) {
        $url = "http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.DepartamentoEmpleado/".$id;
        $response = Http::withBasicAuth('APIRest','2akhwm8LK9fyyCx6LhEk')->put($url,
            [
                'codDpto' =>  (int)$codCentro,
                'codEmpleado' => $codEmpleado,
                'fechaInicio' => $fechaInicio,
                'fechaFin' => $fechaFin,
                'esDptoPrincipal' => $dptPrincipal,
            ]
        ); 

        if(strpos($response->getBody(),'KeyNotUnique') == true) {
            return "El departamento no se ha podido crear ya que la clave unica ya esta en uso";
        }
        return "El departamento se ha actualizado correctamente".$response->getBody();
    
    }

    //Funcion encargada de eliminar un empleado
    function deleteEmpleadoDepartamento($id) {
        $url = 'http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.DepartamentoEmpleado/'.$id;
        $request = Http::delete($url, ['auth' => ['APIRest','2akhwm8LK9fyyCx6LhEk']]);
        $response = $request->getBody();
        return $response;
    }
}
