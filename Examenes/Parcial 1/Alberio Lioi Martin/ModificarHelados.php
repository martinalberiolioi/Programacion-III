<?php
    if($_GET['sabor']['precio']['foto'])
    {
        $archivo = fopen("./heladosArchivo", "r");

        while(!feof($archivo))
        {
            $i = 0;
            $unHelado = explode("-", trim(fgets($archivo)));

            if($unHelado[$i]->GetSabor() == $_GET['sabor'])
            {
                fwrite($archivo, $_POST['sabor']['precio']['foto']);

                unlink("./heladosImagen/".$_FILES['foto']['sabor'].".".date('H i s').$extension);
                $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

                $destinoFoto = "./heladosImagen/".$_FILES['foto']['sabor'].".".date('H i s').$extension;
                move_uploaded_file($_FILES['foto']['tmp_name'], $destinoFoto);

                break;
            }

            $i++;
        }
        
    }
    else if($_POST['sabor']['precio']['foto'])
    {
        $archivo = fopen("./heladosArchivo", "r");

        while(!feof($archivo))
        {
            $i = 0;
            $unHelado = explode("-", trim(fgets($archivo)));

            if($unHelado[$i]->GetSabor() == $_GET['sabor'])
            {
                fwrite($archivo, $_POST['sabor']['precio']['foto']);
                
                unlink("./heladosImagen/".$_FILES['foto']['sabor'].".".date('H i s').$extension);
                $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

                $destinoFoto = "./heladosImagen/".$_FILES['foto']['sabor'].".".date('H i s').$extension;
                move_uploaded_file($_FILES['foto']['tmp_name'], $destinoFoto);
                
                break;
            }

            $i++;
        }
    }


?>