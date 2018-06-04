<?php
    for($i = 0; $i < $_POST['Filas']; $i++)
    {
        for($k = 0; $k < $_POST['Columnas'] ; $k++)
        {
            echo "*";
        }

        echo "<br/>";
    }

?>