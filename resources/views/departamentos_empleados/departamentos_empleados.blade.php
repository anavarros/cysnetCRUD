@extends('../templates/template')
@section('content')
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Departamentos Empleados</div>
        </div>
    </header>

    <div class="content">
        <h1>Lista de opciones de empleados y departamentos</h1>
        <ul class="list_options">
            <li><a href="{{@route('ver_empleados_departamentos')}}">Todos los empleados que pertenezcan a departamentos</a></li>
            <li><a href="{{@route('ver_empleado_departamento')}}">Ver un empleado que pertenece a un departamento</a></li>
            <li><a href="{{@route('crear_empleado_departamento')}}">Crear un empleado que pertenece a un departamento</a></li>
            <li><a href="{{@route('editar_empleado_departamento')}}">Editar un empleado que pertenece a un departamento</a></li>
            <li><a href="{{@route('eliminar_empleado_departamento')}}">Eliminar un empleado que pertenece a un departamento</a></li>
        </ul>
    </div>
@endsection