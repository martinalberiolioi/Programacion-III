<?php

    $path = fopen("../misArchivos/palabras.txt", "r");
    $cant1 = 0;
    $cant2 = 0;
    $cant3 = 0;
    $cant4 = 0;
    $cant5 = 0;    

    while(!feof($path))
    {
       $aux =  trim(fgets($path, filesize("misArchivos/palabras.txt")));
       //trim elimina caracteres especiales, espacios, etc. Porque en mi archivo de texto, por cada salto de linea
       //hay un \n\r (dos caracteres extras)


       switch(strlen($aux))
       {
           case 1:
                $cant1 ++;
                break;
            case 2:
                $cant2 ++;
                break;
            case 3:
                $cant3 ++;
                break;
            case 4:
                $cant4 ++;
                break;
            default:
                $cant5 ++;
                break;
       }
    }    
    fclose($path);

    echo("palabras de una letra: ".$cant1."<br>"."palabras de dos letras: ".$cant2."<br>"."palabras de tres letras: ".$cant3."<br>"."palabras de cuatro letras: ".$cant4."<br>"."palabras de mas de cuatro letras: ".$cant5);

    echo
    "
    <br>
    <table border = 1>
        <tr>
            <td>Uno<td>
            <td>Dos<td>
            <td>Tres<td>
            <td>Cuatro<td>
            <td>Cuatro+<td>
        <tr>

        <tr>
            <td>$cant1<td>
            <td>$cant2<td>
            <td>$cant3<td>
            <td>$cant4<td>
            <td>$cant5<td>
        <tr>
    <table>

    "
?>