<?php
    $archivo = fopen("./clientes/clientesActuales.txt", "r");
    $encontro = false;

    while(!feof($archivo))
    {
        $lector = explode(" - ", trim(fgets($archivo)));

        if($lector[1] == $_POST['correo'] && $lector[2] == $_POST['clave'])
        {
            echo "Cliente ".$lector[0]." ya esta logeado <br/>";
            $encontro = true;
            break;
        }

        fclose($archivo);
    }

    if(!$encontro)
    {
        echo "Cliente inexistente <br/>";
    }


?>