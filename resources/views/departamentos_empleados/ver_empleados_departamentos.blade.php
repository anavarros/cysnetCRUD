<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/scriptDepartamentoEmpleados.js" async></script>
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Document</title>
    <style>
        .departamentosEmpleadosHidden {
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
            <div class="breadcrumbs"> Inicio > Empleados departamentos > Ver todos los empleados departamentos</div>
            <div class="options">
                <a href="{{@route('departamentos_empleados')}}">Volver a departamentos empleados</a>
                <span>|</span>
                <a href="{{@route('ver_empleado_departamento')}}">Ver un departamento empleado</a>
            </div>
        </div>
    </header>
    <div class="content">
        <h1>Estos son todos los empleados que pertenecen a departamentos</h1>
        @php
            $departamentosEmpleados = App\Http\Controllers\DepartamentoEmpleadoController::getDepartamentosEmpleados();
        @endphp
        <div>
            <span id="departamentosEmpleados" class="departamentosEmpleadosHidden">{{$departamentosEmpleados}}</span>
            <p id="listaDepartamentosEmpleados"></p>
        </div>
    </div>
    <div class="footer">
        <div class="footer-content">Hecho por Alberto Navarro | <a href="https://github.com/anavarros/cysnetCRUD">Repositorio de github</a></div>
    </div>
</body>
</html>