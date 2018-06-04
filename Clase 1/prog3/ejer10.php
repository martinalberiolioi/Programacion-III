<?php

    $cont = 0;
    for($i = 0; $i < 100; $i++)
    {
        if($i%2 != 0)
        {
            $miarray[$cont] = $i;
            $cont++;

            if(count($miarray) == 10)
                break;
        }
    }


    echo "muestro por for <br>";

    for($i = 0; $i < 10; $i++)
    {
        echo $miarray[$i], "<br>";
    }

    echo "muestro por while <br>";

    $cont = 0; //lo pongo en 0 para usarlo en while

    while($cont < 10)
    {
        echo $miarray[$cont], "<br>";
        $cont++;
    }

    echo "muestro por foreach <br>";

    $cont = 0;

    foreach($miarray as $i)
    {
        echo $miarray[$cont], "<br>";
        $cont++;
    }

?>