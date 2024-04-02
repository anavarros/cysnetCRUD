window.onload = function() {


    let idHidden = document.getElementById('infoId').innerHTML;
    let informacionTitulo = document.getElementById('informacionHidden');
    let listaAtributos = document.getElementById('listaAtributos');
    if(idHidden === "") {
        informacionTitulo.style.display = "none";
        listaAtributos.style.display = "none";
    } else {
        informacionTitulo.style.display = "block";
        listaAtributos.style.display = "block";

    }



    //Primero obtengo todos los empleados y quito los 13 primeros caracteres que no los necesitaré para mostrar
    let objeto = document.getElementById('objeto').innerHTML;
    objeto = objeto.substring(2, objeto.length - 1);

    let arrAttrEmpleado = objeto.split(",");
    listaAttrEmpleado = "<ul>";
    for(let j = 0; j <= arrAttrEmpleado.length - 1; j++) {
        let atributo = arrAttrEmpleado[j].replaceAll(/["]/g," ");
        listaAttrEmpleado += "<li>"+atributo+"</li>";
    }
    //Compruebo si la busqueda ha dado algun resultado, si no es asi, cambio la lista para informar de ello
    if(listaAttrEmpleado === "<ul><li></li>") {
        listaAttrEmpleado = "<ul><li>El empleado dado no existe</li>";
    }

    listaAttrEmpleado += "</ul>";
    listaAtributos.innerHTML = listaAttrEmpleado;
    

}

//

function mostrarEmpleado() {
    let informacionTitulo = document.getElementById('informacionEmpleadoHidden');
    informacionTitulo.style.display = "block";
}
