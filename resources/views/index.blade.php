<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Inicio</title>
</head>
<body>

    <header>
        <div class="flex-container">
            <div class="flex-item justify-start"><a href="{{@route('inicio')}}"><img src="/img/icono_home.png" alt="Icono de una casa" width="50px"></a></div>
            <div class="flex-item"><a href="{{@route('empleados')}}">Empleados</a></div>
            <div class="flex-item"><a href="{{@route('departamentos')}}">Departamentos</a></div>
            <div class="flex-item"><a href="{{@route('departamentos_empleados')}}">Empleados departamentos</a></div>
        </div>
       
    </header>

    <div class="content">
        <h1>Bienvenido</h1>
        <p>En este proyecto podra acceder a tres paginas distintas desde las cuales podra llevar a cabo una funcion especifica como una tabla, las operaciones que puede llevar a cabo son: </p>
        <ul class="list_options">
            <li>Ver todos los registros de dicha pagina</li>
            <li>Ver un registro en especifico</li>
            <li>Crear un registro</li>
            <li>Editar un registro</li>
            <li>Eliminar un registro</li>
        </ul>
    </div>

    <div class="footer">
        <div class="footer-content">Hecho por Alberto Navarro | <a href="https://github.com/anavarros/cysnetCRUD/tree/master">Repositorio de github</a></div>
    </div>
</body>
</html>