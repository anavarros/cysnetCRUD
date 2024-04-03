@extends('../templates/template')
@section('content')
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
@endsection