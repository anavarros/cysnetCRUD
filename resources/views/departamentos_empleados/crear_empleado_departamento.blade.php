<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Crear un empleado que pertenezca a un departamento</title>
    <style>
        table {
            margin: auto;
        }

        table {
            border: 2px solid lightblue;
            border-radius: 10px;
            padding: 10px
        }

        td, tr {
            
            border: 0px;
        }

        .btn-data {
            text-align: center;
        }
        
        .btn {
            background-color: lightblue;
            border-color: white;
            border-radius: 10px;
            color: black;
        }
    </style>
</head>
<body>
    <header>
        <div class="flex-container">
            <div class="flex-item justify-start"><a href="{{@route('inicio')}}"><img src="/img/icono_home.png" alt="Icono de una casa" width="50px"></a></div>
            <div class="flex-item"><a href="{{@route('empleados')}}">Empleados</a></div>
            <div class="flex-item"><a href="{{@route('departamentos')}}">Departamentos</a></div>
            <div class="flex-item"><a href="{{@route('departamentos_empleados')}}">Empleados departamentos</a></div>
        </div>
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Empleados departamentos > Crear un departamento empleado</div>
            <div class="options">
                <a href="{{@route('departamentos_empleados')}}">Volver a departamentos empleados</a>
                <span>|</span>
                <a href="{{@route('ver_empleados_departamentos')}}">Ver todos los departamentos empleados</a>
            </div>
        </div>
    </header>
<div class="content">
    
        <h1>Crear un empleado que pertenezca a un departamento</h1>
    
    
        <form method="GET">
            <table>
                <thead>
                    <tr>
                        <td colspan="2"><h2>Crear empleado departamento</h2></td>
                    </tr>
                </thead>
    
                <tfoot>
                    <tr>
                        <td colspan="2" class="btn-data"><input type="submit" value="Crear departamento" name="enviar" class="btn"></td>
                    </tr>
                </tfoot>
    
                <tbody>
                    <tr>
                        <td><label for="codCentro">Codigo del departamento: </label></td>
                        <td><input type="text" id="codCentro" name="codCentro"></td>
                    </tr>
                    <tr>
                        <td><label for="codEmpleado">Codigo del empleado: </label></td>
                        <td><input type="text" id="codEmpleado" name="codEmpleado"></td>
                    </tr>
                    <tr>
                        <td><label for="fechaFin">Fecha final: </label></td>
                        <td><input type="date" id="fechaFin" name="fechaFin" style="width: 94%"></td>
                    </tr>
                    <tr>
                        <td><label for="dptPrincipal">Es un departamento principal?</label></td>
                        <td><input type="checkbox" id="dptPrincipal" name="dptPrincipal"></td>
                    </tr>
                </tbody>
    
            </table>
        </form>
    
        @php
    
        $mensaje = "";
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
                        $nuevoEmpleadoDepartamento = App\Http\Controllers\DepartamentoEmpleadoController::setEmpleadoDepartamento($codCentro, $codEmpleado, $fechaFin, $fechaInicio, $dptPrincipal);
                        $empleadoDepartamento = App\Http\Controllers\DepartamentoEmpleadoController::getEmpleadoDepartamento($codEmpleado);
                        $mensaje = "Información del empleado".$codEmpleado.":".$empleado;
                    } catch(Exception $e) {
                        $mensaje = "El siguiente empleado ya existe";
                    }
                }
            }
        @endphp
    
        <p>{{$empleadoDepartamento}}</p>
</div>

<div class="footer">
    <div class="footer-content">Hecho por Alberto Navarro | <a href="https://github.com/anavarros/cysnetCRUD/tree/master">Repositorio de github</a></div>
</div>
</body>
</html>