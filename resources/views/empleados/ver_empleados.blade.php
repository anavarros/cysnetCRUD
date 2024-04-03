@extends('../templates/template')
@section('content')
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Empleados > Ver todos los empleados</div>
            <div class="options">
                <a href="{{@route('empleados')}}">Volver a empleados</a>
                <span>|</span>
                <a href="{{@route('ver_empleado')}}">Ver un empleado</a>
            </div>
        </div>
    </header>
    <div class="content">
        <h1>Empleados</h1>
        <h2>Todos los empleados</h2>

        @php
            $empleados = App\Http\Controllers\EmpleadoController::getEmpleados();
        @endphp

        <div><span id="empleados" class="empleadosHidden">{{$empleados}}</span><p id="listaEmpleados"></p></div>
    </div>
@endsection