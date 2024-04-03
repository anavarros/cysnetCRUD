@extends('../templates/template')
@section('content')
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Empleados > Crear un empleado</div>
            <div class="options">
                <a href="{{@route('empleados')}}">Volver a empleados</a>
                <span>|</span>
                <a href="{{@route('ver_empleados')}}">Ver todos los empleados</a>
            </div>
        </div>
    </header>
    <div class="content">
        <h1>Empleados</h1>
        <form method="GET" class='form-create'>
            <table>
                <thead>
                    <tr  class="title">
                        <td colspan="2"><h2>Crear nuevo empleado</h2></td>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="btn-td">
                        <td colspan="2" class="btn-td"><input type="submit" value="Crear empleado" name="enviar" class="btn"></td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr class="tr-warning">
                        <td><i>Los apartados marcados con * son obligatiorios</i></td>
                    </tr>
                    <tr class='tr-label'>
                        <th id='codigoEmpleado'><label for="codEmpleado">Codigo de empleado <span class="required">*</span></label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="text" id="codEmpleado" name="codEmpleado" placeholder="codigo de empleado..."></td>
                    </tr>
                    <tr class='tr-label'>
                        <th><label for="codUsuario">Codigo de usuario </label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="text" id="codUsuario" name="codUsuario" placeholder="codigo de usuario..."></td>
                    </tr>
                    <tr class='tr-label'>
                        <th><label for="nombre">Nombre <span class="required">*</span></label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="text" id="nombre" name="nombre" placeholder="nombre..."></td>
                    </tr>
                    <tr class='tr-label'>
                        <th><label for="primerApellido">Primer apellido <span class="required">*</span></label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="text" id="primerApellido" name="primerApellido" placeholder="primer apellido..."></td>
                    </tr>
                    <tr class='tr-label'>
                        <th><label for="segundoApellido">Segundo apellido </label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="text" id="segundoApellido" name="segundoApellido" placeholder="segundo apellido..."></td>
                    </tr>
                    <tr class='tr-label'>
                        <th><label for="fechaDesactivacion">Fecha desactivación </label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="date" id="fechaDesactivacion" name="fechaDesactivacion" placeholder="Fecha de desactivacion..."></td>
                    </tr>
                    <tr class='tr-label'>
                        <th><label for="email">Email <span class="required">*</span></label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="text" id="email" name="email" placeholder="Email..."></td>
                    </tr>
                </tbody>
            </table>
        </form>
        @php
            $mensaje = "";
            $nuevoEmpleado = "";
            //Compruebo si el formulario se ha enviado
            if(isset($_GET['enviar'])) {
                //Si se ha enviado, declaro TODAS las variables del formulario
                $codEmpleado = $_GET['codEmpleado'];
                $codUsuario = $_GET['codUsuario'];
                $nombre = $_GET['nombre'];
                $primerApellido = $_GET['primerApellido'];
                $segundoApellido = $_GET['segundoApellido'];
                $email = $_GET['email'];
                //Recojo la fecha actual y me aseguro de formatearla en en el formato pedido
                $fecha = new DateTimeImmutable();
                $fechaActivacion = $fecha->format('c');
                $fechaDesactivacion = $_GET['fechaDesactivacion'];
                $fechaDesactivacion = strtotime($fechaDesactivacion);
                $fechaDesactivacion = date('c', $fechaDesactivacion);
                if(isset($codEmpleado) && $codEmpleado !== "") {
                    //Si existe, intento encontrar la informacion del empleado llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                    try {
                        $nuevoEmpleado = App\Http\Controllers\EmpleadoController::setEmpleado($codEmpleado, $codUsuario, $nombre, $primerApellido ,$segundoApellido, $email, $fechaActivacion, $fechaDesactivacion);
                        $empleado = App\Http\Controllers\EmpleadoController::getEmpleado($codEmpleado);
                        $mensaje = "Información del empleado".$codEmpleado.":".$empleado;
                    } catch(Exception $e) {
                        $mensaje = "El siguiente empleado ya existe";
                    }
                }
            }
        @endphp
        <p>{{$nuevoEmpleado}}</p>
    </div>
@endsection