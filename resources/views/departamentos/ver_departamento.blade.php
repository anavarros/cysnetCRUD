<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/estilos.css">
    <script src="/js/unDato.js" async></script>
    <title>Ver un departamento</title>
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

    <h1>Ver un departamento</h1>


    <h2>Informacion del departamento</h2>


    <form method="GET">
        <label for="codigo_departamento">Introduzca el codigo del departamento que quiera ver:</label>
        <input type="text" id="codigo_departamento" name="codigo_departamento">
        <input type="submit" value="enviar datos" name="enviar">
    </form>


    <div id="departamento">
        @php
        $mensaje = "";
        $departamento = "";
        $id = "";
        //Compruebo si el formulario se ha enviado
        if(isset($_GET['enviar'])) {
            //Si se ha enviado, creo una variable con el valor del input introducido por el usuario y compruebo si existe
            $id = $_GET['codigo_departamento'];
            if(isset($id) && $id !== "") {
                //Si existe, intento encontrar la informacion del departamento llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                try {
                    $departamento = App\Http\Controllers\DepartamentoController::getDepartamento($id); 
                    $mensaje = "Información del departamento ".$id.":";
                } catch(Exception $e) {
                    $mensaje = "El siguiente departamento no existe";
                }
            } 
        }
        @endphp
        <div id="objeto" class="objectHidden">{{$departamento}}</div>
        <span id="infoId" style="display: none">{{$id}}</span>
        <h3 id="informacionHidden">{{$mensaje}}</h3>
        <span id="listaAtributos"></span>
    </div>
</body>
</html>