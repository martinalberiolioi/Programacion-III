<?php    
    echo date(DATE_RSS); //muestra dia en numero y letras, mes, año y hora

    switch(date("m"))
    {
        case 12:
        case 01:
        case 02:
            echo "<br> estacion: VERANO";
            break;
        case 03:
        case 04:
        case 05:
            echo "<br> estacion: OTOÑO";
            break;
        case 06:
        case 07:
        case 08:
            echo "<br> estacion: INVIERNO";
            break;
        case 09:
        case 10:
        case 11:
            echo "<br> estacion: PRIMAVERA";
            break;
    }

?>