<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Eliminar un empleado</title>

    <style>
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
            <div class="breadcrumbs"> Inicio > Empleados > Eliminar un empleado</div>
            <div class="options">
                <a href="{{@route('empleados')}}">Volver a empleados</a>
                <span>|</span>
                <a href="{{@route('ver_empleados')}}">Ver todos los empleados</a>
            </div>
        </div>
    </header>
    
    <h1>Eliminar un empleado</h1>

    <h2>Indica que empleado quieres eliminar</h2>

    
    <form method="GET">
        <label for="codigo_empleado">Introduzca el codigo del empleado que quiera eliminar:</label>
        <input type="text" id="codigo_empleado" name="codigo_empleado">
        <input type="submit" value="eliminar" name="enviar" class="btn">
    </form>

    <div id="empleado">
        @php
        $mensaje = "";
        //Compruebo si el formulario se ha enviado
        if(isset($_GET['enviar'])) {
            //Si se ha enviado, creo una variable con el valor del input introducido por el usuario y compruebo si existe
            $id = $_GET['codigo_empleado'];
            if(isset($id) && $id !== "") {
                //Si existe, intento encontrar la informacion del empleado llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                try {
                    $infoEmpleado = App\Http\Controllers\EmpleadoController::getEmpleado($id); 
                    $empleado = App\Http\Controllers\EmpleadoController::deleteEmpleado($id); 
                    $mensaje = "El empleado con id: ".$id." ha sido borrado exitosamente";
                } catch(Exception $e) {
                    $mensaje = "El empleado no ha podido ser borrado por que no existe";
                }
            } 
        }

    
        @endphp
        <p>{{$mensaje}}</p>
    </div>
</body>
</html>