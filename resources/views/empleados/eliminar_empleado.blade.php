@extends('../templates/template')
@section('content')
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Empleados > Eliminar un empleado</div>
            <div class="options">
                <a href="{{@route('empleados')}}">Volver a empleados</a>
                <span>|</span>
                <a href="{{@route('ver_empleados')}}">Ver todos los empleados</a>
            </div>
        </div>
    </header>
    <div class="content">
        <h1>Eliminar un empleado</h1>
        <h2>Indica que empleado quieres eliminar</h2>
        
        <form method="GET">
            <label for="codigo_empleado">Introduzca el codigo del empleado que quiera eliminar:</label>
            <input type="text" id="codigo_empleado" name="codigo_empleado" placeholder="codigo del empleado...">
            <input type="submit" class='submit-btn' value="eliminar empleado" name="enviar" class="btn">
        </form>

        <div id="empleado">
            @php
            $mensaje = "";
            //Compruebo si el formulario se ha enviado
            if(isset($_GET['enviar'])) {
                //Si se ha enviado, creo una variable con el valor del input introducido por el usuario y compruebo si existe
                $id = $_GET['codigo_empleado'];
                if(isset($id) && $id !== "") {
                    //Si existe, intento encontrar la informacion del empleado llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                    try {
                        $infoEmpleado = App\Http\Controllers\EmpleadoController::getEmpleado($id);
                        $empleado = App\Http\Controllers\EmpleadoController::deleteEmpleado($id);
                        $mensaje = "El empleado con id: ".$id." ha sido borrado exitosamente";
                    } catch(Exception $e) {
                        $mensaje = "El empleado no ha podido ser borrado por que no existe";
                    }
                }
            }
        
            @endphp
            <p>{{$mensaje}}</p>
        </div>
    </div>

@endsection