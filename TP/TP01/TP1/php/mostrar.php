<?php

    session_start();
    include "Empleado.php";
    include "Fabrica.php";
    include "validarSesion.php";

    $archivo = fopen("../archivos/empleados.txt", "r");

    $body =

    '<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>HTML 5 – Listado de Empleados</title>
        <script type="text/javascript" src="../javascript/funciones.js"></script>
    </head>
    <body>
    <h2 style="position:absolute;left:33%">Listado de Empleados</h2>
        <table align="center">
            <tr>
                <td>
                    <br>
                    <h4 align="center">Info</h4>
                </td>                    
            </tr>
            <tr>
                <td>
                    <hr width="118%">
                </td>
            </tr>

    ';

    //while(!feof($archivo))
    //{
        $auxiliar = explode(" - ",fgets($archivo));

        if(trim($auxiliar[0]) != "")
        {
            //$unEmpleado = new Empleado($auxiliar[0], $auxiliar[1], $auxiliar[2], $auxiliar[3], $auxiliar[4], $auxiliar[5], $auxiliar[6]);
            //echo($unEmpleado->ToString()."<a href=\"eliminar.php?legajo=".$unEmpleado->GetLegajo()."\">Eliminar</a>"."<br/>");
            $unaFabrica = new Fabrica("Hardcor", 7);
            $unaFabrica->TraerDeArchivo();
            $arrayEmpleados = $unaFabrica->GetEmpleados();

            foreach($arrayEmpleados as $unEmpleado)
            {
                $body .=  
                '
                <tr>
                    <td>                        
                        '.($unEmpleado->ToString()).'
                        <td>
                            <img src='.$unEmpleado->GetPathFoto().'.jpg alt='.$unEmpleado->GetApellido().' style=width:90px;height:90px;></td><td>
                        </td>
                        <td>
                            <a href="./eliminar.php?legajo='.$unEmpleado->GetLegajo().'">Eliminar</a>
                        </td>
                        <td>
                            <input type="button" id="btnModificar" name="btnModificar" value="Modificar" onclick="AdministrarModificar('.$unEmpleado->GetDni().')">
                        </td>
                    </td>
                </tr>
                <br/>
                ';
            }   
            
        }
    //}

    $body .= '
    <tr>
        <td>
            <hr width="118%">
        </td>
    </tr>
    </table>
        <form action="./index.php" method="POST" id="frmModificar">
            <input type="hidden" id="hdnModificar" name="hdnModificar" value="1">
        </form>
    </body>
    </html>';

    fclose($archivo);
    echo $body;
    echo "</br><a href=\"..\index.php\">Alta de Empleados</a>";
    echo "<br/></br><a href=\".\cerrarSesion.php\">Desloguearse</a>";


?>