alert("asdadas");
function mostrar_empleado() {
    let codigoEmpleado = document.getElementById('codigoEmpleado').value;
    let divEmpleado = document.getElementById('empleado');

    divEmpleado.innerHTML += "@php $empleado = App\Http\Controllers\EmpleadoController::getEmpleado("+codigoEmpleado+"); @endphp; "; 
    divEmpleado.innerHTML += "<p>{{$empleado}}</p>";
}