<?php

    function validador($palabra, $max)
    {
        if(strlen($palabra) <= $max)
        {
            switch($palabra)
            {
                case "Recuperatorio":
                case "Parcial":
                case "Programacion":
                    echo("1");
                    break;
                default:
                    echo("0");
            }
        }
        else
        {
            echo("La palabra ingresada -".$palabra."- es mas larga que el maximo ingresado -".$max."-");
        }
    }

    validador("Parcial", 10);

?>