function AdministrarValidaciones()
{
    var dni = Number((<HTMLInputElement>document.getElementById("txtDni")).value);
    var legajo = Number((<HTMLInputElement>document.getElementById("txtLegajo")).value);
    var sueldo = Number((<HTMLInputElement>document.getElementById("txtSueldo")).value);
    var sexo:string=((<HTMLInputElement>document.getElementById("cboSexo")).value);
    var sueldoMaximo = ObtenerSueldoMaximo(ObtenerTurnoSeleccionado());   
   
    /*AdministrarSpanError("txtDni",!(ValidarCamposVacios(dni.toString())));
    AdministrarSpanError("txtApellido",!(ValidarCamposVacios(apellido)));
    AdministrarSpanError("txtNombre",!(ValidarCamposVacios(nombre)));
    AdministrarSpanError("txtLegajo",!(ValidarCamposVacios(legajo.toString())));
    AdministrarSpanError("txtSueldo",!(ValidarCamposVacios(sueldo.toString())));
    AdministrarSpanError("cboSexo",!(ValidarCamposVacios(sexo.toString())));*/

    AdministrarSpanError("txtDni", !(ValidarCamposVacios("txtDni")));
    AdministrarSpanError("txtApellido",!(ValidarCamposVacios("txtApellido")));
    AdministrarSpanError("txtNombre",!(ValidarCamposVacios("txtNombre")));
    AdministrarSpanError("txtLegajo",!(ValidarCamposVacios("txtLegajo")));
    AdministrarSpanError("txtSueldo",!(ValidarCamposVacios("txtSueldo")));
    AdministrarSpanError("cboSexo",!(ValidarCamposVacios("cboSexo")));
    AdministrarSpanError("cboSexo",!(ValidarCombo("cboSexo", "---")));
    AdministrarSpanError("foto",!(ValidarCamposVacios("foto")));

    AdministrarSpanError("txtDni",!(ValidarRangoNumerico(dni, 1000000, 55000000)));
    AdministrarSpanError("txtLegajo",!(ValidarRangoNumerico(legajo, 100, 550)));
    AdministrarSpanError("txtSueldo",!(ValidarRangoNumerico(sueldo, 8000, sueldoMaximo)));

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

function AdministrarValidacionesLogin()
{
    var dni = Number((<HTMLInputElement>document.getElementById("txtDni")).value);
    var apellido : string = ((<HTMLInputElement>document.getElementById("txtApellido")).value);

    //AdministrarSpanError("txtDni",!(ValidarCamposVacios(dni.toString())));
    AdministrarSpanError("txtDni",!(ValidarCamposVacios("txtDni")));
    AdministrarSpanError("txtDni",!(ValidarRangoNumerico(dni, 1000000, 55000000)));
    AdministrarSpanError("txtApellido",!(ValidarCamposVacios("txtApellido")));

    return VerificarValidacionesLogin();
}


function ValidarCamposVacios(valorCampo:string):boolean
{
    if((<HTMLInputElement>document.getElementById(valorCampo)).value != "")
    {
        return true;
    }

    return false;    
}

function ValidarRangoNumerico(aValidar:number, min:number, max:number):boolean
{
    if(aValidar >= min && aValidar <= max)
    {
        return true;
    }

    return false;
}

function ValidarCombo(valorCampo:string, valorANoTener:string):boolean
{
    if((<HTMLInputElement>document.getElementById(valorCampo)).value != valorANoTener)
    {
        return true;
    }

    return false;
}

function ObtenerTurnoSeleccionado():string
{
    if((<HTMLInputElement>document.getElementById("rdoTurnoMañana")).checked)
    {
        return "Mañana";
    }
    else if((<HTMLInputElement>document.getElementById("rdoTurnoTarde")).checked) 
    {
        return "Tarde";
    }
    else 
    {
        return "Noche";
    }
}

function ObtenerSueldoMaximo(turnoElegido:string):number
{
    if (turnoElegido == "Mañana") 
    {
        return 20000;
    }
    else if (turnoElegido == "Tarde") 
    {
        return 18500;
    }
    else 
    {
        return 25000;
    }
}

function AdministrarSpanError(id:string, ocultar:boolean)
{
    
    if(ocultar)
    {
        (<HTMLElement> (<HTMLElement> document.getElementById(id)).nextElementSibling).style.display = "block";
    }
    else
    {
        (<HTMLElement> (<HTMLElement> document.getElementById(id)).nextElementSibling).style.display = "none";
    }
}

function VerificarValidacionesLogin():boolean
{
    
    var boolRetorno = true;
    var span:NodeList = document.querySelectorAll("span");

    for(var i = 0;i < span.length; i++)
    {
        if((<HTMLSpanElement>span[i]).style.display == "block")
        {
            boolRetorno=false;
            break;
        }
    }
    return boolRetorno;
}

function AdministrarModificar(dniEmpleado: string)
{
    (<HTMLInputElement>document.getElementById("hdnModificar")).value = dniEmpleado;
    (<HTMLFormElement>document.getElementById("frmModificar")).submit();
}

function ModificarEmpleado(dni: string, apellido: string, nombre: string, sexo: string, legajo: string, sueldo: string, turno: string): void
{
    var turnoSeleccionado = turno;
    var sexoSeleccionado = 0;

    switch (sexo)
    {
        case "M":
            sexoSeleccionado = 1;
            break;

        case "F":
            sexoSeleccionado = 2;
            break;
    }

    switch (turno)
    {
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

    (<HTMLElement>document.getElementById("tituloForm")).innerHTML = "Modificar Empleado";
    (<HTMLInputElement>document.getElementById("btnEnviar")).value = "Modificar";

    (<HTMLInputElement>document.getElementById("txtDni")).value = dni;
    (<HTMLInputElement>document.getElementById("txtDni")).readOnly = true;
    (<HTMLInputElement>document.getElementById("txtApellido")).value = apellido;
    (<HTMLInputElement>document.getElementById("txtNombre")).value = nombre;
    (<HTMLSelectElement>document.getElementById("cboSexo")).selectedIndex = sexoSeleccionado;
    (<HTMLInputElement>document.getElementById("txtLegajo")).value = legajo;
    (<HTMLInputElement>document.getElementById("txtLegajo")).readOnly = true;
    (<HTMLInputElement>document.getElementById("txtSueldo")).value = sueldo;
    (<HTMLInputElement>document.getElementById("hdnModificar")).value = dni;

    switch(turnoSeleccionado)
    {
        case "Mañana":
            (<HTMLInputElement>document.getElementById("rdoTurnoMañana")).checked = true;
            break;

        case "Tarde":
        (<HTMLInputElement>document.getElementById("rdoTurnoTarde")).checked = true;
            break;

        case "Noche":
        (<HTMLInputElement>document.getElementById("rdoTurnoNoche")).checked = true;
            break;
    }
    //(<HTMLSelectElement>document.getElementById(turnoSeleccionado)).selected = turno;


}
