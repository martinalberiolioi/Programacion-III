<?php
    include "Empleado.php";
    include "Fabrica.php";
    
    if(isset($_POST['hdnModificar'])) 
    {
        $archivo = fopen("../archivos/empleados.txt", "r");

        while (!feof($archivo)) 
        {
            $string = trim(fgets($archivo));

            if($string) 
            {
                $auxiliar = explode(" - ", $string);

                if ($auxiliar[2] == $_POST['txtDni']) 
                {
                    $unEmpleado = new Empleado($auxiliar[0], $auxiliar[1], $auxiliar[2], $auxiliar[3], $auxiliar[4], $auxiliar[5], $auxiliar[6]);
                    $unEmpleado->SetPathFoto("../fotos/".$auxiliar[2]."-".$auxiliar[1]);

                    $unaFabrica = new Fabrica("Hardcor", 7);
                    $unaFabrica->TraerDeArchivo();

                    if ($unaFabrica->EliminarEmpleado($unEmpleado)) 
                    {
                        $unaFabrica->GuardarEnArchivo();
                        if (!unlink($unEmpleado->GetPathFoto().".jpg")) 
                        {
                            echo "Hubo un error al eliminar el empleado";
                        }
                        echo "eliminado";
                    }

                    break;
                    echo "encontrado";
                }
            }
        }

        fclose($archivo);

        
    }

    if(isset($_POST['txtNombre']))
    {
        $nombre = $_POST['txtNombre'];
        $apellido = $_POST['txtApellido'];
        $dni = $_POST['txtDni'];
        $sexo = $_POST['cboSexo'];
        $legajo = $_POST['txtLegajo'];
        $sueldo = $_POST['txtSueldo'];
        $turno = $_POST['rdoTurno'];

        $foto = pathinfo($_FILES['foto']['name']);
        $rutaDeFoto = "../fotos/".$_POST['txtDni']."-".$_POST['txtApellido'].".jpg";

        if($foto['extension'] != 'jpg' && $foto['extension']!= 'png' && $foto['extension'] != 'jpeg' && $foto['extension'] != 'gif' && $foto['extension'] != 'bmp')
        {
            echo "Extension de la foto no valida<br/>";
            echo "<br/><a href=\"..\index.php\">Volver</a>";
        }
        else if(filesize($rutaDeFoto) > 1000000) //1000000 es 1MB
        {
            echo "Tamaño de foto demasiado grande<br/>";
            echo "<br/><a href=\"..\index.php\">Volver</a>";
        }
        else if(file_exists($rutaDeFoto))
        {
            echo "Foto ya existente<br/>";
            echo "<br/><a href=\"..\index.php\">Volver</a>";
        }
        else
        {

            $unEmpleado = new Empleado($nombre, $apellido, $dni, $sexo, $legajo, $sueldo, $turno);
            $unaFabrica = new Fabrica("Hardcor", 7);

            $unaFabrica->TraerDeArchivo("../archivos/empleados.txt");

            if($unaFabrica->AgregarEmpleado($unEmpleado))
            {
                $unaFabrica->GuardarEnArchivo("../archivos/empleados.txt");
                
                move_uploaded_file($_FILES['foto']['tmp_name'],$rutaDeFoto);
                echo "Empleado agregado con exito!<br/>";
                echo "</br><a href=\".\Mostrar.php\">Mostrar</a>";
            }
            else
            {
                echo "Error al agregar empleado<br/>";
                echo "</br><a href=\"..\index.php\">Volver</a>";
            }

            /*$archivo = fopen("../archivos/empleados.txt", "a");
            
            if(fwrite($archivo, $unEmpleado->ToString()."\r\n"))
            {
                echo "Empleado agregado con exito!<br/>";
                fclose($archivo);
                echo "</br><a href=\".\mostrar.php\">Mostrar empleados</a>";
            }
            else
            {
                echo "Error al agregar empleado<br/>";
                fclose($archivo);
                echo "</br><a href=\"..\index.html\">Volver</a>";
            }*/
        }
    }
    
?>