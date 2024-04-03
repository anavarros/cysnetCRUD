@extends('../templates/template')
@section('content')
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
    @endsection