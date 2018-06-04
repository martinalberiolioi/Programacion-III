function AdministrarValidaciones() {
    var dni = Number(document.getElementById("txtDni").value);
    var legajo = Number(document.getElementById("txtLegajo").value);
    var sueldo = Number(document.getElementById("txtSueldo").value);
    var sexo = (document.getElementById("cboSexo").value);
    var sueldoMaximo = ObtenerSueldoMaximo(ObtenerTurnoSeleccionado());
    /*AdministrarSpanError("txtDni",!(ValidarCamposVacios(dni.toString())));
    AdministrarSpanError("txtApellido",!(ValidarCamposVacios(apellido)));
    AdministrarSpanError("txtNombre",!(ValidarCamposVacios(nombre)));
    AdministrarSpanError("txtLegajo",!(ValidarCamposVacios(legajo.toString())));
    AdministrarSpanError("txtSueldo",!(ValidarCamposVacios(sueldo.toString())));
    AdministrarSpanError("cboSexo",!(ValidarCamposVacios(sexo.toString())));*/
    AdministrarSpanError("txtDni", !(ValidarCamposVacios("txtDni")));
    AdministrarSpanError("txtApellido", !(ValidarCamposVacios("txtApellido")));
    AdministrarSpanError("txtNombre", !(ValidarCamposVacios("txtNombre")));
    AdministrarSpanError("txtLegajo", !(ValidarCamposVacios("txtLegajo")));
    AdministrarSpanError("txtSueldo", !(ValidarCamposVacios("txtSueldo")));
    AdministrarSpanError("cboSexo", !(ValidarCamposVacios("cboSexo")));
    AdministrarSpanError("cboSexo", !(ValidarCombo("cboSexo", "---")));
    AdministrarSpanError("foto", !(ValidarCamposVacios("foto")));
    AdministrarSpanError("txtDni", !(ValidarRangoNumerico(dni, 1000000, 55000000)));
    AdministrarSpanError("txtLegajo", !(ValidarRangoNumerico(legajo, 100, 550)));
    AdministrarSpanError("txtSueldo", !(ValidarRangoNumerico(sueldo, 8000, sueldoMaximo)));
    return VerificarValidacionesLogin();
    /*if(!(ValidarCamposVacios("txtDni") && ValidarCamposVacios("txtApellido") && ValidarCamposVacios("txtNombre") && ValidarCamposVacios("txtLegajo") && ValidarCamposVacios("txtSueldo")))
    {
        console.log("No se permiten campos vacios. Complete todos los campos");
        alert("No se permiten campos vacios. Complete todos los campos");
    }
    else //primero chequea que no haya campos vacios, asi no tira todos los errores de una
    {
        if(!(ValidarRangoNumerico(dni, 1000000, 55000000)))
        {
            console.log("El DNI ingresado no esta dentro de los valores permitidos (minimo: 1.000.000, maximo: 55.000.000). Reingrese DNI");
            alert("El DNI ingresado no esta dentro de los valores permitidos (minimo: 1.000.000, maximo: 55.000.000). Reingrese DNI");
        }

        if(!(ValidarRangoNumerico(legajo, 100, 550)))
        {
            console.log("El legajo ingresado no esta dentro de los valores permitidos (minimo: 100, maximo: 550). Reingrese legajo");
            alert("El legajo ingresado no esta dentro de los valores permitidos (minimo: 100, maximo: 550). Reingrese legajo");
        }

        if(!ValidarRangoNumerico(sueldo, 8000, sueldoMaximo))
        {
            console.log("El sueldo ingresado no esta dentro de los valores permitidos (minimo: 8000, maximo: "+sueldoMaximo+"). Reingrese sueldo");
            alert("El sueldo ingresado no esta dentro de los valores permitidos (minimo: 8000, maximo: "+sueldoMaximo+"). Reingrese sueldo");
        }

        if(!ValidarCombo("cboSexo", "---"))
        {
            console.log("No se ha seleccionado un sexo. Seleccione un sexo");
            alert("No se ha seleccionado un sexo. Seleccione un sexo");
        }

    }*/
}
function AdministrarValidacionesLogin() {
    var dni = Number(document.getElementById("txtDni").value);
    var apellido = (document.getElementById("txtApellido").value);
    //AdministrarSpanError("txtDni",!(ValidarCamposVacios(dni.toString())));
    AdministrarSpanError("txtDni", !(ValidarCamposVacios("txtDni")));
    AdministrarSpanError("txtDni", !(ValidarRangoNumerico(dni, 1000000, 55000000)));
    AdministrarSpanError("txtApellido", !(ValidarCamposVacios("txtApellido")));
    return VerificarValidacionesLogin();
}
function ValidarCamposVacios(valorCampo) {
    if (document.getElementById(valorCampo).value != "") {
        return true;
    }
    return false;
}
function ValidarRangoNumerico(aValidar, min, max) {
    if (aValidar >= min && aValidar <= max) {
        return true;
    }
    return false;
}
function ValidarCombo(valorCampo, valorANoTener) {
    if (document.getElementById(valorCampo).value != valorANoTener) {
        return true;
    }
    return false;
}
function ObtenerTurnoSeleccionado() {
    if (document.getElementById("rdoTurnoMañana").checked) {
        return "Mañana";
    }
    else if (document.getElementById("rdoTurnoTarde").checked) {
        return "Tarde";
    }
    else {
        return "Noche";
    }
}
function ObtenerSueldoMaximo(turnoElegido) {
    if (turnoElegido == "Mañana") {
        return 20000;
    }
    else if (turnoElegido == "Tarde") {
        return 18500;
    }
    else {
        return 25000;
    }
}
function AdministrarSpanError(id, ocultar) {
    if (ocultar) {
        document.getElementById(id).nextElementSibling.style.display = "block";
    }
    else {
        document.getElementById(id).nextElementSibling.style.display = "none";
    }
}
function VerificarValidacionesLogin() {
    var boolRetorno = true;
    var span = document.querySelectorAll("span");
    for (var i = 0; i < span.length; i++) {
        if (span[i].style.display == "block") {
            boolRetorno = false;
            break;
        }
    }
    return boolRetorno;
}
function AdministrarModificar(dniEmpleado) {
    document.getElementById("hdnModificar").value = dniEmpleado;
    document.getElementById("frmModificar").submit();
}
function ModificarEmpleado(dni, apellido, nombre, sexo, legajo, sueldo, turno) {
    var turnoSeleccionado = turno;
    var sexoSeleccionado = 0;
    switch (sexo) {
        case "M":
            sexoSeleccionado = 1;
            break;
        case "F":
            sexoSeleccionado = 2;
            break;
    }
    switch (turno) {
        case "Mañana":
            turnoSeleccionado = "Mañana";
            break;
        case "Tarde":
            turnoSeleccionado = "Tarde";
            break;
        case "Noche":
            turnoSeleccionado = "Noche";
            break;
    }
    document.title = "HTML5 - Formulario Modificar Empleado";
    document.getElementById("tituloForm").innerHTML = "Modificar Empleado";
    document.getElementById("btnEnviar").value = "Modificar";
    document.getElementById("txtDni").value = dni;
    document.getElementById("txtDni").readOnly = true;
    document.getElementById("txtApellido").value = apellido;
    document.getElementById("txtNombre").value = nombre;
    document.getElementById("cboSexo").selectedIndex = sexoSeleccionado;
    document.getElementById("txtLegajo").value = legajo;
    document.getElementById("txtLegajo").readOnly = true;
    document.getElementById("txtSueldo").value = sueldo;
    document.getElementById("hdnModificar").value = dni;
    switch (turnoSeleccionado) {
        case "Mañana":
            document.getElementById("rdoTurnoMañana").checked = true;
            break;
        case "Tarde":
            document.getElementById("rdoTurnoTarde").checked = true;
            break;
        case "Noche":
            document.getElementById("rdoTurnoNoche").checked = true;
            break;
    }
    //(<HTMLSelectElement>document.getElementById(turnoSeleccionado)).selected = turno;
}
