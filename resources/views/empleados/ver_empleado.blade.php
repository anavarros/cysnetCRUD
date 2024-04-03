@extends('../templates/template')
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
        <h1>Ver un empleado</h1>

        <form method="GET" onsubmit="mostrarEmpleado()">
            <label for="codigo_empleado">Introduzca el codigo del empleado que quiera ver:</label>
            <input type="text" id="codigo_empleado" name="codigo_empleado" placeholder="Codigo del empleado...">
            <input class='submit-btn' type="submit" value="enviar datos" name="enviar">
        </form>
        <div>
            @php
            $mensaje = "";
            $id = "";
            $empleado = "";
            //Compruebo si el formulario se ha enviado
            if(isset($_GET['enviar'])) {
                //Si se ha enviado, creo una variable con el valor del input introducido por el usuario y compruebo si existe
                $id = $_GET['codigo_empleado'];
                if(isset($id) && $id !== "") {
                    //Si existe, intento encontrar la informacion del empleado llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                    try {
                        $empleado = App\Http\Controllers\EmpleadoController::getEmpleado($id);
                        $mensaje = "Información del empleado".$id.":";
                    } catch(Exception $e) {
                        $mensaje = "El siguiente empleado no existe";
                    }
                }
            }
            @endphp

            <div id="objeto" class="objectHidden">{{$empleado}}</div>
            <span id="infoId" style="display: none">{{$id}}</span>
            <h3 id="informacionHidden">Informacion sobre el empleado {{$id}}</h3>
            <span id="listaAtributos"></span>
        </div>
    </div>
@endsection