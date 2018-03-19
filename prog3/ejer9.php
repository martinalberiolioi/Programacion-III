<?php
    $cont = 0;

    for($i = 0; $i < 5; $i++)
    {
        $miarray[$i] = rand(0,10);
        $cont += $miarray[$i];
    }

    echo "El promedio es: ", $cont /= 5, "<br>";

    if($cont > 6)
    {
        echo "El promedio es mayor a 6";
    }
    else if($cont < 6)
    {
        echo "El promedio es menor a 6";
    }
    else
    {
        echo "El promedio es igual a 6";
    }


?>