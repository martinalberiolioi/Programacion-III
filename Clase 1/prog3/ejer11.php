<?php
    //$v = array(1=> 90, 30 => 7, "e" => 99, "hola" => "mundo"); ---> ES LO MISMO QUE LO QUE VIENE ABAJO

    $v[1] = 90;
    $v[30] = 7;
    $v["e"] = 99;
    $v["hola"] = "mundo";

    foreach($v as $i)
    {
        echo $i, "<br>";
    }
?>