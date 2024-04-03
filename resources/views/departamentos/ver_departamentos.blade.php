<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/scriptDepartamento.js"></script>
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Document</title>
    <style>
        .departamentosHidden {
            display: none;
        }

        li {
            margin: 10px;
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
            <div class="breadcrumbs"> Inicio > Departamentos > Ver todos los departamentos</div>
            <div class="options">
                <a href="{{@route('departamentos')}}">Volver a departamentos</a>
                <span>|</span>
                <a href="{{@route('ver_departamento')}}">Ver un departamento</a>
            </div>
        </div>
    </header>
<div class="content">
    
        <h1>Estos son todos los departamentos</h1>
    
    
        @php
            $departamentos = App\Http\Controllers\DepartamentoController::getDepartamentos();
        @endphp
        <div><span id="departamentos" class="departamentosHidden">{{$departamentos}}</span><p id="listaDepartamentos"></p></div>
    
</div>

<div class="footer">
    <div class="footer-content">Hecho por Alberto Navarro | <a href="https://github.com/anavarros/cysnetCRUD/tree/master">Repositorio de github</a></div>
</div>
</body>
</html>