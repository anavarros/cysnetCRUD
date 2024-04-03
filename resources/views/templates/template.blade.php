<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/estilos.css">

    <script src="/js/script.js" async></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Inicio</title>
</head>
<body>
    <header>
      <nav class="navbar navbar-expand-lg own-navbar">
        <a class="navbar-brand" href="{{@route('inicio')}}"><img src="/img/icono_home.png" width="50px" alt="Icono de la casa para volver a inicio"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <!--Parte del nanvar para empleados-->
            <li class="nav-item dropdown">
              <a class="nav-link nav-link-font dropdown-toggle" href="{{@route('empleados')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Empleados
              </a>
              <div class="dropdown-menu own-navbar" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item nav-link-font" href="{{@route('empleados')}}">Menu de empleados</a>
                <a class="dropdown-item nav-link-font" href="{{@route('ver_empleados')}}">Todos los empleados</a>
                <a class="dropdown-item nav-link-font" href="{{@route('ver_empleado')}}">Ver un empleado</a>
                <a class="dropdown-item nav-link-font" href="{{@route('crear_empleado')}}">Crear un empleado</a>
                <a class="dropdown-item nav-link-font" href="{{@route('editar_empleado')}}">Editar un empleado</a>
                <a class="dropdown-item nav-link-font" href="{{@route('eliminar_empleado')}}">Eliminar un empleado</a>
              </div>
            </li>
              <!--Parte del nanvar para departamentos-->
            <li class="nav-item dropdown">
              <a class="nav-link nav-link-font dropdown-toggle" href="{{@route('departamentos')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Departamentos
              </a>
              <div class="dropdown-menu own-navbar" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item nav-link-font" href="{{@route('departamentos')}}">Menu de departamentos</a>
                <a class="dropdown-item nav-link-font" href="{{@route('ver_departamentos')}}">Todos los departamentos</a>
                <a class="dropdown-item nav-link-font" href="{{@route('ver_departamento')}}">Ver un departamento</a>
                <a class="dropdown-item nav-link-font" href="{{@route('crear_departamento')}}">Crear un departamento</a>
                <a class="dropdown-item nav-link-font" href="{{@route('editar_departamento')}}">Editar un departamento</a>
                <a class="dropdown-item nav-link-font" href="{{@route('eliminar_departamento')}}">Eliminar un departamento</a>
              </div>
            </li>
            <!--Parte del nanvar para departamentos empleados-->
            <li class="nav-item dropdown">
              <a class="nav-link nav-link-font dropdown-toggle" href="{{@route('departamentos_empleados')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Empleados Departamentos
              </a>
              <div class="dropdown-menu own-navbar" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item nav-link-font" href="{{@route('departamentos_empleados')}}">Menu de departamentos empleados</a>
                <a class="dropdown-item nav-link-font" href="{{@route('ver_empleados_departamentos')}}">Todos los departamentos empleados</a>
                <a class="dropdown-item nav-link-font" href="{{@route('ver_empleado_departamento')}}">Ver un departamentos empleados</a>
                <a class="dropdown-item nav-link-font" href="{{@route('crear_empleado_departamento')}}">Crear un departamentos empleados</a>
                <a class="dropdown-item nav-link-font" href="{{@route('editar_empleado_departamento')}}">Editar un departamentos empleados</a>
                <a class="dropdown-item nav-link-font" href="{{@route('eliminar_empleado_departamento')}}">Eliminar un departamentos empleados</a>
              </div>
            </li>
          </ul>
        </div>
        </nav>
        @yield('content')

        <div class="footer">
            <div class="footer-content">Hecho por Alberto Navarro | <a href="https://github.com/anavarros/cysnetCRUD">Repositorio de github</a></div>
        </div>
    </body>
    </html>