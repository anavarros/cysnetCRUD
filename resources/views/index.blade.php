@extends('templates/template')
  @section('content')

        <div class="sub-header">
          <div class="breadcrumbs"> Inicio > Empleados > Ver un empleado</div>
          <div class="options">
            <a href="{{@route('empleados')}}">Volver a empleados</a>
            <span>|</span>
            <a href="{{@route('ver_empleados')}}">Ver todos los empleados</a>
          </div>
        </div>
    </header>
    <div class="content">
      <h1>Inicio</h1>
      <p>Bienvenido, en esta pagina web tendra acceso a tres secciones principales las cuales se dividen en tres peticiones CRUD a una api para obtener información sobre empleados y departamentos </p>
      <ul class="list_options">
        <li>Ver todos los registros de dicha pagina</li>
        <li>Ver un registro en especifico</li>
        <li>Crear un registro</li>
        <li>Editar un registro</li>
        <li>Eliminar un registro</li>
      </ul>
    </div>
    @endsection