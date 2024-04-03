
window.onload = function() {
    if(window.location.href.indexOf("todos_los_empleados") > -1) {
        crearTablaEmpleados();
    } else if(window.location.href.indexOf("todos_los_departamentos") > -1) {
        crearTablaDepartamentos();
    } else if(window.location.href.indexOf("ver_empleados_departamentos") > -1) {
        crearTablaEmpleadosDepartamentos();
    }

    unDato();
}


function crearTablaEmpleados() {
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
    tablaEmpleados += "<tr class='all-headers'><th class='table-th'>ID</th><th class='table-th'>Codigo Empleado</th><th class='table-th'>Codigo Usuario</th><th class='table-th'>Email</th><th class='table-th'>Fecha Activacion</th><th class='table-th'>Fecha desactivacion</th><th class='table-th'>Nombre</th><th class='table-th'>Primer Apellido</th><th class='table-th'>Segundo Apellido</th></tr>"
    
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



function crearTablaDepartamentos() {
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
    tablaDepartamentos = "<table class='tabla-all'>";
    tablaDepartamentos += "<tr class='all-headers'><th class='table-th'>ID</th><th class='table-th'>Codigo Centro</th><th class='table-th'>Codigo Departamento</th><th class='table-th'>Fecha fin</th><th class='table-th'>Fecha inicio</th><th class='table-th'>Nombre</th></tr>"

    //Recorro todo el array de departamentos y separo cada departamento por comas para obtener un array con cada atributo de dicho departamento
    for(let i = 1; i <= arrayDepartamentos.length -2; i++) {
        let attrDepartamento = arrayDepartamentos[i].split(",");
        tablaDepartamentos += "<tr class='tr-data'>";

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
    tablaDepartamentos += "<th class='all-headers' colspan='2'>Numero de departamentos totales</th><th class='nTotales' colspan='9'>"+departamentosTotales+"</th>";
    tablaDepartamentos += "</table>";
    //Hago una variable que es una nueva lista que apunte a un span vacio y le asigno el valor de toda la cadena que he ido creando
    let nuevaLista = document.getElementById('listaDepartamentos');
    nuevaLista.innerHTML = tablaDepartamentos;
    nuevaLista.innerHTML.replaceAll(/["]/g," ");
}



function crearTablaEmpleadosDepartamentos() {
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
        tablaDepartamentosEmpleados = "<table class='tabla-all'>";
        tablaDepartamentosEmpleados += "<tr class='all-headers'><th>ID</th><th>Codigo departamento</th><th>Codigo Empleado</th><th>¿Departamento principal?</th><th>Fecha desactivacion</th><th>Fecha Activacion</th></tr>"
    
        //Recorro todo el array de empleados y separo este array todo por comas para poder obtener todos los atributos de cada empleado
        for(let i = 1; i <= arrayDepartamentosEmpleados.length -1; i++) {
            let attrDepartamentosEmpleado = arrayDepartamentosEmpleados[i].split(",");
            tablaDepartamentosEmpleados += "<tr class='tr-data'>";
    
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
        tablaDepartamentosEmpleados += "<th class='all-headers' colspan='2'>Numero de empleados de departamentos totales</th><td class='nTotales' colspan='9'>"+departamentosEmpleadosTotales+"</td>";
        tablaDepartamentosEmpleados += "</table>";
    
        //Hago una variable que es una nueva lista que apunte a un span vacio y le asigno el valor de toda la cadena que he ido creando
        let nuevaLista = document.getElementById('listaDepartamentosEmpleados');
        nuevaLista.innerHTML = tablaDepartamentosEmpleados;
        nuevaLista.innerHTML.replaceAll(/["]/g," ");
}

function unDato() {
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

function mostrarEmpleado() {
    let informacionTitulo = document.getElementById('elementoHidden');
    informacionTitulo.style.display = "block";
}
