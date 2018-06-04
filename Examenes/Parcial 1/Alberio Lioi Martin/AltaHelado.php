<?php
    $archivo = fopen("./heladosArchivo/helados.txt", "a");

    $helado[0] = $_POST['sabor'];
    $helado[1] = "-";
    $helado[2] = $_POST['precio'];
    //uso un array para poder cargar el sabor y el precio de forma "ordenada", y despues con el implode guardarlo como string
    
    if(fwrite($archivo, implode("-",$helado)) > 0)
    {
        echo "Se guardo el helado con exito <br/>";
    }
    else
    {
        echo "Error al guardar el helado <br/>";
    }

    fclose($archivo);

    $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $destinoFoto = "./heladosImagen/".$_FILES['foto']['sabor'].".".date('H i s').$extension;

    move_uploaded_file($_FILES['foto']['tmp_name'], $destinoFoto);

?>