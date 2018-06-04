<?php

    function invertir($frase)
    {
       $aux = str_split($frase);

       echo(var_dump($aux)."<br>");
    
        for($i = 0; $i < count($aux); $i++)
        {
            $retorno[$i] = $aux[count($aux) - $i - 1];
        }

        echo(var_dump($retorno));
      
    }

    invertir("hola");
?>