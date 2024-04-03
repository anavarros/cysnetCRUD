@extends('../templates/template')
@section('content')
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Empleados</div>
        </div>
    </header>
    
    <div class="content">
        <h1>Lista de opciones de empleados</h1>
        <ul class="list_options">
            <li><a href="{{@route('ver_empleados')}}">Todos los empleados</a></li>
            <li><a href="{{@route('ver_empleado')}}">Ver un empleado</a></li>
            <li><a href="{{@route('crear_empleado')}}">Crear un empleado</a></li>
            <li><a href="{{@route('editar_empleado')}}">Editar un empleado</a></li>
            <li><a href="{{@route('eliminar_empleado')}}">Eliminar un empleado</a></li>
        </ul>
    </div>


@endsection