
window.onload = function() {

    //Primero obtengo todos los empleados y quito los 13 primeros caracteres que no los necesitaré para mostrar
    let empleados = document.getElementById('empleados').innerHTML;
    empleados = empleados.substring(13);
    
    //A continuacion hago un substring para obtener el bloque donde salen los usuarios totales y le quito el principio para solo quedarme con el numero
    let empleadosTotales = empleados.substring(empleados.length -10, empleados.length - 1);
    empleadosTotales = empleadosTotales.replace('total\":', "");

    //Ahora simplemente obtengo todos los datos que me interesan del string y quito los caracteres de llaves
    empleados = empleados.substring(0, empleados.length -12);
    let arrayEmpleados = empleados.split("{");

    //Ahora creo una nueva variable donde ire concatenando etiquetas html para crear una tabla
    tablaEmpleados = "<table class='tabla-all'>";
    tablaEmpleados += "<tr class='all-headers'><th>ID</th><th>Codigo Empleado</th><th>Codigo Usuario</th><th>Email</th><th>Fecha Activacion</th><th>Fecha desactivacion</th><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th></tr>"
    
    //Recorro todo el array de empleados y separo este array todo por comas para poder obtener todos los atributos de cada empleado
    for(let i = 1; i <= arrayEmpleados.length -1; i++) {
        let attrEmpleado = arrayEmpleados[i].split(",");
        tablaEmpleados += "<tr class='tr-data'>";

        //Recorro ahora cada empleado, compruebo si es un campo que me interese (si no, simplemente continuo en la siguiente iteracion) y me encargo de decorar el atributo para que no queden caracteres de puntuacion o informacion irrelevante
        for(let j = 0; j <= attrEmpleado.length - 2; j++) {
            if(attrEmpleado[j].includes('codUserAdd') || attrEmpleado[j].includes('codUserAdd') || attrEmpleado[j].includes('codUserUpd') || attrEmpleado[j].includes('fecAdd') || attrEmpleado[j].includes('fecUpd') || attrEmpleado[j].includes('_class')) {
                continue;
            }
            let posicionBorrar = attrEmpleado[j].indexOf(':');
            let atributoEmpleado = attrEmpleado[j].substring(posicionBorrar + 1, attrEmpleado[j].length);
            atributoEmpleado = atributoEmpleado.replaceAll(/["]/g," ");
            tablaEmpleados += "<td>"+atributoEmpleado+"</td>";
        }
        tablaEmpleados += "</tr>";
    }

    //Creo una ultima fila con el numero total de empleados
    tablaEmpleados += "<th class='all-headers' colspan='2'>Numero de empleados totales</th><th class='nTotales' colspan='9'>"+empleadosTotales+"</th>";
    tablaEmpleados += "</table>";

    //Hago una variable que es una nueva lista que apunte a un span vacio y le asigno el valor de toda la cadena que he ido creando
    let nuevaLista = document.getElementById('listaEmpleados');
    nuevaLista.innerHTML = tablaEmpleados;
    nuevaLista.innerHTML.replaceAll(/["]/g," ");

}
