<?php
    include "Auto.php";

    $auto1 = new Auto("Ferrari", "Rojo");
    $auto2 = new Auto("Ferrari", "Azul");
    $auto3 = new Auto("BMW", "Azul", "50");
    $auto4 = new Auto("BMW", "Azul", "70");
    $auto5 = new Auto("Audi", "Blanco", date("Y-m-d H:i:s"));

    $auto3->AgregarImpuestos(1500);
    $auto4->AgregarImpuestos(1500);
    $auto5->AgregarImpuestos(1500);

    echo(Auto::Add($auto1, $auto2));

    if($auto1->Equals($auto1, $auto2))
    {
        echo "El auto 1 y el auto 2 son iguales <br/>";
    }
    else
    {
        echo "El auto 1 y el auto 2 son distintos <br/>";
    }
    
    if($auto1->Equals($auto1, $auto5))
    {
        echo "El auto 1 y el auto 5 son iguales <br/>";
    }
    else
    {
        echo "El auto 1 y el auto 5 son distintos <br/>";
    }

    Auto::MostrarAuto($auto1);
    echo "<br/>";
    Auto::MostrarAuto($auto3);
    echo "<br/>";
    Auto::MostrarAuto($auto5);

?>