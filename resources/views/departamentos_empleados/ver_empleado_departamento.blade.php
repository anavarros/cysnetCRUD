<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/estilos.css">
    <script src="/js/unDato.js" async></script>
    <title>Ver un empleado que pertenezca a un departamento</title>
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
            <div class="breadcrumbs"> Inicio > Empleados departamentos > Ver un departamento empleado</div>
            <div class="options">
                <a href="{{@route('departamentos_empleados')}}">Volver a departamentos empleados</a>
                <span>|</span>
                <a href="{{@route('ver_empleados_departamentos')}}">Ver todos los departamentos empleados</a>
            </div>
        </div>
    </header>
<div class="content">
    
        <h1>Ver un departamento</h1>
    
    
        <h2>Informacion del empleado que pertenece a un departamento</h2>
    
        <form method="GET">
            <label for="codigo_departamento_empleado">Introduzca el codigo del departamento que quiera ver los empleados:</label>
            <input type="text" id="codigo_departamento_empleado" name="codigo_departamento_empleado">
            <input type="submit" value="enviar datos" name="enviar">
        </form>
    
        <div id="departamento">
            @php
            $id = "";
            $mensaje = "";
            $departamento = "";
            //Compruebo si el formulario se ha enviado
            if(isset($_GET['enviar'])) {
                //Si se ha enviado, creo una variable con el valor del input introducido por el usuario y compruebo si existe
                $id = $_GET['codigo_departamento_empleado'];
                if(isset($id) && $id !== "") {
                    //Si existe, intento encontrar la informacion del departamento llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                    try {
                        $departamento = App\Http\Controllers\DepartamentoEmpleadoController::getEmpleadoDepartamento($id);
                        $mensaje = "Información del departamento con empleados ".$id.":";
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
</div>

<div class="footer">
    <div class="footer-content">Hecho por Alberto Navarro | <a href="https://github.com/anavarros/cysnetCRUD/tree/master">Repositorio de github</a></div>
</div>
</body>
</html>