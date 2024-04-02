<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Editar un empleado</title>
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
            <div class="breadcrumbs"> Inicio > Empleados > Editar un empleado</div>
            <div class="options">
                <a href="{{@route('empleados')}}">Volver a empleados</a>
                <span>|</span>
                <a href="{{@route('ver_empleados')}}">Ver todos los empleados</a>
            </div>
        </div>
    </header>


    <h1>Editar un empleado</h1>



    <form method="GET">
        <table>
            <thead>
                <tr>
                    <td colspan="2"><h2>Editar un empleado</h2></td>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <td colspan="2" class="btn-data"><input type="submit" value="Editar" name="enviar" class="btn"></td>
                </tr>
            </tfoot>

            <tbody>
                <tr>
                    <td><label for="codEmpleado">Codigo de empleado </label></td>
                    <td><input type="text" id="codEmpleado" name="codEmpleado"></td>
                </tr>
                <tr>
                    <td><label for="codUsuario">Codigo de usuario </label></td>
                    <td><input type="text" id="codUsuario" name="codUsuario"></td>
                </tr>
                <tr>
                    <td><label for="nombre">Nombre </label></td>
                    <td><input type="text" id="nombre" name="nombre"></td>
                </tr>
                <tr>
                    <td><label for="primerApellido">Primer apellido </label></td>
                    <td><input type="text" id="primerApellido" name="primerApellido"></td>
                </tr>
                <tr>
                    <td><label for="segundoApellido">Segundo apellido </label></td>
                    <td><input type="text" id="segundoApellido" name="segundoApellido"></td>
                </tr>
                <tr>
                    <td><label for="fechaDesactivacion">Fecha desactivación </label></td>
                    <td><input type="date" id="fechaDesactivacion" name="fechaDesactivacion" style="width: 94%"></td>
                </tr>
                <tr>
                    <td><label for="email">Email </label></td>
                    <td><input type="text" id="email" name="email"></td>
                </tr>
            </tbody>
            
        </table>
    </form>

    @php
        $mensaje = "";
        $nuevoEmpleado = "";
        //Compruebo si el formulario se ha enviado
        if(isset($_GET['enviar'])) {
            //Si se ha enviado, declaro TODAS las variables del formulario
            $codEmpleado = $_GET['codEmpleado'];
            $codUsuario = $_GET['codUsuario'];
            $nombre = $_GET['nombre'];
            $primerApellido = $_GET['primerApellido'];
            $segundoApellido = $_GET['segundoApellido'];
            $email = $_GET['email'];
            //Recojo la fecha actual y me aseguro de formatearla en en el formato pedido
            $fecha = new DateTimeImmutable();
            $fechaActivacion = $fecha->format('c');
            $fechaDesactivacion = $_GET['fechaDesactivacion'];
            $fechaDesactivacion = strtotime($fechaDesactivacion);
            $fechaDesactivacion = date('c', $fechaDesactivacion);
            if(isset($codEmpleado) && $codEmpleado !== "") {
                //Si existe, intento encontrar la informacion del empleado llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                try {
                    $nuevoEmpleado = App\Http\Controllers\EmpleadoController::updateEmpleado($codEmpleado, $codUsuario, $nombre, $primerApellido ,$segundoApellido, $email, $fechaActivacion, $fechaDesactivacion); 
                    $empleado = App\Http\Controllers\EmpleadoController::getEmpleado($codEmpleado);
                    $mensaje = "Información del empleado".$codEmpleado.":".$empleado;
                } catch(Exception $e) {
                    $mensaje = "El siguiente empleado ya existe";
                }
            } 
        }
    @endphp
    
</body>
</html>