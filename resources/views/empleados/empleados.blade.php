<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Empleados</title>
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
            <div class="breadcrumbs"> Inicio > Empleados</div>
        </div>
    </header>

    <h1 style="margin-left: 25%">Lista de opciones de empleados y departamentos</h1>
    <ul>
        <li><a href="{{@route('ver_empleados')}}">Todos los empleados</a></li>
        <li><a href="{{@route('ver_empleado')}}">Ver un empleado</a></li>
        <li><a href="{{@route('crear_empleado')}}">Crear un empleado</a></li>
        <li><a href="{{@route('editar_empleado')}}">Editar un empleado</a></li>
        <li><a href="{{@route('eliminar_empleado')}}">Eliminar un empleado</a></li>
    </ul>
</body>
</html>