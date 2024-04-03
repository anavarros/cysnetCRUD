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
            <div class="breadcrumbs"> Inicio > Departamentos</div>
        </div>
    </header>

    <div class="content">
        <h1>Lista de opciones de departamentos</h1>
        <ul class="list_options">
            <li><a href="{{@route('ver_departamentos')}}">Todos los departamentos</a></li>
            <li><a href="{{@route('ver_departamento')}}">Ver un departamento</a></li>
            <li><a href="{{@route('crear_departamento')}}">Crear un departamento</a></li>
            <li><a href="{{@route('editar_departamento')}}">Editar un departamento</a></li>
            <li><a href="{{@route('eliminar_departamento')}}">Eliminar un departamento</a></li>
        </ul>
    </div>

    <div class="footer">
        <div class="footer-content">Hecho por Alberto Navarro | <a href="https://github.com/anavarros/cysnetCRUD">Repositorio de github</a></div>
    </div>
</body>
</html>