<?php

    function EsPar($numero)
    {
        if($numero % 2 == 0)
        {
           return true;
        }
        else
        {
            return false;
        }
    }

    function EsImpar($numero)
    {
        return(!EsPar($numero));
    }


    if(EsImpar(5)) //solucion "casera" para que devuelva TRUE o FALSE. Sino, devuelve 1 o 0
    {
        echo("TRUE");
    }
    else
    {
        echo("FALSE");
    }

?>