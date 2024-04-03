<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Eliminar un departamento</title>
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
            <div class="breadcrumbs"> Inicio > Departamentos > Eliminar un departamento</div>
            <div class="options">
                <a href="{{@route('departamentos')}}">Volver a departamentos</a>
                <span>|</span>
                <a href="{{@route('ver_departamentos')}}">Ver todos los departamentos</a>
            </div>
        </div>
    </header>
    <div class="content">
        <h1>Ver un departamento</h1>
        <h2>Indica que departamento quieres eliminar</h2>

        <form method="GET">
            <label for="codigo_departamento">Introduzca el codigo del departamento que quiera eliminar:</label>
            <input type="text" id="codigo_departamento" name="codigo_departamento">
            <input type="submit" value="enviar datos" name="enviar">
        </form>

        <div id="departamento">
            @php
                $mensaje = "";
                //Compruebo si el formulario se ha enviado
                if(isset($_GET['enviar'])) {
                    //Si se ha enviado, creo una variable con el valor del input introducido por el usuario y compruebo si existe
                    $id = $_GET['codigo_departamento'];
                    if(isset($id) && $id !== "") {
                        //Si existe, intento encontrar la informacion del empleado llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                        try {
                            $departamento = App\Http\Controllers\DepartamentoController::deleteDepartamento($id);
                            $mensaje = "El departamento con id: ".$id." ha sido borrado exitosamente";
                        } catch(Exception $e) {
                            $mensaje = "El departamento no ha podido ser borrado por que no existe";
                        }
                    }
                }
            @endphp
            <p>{{$mensaje}}</p>
        </div>
    </div>

    <div class="footer">
        <div class="footer-content">Hecho por Alberto Navarro | <a href="https://github.com/anavarros/cysnetCRUD">Repositorio de github</a></div>
    </div>
</body>
</html>