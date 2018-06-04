<?php

    for($i = 1; $i < 5; $i++)
    {
        for($k = 1; $k < 5; $k++)
        {
            echo($i." a la ".$k." es: <br>");
            echo(pow($i, $k)."<br><br>");
        }
    }
?>