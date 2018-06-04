<?php
    include "Empleado.php";
    include "Fabrica.php";

    if(isset($_GET['legajo']))
    {
        $legajoRecibido = $_GET['legajo'];
        $seEncontro = false;

        $archivo = fopen("../archivos/empleados.txt", "r");

        while(!feof($archivo))
        {
            $auxiliar = explode(" - ", trim(fgets($archivo)));

            if(isset($auxiliar[4]))
            {
                if($legajoRecibido == $auxiliar[4])
                {
                    $unEmpleado = new Empleado($auxiliar[0], $auxiliar[1], $auxiliar[2], $auxiliar[3], $auxiliar[4], $auxiliar[5], $auxiliar[6]);
                    $unaFabrica = new Fabrica("Hardcor", 7);
                    $rutaFotos = "../fotos/".$auxiliar[2]."-".$auxiliar[1].".jpg"; //setea el path a la foto para despues eliminarlo

                    $unaFabrica->TraerDeArchivo("../archivos/empleados.txt");                    

                    unlink($rutaFotos); //elimina la foto de forma fisica

                    if($unaFabrica->EliminarEmpleado($unEmpleado))
                    {
                        $unaFabrica->GuardarEnArchivo("../archivos/empleados.txt");
                        echo "Se ha eliminado al empleado con exito!<br/>";
                        echo '<a href="../index.php">Volver</a> <a href="./mostrar.php"> Mostrar</a>';
                    }
                    else
                    {
                        echo "No se pudo eliminar al empleado<br/>";
                    }

                    $seEncontro = true;
                    break;
                }
            }
            
        }

        if(!$seEncontro)
        {
            echo "No se encontro el empleado<br/>";
            echo '<a href="../index.php">Volver</a> <a href="./mostrar.php"> Mostrar</a>';
        }
        

        fclose($archivo);
    }



?>