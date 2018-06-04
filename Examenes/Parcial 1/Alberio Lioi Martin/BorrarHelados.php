<?php

    if($_GET['sabor'])
    {
        $archivo = fopen("./heladosArchivo/helados.txt", "r");
        
        while(!feof($archivo))
        {
            $i = 0;
            $unHelado = explode("-", trim(fgets($archivo)));

            if($unHelado[$i]->GetSabor() == $_GET['sabor'])
            {
                echo "El helado esta en el archivo <br/>";
                break;
            }

            $i++;
        }
        
        
    }
    else if($_POST['sabor']['queDeboHacer'] == "borrar")
    {
        $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        rename("./heladosImagen/".$_FILES['foto']['sabor'].".".date('H i s').$extension, "./heladosBorrados/".$_FILES['foto']['sabor']."borrado".date('H i s').$extension);
    }


?>