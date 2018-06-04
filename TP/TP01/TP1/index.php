<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 – Formulario Alta Empleado</title>
    <script src="./javascript/funciones.js"></script>
</head>
<body>
    <h2 style="position:absolute;left:33%">Alta de Empleados</h2>
    <form method="POST" enctype="multipart/form-data" action="./php/administracion.php" onsubmit="return AdministrarValidaciones()">
        <table align="center">
            <tr>
                <td>
                    <br><br>
                    <h4 align="center">Datos personales</h4>
                </td>
                
            </tr>
            <tr>
                <td>
                    <hr width="320%">
                </td>
            </tr>
            <tr>
                <td>
                    DNI: 
                </td>
                <td>
                    <input type="number" id="txtDni" name="txtDni" min="1000000" max="55000000">
                    <span style="display:none">*</span>
                </td>
            </tr>

            <tr>
                <td>
                    Apellido:
                </td>
                <td>
                    <input type="text" id="txtApellido" name="txtApellido">
                    <span style="display:none">*</span>
                </td>
            </tr>
            
            <tr>
                <td>
                    Nombre:
                </td>
                <td>
                    <input type="text" id="txtNombre" name="txtNombre">
                    <span style="display:none">*</span>
                </td>
            </tr>

            <tr>
                <td>
                    Sexo:
                </td>
                <td>
                    <select id="cboSexo" name="cboSexo">
                        <option value="---" selected>Seleccione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                    <span style="display:none">*</span>
                </td>
            </tr>
            
            <tr>
                <td>
                    <h4 align="center">Datos Laborales</h4>
                </td>                
            </tr>
            
            <tr>
                <td>
                    <hr width="320%">
                </td>
            </tr>
            
            <tr>
                <td>
                    Legajo:
                </td>
                <td>
                    <input type="number" id="txtLegajo" name="txtLegajo" min="100" max="550">
                    <span style="display:none">*</span>
                </td>
            </tr>

            <tr>
                <td>
                    Sueldo:
                </td>
                <td>
                    <input type="number" id="txtSueldo" name="txtSueldo" min="8000" step="500" max="25000">
                    <span style="display:none">*</span>
                </td>
            </tr>

            <tr>
                <td>
                    Turno:
                </td>
            </tr>

            <tr>
                <td>
                    <td>
                        <input type="radio" id="rdoTurnoMañana" name="rdoTurno" value="Mañana" checked>Mañana<br/>
                        <input type="radio" id="rdoTurnoTarde" name="rdoTurno" value="Tarde">Tarde<br/>
                        <input type="radio" id="rdoTurnoNoche" name="rdoTurno" value="Noche">Noche
                    </td>                           
                </td>
            </tr>
            <tr>
                <td>
                    Foto:
                </td>
            </tr>

            <tr>
                <td>
                    <td>
                        <input type="file" id="foto" name="foto">
                        <span style="display:none">*</span>
                    </td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <hr width="320%">
                </td>
            </tr>

            <tr>
                <td>
                    <td>
                        <input style="float:right" type="reset" id="btnLimpiar" name="btnLimpiar" value="Limpiar">
                    </td>
                    
                </td>
            </tr>
            <br>
            <tr>
                <td>
                    <td>
                        <input style="float:right" type="submit" id="btnEnviar" name="btnEnviar" value="Enviar">
                    </td>                    
                </td>
            </tr>           
        </table>
    </form>
    <a href="./php/cerrarSesion.php">Desloguearse</a>
</body>
</html>