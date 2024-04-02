
window.onload = function() {

    //Obtengo todos los departamentos y quito los 13 primeros caracteres que no los utilizaré
    let departamentos = document.getElementById('departamentos').innerHTML;
    departamentos = departamentos.substring(13);

    //A continuacion hago un substring para conseguir el numero de departamentos totales
    let departamentosTotales = departamentos.substring(departamentos.length -10, departamentos.length - 1);
    departamentosTotales = departamentosTotales.replace('total\":', "");

    //Ahora hago un substring que me obtenga un array de todos los departamentos
    departamentos = departamentos.substring(0, departamentos.length -12);
    arrayDepartamentos = departamentos.split("{");

    //Hago una nueva variable donde voy concatenando etiquetas html para crear una tabla
    tablaDepartamentos = "<table class='table'>";
    tablaDepartamentos += "<tr><th>ID</th><th>Codigo Centro</th><th>Codigo Departamento</th><th>Fecha fin</th><th>Fecha inicio</th><th>Nombre</th></tr>"

    //Recorro todo el array de departamentos y separo cada departamento por comas para obtener un array con cada atributo de dicho departamento
    for(let i = 1; i <= arrayDepartamentos.length -2; i++) {
        let attrDepartamento = arrayDepartamentos[i].split(",");
        tablaDepartamentos += "<tr>";

        //Ahora recorro cada atributo del departamento y compruebo si el atributo me interesa (si no, itero otra) y decoro para que no quede ningun simbolo e introduzco en la tabla el atributo
        for(let j = 0; j <= attrDepartamento.length - 2; j++) {
            if(attrDepartamento[j].includes('codUserAdd') || attrDepartamento[j].includes('codUserAdd') || attrDepartamento[j].includes('codUserUpd') || attrDepartamento[j].includes('fecAdd') || attrDepartamento[j].includes('fecUpd') || attrDepartamento[j].includes('_class')) {
                continue;
            }
            let posicionBorrar = attrDepartamento[j].indexOf(':');
            let atributoDepartamento = attrDepartamento[j].substring(posicionBorrar + 1, attrDepartamento[j].length);
            atributoDepartamento = atributoDepartamento.replaceAll(/["]/g," ");
            tablaDepartamentos += "<td>"+atributoDepartamento+"</td>";
        }
        tablaDepartamentos += "</tr>";
    }

    //Creo una ultima fila con el numero total de departamentos
    tablaDepartamentos += "<th colspan='2'>Numero de departamentos totales</th><td colspan='9'>"+departamentosTotales+"</td>";
    tablaDepartamentos += "</table>";
    //Hago una variable que es una nueva lista que apunte a un span vacio y le asigno el valor de toda la cadena que he ido creando
    let nuevaLista = document.getElementById('listaDepartamentos');
    nuevaLista.innerHTML = tablaDepartamentos;
    nuevaLista.innerHTML.replaceAll(/["]/g," ");

}