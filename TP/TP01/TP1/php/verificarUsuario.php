<?php

    session_start();

    if(isset($_POST['txtDni'], $_POST['txtApellido']))
    {
        $archivo = fopen("../archivos./empleados.txt", "r");
        $encontrado = false;

        while(!feof($archivo))
        {
            $auxiliar = explode(" - ",fgets($archivo));

            if(trim($auxiliar[0]) != "" && trim($auxiliar[1]) == $_POST['txtApellido'] && trim($auxiliar[2]) == $_POST['txtDni'])
            {
                $encontrado = true;
                
                $_SESSION['DNIEmpleado'] = $_POST['txtDni'];
                            
                header('Location: ./mostrar.php');
            }
        
        }
    
        fclose($archivo);

        if(!$encontrado)
        {
            echo "ERROR DE LOGIN - No se encuentra el usuario<br/>";
            echo "</br><a href=\"..\login.html\">Reintentar</a>";
        }
    }





?>