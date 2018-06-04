<?php
    include 'Helado.php';
    //falta recuperar las imagenes

    $arrayHelados = Helado::RecuperarHelados();

    for($i = 0; $i < count($arrayHelados); $i++)
    {
        echo "Sabor: ".$arrayHelados[$i]->GetSabor()." Precio: ".$arrayHelados[$i]->GetPrecio()."<br/>";
    }
?>