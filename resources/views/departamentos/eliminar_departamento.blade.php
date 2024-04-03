@extends('../templates/template')
@section('content')
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Departamentos > Eliminar un departamento</div>
            <div class="options">
                <a href="{{@route('departamentos')}}">Volver a departamentos</a>
                <span>|</span>
                <a href="{{@route('ver_departamentos')}}">Ver todos los departamentos</a>
            </div>
        </div>
    </header>
    <div class="content">
        <h1>Ver un departamento</h1>
        <h2>Indica que departamento quieres eliminar</h2>

        <form method="GET">
            <label for="codigo_departamento">Introduzca el codigo del departamento que quiera eliminar:</label>
            <input type="text" id="codigo_departamento" name="codigo_departamento" placeholder="codigo del departamento...">
            <input type="submit" class='submit-btn' value="eliminar departamento" name="enviar">
        </form>

        <div id="departamento">
            @php
                $mensaje = "";
                //Compruebo si el formulario se ha enviado
                if(isset($_GET['enviar'])) {
                    //Si se ha enviado, creo una variable con el valor del input introducido por el usuario y compruebo si existe
                    $id = $_GET['codigo_departamento'];
                    if(isset($id) && $id !== "") {
                        //Si existe, intento encontrar la informacion del empleado llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                        try {
                            $departamento = App\Http\Controllers\DepartamentoController::deleteDepartamento($id);
                            $mensaje = "El departamento con id: ".$id." ha sido borrado exitosamente";
                        } catch(Exception $e) {
                            $mensaje = "El departamento no ha podido ser borrado por que no existe";
                        }
                    }
                }
            @endphp
            <p>{{$mensaje}}</p>
        </div>
    </div>
@endsection