@extends('../templates/template')
@section('content')
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Empleados departamentos > Ver un departamento empleado</div>
            <div class="options">
                <a href="{{@route('departamentos_empleados')}}">Volver a departamentos empleados</a>
                <span>|</span>
                <a href="{{@route('ver_empleados_departamentos')}}">Ver todos los departamentos empleados</a>
            </div>
        </div>
    </header>
    <div class="content">
        <h1>Ver un departamento</h1>
        <h2>Informacion del empleado que pertenece a un departamento</h2>
        <form method="GET">
            <label for="codigo_departamento_empleado">Introduzca el codigo del departamento que quiera ver los empleados:</label>
            <input type="text" id="codigo_departamento_empleado" name="codigo_departamento_empleado" placeholder="Codigo del departamento empleado">
            <input type="submit" class='submit-btn' value="ver departamento empleado" name="enviar">
        </form>
        <div id="departamento">
            @php
            $id = "";
            $mensaje = "";
            $departamento = "";
            //Compruebo si el formulario se ha enviado
            if(isset($_GET['enviar'])) {
                //Si se ha enviado, creo una variable con el valor del input introducido por el usuario y compruebo si existe
                $id = $_GET['codigo_departamento_empleado'];
                if(isset($id) && $id !== "") {
                    //Si existe, intento encontrar la informacion del departamento llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                    try {
                        $departamento = App\Http\Controllers\DepartamentoEmpleadoController::getEmpleadoDepartamento($id);
                        $mensaje = "Información del departamento con empleados ".$id.":";
                    } catch(Exception $e) {
                        $mensaje = "El siguiente departamento no existe";
                    }
                }
            }
            @endphp
            <div id="objeto" class="objectHidden">{{$departamento}}</div>
            <span id="infoId" style="display: none">{{$id}}</span>
            <h3 id="informacionHidden">{{$mensaje}}</h3>
            <span id="listaAtributos"></span>
        </div>
    </div>
@endsection