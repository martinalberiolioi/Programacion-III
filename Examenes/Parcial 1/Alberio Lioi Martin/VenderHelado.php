<?php
    include "Helado.php";

    $arrayHelados = Helado::RetornarArrayDeHelados();
    $encontro = false;

    for($i = 0; $i < 5; $i++)
    {
        if($arrayHelados[$i]->GetSabor() == $_GET['sabor'])
        {           
            $encontro = true;
            echo "Se encontro el sabor ".$arrayHelados[i]->GetSabor()."<br/>";
            return $arrayHelados[$i]->PrecioMasIva();
        }
    }

    if(!$encontro)
    {
        echo "No se ha encontrado el sabor <br/>";
    }


?>