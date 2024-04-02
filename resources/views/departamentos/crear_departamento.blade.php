<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Crear un departamento</title>
    <style>
        table {
            margin: auto;
        }

        table {
            border: 2px solid lightblue;
            border-radius: 10px;
            padding: 10px
        }

        td, tr {
            
            border: 0px;
        }

        .btn-data {
            text-align: center;
        }
        
        .btn {
            background-color: lightblue;
            border-color: white;
            border-radius: 10px;
            color: black;
        }
    </style>
</head>
<body>
    <header>
        <div class="flex-container">
            <div class="flex-item justify-start"><a href="{{@route('inicio')}}"><img src="/img/icono_home.png" alt="Icono de una casa" width="50px"></a></div>
            <div class="flex-item"><a href="{{@route('empleados')}}">Empleados</a></div>
            <div class="flex-item"><a href="{{@route('departamentos')}}">Departamentos</a></div>
            <div class="flex-item"><a href="{{@route('departamentos_empleados')}}">Empleados departamentos</a></div>
        </div>
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Departamentos > Ver un departamento</div>
            <div class="options">
                <a href="{{@route('departamentos')}}">Volver a departamentos</a>
                <span>|</span>
                <a href="{{@route('ver_departamentos')}}">Ver todos los departamentos</a>
            </div>
        </div>
    </header>

    <h1>Crear un departamento</h1>


    <form method="GET">
        <table>
            <thead>
                <tr>
                    <td colspan="2"><h2>Crear nuevo departamento</h2></td>
                </tr>
            </thead>
            <tfoot>    
                <tr>
                    <td class="btn-data" colspan="2"><input type="submit" value="Crear departamento" name="enviar" class="btn"></td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td><label for="nombre">Nombre del departamento </label></td>
                    <td><input type="text" id="nombre" name="nombre"></td>
                </tr>
                <tr>
                    <td><label for="codCentro">Codigo del centro </label></td>
                    <td><input type="text" id="codCentro" name="codCentro"></td>
                </tr>
                <tr>
                    <td><label for="fechaFin">Fecha fin </label></td>
                    <td><input type="text" id="fechaFin" name="fechaFin"></td>
                </tr>
            </tbody>

        </table>
    </form>

    @php

        $mensaje = "";
        $nuevoDepartamento = "";
        //Compruebo si el formulario se ha enviado
        if(isset($_GET['enviar'])) {
            //Si se ha enviado, declaro TODAS las variables del formulario
            $nombre = $_GET['nombre'];
            $codCentro = $_GET['codCentro'];
            $fechaFin = $_GET['fechaFin'];

            //Me aseguro que la fecha final este bien formateada
            $fechaFin = strtotime($fechaFin);
            $fechaFin = date('c', $fechaFin);

            //Recojo la fecha actual y me aseguro de formatearla en en el formato pedido
            $fecha = new DateTimeImmutable();
            $fechaInicio = $fecha->format('c');
     
            //Si existe, intento encontrar la informacion del empleado llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
            try {
                $nuevoDepartamento = App\Http\Controllers\DepartamentoController::setDepartamento($nombre, $codCentro, $fechaInicio, $fechaFin); 
            } catch(Exception $e) {
                $mensaje = "El siguiente departamento ya existe";
            }
            
        }


    @endphp

    <p>{{$nuevoDepartamento}}</p>
</body>
</html>