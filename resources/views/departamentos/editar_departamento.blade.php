@extends('../templates/template')
@section('content')
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Departamentos > Editar un departamento</div>
            <div class="options">
                <a href="{{@route('departamentos')}}">Volver a departamentos</a>
                <span>|</span>
                <a href="{{@route('ver_departamentos')}}">Ver todos los departamentos</a>
            </div>
        </div>
    </header>
    <div class="content">
        <h1>Editar un departamento</h1>

        <form method="GET" class="form-create">
            <table>
                <thead>
                    <tr class="title">
                        <td colspan="2"><h2>Editar un departamento</h2></td>
                    </tr>
                </thead>
                <tfoot>
                    <tr  class="btn-td">
                        <td  class="btn-td" colspan="2"><input type="submit" value="Editar departamento" name="enviar" class="btn"></td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr class='tr-label'>
                        <th><label for="nombre">Nombre del departamento</label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="text" id="nombre" name="nombre" placeholder="nombre del departamento..."></td>
                    </tr>
                    <tr class='tr-label'>
                        <th><label for="codCentro">Codigo del centro</label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="text" id="codCentro" name="codCentro" placeholder="codigo del departamento..."></td>
                    </tr>
                    <tr class='tr-label'>
                        <th><label for="fechaFin">Fecha fin </label></th>
                    </tr>
                    <tr class='tr-input'>
                        <td><input type="date" id="fechaFin" name="fechaFin" placeholder="fecha final..."></td>
                    </tr>
                </tbody>
            </table>
        </form>

        @php
            $mensaje = "";
            $nuevoDepartamento = "";
            //Compruebo si el formulario se ha enviado
            if(isset($_GET['enviar'])) {
                //Si se ha enviado, declaro TODAS las variables del formulario
                $nombre = $_GET['nombre'];
                $codCentro = $_GET['codCentro'];
                $fechaFin = $_GET['fechaFin'];

                //Me aseguro que la fecha final este bien formateada
                $fechaFin = strtotime($fechaFin);
                $fechaFin = date('c', $fechaFin);

                //Recojo la fecha actual y me aseguro de formatearla en en el formato pedido
                $fecha = new DateTimeImmutable();
                $fechaInicio = $fecha->format('c');

                //Si existe, intento encontrar la informacion del empleado llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                try {
                    $nuevoDepartamento = App\Http\Controllers\DepartamentoController::updateDepartamento($nombre, $codCentro, $fechaInicio, $fechaFin);
                } catch(Exception $e) {
                    $mensaje = "El siguiente departamento no ha podido ser actualizado";
                }

            }
        @endphp
        <p>{{$nuevoDepartamento}}</p>
    </div>
@endsection