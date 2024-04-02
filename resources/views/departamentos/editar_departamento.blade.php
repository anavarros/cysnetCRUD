<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Editar un departamento</title>
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
            <div class="breadcrumbs"> Inicio > Departamentos > Editar un departamento</div>
            <div class="options">
                <a href="{{@route('departamentos')}}">Volver a departamentos</a>
                <span>|</span>
                <a href="{{@route('ver_departamentos')}}">Ver todos los departamentos</a>
            </div>
        </div>
    </header>

    <h1>Editar un departamento</h1>


    <form method="GET">
        <label for="nombre">Nombre del departamento: </label>
        <input type="text" id="nombre" name="nombre">
        <br>
        <label for="codCentro">Codigo del centro: </label>
        <input type="text" id="codCentro" name="codCentro">
        <br>
        <label for="fechaFin">Fecha fin: </label>
        <input type="date" id="fechaFin" name="fechaFin">
        <br>
        <input type="submit" value="Crear departamento" name="enviar">
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
                $nuevoDepartamento = App\Http\Controllers\DepartamentoController::updateDepartamento($nombre, $codCentro, $fechaInicio, $fechaFin); 
            } catch(Exception $e) {
                $mensaje = "El siguiente departamento no ha podido ser actualizado";
            }
            
        }
    @endphp

    <p>{{$nuevoDepartamento}}</p>

    
</body>
</html>