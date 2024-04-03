@extends('../templates/template')
@section('content')
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
        <div>
            <span id="departamentos" class="departamentosHidden">{{$departamentos}}</span>
            <p id="listaDepartamentos"></p>
        </div>
    </div>
@endsection