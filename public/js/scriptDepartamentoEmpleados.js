
window.onload = function() {
    
    //Primero obtengo todos los empleados y quito los 13 primeros caracteres que no los necesitaré para mostrar
    let departamentosEmpleados = document.getElementById('departamentosEmpleados').innerHTML;
    departamentosEmpleados = departamentosEmpleados.substring(13);
    
    //A continuacion hago un substring para obtener el bloque donde salen los usuarios totales y le quito el principio para solo quedarme con el numero
    let departamentosEmpleadosTotales = departamentosEmpleados.substring(departamentosEmpleados.length -10, departamentosEmpleados.length - 1);
    departamentosEmpleadosTotales = departamentosEmpleadosTotales.replace('total\":', "");

    //Ahora simplemente obtengo todos los datos que me interesan del string y quito los caracteres de llaves
    departamentosEmpleados = departamentosEmpleados.substring(0, departamentosEmpleados.length -12);
    arrayDepartamentosEmpleados = departamentosEmpleados.split("{");

    //Ahora creo una nueva variable donde ire concatenando etiquetas html para crear una tabla
    tablaDepartamentosEmpleados = "<table class='table'>";
    tablaDepartamentosEmpleados += "<tr><th>ID</th><th>Codigo departamento</th><th>Codigo Empleado</th><th>¿Departamento principal?</th><th>Fecha desactivacion</th><th>Fecha Activacion</th></tr>"

    //Recorro todo el array de empleados y separo este array todo por comas para poder obtener todos los atributos de cada empleado
    for(let i = 1; i <= arrayDepartamentosEmpleados.length -1; i++) {
        let attrDepartamentosEmpleado = arrayDepartamentosEmpleados[i].split(",");
        tablaDepartamentosEmpleados += "<tr>";

        //Recorro ahora cada empleado, compruebo si es un campo que me interese (si no, simplemente continuo en la siguiente iteracion) y me encargo de decorar el atributo para que no queden caracteres de puntuacion o informacion irrelevante
        for(let j = 0; j <= attrDepartamentosEmpleado.length - 2; j++) {
            if(attrDepartamentosEmpleado[j].includes('codUserAdd') || attrDepartamentosEmpleado[j].includes('codUserAdd') || attrDepartamentosEmpleado[j].includes('codUserUpd') || attrDepartamentosEmpleado[j].includes('fecAdd') || attrDepartamentosEmpleado[j].includes('fecUpd') || attrDepartamentosEmpleado[j].includes('_class')) {
                continue;
            }
            let posicionBorrar = attrDepartamentosEmpleado[j].indexOf(':');
            let atributoDepartamentoEmpleado = attrDepartamentosEmpleado[j].substring(posicionBorrar + 1, attrDepartamentosEmpleado[j].length);
            atributoDepartamentoEmpleado = atributoDepartamentoEmpleado.replaceAll(/["]/g," ");
            tablaDepartamentosEmpleados += "<td>"+atributoDepartamentoEmpleado+"</td>";
        }
        tablaDepartamentosEmpleados += "</tr>";
    }

    //Creo una ultima fila con el numero total de empleados
    tablaDepartamentosEmpleados += "<th colspan='2'>Numero de empleados de departamentos totales</th><td colspan='9'>"+departamentosEmpleadosTotales+"</td>";
    tablaDepartamentosEmpleados += "</table>";

    //Hago una variable que es una nueva lista que apunte a un span vacio y le asigno el valor de toda la cadena que he ido creando
    let nuevaLista = document.getElementById('listaDepartamentosEmpleados');
    nuevaLista.innerHTML = tablaDepartamentosEmpleados;
    nuevaLista.innerHTML.replaceAll(/["]/g," ");

}
