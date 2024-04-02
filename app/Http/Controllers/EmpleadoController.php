<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp;
use Illuminate\View\View;

class EmpleadoController extends Controller
{

    /*
     * Funciones de vistas de empleados 
     */

    //Devuelve la vista general para elegir una opcion de vista
    function empleados() : view {
        return view('empleados/empleados');
    }

    //Devuelve la vista para poder ver todos los empleados
    function ver_empleados() : view {
        return view('empleados/ver_empleados');
    }
    //Devuelve la vista para poder ver todos los empleados
    function ver_empleado() : view {
        return view('empleados/ver_empleado');
    }
    //Devuelve la vista para poder ver todos los empleados
    function crear_empleado() : view {
        return view('empleados/crear_empleado');
    }
    //Devuelve la vista para poder ver todos los empleados
    function editar_empleado() : view {
        return view('empleados/editar_empleado');
    }
    //Devuelve la vista para poder ver todos los empleados
    function eliminar_empleado() : view {
        return view('empleados/eliminar_empleado');
    }

    //Metodo que devuelve todos los empleados
    static function  getEmpleados() {
        $client = new Client();
        $request = $client->get('http://20.111.13.103:52773/dhForms/form/objects/cysnet.demoHis.data.Empleado/all', ['auth' => ['APIRest','2akhwm8LK9fyyCx6LhEk']]);
        $response = $request->getBody()->getContents();
        return $response;
    }

    //Metodo que devuelve un empleado
    function getEmpleado($id) {
        $client = new Client();
        $url = 'http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.Empleado/'.$id;
        $request = $client->get($url, ['auth' => ['APIRest','2akhwm8LK9fyyCx6LhEk']]);
        $response = $request->getBody();
        return $response;
    }

    //Funcion para crear un empleado
    function setEmpleado($codEmpleado, $codUsuario, $nombre, $primerApellido ,$segundoApellido = "", $email, $fechaActivacion, $fechaDesactivacion = "") {
        $response = Http::withBasicAuth('APIRest','2akhwm8LK9fyyCx6LhEk')->post("http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.Empleado",
            [
                'codEmpleado' => $codEmpleado,
                'codUsuario' => $codUsuario,
                'nombre' => $nombre,
                'primerApellido' => $primerApellido,
                'segundoApellido' => $segundoApellido,
                'email' => $email, 
                'fechaActivacion' => $fechaActivacion, 
                'fechaDesactivacion' => $fechaDesactivacion
            ]
        ); 

        if(strpos($response->getBody(),'KeyNotUnique') == true) {
            return "El usuario no se ha podido crear ya que la clave unica ya esta en uso";
        }
        return "El empleado con id ".$response->getBody()." se ha creado correctamente";
    }
    //Función encargada de actualizar un empleado
    function updateEmpleado($codEmpleado, $codUsuario, $nombre, $primerApellido ,$segundoApellido, $email, $fechaActivacion, $fechaDesactivacion = "") {
        $url = "http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.Empleado/".$id;
        $response = Http::withBasicAuth('APIRest','2akhwm8LK9fyyCx6LhEk')->put($url,
            [
                'codEmpleado' => $codEmpleado,
                'codUsuario' => $codUsuario,
                'nombre' => $nombre,
                'primerApellido' => $primerApellido,
                'segundoApellido' => $segundoApellido,
                'email' => $email, 
                'fechaActivacion' => $fechaActivacion, 
                'fechaDesactivacion' => $fechaDesactivacion
            ]); 
        return "El empleado se ha actualizado correctamente: ".$response->getBody();
        }
    
    //Funcion encargada de eliminar un empleado
    function deleteEmpleado($id) {
        $client = new Client();
        $url = 'http://20.111.13.103:52773/dhForms/form/object/cysnet.demoHis.data.Empleado/'.$id;
        $request = $client->delete($url, ['auth' => ['APIRest','2akhwm8LK9fyyCx6LhEk']]);
        $response = $request->getBody();
        return $response;
    }
}
