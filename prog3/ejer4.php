<?php

    $cont = 0;

    for($i = 0; ($cont + $i) < 1000; $i++)
    {
        //echo "$i <br>", $cont += $i; 
        echo $cont += $i, "<br>";
    }

?>