@extends('../templates/template')
@section('content')
        <div class="sub-header">
            <div class="breadcrumbs"> Inicio > Departamentos > Ver un departamento</div>
            <div class="options">
                <a href="{{@route('departamentos')}}">Volver a departamentos</a>
                <span>|</span>
                <a href="{{@route('ver_departamentos')}}">Ver todos los departamentos</a>
            </div>
        </div>
    </header>
    <div class="content">
        <h1>Ver un departamento</h1>
        <h2>Informacion del departamento</h2>

        <form method="GET">
            <label for="codigo_departamento">Introduzca el codigo del departamento que quiera ver:</label>
            <input type="text" id="codigo_departamento" name="codigo_departamento" placeholder="codigo del departamento">
            <input class='submit-btn' type="submit" value="ver departamento" name="enviar">
        </form>

        <div id="departamento">
            @php
                $mensaje = "";
                $departamento = "";
                $id = "";
                //Compruebo si el formulario se ha enviado
                if(isset($_GET['enviar'])) {
                    //Si se ha enviado, creo una variable con el valor del input introducido por el usuario y compruebo si existe
                    $id = $_GET['codigo_departamento'];
                    if(isset($id) && $id !== "") {
                        //Si existe, intento encontrar la informacion del departamento llamando a dicha funcion en su controlador, en caso contrario, mando un mensaje avisando de que dicho departamento no existe.
                        try {
                            $departamento = App\Http\Controllers\DepartamentoController::getDepartamento($id);
                            $mensaje = "Información del departamento ".$id.":";
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