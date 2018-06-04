<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ejercicio26</title>
</head>
<body>

    <form method="POST">
        <input type="text" name="ruta">
        <button>Ingresar</button>

    </form>    
    
</body>
</html>

<?php
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    //setea el timezone

    //al cargar la pagina, el boton envia lo que esta ingresado en el formulario automaticamente
    //entonces, devolveria error. Por eso uso el isset, cosa que si el formulario esta en blanco
    //no envie nada. Una vez que el usuario ingrese algo, ahi permite hacer la copia
    if(isset($_POST["ruta"]))
    {
        Copiar();
    }

    function Copiar()
    {
        copy($_POST["ruta"], "./misArchivos/".date("Y_m_d_H_i_s").".txt");
    }    

?>