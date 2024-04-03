<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/scriptDepartamentoEmpleados.js" async></script>
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Editar un empleado que pertenezca a un departamento</title>
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
    
    
        <form method="GET">
            <label for="codCentro">Codigo del departamento: </label>
            <input type="text" id="codCentro" name="codCentro">
            <br>
            <label for="codEmpleado">Codigo del empleado: </label>
            <input type="text" id="codEmpleado" name="codEmpleado">
            <br>
            <label for="fechaFin">Fecha final: </label>
            <input type="text" id="fechaFin" name="fechaFin">
            <br>
            <label for="dptPrincipal">Es un departamento principal?</label>
            <input type="checkbox" id="dptPrincipal" name="dptPrincipal">
            <br>
            <input type="submit" value="Crear departamento" name="enviar">
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
            }    @endphp
    
        <p>{{$nuevoEmpleadoDepartamento}}</p>
</div>

<div class="footer">
    <div class="footer-content">Hecho por Alberto Navarro | <a href="https://github.com/anavarros/cysnetCRUD/tree/master">Repositorio de github</a></div>
</div>
</body>
</html>