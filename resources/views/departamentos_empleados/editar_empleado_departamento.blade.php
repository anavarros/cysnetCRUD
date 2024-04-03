@extends('../templates/template')
@section('content')
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Empleados departamentos > Editar un departamento empleado</div>
            <div class="options">
                <a href="{{@route('departamentos_empleados')}}">Volver a departamentos empleados</a>
                <span>|</span>
                <a href="{{@route('ver_empleados_departamentos')}}">Ver todos los departamentos empleados</a>
            </div>
        </div>
    </header>
    <div class="content">
        <h1>Editar un empleado que pertenezca a un departamento</h1>
        <form method="GET" class="form-create">
            <table>
                <thead>
                    <tr class="title">
                        <td colspan="2"><h2>Editar un empleado departamento</h2></td>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="btn-td">
                        <td colspan="2" class="btn-td"><input type="submit" value="Editar empleado departamento" name="enviar" class="btn"></td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr class="tr-label">
                        <th><label for="codCentro">Codigo del departamento: <span class="required">*</span></label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="text" id="codCentro" name="codCentro" placeholder="Codigo del departamento..."></td>
                    </tr>
                    <tr class="tr-label">
                        <th><label for="codEmpleado">Codigo del empleado: <span class="required">*</span></label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="text" id="codEmpleado" name="codEmpleado" placeholder="Codigo del empleado..."></td>
                    </tr>
                    <tr class="tr-label">
                        <th><label for="fechaFin">Fecha final: </label></th>
                    </tr>
                    <tr  class='tr-input'>
                        <td><input type="date" id="fechaFin" name="fechaFin" placeholder="Fecha final..."></td>
                    </tr>
                    <tr class="tr-label"> 
                        <th><label for="dptPrincipal">Es un departamento principal?</label></th>
                        <td><input type="checkbox" id="dptPrincipal" name="dptPrincipal"></td>
                    </tr>
                </tbody>
            </table>
        </form>

        @php
            $mensaje = "";
            $nuevoEmpleado = "";
            $nuevoEmpleadoDepartamento = "";
            $empleadoDepartamento = "";
            //Compruebo si el formulario se ha enviado
            if(isset($_GET['enviar'])) {
                //Si se ha enviado, declaro TODAS las variables del formulario
                $codCentro = $_GET['codCentro'];
                $codEmpleado = $_GET['codEmpleado'];
                $fechaFin = $_GET['fechaFin'];
                $dptPrincipal = $_GET['dptPrincipal'];
                //Me aseguro que la fecha final este bien formateada
                $fechaFin = strtotime($fechaFin);
                $fechaFin = date('c', $fechaFin);
                //Recojo la fecha actual y me aseguro de formatearla en en el formato pedido
                $fecha = new DateTimeImmutable();
                $fechaInicio = $fecha->format('c');
                if(isset($codEmpleado) && $codEmpleado !== "") {
                    //Si existe, intento encontrar la informacion del empleado llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                    try {
                        $nuevoEmpleadoDepartamento = App\Http\Controllers\DepartamentoEmpleadoController::updateEmpleadoDepartamento($codCentro, $codEmpleado, $fechaFin, $fechaInicio, $dptPrincipal);
                        $empleadoDepartamento = App\Http\Controllers\DepartamentoEmpleadoController::getEmpleadoDepartamento($codEmpleado);
                        $mensaje = "Información del empleado".$codEmpleado.":".$empleado;
                    } catch(Exception $e) {
                        $mensaje = "El siguiente empleado ya existe";
                    }
                }
            }    
        @endphp

        <p>{{$nuevoEmpleadoDepartamento}}</p>
    </div>
@endsection